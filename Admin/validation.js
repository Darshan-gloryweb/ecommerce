// JavaScript Document
function chkName(name)
{		
	var checkOK = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890_-";
	var checkStr = name.value;
	var allValid = true;

	for (i = 0;  i < checkStr.length;  i++)
	{	
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++)
		if (ch == checkOK.charAt(j))
		break;

		if (j == checkOK.length)
		{
			allValid = false;
			break;
		}			
	}		
	if (!allValid)
	{						
		return(false);
	}
	return(true);
}

function echeck(str) 
{
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail Address")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail Address")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
			alert("Invalid E-mail Address")
			return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
			alert("Invalid E-mail Address")
			return false
		 }
		 //alert(str.indexOf(dot,(ldot+1)))
		 //alert(ldot+1);
		 //alert(lstr);
		 if (str.indexOf(dot,(ldot+1))>0)
		 {
			if(ldot+1 == str.indexOf(dot,(ldot+1)))
			{
				alert("Invalid E-mail Address")
				return false
			}
			else if(str.indexOf(dot,(ldot+1))>=lstr-1)
			{
				alert("Invalid E-mail Address")
				return false
			}
		  }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
			alert("Invalid E-mail Address")
			return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
			alert("Invalid E-mail Address")
			return false
		 }

		 if (str.indexOf(" ")!=-1){
			alert("Invalid E-mail Address")
			return false
		 }

		 return true
}



function chkNum(num)
{		
	var checkOK = "1234567890.";
	var checkStr = num.value;
	var allValid = true;

	for (i = 0;  i < checkStr.length;  i++)
	{	
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++)
		if (ch == checkOK.charAt(j))
		break;

		if (j == checkOK.length)
		{
			allValid = false;
			break;
		}			
	}		
	if (!allValid)
	{						
		return(false);
	}
	return(true);
}

function chkImage(img)
{
	var checkOK = ".jpg";
	var checkStr = img.value;
	var allValid = true;
	
	var ext = "";
	var j=0;
			
	for (i=(checkStr.length)-4;i<checkStr.length;i++)
	{	
		if(j == 0)
		{			
			ch = checkStr.charAt(i);
			j++;
		}
		else
		{
			ch = ch + checkStr.charAt(i);
		}
		
	}									
		
	if(ch != ".jpg" && ch != ".JPG" && ch != "jpeg" && ch != "JPEG" && ch != ".gif" && ch != ".GIF" && ch != ".png" && ch != ".PNG")
	{
		return false;
	}
	
	return(true);
}
function chkImagePdf(img)
{
	var checkOK = ".jpg";
	var checkStr = img.value;
	var allValid = true;

	var ext = "";
	var j=0;

	for (i=(checkStr.length)-4;i<checkStr.length;i++)
	{
		if(j == 0)
		{
			ch = checkStr.charAt(i);
			j++;
		}
		else
		{
			ch = ch + checkStr.charAt(i);
		}

	}

    if(ch != ".jpg" && ch != ".JPG" && ch != ".gif" && ch != ".GIF" && ch != ".pdf" && ch != ".PDF" && ch != ".doc" && ch != ".DOC" && ch != ".txt" && ch != ".TXT" && ch != ".xls" && ch != ".XLS")
	{
		return false;
	}

	return(true);
}

function chkDoc(img)
{
	var checkOK = ".jpg";
	var checkStr = img.value;
	var allValid = true;
	
	var ext = "";
	var j=0;
			
	for (i=(checkStr.length)-4;i<checkStr.length;i++)
	{	
		if(j == 0)
		{			
			ch = checkStr.charAt(i);
			j++;
		}
		else
		{
			ch = ch + checkStr.charAt(i);
		}
		
	}									
		
	if(ch != ".jpg" && ch != ".JPG" && ch != ".gif" && ch != ".GIF" && ch != ".pdf" && ch != ".PDF")
	{
		return false;
	}
	
	return(true);
}
function chkDocPDF(doc)
{
	var checkOK = ".doc";
	var checkStr = doc.value;
	var allValid = true;
	
	var ext = "";
	var j=0;
			
	for (i=(checkStr.length)-4;i<checkStr.length;i++)
	{	
		if(j == 0)
		{			
			ch = checkStr.charAt(i);
			j++;
		}
		else
		{
			ch = ch + checkStr.charAt(i);
		}
		
	}									
		
	if(ch != ".doc" && ch != ".DOC" && ch != ".pdf" && ch != ".PDF" && ch != "docx" && ch != "DOCX")
	{
		return false;
	}
	
	return(true);
}