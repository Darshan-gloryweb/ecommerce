<?php 

	include "db.php";

 	$Mloc="../CategoryIcon/";

	

	

	function uploadImage1($file,$uploadPath)

	{

		$uploaddir = "../CategoryIcon"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!

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



	$CategoryName = $_POST['CategoryName'];

	$CategoryType = $_POST['CategoryType'];

    $CategoryImage = $_FILES['CategoryImage']['name'];

	$parent_cat = $_POST['parent_cat'];

	if($parent_cat == "")

	{

		$parent_cat = 0;

	}

	$Description = mysqli_real_escape_string($dbLink,$_POST['Description']);

    $SeName = $_POST['SeName'];

	

	$SeDescription = mysqli_real_escape_string($dbLink,$_POST['SeDescription']);

	$SeTitle = $_POST['SeTitle'];

	$SeKeyword = $_POST['SeKeyword'];

	$DisplayOrder = $_POST['DisplayOrder'];

	$Status = $_POST['Status'];

	

	$updid = $_SESSION['what_adminid'];

	$upddate = date("Y-m-d H:i:s");

	$sysdate = date("Y-m-d");

	

	$discountimage = $_FILES['discountimage']['name'];
	$menubannerimage= $_FILES['menubannerimage']['name'];
	$discount_lable = mysqli_real_escape_string($dbLink,$_POST['discount_lable']);

	$is_deal_cat = $_POST['is_deal_cat'];

	 if($is_deal_cat=='')

	 {

		 

		 $is_deal_cat=0;

		 $discount_lable=0;

		 $discountimage='';

	 }else{

		 

		 $is_deal_cat=1;

	}

	

	

	

if(isset($_REQUEST['id']))

{

	$all_sql = "SELECT ProductID from product where CategoryID=".$_REQUEST['id'];

  $all_res = mysqli_query($dbLink,$all_sql) or die ('Could Not Select');

  if(mysqli_num_rows($all_res)>0)

  {

   echo "Use";

  }

  else

  {

   $sqll = "select CategoryImage from category where CategoryID=".$_REQUEST['id'];

   $res = mysqli_query($dbLink,$sqll) or die('could not select..');

   $row = $res->fetch_assoc();

   $Mloc="../CategoryIcon/";



   $dr1 = $row['CategoryImage'];

   $dr1loc = $Mloc.$row['CategoryImage'];

   if (is_file($dr1loc)==true)

   {

     unlink($dr1loc);

      }

   

   $sql2="delete from category where CategoryID=".$_REQUEST['id']; 

   mysqli_query($dbLink,$sql2) or die('could not Delete..');

  echo "true";

  }

}

else 

if($action=='E')

{

	

		$csql ="select * from category where CategoryName='$CategoryName' and CategoryID !=".$id;

		$cres=mysqli_query($dbLink,$csql) or die('could not select');

		if(mysqli_num_rows($cres) > 0)

		{

			header("location:category.php?msg=Category Exist");

		 exit();

	}

	

else

{

	  $sql = "update category set parent='$parent_cat',CategoryName='$CategoryName',Description='$Description',is_deal_cat=$is_deal_cat,discount_lable=$discount_lable,SeName='$SeName',SeDescription='$SeDescription',SeTitle='$SeTitle',SeKeyword='$SeKeyword',DisplayOrder=$DisplayOrder,Status=$Status,UpdatedBy=$updid,UpdatedOn='$upddate' where CategoryID=".$id;

	 //echo $sql;

	 //exit;

	 mysqli_query($dbLink,$sql) or die('could not update..');

	 

	   $sqll = "select CategoryImage,discountimage from category where CategoryID=".$id;
		
	 $res = mysqli_query($dbLink,$sqll) or die('could not select..');

	 $row = $res->fetch_assoc();

		

		//if($CategoryImage != "")

		//{

			$dr1loc = $Mloc.$row['CategoryImage'];

			if (is_file($dr1loc)==true)

    		{

    			unlink($dr1loc);

    		}

			$extchk = pathinfo($CategoryImage);

			$ext = $extchk["extension"];

			$photoname = "CategoryIcon" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['CategoryImage']['tmp_name'],$photoname);

	

			$sql = "update category set CategoryImage='$img1' where CategoryID=".$id;
			//exit;
			mysqli_query($dbLink,$sql) or die("could not update Image");

			

		//}

		if($discountimage != ""){

			

			

			$dr1loc = $Mloc.$row['discountimage'];

			if (is_file($dr1loc)==true)

    		{

    			unlink($dr1loc);

    		}

			$extchk = pathinfo($discountimage);

			$ext = $extchk["extension"];

			$photoname = "DiscountImage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['discountimage']['tmp_name'],$photoname);

	

			$sql = "update category set discountimage='$img1' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image123");

			

		}else{

			$sql = "update category set discountimage='' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image456");

		}
		
		if($menubannerimage != ""){

			

			

			$dr1loc = $Mloc.$row['menubannerimage'];

			if (is_file($dr1loc)==true)

    		{

    			unlink($dr1loc);

    		}

			$extchk = pathinfo($menubannerimage);

			$ext = $extchk["extension"];

			 $photoname = "Menubannerimage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['menubannerimage']['tmp_name'],$photoname);

	

			$sql = "update category set menubannerimage='$img1' where CategoryID=".$id;
			

			mysqli_query($dbLink,$sql) or die("could not update Image123");

			

		}else{

			$sql = "update category set menubannerimage='' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image456");

		}

		

		

		header("location:category.php?msg=Record Updated Successfully");

	 	exit();

}

}

else if($action=='A')

{

		$csql ="select * from category where CategoryName='$CategoryName'";

		$cres=mysqli_query($dbLink,$csql) or die('could not select');

		if(mysqli_num_rows($cres) > 0)

		{

			header("location:addcategory.php?msg=Category Exist");

		 exit();

	}

	

else

{

     $sql = "insert into category(parent,CategoryName,Description,is_deal_cat,discount_lable,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values('$parent_cat','$CategoryName','$Description',$is_deal_cat,$discount_lable,'$SeName','$SeDescription','$SeTitle','$SeKeyword','$DisplayOrder','$Status','$sysdate','$updid','$upddate','$updid')";

	 //echo $sql;

	

	 mysqli_query($dbLink,$sql) or die('could not insert..');

	 

	 	//$str = "select max(CategoryID) from category";

//		$rs = mysqli_query($dbLink,$str) or die('can not select');

//		$row = $rs->fetch_assoc();

//		$id = $row[0];

		$id = mysqli_insert_id($dbLink);



		//if($CategoryImage != "")

		//{

			$extchk = pathinfo($CategoryImage);

			$ext = $extchk["extension"];

			$photoname = "CategoryIcon" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['CategoryImage']['tmp_name'],$photoname);



			$sql = "update category set CategoryImage='$img1' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		//}

		if($discountimage != "")

		{

			$extchk = pathinfo($discountimage);

			$ext = $extchk["extension"];

			$photoname = "DiscountImage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['discountimage']['tmp_name'],$photoname);



			$sql = "update category set discountimage='$img1' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		}
		
		if($menubannerimage != "")

		{

			$extchk = pathinfo($discountimage);

			$ext = $extchk["extension"];

			$photoname = "Menubannerimage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['menubannerimage']['tmp_name'],$photoname);



			$sql = "update category set menubannerimage='$img1' where CategoryID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		}

		



		header("location:addcategory.php?msg=Record Added Successfully");

		exit();

}

}

?>

