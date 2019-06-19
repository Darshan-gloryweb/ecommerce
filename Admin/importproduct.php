<?php 
require_once('db.php'); 
  if(isset($_POST["Import"])){
	$filename=$_FILES["file"]["tmp_name"];	
	if($_FILES["file"]["size"] > 0)
	{  
		 $allrecord = readCSV($filename);
		//$allrecord = readCSV('data2.csv');
		/*    echo '<pre>';
		print_r($allrecord);
		echo '</pre>';     
       */
		$updid = $_SESSION['what_adminid'];
		$upddate = date("Y-m-d H:i:s");
		$sysdate = date("Y-m-d");
		$icount = 0;
		if(!empty($allrecord)){
			foreach($allrecord as $value){
				if($icount!= 0){
				$CategoryName =	trim($value[0]);
				$BrandName =	trim($value[1]);
				$ProductName =	trim($value[2]);
				$SKU =	$value[3];
				$Price =	$value[4];
				$ImageName =	$value[5];
				$is_deal_pro =	$value[6];
				$SalePrice	 =	$value[7];
				$discount_lable =	$value[8];
				$discountimage =	$value[9];
				$Inventory =	$value[10];
				$MinimumInventory =	$value[11];
				$pro_specification =	$value[12];
				$pro_key_feature =	$value[13];
				$Description =	$value[14];
				$SeName =	$value[15];
				$SeDescription =	$value[16];
				$SeTitle =	$value[17];
				$SeKeyword =	$value[18];
				$Width =	$value[19];
				$Height =	$value[20];
				$Weight =	$value[21];
				$DisplayOrder =	$value[22];
				$isfeatured =	$value[23];
				$isweeklyspecial =	$value[24];
				$Status =	$value[25];
				$productgalary = trim($value[26]);
				 
				if(!empty($ProductName) && !empty($CategoryName) && !empty($BrandName)){
					/* category */
					$csql = "select CategoryID from category where CategoryName='".$CategoryName."'";					
					$cres=mysqli_query($dbLink,$csql) or die ('Could Not Select client');
					if(mysqli_num_rows($cres) == 0){
						$icsql = "INSERT into category (CategoryName,parent,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values ('$CategoryName','0','1','$sysdate','$updid','$upddate','$updid')";
						  $icres = mysqli_query($dbLink, $icsql);
						 
					    $cat_id = mysqli_insert_id($dbLink);
					}else{
						$catdataid = $cres->fetch_assoc();
						$cat_id = $catdataid['CategoryID'];
					}
					/* brand */
					$bsql = "select brandid from brand where brandname='".$BrandName."'";					
					$bres=mysqli_query($dbLink,$bsql) or die ('Could Not Select client');
					if(mysqli_num_rows($bres) == 0){
						$ibsql = "INSERT into brand (brandname,Status) values ('$BrandName','1')";
						  $ibres = mysqli_query($dbLink, $ibsql);
						 
						$brand_id = mysqli_insert_id($dbLink);
					}else{
						$branddataid = $bres->fetch_assoc();
						$brand_id = $branddataid['brandid'];
					}
					
					/* Product */
					$psql = "select ProductID from product where ProductName='".$ProductName."' AND CategoryID=".$cat_id." AND brandid=".$brand_id;	
					$pres=mysqli_query($dbLink,$psql) or die ('Could Not Select client');
					if(mysqli_num_rows($pres) == 0){
						  $sql = "INSERT into product (	CategoryID,brandid,SKU,ProductName,Price,SalePrice,is_deal_pro,discount_lable,discountimage,Inventory,MinimumInventory,Width,Height,Weight,pro_key_feature,Description,pro_specification,	ImageName,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,isfeatured,isweeklyspecial,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) 
							values ('$cat_id','$brand_id','$SKU','$ProductName','$Price',$SalePrice,$is_deal_pro,$discount_lable,'$discountimage','$Inventory','$MinimumInventory','$Width','$Height','$Weight','$pro_key_feature','$Description','$pro_specification','$ImageName','$SeName','$SeDescription','$SeTitle','$SeKeyword',$DisplayOrder,$Status,$isfeatured,$isweeklyspecial,'$sysdate','$updid','$upddate','$updid')";
						

						$result = mysqli_query($dbLink, $sql);
						$product_id = mysqli_insert_id($dbLink);
						
						if(!empty($productgalary)){
							$imagesql = "select id from productimage where ProductID='".$product_id."'";					
							$pimgres=mysqli_query($dbLink,$imagesql) or die ('Could Not Select client');
							$pro_images = explode("/",$productgalary);
							if(mysqli_num_rows($pimgres) == 0){
							  
							   foreach($pro_images as $imgitem){
								$ipisql = "INSERT into productimage (ProductID,imagename) values ('$product_id','$imgitem')";
								$ipires=mysqli_query($dbLink,$ipisql) or die ('Could Not Select client');
							   }
							}
						}
							   
					}
					
				} 
			 
			 
			} 
			$icount++;
			}
		
		 }
	  }  
	  
 	header("Location: category.php?msg=CSV File has been successfully Imported.");
	exit();   
}  

function readCSV($csvFile){
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle) ) {
        $line_of_text[] = fgetcsv($file_handle, 1024);
    }
    fclose($file_handle);
    return $line_of_text;
}
 

 


?>