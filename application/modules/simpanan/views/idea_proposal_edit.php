<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/select2.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap-wysihtml5.css" />
<link href="<?php echo base_url('assets/'); ?>/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/jquery.ui.custom.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/bootstrap-colorpicker.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/bootstrap-datepicker.js"></script> 
 
 <script src="<?php echo base_url('assets/'); ?>js/jquery.uniform.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/select2.min.js"></script> 
 <script src="<?php echo base_url('assets/'); ?>js/matrix.js"></script> 
 <script src="<?php echo base_url('assets/'); ?>js/matrix.form_common.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/wysihtml5-0.3.0.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/jquery.peity.min.js"></script> 
<script src="<?php echo base_url('assets/'); ?>js/bootstrap-wysihtml5.js"></script> 

<style type="text/css">.thumb-image{float:left;width:200px;position:relative;padding:5px;}</style>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $_SESSION['username']; ?> </span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="javascript::void(0);"><i class="icon-user"></i> <?php echo "Your username : ".$_SESSION['username'];?></a></li>
        <li class="divider"></li>
        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your Level : ".$_SESSION['level'];?></a></li>
        <li class="divider"></li>
        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your Full Name : ".$_SESSION['namapegawai'];?></a></li>
        <li class="divider"></li>
        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your NRP : ".$_SESSION['nrp'];?></a></li>
        <li class="divider"></li>
        <li><a href="<?php echo base_url('login/logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
     
   
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
 
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->
<?php
if($_SESSION['level'] == 'ahmic' || $_SESSION['level'] == 'kasie'){
?>

<div id="sidebar"><a href="<?php echo base_url('dashboard'); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     
     <li class="submenu"> <a href="javascript::void(0);"><i class="icon icon-th-list"></i> <span>Transaksi</span> </a>
      <ul>
        <li><a href="<?php echo base_url('idea_proposal'); ?>">Idea Proposal </a></li>
      
      </ul>
    </li>
 
  </ul>
</div>

<?php
}
?>

<?php
if($_SESSION['level'] == 'foreman'){
?>
  
  <div id="sidebar"><a href="<?php echo base_url('dashboard'); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     
     <li class="submenu"> <a href="javascript::void(0);"><i class="icon icon-th-list"></i> <span>Transaksi</span> </a>
      <ul>
        <li><a href="<?php echo base_url('idea_proposal'); ?>">Idea Proposal</a></li>
      </ul>
    </li>
 
  </ul>
  </div>

<?php
}
?>

<?php
if($_SESSION['level'] == 'karyawan'){
?>
  
  <div id="sidebar"><a href="<?php echo base_url('dashboard'); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
      
     <li class="submenu"> <a href="javascript::void(0);"><i class="icon icon-th-list"></i> <span>Transaksi</span> </a>
      <ul>
        <li><a href="<?php echo base_url('idea_proposal'); ?>">Idea Proposal Form</a></li>
      
      </ul>
    </li>
 
  </ul>
  </div>
<?php
}
?>

