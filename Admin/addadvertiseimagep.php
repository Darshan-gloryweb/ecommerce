<?php  
include('db.php');

$Mloc="../AdvertiseGallery/";
	
	
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../AdvertiseGallery"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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
	$id =mysqli_real_escape_string($dbLink,$_GET['editid']);
	$action =mysqli_real_escape_string($dbLink,$_GET['action']);
	$img_id =mysqli_real_escape_string($dbLink,$_GET['img_id']);

	
	
	$imagename=$_FILES['imagename']['name'];
	$advertise=mysqli_real_escape_string($dbLink,$_POST['advertise']);
	
	$banner_img_url =$_POST['banner_img_url'];
	
	$banner_img_status =$_POST['banner_img_status'];
	$advertisebanner_display_order =$_POST['advertisebanner_display_order'];
	
	
if(isset($_REQUEST['id']))
{
	
   $sqll = "select imagename from advertiseimage where id=".$_REQUEST['id'];
  
   $res = mysqli_query($dbLink,$sqll) or die('could not select..');
   $row = $res->fetch_assoc();
   $Mloc="../AdvertiseGallery/";

   $dr1 = $row['imagename'];
   $dr1loc = $Mloc.$row['imagename'];
   if (is_file($dr1loc)==true)
   {
	 unlink($dr1loc);
   }
   
   $sql2="delete from advertiseimage where id=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
  echo "true";
  header("location:add_advertisebanner.php?id=".$id."&msg=Record Deleted Successfully&tab=2");
	 	exit();
  
  
}

else if($action=='E')
{

		 $sql = "update advertiseimage set banner_img_url='$banner_img_url',banner_img_status='$banner_img_status',advertisebanner_display_order='$advertisebanner_display_order' where advertisebannerID=".$id." and id=".$img_id;
	 //echo $sql;
	 //exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	 
	  $sqll = "select imagename from advertiseimage where advertisebannerID=".$id." and id=".$img_id;
	 $res = mysqli_query($dbLink,$sqll) or die('could not select productimage..');
	 $row = mysqli_fetch_array($res);
		
		if($imagename != "")
		{
			echo $dr1loc = $Mloc.$row['imagename'];
				
			if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
    		}
			$extchk = pathinfo($imagename);
			$ext = $extchk["extension"];
			$photoname = "Advertisebanner_" . $img_id . "." . $ext;

			$img1 = uploadImage1($_FILES['imagename']['tmp_name'],$photoname);
	
			$sql = "update advertiseimage set imagename='$img1' where advertisebannerID=".$id." and id =".$img_id ;
			mysqli_query($dbLink,$sql) or die("could not update Image");
			
		}
		
	
		header("location:add_advertisebanner.php?id=".$id."&msg=Record Updated Successfully&tab=2");
	 	exit();
}
else if($action=='A')
{	
		 $sql = "insert into advertiseimage(advertisebannerID,banner_img_url ,advertisebanner_display_order,banner_img_status) values('$id','$banner_img_url','$advertisebanner_display_order','$banner_img_status')";
		 
		
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
		$lastid = mysqli_insert_id($dbLink);

		if($imagename != "")
		{
			$extchk = pathinfo($imagename);
			$ext = $extchk["extension"];
			$photoname = "Advertisebanner_" . $lastid . "." . $ext;

			$img1 = uploadImage1($_FILES['imagename']['tmp_name'],$photoname);

			echo $sql = "update advertiseimage set imagename='$img1' where advertisebannerID=".$id." and id =".$lastid;
			
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		
		
		header("location:add_advertisebanner.php?id=".$id."&msg=Record Added Successfully&tab=2");
		exit();
		
		
		
		
		
	
	
	/*	 echo $sql = "insert into advertiseimage(advertisebannerID,banner_img_url ,banner_img_status) values('$id','$banner_img_url','$banner_img_status')";
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 $lastid = mysqli_insert_id($dbLink);
	 
		if($imagename != "")
		{
			$extchk = pathinfo($imagename);
			$ext = $extchk["extension"];
			$photoname = "Advertisebanner_" . $lastid ."." . $ext;

			$img1 = uploadImage1($_FILES['imagename']['tmp_name'],$photoname);

			echo $sql = "update advertiseimage set imagename='$img1' where advertisebannerID=".$id;
			
			
			
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		

		header("location:add_advertisebanner.php?id=".$advertise."&msg=Record Added Successfully&tab=2");
		exit();*/
}
?>