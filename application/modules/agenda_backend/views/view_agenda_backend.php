
<div class="row">
<div class="container">
<h1> Agenda Backend    </h1>
                
         <br>
         &nbsp;
		<a href = "<?php echo base_url('agenda_backend/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Acara</th>
    <th>Tempat  </th>
    <th>Waktu </th>
    <th>Opsi</th> 
  </tr>
</thead>
<tbody>
<?php
foreach($agenda_backend as $key => $value){
?>
<tr>
    <td><?php echo $value->acara; ?> </td>
    <td><?php echo $value->tempat; ?> </td>
    <td><?php echo $value->waktu; ?> </td>
    <td>
    <a href="<?php echo base_url('agenda_backend/edit/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('agenda_backend/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 