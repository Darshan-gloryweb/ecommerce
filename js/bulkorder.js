$(document).ready(function(){
$('.business_details').hide();	

$(document).on('click', '.tr_clone_add' , function() {
   var $tr    = $(this).closest('.tr_clone');
    var $clone = $tr.clone();
    $clone.find(':text').val('');
    $tr.after($clone);
	$("#prod_detail, #prod_qty, #brand").on("keyup", function(){
    if($(this).val() != "" && $("#prod_qty").val() != "" && $("#brand").val() != "" ){
        $(".rfq_addbtn").attr("disabled","disabled");
    }
});
});



$('.bus_che').change(function () {
        if (this.checked) {
			 $(this).val(1);
        	$('.business_details').show('slow');
		}else{ 
			$(this).val(0);
            $('.business_details').hide('slow');
		}
    });

$("#bulk_order_form").validate({ 
		
        rules: {           
            firstname: {
                required: true,
                
            },
			email: {
                required: true,
                
            },
			phoneno: {
                required: true,
                
            },
			 "productName[]": "required",
			 "quantity[]" : "required",
			 "Brand[]" : "required",
			
        },
		
		
       	
        submitHandler: function(form) {
            //Your code for AJAX starts   
			 
            values = $("#bulk_order_form").serialize();
			
			
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/bulkorderp.php',
                         type: "post",
                         data: values,
                        success: function(){
                            //alert("success");
                            alert('Submitted successfully');
							$("#bulk_order_form")[0].reset();
                        },
                        error:function(){
                //            alert("failure");
                            alert('There is error while submit');
                        }                
            //Your code for AJAX Ends
        });       
    }
         });

$("#editpasswordform").validate({ 
		
        rules: {           
            
			 "confirm": "required",
			 "new" : "required",
			 "current" : "required",
			
        },
		
		
       	
        submitHandler: function(form) {
            //Your code for AJAX starts   
			 
            values = $("#editpasswordform").serialize();
			
			
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/editpasswordformp.php',
                         type: "post",
                         data: values,
                        success: function(){
                            //alert("success");
                            alert('Submitted successfully');
							$("#editpasswordform")[0].reset();
							
                        },
                        error:function(){
                //            alert("failure");
                            alert('There is error while submit');
                        }                
            //Your code for AJAX Ends
        });       
    }
         });




});