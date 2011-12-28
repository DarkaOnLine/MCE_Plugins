/* Import theme specific language pack */
tinyMCE.importPluginLanguagePack('imgmanager', 'lt,uk');

function TinyMCE_imgmanager_getControlHTML(control_name) {
    //alert(control_name);
	switch (control_name) {
		case "image":
            return tinyMCE.getButtonHTML(control_name, 'lang_image_desc', '{$themeurl}/images/image.gif', 'mceImage');
	}
	return "";
}

function TinyMCE_imgmanager_execCommand(editor_id, element, command, user_interface, value) {
	// Handle commands
	switch (command) {
		case "mceImage":
            var template = new Array();
            //template['file']   = 'plugins/imgmanager/ImageManager/manager.php';
            template['file'] = '../../plugins/imgmanager/ImageManager/manager.php';
            template['width']  = 600;
            template['height'] = 550; 
            // Language specific width and height addons
            template['width']  += tinyMCE.getLang('lang_insert_image_delta_width', 0);
            template['height'] += tinyMCE.getLang('lang_insert_image_delta_height', 0);

        	tinyMCE.openWindow(template, {editor_id : editor_id, inline : "yes"});
        	//tinyMCE.openWindow(template, {editor_id : editor_id, scrollbars : "yes", resizable : "yes"});
			return true;
        case "imageLink":
            var template = new Array();
            //template['file']   = 'plugins/imgmanager/ImageManager/manager.php?add_link=1';
            template['file'] = '../../plugins/imgmanager/ImageManager/manager.php?add_link=1';
            template['width']  = 600;
            template['height'] = 550; 
            // Language specific width and height addons
            template['width']  += tinyMCE.getLang('lang_insert_image_delta_width', 0);
            template['height'] += tinyMCE.getLang('lang_insert_image_delta_height', 0);

        	tinyMCE.openWindow(template, {editor_id : editor_id, inline : "yes"});
            return true;
            break;
	}
	// Pass to next handler in chain
	return false;
}
