 <script language="javascript">
    
	function validateuser(form)
    {				
		if(form.FirstName.value==''){
			alert('Please Enter First Name');	
			form.FirstName.focus();
			return false;
		}
		if(form.LastName.value==''){
			alert('Please Enter Last Name');	
			form.LastName.focus();
			return false;
		}
		if(document.getElementById('aimg').value != "")
		{ 
		var extensions = new Array("jpg","jpeg","gif","png","bmp");
		var image_file = document.getElementById('aimg').value;
		var image_length = document.getElementById('aimg').value.length;
		var pos = image_file.lastIndexOf('.') + 1;
		var ext = image_file.substring(pos, image_length);
		var final_ext = ext.toLowerCase();
		if(extensions.indexOf(final_ext) == -1)
		{
			alert(" Upload User Image with one of the following extensions: "+ extensions.join(', ') +".");
			document.getElementById('aimg')
			return false;
		}
		}
		if(form.username.value==''){
			alert('Please Enter UserName');	
			form.username.focus()
			return false;
		}	
		
		if(form.Email.value == "")
		{
			alert("Please enter your email")
			form.Email.focus()
			return false;
		}
    	if(form.Email.value != "")
    	{
        	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.Email.value))
 			{
 				alert("Invalid email address format.");
 				return false;
 			}
    	}
		if(form.Password.value==''){
				alert("Please Enter Password..");
				return false;
		}
			
		if(form.Password.value!=''){
			if(form.Password.value.length < 6) 
			{
        		alert("Password must contain at least six characters!");
        		form.Password.focus();
        		return false;
      		}
			re = /[0-9]/;
      		if(!re.test(form.Password.value)) 
			{
        		alert("Password must contain at least one number (0-9)");
        		form.Password.focus();
        		return false;
      		}
			re = /[a-z]/;
      		if(!re.test(form.Password.value)) 
			{
        		alert("Password must contain at least one lowercase letter (a-z)");
        		form.Password.focus();
        		return false;
      		}
			re = /[A-Z]/;
      		if(!re.test(form.Password.value)) 
			{
        		alert("Password must contain at least one uppercase letter (A-Z)");
        		form.Password.focus();
        		return false;
      		}
			if (!form.Password.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
			{
				alert("Password must contain at least one Special Character");
        		form.Password.focus();
        		return false;
			}
		}
		else 
		{
      		alert("Password Do Not Match. Please Confirm It.");
      		form.pwd.focus();
      		return false;
    	}
		
    }
	function passwordStrength(password)
{
	document.getElementById('sec').innerHTML="";
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Better";
	desc[3] = "Medium";
	desc[4] = "Strong";
	desc[5] = "Strongest";

	var score   = 0;

	//if password bigger than 6 give 1 point
	if (password.length >= 6) 
	{ 
		score++;
	} 
	else 
	{ 
		 $("#sec").append("<li>Password Must Contain Atleast SIX Character</li>");
	}
	

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) 
	{
		score++;
	}
	else
	{
		$("#sec").append("<li>Password Must Have Lowercase And Uppercase Character.</li>");
	}

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) 
	{
		score++;
	}
	else
	{
		$("#sec").append("<li>Password Must Have Atleast 1 Numeric Value</li>");
	}

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	
	{
		score++;
	}
	else
	{
		$("#sec").append("<li>Password Must Have Atleast One Special Character</li>");
	}

	//if password bigger than 12 give another 1 point
	if (password.length > 12) score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
	
</script>
<style>
#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:250px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}
</style>    