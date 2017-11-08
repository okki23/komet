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
          var FileBrowserDialogue = {
            init: function() {
              // Here goes your code for setting your custom things onLoad.
            },
            mySubmit: function (file, elf) {
              // pass selected file data to TinyMCE
              parent.tinymce.activeEditor.windowManager.getParams().oninsert(file, elf);
              // close popup window
              parent.tinymce.activeEditor.windowManager.close();
            }
          }
        
          $().ready(function() {
            var elf = $('#elfinder').elfinder({
              // set your elFinder options here
              url: '<?php echo base_url('file_manager/elfinder_init'); ?>',  // connector URL
              getFileCallback: function(file) { // editor callback
                // Require `commandsOptions.getfile.onlyURL = false` (default)
                FileBrowserDialogue.mySubmit(file, elf); // pass selected file path to TinyMCE 
              }
            }).elfinder('instance');      
          });
        </script>
    </head>
    <body>

        <div id="container">
            <div id="body">
                <div id="elfinder" style="height: 100% !important;"></div>
            </div>

            <input type="hidden" name="url" id="hasil" />
<br>        </div>

    </body>
</html>