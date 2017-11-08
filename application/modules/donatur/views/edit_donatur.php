
<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('donatur/save') ;?>" method="POST">
		<div class="col-md-12">
		 		<input type="hidden" name="id" value="<?php echo $donatur->id; ?>" >
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama Donatur  
					</label>
					 <input type="text" name="nama_donatur" class="form-control"  value="<?php echo $donatur->nama_donatur;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Jumlah Donasi  
					</label>
					 <input type="text" name="jumlah_donasi" class="form-control"  value="<?php echo $donatur->jumlah_donasi;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Tanggal Donasi  
					</label>
					 <input type="text" name="tanggal_donasi" id="dp1" class="form-control"  value="<?php echo $donatur->tanggal_donasi;?>"  >
				</div>
				 

				<hr>
				<br>
				<div  align="center">
                    <button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
                    <a class="btn btn-danger" href="<?php echo base_url('donatur'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
                </div>
				<br>
				<br>
				<br>				 
		</form>
        </div>
</div>
