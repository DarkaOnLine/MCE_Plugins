/**
 * $Id: editor_plugin_src.js 520 2008-01-07 16:30:32Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.FilemanagerPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceFilemanager', function() {
				ed.windowManager.open({
					file : url + '/InsertFile/insert_file.php',
					width : 650 + parseInt(ed.getLang('filemanager.delta_width', 0)),
					height : 500 + parseInt(ed.getLang('filemanager.delta_height', 0)),
					inline : 0
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('filemanager', {title : 'filemanager', cmd : 'mceFilemanager', image: url + '/images/filemanager.gif'});
		},

		getInfo : function() {
			return {
				longname : 'Emotions',
				author : 'Moxiecode Systems AB',
				authorurl : 'http://tinymce.moxiecode.com',
				infourl : 'http://wiki.moxiecode.com/index.php/TinyMCE:Plugins/emotions',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('filemanager', tinymce.plugins.FilemanagerPlugin);
})();


/* Import theme specific language pack
//tinyMCE.importPluginLanguagePack('filemanager', 'en,lt');

function TinyMCE_filemanager_getControlHTML(control_name) {
    switch (control_name) {
        case "filemanager":
            //return '<img id="{$editor_id}_filemanager" src="{$pluginurl}/images/filemanager.gif" title="{$lang_insert_filemanager}" width="20" height="20" class="mceButtonNormal" onmouseover="tinyMCE.switchClass(this,\'mceButtonOver\');" onmouseout="tinyMCE.restoreClass(this);" onmousedown="tinyMCE.restoreAndSwitchClass(this,\'mceButtonDown\');" onclick="tinyMCE.execInstanceCommand(\'{$editor_id}\',\'mceFilemanager\');" />';
            return tinyMCE.getButtonHTML(control_name, 'lang_insert_filemanager', '{$pluginurl}/images/filemanager.gif', 'mceFilemanager');
    }
    return "";
}

/**
 * Executes the mceFilemanager command.

function TinyMCE_filemanager_execCommand(editor_id, element, command, user_interface, value) {
    // Handle commands
    switch (command) {
        case "mceFilemanager":
            var template = new Array();
            template['file']   = '../../plugins/filemanager/InsertFile/insert_file.php'; // Relative to theme
            template['width']  = 660;
            template['height'] = 500;

            tinyMCE.openWindow(template, {editor_id : editor_id});
       return true;
   }
   // Pass to next handler in chain
   return false;
}


 */