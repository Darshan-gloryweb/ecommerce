<?php include "db.php";
	if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
			for($i=0;$i<count($ids);$i++)
			{	
				$sql2="delete from promotioncode where PromotionID=".$ids[$i]; 
	 			mysqli_query($dbLink,$sql2) or die('could not Delete product..');	
			}
			$msg="Records Deleted Successfully";
		}
	}
    $sql = "Select * from promotioncode order by CreatedOn DESC";
    $r = mysqli_query($dbLink,$sql) or die("can not select product");
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

<!-- Link css-->

<?php  include('include_files.php'); ?>
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
      <div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div>
    </div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray random"></span> Promotions </span> </div>
      <!-- End header -->
      
      <div class=" clear"></div>
      <div class="content" >
        <form id="promotionfrm" name="promotionfrm" method="post">
          <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.promotionfrm.submit();
   return false" />
          <div style="position:absolute;margin-left:70px;"><a href="addpromotion.php" class="uibutton icon confirm add" >Add Promotions</a></div>
          <div class="tableName">
            <table class="display data_tableproduct" id="product">
              <thead>
                <tr>
                  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                  <th align="left"><div class="th_wrapp">&nbsp;&nbsp;&nbsp;Promotion Code</div></th>
                  <th>Percentage</th>
                  <th align="left">Start Date</th>
                  <th align="left">End Date</th>
                  <th>Number Of Uses</th>
                  <th align="left">Status</th>
                  <th>Management</th>
                </tr>
              </thead>
              <tbody>
                <?php 
							while($data=$r->fetch_assoc())
								{ ?>
                <tr>
                  <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['PromotionID']?>" value="<?=$data['PromotionID']?>"/></td>
                  <td align="left"><?=$data['Code']?></td>
                  <td><?=$data['Percentage']; ?></td>
                  <td align="left"><?=$data['StartDate']?></td>
                  <td align="left"><?=$data['EndDate']?></td>
                  <td ><?=$data['Uses']?></td>
                  <td align="left"><?php  if($data['Status']==1) { echo "Active";} else { echo "Inactive";}; ?></td>
                  <td><span class="tip" > <a  title="Edit" href="addpromotion.php?id=<?php  echo $data['PromotionID'];?>" > <img src="images/icon/icon_edit.png" > </a> </span> <span class="tip" > <a id="<?php  echo $data['PromotionID'];?>" class="row_delete"  name="<?php  echo $data['Code']; ?>_product" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
                </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
    <div class="clear"></div>
    
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
  
</div>
<!--// End content -->

</body>
</html>
