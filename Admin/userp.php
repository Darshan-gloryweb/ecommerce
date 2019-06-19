<?php 
	include('db.php');
	
	
	$Mloc="../UserImage/";
	
	$aimg = $_FILES['aimg']['name'];
	function uploadImage1($file,$uploadPath)
	{
		$uploaddir = "../UserImage"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!
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
	
	
	$aid=$_REQUEST['editid'];
	$action = $_REQUEST['action'];
	
	$FirstName = mysqli_real_escape_string($dbLink,$_POST['FirstName']);
	$LastName =mysqli_real_escape_string($dbLink,$_POST['LastName']);
	$Email = mysqli_real_escape_string($dbLink,$_POST['Email']);
	$username = mysqli_real_escape_string($dbLink,$_POST['username']);
	$Password = md5($_POST['Password']);
	
	$access=$_POST['access'];
	$pstr='';
	for($i=0;$i<count($access);$i++)
	{
		$pstr=$pstr.$access[$i].',';
	}
	$pstr=substr($pstr,0,-1);
	
	if(isset($_REQUEST['id'])){
		
		$id = AssureSec($_REQUEST['id']);
				$sqll = "select * from  adminuser where AdminUserID=".$id;
			 	$res = mysqli_query($dbLink,$sqll) or die('could not select..');
			 
			 	$row = $res->fetch_assoc();
			 	$Mloc="../UserImage/";

			  	$dr1 = $row['AImg'];
			  	$dr1loc = $Mloc.$row['AImg'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
		
		
		$query="delete from adminuser where AdminUserID=$id";
		mysqli_query($dbLink,$query) or die('Could not delete User');	
		
		echo 'true';
	}
	
	else if($action=='E'){

		$sql="select * from adminuser where UserName='".$username."' and AdminUserID!=".$aid;
		$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
		if(mysqli_num_rows($res)>0)
		{
			header("location:user.php?msg=UserName Already Exist");
			exit();
		}
		else
		{
		
		$query = "update adminuser set FirstName='$FirstName',LastName='$LastName',Email='$Email',UserName='$username',access='$pstr' where AdminUserID=".$aid;	
		mysqli_query($dbLink,$query) or die('Could Not Update');
		
		
		$sqll = "select AImg from adminuser where AdminUserID=".$aid;
	 	$res = mysqli_query($dbLink,$sqll) or die('could not select..');
	 	$row = $res->fetch_assoc();
		
		if($aimg != "")
		{
			$dr1loc = $Mloc.$row['aimg'];
			if (is_file($dr1loc)==true)
    		{
    			unlink($dr1loc);
    		}
			$extchk = pathinfo($aimg);
			$ext = $extchk["extension"];
			$photoname = "User" . $aid . "." . $ext;

			$img1 = uploadImage1($_FILES['aimg']['tmp_name'],$photoname);
	
			$sql = "update adminuser set AImg='$img1' where AdminUserID=".$aid;
			mysqli_query($dbLink,$sql) or die("could not update Image");
			//echo $sql;
		}
		
		header("location:user.php?msg=User Updated Successfully");
		exit();
		}
	}
	
	else if($action=='A'){

		$sql="select * from adminuser where UserName='".$username."'";
		$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
		if(mysqli_num_rows($res)>0)
		{
			header("location:adduser.php?msg=User Name Already Exist");
			exit();
		}
		else
		{
		$query = "insert into adminuser(FirstName,LastName,UserName,Email,access) values('$FirstName','$LastName','$username','$Email','$str')";	
		mysqli_query($dbLink,$query) or die('Could Not Insert');
		
		$id = mysqli_insert_id();

		if($aimg != "")
		{
			$extchk = pathinfo($aimg);
			$ext = $extchk["extension"];
			$photoname = "User" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['aimg']['tmp_name'],$photoname);

			$sql = "update adminuser set AImg='$img1' where AdminUserID=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		
		header("location:adduser.php?msg=User Inserted Successfully");
		exit();
		}
		
	}

?>