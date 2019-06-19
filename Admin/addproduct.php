<?php include "db.php";

include "fckeditor.php";

  if(isset($_GET['id'])) { $id = $_GET['id']; }

if($id != "")

{

	$action = "E";

    $sqledit = "Select * from product where ProductID=".$id;

    $editres = mysqli_query($dbLink,$sqledit) or die("can not select product");

    $editrow = $editres->fetch_assoc();

	$CategoryID = stripcslashes($editrow['CategoryID']);

	$brandid= stripcslashes($editrow['brandid']);

	$ProductName = stripslashes($editrow['ProductName']);



	$ImageName = stripslashes($editrow['ImageName']);

	$discountimage = stripslashes($editrow['discountimage']);

	$SKU = stripslashes($editrow['SKU']);





	$Price = stripslashes($editrow['Price']);

	$SalePrice = stripslashes($editrow['SalePrice']);

	$discount_lable  = stripslashes($editrow['discount_lable']);

	

	$Inventory = stripslashes($editrow['Inventory']);

	$MinimumInventory = stripslashes($editrow['MinimumInventory']);

	$Description = html_entity_decode(stripslashes($editrow['Description']));
	$pro_key_feature = html_entity_decode(stripslashes($editrow['pro_key_feature']));

	$pro_specification=html_entity_decode(stripslashes($editrow['pro_specification']));



	$SeName = stripslashes($editrow['SeName']);

	$SeDescription = html_entity_decode(stripslashes($editrow['SeDescription']));

	$SeTitle = stripslashes($editrow['SeTitle']);

	$SeKeyword = stripslashes($editrow['SeKeyword']);

	$Width = stripslashes($editrow['Width']);

	$Height = stripslashes($editrow['Height']);

	$Weight = stripslashes($editrow['Weight']);

	

	$sisfeatured = stripslashes($editrow['isfeatured']);

	$sisweeklyspecial = stripslashes($editrow['isweeklyspecial']);

	

	$DisplayOrder = stripslashes($editrow['DisplayOrder']);

	

	$Status = stripslashes($editrow['Status']);

	$is_deal_pro = stripslashes($editrow['is_deal_pro']);	
	
	$attr_pro = stripslashes($editrow['attr_pro']);	
	$attr_var = stripslashes($editrow['attr_var']);	

	



	

	

}

else

{

	$action = "A";

	$CategoryID ='';

	$brandid='';

	$ProductName = '';

	$ImageName ='';

	$SKU = '';

	$Price = '';

	$SalePrice = '';

	$discount_lable='';

	$discountimage='';

	$Inventory = '';

	$MinimumInventory = '';

	$Description = '';

	$pro_specification='';

	$SeName = '';

	$SeDescription = '';

	$SeTitle = '';

	$SeKeyword = '';

	$Width = '';

	$Height ='';

	$Weight = '';

	$sisfeatured = '';

	$sisweeklyspecial = '';

	$DisplayOrder = '';

	$Status = '';

	$is_deal_pro='';
	$attr_pro = '';
	$attr_var = '';



}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>
<?=$pgtitle?>
</title>

<!-- Link shortcut icon-->

