<?php

//$base_path = "../../../../../../../../../";
$mosConfig_absolute_path = dirname(__FILE__)."/../../../../../";
$base_path = $_SERVER['DOCUMENT_ROOT'].'/';
//$mosConfig_absolute_path = $_SERVER['DOCUMENT_ROOT'].'/';

$IMConfig['base_dir'] = $mosConfig_absolute_path.'images/';
$mosConfig_live_site = "http://".$_SERVER['HTTP_HOST']."/";
//$mosConfig_live_site = $_SERVER['DOCUMENT_ROOT'].'/';
$IMConfig['base_url'] = $mosConfig_live_site.'images/';


//$mosConfig_live_site = $_SERVER['DOCUMENT_ROOT'].'/';
//$IMConfig['img_url'] = WEBROOT.'../uploads/images';//
$IMConfig['img_url'] = $mosConfig_live_site.'images';
$IMConfig['safe_mode'] = ini_get('safe_mode');
define('IMAGE_CLASS', 'GD');
//define('IMAGE_TRANSFORM_LIB_PATH', 'C:/Apache/htdocs/netpbm/');

$IMConfig['thumbnail_prefix'] = '.thumb_';
$IMConfig['thumbnail_dir'] = '.thumbs';
$IMConfig['validate_images'] = true;
$IMConfig['default_thumbnail'] = 'img/default.gif';
$IMConfig['thumbnail_width'] = 96;
$IMConfig['thumbnail_height'] = 96;
$IMConfig['tmp_prefix'] = '.editor_';
?>