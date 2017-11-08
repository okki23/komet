<div class="wow fadeInDown">
<h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#"> Gallery video PCJ </a> </h2>
<div class="single_page_content fadeInDown">
  <p align="justify"> 
  
  


 
  <div class="row">

  

    <?php
    foreach($con_video_front as $key => $val){
      echo '
      
      <div class="col-md-6">
      
      <video width="300" height="150" controls>
      <source src="'.$val->video.'" type="video/mp4">
      Your browser does not support the video tag.
      </video> 
      <b align="center" style="text-align:center;">'.$val->caption.'</b>
      <br>
      </div> ';
    }
    ?>

   
       
    <hr>
   
    <hr>
   </div> 
  </p>
</div>
 
</div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal">×</button>
<h3 class="modal-title">Heading</h3>
</div>
<div class="modal-body">
<h4> </h4>
</div>
<div class="modal-footer">
<button class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
