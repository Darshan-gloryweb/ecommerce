<?php 
	include "db.php";
 		
	$id =mysql_real_escape_string($dbLink,$_GET['editid']);
	$action =mysql_real_escape_string($dbLink,$_GET['action']);

	$firstname =mysql_real_escape_string($dbLink,$_POST['firstname']);
	$lastname=mysql_real_escape_string($dbLink,$_POST['lastname']);
	$description=mysql_real_escape_string($dbLink,$_POST['description']);
	$email=mysql_real_escape_string($dbLink,$_POST['email']);
	$Inventory =mysql_real_escape_string($dbLink,$_POST['Inventory']);
	$createdon=mysql_real_escape_string($dbLink,$_POST['createdon']);
	$status =mysql_real_escape_string($dbLink,$_POST['status']);

	$updid = $_SESSION['what_adminid'];
	$upddate = date("Y-m-d H:i:s");
	 $sysdate = date("Y-m-d");
	
if(isset($_REQUEST['id']))
{
	$sqll = "select * from feedback where id=".$_REQUEST['id'];
	$res = mysqli_query($dbLink,$sqll) or die('could not select feedback..');
	$row = $res->fetch_assoc();
	
	$sql2="delete from feedback where id=".$_REQUEST['id']; 
	mysqli_query($dbLink,$sql2) or die('could not Delete feedback..');
			
	echo 'true';
}
/*else if($action=='E')
{
	 $sql = "update product set ProductName='$ProductName',ManufactureID=$ManufactureID,SKU='$SKU',UnitID='$UnitID',ProductType='$ProductType',Price=$Price,SalePrice=$SalePrice,Inventory='$Inventory',MinimumInventory='$MinimumInventory',Availibility='$Availibility',Width='$Width',Height='$Height',Weight='$Weight',RelatedProductSKU='$RelatedProductSKU',FrequentlyBoughtProductSKU='$FrequentlyBoughtProductSKU',IsCallUsForPrice='$IsCallUsForPrice',Description='$Description',SeName='$SeName',SeDescription='$SeDescription',SeTitle='$SeTitle',SeKeyword='$SeKeyword',DisplayOrder=$DisplayOrder,Status=$Status,UpdatedBy=$updid,UpdatedOn='$upddate' where ProductID=".$id;
	 //echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not update..');
	 
	  $sqll = "select ImageName from product where ProductID=".$id;
	 $res = mysqli_query($dbLink,$sqll) or die('could not select product..');
	 $row = mysql_fetch_array($res);
		
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
		
		if($category!=""){
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
		}
		header("location:product.php?msg=Record Updated Successfully");
	 	exit();
}
else if($action=='A')
{

     $sql = "insert into product(ProductName,ManufactureID,SKU,UnitID,ProductType,Price,SalePrice,Inventory,MinimumInventory,Availibility,Width,Height,Weight,RelatedProductSKU,FrequentlyBoughtProductSKU,IsCallUsForPrice,Description,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values('$ProductName',$ManufactureID,'$SKU','$UnitID','$ProductType',$Price,$SalePrice,'$Inventory','$MinimumInventory','$Availibility','$Width','$Height','$Weight','$RelatedProductSKU','$FrequentlyBoughtProductSKU','$IsCallUsForPrice','$Description','$SeName','$SeDescription','$SeTitle','$SeKeyword',$DisplayOrder,$Status,'$sysdate',$updid,'$upddate',$updid)";
	 echo $sql;
	 mysqli_query($dbLink,$sql) or die('could not insert..');
	 
	 $str = "select max(ProductID) from product";
		$rs = mysqli_query($dbLink,$str) or die('can not select');
		$row = mysql_fetch_array($rs);
		$id = $row[0];

		if($ImageName != "")
		{
			$extchk = pathinfo($ImageName);
			$ext = $extchk["extension"];
			$photoname = "ProductImage" . $id . "." . $ext;

			$img1 = uploadImage1($_FILES['ImageName']['tmp_name'],$photoname);

			$sql = "update product set ImageName='$img1' where ProductID=".$id;
			mysqli_query($dbLink,$sql) or die("could not update Image");
		}
		if($category!=""){
			$s = "insert into  productcategory values($id,$category)";
			mysqli_query($dbLink,$s) or die("Could not insert productcategory");
		}

		header("location:addproduct.php?msg=Record Added Successfully");
		exit();
}
*/?>
