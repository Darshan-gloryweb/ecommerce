<?php include "db.php";

	if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{	
			
			$sql2="delete from feedback where id=".$ids[$i]; 
	 		mysqli_query($dbLink,$sql2) or die('could not Delete Feedback..');	
				
		}
		$msg="Records Deleted Successfully";
		}
	}

    $sql = "Select * from feedback order by Createdon DESC";
    $r = mysqli_query($dbLink,$sql) or die("can not select feedback");
	
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
                     <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray random"></span> Feedback </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                   
                    <form id="feedbackform" name="feedbackform" method="post"> 
                    <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete These Records?')) 
  document.feedbackform.submit();
   return false" />
                  <!--  <div style="position:absolute;margin-left:70px;"><a href="viewfeedback.php" class="uibutton icon confirm add" >View Feedback</a></div>-->
					<div class="tableName">
                    <table class="display data_tablefeedback" id="product">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                   
                                    <th align="left" >&nbsp;&nbsp;&nbsp;Name</th>
                                    <th align="left">Contact</th>
									<th align="left">Email</th>
                                    <th align="left">Ratings</th>
                                    <th align="left">Created On</th>
                                    <th align="left">Status </th>
                                    <th align="left">Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['id']?>" value="<?=$data['id']?>"/></td>
                                     
                                    <td align="left"><?php  echo $data['firstname']; ?></td>
                                    <!--<td align="left"> <?php  echo $data['lastname']; ?> </td>
                                    <td align="left"><?php  echo $data['city']; ?></td>-->
                                    <td align="left"><?php  echo $data['contact']; ?></td>
                                    <td align="left"><?php  echo  $data['email']; ?></td>
                                    <td align="left"><?php  echo  $data['ratings']; ?></td>
                                    <td align="left"><?php  echo date('d - M - Y ',strtotime($data['createdon'])); ?></td>
                                    <td align="left"><?php  if($data['status']==1) { echo "Active";} else { echo "Inactive";}; ?></td>       
                                    <td align="left">
                                     
                                      <span class="tip" >
                                          <a  title="View" href="viewfeedback.php?id=<?php  echo $data['id'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['id'];?>" class="row_delete"  name="<?php  echo $data['firstname']; ?>_feedback" title="Delete" >
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
