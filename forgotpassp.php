<?php
require_once('db.php');
if(!empty($_POST['username']))
{
	$sql = "Select Password from customer where Email='".$_POST['username']."'";
	$res = mysqli_query($dbLink,$sql) or die ('Could Not Select');
	if( mysqli_num_rows($res) > 0 )
	{
		$data = $res->fetch_assoc();
		//Send Mail Client			
		$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'ForgotPassword' and emailtemplate.Status=1";
		$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
		$data1 = $res1->fetch_assoc();				
		if(mysqli_num_rows($res1)>0)
		{
		
		$headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "From:".$data1['FromID']."\r\n";
        $headers .= "Bcc:".$data1['BCC']."\r\n";
        $headers .= "Cc:".$data1['CC']."\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion()."\r\n";

		$subject = $data1['Subject'];
		$str = $data1['MailBody'];
		
		$str = str_replace('#websiteurl#',$frontpath,$str);
		$str = str_replace('#websitename#',$mywebsitename,$str);
		$str = str_replace('#user#',$_POST['username'],$str);
		$str = str_replace('#password#',$data['Password'],$str);
		
        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content .$str; 
        $content = $content . "</body></html>";
		mail($_POST['username'],$subject,$content,$headers);
		}
	//Send Mail Client
		header('Location:forgotpassword.php?msg=Check your email to get password');
	}
	else
	{
		header('Location:forgotpassword.php?msg=You are not registerd');
	}
}
else
{
	header('Location:forgotpassword.php?msg=You are not registerd');
}


?>