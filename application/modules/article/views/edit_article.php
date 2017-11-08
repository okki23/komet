
<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('article/save') ;?>" method="POST">
		<div class="col-md-12">
		 
			<input type="hidden" name="id" value="<?php echo $article->id; ?>" >
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Publish Date  
					</label>
					 <input type="text" name="pubdate" class="form-control" id="dp1" value="<?php echo $article->pubdate;?>"  >
					 
					 
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputEmail1">
						Title  
					</label>
					<input type="text" name="title" class="form-control" value="<?php echo $article->title;?>"  >
					 
				</div>
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						Slug
					</label>
					<input type="text" name="slug" class="form-control" value="<?php echo $article->slug;?>">
				</div>
				
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						 Body
					</label>
					<textarea name="body">   <?php echo $article->body;?></textarea>
					 
				</div>
			 
			 
				<input type="submit" name="input" value="Save" class="btn btn-primary">
            	<a href="<?php echo base_url('article/');?>" class="btn btn-default"> Cancel </a>
</form>
        </div>
</div>

<script type="text/javascript">

function elFinderBrowser(callback, value, meta) {
    tinymce.activeEditor.windowManager.open({
        file: '<?php echo base_url("file_manager/filetes"); ?>', // use an absolute path!
        title: 'Files Manager',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
        oninsert: function (file, elf) {
            var url, reg, info;

            // URL normalization
            url = file;

            reg = "\/[^/]+?\/\.\.\/";
            while (url.match(reg)) {
                url = url.replace(reg, '/');
            }

            var split_info = file.split("/");

            var filename = split_info[split_info.length - 1];
            
            var getsize = 0;
            get_filesize(file, function (size) {
                //alert("The size of " + filename + " is: " + size + " bytes.");
                getsize = size;
            });
            
            // Make file info
            info = filename + ' (' + elf.formatSize(getsize) + ')';

            // Provide file and text for the link dialog
            if (meta.filetype == 'file') {
                callback(url, {text: info, title: info});
            }

            // Provide image and alt text for the image dialog
            if (meta.filetype == 'image') {
                callback(url, {alt: info});
            }

            // Provide alternative source and posted for the media dialog
            if (meta.filetype == 'media') {
                callback(url);
            }
        }
    });
    return false;
}

// TinyMCE init
tinymce.init({
    selector: "textarea",
    height: 400,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    relative_urls: false,
    remove_script_host: false,
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    file_picker_callback: elFinderBrowser
});

function get_filesize(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("HEAD", url, true); // Notice "HEAD" instead of "GET",
    //  to get only the header
    xhr.onreadystatechange = function () {
        if (this.readyState == this.DONE) {
            callback(parseInt(xhr.getResponseHeader("Content-Length")));
        }
    };
    xhr.send();
}
 </script>