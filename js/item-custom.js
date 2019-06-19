jQuery( document ).ready(function($) {
//alert('zalak');
$('.suc-not').hide();
var pro_brand = $('input[name=pro_brand]').val();
//alert(pro_brand);
$('.brand_name').html('<a href="#">'+pro_brand+'</a>');


$('#most-recent').click(function(){
	//alert('hii');
	var pro_id = $(this).attr("data-attr") ;
	//alert(pro_id);
	//var heigh = 'heigh';
	$.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'pro_id= ' + pro_id+ '&sorting=' +'most-recent-reviw',
				dataType: "html",
				success: function(res){
					// alert(res);
					 $('.review-list').html(res);
					//alert('done');
						
						
				}
		  })});
$('#most-helpful').click(function(){
	//alert('hii');
	var pro_id = $(this).attr("data-attr") ;
	//alert(pro_id);
	//var heigh = 'heigh';
	$.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'pro_id= ' + pro_id+ '&sorting=' +'most-helpful-reviw',
				dataType: "html",
				success: function(res){
					// alert(res);
					 $('.review-list').html(res);
					//alert('done');
						
						
				}
		  })});
$("#filter_select_rating").change(function() {
		var rat_val = $(this).val();
		
		var pro_id = $(this).attr("data-attr") ;
		//alert(pro_id);
        //alert( $('option:selected', this).text() );
		$.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'rat_val= ' + rat_val+ '&filter=' +'filtering'+'&pro_id=' +pro_id,
				dataType: "html",
				success: function(res){
					// alert(res);
					 $('.review-list').html(res);
					//alert('done');
						
						
				}
		  })
    });
$(".like_btn").click(function(){
       
        var ip_add = $(this).attr("data-attr") ;
        var pro_id = $(this).attr("data-value") ;
        var crid = $(this).attr("data-type");
       // alert(crid);
        $.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'ip_add= ' + ip_add+ '&review_action=' +'like' + '&pro_id=' +pro_id+'&crid='+crid,
				dataType: "html",
				success: $.proxy(function(res){
					// alert(res);
					 //$('.review-list').html(res);
					//alert(res);
						
					//$('.like_btn').css('display','none');
//dislike_btn').css('display','none');	
					//$('.btn_div').html("Thanks");
					$(this).parent().html(res);
				}, this)
		  })}); 
$(".dislike_btn").click(function(){
       
        var ip_add = $(this).attr("data-attr") ;
        var pro_id = $(this).attr("data-value") ;
        var crid = $(this).attr("data-type");
        //alert(crid);
        $.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'ip_add= ' + ip_add+ '&review_action=' +'dislike' + '&pro_id=' +pro_id+'&crid='+crid,
				dataType: "html",
				success: $.proxy(function(res){
					// alert(res);
					 //$('.review-list').html(res);
					//alert(res);
					//$('.btn_div').html("Thanks");
					$(this).parent().html(res);
						
				}, this)
		  })
    }); 
$(".review_submit").click(function(){
	 	var pro_id = $('input[name=pro_id]').val();
	 	var descr= $('textarea[name=descr]').val();
	 	var title= $('input[name=title]').val();
	 	var crid = $('input[name=cr_id]').val();
	 	var rating_star = $('input[name=rating_star]').val();
	 	
	 	var pro_name= $('input[name=pro_name]').val();
	 	$.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/sorting_review.php",
				data:'pro_id=' +pro_id+'&descr='+descr+'&title='+title+'&review_submit_form='+'review_submit_form'+'&crid='+crid+ '&rating_star='+rating_star,
				dataType: "html",
				success: function(res){
					//alert(res);
					descr= $('textarea[name=descr]').val('');
					title= $('input[name=title]').val('');
					rating_star = $('input[name=rating_star]').val('');
					$('#stars li').removeClass('selected');
					window.location.href= "http://glorywebsdev.com/ecommerce/products/"+pro_name;
						
						
				}
		  })
	 });

