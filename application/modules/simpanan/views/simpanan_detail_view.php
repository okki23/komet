<script type="text/javascript"> 
function getupdate(a,b){
 
  $('#myModal').modal('show'); 

  var myKeyVals = { id : a, id_anggota : b};
   
  $.ajax({
    url:"<?php echo base_url('simpanan/simpanan_detail_getdata')?>",
    type:"POST",
    data: myKeyVals,
    success:function sukses(data){
      console.log(data);
      //{"id":"8","id_anggota":"2","tanggal_bayar":"2017-11-02","jumlah_bayar":"80000","status":"Lunas"}
      var list = JSON.parse(data);
      $("#idform").val(list.id);
      $("#idformanggota").val(list.id_anggota);
      $("#jumlah_bayar").val(list.jumlah_bayar);
      $("#dp1").val(list.tanggal_bayar);
      $("#status").val(list.status);
    }

});
 
};
  function closemodal(){
      $('#myModal').modal('toggle'); 
    }

  function openmodal(){
      $('#myModal').modal('toggle'); 
      $("#idform").val('');
  }
 
</script>

<div class="row">
<div class="container">
<h1> Simpanan  : <?php echo $name->nama_asli; ?>   </h1>
<a href="<?php echo base_url('simpanan'); ?>"> <- Back To Top </a>
<br>

<a href="javascript:void(0);" onclick='openmodal();' class="btn btn-primary"> + Tambah Transaksi </a> &nbsp;
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
  <th>No</th>
  <th>Tanggal Transaksi</th>
  <th>Pembayaran</th>
  <th>Opsi</th>
  </tr>
</thead>
<tbody>
<?php 
$no = 1;
foreach($listing as $key=>$val){
?>
<tr>
<td> <?php echo $no; ?> </td>
<td> <?php echo tanggalan($val->tanggal_bayar); ?> </td>
<td> <?php echo "Rp. " .number_format(intval($val->jumlah_bayar),"0");   ?> </td>
<td> <a href="javascript:void(0);" onClick='getupdate(<?php echo $val->id; ?>,<?php echo $val->id_anggota; ?>);'> Edit </a> &nbsp;
     <a href="<?php echo base_url('simpanan/simpanan_detail_delete/'.$val->id.'/'.$id_anggota)?>" > Delete </a>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

        <form action="<?php echo base_url('simpanan/simpanan_detail_save'); ?>"  method="POST"> 
        <input type="hidden" name="id" id="idform">
        <input type="hidden" name="idsimpan" value="<?php echo $id; ?>">
        <input type="hidden" name="id_anggota" id="idformanggota" value="<?php echo $id_anggota; ?>">
        
        Jumlah Bayar : <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" id="formatrp">
        Tanggal Bayar : <input type="text" class="form-control"  name="tanggal_bayar" id="dp1">
        Status : <input type="text" class="form-control" id="status" name="status">

         
      
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0);" onClick='closemodal();' class="btn btn-default" > Cancel </a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
 