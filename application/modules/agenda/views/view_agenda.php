<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<div class="wow fadeInDown">
          <h2> <span class="bold_line"><span></span></span> <span class="solid_line"></span> <a class="title_text" href="#"> Agenda PCJ Bakaba</a> </h2>
          <div class="single_page_content fadeInDown">
            <p align="justify"> 
            <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                </thead>
                <tr>
                  <th>No</th>
                  <th>Acara</th>
                  <th>Tempat</th>
                  <th>Waktu</th>
                </tr>
                <tbody>
                <?php
                $no=1;
                foreach($list_data as $key => $val){
                ?>
                <tr>
               
                <td> <?php echo $no; ?> </td>
                <td> <?php echo $val->acara; ?> </td>
                <td> <?php echo $val->tempat; ?> </td>
                <td> <?php echo $val->waktu; ?> </td>
                </tr>
                <?php
                $no++;
                }
                
                ?>
                 </table>
            </p>
          </div>
           
        </div>