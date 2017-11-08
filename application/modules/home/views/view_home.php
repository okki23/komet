
     <div class="content_middle_middle">
        <div class="slick_slider2">

          <?php
          foreach($slide as $key=>$val){
          echo ' <div class="single_featured_slide">  <img src="'.$val->foto.'" alt="">
          <h2>'.$val->caption_a.'</h2>
          <p>'.$val->caption_b.'</p>
          </div>';   
          }
          ?>
          
        </div>
      </div>

      <br>
      <br>
      &nbsp;
      <br>
      <br>
      
<div class="wow fadeInDown">
          <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#"> Sejarah PCJ Bakaba</a> </h2>
          <div class="single_page_content fadeInDown">

      <br>      
    
          <article>
          <?php 
          echo $con_home->body;
          ?>
          </article>  

          </div>
           
        </div>