<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />
<link rel="stylesheet" href="css/style.css">
<?php  include('include_files.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
	color: orange;
}
</style>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript" type="text/javascript">

 

   

  

    function validate(form)

    {

        var extensions = new Array("jpg","jpeg","gif","png","bmp");

		

		if (form.CategoryID.value == "")

        {

            alert("Please Select Category")

            form.CategoryID.focus();

            return false;

        }

		if (form.brandid.value == "")

        {

            alert("Please Select Brand")

            form.brandid.focus();

            return false;

        }

		if (form.ProductName.value == "")

        {

            alert("Please Enter Product Name")

            form.ProductName.focus();

            return false;

        }

		

		if (form.SKU.value == "")

        {

            alert("Please Enter SKU")

            form.SKU.focus();

            return false;

        }

		

		

		

		if(form.ImageName.value == "")

 		{

	 		/*alert("Please Select Product Icon");

	 		return false; */

 		}

		else

		{

			var image_file = form.ImageName.value;

			var image_length = form.ImageName.value.length;

			var pos = image_file.lastIndexOf('.') + 1;

			var ext = image_file.substring(pos, image_length);

			var final_ext = ext.toLowerCase();

			if(extensions.indexOf(final_ext) == -1)

			{

				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");

				return false;

			}

		}

		

		if (form.Price.value == "")

        {

            alert("Please Selelct Price")

            form.Price.focus();

            return false;

        }

		

		if (form.SalePrice.value == "")

        {

            alert("Please Selelct Sale Price")

            form.SalePrice.focus();

            return false;

        }

        

        

		

		

		if (form.DisplayOrder.value == "") {

            alert("Please Enter Display Order")

            form.DisplayOrder.focus();

            return false;

        }

		

		if(form.DisplayOrder.value != "")

      	{

            if (chkNum(form.DisplayOrder) == false)

            {

                alert("Please Enter only Numbers As Display Order..")

                form.DisplayOrder.select();

                return false;

            }

         }

        		

    }

	function validategallery(form)

	{

		var extensions = new Array("jpg","jpeg","gif","png","bmp");

		if(form.imagename.value == "")

 		{

	 		alert("Please Select Product Image");

	 		return false; 

 		}

		else

		{

			var image_file = form.imagename.value;

			var image_length = form.imagename.value.length;

			var pos = image_file.lastIndexOf('.') + 1;

			var ext = image_file.substring(pos, image_length);

			var final_ext = ext.toLowerCase();

			if(extensions.indexOf(final_ext) == -1)

			{

				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");

				return false;

			}

		}

	}

	 function validateqty(form)

    {



		

		if (form.minqty.value == "")

        {

            alert("Please Select Minimum Quantity")

            form.minqty.focus();

            return false;

        }

		if (form.maxqty.value == "")

        {

            alert("Please Select Maximum Quantity")

            form.maxqty.focus();

            return false;

        }

		if (form.price.value == "")

        {

            alert("Please Enter Price")

            form.price.focus();

            return false;

        }

	}

	

</script>

<!---->

</head>

