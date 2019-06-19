<?php include "db.php";
    if(isset($_GET['id'])){ $id = $_GET['id']; }
if($id != "")
{
	$action = "E";
    $sqledit = "Select * from emailtemplate where EmailTemplateID=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select product");
    $editrow = $editres->fetch_assoc();
	
	$TemplateID = stripcslashes($editrow['TemplateID']);
	
	$FromID = stripslashes($editrow['FromID']);
	$CC = stripslashes($editrow['CC']);
	$BCC = stripslashes($editrow['BCC']);

	$Subject = stripslashes($editrow['Subject']);
	$MailBody = stripslashes($editrow['MailBody']);
	$DisplayOrder = stripslashes($editrow['DisplayOrder']);
	$Status = stripslashes($editrow['Status']);
}
else
{
	$action = "A";
	$id=0;
	$TemplateID = '';
	
	$FromID = '';
	$CC = '';
	$BCC = '';

	$Subject = '';
	$MailBody = '';
	$DisplayOrder = '';
	$Status = '';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>
<?=$pgtitle?>
</title>
<!-- Link shortcut icon-->
<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />
<link rel="stylesheet" href="css/style.css">
<?php  include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
<script language="javascript">
    function validate(form)
    {
		if (form.template.value == "")
        {
            alert("Please Select Tempalte Name")
            form.template.focus();
            return false;
        }
		if(form.fromid.value != "")
    	{
        	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.fromid.value))
 			{
 				alert("Invalid email address format in From ID.");
				form.fromid.focus();
 				return false;
 			}
    	}
		if(form.fromid.value != "")
    	{
        	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.fromid.value))
 			{
 				alert("Invalid email address format in From ID.");
				form.fromid.focus();
 				return false;
 			}
    	}
		if(form.cc.value != "")
    	{
        	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.cc.value))
 			{
 				alert("Invalid email address format in CC.");
				form.cc.focus();
 				return false;
 			}
    	}
		if(form.bcc.value != "")
    	{
        	var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        	if(!regex.test(form.bcc.value))
 			{
 				alert("Invalid email address format in BCC.");
				form.bcc.focus();
 				return false;
 			}
    	}
		if (form.subject.value == "")
        {
            alert("Please Enter Subject")
            form.subject.focus();
            return false;
        }
		if (form.mailbody.value == "")
        {
            alert("Please Enter Mail Body")
            form.mailbody.focus();
            return false;
        }
		if (form.DisplayOrder.value == "") {
            alert("Please Enter Display Order")
            form.DisplayOrder.focus();
            return false;
        }
		
		if(form.DisplayOrder.value != "")
      	{
            if (chkNum(form.DisplayOrder) == false)
            {
                alert("Please Enter only Numbers As Display Order..")
                form.DisplayOrder.select();
                return false;
            }
         }
        		
    }
</script>
<!---->

</head>
<body class="dashborad">
<div id="alertMessage" class="error"></div>
<?php  include('inc_header.php'); ?>
<div id="shadowhead"></div>
<div id="hide_panel"> <a class="butAcc" rel="0" id="show_menu"></a> <a class="butAcc" rel="1" id="hide_menu"></a> <a class="butAcc" rel="0" id="show_menu_icon"></a> <a class="butAcc" rel="1" id="hide_menu_icon"></a> </div>
<?php  include('inc_leftmenu.php'); ?>
<div id="content">
  <div class="inner">
    <?php  include('inc_toplogo.php'); ?>
    <div class="clear"></div>
    <div class="section ">
      <div align="center" style="font-weight:bold; color:#060;"><?php  if(isset($_GET['msg'])){ echo $_GET['msg']; } ?></div>
    </div>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
        <?php  if($action == "E"){?>
        Edit Product </span>
        <?php  } else{?>
        Add New Product </span>
        <?php  } ?>
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="emailtemplate.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <!--<ul class="tabs" >
            <!--<li id="first"><a href="#tab1"  id="1"  > Product Details </a></li>-->
           <!-- <li id="second" ><a href="#tab2"  id="2"  > Gallery </a></li>
          </ul>-->
          <div class="tab_container" >
            <div id="tab1" class="tab_content">
              <form action="addtemplatep.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
              	<div class="content">
                <div class="section ">
                  <label> Select Template<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Template..." class="" name="template">
                      <option value="" >Select Template</option>
                      <?php  
					  					if($id!=0)
										{
											$sql = "select * from template where TemplateID IN (SELECT TemplateID FROM emailtemplate WHERE EmailTemplateID = $id)";
										}
										else
										{
										echo $sql = "select * from template where TemplateID NOT IN (SELECT TemplateID FROM emailtemplate WHERE EmailTemplateID != $id)";
										}
										$result = mysqli_query($dbLink,$sql);
										while($cat = $result->fetch_assoc()){
									?>
                      <option value="<?=$cat['TemplateID']?>" <?php  if($TemplateID==$cat['TemplateID']){?> selected="selected" <?php  }?> > <?=$cat['TemplateName']?> </option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
                <div class="section ">
                  <label> FROM ID<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="fromid"  id="fromid" value="<?=$FromID?>">
                  </div>
                </div>
                <div class="section ">
                  <label> CC<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="cc"  id="cc" value="<?=$CC?>">
                  </div>
                </div>
                <div class="section ">
                  <label> BCC<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="bcc"  id="bcc" value="<?=$BCC?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Subject<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="subject"  id="subject" value="<?=$Subject?>">
                  </div>
                </div>
                
                <div class="section">
                  <label>Mail Body<small>Text custom</small></label>
                  <div >
                   <textarea name="mailbody" id="editor"  class="editor"  cols="" rows=""><?=$MailBody?>
</textarea>
                  </div>
                </div>
                
                <div class="section">
                  <label>Display Order<small>Text custom</small></label>
                  <div >
                    <input type="text" class="large" name="DisplayOrder"  id="DisplayOrder" value="<?=$DisplayOrder?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Status<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Status..." class="" name="Status">
                      <option value="1" <?php  if($Status!="" && $Status==1) { echo 'selected="selected"'; } ?>>Active</option>
                      <option value="0" <?php  if($Status!="" && $Status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="section last">
                  <div>
                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                    <!-- <a class="uibutton submit_form" >submitForm</a>--> 
                  </div>
                </div>
                </div>
              </form>
            </div>
            <!--tab1-->
            </div>
           </div>
    <div class="clear"></div>
    </div>
    </div>
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
 <script type="text/javascript">
	  $(function () {
		  <?php  if($_REQUEST['tab']== '1' || !isset($_REQUEST['tab'])) { ?>
  document.getElementById("tab1").style.display = "block";
  $("#first").addClass("active");
  $("#second").removeClass("active");
  <?php   ?>
  <?php  } else if($_REQUEST['tab']== '2') { ?>
  document.getElementById("tab2").style.display = "block";
 $("#second").addClass("active");
  $("#first").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php   ?>
  <?php  }  ?>
   });
</script>
<!--// End content -->
</body>
</html>
