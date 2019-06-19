<?php include "db.php";

	$sql = "Select * from pagemgnt";
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
					 $right=user_right('managepage.php');
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

					 <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Page List </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <div style="position:absolute"><a href="addpage.php" class="uibutton submit_form" >Add new Page</a></div>
                    <form> 
					<div class="tableName">
                    

                              <table class="display data_tablepage" id="">
                                <thead>
                                  <tr>
                                    <th align="left">Title</th>
                                    <th align="left">Slug</th>
                                    <th align="left">Update By</th>
                                    <th align="left">Status </th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td align="left"><?php  echo stripcslashes($data['title']); ?></td>
                                    <td align="left"><?php  echo $data['slug']; ?></td>
                                    <td align="left"><?php  echo $data['updatedby']; ?></td>
                                    <td align="left"><?php  if($data['status']==1) { echo "Active";} else { echo "Inactive";}; ?></td>
                                    <td>
                                      <span class="tip" >
                                          <a  title="Edit" href="addpage.php?id=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $data['title']; ?>_page" title="Delete"  >
                                              <img src="images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
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
