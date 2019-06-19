<?php 
	include "db.php";
	
	$id =mysqli_real_escape_string($dbLink,$_GET['editid']);
	$action =mysqli_real_escape_string($dbLink,$_GET['action']);

	$TemplateID =mysqli_real_escape_string($dbLink,$_POST['template']);
	$FromID =mysqli_real_escape_string($dbLink,$_POST['fromid']); 
	$CC =mysqli_real_escape_string($dbLink,$_POST['cc']);
	$BCC =mysqli_real_escape_string($dbLink,$_POST['bcc']);
	$MailBody =mysqli_real_escape_string($dbLink,$_POST['mailbody']);
	$Subject = mysqli_real_escape_string($dbLink,$_POST['subject']);
	$DisplayOrder =mysqli_real_escape_string($dbLink,$_POST['DisplayOrder']);
	$Status =mysqli_real_escape_string($dbLink,$_POST['Status']);
	
if(isset($_REQUEST['id']))
{
	$sql2="delete from emailtemplate where EmailTemplateID=".$_REQUEST['id']; 
	mysqli_query($dbLink,$sql2) or die('could not Delete product..');
	echo 'true';
}
else if($action=='E')
{
	 $sql = "update emailtemplate set FromID='$FromID',CC='$CC',BCC='$BCC',Subject='$Subject',MailBody='$MailBody',DisplayOrder=$DisplayOrder,Status=$Status where EmailTemplateID=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	  
	 header("location:addtemplate.php?id=$id&msg=Record Updated Successfully&tab=1");
	 exit();
}
else if($action=='A')
{

     echo $sql = "insert into emailtemplate(TemplateID,FromID,CC,BCC,Subject,MailBody,DisplayOrder,Status) values('$TemplateID','$FromID','$CC','$BCC','$Subject','$MailBody',$DisplayOrder,$Status)";
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 $id = mysqli_insert_id();
	 header("location:addtemplate.php?id=$id&msg=Record Added Successfully&tab=1");
	 exit();
}
?>
