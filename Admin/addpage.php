<?php include "db.php";
 if(isset($_GET['id'])){ $id = $_GET['id']; }
if($id != "")
{
	$action = "E";
    $sqledit = "Select * from pagemgnt where id=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select degreemst");
    $editrow = $editres->fetch_assoc();

	$title = stripslashes($editrow['title']);
	$url = stripslashes($editrow['slug']);
	$content = stripslashes($editrow['content']);
	$estatus = stripslashes($editrow['status']);
	$setitle = stripslashes($editrow['setitle']);
	$sekeyword = stripslashes($editrow['sekeyword']);
	$sedescr = stripslashes($editrow['sedescr']);
}
else
{
	$action = "A";
	$title = '';
	$url = '';
	$content = '';
	$estatus = '';
	$setitle = '';
	$sekeyword = '';
	$sedescr = '';
}

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
   		if (form.title.value == "")
        {
            alert("Please Enter Page Title")
            form.title.focus();
            return false;
        } 
		if (form.url.value == "")
        {
            alert("Please Enter Page URL")
            form.url.focus();
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
                    <div class="section "><div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div></div>
                    <div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray spreadsheet"></span> Add New Page </span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    
                    <div style="margin-bottom:10px;"><a href="managepage.php" class="uibutton submit_form" >Back</a></div>
                            <form action="managepagep.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);"> 
                            
									<div class="section ">
                                    <label>Page Title<small>Title Of the Page</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="title"  id="title" value="<?=$title?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Page URL<small>Url Of the Page</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="url"  id="url" value="<?=$url?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section titledescr">
                                   <label>Page Content<small>Text custom</small></label>   
                                  <div > <textarea name="content" id="editor"  class="editor"  cols="" rows="10"><?=$content?></textarea></div>      
                                    </div>
                                    
                                    <div class="section ">
                                    <label>Status<small></small></label>   
                                    <div> 
                                    <select data-placeholder="Choose a Schooltype..." class="" name="status">
                                    <option value="1" <?php  if($estatus!="" && $estatus==1) { echo 'selected="selected"'; } ?>>Active</option>
                                    <option value="0" <?php  if($estatus!="" && $estatus==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                                    </select>
                                    </div>
                                    </div>
                                                                        
                                    <div class="section ">
                                    <label>SE Title<small>SEO Title</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="setitle"  id="setitle" value="<?=$setitle?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label>SE Keywords<small>SEO Keywords</small></label>   
                                    <div> 
                                    <input type="text" class="large" name="sekeyword"  id="sekeyword" value="<?=$sekeyword?>">
                                    </div>
                                    </div>
                                    
                                    <div class="section">
                                   <label>SE Description<small>SEO Description</small></label>   
                                  <div > <textarea name="sedescr" id="editor"  class="editor"  cols="" rows=""><?=$sedescr?></textarea></div>      
                                    </div>
                                                                     
                                    <div class="section last">
                                    <div>
                                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                                     <!-- <a class="uibutton submit_form" >submitForm</a>-->
                                   </div>
                                   </div>
                              
                            </form>
                            <div class="clear"></div>


                        </div>


					</div>
					 <div class="clear"></div>
                    <?php  include('inc_footer.php'); ?>
                </div> <!--// End inner -->
            </div> <!--// End content --> 
</body>
</html>
