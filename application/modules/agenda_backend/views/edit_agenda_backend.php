
<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('agenda_backend/save') ;?>" method="POST">
		<div class="col-md-12">
		 		<input type="hidden" name="id" value="<?php echo $list->id; ?>" >
				<div class="form-group">
					<label for="exampleInputEmail1">
						Acara  
					</label>
					 <input type="text" name="acara" class="form-control"  value="<?php echo $list->acara;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Tempat  
					</label>
					 <input type="text" name="tempat" class="form-control"  value="<?php echo $list->tempat;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Waktu  
					</label>
					 <input type="text" name="waktu" class="form-control"  value="<?php echo $list->waktu;?>"  >
				</div>
				 
				<hr>
				<br>
				<div  align="center">
                    <button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
                    <a class="btn btn-danger" href="<?php echo base_url('agenda_backend'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
                </div>
				<br>
				<br>
				<br>				 
		</form>
        </div>
</div>
