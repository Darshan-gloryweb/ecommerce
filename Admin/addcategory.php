<?php  include "db.php";



    if(isset($_GET['id'])){ $id = $_GET['id']; }

	 //$id = $_GET['id'];



if($id != "")

{

	$action = "E";

    $sqledit = "Select * from category where CategoryID=".$id;

    $editres = mysqli_query($dbLink,$sqledit) or die("can not select Category");

    //$editrow = mysql_fetch_array($editres);

    $editrow = $editres->fetch_assoc();

	$CategoryTypeID = stripslashes($editrow['CategoryTypeID']);

	$CategoryName = stripslashes($editrow['CategoryName']);

	$Description = stripslashes($editrow['Description']);

	$CategoryImage = stripslashes($editrow['CategoryImage']);

	$SeName = stripslashes($editrow['SeName']);

	$SeDescription = stripslashes($editrow['SeDescription']);

	$SeTitle = stripslashes($editrow['SeTitle']);

	$SeKeyword = stripslashes($editrow['SeKeyword']);

	$DisplayOrder = stripslashes($editrow['DisplayOrder']);

	$Status = stripslashes($editrow['Status']);

	$parent_cat = stripslashes($editrow['parent']);

	$discount_lable = stripslashes($editrow['discount_lable']);

	$is_deal_cat = stripslashes($editrow['is_deal_cat']);

	$discountimage = stripslashes($editrow['discountimage']);
		
	$menubannerimage = stripslashes($editrow['menubannerimage']);	

	

}

else

