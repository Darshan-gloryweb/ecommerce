<?php 
	include "db.php";
 	
	$id = $_GET['editid'];
	$action = $_GET['action'];
	
	$title = mysqli_real_escape_string($dbLink,$_POST['title']);
	
	//$slug=strtolower($title);
	//$slug=str_replace(' ','-',$slug);
	$slug =$_POST['url'];
	$content =mysqli_real_escape_string($dbLink,$_POST['content']);
	$status = $_POST['status'];
	$setitle = mysqli_real_escape_string($dbLink,$_POST['setitle']);
	$sekeyword = mysqli_real_escape_string($dbLink,$_POST['sekeyword']);
	$sedescr = mysqli_real_escape_string($dbLink,$_POST['sedescr']);
	$updatedby = $_SESSION['what_fullname'];
	$updatedate = date("Y-m-d H:i:s");
	
if(isset($_REQUEST['id']))
{
	$sql = "delete from pagemgnt where id=".$_REQUEST['id'];
	 mysqli_query($dbLink,$sql) or die('could not Delete..');
	 echo "true";
}
else if($action=='E')
{
     $sql = "update pagemgnt set title='$title',slug='$slug',content='$content',status=$status,setitle='$setitle',sekeyword='$sekeyword',sedescr='$sedescr',update_time='$updatedate',updatedby='$updatedby' where id=".$id;
	 mysqli_query($dbLink,$sql) or die('could not update page');
     header("location:managepage.php?msg=Record Updated Successfully");
	 exit();
	
}
else if($action=='A')
{
     $sql = "insert into pagemgnt(title,slug,content,status,setitle,sekeyword,sedescr,page_time,update_time,updatedby) values('$title','$slug','$content',$status,'$setitle','$sekeyword','$sedescr','$updatedate','$updatedate','$updatedby')";
	 mysqli_query($dbLink,$sql) or die('could not insert Page');
     header("location:managepage.php?msg=Record Added Successfully");
	 exit();
}
?>
