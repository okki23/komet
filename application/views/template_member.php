
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content=""> 

    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="images/pcjlogo.png" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript"> 
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('dashboard_member'); ?>"> Member  </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('list_member'); ?>">Daftar Anggota</a></li>
      
       
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kegiatan Internal <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Berita/Acara Internal</a></li>
          <li><a href="#">Foto Internal</a></li>
          <li><a href="#">Video Internal</a></li>
        </ul>
     </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan Keuangan <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Iuran Wajib Anggota</a></li>
              <li><a href="#">Donasi</a></li>
              <li><a href="#">Neraca</a></li>
            </ul>
          </li>
          
          
  
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"> Total Simpanan Anda Rp. <?php echo number_format($simpanan->totalsimpanan,"0"); ?> </a></li>
          <li><a href="<?php echo base_url('login/logout'); ?>"> Logout </a></li>
         
        </ul>
      </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
    <?php echo $this->load->view($content); ?>
  </body>
</html>
