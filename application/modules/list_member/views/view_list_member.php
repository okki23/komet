
<div class="row">
<div class="container">
<br>
         &nbsp;
         <br>
         &nbsp;
<h1> List Member PCJ    </h1>
      
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
foreach($list_member as $key => $value){
?>
<tr>
    <td><?php echo $value->no_anggota; ?> </td>
    <td><?php echo $value->nama_asli; ?> </td>
    <td><?php echo $value->no_ktp; ?> </td>
    <td><?php echo $value->no_telp; ?> </td>
    <td> <a href="<?php echo base_url('list_member/detail/'.$value->id); ?>"> Detail </a> </td>
     
</tr>
<?php
}
?>
</tbody>
</table>
 
</div>
</div> 