
<div class="row">
<div class="container">
<h1> Gallery Foto    </h1>
                
         <br>
         &nbsp;
		<a href = "<?php echo base_url('gallery_foto/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Caption </th>
    <th>Path</th>
    <th>Opsi</th> 
  </tr>
</thead>
<tbody>
<?php
foreach($list as $key => $value){
?>
<tr>
    <td><?php echo $value->caption; ?> </td>
    <td><?php echo $value->foto; ?> </td>
    <td>
    <a href="<?php echo base_url('gallery_foto/edit/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('gallery_foto/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 