<?php //include('db.php'); ?>
<script type="text/javascript" src="<?=$frontpath?>/js/alertify.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/js/alertify.min.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/js/jquery-1.7.2.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?=$frontpath?>/css/alertify.core.css" />
<link rel="stylesheet" type="text/css" href="<?=$frontpath?>/css/alertify.default.css" />
<!-- Autocomplete -->
<script type="text/javascript" src="<?=$frontpath?>/autocomplete/autocomplete.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/autocomplete/dimensions.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/autocomplete/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?=$frontpath?>/autocomplete/autocomplete.css" />
<script type="text/javascript">
	$(function(){
	    setAutoComplete("search1", "results", "<?=$frontpath?>/autocomplete/autocomplete.php?part=");
		$('.selected ul li').click( function() {
				alert('hiii');
				alert(this.attr('data-value'));
				
				return false;
				//acSearchField.val(this.childNodes[0].childNodes[1].value);

				
			});
	});
</script>
<!-- Autocomplete -->
<script type="text/javascript">
function validateAddtocart(form)
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
    alertify.alert("Please Enter Proper Quantity");
    return false;
  }
}
function validatecart(form)
{
	var radios = document.getElementsByName("quantity");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].value == "" || radios[i].value <= 0) formValid = true;
        i++;        
    }

    if (formValid)
  {
    alertify.alert("Please Enter Proper Quantity");
    return false;
  }
}
function validateq()
{
	 var cnt=0;
 $('.uqty').each(function(i, obj) {
 if(obj.value == "" || obj.value <=0 )
 {
  cnt++;
 }
 });
 if(cnt != 0)
 {
 alertify.alert('Please Enter Proper Quantity');
  return false;
 }
}
function viewpop()
{
 <?php
 if(!isset($_SESSION['Email']))
 {
  ?>
 alertify.alert('Please Login To Tell a Friend');
  <?php
 }
 else
 {
  ?>
   window.open("<?=$frontpath?>/friend.php","MsgWindow","width=500,height=400,top=150,left=300");
  <?php
 } 
 ?>
}
function tellfriend(form)
{
  if(form.email.value == "")
 {
  alertify.alert("Please Enter your Email");
  form.email.focus();
  return false;
 }
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
   {
    alertify.alert("Invalid email address format.");
    return false;
   }
    }
}
function validateLogin(form)
{
	if(form.username.value == "")
	{
		alertify.alert("Please Enter UserName");
		form.username.focus();
		return false;
	}
    if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alertify.alert("Invalid Email Address");
 			return false;
 		}
    }
	if(form.password.value == "")
	{
		alertify.alert("Please Enter Password");
		form.password.focus();
		return false;
	}
}
function validateRegister(form)
{
	if(form.username.value == "")
	{
		alertify.alert("Please Enter UserName");
		form.username.focus();
		return false;
	}
    if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alertify.alert("Invalid Email Address");
 			return false;
 		}
    }
	if(form.password1.value == "")
	{
		alertify.alert("Please Enter Password");
		form.password1.focus();
		return false;
	}
	if(form.password2.value == "")
	{
		alertify.alert("Please Confirm Your Password");
		form.password2.focus();
		return false;
	}
	if(form.password1.value != form.password2.value)
	{
		alertify.alert("Password do not match");
		form.password2.focus();
		return false;
	}
}
function Validate1(form)
	{
	if(form.fname.value == "")
	{
		
		alertify.alert("Please Enter First Name");
		form.fname.focus();
		return false;
	}
    if(form.lname.value == "")
	{
		alertify.alert("Please Enter Last Name");
		form.lname.focus();
		return false;
	}
	if(form.address.value == "")
	{
		alertify.alert("Please Enter Address");
		form.address.focus();
		return false;
	}
	if(form.city.value == "")
	{
		alertify.alert("Please Enter City");
		form.city.focus();
		return false;
	}
	if(form.contact.value == "")
	{
		alertify.alert("Please Enter Contact No");
		form.contact.focus();
		return false;
	}
    if(form.email.value == "")
	{
		alertify.alert("Please Enter Your Email");
		form.email.focus();
		return false;
	}
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
 		{
 			alertify.alert("Invalid Email Address Format.");
 			return false;
 		}
    }
    if(form.message.value == "")
	{
		
		alertify.alert("Please Enter Message");
		form.message.focus();
		return false;
	}
	
	//Ajax
	form.waiting.style.visibility='visible';
	var t=setTimeout(function(){send_contact1(form)},3000);
	
	//Ajax
	}
	function send_contact1(form)
	{
		
			var fname=form.fname.value;
			var lname=form.lname.value;
			var address=form.address.value;
			var city=form.city.value;
			var contact=form.contact.value;
			var email=form.email.value;
			var message=form.message.value;
	       if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
				
  			}
		  else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
			 xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
					
						form.waiting.style.visibility='hidden';
						document.getElementById('sucres').innerHTML=xmlhttp.responseText;
				
				}
  			}
			
			xmlhttp.open("GET","contactusp.php?fname="+fname+"&lname="+lname+"&address="+address+"&city="+city+"&contact="+contact+"&email="+email+"&message="+message,true);
			xmlhttp.send();
	}
