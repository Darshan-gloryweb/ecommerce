$(document).ready(function(){
	
	$('.qty_add').click(function () {
		$(this).prev().val(+$(this).prev().val() + 1);
		
		//alert($(this).closest('.cart_row').find('.qty_field').val());
		var qty_field = $(this).closest('.cart_row').find('.qty_field').val();
		var pro_price = $(this).closest('.cart_row').find('.pro_price').attr('data-value');	
		//$(this).find('.pro_total').html('₹'+ pro_price * qty_field); 
		$(this).closest('.cart_row').find('.pro_total').html('₹'+ pro_price * qty_field);
		var aa = pro_price * qty_field;
		$(this).closest('.cart_row').find('.pro_total').attr("data-value",aa);
		
		
		var sum = 0
		$('.cart_row').find(".pro_total").each(function(index){
			var combat = $(this).attr("data-value");
			sum += parseFloat(combat);
		});
		$('.total_amount').html('₹'+sum);
		$('.total_amount').attr("data-value",sum);
		
		$('.final_amount').html('₹'+(sum+49));
		 
	});
	$('.qty_sub').click(function () {
		if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
		
		var qty_field = $(this).closest('.cart_row').find('.qty_field').val();
		var pro_price = $(this).closest('.cart_row').find('.pro_price').attr('data-value');	
		$(this).closest('.cart_row').find('.pro_total').html('₹'+ pro_price * qty_field);
		//$('.pro_total').html('₹'+ pro_price * qty_field); 
		
		var aa = pro_price * qty_field;
		$(this).closest('.cart_row').find('.pro_total').attr("data-value",aa);
		var sum = 0
		$('.cart_row').find(".pro_total").each(function(index){
			var combat = $(this).attr("data-value");
			sum += parseFloat(combat);
		});
		$('.total_amount').html('₹'+sum);
		$('.total_amount').attr("data-value",sum);
		
		$('.final_amount').html('₹'+(sum+49));
		
	});
	
	$('.continue_btn').click(function(){
		window.location= "http://glorywebsdev.com/ecommerce";
		
	})
	
	$('.placeorder_btn').click(function(){
		window.location= "http://glorywebsdev.com/ecommerce/checkout.php";
		
	})
	
	
	$('input:radio[name=promo-code]').change(function() {
		$('#pcode').val(this.value);
    });
	
	
	$(".promotion_appy").click(function() {

	
    var url = "http://glorywebsdev.com/ecommerce/pdiscount.php"; 
	var pcode = $('input[name=pcode]').val();
	var cart_total = $('.total_amount').attr("data-value");
	//alert(pcode);
    $.ajax({
           type: "POST",
           url: url,
           data: 'pcode=' + pcode + '&cart_total=' + cart_total, // serializes the form's elements.
           success: function(data)
           {
               $('.dis_amount').html('₹'+data);
			   $('.dis_amount').attr("data-value",data);
			   var total_amount = $('.total_amount').attr("data-value");
			   var final_amount = parseFloat((total_amount - data)+ 49);
			   //alert(total_amount);
			   //alert(data);
			   //alert(final_amount);
			   $('.final_amount').html('₹' +final_amount);
           }
         });

   
});
	
});