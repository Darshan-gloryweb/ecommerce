<?php  include "db.php";



    if(isset($_GET['id'])){ $id = $_GET['id']; }

	 //$id = $_GET['id'];



if($id != "")

{

	$action = "E";

    $sqledit = "Select * from brand where brandid=".$id;

    $editres = mysqli_query($dbLink,$sqledit) or die("can not select brand");

    //$editrow = mysql_fetch_array($editres);

    $editrow = $editres->fetch_assoc();

	

	$brandid = stripslashes($editrow['brandid']);

	$brandname = stripslashes($editrow['brandname']);

	$branddes = stripslashes($editrow['branddes']);

	$ImageName = stripslashes($editrow['ImageName']);

	$is_deal_brand = stripslashes($editrow['is_deal_brand']);

	$displayorder = stripslashes($editrow['displayorder']);

	$Status = stripslashes($editrow['Status']);

	

}

else

{

	$action = "A";

	$brandid ='';

	$brandname = '';

	$branddes = '';

	$ImageName = '';

	$is_deal_brand = '';

	$displayorder = '';

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

<?php echo $pgtitle;?>

</title>

<!-- Link shortcut icon-->

<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" />

<?php  include('include_files.php'); ?>

<script language="javascript" type="text/javascript" src="validation.js"></script>

<script language="javascript">

    function validate(form)

    {

        var extensions = new Array("jpg","jpeg","gif","png","bmp");

		

		if (form.brandname.value == "")

        {

            alert("Please Enter Brand Name")

            form.brandname.focus();

            return false;

        }

        

        

		if(form.ImageName.value == "")

 		{

	 		/*alert("Please Select Category Icon");

	 		return false; */

 		}

		else

		{

			var image_file = form.ImageName.value;

			var image_length = form.ImageName.value.length;

			var pos = image_file.lastIndexOf('.') + 1;

			var ext = image_file.substring(pos, image_length);

			var final_ext = ext.toLowerCase();

			if(extensions.indexOf(final_ext) == -1)

			{

				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");

				return false;

			}

		}

		

		if (form.displayorder.value == "") {

            alert("Please Enter Display Order")

            form.displayorder.focus();

            return false;

        }

		

		if(form.displayorder.value != "")

      	{

            if (chkNum(form.displayorder) == false)

            {

                alert("Please Enter only Numbers As Display Order..")

                form.DisplayOrder.select();

                return false;

            }

         }

        		

    }

</script>

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

      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Add New Brand </span> </div>

      <!-- End header -->

      <div class=" clear"></div>

      <div class="content" >

        <div style="margin-bottom:10px;"><a href="brand.php" class="uibutton icon confirm answer" >Back</a></div>

        <form action="addbrandp.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">

        

        

        

          <div class="section ">

            <label> Brand Name<small>Text</small></label>

            <div>

              <input type="text" class="large" name="brandname"  id="brandname" value="<?php echo $brandname;?>">

            </div>

          </div>

          

          

          <div class="section">

            <label>Brand Description <small>Text custom</small></label>

            <div >

              <textarea name="branddes" id="editor"  class="editor"  cols="" rows=""><?php echo $branddes ;?>

</textarea>

            </div>

          </div>

          

          <div class="section ">

            <label>Brand Icon<small></small></label>

            <div>

              <?php  if( !empty($ImageName ))

									{?>

                                    

              <img src="<?php echo $frontpath;?>/BrandIcon/<?php echo $ImageName;?>" alt="" style="height:auto; width:50%;" /><br /><br /><br />

              <?php  } ?>

              <input type="file" class="fileupload" name="ImageName" id="ImageName" value="<?php echo $frontpath;?>/BrandIcon/<?php echo $ImageName;?>" />

            </div>

          </div>

          

          <div class="section ">

                  <label> IS Deal<small>Text</small></label>

                  <div>

                  	<input type="checkbox"  name="is_deal_brand" value="1" class="ck" <?php  if($is_deal_brand=='1'){ echo "checked='checked'"; } ?> id="is_deal_brand"  />

                  </div>

                  

                </div>

          

          

          <div class="section">

            <label>Display Order<small>Text custom</small></label>

            <div >

              <input type="text" class="large" name="displayorder"  id="displayorder" value="<?php echo $displayorder;?>">

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

        </form>

        <div class="clear"></div>

      </div>

    </div>

    <div class="clear"></div>

    <?php  include('inc_footer.php'); ?>

  </div>

  <!--// End inner --> 

</div>

<!--// End content -->

</body>

</html>

