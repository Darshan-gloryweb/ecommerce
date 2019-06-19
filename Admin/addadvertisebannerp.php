<?php 
	include "db.php";
 	$Mloc="../AdvertiseBannerIcon/";
	
	
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../AdvertiseBannerIcon"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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
	
	$id = $_GET['editid'];
	$action = $_GET['action'];

	$advertisebanner_title = $_POST['advertisebanner_title'];
	
    $advertisebanner_image = $_FILES['advertisebanner_image']['name'];
	
	$advertisebanner_text = mysqli_real_escape_string($dbLink,$_POST['advertisebanner_text']);
   
	$advertisebanner_display_order = $_POST['advertisebanner_display_order'];
	$advertisebanner_status = $_POST['advertisebanner_status'];
	
	$bannerposition = $_POST['bannerposition'];
	
	$updid = $_SESSION['what_adminid'];
	$upddate = date("Y-m-d H:i:s");
	$sysdate = date("Y-m-d");
	
if(isset($_REQUEST['id']))
{
	
   
   
   $sql2="delete from advertisebanner where advertisebannerID=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
  
   $sql2="delete from advertiseimage where advertisebannerID=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
  
    //echo "true";
	header("location:advertisebanner.php?msg=Record Deleted Successfully");
}
else 
if($action=='E')
{
	
		$csql ="select * from advertisebanner where advertisebanner_title ='$advertisebanner_title' and advertisebannerID !=".$id;
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:advertisebanner.php?msg=advertise banner Exist");
		 exit();
	}
	
else
{
	   $sql = "update advertisebanner set advertisebanner_title='$advertisebanner_title',advertisebanner_text='$advertisebanner_text',advertisebanner_display_order=$advertisebanner_display_order,advertisebanner_status=$advertisebanner_status, bannerposition ='$bannerposition' where advertisebannerID=".$id;
	 //echo $sql;
	 //exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 //
//	  $sqll = "select advertisebanner_image from advertisebanner where advertisebannerID=".$id;
//	 $res = mysqli_query($dbLink,$sqll) or die('could not select..');
//	 $row = $res->fetch_assoc();
//	
//		if($ImageName != "")
//		{
//			echo $dr1loc = $Mloc.$row['advertisebanner_image'];
//				
//			if (is_file($dr1loc)==true)
//    		{
//    			unlink($dr1loc);
//    		}
//			$extchk = pathinfo($advertisebanner_image);
//			$ext = $extchk["extension"];
//			$photoname = "AdvertiseBannerIcon" . $id . "." . $ext;
//
//			$img1 = uploadImage1($_FILES['advertisebanner_image']['tmp_name'],$photoname);
//	
//			echo $sql = "update advertiseimage set imagename='$img1' where advertisebannerID=".$id;
//			
//			mysqli_query($dbLink,$sql) or die("could not update Image");
//			
//		}
//		
		header("location:advertisebanner.php?msg=Record Updated Successfully");
	 	exit();
}
}
else if($action=='A')
{
		$csql ="select * from advertisebanner where advertisebanner_title='$advertisebanner_title'";
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:advertisebanner.php?msg=advertise banner Exist");
		 exit();
	}
	
else
{
     $sql = "insert into advertisebanner(bannerposition,advertisebanner_title,advertisebanner_text,advertisebanner_display_order,advertisebanner_status) values('$bannerposition','$advertisebanner_title','$advertisebanner_text','$advertisebanner_display_order','$advertisebanner_status')";
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 	//$str = "select max(CategoryID) from category";
//		$rs = mysqli_query($dbLink,$str) or die('can not select');
//		$row = $rs->fetch_assoc();
//		$id = $row[0];
		$id = mysqli_insert_id($dbLink);

		if($ImageName != "")
		{
			$extchk = pathinfo($advertisebanner_image);
			$ext = $extchk["extension"];
			$photoname = "AdvertiseBannerIcon" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['advertisebanner_image']['tmp_name'],$photoname);

			echo $sql = "update advertisebanner set advertisebanner_image='$img1' where advertisebannerID=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		

		header("location:advertisebanner.php?msg=Record Added Successfully");
		exit();
}
}
?>
