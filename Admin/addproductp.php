<?php 

	include "db.php";

 	$Mloc="../ProductImage/";

	

	

	function uploadImage1($file,$uploadPath)

	{

		$uploaddir = "../ProductImage"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!

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



	$CategoryID =mysqli_real_escape_string($dbLink,$_POST['CategoryID']);

	$brandid = mysqli_real_escape_string($dbLink,$_POST['brandid']);

	$ProductName =mysqli_real_escape_string($dbLink,$_POST['ProductName']);



	$ImageName = $_FILES['ImageName']['name'];

	

	$discountimage = $_FILES['discountimage']['name'];

	

	$SKU =mysqli_real_escape_string($dbLink,$_POST['SKU']);





	$Price =mysqli_real_escape_string($dbLink,$_POST['Price']); 

	

	$Inventory =mysqli_real_escape_string($dbLink,$_POST['Inventory']);

	$MinimumInventory =mysqli_real_escape_string($dbLink,$_POST['MinimumInventory']);

	$discount_lable = mysqli_real_escape_string($dbLink,$_POST['discount_lable']);

	//$is_deal_pro = mysqli_real_escape_string($dbLink,$_POST['is_deal_pro']);

	

	$is_deal_pro = $_POST['is_deal_pro'];

	 if($is_deal_pro=='')

	 {

		 $is_deal_pro=0;

		 $discount_lable=0;

		 $discountimage='';
		 $SalePrice =$Price;

	 }else{

		$is_deal_pro=1;
		$SalePrice =mysqli_real_escape_string($dbLink,$_POST['SalePrice']);

	}

	 

	 

	$Description = "";





	if ( isset( $_POST ) )

	   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST

	else

	   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

	

	foreach ( $postArray as $sForm => $value )

	{

		if ( get_magic_quotes_gpc() )

			$postedValue = htmlspecialchars( stripslashes( $value ) ) ;

		else

			$postedValue = htmlspecialchars( $value ) ;

		if($sForm == 'description') { 

	 		$Description = mysqli_real_escape_string($dbLink,$postedValue); 
	 	}
	}
	
	$pro_key_feature = "";
	
	if ( isset( $_POST ) )

	   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST

	else

	   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

	

	foreach ( $postArray as $sForm => $value )

	{

		if ( get_magic_quotes_gpc() )

			$postedValue = htmlspecialchars( stripslashes( $value ) ) ;

		else

			$postedValue = htmlspecialchars( $value ) ;

		if($sForm == 'pro_key_feature') { 

	 		$pro_key_feature = mysqli_real_escape_string($dbLink,$postedValue); 
	 	}
	}




	$pro_specification = "";





	if ( isset( $_POST ) )

	   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST

	else

	   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

	

	foreach ( $postArray as $sForm => $value )

	{

		if ( get_magic_quotes_gpc() )

			$postedValue = htmlspecialchars( stripslashes( $value ) ) ;

		else

			$postedValue = htmlspecialchars( $value ) ;

	

	?>

	<?php  if($sForm == 'pro_specification') { ?>

	<?php  $pro_specification = mysqli_real_escape_string($dbLink,$postedValue); }?>

	<?php 

	}

	

	

	$SeName =mysqli_real_escape_string($dbLink,$_POST['SeName']);

	

	$SeDescription = "";





	if ( isset( $_POST ) )

	   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST

	else

	   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

	

	foreach ( $postArray as $sForm => $value )

	{

		if ( get_magic_quotes_gpc() )

			$postedValue = htmlspecialchars( stripslashes( $value ) ) ;

		else

			$postedValue = htmlspecialchars( $value ) ;

	

	?>

	<?php  if($sForm == 'sedescription') { ?>

	<?php  $SeDescription = mysqli_real_escape_string($dbLink,$postedValue); }?>

	<?php 

	}

	$SeTitle =mysqli_real_escape_string($dbLink,$_POST['SeTitle']);

	$SeKeyword =mysqli_real_escape_string($dbLink,$_POST['SeKeyword']);

	$Width =mysqli_real_escape_string($dbLink,$_POST['Width']);

	$Height =mysqli_real_escape_string($dbLink,$_POST['Height']);

	$Weight =mysqli_real_escape_string($dbLink,$_POST['Weight']);



	$DisplayOrder =mysqli_real_escape_string($dbLink,$_POST['DisplayOrder']);

	$Status =mysqli_real_escape_string($dbLink,$_POST['Status']);

	

	 $isfeatured = $_POST['isfeatured'];

	 if($isfeatured=='')

	 {

		 $isfeatured=0;

	 }

	$isweeklyspecial = $_POST['isweeklyspecial'];

	 if($isweeklyspecial=='')

	 {

		 $isweeklyspecial=0;

	 }

	

	$updid = $_SESSION['what_adminid'];

	$upddate = date("Y-m-d H:i:s");

	 $sysdate = date("Y-m-d");

	

if(isset($_REQUEST['id']))

{

	$sqll = "select * from product where ProductID=".$_REQUEST['id'];

	$res = mysqli_query($dbLink,$sqll) or die('could not select..');

	$row = $res->fetch_assoc();

	$Mloc="../ProductImage/";



	$dr1 = $row['ImageName'];

	$dr1loc = $Mloc.$row['ImageName'];

	if (is_file($dr1loc)==true)

	{

		unlink($dr1loc);

	}

			

	$sql2="delete from product where ProductID=".$_REQUEST['id']; 

	mysqli_query($dbLink,$sql2) or die('could not Delete product..');

	

	echo 'true';

}

else if($action=='E')

{
	
	 $sql = "update product set ProductName='$ProductName',CategoryID=$CategoryID,brandid='$brandid',SKU='$SKU',Price='$Price',SalePrice='$SalePrice',is_deal_pro=$is_deal_pro,discount_lable=$discount_lable,Inventory='$Inventory',MinimumInventory='$MinimumInventory',Width='$Width',Height='$Height',Weight='$Weight',Description='$Description',pro_specification='$pro_specification',pro_key_feature='$pro_key_feature',SeName='$SeName',SeDescription='$SeDescription',SeTitle='$SeTitle',SeKeyword='$SeKeyword',DisplayOrder=$DisplayOrder,Status=$Status,isfeatured=$isfeatured,isweeklyspecial=$isweeklyspecial,UpdatedBy=$updid,UpdatedOn='$upddate' where ProductID=".$id;

	//exit;
	 mysqli_query($dbLink,$sql) or die('could not update..');

	 

	  $sqll = "select ImageName,discountimage from product where ProductID=".$id;

	 $res = mysqli_query($dbLink,$sqll) or die('could not select product..');

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

			$photoname = "ProductImage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);

	

			$sql = "update product set ImageName='$img1' where ProductID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

			

		}

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

	

			$sql = "update product set discountimage='$img1' where ProductID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

			

		}else{

			$sql = "update product set discountimage='' where ProductID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		}

		

		

		

		/*if($category!=""){

			$sql2="select * from productcategory where ProductID=".$id; 

	 		$result=mysqli_query($dbLink,$sql2);

	 		if(mysqli_num_rows($result)){

				$s = "update productcategory set CategoryID=$category where ProductID=".$id;

				mysqli_query($dbLink,$s) or die("Could not update productcategory");

	 		}else{

				$s = "insert into productcategory(CategoryID,ProductID) values($category,$id)";

				mysqli_query($dbLink,$s) or die("Could not insert productcategory");

			}

		}

		if($category==""){

			$sql2="select * from productcategory where ProductID=".$id; 

	 		$result=mysqli_query($dbLink,$sql2);

			if(mysqli_num_rows($result)){

				$s = "delete from productcategory where ProductID=".$id;

				mysqli_query($dbLink,$s) or die("Could not delete productcategory.");

	 		}	

		}*/?>

		<script>window.location='addproduct.php?id=<?=$id?>&msg=Record Updated Successfully&tab=1'</script>

<?php 

//		header("location:addproduct.php?id=$id&msg=Record Updated Successfully&tab=1");

//	 	exit();

}