<?php
if($_SESSION['level'] == 'admin'){
?>

<div id="sidebar"><a href="<?php echo base_url('dashboard'); ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     <li class="submenu"> <a href="javascript::void(0);"><i class="icon icon-th-list"></i> <span>Master</span></a>
      <ul>
        <li><a href="<?php echo base_url('pegawai'); ?>">Pegawai</a></li>
        <li><a href="<?php echo base_url('user'); ?>">User</a></li>
      
      </ul>
    </li>
    
  </ul>
</div>

<?php
}
?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
    <div id="breadcrumb">   </div>
  <h1>Form Idea Proposal</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
  <div class="span12">
   <form action="<?php echo base_url('idea_proposal/pro_edit');?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
  <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Data Idea Proposal</h5>
                </a> </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content span6"> 
              <!--content here-->

                <div class="widget-content nopadding">
                
                  <div class="control-group">
                    <label class="control-label">Nama :</label>
                    <div class="controls">
                    <input type="text" name="opt_nama" value="<?php echo $listing->nama; ?>" class="span11" readonly="readonly">
                    <input type="hidden" class="span11" name="nama" value="<?php echo $listing->nama; ?>" id="hid_opt_nama" />
                    <input type="hidden" class="span11" name="id" value="<?php echo $listing->id; ?>" id="id" />
                    <input type="hidden" class="span11" name="id_pegawai" value="<?php echo $listing->id_peg; ?>" />
                    </div>
                  </div>
                   <div class="control-group">
                    <label class="control-label">NRP :</label>
                    <div class="controls">
                      <input type="text" name="nrp" id="nrp" readonly="readonly" value="<?php echo $listing->nrp; ?>"  class="span11" />
                    </div>
                  </div>
                   <div class="control-group">
                    <label class="control-label">Seksi :</label>
                    <div class="controls">
                      <input type="text" name="seksi" id="seksi" readonly="readonly" value="<?php echo $listing->seksi; ?>"  class="span11"  />
                    </div>
                  </div>
                   <div class="control-group">
                    <label class="control-label">Risalah:</label>
                    <div class="controls">
                      <input type="text" name="risalah" id="risalah"  value="<?php echo $listing->risalah; ?>" class="span11"  />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Tanggal:</label>
                    <div class="controls">
                      <input type="text" name="tanggal"  value="<?php echo $listing->tanggal; ?>" readonly="readonly" id="tanggal" class="span11"  />
                    </div>
                  </div>
               
                </div>

              <!--content here-->
              </div>
              <div class="widget-content span6"> 
              <!--content here-->

                <div class="widget-content nopadding">
                
                  <div class="control-group">
                    <label class="control-label">No.Register :</label>
                    <div class="controls">
                      <input type="text" class="span11" name="no_reg"  value="<?php echo $listing->no_reg; ?>" readonly="readonly" />
                      
                    </div>
                  </div>
                 
                 
                </div>

              <!--content here-->
              </div>
            </div>
           
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                <h5>Idea Proposal</h5>
                </a> </div>
            </div>
            <div class="collapse accordion-body" id="collapseGTwo">
              <!--content here-->
              <div class="widget-content"> 
                
                 <div class="widget-content nopadding">
              
                    <div class="control-group">
                      <label class="control-label">Tema IP :</label>
                      <div class="controls">
                        <input type="text" name="tema_ip"  value="<?php echo $listing->tema_ip; ?>" class="span12"   />
                      </div>
                    </div>

                  </div>
 
              </div>

              <div class="widget-content span12"> 
                
                  <div class="widget-content nopadding span6">
              
                    <div class="control-group">
                      <label class="control-label">Kondisi Sebelum Perbaikan :</label>
                      <div class="controls">
                       <textarea class="span11" name="ksp" >  <?php echo $listing->ksp; ?> </textarea>
                       <br>
                       <br>
                       <span class="label label-important"> JPEG,JPG,PNG,GIF (Max 1000 Kb) </span>
                       <input type="file" name="upload_ksp" id="upload_ksp" value="<?php echo $listing->upload_ksp; ?>" class="form-control" >
                       <br>
                       
                       <span> View File : <a href="<?php echo base_url('uploads/'."$listing->upload_ksp"); ?>" target="_blank"> <label class="label label-important"> <?php echo $listing->upload_ksp; ?> </label> </a></span> 
                       <?php
                       if($listing->upload_ksp == NULL || $listing->upload_ksp == ''){
                          echo "Image not found!";
                       } 
                       ?>
                       <br>
                       <hr>
                       <input type="hidden" name="fupload_ksp" id="fupload_ksp" value="<?php echo $listing->upload_ksp; ?>" class="form-control" >
                       <div id="imgksp"></div>
                      </div>
                    </div>
                     
                    <div class="control-group">
                      <label class="control-label">Akibat:</label>
                      <div class="controls">
                        <textarea class="span11" name="akibat" > <?php echo $listing->akibat; ?> </textarea>
                      </div>
                    </div>

                  </div>

                  <div class="widget-content nopadding span6">
              
                    <div class="control-group">
                      <label class="control-label">Kondisi Setelah Perbaikan:</label>
                      <div class="controls">
                       <textarea class="span11" name="kstp" > <?php echo $listing->kstp; ?> </textarea>
                       <br>
                       <br>
                       <span class="label label-important"> JPEG,JPG,PNG,GIF (Max 1000 Kb) </span>
                       <input type="file" name="upload_kstp" id="upload_kstp" class="form-control" >
                       <br>
                       <span> View File : <a href="<?php echo base_url('uploads/'."$listing->upload_kstp"); ?>" target="_blank"> <label class="label label-important"> <?php echo $listing->upload_kstp; ?> </label> </a></span>
                       <?php
                       if($listing->upload_kstp == NULL || $listing->upload_kstp == ''){
                          echo "Image not found!";
                       } 
                       ?>
                       <br>
                       <hr>
                       <input type="hidden" name="fupload_kstp" id="fupload_kstp" value="<?php echo $listing->upload_kstp; ?>" class="form-control" >
                       <div id="imgkstp"></div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Standarisasi :</label>
                      <div class="controls">
                        <textarea class="span11" name="standarisasi" >  <?php echo $listing->standarisasi; ?> </textarea>
                       <br>
                       <br>
                       <span class="label label-important"> JPEG,JPG,PNG,GIF (Max 1000 Kb) </span>
                       <input type="file" name="upload_standarisasi" id="upload_standarisasi"  value="<?php echo $listing->upload_standarisasi; ?>" class="form-control" >
                       <br>
                       <span> View File : <a href="<?php echo base_url('uploads/'."$listing->upload_standarisasi"); ?>" target="_blank"> <label class="label label-important"> <?php echo $listing->upload_standarisasi; ?> </label> </a></span>
                       <?php
                       if($listing->upload_standarisasi == NULL || $listing->upload_standarisasi == ''){
                          echo "Image not found!";
                       } 
                       ?>
                       <br>
                       <hr>
                       <input type="hidden" name="fupload_standarisasi" id="fupload_standarisasi" value="<?php echo $listing->upload_standarisasi; ?>"  class="form-control" >
                      <div id="imgstd"></div>
                      </div>
                    </div>

                  </div>
 
              </div>
              <br>
              &nbsp;
              <div class="widget-content"> 
                
                 <div class="widget-content nopadding">
              
                    <div class="control-group">
                      <label class="control-label">Manfaat Setelah Adanya Ide :</label>
                      <div class="controls">
                        <textarea class="span11" name="manfaat" >  <?php echo $listing->manfaat; ?>  </textarea>

                      </div>
                    </div>

                  </div>
 
              </div>


                <!--content here-->
              </div>
                
            </div>
          </div>
           
           <div align="center">
           <br>
      <span class="label label-important"> PASTIKAN ANDA TELAH MEMBACA DAN MEMERIKSA SEMUA INPUTAN SEBELUM MENYIMPAN PERUBAHAN DATA INI! </span>
      <br>
      
    <div class="col-md-12">
    <button type="submit" name="save" id="save" class="btn btn-block btn-primary"> Save </button>
    </div>
    </div>
  </div>
  </form>
 
  </div>
  
