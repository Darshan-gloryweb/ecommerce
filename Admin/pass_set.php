 <script language="javascript">
    
	function validate1(form)
    {
        if (form.oldpass.value == "")
        {
            alert("Please Enter Old Password.")
            form.oldpass.focus();
            return false;
        }
		if (form.newpass.value == "")
        {
            alert("Please Enter Your New Password.")
            form.oldpass.focus();
            return false;
        }
		if(form.newpass.value!="" && form.newpass.value == form.confpass.value)
		{
			if(form.newpass.value.length < 6) 
			{
        		alert("Password must contain at least six characters!");
        		form.newpass.focus();
        		return false;
      		}
			re = /[0-9]/;
      		if(!re.test(form.newpass.value)) 
			{
        		alert("Password must contain at least one number (0-9)");
        		form.newpass.focus();
        		return false;
      		}
			re = /[a-z]/;
      		if(!re.test(form.newpass.value)) 
			{
        		alert("Password must contain at least one lowercase letter (a-z)");
        		form.newpass.focus();
        		return false;
      		}
			re = /[A-Z]/;
      		if(!re.test(form.newpass.value)) 
			{
        		alert("Password must contain at least one uppercase letter (A-Z)");
        		form.newpass.focus();
        		return false;
      		}
			if (!form.newpass.value.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )
			{
				alert("Password must contain at least one Special Character");
        		form.newpass.focus();
        		return false;
			}
		}
		else 
		{
      		alert("Password Do Not Match. Please Confirm!");
      		form.newpass.focus();
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