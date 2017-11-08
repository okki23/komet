
<div class="row">
<div class="container">
<h1> Member    </h1>
            
         <br>
         &nbsp;
    <?php 
  
      echo '<a href = "'.base_url('member/edit').'" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>';
     
    ?>
    
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>No Anggota</th>
    <th>Nama  </th>
    <th>No KTP </th>
    <th>Telp</th>
    <th>Opsi</th> 
  </tr>
</thead>
<tbody>
<?php
foreach($member as $key => $value){
?>
<tr>
    <td><?php echo $value->no_anggota; ?> </td>
    <td><?php echo $value->nama_asli; ?> </td>
    <td><?php echo $value->no_ktp; ?> </td>
    <td><?php echo $value->no_telp; ?> </td>
    <td>
    <a href="<?php echo base_url('member/edit/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('member/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 