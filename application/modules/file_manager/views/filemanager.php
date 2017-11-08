<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery-ui/css/base/jquery-ui.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elFinder/css/theme.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/elFinder/css/elfinder.min.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('assets/jquery-1.7.2.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-ui/js/jquery-ui.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/elFinder/js/elfinder.min.js'); ?>"></script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery('#elfinder-tag').elfinder({
                    url: '<?php echo base_url('file_manager/elfinder_init'); ?>',
                    getFileCallback: function(file) {
					  var filePath = file; //file contains the relative url.
					  console.log(filePath);
					  //var imgPath = "<img src = '"+filePath+"'/>";
					  //$('#selectedImages').append(imgPath); //add the image to a div so you can see the selected images
					  $("#hasil").val(filePath);
					 //$('#elfinder-tag').hide(); //close the window after image is selected
					}
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>

        <div id="container">
            <div id="body">
                <div id="elfinder-tag" style="height: 100% !important;"></div>
            </div>

            <input type="hidden" name="url" id="hasil" />
<br>        </div>

    </body>
</html>