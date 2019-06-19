<?php  include "db.php";



    if(isset($_GET['id'])){ $id = $_GET['id']; }

	 //$id = $_GET['id'];



if($id != "")

{

	$action = "E";

    $sqledit = "Select * from attributes where id=".$id;

    $editres = mysqli_query($dbLink,$sqledit) or die("can not select attributes");

    //$editrow = mysql_fetch_array($editres);

    $editrow = $editres->fetch_assoc();

	

	$id = stripslashes($editrow['id']);

	$Name = stripslashes($editrow['Name']);

	$Status = stripslashes($editrow['Status']);

	

}

else

{

	$action = "A";

	$id ='';

	$Name = '';

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

<script src="<?php echo $adminpath;?>/js/bootstrap-colorpicker.js"></script>

<link href="<?php echo $adminpath;?>/css/bootstrap-colorpicker.min.css" rel="stylesheet">


<script language="javascript">

    function validate(form)

    {

        var extensions = new Array("jpg","jpeg","gif","png","bmp");

		

		if (form.Name.value == "")

        {

            alert("Please Enter Attributes Name")

            form.Name.focus();

            return false;

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

      <div class="header"> <span ><span class="ico  gray spreadsheet"></span> Add New Attributes </span> </div>

      <!-- End header -->

      <div class=" clear"></div>

      <div class="content" >

        <div style="margin-bottom:10px;"><a href="<?php echo $adminpath;?>/attributes.php" class="uibutton icon confirm answer" >Back</a></div>

		<div id="uploadTab">
          <ul class="tabs" >
            <li id="first"><a href="#tab1"  id="1"  > Attributes Details </a></li>
            <li id="second"><a href="#tab2"  id="2"  >Attributes Variation </a></li>
            
          </ul>
          <div class="tab_container" > 
            
            <!--tab1-->
            
            <div id="tab1" class="tab_content">
            	<form action="addattributesp.php?action=<?php  echo $action; ?>&editid=<?php  echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">

        

        

        

          <div class="section ">

            <label> Attributes Name<small>Text</small></label>

            <div>

              <input type="text" class="large" name="Name"  id="Name" value="<?php echo $Name;?>">

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
            </div>
            
            <!--tab1--> 
            
            <!--tab2-->
            
            
            
            <div id="tab2" class="tab_content">
              <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span> Attributes Variation</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablevariation" id="variation">
                      <thead>
                        <tr> 
                          
                          <!--  <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>-->
                          
                          <th>Name</th>
                          <th>Status</th>
                          <th>Price</th>
                          <th>Management</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  

					   $piqsql="select * from attributes_variation where  attr_id  =".$id;

					   $piqres=mysqli_query($dbLink,$piqsql) or die('could not select attributes variation');

						if(isset($_REQUEST['rid'])){

										$rid=$_REQUEST['rid'];

						}

						if(isset($rid))

						{

						  $piqsql1="select * from attributes_variation where id =".$rid;

						  $piqres1=mysqli_query($dbLink,$piqsql1) or die('could not select product Quantity'); 

						  $piqrow=$piqres1->fetch_assoc();

						  $variation_name=$piqrow['variation_name'];

						  $variation_status=$piqrow['variation_status'];

						  $variation_Price=$piqrow['variation_Price'];

						 

						  $action = "E";

						}

						else

						{

							$action = "A";

							$variation_name='';

						    $variation_status='';

						    $variation_Price='';

							

						}?>
                        <?php 



						 	while($piqdata=$piqres->fetch_assoc())

								{ ?>
                        <tr>
                          <td><?php  echo $piqdata['variation_name'];?></td>
                          <td>
						  	<?php  if($piqdata['variation_status']==1) { echo 'Active'; } ?>
                          	<?php  if($piqdata['variation_status']==0) { echo 'Inactive'; } ?>		
                          </td>
                          <td><?=$piqdata['variation_Price']?></td>
                          <td>
                          
                          	<span class="tip" > 
                            	<a  title="Edit" href="addattributes.php?id=<?=$piqdata['attr_id']?>&rid=<?=$piqdata['id']?>&tab=2"> 
                                	<img src="images/icon/icon_edit.png" > 
                                </a> 
                            </span> 
                            
                            <span class="tip" > 
                            	<a id="<?php  echo $piqdata['id'];?>" class="row_delete"  name="<?php  echo $piqdata['variation_name'];?>_variation" title="Delete" > 
                                	<img src="images/icon/icon_delete.png" > 
                                </a> 
                            </span>
                            
                            
                           </td>
                        </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span>Add Attributes Variation</span> </div>
                
                <!-- End header -->
                
                <div class=" clear"></div>
                <div class="content" >
                  <form id="attr_variation" name="attr_variation" enctype="multipart/form-data" action="addvariation.php?action=<?php  echo $action; ?>&editid=<?php if(isset($rid)){ echo $rid; } ?>" method="post">
                    <input type="hidden" name="attr" id="attr" value="<?=$id?>" />
					
                    <div class="section ">
                    	<label>If color attribute then please check checkbox <small></small></label>
                        <div>
                        	<input type="checkbox" name="color_att_check" id="checkbox1" />
                        </div>
                    </div>
	                
                    <div class="other_attr_colorpiker">
                    	<div class="section ">
                    	<label>Select color<small></small></label>
                    	<div id="cp2" class="input-group colorpicker-component"> 
                        	<input type="text" name="variation_name" value="<?php echo $variation_name;?>"/> 
                            	<span class="input-group-addon"><i></i></span> 
                        </div> 
						<script> $(function() { $('#cp2').colorpicker(); }); </script>
                        </div>
                    </div>
                    
                    <div class="other_attr_textbox">
                        <div class="section ">
                          <label>Variation Name<small></small></label>
                          <div>
                            <input type="text" name="variation_name" value="<?php echo $variation_name;?>" />
                          </div>
                        </div>
                    </div>
                    
                    <div class="section ">
                        <label>Variation Status<small></small></label>
                        <select data-placeholder="Choose a Status..." class="" name="variation_status">
                            <option value="1" <?php  if($variation_status!="" && $variation_status==1) { echo 'selected="selected"'; } ?>>Active</option>
                            <option value="0" <?php  if($variation_status!="" && $variation_status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="section ">
                      <label>Price<small></small></label>
                      <div>
                        <input type="text" class="large" name="variation_Price"  id="variation_Price" <?php if(isset($variation_Price)){?> value="<?=$variation_Price?>" <?php } ?> >
                      </div>
                    </div>
                    <div class="section last">
                      <div>
                        <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php  } ?>
            </div>
            
            <!--tab2--> 
          
          </div>
        </div>



        

        <div class="clear"></div>

      </div>

    </div>

    <div class="clear"></div>
    <script>
	$('.other_attr_colorpiker').hide();
	$('#checkbox1').change(function() {
        if($(this).is(":checked")) {
            $('.other_attr_colorpiker').show();
			$('.other_attr_textbox').hide();
        }else{
			$('.other_attr_textbox').show();
			$('.other_attr_colorpiker').hide();
		}
     });
	</script>

    <?php  include('inc_footer.php'); ?>

  </div>

  <!--// End inner --> 

</div>

<!--// End content -->

</body>

</html>

