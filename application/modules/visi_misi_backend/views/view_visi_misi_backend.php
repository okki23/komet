
<div class="row">
<div class="container">
<h1> Visi Misi Backend    </h1>
         <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>Body</th>
    <th>Opsi</th>
   
  </tr>
</thead>
<tbody>
<?php
foreach($list as $key => $value){
?>
<tr>
    <td><?php echo $value->body; ?> </td>
    <td>
    <a href="<?php echo base_url('visi_misi_backend/edit/'.$value->id); ?>"> Edit </a> &nbsp;
     
    </td>
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 