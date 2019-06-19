<?php include "db.php";

if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{
			$sql="delete from bannerscript where id=".$ids[$i];
			mysqli_query($dbLink,$sql) or die ("Could Not Delete");
			
		}
		$msg="Scripts Deleted Successfully";
		}
	}

    $sql = "Select * from bannerscript where size='".$_REQUEST['size']."'";
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
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Banner Script for Size <?=$_REQUEST['size']?></span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form id="scriptfrm" name="scriptfrm" method="post"> 
                    <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton" value="Delete" onclick="if (confirm('Are You Sure To Delete All Script?')) 
  document.scriptfrm.submit();
   return false" />
                    <div style="position:absolute;margin-left:70px;"><a href="manageadbanners.php" class="uibutton submit_form" >Back</a></div>
                    <div style="position:absolute;margin-left:140px;"><a href="addscript.php?size=<?=$_REQUEST['size']?>" class="uibutton submit_form" >Add Script</a></div> 
					<div class="tableName">
                    <table class="display data_script" id="Script">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                    <th align="left"><div class="th_wrapp">Script</div></th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['id']?>" value="<?=$data['id']?>"/></td>
                                    <td align="left"><?php  echo substr($data['script'],0,50); ?></td>
                                    <td>
                                      <span class="tip">
                                          <a  title="Edit" href="addscript.php?size=<?=$_REQUEST['size']?>&id=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $_REQUEST['size'].' Script'; ?>_script" title="Delete"  >
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