<body class="dashborad">
<div id="alertMessage" class="error"></div>
<?php  include('inc_header.php'); ?>
<div id="shadowhead"></div>
<div id="hide_panel"> <a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc" rel="1" id="hide_menu"></a> <a class="butAcc" rel="0" id="show_menu_icon"></a> <a class="butAcc" rel="1" id="hide_menu_icon"></a> </div>
<?php  include('inc_leftmenu.php'); ?>
<div id="content">
  <div class="inner">
    <?php  include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;">
        <?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?>
      </div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
        <?php  if($action == "E"){?>
        Edit Product </span>
        <?php  } else{?>
        Add New Product </span>
        <?php  } ?>
      </div>
      
      <!-- End header -->
      
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="product.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <ul class="tabs" >
            <li id="first"><a href="#tab1"  id="1"  > Product Details </a></li>
            <li id="second"><a href="#tab2"  id="2"  > Gallery </a></li>
            <li id="third"><a href="#tab3"  id="3"  > Quantity </a></li>
            <li id="fourth"><a href="#tab4"  id="4"  >Customer Reviews </a></li>
            <li id="fifth"><a href="#tab5"  id="5"  >Attributes</a></li>
          </ul>
          <div class="tab_container" > 
            
            <!--tab1-->
            
            <div id="tab1" class="tab_content">
              <form action="addproductp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
                <div class="section ">
                  <label> Select Category<small></small></label>
                  <div>
                  
                  	
                    <select data-placeholder="Choose a Category..." class="" name="CategoryID">
                      <option value="" >Select Category</option>
                      <?php  

										$sql = "select CategoryID,CategoryName from category";

										$result = mysqli_query($dbLink,$sql);

										while($cat = $result->fetch_assoc()){

									?>
                      <option value="<?=$cat['CategoryID']?>" <?php  if($CategoryID==$cat['CategoryID']){?> selected="selected" <?php  }?> <?php  /*?> <?php  if($parent_cat==$CategoryID['CategoryID']){?> selected="selected" <?php  }?><?php  */?>>
                      <?=$cat['CategoryName']?>
                      </option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="section ">
                  <label> Select Brand<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Category..." class="" name="brandid">
                      <option value="" >Select Brand</option>
                      <?php  

										$sql = "select * from brand";

										$result = mysqli_query($dbLink,$sql);

										while($brand = $result->fetch_assoc()){

									?>
                      <option value="<?=$brand['brandid']?>" <?php  if($brandid==$brand['brandid']){?> selected="selected" <?php  }?> <?php  /*?> <?php  if($parent_cat==$CategoryID['CategoryID']){?> selected="selected" <?php  }?><?php  */?>>
                      <?=$brand['brandname']?>
                      </option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="section ">
                  <label> Product Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="ProductName"  id="ProductName" value="<?php if ( isset( $ProductName ) ) {  echo $ProductName; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label> SKU<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="SKU"  id="SKU" value="<?php if ( isset( $SKU ) ) {  echo $SKU; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label>Product Image<small></small></label>
                  <div>
                    <?php  if( isset($ImageName))

									{ ?>
                    <img src="<?php echo $frontpath;?>/ProductImage/<?php echo $ImageName;?>" alt="" width="200px" height="200px" /><br />
                    <br />
                    <br />
                    <?php  } ?>
                    
                    <!--                     <input type="file" class="fileupload" name="ImageName" id="ImageName" value="<?=$frontpath?>/ProductImage/<?=$ImageName?>" /> -->
                    
                    <input type="file" class="fileupload" name="ImageName" id="ImageName" value="" />
                  </div>
                </div>
                <div class="section ">
                  <label> Price<small>Text</small></label>
                  <div>
                    <input type="text" class="large real_Price" name="Price"  id="Price" value="<?php if ( isset( $Price ) ) {  echo $Price; } ?>">
                  </div>
                </div>
                
                <div class="section ">
                  <label> IS Deal<small>Text</small></label>
                  <div>
                  	
                    <input type="checkbox"  name="is_deal_pro" value="1" class="ck" <?php  if($is_deal_pro=='1'){ echo "checked='checked'"; } ?>  id="is_deal_pro"/>
                  </div>
                  
                  <div class="dis_per">
                  <label> % Discount</label>
                    <input type="text" class="large discount_lable1" name="discount_lable"  id="discount_lable" value="<?php if ( isset( $discount_lable ) ) {  echo $discount_lable; } ?>">
                  </div>
                  
                  <div  class="sale_price">
                  <label> Sale Price</label>
                    <input type="text" class="large SalePrice" name="SalePrice"  id="SalePrice" value="<?php if ( isset( $SalePrice ) ) {  echo $SalePrice; } ?>">
                  </div>
                  
                  <div class="dis_img1">
                    <label>Discount Image<small></small></label>
                    <div>
                      <?php  if( isset($discountimage))

									{ ?>
                      <img src="<?php echo $frontpath;?>/ProductImage/<?php echo $discountimage;?>" alt="" width="200px" height="200px" /><br />
                      <br />
                      <br />
                      <?php  } ?>
                      <input type="file" class="fileupload" name="discountimage" id="discountimage" value="<?php if(!empty($discountimage)){echo $discountimage;}?>" />
                    </div>
                  </div>
                </div>
                <div class="section ">
                  <label> Inventory<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Inventory"  id="Inventory" value="<?php if ( isset( $Inventory ) ) {  echo $Inventory; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label> MinimumInventory<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="MinimumInventory"  id="MinimumInventory" value="<?php if ( isset( $MinimumInventory ) ) {  echo $MinimumInventory; } ?>">
                  </div>
                </div>
                <div class="section">
                  <label>Product Specification <small>Text custom</small></label>
                  <div >
                    <?php 

                   

									// Automatically calculates the editor base path based on the _samples directory.

									// This is usefull only for these samples. A real application should use something like this:

									// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

									$sBasePath = $_SERVER['PHP_SELF'] ;

									$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

									

									$oFCKeditor = new FCKeditor('pro_specification') ;

									$oFCKeditor->BasePath	= $sBasePath ;

									$oFCKeditor->Height	= 400 ;

                   if(isset($pro_specification)){

									$oFCKeditor->Value		= $pro_specification;

                  }

									$oFCKeditor->Create() ;

                

									?>
                  </div>
                </div>
                <div class="section">
                  <label>Key Feature <small>Text custom</small></label>
                  <div >
                    <?php 

                   

									// Automatically calculates the editor base path based on the _samples directory.

									// This is usefull only for these samples. A real application should use something like this:

									// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

									$sBasePath = $_SERVER['PHP_SELF'] ;

									$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

									

									$oFCKeditor = new FCKeditor('pro_key_feature') ;

									$oFCKeditor->BasePath	= $sBasePath ;

									$oFCKeditor->Height	= 400 ;

                   if(isset($Description)){

									$oFCKeditor->Value		= $pro_key_feature;

                  }

									$oFCKeditor->Create() ;

                

									?>
                  </div>
                </div>
                <div class="section">
                  <label>Description <small>Text custom</small></label>
                  <div >
                    <?php 

                   

									// Automatically calculates the editor base path based on the _samples directory.

									// This is usefull only for these samples. A real application should use something like this:

									// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

									$sBasePath = $_SERVER['PHP_SELF'] ;

									$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

									

									$oFCKeditor = new FCKeditor('description') ;

									$oFCKeditor->BasePath	= $sBasePath ;

									$oFCKeditor->Height	= 400 ;

                   if(isset($Description)){

									$oFCKeditor->Value		= $Description;

                  }

									$oFCKeditor->Create() ;

                

									?>
                  </div>
                </div>
                <div class="section ">
                  <label> Se Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="SeName"  id="SeName" value="<?php if ( isset( $SeName ) ) {  echo $SeName; } ?>">
                  </div>
                </div>
                <div class="section">
                  <label>Se Description <small>Text custom</small></label>
                  <div >
                    <?php 

									// Automatically calculates the editor base path based on the _samples directory.

									// This is usefull only for these samples. A real application should use something like this:

									// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

									$sBasePath = $_SERVER['PHP_SELF'] ;

									$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;

									

									$oFCKeditor = new FCKeditor('sedescription') ;

									$oFCKeditor->BasePath	= $sBasePath ;

									$oFCKeditor->Height	= 400 ;

                  if(isset($SeDescription)){

									$oFCKeditor->Value		= $SeDescription;

                }

									$oFCKeditor->Create() ;

									?>
                  </div>
                </div>
                <div class="section">
                  <label>Se Title <small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="SeTitle"  id="SeTitle" value="<?php if ( isset( $SeTitle ) ) {  echo $SeTitle; } ?>">
                  </div>
                </div>
                <div class="section">
                  <label>Se Keyword<small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="SeKeyword"  id="SeKeyword" value="<?php if ( isset( $SeKeyword ) ) {  echo $SeKeyword; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Width<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Width"  id="Width" value="<?php if ( isset( $Width ) ) {  echo $Width; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Height<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Height"  id="Height" value="<?php if ( isset( $Height ) ) {  echo $Height; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Weight<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Weight"  id="Weight" value="<?php if ( isset( $Weight ) ) {  echo $Weight; } ?>">
                  </div>
                </div>
                <div class="section">
                  <label>Display Order<small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="DisplayOrder"  id="DisplayOrder" value="<?php if ( isset( $DisplayOrder ) ) {  echo $DisplayOrder; } ?>">
                  </div>
                </div>
                <div class="section ">
                  <label>Is Featured<small>Text</small></label>
                  <div>
                    <div>
                      <input type="checkbox" name="isfeatured" id="isfeatured" value="1" class="ck" <?php  if($sisfeatured=='1'){ echo "checked='checked'"; } ?> />
                      <label for="isfeatured">Is Featured</label>
                    </div>
                  </div>
                </div>
                <div class="section ">
                  <label>Is Weekly Special<small>Text</small></label>
                  <div>
                    <div>
                      <input type="checkbox" name="isweeklyspecial" id="isweeklyspecial" value="1" class="ck" <?php  if(isset($sisweeklyspecial) && $sisweeklyspecial=='1'){ echo "checked='checked'"; } ?> />
                      <label for="isweeklyspecial">Is Weekly Special</label>
                    </div>
                  </div>
                </div>
                <div class="section ">
                  <label> Status<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Status..." class="" name="Status">
                      <option value="1" <?php  if(isset($Status) && $Status==1) { echo 'selected="selected"'; } ?>>Active</option>
                      <option value="0" <?php  if(isset($Status) && $Status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="section last">
                  <div>
                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                    
                    <!-- <a class="uibutton submit_form" >submitForm</a>--> 
                    
                  </div>
                </div>
              </form>
            </div>
            
            <!--tab1--> 
            
            <!--tab2-->
            
            <div id="tab2" class="tab_content">
              <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Product Gallery</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablegallery" id="gallery">
                      <thead>
                        <tr> 
                          
                          <!--  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                          
                          <th>Image</th>
                          <th>Image Name</th>
                          <th>Management</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  

						$pisql="select * from productimage where ProductID =".$id;

						$pires=mysqli_query($dbLink,$pisql) or die('could not select product image'); ?>
                        <?php 

						 	while($pidata=$pires->fetch_assoc())

								{ ?>
                        <tr>
                          <td><?php 

									if($pidata['imagename']=="")

									{ ?>
                            <img width="49" height="22" src="<?=$frontpath?>/images/noimg.jpg" alt="No Image"/>
                            <?php  } else { ?>
                            <img width="49" height="22" src="../ProductGallery/<?php  echo $pidata['imagename']; ?>?<?php  echo time(); ?>" alt=""/>
                            <?php  } ?></td>
                          <td><?=$pidata['imagename']?></td>
                          <td><span class="tip" > <a id="<?php  echo $pidata['id'];?>" class="row_delete"  name="<?php  echo str_replace('_','-',$pidata['imagename']); ?>_imagegallery" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span>Add Product Image</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <form id="productgallery" name="productgallery" enctype="multipart/form-data" action="addproductimagep.php?action=A&editid=<?php echo $id;?>" method="post" onsubmit="return validategallery(this);">
                    <div class="section ">
                      <label>Product Image<small></small></label>
                      <div>
                        <input type="hidden" value="<?=$id?>" name="product" id="product" />
                        <input type="file" class="fileupload" name="imagename" id="imagename" <?php if( isset($imagename)){?> value="<?=$frontpath?>/ProductImage/<?=$imagename?>"<?php } ?> />
                      </div>
                    </div>
                    <div class="section last">
                      <div>
                        <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php  } ?>
            </div>
            
            <!--tab2--> 
            
            <!--tab3-->
            
            <div id="tab3" class="tab_content">
              <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Product Quantity</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablequantity" id="quantity">
                      <thead>
                        <tr> 
                          
                          <!--  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                          
                          <th>Range</th>
                          <th>Price</th>
                          <th>Management</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  

					   $piqsql="select * from quantity where ProductID =".$id;

					   $piqres=mysqli_query($dbLink,$piqsql) or die('could not select product Quantity');

						if(isset($_REQUEST['rid'])){

										$rid=$_REQUEST['rid'];

						}

						if(isset($rid))

						{

						  $piqsql1="select * from quantity where id =".$rid;

						  $piqres1=mysqli_query($dbLink,$piqsql1) or die('could not select product Quantity'); 

						  $piqrow=$piqres1->fetch_assoc();

						  $minqty=$piqrow['minqty'];

						  $maxqty=$piqrow['maxqty'];

						  $price=$piqrow['price'];

						  $qty_discount = $piqrow['qty_discount'];

						  $action = "E";

						}

						else

						{

							$action = "A";

							$minqty='';

						    $maxqty='';

						    $price='';

							$qty_discount='';

						}?>
                        <?php 



						 	while($piqdata=$piqres->fetch_assoc())

								{ ?>
                        <tr>
                          <td><?php  echo $piqdata['minqty'].'-'.$piqdata['maxqty'];?></td>
                          <td>£
                            <?=$piqdata['price']?></td>
                          <td><span class="tip" > <a  title="Edit" href="addproduct.php?id=<?=$piqdata['ProductID']?>&rid=<?=$piqdata['id']?>&tab=3"> <img src="images/icon/icon_edit.png" > </a> </span> <span class="tip" > <a id="<?php  echo $piqdata['id'];?>" class="row_delete"  name="<?php  echo $piqdata['minqty'].'-'.$piqdata['maxqty'];?>_quantity" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span>Add Product Image</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <form id="productgallery" name="productgallery" enctype="multipart/form-data" action="addproductquantityp.php?action=<?php  echo $action; ?>&editid=<?php if(isset($rid)){ echo $rid; } ?>" method="post" onsubmit="return validateqty(this);">
                    <input type="hidden" name="product" id="product" value="<?=$id?>" />
                    <div class="section ">
                      <label>Minimum Quantity<small></small></label>
                      <div>
                        <select data-placeholder="Choose a Status..." class="" name="minqty" id="minqty">
                          <option value="" >Select Minimum Quantity</option>
                          <?php  

										$i = 1;

										while($i <= 100 ){

									?>
                          <option value="<?=$i?>" <?php  if($minqty==$i){?> selected="selected" <?php  }?> >
                          <?=$i?>
                          </option>
                          <?php  $i++ ; } ?>
                        </select>
                      </div>
                    </div>
                    <div class="section ">
                      <label>Maximum Quantity<small></small></label>
                      <div>
                        <select data-placeholder="Choose a Status..." class="" name="maxqty" id="maxqty">
                          <option value="" >Select Maximum Quantity</option>
                          <?php  

										$i = 1;

										while($i <= 200 ){

									?>
                          <option value="<?=$i?>" <?php  if($maxqty==$i){?> selected="selected" <?php  }?> >
                          <?=$i?>
                          </option>
                          <?php  $i++ ; } ?>
                        </select>
                      </div>
                    </div>
                    <div class="section ">
                      <label> Qty Discount<small>Text</small></label>
                      <div>
                        <input type="text" class="large" name="qty_discount"  id="qty_discount" value="<?php if ( isset( $qty_discount ) ) {  echo $qty_discount; } ?>">
                      </div>
                    </div>
                    <div class="section ">
                      <label>Price<small></small></label>
                      <div>
                        <input type="text" class="large" name="price"  id="price" <?php if(isset($price)){?> value="<?=$price?>" <?php } ?> >
                      </div>
                    </div>
                    <div class="section last">
                      <div>
                        <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php  } ?>
            </div>
            
            <!--tab3--> 
            
            <!--tab4-->
            
            <div id="tab4" class="tab_content">
              <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Customer Reviews</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablequantity" id="quantity">
                      <thead>
                        <tr> 
                          
                          <!--  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                          
                          <th>Customer Name</th>
                          <th>Ratings</th>
                          <th>Date</th>
                          <th>Approved</th>
                          <th>Management</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  

						$pisql="select * from customerreview where productid =".$id;

						$pires=mysqli_query($dbLink,$pisql) or die('could not select product image'); ?>
                        <?php 

						 	while($pidata=$pires->fetch_assoc())

								{ ?>
                        <tr>
                          <td><?php 

						  	$pisql1="select * from customer where CustomerID =".$pidata['customerid'];

							$pires1=mysqli_query($dbLink,$pisql1) or die('could not select product image');

							$cusdetail = $pires1->fetch_assoc();

						 	echo $cusdetail['FirstName'] .' '. $cusdetail['LastName'];?></td>
                          <td><?php  //echo $pidata['ratings'];

                          

                          for($x=1;$x<=$pidata['ratings'];$x++) {

								echo '<span class="fa fa-star checked"></span>';

								

							}

							while ($x<=5) {

								echo'<span class="fa fa-star"></span>';

								$x++;

							}

                        ?></td>
                          <td><?php  echo $pidata['date'];?></td>
                          <td><input type="checkbox" name="cr_status" id="cr_status" value="<?php  echo $pidata['crid'];?>"   <?php if($pidata['status']==1){?>checked="checked"<?php }?> /></td>
                          <td class="op"><a href="#" class="uibutton view_btn">View</a>
                            <input type="hidden"  value="<?php  echo $pidata['crid'];?>" class="crids"/>
                            <span class="tip" > <a id="<?php  echo $pidata['crid'];?>" class="row_delete"  name="<?php  echo str_replace('_','-',$pidata['descr']); ?>_crreview" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>
              <div class="onecolumn view_creview" >
                <div class="header"> <span ><span class="ico  gray random"></span>View Customer Review</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <table align="center" cellspacing="20" cellpadding="10">
                    <tr>
                      <td><label > Customer Name</label></td>
                      <td style="display:inline-block;width:200px;font-size:14px; line-height:20px;"><label style="font-weight:normal;" class="cus_name"> </label></td>
                    </tr>
                    <tr>
                      <td><label>Ratings</label></td>
                      <td style="display:inline-block;width:200px ; font-size:14px;line-height:20px;"><label style="font-weight:normal;" class="cus_rating"> </label>
                        <?php 

					  	//$starNumber = 3;

//                      	for($x=1;$x<=$starNumber;$x++) {

//                            echo '<span class="fa fa-star checked"></span>';

//                        }

//                       // if (strpos($starNumber,'.')) {

////                            echo '<img src="path/to/half/star.png" />';

////                            $x++;

////                        }

//                        while ($x<=5) {

//                            echo '<span class="fa fa-star"></span>';

//                            $x++;

//                        }

                         ?></td>
                    </tr>
                    <tr>
                      <td><label> Review</label></td>
                      <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;" class="cus_review"></label></td>
                    </tr>
                    <tr>
                      <td><label>Status</label></td>
                      <td style="display:inline-block;width:200px;font-size:14px;line-height:20px;"><label style="font-weight:normal;" class="cus_status"> </label></td>
                    </tr>
                      </tr>
                    
                  </table>
                </div>
              </div>
              <?php 

              

              } ?>
            </div>
            
            <!--tab4-->
            
            <!--tab5--> 
            
            <div id="tab5" class="tab_content">
              <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Product Attributs</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                  	<form id="productattributes" name="productattributes" action="addproductattrp.php?action=E&editid=<?php  echo $id; ?>" method="post" onsubmit="return validateqty(this);">
                    <div class="section ">
                    <div>
                    <?php 
						$sqlattr = "select * from attributes where Status= 1";
						$resattr = mysqli_query($dbLink,$sqlattr) or die("can not select attributes");
						 
						 while($dataattr = $resattr->fetch_assoc()){

								$attr_pro_1 = explode(',', $attr_pro);?>

								<input type="checkbox" name="attr_pro[]" id="abc_<?php echo $dataattr['id']; ?>" value="<?php echo $dataattr['id']; ?>" class="ck allstate" <?php if(in_array($dataattr['id'],$attr_pro_1)) { echo "checked='checked'"; } ?>/>

                        		<label for="abc_<?php echo $dataattr['id']; ?>"><?php echo $dataattr['Name']; ?></label><br  />
                                <div style=" margin-left:20px;" class="attr_var">
                                <?php 
                                 $sqlvar = "select * from attributes_variation where attr_id = ".$dataattr['id'];
								 $resvar = mysqli_query($dbLink,$sqlvar) or die("can not select variation");
								 while($datavar = $resvar->fetch_assoc()){
									 	$attr_var_1 = explode(',', $attr_var);
									 ?>
									<input type="checkbox" name="attr_var[]" id="var_<?php echo $datavar['id']; ?>" value="<?php echo $datavar['id']; ?>" class="ck allstate" <?php if(in_array($datavar['id'],$attr_var_1)) { echo "checked='checked'"; } ?> />

                        		<label for="var_<?php echo $datavar['id']; ?>"><?php echo $datavar['variation_name']; ?></label>
								<?php  }
								?>
                                </div>
                                
                                
                                
                        <?php } ?>
                    </div>
                    </div>
                    
                    <div class="section last">
                      <div>
                        <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                      </div>
                    </div>
                    </form>
                    
                  </div>
                  
                </div>
              </div>
              
              <?php 

              

              } ?>
            </div>
            
            <!--tab5--> 
            
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <?php  include('inc_footer.php'); ?>
  </div>
  
  <!--// End inner --> 
  
</div>

<!--// End content --> 

<script type="text/javascript">

	  $(function () {
		   
		  
		  alert('sfgdsf');	   
	$('.attr_var').hide();
	$('#pro_attr').change(function() {
		if($(this).is(":checked")) {
			$('.attr_var').show();
			
		}else{
			$('.other_attr_textbox').show();
			
		}
	});

		  <?php  if($_REQUEST['tab']== '1' || !isset($_REQUEST['tab'])) { ?>

  document.getElementById("tab1").style.display = "block";

  $("#first").addClass("active");

  $("#second").removeClass("active");

  $("#third").removeClass("active");

  $("#fourth").removeClass("active");

  <?php  } else if($_REQUEST['tab']== '2') { ?>

  document.getElementById("tab2").style.display = "block";

 $("#second").addClass("active");

  $("#first").removeClass("active");

  $("#third").removeClass("active");

  $("#fourth").removeClass("active");

  document.getElementById("tab1").style.display = "none";

  <?php  } else if($_REQUEST['tab']== '3') { ?>

  document.getElementById("tab3").style.display = "block";

 $("#third").addClass("active");

  $("#first").removeClass("active");

  $("#second").removeClass("active");

  $("#fourth").removeClass("active");

  document.getElementById("tab1").style.display = "none";

  <?php  }else if($_REQUEST['tab']== '4') { ?>

   

  document.getElementById("tab4").style.display = "block";

 $("#fourth").addClass("active");

  $("#first").removeClass("active");

  $("#third").removeClass("active");

  $("#second").removeClass("active");

  document.getElementById("tab1").style.display = "none";

  <?php  }  ?>

   });

   

  

   

   

</script>
</body>
</html>
