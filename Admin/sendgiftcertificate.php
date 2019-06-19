<?php 
require_once('db.php');
$aemail = mysqli_real_escape_string($dbLink,$_POST['aemail']);
$aemails = explode(',',$aemail);
$cemail = $_POST['access'];
$code = $_POST['code'];

$amt = $_POST['amt'];
$mamt = $_POST['mamt'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];

$id = $_POST['id'];
$allmail = array_merge($aemails,$cemail);

$sql1 = "select emailtemplate.* from emailtemplate inner join template on emailtemplate.TemplateID = template.TemplateID and template.TemplateName = 'SendGiftCertificate' and emailtemplate.Status=1";
$res1 = mysqli_query($dbLink,$sql1) or die ('Could Not Select');
$data1 = $res1->fetch_assoc();				
if(mysqli_num_rows($res1)>0)
{
if(count($allmail)>0)
{
	for($i=0;$i<count($allmail);$i++)
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
		$str = str_replace('#giftcertificate#',$code,$str);
		$str = str_replace('#giftamt#',$amt,$str);
		$str = str_replace('#sdate#',$sdate,$str);
		$str = str_replace('#edate#',$edate,$str);	
        $content = "";
        $content = "<html xmlns=http://www.w3.org/1999/xhtml><body>";
        $content = $content .$str; 
        $content = $content . "</body></html>";
		mail($allmail[$i],$subject,$content,$headers);
	}
		header('Location:addgiftcertificate.php?id='.$id.'&msg=Gift Certificate Code Sent to customers&tab=2');
		exit();
}
else
{
	header('Location:addgiftcertificate.php?id='.$id.'&msg=Mail Not Sent&tab=2');
	exit();
}
}
else
{
	header('Location:addgiftcertificate.php?id='.$id.'&msg=Please Define the Email Template&tab=2');
	exit();
}
?>