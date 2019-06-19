<?php include "db.php";
include "fckeditor.php";
    if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from giftcertificate where GiftcertificateCode=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select product");
    $editrow = $editres->fetch_assoc();
	$code = stripcslashes($editrow['Code']);
	$amount = stripslashes($editrow['Amount']);
	$Mamount = stripslashes($editrow['Mamount']);
	$remainingamount = stripslashes($editrow['RemainingAmount']);
	$startdate = stripslashes($editrow['StartDate']);
	$enddate = stripslashes($editrow['EndDate']);
	$status = stripslashes($editrow['Status']);
}
else
{
	$action = "A";
	$code = '';
	$amount = '';
	$Mamount = '';
	$remainingamount = '';
	$startdate = '';
	$enddate = '';
	$status = '';
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
		if (form.code.value == "")
        {
            alert("Please Enter Code")
            form.code.focus();
            return false;
        }
		if (form.amount.value == "")
        {
            alert("Please Enter Amount Value")
            form.amount.focus();
            return false;
        }
		/*if (form.mamount.value == "")
        {
            alert("Please Enter Total Amount Range To Get Discount")
            form.mamount.focus();
            return false;
        }*/
		if (form.sdate.value == "")
        {
            alert("Please Enter Starting Date Of Promotion")
            form.sdate.focus();
            return false;
        }
		if (form.edate.value == "")
        {
            alert("Please Enter Ending Date Of Promotion")
            form.edate.focus();
            return false;
        }		
	}
	function validateEmails(form)
	{
		var radios = document.getElementsByName("access[]");
    	var formValid = false;
		var val='';
    	var i = 0;
    	while (!formValid && i < radios.length) {
        if (radios[i].checked)
		{
			formValid = true;
			val = radios[i].value;
		}
        i++;        
		}
		
		if(!formValid && document.getElementById('aemail').value == "")
		{
			alert('Please Select Customer to Send the Promotion Code');
			return false;
		}
		else
		{
			var allmail = document.getElementById('aemail').value;
			var val = allmail.split(',');
			for(var i=0;i<val.length;i++)
			{
				if(val[i] != "")
				{
					var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					if(!regex.test(val[i]))
					{
						alert("Invalid email address format.");
						document.getElementById('aemail').focus();
						return false;
					}
				}
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
        Edit Gift Certificate </span>
        <?php  } else{?>
        Add Gift Certificate </span>
        <?php  } ?>
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="managegiftcertificate.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <ul class="tabs" >
            <li id="first"><a href="#tab1"  id="1"  > General </a></li>
            <li id="second"><a href="#tab2"  id="2"  > Customers </a></li>
            <li id="second"><a href="#tab3"  id="3"  > Users </a></li>
          </ul>
          <div class="tab_container" >
            <div id="tab1" class="tab_content">
              <form action="addgiftcertificatep.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);" enctype="multipart/form-data">
                <div class="section ">
                  <label>Gift Dertificate Code : <small>Code</small></label>
                  <div>
                    <input type="text" class="large" name="code"  id="code" value="<?=$code?>">
                  </div>
                </div>
                <!--<div class="section ">
                  <label>Total Amount to be applicable to get discount: <small>Amount</small></label>
                  <div>
                    <input type="text" class="large" name="mamount"  id="mamount" value="<?=$Mamount?>">
                  </div>
                </div>-->
                <div class="section ">
                  <label>Amount : <small>Amount</small></label>
                  <div>
                    <input type="text" class="large" name="amount"  id="amount" value="<?=$amount?>">
                  </div>
                </div>
                <!--<div class="section ">
                  <label>Remaining Amount : <small>Remaining Amount</small></label>
                  <div>
                    <input type="text" class="large" name="ramount"  id="ramount" value="<?=$remainingamount?>">
                  </div>
                </div>-->
                <div class="section ">
                  <label>Start Date</label>   
                                <div><input type="text"  id="sdate" class="datepicker" readonly="readonly" name="sdate" value="<?=$startdate?>"  /></div>
                </div>
                <div class="section">
                                <label>End Date</label>   
                                <div><input type="text"  id="edate" class="datepicker" readonly="readonly" name="edate" value="<?=$enddate?>"  /></div>
                            </div>
                <div class="section ">
                  <label> Status<small></small></label>
                  <div>
                    <select data-placeholder="Choose a Status..." class="" name="Status">
                      <option value="1" <?php  if($status!="" && $status==1) { echo 'selected="selected"'; } ?>>Active</option>
                      <option value="0" <?php  if($status!="" && $status==0) { echo 'selected="selected"'; } ?>>Inactive</option>
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
            
            <div id="tab2" class="tab_content">
            <?php  if($id!="") { ?>
            <form name="sendPromotion" id="sendPromotion" action="sendgiftcertificate.php" onsubmit="return validateEmails(this.id);" method="post" />
              <div class="section ">
                  <label>Additional Emails Seperated By Comma (,) :<small>Emails</small></label>
                  <div>
                    <textarea name="aemail" id="aemail" class="large" ></textarea>
                  </div>
                </div>
              
              <div style="float:right">
                                        <a class="uibutton call" >Check All</a>
                    					<a class="uibutton uall" >Uncheck ALL</a>
                                        </div>
                                    
                                    <div class="section ">
                                    <label>Select Customers<small>Send Promotion Code in Mail</small></label>   
                                    <div> 
                                    <ul>
                                                                      
                                       <li> <label >Customers</label>    
                                     <ul style="margin-left:24px;">
                                        <?php  $degsql="select CustomerID,FirstName,LastName,Email from customer Where IsRegister=1";
					 						  $degres=mysqli_query($dbLink,$degsql) or die ("Could Not Select Subject");
					 						  while($degdata=$degres->fetch_assoc())
					 						 {	?>
								 <li>
                         <input type="checkbox" name="access[]" id="<?php echo $degdata['CustomerID'];?>" value="<?=$degdata['Email']?>" class="ck allstate"/>
                         <label for="<?php echo $degdata['CustomerID'];?>">
						 <?php echo $degdata['FirstName']?>&nbsp;
						 <?php echo $degdata['LastName'];?></label></li>
                         <?php  } ?>	</ul>
                         					</li>
                                     </ul>
                                    </div>
                                    </div>
                            <div class="section last">
                  			<div>
                            	<input type="hidden" name="code" value="<?=$code?>" />
                                <input type="hidden" name="amt" value="<?=$amount?>" />
                                <input type="hidden" name="mamt" value="<?=$Mamount?>" />
                                <input type="hidden" name="sdate" value="<?=$startdate?>" />
                                <input type="hidden" name="edate" value="<?=$enddate?>" />
                                <input type="hidden" name="id" value="<?=$id?>" /> 
                    			<input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                  			</div>
                			</div>
                      </form>
              <?php  } ?>
            </div>
            <!--tab2-->
            
            <div id="tab3" class="tab_content">
             <?php  if($id!="") { ?>
              <div class="onecolumn" >
                <div class="header"> <span ><span class="ico  gray random"></span>Gift Certificate Users</span> </div>
                <!-- End header -->
                <div class=" clear"></div>
                <div class="content" >
                  <div class="tableName">
                    <table class="display data_tablecustgift" id="custgift">
                      <thead>
                        <tr> 
                          <th width="35" ><input type="checkbox" id="checkAll"  class="checkAll"/></th>
                          <th align="left">Customer Name</th>
                          <th>Order#</th>
                          <th>Discount Price</th>
                          <th>Total Gift Amt</th>
                          <th>Remaining Amt</th>
                          <th>Used On</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
					   $piqsql="Select customer.FirstName,customer.LastName,customer.CustomerID, ordercart.GiftCardDiscount,ordercart.OrderNumber,ordercart.OrderTotal,ordercart.OrderSubTotal,ordercart.UpdatedOn from customer inner join custorder on customer.CustomerID=custorder.CustomerID inner join ordercart on ordercart.OrderNumber = custorder.OrderNumber inner join giftcertificate on giftcertificate.Code = ordercart.GiftCardCode and giftcertificate.Code='".$code."' order by ordercart.UpdatedOn DESC";
					  $piqres = mysqli_query($dbLink,$piqsql) or die('Could Not Select Result Details');
					  $i=1;
					  $custid;
					  $ramt=0;
					  ?>
                        <?php 

						 	while($piqdata=$piqres->fetch_assoc())
								{
									if(!empty($cusid)){
									if($cusid != $piqdata['CustomerID']) 
									{
										$ramt=0;
									}}
									 ?>
                          <tr>
                          <td  width="35" ><input type="checkbox" name="cbx[]" class="chkbox"  id="cust<?=$i?>_<?=$piqdata['CustomerID']?>" value="cust<?=$i?>_<?=$piqdata['CustomerID']?>"/></td>
                          <td align="left"><?php  echo $piqdata['FirstName'].' '.$piqdata['LastName'];?></td>
                          <td><a href="vieworder.php?id=<?=$piqdata['OrderNumber']?>"><?=$piqdata['OrderNumber']?></a></td>
                          <td>£ <?=$piqdata['GiftCardDiscount']?></td>
                          <td>£ <?=$amount?></td>
                          <?php  
						  if($ramt == 0)
						  {
						  	$ramt = $amount - $piqdata['GiftCardDiscount'];
                          }
						  else
						  {
							  $ramt = $ramt - $piqdata['GiftCardDiscount'];
						  } ?>
                          <td>£ <?=$ramt?>.00</td>
                          <td><?=$piqdata['UpdatedOn']?></td>
                        </tr>
                        <?php  $i++; $cusid = $piqdata['CustomerID']; } ?>
                      </tbody>
                    </table>
                  </div>
                  </form>
                </div>
              </div>
              
              <?php  } ?>
            </div>
            <!--tab3--> 
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
<script type="text/javascript">
	  $(function () {
		  <?php  if($_REQUEST['tab']== '1' || !isset($_REQUEST['tab'])) { ?>
  document.getElementById("tab1").style.display = "block";
  $("#first").addClass("active");
  $("#second").removeClass("active");
  $("#third").removeClass("active");
  $("#fourth").removeClass("active");
  <?php  } else if($_REQUEST['tab']== '2') { ?>
  document.getElementById("tab2").style.display = "block";
 $("#second").addClass("active");
  $("#first").removeClass("active");
  $("#third").removeClass("active");
  $("#fourth").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php  } else if($_REQUEST['tab']== '3') { ?>
  document.getElementById("tab3").style.display = "block";
 $("#third").addClass("active");
  $("#first").removeClass("active");
  $("#second").removeClass("active");
  $("#fourth").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php  }else if($_REQUEST['tab']== '4') { ?>
  document.getElementById("tab4").style.display = "block";
 $("#fourth").addClass("active");
  $("#first").removeClass("active");
  $("#third").removeClass("active");
  $("#second").removeClass("active");
  document.getElementById("tab1").style.display = "none";
  <?php  }  ?>
   });
</script>
</body>
</html>
