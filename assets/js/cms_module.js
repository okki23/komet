//this is all about function with JS 
$(document).ready(function(){
     
    $('#dp1').datepicker({format: 'yyyy-mm-dd'});
    $('#dp2').datepicker({format: 'yyyy-mm-dd'});
    $('#dp3').datepicker({format: 'yyyy-mm-dd'});
    $('#dp4').datepicker({format: 'yyyy-mm-dd'});
    $('#dp5').datepicker({format: 'yyyy-mm-dd'});
    $('#example').DataTable();   
    $("#path_uploadx").on("change",function(){
				var filename = $('#path_uploadx').val().replace(/C:\\fakepath\\/i, '');
				$("#path_upload").val(filename);
			});

    function okki(){
      alert('oke');
    }

});

