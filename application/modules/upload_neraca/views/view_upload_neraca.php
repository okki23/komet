
<div class="row">
<div class="container">
<h1> Upload Neraca    </h1>
            
         <br>
         &nbsp;
    <?php 
  
      echo '<a href = "'.base_url('upload_neraca/edit').'" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>';
     
    ?>
    
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Nama File</th>
    <th>Path  </th>
    <th>Tanggal Upload </th>   
    <th>Opsi</th> 
  </tr>
</thead>
<tbody>
<?php
foreach($upload_neraca as $key => $value){
?>
<tr>
    <td><?php echo $value->nama_file; ?> </td>
    <td><?php echo "<a href=".base_url('uploads/'.$value->path_upload).">".$value->path_upload." <span class='glyphicon glyphicon-cloud-download' aria-hidden='true'> </span>  </a>"; ?> </td>
    <td><?php echo tanggalan($value->date_upload); ?> </td>
     
    <td>
    <a href="<?php echo base_url('upload_neraca/edit/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('upload_neraca/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 