else if($action=='A')

{



      $sql = "insert into product(ProductName,CategoryID,brandid,SKU,Price,SalePrice,is_deal_pro,discount_lable,Inventory,MinimumInventory,Width,Height,Weight,pro_key_feature,Description,pro_specification,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,isfeatured,isweeklyspecial,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values('$ProductName','$CategoryID','$brandid','$SKU','$Price',$SalePrice,$is_deal_pro,$discount_lable,'$Inventory','$MinimumInventory','$Width','$Height','$Weight','$pro_key_feature','$Description','$pro_specification','$SeName','$SeDescription','$SeTitle','$SeKeyword',$DisplayOrder,$Status,$isfeatured,$isweeklyspecial,'$sysdate',$updid,'$upddate',$updid)";

	// echo $sql;

	 mysqli_query($dbLink,$sql) or die('could not insert..');

	 

	 //$str = "select max(ProductID) from product";

//		$rs = mysqli_query($dbLink,$str) or die('can not select');

//		$row = $rs->fetch_assoc();

//		$id = $row[0];

		$id = mysqli_insert_id($dbLink);



		if($ImageName != "")

		{

			$extchk = pathinfo($ImageName);

			$ext = $extchk["extension"];

			$photoname = "ProductImage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);



			$sql = "update product set ImageName='$img1' where ProductID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		}

		if($discountimage != "")

		{

			$extchk = pathinfo($discountimage);

			$ext = $extchk["extension"];

			$photoname = "DiscountImage" . $id . "." . $ext;



			$img1 = uploadImage1($_FILES['discountimage']['tmp_name'],$photoname);



			$sql = "update product set discountimage='$img1' where ProductID=".$id;

			mysqli_query($dbLink,$sql) or die("could not update Image");

		}

		/*if($category!=""){

			$s = "insert into  productcategory values($id,$category)";

			mysqli_query($dbLink,$s) or die("Could not insert productcategory");

		}*/?>

<script>window.location='addproduct.php?id=<?=$id?>&msg=Record Added Successfully&tab=1'</script><?php

//		header("location:addproduct.php?id=$id&msg=Record Added Successfully&tab=1");

	//	exit(); 

}

?>

