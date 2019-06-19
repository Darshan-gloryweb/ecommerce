<?php include "db.php";

    //if(isset($_GET['id'])){ $id = $_GET['id']; }
$id = $_GET['id'];

    $sql="select * from boproducts where boid =".$id;
    $r = mysqli_query($dbLink,$sql) or die("can not select Bulk Order Products");

    $bsql = "select * from bulkorder where isbusiness =".$_GET['b']." and bulkorderid=".$id;
    $br = mysqli_query($dbLink,$bsql) or die("can not select websetting");
    $bdata = $br->fetch_assoc();
	$vsql = "select * from bulkorder_prodetail where bulkorderid = ".$id."";
	$vbr = mysqli_query($dbLink,$vsql) or die("can not select websetting");
	
	
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<?php  include('include_files.php'); ?>
<script language="javascript" type="text/javascript" src="validation.js"></script>
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
      <div align="center" style="font-weight:bold; color:#060;"><?php if(isset( $_GET['msg'])){ if(isset($_GET['msg'])){ echo $_GET['msg']; } } ?></div>
    </div>
    <div class="onecolumn" style=" position: relative;" >
      <div class="header"> <span ><span class="ico  gray spreadsheet"></span>
       <?php if(isset($_GET['b']) && $_GET['b'] == 0) { ?>       
       View Customer Order
       <?php } else { ?>
       View Busines Order
       <?php } ?>
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="bulkorder.php" class="uibutton icon confirm answer" >Back</a></div>
        <div class="overlay"></div>

        <div class="col-sm-12">
              <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-4"></div>
               <div class="col-sm-4"><label class="pull-right">Change Status</label></div>
               <div class="col-sm-4">
                <select name="updatestatus" class="updatestatus">
                    <option value="5" <?php if(isset($bdata['status']) && $bdata['status'] == 5) { echo "selected";} ?> >Pending</option>
                    <option value="6" <?php if(isset($bdata['status']) && $bdata['status'] == 6) { echo "selected";} ?>>Completed</option>
                    <option value="9" <?php if(isset($bdata['status']) && $bdata['status'] == 9) { echo "selected";} ?> >Cancelled</option>
                </select>
                <input type="hidden" name="bulkorderid" class="bulkorderid" value="<?=$id?>">
                  <input type="hidden" name="isbusiness" class="isbusiness" value="<?=$_GET['b']?>">
                   <input name="Submit" type="button" class="uibutton submit_form up-btn" value="Submit" />
               </div>
           </div>
              </div>
        </div>
      <div class="col-sm-6">
        <div class="panel panel-default">
               <div class="panel-heading">Products</div>

             <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Brand</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if(mysqli_num_rows($vbr) > 0 )
                        {
                            while ($vdata = $vbr->fetch_assoc()) {?>
                                <tr>
                                    <td><?=$vdata['productName']?></td>
                                    <td><?=$vdata['quantity']?></td>
                                    <td><?=$vdata['brand']?></td>
                                </tr> 
                            <?php }
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
        </div>
        <div class="col-sm-6">
            <!-- <div class="panel panel-default">
               <div class="panel-heading">Order Status</div>
             <div class="panel-body">
            <?php if($bdata['status'] == 5) { $bstatus = "Pending"; }?>
            <?php if($bdata['status'] == 6) { $bstatus = "Completed"; }?>
            <?php if($bdata['status'] == 9) { $bstatus = "Cancelled"; }?>
              Order Status is <strong><?php echo $bstatus;?></strong>.</div>
              </div> -->
              <?php if($_GET['b'] == 1) {?> 
                 <div class="panel panel-default">
               <div class="panel-heading">Business Details</div>

             <table class="table table-striped" style="width:100%">
              
                  <tr>
                    <th>Business Name</th>
                     <td><?php echo $bdata['bname'] ?></td>
                 </tr>
                 <tr>
                    <th>Buyer Type</th>
                     <td><?php echo $bdata['buyertype'] ?></td>
                 </tr>
                 <tr>
                    <th>GST No</th>
                     <td><?php echo $bdata['gstno'] ?></td>
                 </tr>
                 <tr>
                    <th>PAN No</th>
                      <td><?php echo $bdata['panno'] ?></td>
                  </tr>
               
            </table>
        </div>
              <?php } ?>
             <div class="panel panel-default">
               <div class="panel-heading">Descrition</div>

           <div class="panel-body"> <?php echo $bdata['descr'];?></div>
        </div>

        </div>
    </div>
            <!--tab1-->
            
           
    <div class="clear"></div>
    </div>
    

    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
</body>
</html>