</script>
<script type="text/javascript">
function Validatefeedback(form)
	{
	if(form.fname.value == "")
	{
		alertify.alert("Please Enter First Name");
		form.fname.focus();
		return false;
	}
    if(form.lname.value == "")
	{
		alertify.alert("Please Enter Last Name");
		form.lname.focus();
		return false;
	}
	if(form.city.value == "")
	{
		alertify.alert("Please Enter City");
		form.city.focus();
		return false;
	}
	if(form.contact.value == "")
	{
		alertify.alert("Please Enter Contact No");
		form.contact.focus();
		return false;
	}
    if(form.email.value == "")
	{
		alertify.alert("Please Enter Your Email");
		form.email.focus();
		return false;
	}
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
 		{
 			alertify.alert("Invalid Email Address Format.");
 			return false;
 		}
    }
    if(form.message.value == "")
	{
		alertify.alert("Please Enter Message");
		form.message.focus();
		return false;
	}
	
	}
 
</script>
<script type="text/javascript">
 function validate(form)
 {
  if( form.degree.value == "" && form.subject.value == "" && form.zip.value == "Enter Zip Code")
  {
   alert('Please Select At Least One Field To Get Results');
   form.degree.focus();
   return false;
  }
 }
 function checkno(no){
 var n = no.value;
 var i;
 var arr = "0123456789";
 for(i=0;i<n.length;i++){
  if(arr.indexOf(n[i]) == -1){
   alert('Please enter only numbers.');
   no.value = n.substring(0,n.length-1);
  } 
 }
}
function searchitem(form)
{

	if(form.search1.value =="" || form.search1.value == "Search....")
	{
		alertify.alert("Please Enter Some Keyword")
		form.search1.focus()
		return false;
	}
}
function validatereview(form)
{

	if(form.fname.value == "")
	{
		alert("Please enter First Name")
		form.fname.focus()
		return false;
	}
	if(form.lname.value == "")
	{
		alert("Please enter last name")
		form.lname.focus()
		return false;
	}
    if(form.email.value == "")
	{
		alert("Please enter your email")
		form.email.focus()
		return false;
	}
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
 		{
 			alert("Invalid email address format.");
 			return false;
 		}
    }
    if(form.rating.value == "")
	{
		alert("Please Select Rating.")
		form.rating.focus()
		return false;
	}
	if(form.comment.value == "")
	{
		alert("Please enter Some Review")
		form.comment.focus()
		return false;
	}
			var fname=form.fname.value;
			var lname=form.lname.value;
			var rating=form.rating.value;
			var email=form.email.value;
			var message=form.comment.value;
			var pid = form.hidpid.value;
			var url = form.url.value;
	       if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
				
  			}
		  else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
			 xmlhttp.onreadystatechange=function()
  			{
  				if (xmlhttp.readyState==4 && xmlhttp.status==200)
    			{
					
						if(xmlhttp.responseText== 'True')
						{
							
							el = document.getElementById("overlay1");
							el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
							window.location = url;
						}
				
				}
  			}
			xmlhttp.open("GET","<?=$frontpath?>/review.php?fname="+fname+"&lname="+lname+"&rating="+rating+"&email="+email+"&message="+message+"&pid="+pid,true);
			xmlhttp.send();
	
}
function viewreviewdiv()
{
	el = document.getElementById("overlay1");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}
