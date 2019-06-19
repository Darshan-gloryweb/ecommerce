<?php 
	include "db.php";
 	$Mloc="../BrandIcon/";
	
	
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../BrandIcon"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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

	$brandname = $_POST['brandname'];
	$branddes = $_POST['branddes'];
    $ImageName = $_FILES['ImageName']['name'];
	$is_deal_brand = $_POST['is_deal_brand'];
	$displayorder = $_POST['displayorder'];
	$Status = $_POST['Status'];
	
	
	
	
	
if(isset($_REQUEST['id']))
{
	
   $sqll = "select ImageName from brand where brandid=".$_REQUEST['id'];
   $res = mysqli_query($dbLink,$sqll) or die('could not select..');
   $row = $res->fetch_assoc();
   $Mloc="../BrandIcon/";

   $dr1 = $row['ImageName'];
   $dr1loc = $Mloc.$row['ImageName'];
   if (is_file($dr1loc)==true)
   {
     unlink($dr1loc);
      }
   
   $sql2="delete from brand where brandid=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
   
   $sql12="update product set brandid =0 where brandid =".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql12) or die('could not Delete..');
  echo "true";
  
}
else 
if($action=='E')
{
	
		$csql ="select * from brand where brandname='$brandname' and brandid !=".$id;
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:brand.php?msg=Brand Exist");
		 exit();
	}
	
else
{
	  $sql = "update brand set brandname='$brandname',branddes='$branddes',is_deal_brand=$is_deal_brand,displayorder=$displayorder,Status=$Status where brandid=".$id;
	 //echo $sql;
	 //exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	  $sqll = "select ImageName from brand where brandid=".$id;
	 $res = mysqli_query($dbLink,$sqll) or die('could not select..');
	 $row = $res->fetch_assoc();
		
		if($ImageName != "")
		{
			$dr1loc = $Mloc.$row['ImageName'];
			if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
    		}
			$extchk = pathinfo($ImageName);
			$ext = $extchk["extension"];
			$photoname = "BrandIcon" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);
	
			$sql = "update brand set ImageName='$img1' where brandid=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
			
		}
		
		
		
		header("location:brand.php?msg=Record Updated Successfully");
	 	exit();
}
}
else if($action=='A')
{
		$csql ="select * from brand where brandname='$brandname'";
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:brand.php?msg=Brand Exist");
		 exit();
	}
	
else
{
     $sql = "insert into brand(brandname,branddes,is_deal_brand,displayorder,Status) values('$brandname','$branddes',$is_deal_brand,'$displayorder','$Status')";
	// echo $sql;
//	exit;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 	//$str = "select max(CategoryID) from category";
//		$rs = mysqli_query($dbLink,$str) or die('can not select');
//		$row = $rs->fetch_assoc();
//		$id = $row[0];
		$id = mysqli_insert_id($dbLink);

		if($ImageName != "")
		{
			$extchk = pathinfo($ImageName);
			$ext = $extchk["extension"];
			$photoname = "BrandIcon" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);

			echo $sql = "update brand set ImageName='$img1' where brandid=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		
		

		header("location:addbrand.php?msg=Record Added Successfully");
		exit();
}
}
?>