$(".cartbtn").click(function(){
		//$('.cartbtn').hide('slow');
		//$('.loder_img').show('slow');
	 	var pro_id = $('input[name=pro_id]').val();
	 	var qty=$('.input-number').val();
		var price=$('input[name=price_pro]').val();
	 	//alert(qty);
	 	
	 	$.ajax({
				type: "POST",
				
				url: "http://glorywebsdev.com/ecommerce/addtocart.php",
				data:'pro_id=' +pro_id+ '&qty=' +qty+ '&price=' +price,
				dataType: "html",
				success: function(res){
					//alert(res);
					
					var count_val = res;
					$('.cart_count').html(count_val);
					$('.suc-not').show('slow');
					//$('.loder_img').hide();
					setTimeout(function(){
						$('.suc-not').hide('slow');
						//$('.cartbtn').show('slow');
					},3000);
				}
		  })
	 });



});


 
//
//$(document).ready(function() {
//	$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
//	
//});

$(document).ready(function(){
	$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
	
   

    
	
	
	 
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
	});
	$('.input-number').focusin(function(){
	   $(this).data('oldValue', $(this).val());
	});
	$('.input-number').change(function() {
		
		minValue =  parseInt($(this).attr('min'));
		maxValue =  parseInt($(this).attr('max'));
		valueCurrent = parseInt($(this).val());
		
		$('.qty_table').find("td .cc").each(function(index){
		
		var myString  =  $(this).val();
		var sarray= myString.split('-');
		//alert(sarray[0] + '--'+ currentVal +'---'+ sarray[1]);
		if(valueCurrent <= parseInt(sarray[1]) && valueCurrent >= parseInt(sarray[0]) ){
			//$(this).addClass('vv');
			$(this).parent().prev().find(".qty-radio").prop("checked", true);
		}
		});
		
		
		name = $(this).attr('name');
		if(valueCurrent >= minValue) {
			$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
		} else {
			alert('Sorry, the minimum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		if(valueCurrent <= maxValue) {
			$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
		} else {
			alert('Sorry, the maximum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		
		
	});
	$(".input-number").keydown(function (e) {
			// Allow: backspace, delete, tab, escape, enter and .
			if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
				 // Allow: Ctrl+A
				(e.keyCode == 65 && e.ctrlKey === true) || 
				 // Allow: home, end, left, right
				(e.keyCode >= 35 && e.keyCode <= 39)) {
					 // let it happen, don't do anything
					 return;
			}
			// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});

});


$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    //var msg = "";
   	 $("#rating_star").val(ratingValue);
       // msg = "Thanks! You rated this " + ratingValue + " stars.";
    
    responseMessage(msg);
    
  });
  
  
});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}


$(document).ready(function(){
 var slider = $(".item_pro_slider").lightSlider({
		loop:true,
		item:5,
		slideMargin:0,
		controls:true,
		pager:false,
		prevHtml: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
		nextHtml: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		responsive : [
			{
                breakpoint:1199,
                settings: {
                    item:4,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:1024,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:767,
                settings: {
                    item:2,
                    slideMove:1
                  }
            },
            {
                breakpoint:460,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:6,
                  }
            }
        ]
	});
});

 

jQuery(document).ready(function($) {
	var navWrap = $('#leftElement'),
		nav = $('.tiles'),
		startPosition = navWrap.offset().top,
		stopPosition = $('.prod_info').offset().top - nav.outerHeight();
	
	$(document).scroll(function () {
		
		//stick nav to top of page
		var y = $(this).scrollTop();
	
		if (y > startPosition) {
			nav.addClass('sticky-product');
			if (y > stopPosition) {
				nav.css('top', stopPosition - y);
			} else {
				nav.css('top', 0);
			}
		} else {
			nav.removeClass('sticky-product');
		} 
	});
	jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 500) {
            jQuery('.back-to-top').fadeIn(500);
        } else {
            jQuery('.back-to-top').fadeOut(500);
        }
    });
    jQuery('.back-to-top').click(function(event) {
		
		event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, 500);
        return false;
    })

     $(window).scroll(function() {
        if ($(window).scrollTop() >= 500) {
            $('header .pad-lr-30.bg-white').addClass('stickyheader');
        } else {
            $('header .pad-lr-30.bg-white').removeClass('stickyheader');
        }
    });
	
});
jQuery(document).ready(function() {
	$('.xzoom, .item-gal').xzoom({
		
			zoomWidth: 400, title: true, tint: '#333', Xoffset: 15


	});
	
});