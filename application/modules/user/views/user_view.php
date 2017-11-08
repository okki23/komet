
<div class="row">
<div class="container">
<h1> User    </h1>
                
         <br>
         &nbsp;
		<a href = "<?php echo base_url('user/store'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
  
  <th>No</th>
  <th>Username</th>
  <th>Pegawai</th>
  <th>Level</th>
  <th>Opsi</th>
   
  </tr>
</thead>
<tbody>
<?php
$no =1;
foreach($listing as $key => $value){
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $value->username; ?></td>
<td><?php echo $value->nama_asli; ?></td>
<td><?php echo strtoupper(level_help($value->level)); ?></td>
    <td>
    <a href="<?php echo base_url('user/store/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('user/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
$no++;
}
?>
</tbody>
</table>
 
</div>
</div> 
 