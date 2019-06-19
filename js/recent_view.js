
$(document).ready(function() {
	//$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
	
});
jQuery( document ).ready(function($) {
  //alert('hii');
  var pro_id = $('input[name=pro_id]').val();
  $.ajax({
          type: "POST",
          url: "http://glorywebsdev.com/ecommerce/recent_view.php",
          data:'pro_id= ' + pro_id,
          dataType: "html",
          success: function(res){
            // alert(res);
            // $('#product_list').html(res);
            //alert('done');
              
              
          }
        });
});  
