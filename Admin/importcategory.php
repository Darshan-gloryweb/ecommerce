<?php 
require_once('db.php'); 
if(isset($_POST["Import"])){
	$filename=$_FILES["file"]["tmp_name"];	
	if($_FILES["file"]["size"] > 0)
	{
		$allrecord = readCSV($filename);
		  /*   echo '<pre>';
		print_r($allrecord);
		echo '</pre>';  */ 
 
		$updid = $_SESSION['what_adminid'];
		$upddate = date("Y-m-d H:i:s");
		$sysdate = date("Y-m-d");
		$icount = 0;
		if(!empty($allrecord)){
			foreach($allrecord as $value){
				if($icount!= 0){
				$parentcategory=trim($value[0]);
				$catname =	trim($value[1]);
				$description =	$value[2];
				if(!empty($value[3])){
					$CategoryImage =	$value[3];
				}else{
					$CategoryImage =	NULL;	
				}
				if(!empty($value[4])){
					$is_deal_cat =	$value[4];
				}else{
					$is_deal_cat =	0;	
				}
				
				$discount_lable =	$value[5];
				if(!empty($value[6])){
					$discountimage =$value[6];
				}else{
					$discountimage =	NULL;	
				}
				$SeName =	$value[7];
				$SeDescription =	$value[8];
				$SeTitle =	$value[9];
				$SeKeyword =	$value[10];
				$DisplayOrder =	$value[11];
				if(!empty($value[12])){
					$Status =	$value[12];
				}else{
					$Status = 0;
				}
			 
				
				if(isset($catname) && !empty($catname)){
				if(!empty($parentcategory)){
					$rsql="select * from category where CategoryName='".$parentcategory."' ";
					$rres=mysqli_query($dbLink,$rsql) or die ('Could Not Select client');
					if(mysqli_num_rows($rres)>0){
						$sqlid = "select CategoryID from category where CategoryName='".$parentcategory."'";
						$resid = mysqli_query($dbLink,$sqlid) or die('not select id');
						$dataid = $resid->fetch_assoc();
						$catid = $dataid['CategoryID'];
						
						$irsql="select * from category where CategoryName='".$catname."' ";
						$irres=mysqli_query($dbLink,$irsql) or die ('Could Not Select client');
						 
						if(mysqli_num_rows($irres) == 0){
							if(!empty($catid)){
						 	$sql = "INSERT into category (CategoryName,parent,Description,CategoryImage,is_deal_cat,discount_lable,discountimage,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) 
							values ('$catname','$catid','$description','$CategoryImage','$is_deal_cat','$discount_lable','$discountimage','$SeName','$SeDescription','$SeTitle','$SeKeyword','$DisplayOrder','$Status','$sysdate','$updid','$upddate','$updid')";
							$result = mysqli_query($dbLink, $sql);
							}
						}
					}else{
						$sql_newcat = "INSERT into category (CategoryName,parent,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) values ('$parentcategory','0','1','$sysdate','$updid','$upddate','$updid')";
						$sql_newcatresult = mysqli_query($dbLink, $sql_newcat);
						 
					    $main_cat_id = mysqli_insert_id($dbLink);	 
						
						$ierres="select * from category where CategoryName='".$catname."' ";
						$ierres=mysqli_query($dbLink,$ierres) or die ('Could Not Select client');
						if(mysqli_num_rows($ierres) == 0){
							
							if(!empty($main_cat_id)){
								$sql = "INSERT into category (CategoryName,parent,Description,CategoryImage,is_deal_cat,discount_lable,discountimage,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) 
								values ('$catname','$main_cat_id','$description','$CategoryImage','$is_deal_cat','$discount_lable','$discountimage','$SeName','$SeDescription','$SeTitle','$SeKeyword','$DisplayOrder','$Status','$sysdate','$updid','$upddate','$updid')";
								$result = mysqli_query($dbLink, $sql);
								 
							}
						}
					}
				}else{	
					$ersql="select * from category where CategoryName='".$catname."' ";
					$ersql=mysqli_query($dbLink,$ersql) or die ('Could Not Select client');
					if(mysqli_num_rows($ersql) == 0){
						$sql = "INSERT into category (CategoryName,parent,Description,CategoryImage,is_deal_cat,discount_lable,discountimage,SeName,SeDescription,SeTitle,SeKeyword,DisplayOrder,Status,CreatedOn,CreatedBy,UpdatedOn,UpdatedBy) 
						values ('$catname','0','$description','$CategoryImage','$is_deal_cat','$discount_lable','$discountimage','$SeName','$SeDescription','$SeTitle','$SeKeyword','$DisplayOrder','$Status','$sysdate','$updid','$upddate','$updid')";
						$result = mysqli_query($dbLink, $sql);
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