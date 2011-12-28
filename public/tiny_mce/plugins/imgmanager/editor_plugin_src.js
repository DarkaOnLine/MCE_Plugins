/**
 * $Id: editor_plugin_src.js 520 2008-01-07 16:30:32Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {  
	tinymce.create('tinymce.plugins.ImgmanagerPlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mceImgmanager', function() {
				ed.windowManager.open({
					file : url + '/ImageManager/manager.php',
					width : 650 + parseInt(ed.getLang('Imgmanager.delta_width', 0)),
					height : 500 + parseInt(ed.getLang('Imgmanager.delta_height', 0)),
					inline : 0
				}, {
					plugin_url : url
				});
			});

			// Register buttons
			ed.addButton('imgmanager', {title : 'imgmanager', cmd : 'mceImgmanager', image: url + '/../../themes/advanced/img/image.gif'});
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
	tinymce.PluginManager.add('imgmanager', tinymce.plugins.ImgmanagerPlugin);
})();