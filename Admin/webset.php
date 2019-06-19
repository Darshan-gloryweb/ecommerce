<?php include "db.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        
        <title><?=$pgtitle?></title>
     <?php  include('include_files.php'); ?>
    <script language="javascript" type="text/javascript" src="validation.js"></script>
        
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
					 $right=user_right('webset.php');
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
                    <span ><span class="ico  gray spreadsheet"></span>Website Settings</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <form> 
					<div class="tableName">

                              <table class="display data_tablenavigation" id="">
                                <thead>
                                  <tr>
                                    <th align="left">Website Settings</th>
                                    <th>Settings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                    	<td align="left">Path And Titles</td>
                                        <td><a href="pathandtitles.php">Settings</a></td>
                                    </tr>
                                    <tr>
                                    	<td align="left">Mail Settings</td>
                                        <td><a href="mailsettings.php">Settings</a></td>
                                    </tr>
                                    <tr>
                                    	<td align="left">Contact</td>
                                        <td><a href="contactsettings.php">Settings</a></td>
                                    </tr>
                                    <tr>
                                    	<td align="left">Logo And Text</td>
                                        <td><a href="logosettings.php">Settings</a></td>
                                    </tr>
                                    <tr>
                                    	<td align="left">Menu</td>
                                        <td><a href="setmenu.php">Settings</a></td>
                                    </tr>
									 <tr>
                                    	<td align="left">Shiiping Time</td>
                                        <td><a href="shippingtime.php">Settings</a></td>
                                    </tr>
									<tr>
                                    	<td align="left">Map</td>
                                        <td><a href="map.php">Settings</a></td>
                                    </tr>
                                    <tr>
                                    	<td align="left">Deals Banner</td>
                                        <td><a href="manage_deals.php">Settings</a></td>
                                    </tr>
									<tr>
                                    	<td align="left">Payment Method</td>
                                        <td><a href="payment_method.php">Settings</a></td>
                                    </tr>
                                    	
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
