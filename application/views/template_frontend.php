<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?php echo base_url('images/pcjlogo.png'); ?>" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/slick.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
<link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/slick.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<style>
  article>p:nth-of-type(1):first-letter{ 
	float: left; 
	color: black; 
	font-size:5em; 
	line-height:80%;  
	padding-top: 0.05em; 
	padding-right: .05em;
	font-family: Raleway, sans-serif; 
	font-weight: 800;
  text-transform:uppercase;
  text-shadow:.0em .05em 0 grey;
}
/* The following is just for the look of this pen. 
delete it to see just the drop cap */

</style>
 
<script type="text/javascript">
 
  $(document).ready(function() {

  
    $('#example').DataTable();
 

    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }


    var $lightbox = $('#lightbox');
    $('.thumbnail').click(function(){
    $('.modal-body').empty();
    
    var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#myModal').modal({show:true});
  });

  $('[data-target="#lightbox"]').on('click', function(event) {
          var $img = $(this).find('img'), 
              src = $img.attr('src'),
              alt = $img.attr('alt'),
              css = {
                  'maxWidth': $(window).width() - 100,
                  'maxHeight': $(window).height() - 100
              };
      
          $lightbox.find('.close').addClass('hidden');
          $lightbox.find('img').attr('src', src);
          $lightbox.find('img').attr('alt', alt);
          $lightbox.find('img').css(css);
      });
      
      $lightbox.on('shown.bs.modal', function (e) {
          var $img = $lightbox.find('img');
              
          $lightbox.find('.modal-dialog').css({'width': $img.width()});
          $lightbox.find('.close').removeClass('hidden');
      });
  });
  </script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC35_2FnVuPd6D7AZxa077Lh_Jmfb29yg8&callback=initMap"> </script>

<style type="text/css">
  
#lightbox .modal-content {
    display: inline-block;
    text-align: center;   
}

#lightbox .close {
    opacity: 1;
    color: rgb(255, 255, 255);
    background-color: rgb(25, 25, 25);
    padding: 5px 8px;
    border-radius: 30px;
    border: 2px solid rgb(255, 255, 255);
    position: absolute;
    top: -15px;
    right: -55px;
    
    z-index:1032;
}
      .lightbox{
  
        z-index: 1041;
  
      }
  
      .small-img{
  
        width: 100px;height: 100px;
  
      }
  
</style>

<!--fancybox-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.js"></script>
<!--fancybox-->

<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>

<div id="preloader">
<div id="status">&nbsp;</div>
</div>

<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">

<div id="navarea">
<div class="table-responsive">
<img src="<?php echo base_url('images/newbann.png'); ?>"  class="img-responsive" >
<!-- 
  <table class="table" border="0" style="width:100%;">
          <tr>
            <td style="width:15%;"> <img src="images/pcjlogo.png" class="img-responsive" style="display:block; float:right; width:100%; height:auto;">  </td>
            <td style="width:25%;"> <a class="logo" style="color:#fbf100;" href="index.html">PCJ<strong class="strokeme">Bakaba</strong> <span style="color:#ff0000;">Palanta Community Jakarta</span></a> </td>
            <td style="width:65%;"> <img src="images/iklan_bann.gif" class="img-responsive" style="display:block; float:right; width:100%; height:auto;"> </td>
          </tr>
</table>
-->
</div>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav custom_nav">
          
          <li class=""><a href="<?php echo base_url('home'); ?>"> <i class="fa fa-home fa-fw" aria-hidden="true"></i>  &nbsp; Home</a></li>
          
          <li class=""><a href="<?php echo base_url('profile'); ?>"> <i class="fa fa-university fa-fw" aria-hidden="true"></i> &nbsp; Profile</a></li>
          
          <li class=""><a href="<?php echo base_url('visi_misi'); ?>"> <i class="fa fa-book fa-fw" aria-hidden="true"></i> &nbsp; Visi Misi</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('foto_front'); ?>">Foto</a></li>
              <li><a href="<?php echo base_url('video_front'); ?>">Video</a></li>
            </ul>
          </li>
          
          <li class=""><a href="<?php echo base_url('agenda'); ?>"> <i class="fa fa-newspaper-o fa-fw" aria-hidden="true"></i> &nbsp; Agenda Kegiatan</a></li>
          <li class=""><a href="<?php echo base_url('contact'); ?>"> <i class="fa fa-address-card-o fa-fw" aria-hidden="true"></i> &nbsp; Contact</a></li>
          <li class=""><a href="<?php echo base_url('login'); ?>"> <i class="fa fa-lock fa-fw" aria-hidden="true"></i> &nbsp; Login</a></li>
          <form class="navbar-form navbar-right" style="margin-right:-10px;" method="POST" action="<?php echo base_url('login/auth'); ?>">
          <div class="form-group">
            <input type="text" style="color:#000; width:150%;" class="form-control" placeholder="Search News & Event Here...">
          </div>
          <button type="submit" class="btn btn-default"> <i class="fa fa-search fa-fw" aria-hidden="true"></i> Search</button>
        </form>
        </ul>
      </div>
    </div>
  </nav>
