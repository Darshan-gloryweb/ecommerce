<?php  
include('db.php');

$Mloc="../ProductGallery/";
	
	
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../ProductGallery"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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

	
	
	$imagename=$_FILES['imagename']['name'];
	$product=mysqli_real_escape_string($dbLink,$_POST['product']);
	
	
if(isset($_REQUEST['id']))
{
	$sqll = "select imagename from productimage where id=".$_REQUEST['id'];
	$res = mysqli_query($dbLink,$sqll) or die('could not select..');
	$row = $res->fetch_assoc();
	$Mloc="../ProductGallery/";

	$dr1 = $row['imagename'];
	$dr1loc = $Mloc.$row['imagename'];
	if (is_file($dr1loc)==true)
	{
		unlink($dr1loc);
	}
			
	$sql2="delete from productimage where id=".$_REQUEST['id']; 
	mysqli_query($dbLink,$sql2) or die('could not Delete product..');
		
	
	echo 'true';
}
else if($action=='E')
{/*
	 $sql = "update productimage set imagename='$imagename' where id=".$id;
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	  $sqll = "select imagename from productimage where id=".$id;
	 $res = mysqli_query($dbLink,$sqll) or die('could not select productimage..');
	 $row = mysql_fetch_array($res);
		
		if($imagename != "")
		{
			$dr1loc = $Mloc.$row['imagename'];
			if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
    		}
			$extchk = pathinfo($imagename);
			$ext = $extchk["extension"];
			$photoname = "ProductImage" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['imagename']['tmp_name'],$photoname);
	
			$sql = "update productimage set imagename='$img1' where id=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
			
		}
		
	
		header("location:product.php?msg=Record Updated Successfully");
	 	exit();*/
}
else if($action=='A')
{


    /* $sql = "insert into productimage(imagename) values('$imagename')";
	 echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 $str = "select max(id) from productimage";
		$rs = mysqli_query($dbLink,$str) or die('can not select');
		$row = mysql_fetch_array($rs);
		$id = $row[0];
*/
		if($imagename != "")
		{
			$extchk = pathinfo($imagename);
			$ext = $extchk["extension"];
			$photoname = "Product_" . $id ."_".time()."." . $ext;

			$img1 = uploadImage1($_FILES['imagename']['tmp_name'],$photoname);

			$sql = "insert into productimage (ProductID,imagename) values ($product,'$img1')";
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		

		header("location:addproduct.php?id=".$product."&msg=Record Added Successfully&tab=2");
		exit();
}
?>