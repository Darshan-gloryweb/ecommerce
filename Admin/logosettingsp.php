<?php 
include "db.php";
$Mloc="../Logo/";

	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../Logo"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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
	$action=$_POST['action'];
	
	if($action=='add')
	{
	
	if($timg != "")
		{
			$extchk = pathinfo($timg);
			$ext = $extchk["extension"];
			$photoname = "logo.". $ext;

			$img1 = uploadImage1($_FILES['image_file']['tmp_name'],$photoname);

			
			$sqll = "Select * from websetting";
    		$r = mysqli_query($dbLink,$sqll) or die("can not select websetting");
    		$row = $r->fetch_assoc();
    		$totrec = mysqli_num_rows($r);
    		if($totrec == "0")
    		{
       			 $sql = "insert into websetting (logoimage) values ('$img1')";
	   			 mysqli_query($dbLink,$sql) or die('could not insert..');
    		}
    		else
    		{
       		 	$sql = "update websetting set logoimage='$img1'";
				mysqli_query($dbLink,$sql) or die('could not update..');
    		}
			
		}

		header("location:logosettings.php?msg=Logo Added Successfully");
		exit();
	}
	else if($action == 'delete')
	{
		$ss = "select * from websetting";
		$re = mysqli_query($dbLink,$ss) or die('could not select..');
		$rows =$re->fetch_assoc();
		$dr1 = $rows['logoimage'];
		$dr1loc = $Mloc.$rows['logoimage'];
    		if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
				echo $dr1loc;
    		}

    		$sql1 = "update websetting set logoimage=''";
    		mysqli_query($dbLink,$sql1) or die('could not delete timg..');

            header("Location:logosettings.php?msg=Logo Deleted Successfully");
		    exit();
	}

?>