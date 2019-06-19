<?php include "db.php";

	if(isset($_POST['Submit']))
	{
		$map= mysql_real_escape_string($dbLink,$_POST['map']);

		
		$sql = "Select * from websetting";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        	$sql = "insert into websetting(map) values('$map')";
	    	mysqli_query($dbLink,$sql) or die('could not insert..');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	$sql = "update websetting set map='$map'";
			
			mysqli_query($dbLink,$sql) or die('could not update..');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select map from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $map = stripslashes($row['map']);

	
	
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
    <script language="javascript" type="text/javascript" src="validation.js"></script>
         <script language="javascript">
    function validate(form)
    {
		if(form.map.value=="")
		{
			alert('Please Enter Map iframe');
			form.map.focus();
			return false;
		}
		
    }
</script>
         
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
                                        
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Menu Settings </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
				<div style="margin-bottom:10px;"><a href="webset.php" class="uibutton submit_form icon confirm answer" >Back</a></div>
                            <div class="content" >
                           
                            <form method="post" name="form1" id="form1" onSubmit="return validate(this);"> 
                            
                            <div  class="grid3">
                                    
                                    <div class="section ">
                                    <label>iframe<small></small></label>   
                                     <div > <textarea name="map" id="editor"  class="editor"  cols="" rows=""><?=html_entity_decode($map)?></textarea></div>  
                                    </div>
                                    
                                    
                                    
                                    <div class="section last">
                                    <div>
                                    <input name="Submit" type="submit" class="uibutton submit_form icon confirm" value="Submit" />
                                     <!-- <a class="uibutton submit_form" >submitForm</a>-->
                                   </div>
                                   </div>
                              
                            </div>
                            </form>
                            <div class="clear"></div>


                        </div>


					</div>
					</div>
                    
                    


                    <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