function close_modal1() {
	el = document.getElementById("overlay1");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
}

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){	
  $(".remove_product").click(function(){
	
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
  
  $(window).scroll(function(){
	  
	  <?php if(basename($_SERVER['PHP_SELF']) == "product.php") { ?>
	scrollMore1();
	<?php } /*else if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>
	scrollMore();
	<?php }*/ ?>
  
});
});
function scrollMore(){
	var tt = $(document).height() - $(window).height();
	var ttt = tt - 600;
	if($(window).scrollTop() >= ttt){
	var offset = $('[id^="myData_"]').length; // here we find out total records on page.
	var records = $(".allData").text();
	$(window).unbind("scroll");
		if(records != offset){
			$("#loaderImg").css('display','inline-block');
			setTimeout(abc,500);
		}
	}
}
function scrollMore1(){
	var ts = $(document).height() - $(window).height();
	var tts = ts - 300;
	if($(window).scrollTop() >= ($(document).height()-900)){
	var offset = $('[id^="myData_"]').length; // here we find out total records on page.
	var records = $(".allData").text();
	$(window).unbind("scroll");
		if(records != offset){
			$("#loaderImg").css('display','inline-block');
			setTimeout(abc,500);
		}
	}
}
function abc()
{
	<?php if(basename($_SERVER['PHP_SELF']) == "product.php") { ?>
	var offset = $('[id^="myData_"]').length; 
	var cid = $('#cid').val();
	loadMoreData1(offset,cid); 
	<?php } /*else if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>
	var offset = $('[id^="myData_"]').length; 
	loadMoreData(offset);
	<?php }*/ ?>
}

function loadMoreData(offset){
	$.ajax({
		type: 'get',
		async:false,
		url: 'getMoreData.php',
		data: 'offset='+offset,
		success: function(data){
			$("#loaderImg").css('display','none');
			$(".loadData :last").after(data);
		},
		error: function(data){
			alert("ajax error occured…"+data);
		}
	}).done(function(){
		$(window).bind("scroll",function(){
		scrollMore();	
	});
	});
}
function loadMoreData1(offset,cid){
	$.ajax({
		type: 'get',
		async:false,
		url: '<?=$frontpath?>/getMoreData1.php',
		data: 'offset='+offset+"&cid="+cid,
		success: function(data){
			$("#loaderImg").css('display','none');
			$(".loadData :last").after(data);
		},
		error: function(data){
			alert("ajax error occured…"+data);
		}
	}).done(function(){
		$(window).bind("scroll",function(){
		scrollMore1();	
	});
	});
}
<!-- WishList -->
function addToWishList()
{
 <?php
 if(!isset($_SESSION['Email']))
 {
  ?>
 alertify.alert('Please Login To Add WishList');
  <?php
 }
 else
 { ?>
 	var dt = document.getElementById('wlist');
	var id = dt.getAttribute('data');
	 $.ajax({
    url: '<?=$frontpath?>/wishlist.php',
    data: {'id' : id },
    type: "POST",
    success: function(json) {
	alertify.alert(json);
    }
   });
		
	 <?php
 } 
 ?>
}
function deleteList(ids)
{
	var dt = document.getElementById(ids);
	var id = dt.getAttribute('data');
	 $.ajax({
    url: '<?=$frontpath?>/deletewishlist.php',
    data: {'id' : id },
    type: "POST",
    success: function(json) {
		if(json == "Deleted")
		{
			location.reload();
		}
		else if(json == "NotDeleted")
		{
			alertify.alert("Item Could Not Delete From WishList");
		}
    }
   });
}
<!-- WishList -->
<!-- Validate Promotion Code -->
function validatePromotion(form)
{
	if(form.pcode.value == "")
	{
		alertify.alert('Please Enter Promotion Code');
		form.pcode.focus();
		return false;
	}
}
<!-- Validate Promotion Code -->
<!-- Validate Gift Certificate Code-->
function validateGiftcertificate()
{
	alert('zalak');
	if(document.getElementById('gcode').value == "")
	{
		alertify.alert('Please Enter Gift Certificate Code');
		document.getElementById('gcode').focus();
		return false;
	}
	var tot = document.getElementById('carttotal').value;
	var cod = document.getElementById('gcode').value;
	var des = document.getElementById('gdescr').value;
	
	alert('pppp');
	$.ajax({
    url: '<?=$frontpath?>/gdiscount.php',
    data: {'tot' : tot,'gcode' : cod,'descr' : des},
    type: "POST",
	dataType: 'html',
    success: function(d) 
	{
		alert(d);
		window.location = 'cart.php?gmsg='+d;
		//alertify.alert(d)
		//setTimeout(function(){ location.reload()},2000);
    }
   });
}
<!-- Validate Gift Certificate Code -->
 </script>
 
 <?php
 function countProduct($id)
 {
	 $sql = "Select count(*) as cnt from product where Status=1 and CategoryID=".$id;
	 $res = mysqli_query($dbLink,$sql) or die ('Could Not Select Count');
	 $cnt = $res->fetch_assoc();
	 return $cnt['cnt'];
 }
 ?>
 <script type="text/javascript">
function Validateenquiry(form)
 {
 if(form.fname.value == "")
 {
  alertify.alert("Please Enter First Name");
  form.fname.focus();
  return false;
 }
    if(form.lname.value == "")
 {
  alertify.alert("Please Enter Last Name");
  form.lname.focus();
  return false;
 }
 if(form.city.value == "")
 {
  alertify.alert("Please Enter City");
  form.city.focus();
  return false;
 }
 if(form.contact.value == "")
 {
  alertify.alert("Please Enter Contact No");
  form.contact.focus();
  return false;
 }
    if(form.email.value == "")
 {
  alertify.alert("Please Enter Your Email");
  form.email.focus();
  return false;
 }
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
   {
    alertify.alert("Invalid Email Address Format.");
    return false;
   }
    }
    
    if(form.message.value == "")
 {
  alertify.alert("Please Enter Message");
  form.message.focus();
  return false;
 }

  if(form.hidrandval.value != form.vcode.value)
    {
       alertify.alert("Invalid code")
       return false;
    }
 }
 
