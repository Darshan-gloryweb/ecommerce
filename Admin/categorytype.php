<?php include "db.php";

	/*if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		$parents = array();
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{
			$s="select * from categorymapping where ParentCategoryID=".$ids[$i]; 
	 		$result=mysqli_query($dbLink,$s);
	 		if(mysqli_num_rows($result)>0){
				$parents[] = $ids[$i];
				//print_r($parents);
			}
			else{
				$sqll = "select * from category where CategoryID=".$ids[$i];
				$res = mysqli_query($dbLink,$sqll) or die('could not select..');
				$row = mysql_fetch_array($res);
				$Mloc="../CategoryIcon/";

			  	$dr1 = $row['ImageName'];
			  	$dr1loc = $Mloc.$row['ImageName'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
			
				$sql2="delete from category where CategoryID=".$ids[$i]; 
	 			mysqli_query($dbLink,$sql2) or die('could not Delete..');
			
				$sql2="delete from categorymapping where ParentCategoryID=".$ids[$i]; 
	 			mysqli_query($dbLink,$sql2) or die('could not Delete categorymapping..');
			
				$sql2="delete from categorymapping where CategoryID=".$ids[$i]; 
	 			mysqli_query($dbLink,$sql2) or die('could not Delete categorymapping..');
			}
		}
		if(count($parents) == 0){
			$msg="Records Deleted Successfully";
		}
		else{
			$msg = "Records Deleted Successfully Except".print_r($parents);	
		}
		}
	}*/
  


    $sql = "Select * from categorytype";
    $r = mysqli_query($dbLink,$sql) or die("can not select category");
	
	
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
	 $right=user_right('categorytype.php');
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
      <div class="header"> <span ><span class="ico  gray random"></span>Category Type</span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
      
        <form id="categoryfrm" name="categoryfrm" method="post">
          <!--<input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.categoryfrm.submit();
   return false" />-->
          <div style="position:absolute;"><a href="addcategorytype.php" class="uibutton icon confirm add" >Add Category Type</a></div>
          <div class="tableName">
            <table class="display data_tablecategorytype" id="categorytype">
              <thead>
                <tr> 
                  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                  <th align="left"><div class="th_wrapp">Icon</div></th>
                  <th align="left"><div class="th_wrapp">Category Type</div></th>
                  <th>Management</th>
                </tr>
              </thead>
              <tbody>
                <?php 
						 	while($data=$r->fetch_assoc())
								{ ?>
                <tr> 
                  <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['id']?>" value="<?=$data['id']?>"/></td>
                  <td><?php 
									if($data['ImageName']=="")
									{ ?>
                    <img width="49" height="22" src="images/noimg.jpg" alt="No Image"/>
                    <?php  } else { ?>
                    <img width="49" height="22" src="../CategoryTypeIcon/<?php  echo $data['ImageName']; ?>?<?php  echo time(); ?>" alt=""/>
                    <?php  } ?></td>
                  <td align="left"><?php  echo $data['name']; ?></td>
                  <td><span class="tip" > <a  title="Edit" href="addcategorytype.php?id=<?php  echo $data['id'];?>" > <img src="images/icon/icon_edit.png" > </a> </span> <span class="tip" > <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $data['name']; ?>_categorytype" title="Delete" > <img src="images/icon/icon_delete.png" > </a> </span></td>
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
