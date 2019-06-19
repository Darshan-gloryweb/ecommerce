<?php include "db.php";

	if(isset($_POST['Submit']))
	{
		$header = $_POST['header'];
		$footer = $_POST['footer'];
		
		$sql = "Select * from websetting";
    	$r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    	$row = $r->fetch_assoc();
    	$totrec = mysqli_num_rows($r);
    	if($totrec == "0")
    	{
        	$sql = "insert into websetting(header_menu,footer_menu) values($header,$footer)";
	    	mysqli_query($dbLink,$sql) or die('could not insert..');
			$msg="Settings Updated Successfully";
    	}
    	else
    	{
        	$sql = "update websetting set header_menu=$header,footer_menu=$footer";
			mysqli_query($dbLink,$sql) or die('could not update..');
			$msg="Settings Updated Successfully";
    	}
	}

    $sql = "Select header_menu,footer_menu from websetting";
    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");
    $row = $r->fetch_assoc();
    $hmenu = stripslashes($row['header_menu']);
	$fmenu = stripslashes($row['footer_menu']);
	
	
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
		if(form.header.value=="")
		{
			alert('Please Select Header Menu');
			form.header.focus();
			return false;
		}
		if(form.footer.value=="")
		{
			alert('Please Select Footer Menu');
			form.footer.focus();
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
                                    <label>Header Menu<small>Top Header Navigation</small></label>   
                                    <div> 
                                    <select data-placeholder="Choose Header Menu..." class="" name="header" id="header">
                                    <option value="">Select Menu</option>
                                    <?php  
									$menusql="select * from menu";
	                                $menures=mysqli_query($dbLink,$menusql) or die ('Could Not Select Menu');
									while($data=$menures->fetch_assoc())
									{ 
									?>
                                    <option value="<?php  echo $data['id']?>" <?php  if($data['id']!="" && $data['id']==$hmenu) { echo 'selected="selected"'; } ?>><?=$data['name']?></option>
                                    <?php  } ?>
                                    </select>
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Footer Menu<small>Footer Navigation</small></label>   
                                    <div> 
                                    <select data-placeholder="Choose Footer Menu..." class="" name="footer" id="footer">
                                    <option value="">Select Menu</option>
                                    <?php 
									 $menusql="select * from menu";
	                                 $menures=mysqli_query($dbLink,$menusql) or die ('Could Not Select Menu');
									 while($data1=$menures->fetch_assoc())
									{ ?>
                                    <option value="<?php  echo $data1['id']?>" <?php  if($data1['id']!="" && $data1['id']==$fmenu) { echo 'selected="selected"'; } ?>><?=$data1['name']?></option>
                                    <?php  } ?>
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
