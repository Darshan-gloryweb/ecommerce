<?php include "db.php";

	if(isset($_POST['Submit']))
	{
		$shippingtime = $_POST['shippingtime'];

		
		$sql = "Select * from websetting";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        	$sql = "insert into websetting(shippingtime) values($shippingtime)";
	    	mysqli_query($dbLink,$sql) or die('could not insert..');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	$sql = "update websetting set shippingtime=$shippingtime";
			mysqli_query($dbLink,$sql) or die('could not update..');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select shippingtime from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $shippingtime1 = stripslashes($row['shippingtime']);

	
	
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
		if(form.shippingtime.value=="")
		{
			alert('Please Select Shipping Days');
			form.shippingtime.focus();
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
                                    <label>Shipping Days<small></small></label>   
                                    <div> 
                                    <select data-placeholder="Choose Shipping Time..." class="" name="shippingtime" id="header">
                                    <option value="">Shipping Days</option>
                                     <?php  
										$i = 1;
										while($i <= 10 ){
									?>
                          <option value="<?=$i?>" <?php  if($shippingtime1==$i){?> selected="selected" <?php  }?> >
                          <?=$i?>
                          </option>
                          <?php  $i++ ; } ?>
                                    </select>
                                    </div>
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
