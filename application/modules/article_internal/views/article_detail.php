<h2 class="post_titile"><?php echo $berita->title; ?>  </h2>
            <div class="single_page_content">
              <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Administrator</a> <span><i class="fa fa-calendar"></i><?php echo $berita->pubdate; ?></span> <a href="#"><i class="fa fa-tags"></i><?php echo $berita->slug; ?></a> </div>
              <!-- <img class="img-center" src="../images/550x330x3.jpg" alt=""> -->
              <p> <?php echo $berita->body; ?> </p>
              
            </div>