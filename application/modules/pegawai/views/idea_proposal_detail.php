<?php
//session nya cek buat aproval
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Matrix Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/uniform.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/select2.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/matrix-style.css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/matrix-media.css" />
        <link href="<?php echo base_url('assets/'); ?>font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
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
                        <li><a href="javascript::void(0);"><i class="icon-user"></i> <?php echo "Your username : " . $_SESSION['username']; ?></a></li>
                        <li class="divider"></li>
                        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your Level : " . $_SESSION['level']; ?></a></li>
                        <li class="divider"></li>
                        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your Full Name : " . $_SESSION['namapegawai']; ?></a></li>
                        <li class="divider"></li>
                        <li><a href="javascript::void(0);"><i class="icon-check"></i> <?php echo "Your NRP : " . $_SESSION['nrp']; ?></a></li>
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
        if ($_SESSION['level'] == 'ahmic' || $_SESSION['level'] == 'kasie') {
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
        if ($_SESSION['level'] == 'foreman') {
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
        if ($_SESSION['level'] == 'karyawan') {
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
        if ($_SESSION['level'] == 'admin') {
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

        <div id="content">
            <div id="content-header">
                <div id="breadcrumb">   </div>
                <h1>List Detail Idea Proposal</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <form action="<?php echo base_url('idea_proposal/detail_pos/'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row-fluid">
                        <div class="accordion" id="collapse-group">

                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGFour" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                                            <h5>List Detail</h5>
                                        </a> </div>
                                </div>
                                <div class="collapse accordion-body" id="collapseGFour">
                                    <div class="widget-content"> 
                                        <!--content here-->

                                        <div class="widget-content nopadding ">
                                            <input type="hidden" name="id" value="<?php echo $listing->id; ?>">
                                            <table class="table table-bordered table-invoice">

                                                <tbody>
                                                    <tr>
                                                    <tr>
                                                        <td class="width30">No Reg</td>
                                                        <td class="width70"><strong><?php echo $listing->no_reg; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama:</td>
                                                        <td><strong><?php echo $listing->nama; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NRP:</td>
                                                        <td><strong><?php echo $listing->nrp; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Seksi:</td>
                                                        <td><strong><?php echo $listing->seksi; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Risalah:</td>
                                                        <td><strong><?php echo $listing->risalah; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal:</td>
                                                        <td><strong><?php echo $listing->tanggal; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kondisi Sebelum Perbaikan:</td>
                                                        <td><strong><?php echo $listing->ksp; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>View Kondisi Sebelum Perbaikan:  </td>
                                                        <td><strong><img src="<?php echo base_url('uploads/' . "$listing->upload_ksp"); ?>" style="width: 75%; height: 75%;"></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Akibat:</td>
                                                        <td><strong><?php echo $listing->akibat; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kondisi Setelah Perbaikan:</td>
                                                        <td><strong><?php echo $listing->kstp; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>View Kondisi Setelah Perbaikan:  </td>
                                                        <td><strong><img src="<?php echo base_url('uploads/' . "$listing->upload_kstp"); ?>" style="width: 75%; height: 75%;"></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Standarisasi:  </td>
                                                        <td><strong><?php echo $listing->standarisasi; ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>View Standarisasi:  </td>
                                                        <td><strong><img src="<?php echo base_url('uploads/' . "$listing->upload_standarisasi"); ?>" style="width: 75%; height: 75%;"></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manfaat:  </td>
                                                        <td><strong><?php echo $listing->manfaat; ?></strong></td>
                                                    </tr>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </div>


                                        <!--content here-->
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($_SESSION['level'] == 'ahmic' || $_SESSION['level'] == 'kasie') {
                                ?>

                                <?php
                                if ($listing->penilaian_foreman == '' || $listing->penilaian_foreman == NULL) {
                                    ?>

                                    <div class="accordion-group widget-box">
                                        <div class="accordion-heading">
                                            <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGFive" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                                                    <h5>Persetujuan</h5>
                                                </a> </div>
                                        </div>
                                        <div class="collapse accordion-body" id="collapseGFive">
                                            <div class="widget-content"> 
                                                <!--content here-->

                                                <div class="widget-content nopadding ">

                                                    <span class="label label-important"> <h4 align="center"> MAAF , IDEA PROPOSAL BELUM DINILAI, SEHINGGA TIDAK DAPAT DILAKUKAN PERSETUJUAN</h4> </span>

                                                </div>


                                                <!--content here-->
                                            </div>
                                        </div>
                                    </div> 

                                    <?php
                                } else {
                                    ?>

                                    <div class="accordion-group widget-box">
                                        <div class="accordion-heading">
                                            <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGFive" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                                                    <h5>Persetujuan</h5>
                                                </a> </div>
                                        </div>
                                        <div class="collapse accordion-body" id="collapseGFive">
                                            <div class="widget-content"> 
                                                <!--content here-->

                                                <?php
                                                if ($_SESSION['level'] == 'ahmic') {
                                                    ?>


                                                    <div class="widget-content nopadding ">

                                                        <div class="control-group">
                                                            <label class="control-label">Komentar :</label>
                                                            <div class="controls">
                                                                <textarea class="span11" name="komentar_aprove_ahmic"> <?php echo $listing->komentar_aprove_ahmic; ?> </textarea>

                                                            </div>
                                                        </div>
                                                        <h5 align="center"> DENGAN INI SAYA MENYATAKAN IDEA PROPOSAL INI SETUJU ATAU TIDAK SETUJU </h5>
                                                        <div class="control-group">
                                                            <label class="control-label"></label>



                                                            <div class="controls">
                                                                <label>
                                                                    <input type="radio" name="is_aprove_ahmic" value="1" <?php if ($listing->is_aprove_ahmic == 1) {
                                            echo "checked='checked'";
                                        } ?> />
                                                                    Setuju </label>
                                                                <label>
                                                                    <input type="radio" name="is_aprove_ahmic" value="0" <?php if ($listing->is_aprove_ahmic == 0) {
                                            echo "checked='checked'";
                                        } ?> />
                                                                    Tidak Setuju </label>

                                                            </div>

                                                        </div>

                                                    </div>


                                                    <?php
                                                }
                                                ?>

        <?php
        if ($_SESSION['level'] == 'kasie') {
            ?>


                                                    <div class="widget-content nopadding ">

                                                        <div class="control-group">
                                                            <label class="control-label">Komentar :</label>
                                                            <div class="controls">
                                                                <textarea class="span11" name="komentar_aprove_kasie"> <?php echo $listing->komentar_aprove_kasie; ?> </textarea>

                                                            </div>
                                                        </div>
                                                        <h5 align="center"> DENGAN INI SAYA MENYATAKAN IDEA PROPOSAL INI SETUJU ATAU TIDAK SETUJU </h5>
                                                        <div class="control-group">
                                                            <label class="control-label"></label>



                                                            <div class="controls">
                                                                <label>
                                                                    <input type="radio" name="is_aprove_kasie" value="1" <?php if ($listing->is_aprove_kasie == 1) {
                echo "checked='checked'";
            } ?> />
                                                                    Setuju </label>
                                                                <label>
                                                                    <input type="radio" name="is_aprove_kasie" value="0" <?php if ($listing->is_aprove_kasie == 0) {
                echo "checked='checked'";
            } ?> />
                                                                    Tidak Setuju </label>

                                                            </div>

                                                        </div>

                                                    </div>

            <?php
        }
        ?>




                                                <!--content here-->
                                            </div>
                                        </div>
                                    </div> 


                                    <?php
                                }
                                ?>



    <?php
} else if ($_SESSION['level'] == 'foreman') {
    ?>

                                <div class="accordion-group widget-box">
                                    <div class="accordion-heading">
                                        <div class="widget-title"> <a data-parent="#collapse-group" href="#collapseGThree" data-toggle="collapse"> <span class="icon"><i class="icon-circle-arrow-right"></i></span>
                                                <h5>Pemeriksaan & Penilaian</h5>
                                            </a> </div>
                                    </div>
                                    <div class="collapse accordion-body" id="collapseGThree">
                                        <div class="widget-content"> 
                                            <!--content here-->


                                            <div class="widget-content nopadding ">

                                                <div class="control-group">
                                                    <label class="control-label">Komentar :</label>
                                                    <div class="controls">
                                                        <textarea class="span11" name="komentar_foreman" > <?php echo $listing->komentar_foreman; ?> </textarea>

                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Penilaian</label>
                                                    <div class="controls">
                                                        <label>
                                                            <input type="radio"  name="penilaian_foreman" value="a" <?php if ($listing->penilaian_foreman == 'a') {
        echo "checked='checked'";
    } ?> />
                                                            Grade A <a href="javascript::void(0);" onclick="getinfoa();" style="text-decoration:underline;"> Info  </a></label>
                                                        <label>
                                                            <input type="radio" name="penilaian_foreman" value="b" <?php if ($listing->penilaian_foreman == 'b') {
        echo "checked='checked'";
    } ?> />
                                                            Grade B <a href="javascript::void(0);" onclick="getinfob();" style="text-decoration:underline;"> Info </a></label>
                                                        <label>
                                                            <input type="radio" name="penilaian_foreman" value="c" <?php if ($listing->penilaian_foreman == 'c') {
        echo "checked='checked'";
    } ?> />
                                                            Grade C <a href="javascript::void(0);" onclick="getinfoc();" style="text-decoration:underline;"> Info </a></label>
                                                    </div>
                                                </div>

                                            </div>




                                            <!--content here-->
                                        </div>
                                    </div>
                                </div>        


    <?php
}
?>

                        </div>
<?php
if ($_SESSION['level'] != 'karyawan') {
    ?>
                            <div align="center">
                                <span class="label label-important"> PASTIKAN ANDA TELAH MEMBACA DAN MEMERIKSA SEMUA INPUTAN SEBELUM MENYIMPAN PERUBAHAN DATA INI! </span>
                                <br>

                                <div class="col-md-12">
                                    <button type="submit" name="save" id="save" class="btn btn-block btn-primary"> Save </button>
                                </div>
                            </div>
    <?php
}
?>
                </form>
            </div>
        </div>

        <div class="modal fade" id="info_a" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Informasi Nilai (Grade A)</h4>
                    </div>
                    <div class="modal-body">
                        <p>-Perubahan positif dan signifikan terkait langsung terhadap KPI & Pro Seksi</p>
                        <p>-Ide original (implementasi pertama)</p>
                        <p>-Menghasilkan perubahan SOP/OS pada bisnis proses</p>
                        <p>-Wajib mengikuti audisi IP Divisi terkait</p>
                    </div>
                     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div class="modal fade" id="info_b" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Informasi Nilai (Grade B)</h4>
                    </div>
                    <div class="modal-body">
                        <p> -Perbaikan kinerja yang positif dan terkait langsung dengan bisnis proses </p>
                        <p>-Ide terkait langsung dengan KPI section </p>
                        <p>-Ada perbaikan terhadap IK bisnis proses </p>
                    </div>
                     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div class="modal fade" id="info_c" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Informasi Nilai (Grade C)</h4>
                    </div>
                    <div class="modal-body">
                        <p>-Perbaikan kinerja yang positif terkait kondisi yang mendukung aktivitas utama dari bisnis proses</p>
                        <p>-Tidak terkait dengan SOP bisnis proses</p>
                        <p>-Proyek adalah refleksi sederhana dari awareness karyawan terhadap seksi</p>
                    </div>
                     
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!--Footer-part-->
        <div class="row-fluid">
            <div id="footer" class="span12"> 2017 &copy; Matrix Admin. Created by <a href="javascript::void(0);">Tri Nur Diansyah</a> </div>
        </div>
        <!--end-Footer-part-->
        <script type="text/javascript">
            function getinfoa() {
                $('#info_a').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            }
            
            function getinfob() {
                $('#info_b').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            }
            
            function getinfoc() {
                $('#info_c').modal({
                    backdrop: 'static',
                    keyboard: false,
                    show: true
                });
            }


            prototype</script>
        <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/jquery.ui.custom.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/jquery.uniform.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/select2.min.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/matrix.js"></script> 
        <script src="<?php echo base_url('assets/'); ?>js/matrix.tables.js"></script>
    </body>
</html>
