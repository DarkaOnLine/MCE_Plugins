<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF8">
        <title>MCE</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script type="text/javascript" src="jq.js"></script>
        <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            tinyMCE.init({
                // General options
                mode : "textareas",
                theme : "advanced",
                plugins : "youtubeIframe,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

                // Theme options
                theme_advanced_buttons1 : "bold,youtubeIframe,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
                theme_advanced_buttons3 :"",
                theme_advanced_buttons4 :"",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left",
                theme_advanced_statusbar_location : "bottom",
                theme_advanced_resizing : true

            });
        </script>
        <!-- /TinyMCE -->	
    </head>

    <body>
        <div class="body-container">


            <div class="text-container">	
                <textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%"></textarea>
            </div>

            <div class="footer">

                &copy; <?= date("Y") ?> Darius Matulionis	
            </div>

        </div>

    </body>
</html>
