<?php include "db.php";

if(isset($_POST['cbx']))
	{
		$ids=$_POST['cbx'];
		if(count($ids)>0)
		{
		for($i=0;$i<count($ids);$i++)
		{
			
			
			$sqll = "select ImagePath from homebanner where BannerID=".$ids[$i];
			 $res = mysqli_query($dbLink,$sqll) or die('could not select..');
			 $row = $res->fetch_assoc();
			 $Mloc="../HomeBanner/";

			  $dr1 = $row['ImagePath'];
			  $dr1loc = $Mloc.$row['ImagePath'];
				  if (is_file($dr1loc)==true)
				  {
					  unlink($dr1loc);
				  }
				
				
			$sql="delete from homebanner where BannerID=".$ids[$i];
			mysqli_query($dbLink,$sql) or die ("Could Not Delete");
			
		}
		$msg="Banners Deleted Successfully";
		}
	}

    $sql = "Select * from homebanner";
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
					 $right=user_right('homebanner.php');
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
                    <span ><span class="ico  gray random"></span> Banner</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form id="bannerfrm" name="bannerfrm" method="post"> 
                    <input style="position:absolute;" name="bulkdelete" type="button" class="uibutton confirm" value="Delete" onclick="if (confirm('Are You Sure To Delete All Slides?')) 
  document.bannerfrm.submit();
   return false" />
                    <div style="position:absolute;margin-left:70px;"><a href="addhomebanner.php" class="uibutton icon confirm add" >Add Banner</a></div> 
					<div class="tableName">
                    <table class="display data_banner" id="banner">
                                <thead>
                                  <tr>
                                  	<th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                                    <th align="left"><div class="th_wrapp">Banner</div></th>
                                    <th align="left">Name</th>
                                    <th align="left">Text</th>
                                    <th align="left">Url</th>
                                    <th align="left">Status</th>
                                    <th>Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								
								while($data=$r->fetch_assoc())
								{ ?>
									<tr>
                                    <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="<?=$data['BannerID']?>" value="<?=$data['BannerID']?>"/></td>
                                    <td align="left"><img height="50" width="50" src="<?=$frontpath?>/HomeBanner/<?=$data['ImagePath']?>?<?php  echo time(); ?>" alt="Banner" /></td>
                                    <td align="left"><?php  echo $data['BannerName']; ?></td>
                                    <td align="left"><?php  echo $data['BannerText']; ?></td>
                                    <td align="left"><?php  echo $data['BannerUrl']; ?></td>
                                    <td align="left"><?php  if($data['Status'] == 1){ echo "Active"; } else { echo "Inactive"; } ?></td>
                                    <td>
                                      <span class="tip">
                                          <a  title="Edit" href="addhomebanner.php?id=<?php  echo $data['BannerID'];?>" >
                                              <img src="images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php  echo $data['BannerID'];?>" class="row_delete"  name="<?php  echo $data['BannerName']; ?>_homebanner" title="Delete" >
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
