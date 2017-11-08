
 
<link rel="stylesheet" type="text/css" href="http://localhost/smpn195/assets/plugins/jquery-ui/css/base/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="http://localhost/smpn195/assets/plugins/elFinder/css/theme.css" />
<link rel="stylesheet" type="text/css" href="http://localhost/smpn195/assets/plugins/elFinder/css/elfinder.min.css" />
<script type="text/javascript" src="http://localhost/smpn195/assets/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="http://localhost/smpn195/assets/plugins/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://localhost/smpn195/assets/plugins/elFinder/js/elfinder.min.js"></script>

<script type="text/javascript">

    function cancelbtn() {
        $("#hasil").val('');
    }

    $(document).ready(function () {

        $("#elfinder-tag").hide();

        $("#getfile").click(function () {
            $("#elfinder-tag").toggle();
        });

    });
    $(document).ready(function () {
        $('#elfinder-tag').elfinder({
            url: '<?php echo base_url('file_manager/elfinder_init'); ?>',
            getFileCallback: function (file) {
                var filePath = file; //file contains the relative url.
                console.log(filePath);
                //var imgPath = "<img src = '"+filePath+"'/>";
                //$('#selectedImages').append(imgPath); //add the image to a div so you can see the selected images
                $("#hasil").val(filePath);
                $('#elfinder-tag').hide(); //close the window after image is selected
            }
        }).elfinder('instance');
    });
</script>


<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('gallery_video_internal/save') ;?>" method="POST">
		<div class="col-md-12">
		 		<input type="hidden" name="id" value="<?php echo $list->id; ?>" >
				 <div class="form-group">
				 <label for="exampleInputEmail1">
					 Video
				 </label>
				 <table>
					 <tr>
						 <td> <input class="form-control" id="hasil" type="text" name="video" value="<?php echo $list->video; ?>" /> 
						 </td>
						 <td> &nbsp; <a id="getfile" class="btn btn-primary"> ...  </a>

							 <a id="batalin" onclick="cancelbtn();" class="btn btn-danger"> X  </a>						</td>
					 <tr>
				 </table> 
			 </div>

			 <div id="elfinder-tag" style="height: 90%; border: 0px;  padding: 0px 0px 90px 0px;" ></div>

				<div class="form-group">
					<label for="exampleInputEmail1">
						Caption  
					</label>
					 <input type="text" name="caption" class="form-control"  value="<?php echo $list->caption;?>"  >
				</div>
				 
				<hr>
				
				<br>
				<div  align="center">
                    <button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
                    <a class="btn btn-danger" href="<?php echo base_url('gallery_video_internal'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
                </div>
				<br>
				<br>
				<br>				 
		</form>
        </div>
</div>
