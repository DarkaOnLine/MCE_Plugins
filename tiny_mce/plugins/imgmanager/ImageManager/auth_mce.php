<?
/**
 * Authorisation script for TinyMCE.
 *@author $Author: Ryan Demmer $
 * @version $Id: auth_mce.php 26 2004-12-24 18:24:00 $
 * @package TinyMCE_exp
 * @Portions from remository.php
 */

// Don't allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function checkType($type){
        global $mosConfig_absolute_path, $database, $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix;

       // $base_path = "../../../../../../../../";

        $database = new database( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );
        $database->debug( $mosConfig_debug );

        // initialise mainframe for session functions
        $mainframe = new mosMainFrame( $database, $option, $base_path);

        // initialise session. We have to do this cos session
        // variables can't be carried through to popups in frontend!
        $mainframe->initSession();
        // get usertype from the session
        $my = $mainframe->GetUser($user->usertype);
		
		//get admin usertype
		if (!$my->usertype){
			require( $base_path."administrator/includes/auth.php" );
		}
				
        // load tinymce info
        $database = new database( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );
        $query = "SELECT id FROM #__mambots WHERE element = 'tinymce_exp' AND folder = 'editors'";
        $database->setQuery( $query );
        $id = $database->loadResult();
        $mambot = new mosMambot( $database );
        $mambot->load( $id );
        $params =& new mosParameters( $mambot->params );

        // Get some Access parameters
        $upload_level = $params->get( 'upload_level' );
        $new_folder_level = $params->get( 'new_folder_level' );
        $image_edit_level = $params->get( 'image_edit_level' );
        $image_delete_level = $params->get( 'image_delete_level' );
        $folder_delete_level = $params->get( 'folder_delete_level' );


        //Get group id from database relative to session usertype
        $database = new database( $mosConfig_host, $mosConfig_user, $mosConfig_password, $mosConfig_db, $mosConfig_dbprefix );
        $query = "SELECT lft FROM #__core_acl_aro_groups WHERE name = '".$my->usertype."' LIMIT 1";
        $database->setQuery( $query );
        $grp = $database->loadResult();

        //Check for access rights based on parameter info and session info
        //[08/01/2005]Added Disabled option for frontend users. See tinymce_exp.xml.
        switch ($type){
                case 'admin' :
                     if ((strtolower($my->usertype)=='administrator') || (strtolower($my->usertype)=='superadministrator')
                                || (strtolower($my->usertype)=='super administrator')){
						return true;
                     }
                break;
                case 'user' :
                     if ((strtolower($my->usertype)=='author') || (strtolower($my->usertype)=='editor')
                                || (strtolower($my->usertype)=='publisher')){
                        return true;
                     }
                break;
                case 'IM_upload' :
                      if ($grp >= $upload_level && $upload_level != 0){
                        return true;
                      }
                break;
                case 'IM_new_folder' :
                      if ($grp >= $new_folder_level && $new_folder_level != 0){
                        return true;
                      }
                break;
                case 'IM_image_edit' :
                      if ($grp >= $image_edit_level && $image_edit_level != 0){
                        return true;
                      }
                break;
                case 'IM_image_delete' :
                      if ($grp >= $image_delete_level && $image_delete_level != 0){
                        return true;
                      }
                break;
                case 'IM_folder_delete' :
                      if ($grp >= $folder_delete_level && $folder_delete_level != 0){
                        return true;
                      }
                break;
        }
}

?>