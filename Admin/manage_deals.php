<?php include "db.php";

if(isset($_POST['Submit']))

	{

		$Mloc="../images/";
		function uploadImage1($file,$uploadPath)
		{

		$uploaddir = "../images"; // Where you want the files to upload to - Important: Make sure this folders permissions (CHMOD) is 0777!

		$path = $uploaddir;



		if(!file_exists($path))

			mkdir ($path, 0777);

		if(is_uploaded_file($file))

		{

			move_uploaded_file($file,$path.'/'.$uploadPath);

			$photo = $uploadPath;

		}

		return $photo;

	}
	
		$top_main_banner = $_FILES['top_main_banner']['name'];
		$bottom_main_banner = $_FILES['bottom_main_banner']['name'];
		
		if($top_main_banner != "" || $bottom_main_banner != "")
		{

			$dr1loc = $Mloc.$row['top_main_banner'];
			$dr1loc1 = $Mloc.$row['bottom_main_banner'];

			if (is_file($dr1loc)==true)

    		{

    			unlink($dr1loc);

    		}
			if (is_file($dr1loc1)==true)

    		{

    			unlink($dr1loc1);

    		}

			$extchk = pathinfo($top_main_banner);
			$extchk1 = pathinfo($bottom_main_banner);

			$ext = $extchk["extension"];
			$ext1 = $extchk["extension"];

			$photoname = "DealBanner_top" . $id . "." . $ext;
			$photoname1 = "DealBanner_bottom" . $id . "." . $ext;



			 $img1 = uploadImage1($_FILES['top_main_banner']['tmp_name'],$photoname);
			 $img2 = uploadImage1($_FILES['bottom_main_banner']['tmp_name'],$photoname1);

	

			  $sql = "update websetting set  top_main_banner ='".$img1."' ,  bottom_main_banner = '".$img2."'";
			
			mysqli_query($dbLink,$sql) or die("could not update Image");

			

		}
		
		$sql = "update websetting set  top_banner_link = '".$_POST['top_banner_link']."'";
		mysqli_query($dbLink,$sql) or die("could not update Image");
		
		

	}



    $sql = "Select * from websetting";

    $r = mysqli_query($dbLink,$sql) or die("can not select websetting");

    $row = $r->fetch_assoc();


	


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

      

      <!-- End header -->

      <div class=" clear"></div>

      <div class="content" >

        <div style="margin-bottom:10px;"><a href="brand.php" class="uibutton icon confirm answer" >Back</a></div>
		
        <form method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">


          

          <div class="section ">

            <label>Top Main Banner<small></small></label>

            <div>

              <?php  if( !empty($row['top_main_banner'] ))

									{?>

                                    

              <img src="<?php echo $frontpath;?>/images/<?php echo $row['top_main_banner'];?>" alt="" style="height:auto; width:50%;" /><br /><br /><br />

              <?php  } ?>

              <input type="file" class="fileupload" name="top_main_banner" id="top_main_banner" value="<?php echo $frontpath;?>/images/<?php echo $top_main_banner;?>" />

            </div>

          </div>
          
           <div class="section ">
            <label> Deal Page Top Banner Link<small>Text</small></label>
            <div>
              <input type="text" class="large" name="top_banner_link"  id="top_banner_link" value="<?php echo $row['top_banner_link'];?>" required="required">
            </div>
          </div>
		
        
        	<div class="section ">

            <label>Bottom Main Banner<small></small></label>

            <div>

              <?php  if( !empty($row['bottom_main_banner']))

									{?>

                                    

              <img src="<?php echo $frontpath;?>/images/<?php echo $row['bottom_main_banner'];?>" alt="" style="height:auto; width:50%;" /><br /><br /><br />

              <?php  } ?>

              <input type="file" class="fileupload" name="bottom_main_banner" id="bottom_main_banner" value="<?php echo $frontpath;?>/images/<?php echo $bottom_main_banner;?>" />

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
