<script type="text/javascript"> 


</script>
<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('upload_neraca/save') ;?>" method="POST" enctype="multipart/form-data" >
		<div class="col-md-12">
		 		<input type="hidden" name="id" value="<?php echo $upload_neraca->id; ?>" >
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama File  
					</label>
					 <input type="text" name="nama_file" class="form-control"  value="<?php echo $upload_neraca->nama_file;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Upload File  
					</label>
					<input type="text" name="path_upload" id="path_upload" value="<?php echo $upload_neraca->path_upload;?>">
					 <input type="file" name="path_uploadx" id="path_uploadx" class="form-control"     >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Tanggal Upload 
					</label>
					 <input type="text" name="date_upload" id="dp1" class="form-control"  value="<?php echo $upload_neraca->date_upload;?>"  >
				</div>
			 
				<hr>
				<br>
				<div  align="center">
                    <button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
                    <a class="btn btn-danger" href="<?php echo base_url('upload_neraca'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
                </div>
				<br>
				<br>
				<br>				 
		</form>
        </div>
</div>
