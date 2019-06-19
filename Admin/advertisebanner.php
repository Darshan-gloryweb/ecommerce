<?php include "db.php";

    $sql = "Select * from advertisebanner ";
    $r = mysqli_query($dbLink,$sql) or die("can not select advertise banner");
	
	
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
<?php  include('inc_leftmenu.php');   ?>
<div id="content">
  <?php   include("sec.php");
	 $right=user_right('category.php');
	 if($right==false)
	 {
		 ?>
  <div class="inner">
    <?php  include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray random"></span> You Have No Right To Access This Page </span> </div>
      <!-- End header -->
      <div class=" clear"></div>
    </div>
  </div>
  <?php 
	 }
	 else
	 {   ?>
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
      <div class="header"> <span ><span class="ico  gray random"></span> Advertise Banner </span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
      
        <form id="advertisebannerfrm" name="advertisebannerfrm" method="post" >
          <!--<input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.categoryfrm.submit();
   return false" />-->
          <div style="position:absolute;"><a href="add_advertisebanner.php" class="uibutton icon confirm add" >Add Advertise Banner</a></div>
          <div class="tableName">
            <table class="display data_advertisebanner" id="advertisebannert">
              <thead>
                <tr> 
                  <!--<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                  
                  <th>Advertise Banner Name</th>
                  <th>Display Order</th>
                  <th>Status </th>
                  <th>Management</th>
                </tr>
              </thead>
              <tbody>
                <?php 
						 	while($data=$r->fetch_assoc())
								{ ?>
                <tr> 
                
                  
                 
                  
                  <td><?php echo $data['advertisebanner_title']?></td>
                  
                  <td align="center"><?php  echo $data['advertisebanner_display_order']; ?></td>
                  
                  <td><?php  if($data['advertisebanner_status']==1) { echo "Active";} else { echo "Inactive";}; ?></td>
                  <td>
                  	<span class="tip" > 
                    	<a  title="Edit" href="add_advertisebanner.php?id=<?php  echo $data['advertisebannerID'];?>" > 
                        	<img src="images/icon/icon_edit.png" > 
                         </a> 
                    </span> 
                    <span class="tip" > 
                    	
                        <a id="<?php  echo $data['advertisebannerID'];?>" class="row_delete"  name="<?php  echo $data['advertisebanner_title']; ?>_advertisebanner" title="Delete" > 
                            <img src="images/icon/icon_delete.png" > 
                            </a> 
                    </span>
                  </td>
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
  <?php  } ?>
</div>
<!--// End content -->

</body>
</html>
