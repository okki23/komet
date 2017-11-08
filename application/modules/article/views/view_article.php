
<div class="row">
<div class="container">
<h1> Article    </h1>
                
         <br>
         &nbsp;
		<a href = "<?php echo base_url('article/edit'); ?>" class="btn btn-primary" title="Add User"> <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Add </a>
		<br>
		&nbsp;
        <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
  
    <th>Title</th>
    <td>Pubdate </th>
    <th>Opsi</th>
   
  </tr>
</thead>
<tbody>
<?php
foreach($article as $key => $value){
?>
<tr>
    <td><?php echo $value->title; ?> </td>
    <td><?php echo $value->pubdate; ?> </td>
    <td>
    <a href="<?php echo base_url('article/edit/'.$value->id); ?>"> Edit </a> &nbsp;
    <a href="<?php echo base_url('article/delete/'.$value->id); ?>" onclick="javascript:return confirm('Anda yakin ingin menghapus data ini?')" > Delete </a> &nbsp;    
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 