</script>
<script type="text/javascript">
function Validatefeedback(form)
 {
 if(form.fname.value == "")
 {
  alertify.alert("Please Enter First Name");
  form.fname.focus();
  return false;
 }
    
 

 if(form.contact.value == "")
 {
  alertify.alert("Please Enter Contact No");
  form.contact.focus();
  return false;
 }
    if(form.email.value == "")
 {
  alertify.alert("Please Enter Your Email");
  form.email.focus();
  return false;
 }
    if(form.email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.email.value))
   {
    alertify.alert("Invalid Email Address Format.");
    return false;
   }
    }
var radios = document.getElementsByName("ratings");
    var formValid = false;
    var val='';
    var i = 0;
   while (!formValid && i < radios.length) {
        if (radios[i].checked)
  {
   formValid = true;
   val = radios[i].value;
  }
        i++;        
    }
    if (!formValid)
 {
  alertify.alert("Please Give Ratings");
     return false;
 }
    if(form.message.value == "")
 {
  alertify.alert("Please Enter Message");
  form.message.focus();
  return false;
 }
 }
 function Refreshchange() {
 var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
 var string_length = 5;
 var randomstring = '';
 for (var i=0; i<string_length; i++) {
  var rnum = Math.floor(Math.random() * chars.length);
  randomstring += chars.substring(rnum,rnum+1);
 }

    document.getElementById("captchadiv").innerHTML = randomstring;
    document.getElementById("hidrandval").value = randomstring;
}
function validateForgot(form)
{
	if(form.username.value == "")
	{
		alertify.alert("Please Enter UserName Or Email");
		form.username.focus();
		return false;
	}
	if(form.username.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.username.value))
 		{
 			alertify.alert("Invalid Email Address");
 			return false;
 		}
    }
}
</script>