{

	$action = "A";

	$CategoryTypeID ='';

	$CategoryName = '';

	$Description = '';

	$CategoryImage = '';

	$SeName = '';

	$SeDescription = '';

	$SeTitle = '';

	$SeKeyword ='';

	$DisplayOrder = '';

	$Status = '';

	$parent_cat = '';

	

	$discount_lable = '';

	$is_deal_cat = '';

	$discountimage = '';
	$menubannerimage = '';	

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

		//if (form.CategoryType.value == "")
//
//        {
//
//            alert("Please Select Category Type")
//
//            form.CategoryType.focus();
//
//            return false;
//
//        }

		if (form.CategoryName.value == "")

        {

            alert("Please Enter Category Name")

            form.CategoryName.focus();

            return false;

        }

        

        

		if(form.CategoryImage.value == "")

 		{

	 		/*alert("Please Select Category Icon");

	 		return false; */

 		}

		else

		{

			var image_file = form.CategoryImage.value;

			var image_length = form.CategoryImage.value.length;

			var pos = image_file.lastIndexOf('.') + 1;

			var ext = image_file.substring(pos, image_length);

			var final_ext = ext.toLowerCase();

			if(extensions.indexOf(final_ext) == -1)

			{

				alert(" Select Icon Image of the following extensions: "+ extensions.join(', ') +".");

				return false;

			}

		}

		

		//if (form.DisplayOrder.value == "") {
//
//            alert("Please Enter Display Order")
//
//            form.DisplayOrder.focus();
//
//            return false;
//
//        }

		

		//if(form.DisplayOrder.value != "")
//
//      	{
//
//            if (chkNum(form.DisplayOrder) == false)
//
//            {
//
//                alert("Please Enter only Numbers As Display Order..")
//
//                form.DisplayOrder.select();
//
//                return false;
//
//            }
//
//         }

        		

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

      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Add New Category </span> </div>

      <!-- End header -->

      <div class=" clear"></div>

      <div class="content" >

        <div style="margin-bottom:10px;"><a href="category.php" class="uibutton icon confirm answer" >Back</a></div>

        <form action="addcategoryp.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
	
        

        <?php /*?><div class="section ">

            <label> Select Category Type<small></small></label>

            <div>

              <select data-placeholder="Choose a Parent..." class="" name="CategoryType" id="CategoryType">

                <option value="" >Select Category type</option>

                <?php  

										

					$sql = "select * from categorytype";

					$result = mysqli_query($dbLink,$sql);

					while($category = $result->fetch_assoc()){

									?>

                <option value="<?php echo $category['id'];?>" <?php  if($CategoryTypeID==$category['id']){?> selected="selected" <?php  }?> >

                <?php echo $category['name'];?>

                </option>

                <?php  } ?>

              </select>

            </div>

          </div><?php */?>

        	

        

          <div class="section ">

            <label> Category Name<small>Text</small></label>

            <div>

              <input type="text" class="large" name="CategoryName"  id="CategoryName" value="<?php echo $CategoryName;?>">

            </div>

          </div>

          <div class="section ">

            <label> Select Parent Category<small></small></label>
	
            <div>

              <?php /*?><select data-placeholder="Choose a Parent..." class="parent_cat"  name="parent_cat">

                <option value="" >Select Parent Category</option>

                <?php  

										

					$sql = "select CategoryID,CategoryName from category ";

					$result = mysqli_query($dbLink,$sql);

					while($category = $result->fetch_assoc()){

									?>

                <option value="<?php echo $category['CategoryID'];?>" <?php  if($parent_cat==$category['CategoryID']){?> selected="selected" <?php  }?> class="chzn-select" >

                <?php echo $category['CategoryName'];?>

                </option>

                <?php  } ?>

              </select><?php */?>
              
              <select data-placeholder="Select Parent Category..." class="chosen-select" tabindex="2" name="parent_cat">
            <option value=""></option>
       		

                <?php  

										

					$sql = "select * from category ";

					$result = mysqli_query($dbLink,$sql);

					while($category = $result->fetch_assoc()){

									


				
				
				
				?>
                <option value="<?php echo $category['CategoryID'];?>" <?php  if($parent_cat==$category['CategoryID']){?> selected="selected" <?php  }?> class="chzn-select" >

                <?php echo $category['CategoryName'];?>

                </option>

                <?php  } ?>
          </select>
              
				
            </div>
            
            
            
            <div>
          
          
        </div>
            
            

          </div>

          <div class="section">

            <label>Description <small>Text custom</small></label>

            <div >

              <textarea name="Description" id="editor"  class="editor"  cols="" rows=""><?php echo $Description;?>

</textarea>

            </div>

          </div>

          <div class="section ">

            <label>Icon<small></small></label>

            <div>

              <?php  if( !empty($CategoryImage ))

									{?>

                                    

              <img src="<?php echo $frontpath;?>/CategoryIcon/<?php echo $CategoryImage;?>" alt="" style="height:auto; width:auto;" /><br /><br /><br />

              <?php  } ?>

              <input type="file" class="fileupload" name="CategoryImage" id="CategoryImage" value="<?php echo $frontpath;?>/CategoryIcon/<?php echo $CategoryImage;?>" />

            </div>

          </div>
          
          
          <div class="section ">

            <label>Menu Banner Image<small></small></label>

            <div>

              <?php  if( !empty($menubannerimage ))

									{?>

                          

              <img src="<?php echo $frontpath;?>/CategoryIcon/<?php echo $menubannerimage;?>" alt="" style="height:auto; width:auto;" /><br /><br /><br />

              <?php  } ?>

              <input type="file" class="fileupload" name="menubannerimage" id="menubannerimage" value="<?php echo $frontpath;?>/CategoryIcon/<?php echo $menubannerimage;?>" />

            </div>

          </div>

          

          <div class="section ">

                  <label> IS Deal<small>Text</small></label>

                  <div>

                  	<input type="checkbox"  name="is_deal_cat" value="1" class="ck" <?php  if($is_deal_cat=='1'){ echo "checked='checked'"; } ?> id="is_deal_cat"  />

                  </div>

                  

                  <div>

                  	

                    <input type="text" class="large discount_lable" name="discount_lable"  id="discount_lable" value="<?php if ( isset( $discount_lable ) ) {  echo $discount_lable; } ?>">

                  </div>

                  

                  <div class="dis_img">

                 	 	<label>Discount Image<small></small></label>

                  		<div>

                    <?php  if( isset($discountimage))

									{ ?>

                    <img src="<?php echo $frontpath;?>/CategoryIcon/<?php echo $discountimage;?>" alt="" width="200px" height="200px" /><br />

                    <br />

                    <br />

                    <?php  } ?>

                    

                    <input type="file" class="fileupload" name="discountimage" id="discountimage" value="<?php if(!empty($discountimage)){echo $discountimage;}?>" />

                 

                </div>

                  </div>

                  

                

                  

                  

                </div>

          

          

          <div class="section ">

            <label> Se Name<small>Text</small></label>

            <div>

              <input type="text" class="large" name="SeName"  id="SeName" value="<?php echo $SeName;?>">

            </div>

          </div>

          <div class="section">

            <label>Se Description <small>Text custom</small></label>

            <div >

              <textarea name="SeDescription" id="editor"  class="editor"  cols="" rows=""><?php echo $SeDescription;?>

</textarea>

            </div>

          </div>

          <div class="section">

            <label>Se Title <small>Text custom</small></label>

            <div >

              <input type="text" class="large" name="SeTitle"  id="SeTitle" value="<?php echo $SeTitle;?>">

            </div>

          </div>

          <div class="section">

            <label>Se Keyword<small>Text custom</small></label>

            <div >

              <input type="text" class="large" name="SeKeyword"  id="SeKeyword" value="<?php echo $SeKeyword;?>">

            </div>

          </div>

          <div class="section">

            <label>Display Order<small>Text custom</small></label>

            <div >

              <input type="text" class="large" name="DisplayOrder"  id="DisplayOrder" value="<?php echo $DisplayOrder;?>">

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



<link rel="stylesheet" href="<?php echo $frontpath;?>/Admin/css/chosen.css">
<script src="<?php echo $frontpath;?>/Admin/js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo $frontpath;?>/Admin/js/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $frontpath;?>/Admin/js/init.js" type="text/javascript" charset="utf-8"></script>
  

<script>
CKEDITOR.replace('editor');
</script>
	

    <?php  include('inc_footer.php'); ?>

  </div>

  <!--// End inner --> 

</div>

<!--// End content -->

</body>

</html>

