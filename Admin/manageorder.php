<?php include "db.php";

/*if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{
			
			//Delete photos
			$photo_sql = "Select PhotoID from photos where CategoryID=".$ids[$i];
			$photo_res = mysqli_query($dbLink,$photo_sql) or die ('Could Not Select Photos');
			if(mysqli_num_rows($photo_res)>0)
			{
			 while ($pdata = mysql_fetch_assoc($photo_res))
			{	
			 $sqll = "select ImagePath from photos where PhotoID=".$pdata['PhotoID'];
			 $res = mysqli_query($dbLink,$sqll) or die('could not select..');
			 $row = mysql_fetch_array($res);
			 $Mloc="../PhotoImage/";

			  $dr1 = $row['ImagePath'];
			  $dr1loc = $Mloc.$row['ImagePath'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
			$sql="delete from photos where PhotoID=".$pdata['PhotoID'];
			mysqli_query($dbLink,$sql) or die ("Could Not Delete");
			
			}
			}
			//Delete Photos
			
			$sqll = "select CategoryImage from category where CategoryID=".$ids[$i];
			 $res = mysqli_query($dbLink,$sqll) or die('could not select..');
			 $row = mysql_fetch_array($res);
			 $Mloc="../CategoryImage/";

			  $dr1 = $row['CategoryImage'];
			  $dr1loc = $Mloc.$row['CategoryImage'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
				  
			$sql="delete from category where CategoryID=".$ids[$i];
			mysqli_query($dbLink,$sql) or die ("Could Not Delete");
			
		}
		$msg="Category Deleted Successfully";
		}
	}*/

    $sql = "Select custorder.*,ordercart.OrderTotal from custorder inner join ordercart	on custorder.OrderNumber = ordercart.OrderNumber order by CreatedOn DESC";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
	
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
                    <?php 
					include("sec.php");
					 $right=user_right('manageorder.php');
					 if($right==false)
					 {
						 ?>
                         <div class="onecolumn" >
                    	 <div class="header">
                    	 <span ><span class="ico  gray spreadsheet"></span>You Have No Right To Access This Page</span>
                    	 </div><!-- End header -->
                    <?php 
					 }
					 else
					 {			
					 ?>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Manage Order</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form id="categoryfrm" name="categoryfrm" method="post"> 
                    <!--<input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete All Categories?')) 
  document.categoryfrm.submit();
   return false" />
                    <div style="position:absolute;margin-left:70px;"><a href="addcategory.php" class="uibutton icon confirm add" >Add Category</a></div> -->
					<div class="tableName">
                    <table class="display data_order" id="order">
                                <thead>
                                  <tr>
                                  	<th width="35"><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                    <th align="left">Order Number</th>
                                    <th align="left">Name</th>
                                    <th align="left">Order Date</th>
                                    <th align="left">Total</th>
                                    <th align="left">Status</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['OrderNumber']?>" value="<?=$data['OrderNumber']?>"/></td>
                                    <td align="left"><?=$data['OrderNumber']?></td>
                                    <td align="left"><?php  echo $data['FirstName'].' '.$data['LastName']; ?></td>
                                    <td align="left"><?php  echo $data['OrderDate']; ?></td>
                                    <td align="left">£ <?php  echo $data['OrderTotal']; ?></td>
                                    
                                    <td align="left"><?php  if($data['Status'] == 1){ echo "Pending";}?>
                    	<?php  if($data['Status'] == 2){ echo "Completed";}?>
                        <?php  if($data['Status'] == 3){ echo "Cancelled";}?>
                     	</td>
                                    <td>
                                      <span class="tip">
                                          <a  title="Edit" href="vieworder.php?id=<?=$data['OrderNumber']?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                   <!--   <span class="tip" >
                                          <a id="<?php  echo $data['CategoryID'];?>" class="row_delete"  name="<?php  echo $data['CategoryName']; ?>_category" title="Delete" >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> -->
                                        </td>
                                  </tr>
								<?php  } ?>
                                
                                </tbody>
                              </table></div></form>
					</div>
                    <?php  } ?>
					</div>
                
                    <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
