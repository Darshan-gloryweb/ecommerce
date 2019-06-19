<?php include "db.php";

$sql = "SELECT * FROM adminuser";
$res = mysqli_query($dbLink,$sql) or die ('Could Not Select Users');
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
                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div></div>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Users </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <div style="position:absolute;"><a href="adduser.php" class="uibutton icon confirm add" >Add User</a></div>
					<div class="tableName">
                    <table class="display user_table" id="user">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                    <th>Image</th>
                                    <th align="left">Name</th>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$res->fetch_assoc())
								{ 
								?>
									<tr>
                                 
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['AdminUserID']?>" value="<?=$data['AdminUserID']?>"/></td>
                                    <td>
                                    <?php 
									if($data['AImg']=="")
									{ ?>
                                      <img width="49" height="22" src="images/noimg.jpg" alt="No Image"/>
                                      <?php  } else { ?>
                                     <img width="49" height="22" src="../UserImage/<?php  echo $data['AImg']; ?>?<?php  echo time(); ?>" alt=""/>
                                     <?php  } ?>
                                    </td>
                                    <td align="left"><?php  echo $data['FirstName'].' '.$data['LastName']; ?></td>
                                    <td><?php  echo $data['UserName']; ?></td>
                                    <td><?php  echo $data['Email']; ?></td>
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="adduser.php?id=<?php  echo $data['AdminUserID'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <?php  if($data['AdminUserID']!=$_SESSION['what_adminid']){ ?>
                                      <span class="tip" >
                                          <a id="<?php  echo $data['AdminUserID'];?>" class="row_delete"  name="<?php  echo $data['FirstName'].' '.$data['LastName']; ?>_user" title="Delete"  >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> <?php  } ?>
                                        </td>
                                  </tr>
								<?php 
								
								} ?>
                                
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
