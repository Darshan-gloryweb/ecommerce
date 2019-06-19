<?php include "db.php";

	if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{
			$sql="delete from contactmgnt where id=".$ids[$i];
			mysqli_query($dbLink,$sql) or die ("Could Not Delete");
		}
		$msg="Records Deleted Successfully";
		}
	}
	
    $sql = "Select * from contactmgnt";
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
					 $right=user_right('managecontact.php');
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
                    <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  echo $msg; ?></div></div>                    
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Contact List </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form name="contactfrm" id="contactfrm" method="post"> 
                    <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.contactfrm.submit();
   return false" />
					<div class="tableName">
                    <table class="display data_tablecontact" id="contact">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                    <th align="left"><div class="th_wrapp">Name</div></th>
                                    <th align="left">city</th>
                                    <th align="left">Email</th>
                                    <th align="left">Contact</th>
                                    <th>Time</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['id']?>" value="<?=$data['id']?>"/></td>
									<td align="left"><?php  echo $data['fname']." ".$data['lname']; ?></td>
                                    <td align="left"><?php  echo $data['city']; ?></td>
                                    <td align="left"><?php  echo $data['email']; ?></td>
                                    <td align="left"><?php  echo $data['contact']; ?></td>
                                    <td><?php  echo date('d - M - Y ',strtotime($data['date']));?></td>
                                    <td>
                                    	<span class="tip" >
                                          <a  title="View" href="viewcontact.php?id=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $data['fname']." ".$data['lname']; ?>_contact" title="Delete"  >
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
