
<div class="row">
<div class="col-md-12"> 
<form action="<?php echo base_url('member/save') ;?>" method="POST">
		<div class="col-md-12">
		 		<input type="hidden" name="id" value="<?php echo $member->id; ?>" >
				<div class="form-group">
					<label for="exampleInputEmail1">
						No Anggota  
					</label>
					 <input type="text" name="no_anggota" class="form-control"  value="<?php echo $member->no_anggota;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama Asli  
					</label>
					 <input type="text" name="nama_asli" class="form-control"  value="<?php echo $member->nama_asli;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama Panggilan  
					</label>
					 <input type="text" name="nama_panggilan" class="form-control"  value="<?php echo $member->nama_panggilan;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						No KTP  
					</label>
					 <input type="text" name="no_ktp" class="form-control"  value="<?php echo $member->no_ktp;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Tempat Lahir  
					</label>
					 <input type="text" name="tempat_lahir" class="form-control"  value="<?php echo $member->tempat_lahir;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Tanggal Lahir  
					</label>
					 <input type="text" name="tanggal_lahir" class="form-control" id="dp1"  value="<?php echo $member->tanggal_lahir;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Jenis Kelamin   
					</label>
					<br>
					<input type="radio" name="jen_kel" value="L" <?php if($member->jen_kel == 'L'){ echo "checked"; } ?> > Laki-Laki &nbsp;
					<input type="radio" name="jen_kel" value="P" <?php if($member->jen_kel == 'P'){ echo "checked"; } ?>> Perempuan &nbsp;
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Alamat   
					</label>
					<br>
					<input type="text" name="alamat" class="form-control" value="<?php echo $member->alamat;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Agama   
					</label>
					<br>
					<select name="agama" class="form-control">
						<option value="islam" <?php if($member->agama == 'islam'){ echo "selected=selected"; } ?> > Islam </option>
						<option value="katholik" <?php if($member->agama == 'katholik'){ echo "selected=selected"; } ?> > Katholik </option>
						<option value="protestan" <?php if($member->agama == 'protestan'){ echo "selected=selected"; } ?> > Protestan </option>
						<option value="hindu" <?php if($member->agama == 'hindu'){ echo "selected=selected"; } ?> > Hindu </option>
						<option value="budha" <?php if($member->agama == 'budha'){ echo "selected=selected"; } ?> > Budha </option>
						<option value="konghucu" <?php if($member->agama == 'konghucu'){ echo "selected=selected"; } ?> > Konghucu </option>
						<option value="lainnya" <?php if($member->agama == 'lainnya'){ echo "selected=selected"; } ?> > Lainnya </option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Status Kawin   
					</label>
					<br>
					<input type="radio" name="status_kawin" value="belum_menikah" <?php if($member->status_kawin == 'belum_menikah'){ echo "checked"; } ?> > Belum Menikah &nbsp;
					<input type="radio" name="status_kawin" value="menikah" <?php if($member->status_kawin == 'menikah'){ echo "checked"; } ?> > Menikah &nbsp;
					<input type="radio" name="status_kawin" value="janda" <?php if($member->status_kawin == 'janda'){ echo "checked"; } ?> > Janda &nbsp;
					<input type="radio" name="status_kawin" value="duda" <?php if($member->status_kawin == 'duda'){ echo "checked"; } ?>> Duda &nbsp;
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Pekerjaan   
					</label>
					<br>
					<input type="text" name="pekerjaan" class="form-control" value="<?php echo $member->pekerjaan;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Kewarganegaraan   
					</label>
					<br>
					<input type="text" name="kewarganegaraan" class="form-control" value="<?php echo $member->kewarganegaraan;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						No Telp   
					</label>
					<br>
					<input type="text" name="no_telp" class="form-control" value="<?php echo $member->no_telp;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Email   
					</label>
					<br>
					<input type="text" name="email" class="form-control" value="<?php echo $member->email;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Daerah Asal   
					</label>
					<br>
					<input type="text" name="daerah_asal" class="form-control" value="<?php echo $member->daerah_asal;?>"  >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama Istri/Suami   
					</label>
					<br>
					<input type="text" name="nama_istri_suami" class="form-control" value="<?php echo $member->nama_istri_suami;?>"  >
				</div> 
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nama Anak  
					</label>
					<br>
					<div class="row">
						<div class="col-md-6">
						<input type="text" name="anak_a" class="form-control" placeholder="Anak Ke 1" value="<?php echo $member->anak_a;?>"  >
						<br>
						<input type="text" name="anak_b" class="form-control" placeholder="Anak Ke 2" value="<?php echo $member->anak_b;?>"  >
						<br>
						<input type="text" name="anak_c" class="form-control" placeholder="Anak Ke 3" value="<?php echo $member->anak_c;?>"  >
					 	</div>
						<div class="col-md-6">
						<input type="text" name="anak_d" class="form-control" placeholder="Anak Ke 4" value="<?php echo $member->anak_d;?>"  >
						<br>
						<input type="text" name="anak_e" class="form-control" placeholder="Anak Ke 5" value="<?php echo $member->anak_e;?>"  >
						<br>
						<input type="text" name="anak_f" class="form-control" placeholder="Anak Ke 6" value="<?php echo $member->anak_f;?>"  >
						</div>
					</div>
				</div> 

				<hr>
				<br>
				<div  align="center">
                    <button type="submit" name="save" class="btn btn-large btn-primary" > <i class="fa fa-archive"></i> Save </button>
                    <a class="btn btn-danger" href="<?php echo base_url('member'); ?>"> <i class="fa fa-reply-all"></i> Back </a>
                </div>
				<br>
				<br>
				<br>				 
		</form>
        </div>
</div>
