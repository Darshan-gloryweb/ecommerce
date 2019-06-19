<?php 
	include "db.php";
 	
	$Mloc="../CategoryTypeIcon/";
	
	
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../CategoryTypeIcon"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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
	$ImageName = $_FILES['ImageName']['name'];
	$CategoryTypeName = $_POST['CategoryTypeName'];
	
if(isset($_REQUEST['id']))
{
  $all_sql = "SELECT CategoryID from category where CategoryTypeID=".$_REQUEST['id'];
  $all_res = mysqli_query($dbLink,$all_sql) or die ('Could Not Select');
  if(mysqli_num_rows($all_res)>0)
  {
   echo "Use";
  }
  else
  {
	  
	$sqll = "select ImageName from categorytype where id=".$_REQUEST['id'];
   $res = mysqli_query($dbLink,$sqll) or die('could not select..');
   $row = $res->fetch_assoc();
   $Mloc="../CategoryTypeIcon/";

   $dr1 = $row['ImageName'];
   $dr1loc = $Mloc.$row['ImageName'];
   if (is_file($dr1loc)==true)
   {
     unlink($dr1loc);
      }
   $sql2="delete from categorytype where id=".$_REQUEST['id']; 
   mysqli_query($dbLink,$sql2) or die('could not Delete..');
  echo "true";
  }
}
else if($action=='E')
{
	
		$csql ="select * from categorytype where name='$CategoryTypeName' and id !=".$id;
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:categorytype.php?msg=Category Type Exist");
		 exit();
	    }
	
else
{
	 $sql = "update categorytype set name='$CategoryTypeName' where id=".$id;
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	 $sqll = "select ImageName from categorytype where id=".$id;
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
			$photoname = "CategoryTypeIcon" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);
	
			$sql = "update categorytype set ImageName='$img1' where id=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
			
		}
	 
	  header("location:categorytype.php?msg=Record Updated Successfully");
	 	exit();
}}
else if($action=='A')
{
		$csql ="select * from categorytype where name='$CategoryTypeName'";
		$cres=mysqli_query($dbLink,$csql) or die('could not select');
		if(mysqli_num_rows($cres) > 0)
		{
			header("location:addcategorytype.php?msg=Category Type Exist");
		 exit();
	}
	
else
{
      $sql = "insert into categorytype(name) values('$CategoryTypeName')";
	  //echo $sql;
	  mysqli_query($dbLink,$sql) or die('could not insert..');
	 
		/*$str = "select max(id) from categorytype";
		$rs = mysqli_query($dbLink,$str) or die('can not select');
		$row = $rs->fetch_assoc();
		$id = $row[0];*/
		$id = mysqli_insert_id($dbLink);

		if($ImageName != "")
		{
			$extchk = pathinfo($ImageName);
			$ext = $extchk["extension"];
			$photoname = "CategoryTypeIcon" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);

			$sql = "update categorytype set ImageName='$img1' where id=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		header("location:addcategorytype.php?msg=Record Added Successfully");
		exit();
}
}
?>
