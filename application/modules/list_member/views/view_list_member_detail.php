
<div class="row">
<div class="container">
<br>
         &nbsp;
         <br>
         &nbsp;
<h1> Data <?php echo $list->nama_asli;  ?>   </h1>
      <table class="table table-stripped table-hover table-responsive" border="1">
      <tr>
      <td> Nomor Anggota </td>
      <td> : </td>
      <td> <?php echo $list->no_anggota; ?> </td>
      </tr>
      <tr>
      <td> Nama Asli </td>
      <td> : </td>
      <td> <?php echo $list->nama_asli; ?> </td>
      </tr>
      <tr>
      <td> Nama Panggilan </td>
      <td> : </td>
      <td> <?php echo $list->nama_panggilan; ?> </td>
      </tr>
      <tr>
      <td> Nomor KTP </td>
      <td> : </td>
      <td> <?php echo $list->no_ktp; ?> </td>
      </tr>
      <tr>
      <td> Tempat Lahir </td>
      <td> : </td>
      <td> <?php echo $list->tempat_lahir; ?> </td>
      </tr>
      <tr>
      <td> Tanggal Lahir </td>
      <td> : </td>
      <td> <?php echo $list->tanggal_lahir; ?> </td>
      </tr>
      <tr>
      <td> Jenis Kelamin </td>
      <td> : </td>
      <td> <?php 
      if($list->jen_kel == 'L'){
          echo "Laki-Laki";
      }else{
          echo "Perempuan";
      }  ?> </td>
      </tr>
      <tr>
      <td> Alamat </td>
      <td> : </td>
      <td> <?php echo $list->alamat; ?> </td>
      </tr>
      <tr>
      <td> Agama </td>
      <td> : </td>
      <td> <?php echo strtoupper($list->agama); ?> </td>
      </tr>
      <tr>
      <td> Status Kawin </td>
      <td> : </td>
      <td> <?php echo strtoupper(str_replace("_"," ",$list->status_kawin)); ?> </td>
      </tr>
      <tr>
      <td> Pekerjaan </td>
      <td> : </td>
      <td> <?php echo $list->pekerjaan; ?> </td>
      </tr>
      <tr>
      <td> Kewarganegaraan </td>
      <td> : </td>
      <td> <?php echo $list->kewarganegaraan; ?> </td>
      </tr>
      <tr>
      <td> Nomor Telepon </td>
      <td> : </td>
      <td> <?php echo $list->no_telp; ?> </td>
      </tr>
      <tr>
      <td> Email </td>
      <td> : </td>
      <td> <?php echo $list->email; ?> </td>
      </tr>
      <tr>
      <td> Daerah Asal </td>
      <td> : </td>
      <td> <?php echo $list->daerah_asal; ?> </td>
      </tr>
      <tr>
      <td> Nama Istri/Suami </td>
      <td> : </td>
      <td> <?php echo $list->nama_istri_suami; ?> </td>
      </tr>
      <tr>
      <td> Anak 1 </td>
      <td> : </td>
      <td> <?php echo $list->anak_a; ?> </td>
      </tr>
      <tr>
      <td> Anak 2 </td>
      <td> : </td>
      <td> <?php echo $list->anak_b; ?> </td>
      </tr>
      <tr>
      <td> Anak 3 </td>
      <td> : </td>
      <td> <?php echo $list->anak_c; ?> </td>
      </tr>
      <tr>
      <td> Anak 4 </td>
      <td> : </td>
      <td> <?php echo $list->anak_d; ?> </td>
      </tr>
      <tr>
      <td> Anak 5 </td>
      <td> : </td>
      <td> <?php echo $list->anak_e; ?> </td>
      </tr>
      <tr>
      <td> Anak 6 </td>
      <td> : </td>
      <td> <?php echo $list->anak_f; ?> </td>
      </tr>
      </table> 
</div>
</div> 