</div>
<!--call the content-->



<section id="mainContent">
  
  <div class="content_middle">
    
    
  </div>
  <div class="content_bottom">
    <div class="col-lg-8 col-md-8">
      <div class="content_bottom_left">
        <?php
        echo $this->load->view($content);
        ?> 
      </div>
    </div>
    <div class="col-lg-4 col-md-4">

    <div style="text-align:center;padding:1em 0;"> <h3><a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/timezone/asia--jakarta"><span style="color:gray;">Current local time in</span><br />Asia/Jakarta</a></h3> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FJakarta" width="100%" height="115" frameborder="0" seamless></iframe> </div>
    <hr>
    <br>
    <!-- weather widget start --><div id="m-booked-bl-simple-44610"> <div class="booked-wzs-160-110 weather-customize" style="background-color:#137AE9;width:160px;" id="width1"> <div class="booked-wzs-160-110_in"> <a target="_blank" class="booked-wzs-top-160-110" href="http://www.booked.net/"><img src="//s.bookcdn.com/images/letter/s5.gif" alt="booked.net" /></a> <div class="booked-wzs-160-data"> <div class="booked-wzs-160-left-img wrz-18"></div> <div class="booked-wzs-160-right"> <div class="booked-wzs-day-deck"> <div class="booked-wzs-day-val"> <div class="booked-wzs-day-number"><span class="plus">+</span>26</div> <div class="booked-wzs-day-dergee"> <div class="booked-wzs-day-dergee-val">&deg;</div> <div class="booked-wzs-day-dergee-name">C</div> </div> </div> <div class="booked-wzs-day"> <div class="booked-wzs-day-d"><span class="plus">+</span>30&deg;</div> <div class="booked-wzs-day-n"><span class="plus">+</span>26&deg;</div> </div> </div> <div class="booked-wzs-160-info"> <div class="booked-wzs-160-city">Jakarta</div> <div class="booked-wzs-160-date">Thursday, 19</div> </div> </div> </div> <a target="_blank" href="http://www.booked.net/weather/jakarta-18977" class="booked-wzs-bottom-160-110"> <div class="booked-wzs-center"><span class="booked-wzs-bottom-l"> See 7-Day Forecast</span></div> </a> </div> </div> </div><script type="text/javascript"> var css_file=document.createElement("link"); css_file.setAttribute("rel","stylesheet"); css_file.setAttribute("type","text/css"); css_file.setAttribute("href",'https://s.bookcdn.com/css/w/booked-wzs-widget-160.css?v=0.0.1'); document.getElementsByTagName("head")[0].appendChild(css_file); function setWidgetData(data) { if(typeof(data) != 'undefined' && data.results.length > 0) { for(var i = 0; i < data.results.length; ++i) { var objMainBlock = document.getElementById('m-booked-bl-simple-44610'); if(objMainBlock !== null) { var copyBlock = document.getElementById('m-bookew-weather-copy-'+data.results[i].widget_type); objMainBlock.innerHTML = data.results[i].html_code; if(copyBlock !== null) objMainBlock.appendChild(copyBlock); } } } else { alert('data=undefined||data.results is empty'); } } </script> <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/weather/info?action=get_weather_info&ver=6&cityID=18977&type=1&scode=124&ltid=3458&domid=w209&anc_id=28891&cmetric=1&wlangID=1&color=137AE9&wwidth=160&header_color=ffffff&text_color=333333&link_color=08488D&border_form=1&footer_color=ffffff&footer_text_color=333333&transparent=0"></script><!-- weather widget end -->
    <br>
      <div class="content_bottom_right">
        <div class="single_bottom_rightbar">
          <h2>Kiriman Terkini</h2>
          <ul class="small_catg popular_catg wow fadeInDown">
          
          		<?php 
              $no = $this->uri->segment('3') + 1;
              foreach($list as $u){ 
              
              echo '<li>
                <div class="media wow fadeInDown"> <a href='.base_url('article/article_detail/'.$u->id).' class="media-left"> </a>
                  <div class="media-body">
                    <h4 class="media-heading"><a href='.base_url('article/article_detail/'.$u->id).'>'.$u->title.' </a></h4>
                    <p>'.preg_replace("/<img[^>]+\>/i", "", limit_to_numwords($u->body,30)).' </p>
                    <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Administrator</a> <span><i class="fa fa-calendar"></i>'.tanggalan($u->pubdate).'</span> <a href="#"><i class="fa fa-tags"></i>'.$u->slug.'</a> </div>
                  </div>
                </div>
              </li>';
              }
              ?>
            </ul>
 
           
          <div class="pagination_area">
          <nav>
              <?php 
              echo $this->pagination->create_links();
              ?>
             
          </nav>
          </div>
         
           
          </ul>
        </div>
         
         
      </div>
    </div>
  </div>
</section>
</div>

 


<footer id="footer">   
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2017 <a href="index.html">PCJ Bakaba</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY PCJ Bakaba</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>
</html>