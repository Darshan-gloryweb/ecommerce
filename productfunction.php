<?php 
?>
<script src="<?=$frontpath?>/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script>
function get_products(ipp,sortpara)
{
	var itemperpage = ipp;
	var sorts = sortpara; 
	$.ajax({
    url: '<?=$frontpath?>/shop/get_product.php',
    data: {'itemperpage' : itemperpage, 'sorttype' : sorts },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function changepage(val)
{
	var page = val;
	$.ajax({
    url: '<?=$frontpath?>/shop/get_product.php',
    data: {'page' : page },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function changeitemperpage(val)
{
	var perpage = val;
	$.ajax({
    url: '<?=$frontpath?>/shop/get_product.php',
    data: {'perpage' : perpage },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function get_sort(iip,val)
{
	var sorttype = val;
	$.ajax({
    url: '<?=$frontpath?>/shop/get_product.php',
    data: {'ordertype' : sorttype },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function(){	
  $("img.remove_product").click(function(){
	
	//$tr=$(this).closest('tr');
  	$(".modal").css("display","block");
  
  	myData = "shoppingcartitemid="+this.id;
	
	$.ajax({
    type: "POST",    //define the type of ajax call (POST, GET, etc)
    url: "ajaxoperation.php",   //The name of the script you are calling
    data: myData,    //Your data you are sending to the script
	dataType: "html",
    success: function(msg){
		setInterval(function() {
		$(".modal").css("display","none");
		if($.trim(msg) == "no")
		{
			window.location= "cart.php";
	  		
		}
		else if($.trim(msg) == "still")
		{
			window.location= "cart.php";
			//$tr.remove();
		}
		},2000);	
    }
	});
  });
});
function validateQty(form)
{
	var radios = document.getElementsByName("qty");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].value == "" || radios[i].value <= 0) formValid = true;
        i++;        
    }

    if (formValid)
 	{
  		alert("Please Enter Proper Quantity");
  		return false;
 	}
	
}
function validateAddress(form)
{
	if(form.fname.value == "")
	{
		alert('Please Enter FirstName');
		form.fname.focus();
		return false;
	}
	if(form.lname.value == "")
	{
		alert('Please Enter LastName');
		form.lname.focus();
		return false;
	}
	if(form.email.value == "")
	{
		alert('Please Enter LastName');
		form.email.focus();
		return false;
	}
	if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
 		{
 			alert("Invalid Email Address.");
			form.email.focus();
 			return false;
 		}
    }
	if(form.address1.value == "")
	{
		alert('Please Enter Address1');
		form.address1.focus();
		return false;
	}
	if(form.address2.value == "")
	{
		alert('Please Enter address2');
		form.address2.focus();
		return false;
	}
	if(form.city.value == "")
	{
		alert('Please Enter City');
		form.city.focus();
		return false;
	}
	if(form.city.value == "")
	{
		alert('Please Enter City');
		form.city.focus();
		return false;
	}
	if(form.state.value == "")
	{
		alert('Please Select State');
		form.state.focus();
		return false;
	}
	if(form.zipcode.value == "")
	{
		alert('Please Enter Zipcode');
		form.zipcode.focus();
		return false;
	}
	if(form.country.value == "")
	{
		alert('Please Select Country');
		form.country.focus();
		return false;
	}
}
function viewShipping()
{
	if(document.getElementById('ShippingAddress').style.display == "none")
	{
		document.getElementById('ShippingAddress').style.display = "block";
	}
	else
	{
		document.getElementById('ShippingAddress').style.display = "none"
	}
}
function validOrder(form)
{
	if(form.valid.value!="")
	{
		if(form.bfname.value == "")
		{
			alert('Please Enter First Name');
			form.bfname.focus();
			return false;
		}
		if(form.blname.value == "")
		{
			alert('Please Enter Last Name');
			form.blname.focus();
			return false;
		}
		if(form.bcname.value == "")
		{
			alert('Please Enter Company Name');
			form.bcname.focus();
			return false;
		}
		if(form.bemail.value == "")
		{
			alert('Please Enter Email Address');
			form.bemail.focus();
			return false;
		}
		if(form.bemail.value != "")
    	{
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.bemail.value))
 			{
 				alert("Invalid Email Address.");
				form.bemail.focus();
 				return false;
 			}
    	}
		if(form.baddress1.value == "")
		{
			alert('Please Enter Address 1');
			form.baddress1.focus();
			return false;
		}
		if(form.baddress2.value == "")
		{
			alert('Please Enter Address 2');
			form.baddress2.focus();
			return false;
		}
		if(form.bcity.value == "")
		{
			alert('Please Enter City');
			form.bcity.focus();
			return false;
		}
		if(form.bstate.value == "")
		{
			alert('Please Select State');
			form.bstate.focus();
			return false;
		}
		if(form.bzipcode.value == "")
		{
			alert('Please Enter Zipcode');
			form.bzipcode.focus();
			return false;
		}
		if(form.bcountry.value == "")
		{
			alert('Please Select Country');
			form.bcountry.focus();
			return false;
		}
		if(form.bphone.value == "")
		{
			alert('Please Enter Phone');
			form.bphone.focus();
			return false;
		}
		if($('#checkouttype').length!="")
		{
		if(form.checkouttype.value=="register")
		{
			var email = form.bemail.value;
			$.ajax({
    		url: '<?=$frontpath?>/checkduplicate.php',
   			data: {'email' : email},
    		type: "POST",
    		success: function(json) {
			if(json == 'true')
			{
				alert('Email Address Already in Use.\r\n\n Please Enter Another Email Address');
				form.bemail.focus();
				return false;
			}
    		}
  			});
			
			if(form.pass.value == "")
			{
			alert('Please Enter Password');
			form.pass.focus();
			return false;
			}
			if(form.cpass.value == "")
			{
			alert('Please Enter Confirm Password');
			form.cpass.focus();
			return false;
			}
			if(form.pass.value != form.cpass.value)
			{
			alert('Password Do Not Match');
			form.pass.focus();
			return false;
			}
		}
		}
		if(!form.same.checked)
		{
			if(form.sfname.value == "")
		{
			alert('Please Enter First Name');
			form.sfname.focus();
			return false;
		}
		if(form.slname.value == "")
		{
			alert('Please Enter Last Name');
			form.slname.focus();
			return false;
		}
		if(form.scname.value == "")
		{
			alert('Please Enter Company Name');
			form.scname.focus();
			return false;
		}
		if(form.semail.value == "")
		{
			alert('Please Enter Email Address');
			form.semail.focus();
			return false;
		}
		if(form.semail.value != "")
    	{
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.semail.value))
 			{
 				alert("Invalid Email Address.");
				form.semail.focus();
 				return false;
 			}
    	}
		if(form.saddress1.value == "")
		{
			alert('Please Enter Address 1');
			form.saddress1.focus();
			return false;
		}
		if(form.saddress2.value == "")
		{
			alert('Please Enter Address 2');
			form.saddress2.focus();
			return false;
		}
		if(form.scity.value == "")
		{
			alert('Please Enter City');
			form.scity.focus();
			return false;
		}
		if(form.sstate.value == "")
		{
			alert('Please Select State');
			form.sstate.focus();
			return false;
		}
		if(form.szipcode.value == "")
		{
			alert('Please Enter Zipcode');
			form.szipcode.focus();
			return false;
		}
		if(form.scountry.value == "")
		{
			alert('Please Select Country');
			form.scountry.focus();
			return false;
		}
		if(form.sphone.value == "")
		{
			alert('Please Enter Phone');
			form.sphone.focus();
			return false;
		}
		}
		
	}
	if(form.nameoncard.value == "")
	{
		alert('Please Enter Name On The Card');
		form.nameoncard.focus();
		return false;
	}
	if(form.creditCardType.value == "")
	{
		alert('Please Select Your Card');
		form.creditCardType.focus();
		return false;
	}
	if(form.creditCardNumber.value == "")
	{
		alert('Please Enter Card Number');
		form.creditCardNumber.focus();
		return false;
	}
	if(form.expDateMonth.value == "")
	{
		alert('Please Select Expiry Month');
		form.expDateMonth.focus();
		return false;
	}
	if(form.expDateYear.value == "")
	{
		alert('Please Select Expiry Year');
		form.expDateYear.focus();
		return false;
	}
	if(form.cvv2Number.value == "")
	{
		alert('Please Enter Varification Number');
		form.cvv2Number.focus();
		return false;
	}
}
function validateLogin(form)
{
	if(form.username.value == "")
	{
		alert("Please Enter UserName");
		form.username.focus();
		return false;
	}
    if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alert("Invalid Email Address");
 			return false;
 		}
    }
	if(form.password.value == "")
	{
		alert("Please Enter Password");
		form.password.focus();
		return false;
	}
}
function validateRegister(form)
{
	if(form.fname.value == "")
	{
		alert("Please Enter FirstName");
		form.fname.focus();
		return false;
	}
	if(form.lname.value == "")
	{
		alert("Please Enter LastName");
		form.lname.focus();
		return false;
	}
	if(form.username.value == "")
	{
		alert("Please Enter UserName");
		form.username.focus();
		return false;
	}
    if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alert("Invalid Email Address");
 			return false;
 		}
    }
	if(form.password1.value == "")
	{
		alert("Please Enter Password");
		form.password1.focus();
		return false;
	}
	if(form.password2.value == "")
	{
		alert("Please Confirm Your Password");
		form.password2.focus();
		return false;
	}
	if(form.password1.value != form.password2.value)
	{
		alert("Password do not match");
		form.password2.focus();
		return false;
	}
}
function validateGuest(form)
{
	if(form.username.value == "")
	{
		alert("Please Enter Email Address");
		form.username.focus();
		return false;
	}
    if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alert("Invalid Email Address");
 			return false;
 		}
    }
}
function validateAddtocart(form)
{
	if(form.qty.value=="")
	{
		alert('Please Enter Quantity');
		form.qty.focus();
		return false;
	}
	if(form.qty.value <= 0)
	{
		alert('Please Enter Proper Quantity');
		form.qty.focus();
		return false;
	}
}
function getRegisterForm()
{
	
	$('.inside_cart1').css('display','block');
	$('.pay_dis_div').css('display','block');
	$('.mes').css('display','none');
	
	regis = document.createElement('input');
	regis.type ="hidden";
	regis.name ="checkouttype";
	regis.id ="checkouttype";
	regis.value="register";
	
	$('#order').append(regis);
	$('#checkout_type').css('display','none');
	$('#login').css('display','none');
	$('.p').css('display','inline-block');
	$('.p').css('width','100%');
}
function getGuestForm()
{
	$('.inside_cart1').css('display','block');
	$('.pay_dis_div').css('display','block');
	$('.mes').css('display','none');
	
	regis = document.createElement('input');
	regis.type ="hidden";
	regis.name ="checkouttype";
	regis.id ="checkouttype";
	regis.value="guest";
	
	$('#order').append(regis);
	$('#checkout_type').css('display','none');
	$('#login').css('display','none');
	
}

 </script>