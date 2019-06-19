<?php 
include "db.php";

	$FirstName=$_POST['FirstName1'];
	
	$LastName=$_POST['LastName1'];
	$Email=$_POST['Email'];
	
	$id = $_GET['editid'];
	$action = $_GET['action'];
	
	
if(isset($_REQUEST['id']))
{
	 
	
		
	$sql="delete from customer where CustomerID=".$_REQUEST['id'];
	mysqli_query($dbLink,$sql) or die ("Could Not Delete");
	echo "true";
}
else if($action=='E')
{
	$sql = "update customer set FirstName='$FirstName',LastName='$LastName' where CustomerID=".$id;
	mysqli_query($dbLink,$sql) or die("could not update Customer");
	
		header("location:addcustomer.php?id=".$id."&msg=Customer Personal Detail Updated Successfully");
		exit();
	
}
else if($action=='A')
{
	
	/*$sql = "insert into photos (Title,Description,DisplayOrder,Status,CategoryID) values ('$title','$description',$displayorder,$status,$category)";
			mysqli_query($dbLink,$sql) or die("could not insert photos");
		
		$id = mysql_insert_id();

     if($timg != "")
		{
			$extchk = pathinfo($timg);
			$ext = $extchk["extension"];
			$photoname = "Photo"."_".$id."." . $ext;

			$img = uploadImage1($_FILES['image_file']['tmp_name'],$photoname);

			$sql = "update photos set ImagePath='$img' where PhotoID=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}

		header("location:addphoto.php?msg=Customer Personal Detail Updated Successfully");
		exit();*/
}
?>