<?php  include "db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$pgtitle?></title>
 <!-- Link shortcut icon-->
        <link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> 
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
                        <div class="header"> <span ><span class="ico gray home"></span> Admin</span> </div>
                        <div class="clear"></div>
                       <div style="text-align:center ; padding:25px; font-size:16px;"><?=$frontpgtitle?></div>
                    </div>
                    <!-- // End onecolumn -->
                    
                    
                   
                    <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>