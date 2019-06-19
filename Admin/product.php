<?php include "db.php";



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

		}

		$msg="Records Deleted Successfully";

		}

	}



    $sql = "Select product.*,category.CategoryName from product inner join category on product.CategoryID=category.CategoryID";

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

        <?php  include('include_files.php'); ?>   

    

         

        </head>        

        <body class="dashborad">        

        <div id="alertMessage" class="error"></div> 

      

       <?php  include('inc_header.php'); ?>

			<div id="shadowhead"></div>

            <div id="hide_panel"> 

                  <a class="butAcc" rel="0" id="show_menu"></a>

                  <a class="butAcc" rel="1" id="hide_menu"></a>

                  <a class="butAcc" rel="0" id="show_menu_icon"></a>

                  <a class="butAcc" rel="1" id="hide_menu_icon"></a>

            </div>           

      

          <?php  include('inc_leftmenu.php'); ?>          



            

            <div id="content">

                <div class="inner">

					<?php  include('inc_toplogo.php'); ?>

                    <div class="clear"></div>

                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div></div>

                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php if(isset($_GET['msg'])){ if(isset($_GET['msg'])){ echo $_GET['msg']; } } ?></div></div>

                    <div class="onecolumn" >

                    <div class="header">

                    <span ><span class="ico  gray random"></span> Product </span>

                    </div><!-- End header -->	

                    <div class=" clear"></div>
					<div class="content" >
						<div class="row">
							<form class="form-horizontal" action="<?php echo $adminpath;?>/importproduct.php" method="post" name="upload_excel" enctype="multipart/form-data">
							<fieldset>
							<!-- Form Name -->
							<legend>Form Name</legend>
 
									<!-- File Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="filebutton">Select File</label>
										<div class="col-md-4">
											<input type="file" name="file" id="file" class="input-large">
										</div>
									</div>
				 
									<!-- Button -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="singlebutton">Import data</label>
										<div class="col-md-4">
											<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
										</div>
									</div>
				 
								</fieldset>
							</form>
				 
						</div>
					</div>
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

                                   

                                    <th align="left"><div class="th_wrapp">&nbsp;&nbsp;&nbsp;Product Name</div></th>

                                    
									<th>Image</th>
									<th align="left">SKU</th>

                                    

                                    <th>Category</th>

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

                                     

                                    <td align="left"><?php  echo $data['ProductName']; ?></td>

                                  <td>

                                    <?php 

									if($data['ImageName']=="")

									{ ?>

                                      <img width="49" height="22" src="images/noimg.jpg" alt="No Image"/>

                                      <?php  } else { ?>

                                     <img width="49" height="22" src="../ProductImage/<?php  echo $data['ImageName']; ?>?<?php  echo time(); ?>" alt=""/>

                                     <?php  } ?>

                                    </td>

                                    <td align="left"><?php  echo $data['SKU']; ?></td>

                                    

                                   <td ><?php  echo $data['CategoryName']; ?></td>

                                    <td >£ <?php  echo $data['Price']; ?></td>

                                    <td><?php  if($data['Status']==1) { echo "Active";} else { echo "Inactive";}; ?></td> 

                                    <td>

                                      <span class="tip" >

                                          <a  title="Edit" href="addproduct.php?id=<?php  echo $data['ProductID'];?>" >

                                              <img src="images/icon/icon_edit.png" >

                                          </a>

                                      </span> 

                                      <span class="tip" >

                                          <a id="<?php  echo $data['ProductID'];?>" class="row_delete"  name="<?php  echo $data['ProductName']; ?>_product" title="Delete" >

                                              <img src="images/icon/icon_delete.png" >

                                          </a>

                                      </span> 

                                        </td>

                                  </tr>

								<?php  } ?>

                                

                                </tbody>

                              </table></div></form>

					</div>

					</div>

                

                    <div class="clear"></div>

                    <?php  include('inc_footer.php'); ?>

                </div> <!--// End inner -->

            </div> <!--// End content --> 

</body>

</html>