</div></div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Matrix Admin. Created by <a href="javascript::void(0);">Tri Nur Diansyah</a> </div>
</div>
<!--end-Footer-part--> 

</body>
</html>
<script type="text/javascript">
 $(document).ready(function() {


        /*upload ksp*/
        $("#upload_ksp").on("change",function(){
          var filename = $('#upload_ksp').val().replace(/C:\\fakepath\\/i, '')
          $("#fupload_ksp").val(filename);

        });

        $("#upload_ksp").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var imgksp = $("#imgksp");
          imgksp.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var readerimgksp = new FileReader();
                readerimgksp.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(imgksp);
                }
                imgksp.show();
                readerimgksp.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
         /*upload ksp*/



         /*upload kstp*/
        $("#upload_kstp").on("change",function(){
        var filename = $('#upload_kstp').val().replace(/C:\\fakepath\\/i, '')
          $("#fupload_kstp").val(filename);

        });

        $("#upload_kstp").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var imgkstp = $("#imgkstp");
          imgkstp.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var readerimgkstp   = new FileReader();
                readerimgkstp.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(imgkstp);
                }
                imgkstp.show();
                readerimgkstp.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
         /*upload kstp*/




     /*upload standarisasi*/
     $("#upload_standarisasi").on("change",function(){
     var filename = $('#upload_standarisasi').val().replace(/C:\\fakepath\\/i, '')
          $("#fupload_standarisasi").val(filename);

        });

        $("#upload_standarisasi").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var imgstd = $("#imgstd");
          imgstd.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var readerimgstd = new FileReader();
                readerimgstd.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(imgstd);
                }
                imgstd.show();
                readerimgstd.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
         /*upload standarisasi*/




      });

$("#opt_nama").on("change",function(){
      //alert($(this).val());
      var valpeg = $("#opt_nama").val();
      $.ajax({
        url:"<?php echo base_url('idea_proposal/get_val_peg');?>",
        data:{valpeg:valpeg},
        type:"POST",
        success:function(data){
          var isian = JSON.parse(data);
          console.log(isian);
          $("#nrp").val(isian.nrp);
          $("#seksi").val(isian.seksi);
          $("#hid_opt_nama").val(isian.nm_pegawai);
        }
      });
    });
 
</script>