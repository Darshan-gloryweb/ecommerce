$(document).ready(function () {	  
			$('#login').show().animate({   opacity: 1 }, 2000);
			$('.logo').show().animate({   opacity: 1,top: '40%'}, 800,function(){			
			$('.logo').show().delay(1200).animate({   opacity: 1,top: '12%' }, 300,function(){
				$('.formLogin').animate({   opacity: 1,left: '0' }, 300);
				$('.userbox').animate({ opacity: 0 }, 200).hide();
			 });		

			  })	
			$(".on_off_checkbox").iphoneStyle();
			$('.tip a ').tipsy({gravity: 'sw'});
			$('.tip input').tipsy({ trigger: 'focus', gravity: 'w' });
		});	
	    $('.userload').click(function(e){
			$('.formLogin').animate({   opacity: 1,left: '0' }, 300);			    
			  $('.userbox').animate({ opacity: 0 }, 200,function(){
				  $('.userbox').hide();				
			   });
	    });
	    
	$('#but_login').click(function(e){				
		  if(document.formLogin.username.value == "" || document.formLogin.pwd.value == "")
		  {
			  showError("Please Input Username / Password");
			  $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			  $('.inner').trigger('startRumble');
			  setTimeout('$(".inner").trigger("stopRumble")',500);
			  setTimeout('hideTop()',5000);
			  return false;
		  }	
		  
		  var username=document.formLogin.username.value;
		  var pass=document.formLogin.pwd.value;
		  var xmlhttp;
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
					if(xmlhttp.responseText == "true")
					{
		 				hideTop();
		 				loading('Checking',1);		
		 				setTimeout( "unloading()", 2000 );
		 				setTimeout( "Login()", 2500 );
					}
					else
					{
						 showError("Invalid Username Or Password");
			 			 $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			 			 $('.inner').trigger('startRumble');
			 			 setTimeout('$(".inner").trigger("stopRumble")',500);
			  			setTimeout('hideTop()',5000);
			  			return false;
					}
    			}
  			}
			xmlhttp.open("GET","loginp.php?username="+username+"&pass="+pass,true);
			xmlhttp.send();
		  
});	

function txtlogin()
{
	if(document.formLogin.username.value == "" || document.formLogin.pwd.value == "")
		  {
			  showError("Please Input Username / Password");
			  $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			  $('.inner').trigger('startRumble');
			  setTimeout('$(".inner").trigger("stopRumble")',500);
			  setTimeout('hideTop()',5000);
			  return false;
		  }	
		  
		  var username=document.formLogin.username.value;
		  var pass=document.formLogin.pwd.value;
		  var xmlhttp;
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
					if(xmlhttp.responseText == "true")
					{
		 				hideTop();
		 				loading('Checking',1);		
		 				setTimeout( "unloading()", 2000 );
		 				setTimeout( "Login()", 2500 );
					}
					else
					{
						 showError("Invalid Username Or Password");
			 			 $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			 			 $('.inner').trigger('startRumble');
			 			 setTimeout('$(".inner").trigger("stopRumble")',500);
			  			setTimeout('hideTop()',5000);
			  			return false;
					}
    			}
  			}
			xmlhttp.open("GET","loginp.php?username="+username+"&pass="+pass,true);
			xmlhttp.send();
}		
																 
function Login(){
	
	$("#login").animate({   opacity: 1,top: '49%' }, 200,function(){
		 $('.userbox').show().animate({ opacity: 1 }, 500);
			$("#login").animate({   opacity: 0,top: '60%' }, 500,function(){
				$(this).fadeOut(200,function(){
				  $(".text_success").slideDown();
				  $("#successLogin").animate({opacity: 1,height: "200px"},500);   			     
				});							  
			 })	
     })	
			setTimeout( "window.location.href='index.php'", 3000 );
}


	
$('#alertMessage').click(function(){
	hideTop();
});

function showError(str){
	$('#alertMessage').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	
}

function showSuccess(str){
	$('#alertMessage').removeClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
}

function hideTop(){
	$('#alertMessage').animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });	
}	
function loading(name,overlay) {  
	  $('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
			  if(overlay==1){
				$('#overlay').css('opacity',0.1).fadeIn(function(){  $('#preloader').fadeIn();	});
				return  false;
		 }
	  $('#preloader').fadeIn();	  
 }
 function unloading() {  
		$('#preloader').fadeOut('fast',function(){ $('#overlay').fadeOut(); });
 }
