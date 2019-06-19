<? include "db.php";
include "fckeditor.php";
    $id = AssureSec($_GET['id']);

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from product where ProductID=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select product");
    $editrow = $editres->fetch_assoc();
	$CategoryID = stripcslashes($editrow['CategoryID']);
	$ProductName = stripslashes($editrow['ProductName']);

	$ImageName = stripslashes($editrow['ImageName']);
	$SKU = stripslashes($editrow['SKU']);


	$Price = stripslashes($editrow['Price']);
	$SalePrice = stripslashes($editrow['SalePrice']);
	$Inventory = stripslashes($editrow['Inventory']);
	$MinimumInventory = stripslashes($editrow['MinimumInventory']);
	$Description = stripslashes($editrow['Description']);

	$SeName = stripslashes($editrow['SeName']);
	$SeDescription = stripslashes($editrow['SeDescription']);
	$SeTitle = stripslashes($editrow['SeTitle']);
	$SeKeyword = stripslashes($editrow['SeKeyword']);
	$Width = stripslashes($editrow['Width']);
	$Height = stripslashes($editrow['Height']);
	$Weight = stripslashes($editrow['Weight']);
	
	$DisplayOrder = stripslashes($editrow['DisplayOrder']);
	
	$Status = stripslashes($editrow['Status']);
	
	

	
	
}
else
{
	$action = "A";
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
<?php include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript">
    function validate(form)
    {
        var extensions = new Array("jpg","jpeg","gif","png","bmp");
		
		if (form.CategoryID.value == "")
        {
            alert("Please Select Category")
            form.CategoryID.focus();
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
<?php include('inc_header.php'); ?>
<div id="shadowhead"></div>
<div id="hide_panel"> <a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc" rel="1" id="hide_menu"></a> <a class="butAcc" rel="0" id="show_menu_icon"></a> <a class="butAcc" rel="1" id="hide_menu_icon"></a> </div>
<?php include('inc_leftmenu.php'); ?>
<div id="content">
  <div class="inner">
    <?php include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;"><?php echo $_GET['msg']; ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
        <?php if($action == "E"){?>
        Edit Product </span>
        <?php } else{?>
        Add New Product </span>
        <?php } ?>
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="product.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <ul class="tabs" >
            <li ><a href="#tab1"  id="2"  > Product Details </a></li>
            <li ><a href="#tab2"  id="3"  > Gallery </a></li>
            <li ><a href="#tab3"  id="4"  > Quantity </a></li>
          </ul>
          <div class="tab_container" >
            <div id="tab1" class="tab_content">
              <form action="addproductp.php?action=<?php echo $action; ?>&editid=<? echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
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
                      <option value="<?=$cat['CategoryID']?>" <?php if($CategoryID==$cat['CategoryID']){?> selected="selected" <?php }?> <?php /*?> <?php if($parent_cat==$CategoryID['CategoryID']){?> selected="selected" <?php }?><?php */?>>
                      <?=$cat['CategoryName']?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="section ">
                  <label> Product Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="ProductName"  id="ProductName" value="<?=$ProductName?>">
                  </div>
                </div>
                <div class="section ">
                  <label> SKU<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="SKU"  id="SKU" value="<?=$SKU?>">
                  </div>
                </div>
                <div class="section ">
                  <label>Product Image<small></small></label>
                  <div>
                    <?php if( $ImageName != "")
									{ ?>
                    <img src="<?=$frontpath?>/ProductImage/<?=$ImageName?>?<?php echo time(); ?>" alt="" width="200px" height="200px" /><br />
                    <?php } ?>
                    <input type="file" class="fileupload" name="ImageName" id="ImageName" value="<?=$frontpath?>/ProductImage/<?=$ImageName?>" />
                  </div>
                </div>
                <div class="section ">
                  <label> Price<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Price"  id="Price" value="<?=$Price?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Sale Price<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="SalePrice"  id="SalePrice" value="<?=$SalePrice?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Inventory<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Inventory"  id="Inventory" value="<?=$Inventory?>">
                  </div>
                </div>
                <div class="section ">
                  <label> MinimumInventory<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="MinimumInventory"  id="MinimumInventory" value="<?=$MinimumInventory?>">
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
									$oFCKeditor->Value		= $Description;
									$oFCKeditor->Create() ;
									?>
                  </div>
                </div>
                <div class="section ">
                  <label> Se Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="SeName"  id="SeName" value="<?=$SeName?>">
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
									$oFCKeditor->Value		= $SeDescription;
									$oFCKeditor->Create() ;
									?>
                  </div>
                </div>
                <div class="section">
                  <label>Se Title <small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="SeTitle"  id="SeTitle" value="<?=$SeTitle?>">
                  </div>
                </div>
                <div class="section">
                  <label>Se Keyword<small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="SeKeyword"  id="SeKeyword" value="<?=$SeKeyword?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Width<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Width"  id="Width" value="<?=$Width?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Height<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Height"  id="Height" value="<?=$Height?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Weight<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Weight"  id="Weight" value="<?=$Weight?>">
                  </div>
                </div>
                <div class="section">
                  <label>Display Order<small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="DisplayOrder"  id="DisplayOrder" value="<?=$DisplayOrder?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Status<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Status..." class="" name="Status">
                      <option value="1" <?php if($Status!="" && $Status==1) { echo 'selected="selected"'; } ?>>Active</option>
                      <option value="0" <?php if($Status!="" && $Status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
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
            
            <div id="tab2" class="tab_content">
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
                            <?php } else { ?>
                            <img width="49" height="22" src="../ProductGallery/<?php echo $pidata['imagename']; ?>?<?php echo time(); ?>" alt=""/>
                            <?php } ?></td>
                          <td><?=$pidata['imagename']?></td>
                          <td><span class="tip" > <a id="<?php echo $pidata['id'];?>" class="row_delete"  name="<?php echo str_replace('_','-',$pidata['imagename']); ?>_imagegallery" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                        </tr>
                        <?php } ?>
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
                  <form id="productgallery" name="productgallery" enctype="multipart/form-data" action="addproductimagep.php?action=A&editid=<? echo $id;?>" method="post" onsubmit="return validategallery(this);">
                    <div class="section ">
                      <label>Product Image<small></small></label>
                      <div>
                        <input type="hidden" value="<?=$id?>" name="product" id="product" />
                        <input type="file" class="fileupload" name="imagename" id="imagename" value="<?=$frontpath?>/ProductImage/<?=$imagename?>" />
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
            <!--tab2-->
            
            <div id="tab3" class="tab_content">
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Product Quantity</span> </div>
                <!-- End header -->
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablegallery" id="gallery">
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
							$rid=$_REQUEST['rid'];
						if($rid != "")
						{
						  $piqsql1="select * from quantity where id =".$rid;
						  $piqres1=mysqli_query($dbLink,$piqsql1) or die('could not select product Quantity'); 
						  $piqrow=$piqres1->fetch_assoc();
						  $minqty=$piqrow['minqty'];
						  $maxqty=$piqrow['maxqty'];
						  $price=$piqrow['price'];
						  $action = "E";
						}
						else
						{
							$action = "A";
						}?>
                        <?php

						 	while($piqdata=$piqres->fetch_assoc())
								{ ?>
                        <tr>
                          <td><?php echo $piqdata['minqty'].'-'.$piqdata['maxqty'];?></td>
                          <td><?=$piqdata['price']?></td>
                          <td> <span class="tip" > <a  title="Edit" href="addproduct.php?id=<?=$piqdata['ProductID']?>&rid=<?=$piqdata['id']?>"> <img src="images/icon/icon_edit.png" > </a> </span> <span class="tip" > <a id="<?php echo $pidata['id'];?>" class="row_delete"  name="<?php echo $piqdata['minqty'].'-'.$piqdata['maxqty'];?>_imagegallery" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                        </tr>
                        <?php } ?>
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
                  <form id="productgallery" name="productgallery" enctype="multipart/form-data" action="addproductquantityp.php?action=<?php echo $action; ?>&editid=<? echo $rid;?>" method="post" onsubmit="return validateqty(this);">
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
                          <option value="<?=$i?>" <?php if($minqty==$i){?> selected="selected" <?php }?> >
                          <?=$i?>
                          </option>
                          <?php $i++ ; } ?>
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
                          <option value="<?=$i?>" <?php if($maxqty==$i){?> selected="selected" <?php }?> >
                          <?=$i?>
                          </option>
                          <?php $i++ ; } ?>
                        </select>
                      </div>
                    </div>
                    <div class="section ">
                      <label>Price<small></small></label>
                      <div>
                        <input type="text" class="large" name="price"  id="price" value="<?=$price?>">
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
            <!--tab3--> 
            
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <?php include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
</body>
</html>
