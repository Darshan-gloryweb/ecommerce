<?php 
include "db.php";
$Mloc="../HomeBanner/";

	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../HomeBanner"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
		$path = $uploaddir;
		if(!file_exists($path))
			mkdir ($path, 0777);
		if(is_uploaded_file($file))
		{
			move_uploaded_file($file,$path.'/'.$uploadPath);
			$photo = $uploadPath;
		}
		return $photo;
	}
	
	$timg = $_FILES['image_file']['name'];
	$url=mysqli_real_escape_string($dbLink,$_POST['url']);
	$name=mysqli_real_escape_string($dbLink,$_POST['name']);
	$text=mysqli_real_escape_string($dbLink,$_POST['text1']);
	$description= mysqli_real_escape_string($dbLink,$_POST['Description']);
	$status=$_POST['Status'];
	$displayorder=$_POST['displayorder'];
	
	$id = $_GET['editid'];
	$action = $_GET['action'];
	
	
if(isset($_REQUEST['id']))
{
	 
	$sqll = "select ImagePath from homebanner where BannerID=".$_REQUEST['id'];
	$res = mysqli_query($dbLink,$sqll) or die('could not select..');
	$row = $res->fetch_assoc();
	$Mloc="../HomeBanner/";

	$dr1 = $row['ImagePath'];
	$dr1loc = $Mloc.$row['ImagePath'];
	if (is_file($dr1loc)==true)
		{
			unlink($dr1loc);
		}
		

	$sql="delete from homebanner where BannerID=".$_REQUEST['id'];
	mysqli_query($dbLink,$sql) or die ("Could Not Delete");
	echo "true";
}
else if($action=='E')
{
	$sql = "update homebanner set BannerName='$name',BannerUrl='$url',Status=$status,DisplayOrder=$displayorder,BannerText='$text',BannerDescription='$description' where BannerID=".$id;
	mysqli_query($dbLink,$sql) or die("could not update Image");
	
	if($timg != "")
		{
			$sql = "select ImagePath from homebanner where BannerID=".$id;
			$res = mysqli_query($dbLink,$sql) or die('could not select..');
			$row = $res->fetch_assoc();

			$dr1 = $row['ImagePath'];
			$dr1loc = $Mloc.$row['ImagePath'];
    		if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
    		}
			
			$extchk = pathinfo($timg);
			$ext = $extchk["extension"];
			$photoname = "Slider"."_".$id. "." . $ext;

			$img1 = uploadImage1($_FILES['image_file']['tmp_name'],$photoname);

			$sql = "update homebanner set ImagePath='$img1' where BannerID=".$id;
			
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		
		

		header("location:homebanner.php?size=".$size."&msg=Banner Updated Successfully");
		exit();
	
}
else if($action=='A')
{
	
	echo $sql = "insert into homebanner (BannerName,BannerText,BannerUrl,BannerDescription,DisplayOrder,Status) values ('$name','$url','$text','$description',$displayorder,$status)";
			mysqli_query($dbLink,$sql) or die("could not update Image");
		
		$id = mysqli_insert_id($dbLink);

     if($timg != "")
		{
			
			$extchk = pathinfo($timg);
			$ext = $extchk["extension"];
			$photoname = "Banner"."_".$id."." . $ext;

			$slide = uploadImage1($_FILES['image_file']['tmp_name'],$photoname);
			
		
			echo $sql = "update homebanner set ImagePath='$slide' where BannerID=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}

		header("location:addhomebanner.php?msg=Banner Added Successfully");
		exit();
}
?>