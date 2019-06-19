// JavaScript Document
$(document).ready(function () {
	$('.address_edit_btn').click(function(){
		
		
		var CustomerAddressID = $('input[type=radio][name=checkoutAddressIndex]:checked').attr('id');
		jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/orderdetails.php',
                         type: "post",
						 dataType: "JSON",
                         data:{CustomerAddressID:CustomerAddressID,cstate : 2},
                         success:function(result){
							 //alert(result);
							$('#bfname').val(result.FirstName);
							$('#bemail').val(result.Email);
							$('#b1phone').val(result.Phone);
							$('#bzipcode').val(result.Zipcode);
							$('#baddress1').val(result.AddressLine1);
							$('#bcity').val(result.City);
							$('#country').val(result.CountryID);
							$('#bstate').val(result.StateID);
							$('#blandmark').val(result.landmarck);
							$('#bgstin').val(result.gstin);
                            $('#bbb').val(result.bbb);
                            $('#cusaddid').val(result.cusaddid);
  if($('#bfname').val()) {
							 	$('#bfname').addClass('isFocus');
							 }
 if($('#bemail').val()) {
							 	$('#bemail').addClass('isFocus');
							 }
 if($('#b1phone').val()) {
							 	$('#b1phone').addClass('isFocus');
							 }
 if($('#bzipcode').val()) {
							 	$('#bzipcode').addClass('isFocus');
							 }
 if($('#baddress1').val()) {
							 	$('#baddress1').addClass('isFocus');
							 }
 if($('#bcity').val()) {
							 	$('#bcity').addClass('isFocus');
							 }
 if($('#bcountry').val()) {
							 	$('#bcountry').addClass('isFocus');
							 }
 if($('#bstate').val()) {
							 	$('#bstate').addClass('isFocus');
							 }
 if($('#blandmark').val()) {
							 	$('#blandmark').addClass('isFocus');
							 }
 if($('#bgstin').val()) {
							 	$('#bgstin').addClass('isFocus');
							 }
                            
							
							
							
							
							
						}              
            //Your code for AJAX Ends
        }); 
		
	});
	$('.address_dlt_btn').click(function(){
		
		
		var CustomerAddressID = $('input[type=radio][name=checkoutAddressIndex]:checked').attr('id');
		
		jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/orderdetails.php',
                         type: "post",
						 dataType: "JSON",
                         data:{CustomerAddressID:CustomerAddressID,cstate : 3},
                         success:function(result){
							 //alert(result);
							 window.location = "http://glorywebsdev.com/ecommerce/checkout.php";
							 
						}              
            //Your code for AJAX Ends
        }); 
		
	})
	
	$("#address_form").validate({ 
        rules: {           
            bfname: {
                required: true,
                
            },
			bemail: {
                required: true,
                
            },
			bphone: {
                required: true,
                
            },
			bzipcode: {
                required: true,
                
            },
			baddress1: {
                required: true,
                
            },
			bcity: {
                required: true,
                
            },
			bcountry: {
                required: true,
                
            },
			bstate: {
                required: true,
                
            },
			
        },
		errorPlacement: function(error, input) {
if (input.attr("name") == "bfname")
{
        error.insertAfter(".name-field");
}
if (input.attr("name") == "bemail")
{
        error.insertAfter(".mail-field");
}
if (input.attr("name") == "bphone")
{
        error.insertAfter(".phone-field");
}
if (input.attr("name") == "bzipcode")
{
        error.insertAfter(".pincode-field");
}
if (input.attr("name") == "baddress1")
{
        error.insertAfter(".add-field");
}
if (input.attr("name") == "bcity")
{
        error.insertAfter(".city-field");
}
if (input.attr("name") == "bcountry")
{
        error.insertAfter(".country-field");
}
if (input.attr("name") == "bstate")
{
        error.insertAfter(".state-field");
}
    },
		
       	
        submitHandler: function(form) {
            //Your code for AJAX starts       
            values = $("#address_form").serialize();
            jQuery.ajax({
                         url:'http://glorywebsdev.com/ecommerce/orderdetails.php?cstate=1',
                         type: "post",
                         data: values,
                        success: function(){
                            //alert("success");
                            //alert('Submitted successfully');
                        },
                        error:function(){
                //            alert("failure");
                            //alert('There is error while submit');
                        }                
            //Your code for AJAX Ends
        });       
    }
         });
});	