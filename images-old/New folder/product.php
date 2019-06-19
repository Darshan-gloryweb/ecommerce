<? include "db.php";

	if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{	
			$sqll = "select * from product where ProductID=".$ids[$i];
			$res = mysqli_query($dbLink,$sqll) or die('could not select..');
			$row = $res->fetch_assoc();
			$Mloc="../ProductImage/";

			  $dr1 = $row['ImageName'];
			  $dr1loc = $Mloc.$row['ImageName'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
			
			$sql2="delete from product where ProductID=".$ids[$i]; 
	 		mysqli_query($dbLink,$sql2) or die('could not Delete product..');
			
			$sql2="delete from productcategory where ProductID=".$ids[$i]; 
	 		mysqli_query($dbLink,$sql2) or die('could not Delete productcategory..');
			
			$sql2="delete from productcustomerprice where ProductID=".$ids[$i]; 
	 		mysqli_query($dbLink,$sql2) or die('could not Delete productcustomerprice..');
			
			$sql2="delete from productquantitydiscount where ProductId=".$ids[$i]; 
	 		mysqli_query($dbLink,$sql2) or die('could not Delete productquantitydiscount..');	
				
		}
		$msg="Records Deleted Successfully";
		}
	}

    $sql = "Select * from product";
    $r = mysqli_query($dbLink,$sql) or die("can not select product");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title><?=$pgtitle?></title>
        <!-- Link shortcut icon-->
        <link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> 
        <!-- Link css-->
        <?php include('include_files.php'); ?>   
    
         
        </head>        
        <body class="dashborad">        
        <div id="alertMessage" class="error"></div> 
      
       <?php include('inc_header.php'); ?>
			<div id="shadowhead"></div>
            <div id="hide_panel"> 
                  <a class="butAcc" rel="0" id="show_menu"></a>
                  <a class="butAcc" rel="1" id="hide_menu"></a>
                  <a class="butAcc" rel="0" id="show_menu_icon"></a>
                  <a class="butAcc" rel="1" id="hide_menu_icon"></a>
            </div>           
      
          <?php include('inc_leftmenu.php'); ?>          

            
            <div id="content">
                <div class="inner">
					<?php include('inc_toplogo.php'); ?>
                    <div class="clear"></div>
                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php echo $msg; ?></div></div>
                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php echo $_GET['msg']; ?></div></div>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Product </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                   
                    <form id="productfrm" name="productfrm" method="post"> 
                    <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.productfrm.submit();
   return false" />
                    <div style="position:absolute;margin-left:70px;"><a href="addproduct.php" class="uibutton icon confirm add" >Add Product</a></div>
					<div class="tableName">
                    <table class="display data_tableproduct" id="product">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                   
                                    <th align="left"><div class="th_wrapp">Product Name</div></th>
                                    
									<th>SKU</th>
                                    <th>Image</th>
                                    <th>Product Type</th>
                                    <th>Price</th>
                                    <th>Status </th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['ProductID']?>" value="<?=$data['ProductID']?>"/></td>
                                     
                                    <td align="left"><?php echo $data['ProductName']; ?></td>
                                  
                                    <td align="left"><?php echo $data['SKU']; ?></td>
                                    <td>
                                    <?php
									if($data['ImageName']=="")
									{ ?>
                                      <img width="49" height="22" src="images/noimg.jpg" alt="No Image"/>
                                      <?php } else { ?>
                                     <img width="49" height="22" src="../ProductImage/<?php echo $data['ImageName']; ?>?<?php echo time(); ?>" alt=""/>
                                     <?php } ?>
                                    </td>
                                    <td align="center"><?php 
										$s = "select producttypename from producttype where producttypeid=".$data['ProductType'];										
										$res = mysqli_query($dbLink,$s);
									$result=$res->fetch_assoc();
										echo $result['producttypename']; ?></td>
                                    <td align="center"><?php echo $data['Price']; ?></td>
                                    <td><?php if($data['Status']==1) { echo "Active";} else { echo "Inactive";}; ?></td> 
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="addproduct.php?id=<?php echo $data['ProductID'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $data['ProductID'];?>" class="row_delete"  name="<?php echo $data['ProductName']; ?>_product" title="Delete" >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
                                        </td>
                                  </tr>
								<?php } ?>
                                
                                </tbody>
                              </table></div></form>
					</div>
					</div>
                
                    <div class="clear"></div>
                    <?php include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
