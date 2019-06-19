<?php include "db.php";

    if(isset($_GET['id'])){ $id = $_GET['id']; }

if($id != "")
{
	$action = "E";
    $sqledit = "Select * from customer where CustomerID=".$id;
    $editres = mysqli_query($dbLink,$sqledit) or die("can not select Customer");
    $editrow = $editres->fetch_assoc();
	$CustomerID = stripcslashes($editrow['CustomerID']);
	$FirstName = stripslashes($editrow['FirstName']);

	$LastName = stripslashes($editrow['LastName']);
	$Email = stripslashes($editrow['Email']);
	
	
	$cardsql="select * from customercreditcard where CustomerID =".$id;
	$cardres=mysqli_query($dbLink,$cardsql) or die('can not select card');
	$cardrow= $cardres->fetch_assoc();
	$CrediCardName=stripslashes($cardrow['CreditCardName']);
	$CrediCardNumber=stripslashes($cardrow['CreditCardNumber']);
	$CrediCardType=stripslashes($cardrow['CreditCardType']);
	$CrediCardVerificationCode=stripslashes($cardrow['CreditCardVerificationCode']);
	$CrediCardExpMonth=stripslashes($cardrow['CreditCardExpMonth']);
	$CrediCardExpYear=stripslashes($cardrow['CreditCardExpYear']);
	
	/*$BillingAddressID= stripslashes($editrow['BillingAddressID']);
	$ShippingAddressID = stripslashes($editrow['ShippingAddressID']);
	$PhoneNumber = stripslashes($editrow['PhoneNumber']);
	$IsRegister = stripslashes($editrow['IsRegister']);
	$LastIPAddress=stripslashes($editrow['LastIPAddress']);

	$ForgotPassword= stripslashes($editrow['SeName']);
	$SeDescription =stripslashes($editrow['SeDescription']);
	$SeTitle = stripslashes($editrow['SeTitle']);
	$SeKeyword = stripslashes($editrow['SeKeyword']);
	$Width = stripslashes($editrow['Width']);
	$Height = stripslashes($editrow['Height']);
	$Weight = stripslashes($editrow['Weight']);
	
	$DisplayOrder = stripslashes($editrow['DisplayOrder']);
	
	$Status = stripslashes($editrow['Status']);*/
	
	

	
	
}
else
{
	$action = "A";
	$CustomerID = '';
	$FirstName = '';

	$LastName = '';
	$Email = '';
	$CrediCardName='';
	$CrediCardNumber='';
	$CrediCardType='';
	$CrediCardVerificationCode='';
	$CrediCardExpMonth='';
	$CrediCardExpYear='';
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
        
		
		if (form.FirstName1.value == "")
        {
            alert("Please Enter First Name")
            form.FirstName1.focus();
            return false;
        }
		if (form.LastName1.value == "")
        {
            alert("Please Enter Last Name")
            form.LastName1.focus();
            return false;
        }
	}
function validate1(form)
{
		if (form.FirstName.value == "")
        {
            alert("Please Enter FirstName")
            form.FirstName.focus();
            return false;
        }
		
		if (form.LastName.value == "")
        {
            alert("Please Enter LastName")
            form.LastName.focus();
            return false;
        }
		
		if (form.CompanyName.value == "")
        {
            alert("Please Enter ConpanyName")
            form.CompanyName.focus();
            return false;
        }
        	
		if (form.AddressLine1.value == "") {
            alert("Please Enter AddressLine1")
            form.AddressLine1.focus();
            return false;
        }
		if (form.AddressLine2.value == "") {
            alert("Please Enter Address Line 2")
            form.AddressLine2.focus();
            return false;
        }
		if (form.City.value == "") {
            alert("Please Enter City")
            form.City.focus();
            return false;
        }
		if (form.state.value == "") {
            alert("Please Enter state")
            form.state.focus();
            return false;
        }
		if (form.Zipcode.value == "") {
            alert("Please Enter Zipcode")
            form.Zipcode.focus();
            return false;
        }
		if (form.country.value == "") {
            alert("Please Enter country")
            form.country.focus();
            return false;
        }
		if (form.Phone.value == "") {
            alert("Please Enter Phone")
            form.Phone.focus();
            return false;
        }
		if (form.Email.value == "") {
            alert("Please Enter Email")
            form.Email.focus();
            return false;
        }
		if(form.Email.value != "")
    {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(form.Email.value))
 		{
 			alert("Invalid Email Address");
 			return false;
 		}
    }
	        		
    }
	
	
</script>
<!---->

<style>
.add_block { margin:0px 15px 0px 15px; display:inline-block; vertical-align:top; }
.add_block1 { margin:0px 80px 0px 0px; display:inline-block; vertical-align:top; }
.add_block1 ul {list-style-type:none; width:100%; padding:10px; background-color:#eee; min-height:190px;border-radius:5px;}
.add_block ul {list-style-type:none; width:100%; padding:10px; background-color:#eee;min-height:190px;border-radius:5px;margin:20px 0; }
.textfield { width:50%; }
.type { width:233px; }
.type1 { width:189px; }
</style>
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
       
        Edit Customer
       
      </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content" >
        <div style="margin-bottom:10px;"><a href="managecustomer.php" class="uibutton icon confirm answer" >Back</a></div>
        <div id="uploadTab">
          <ul class="tabs" >
            <li ><a href="#tab1"  id="2"  >Personal Detail </a></li>
            <li ><a href="#tab2"  id="3"  > Addresses</a></li>
            <li ><a href="#tab3"  id="4"  > Credit Card Detail</a></li>
          </ul>
          <div class="tab_container" >
            <div id="tab1" class="tab_content">
            
							
              <form action="addpersonalp.php?action=<?php  echo $action; ?>&editid=<?php echo $id;?>" method="post" name="form1" id="form1" onSubmit="return validate(this);">
                
                <div class="section ">
                  <label> First Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="FirstName1"  id="FirstName1" value="<?=$FirstName?>">
                  </div>
                </div>
                <div class="section ">
                  <label> LastName<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="LastName1"  id="LastName1" value="<?=$LastName?>">
                  </div>
                </div>
                <div class="section ">
                  <label>Email<small></small></label>
                  <div>
                    <label><a href="mailto:<?=$Email?>"><?=$Email?></a></label>
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
            <?php 
            	$cust_add = "SELECT * FROM customeraddress WHERE CustomerID=".$id." and AddressType=1";
							$cust_res = mysqli_query($dbLink,$cust_add) or die ('Could Not Select Addresses');
							if(mysqli_num_rows($cust_res)>0)
							{
								$count=1;
								?>
            <?php 
								while($cust_data=$cust_res->fetch_assoc())
								{
									
									?>
            <div class="add_block">
              <ul>
                <li>
                  <strong>Billing Address<?=$count?></strong>
                  <span style="float:right; display:inline;"><a href="addcustomer.php?id=<?=$id?>&aid=<?=$cust_data['CustomerAddressID']?>">Edit</a></span></li>
                <li><b>First Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['FirstName']?>
                </li>
                <li><b>Last Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['LastName']?>
                </li>
                <li><b>Company Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['CompanyName']?>
                </li>
                <li><b>Email:&nbsp;&nbsp;</b>
                  <?=$cust_data['Email']?>
                </li>
                <li><b>Address 1:&nbsp;&nbsp;</b>
                  <?=$cust_data['AddressLine1']?>
                </li>
                <li><b>Address 2:&nbsp;&nbsp;</b>
                  <?=$cust_data['AddressLine2']?>
                </li>
                <li><b>City:&nbsp;&nbsp;</b>
                  <?=$cust_data['City']?>
                </li>
                <li><b>State:&nbsp;&nbsp;</b>
                  <?=$cust_data['StateID']?>
                </li>
                <li><b>Zipcode:&nbsp;&nbsp;</b>
                  <?=$cust_data['Zipcode']?>
                </li>
                <li><b>Country:&nbsp;&nbsp;</b>
                  <?=$cust_data['CountryID']?>
                </li>
                <li><b>Phone:&nbsp;&nbsp;</b>
                  <?=$cust_data['Phone']?>
                </li>
             
             
            </ul>
            
            </div>
             <?php 
									$count++;
								}
							}
							
							?>
                             <?php 
            	$cust_add = "SELECT * FROM customeraddress WHERE CustomerID=".$id." and AddressType=2";
							$cust_res = mysqli_query($dbLink,$cust_add) or die ('Could Not Select Addresses');
							if(mysqli_num_rows($cust_res)>0)
							{
								$count=1;
								?>
            <?php 
								while($cust_data=$cust_res->fetch_assoc())
								{
									
									?>
                            
             <div class="add_block">
              <ul>
                <li>
                  <strong>Shipping Address <?=$count?></strong>
                  
                  <span style="float:right; display:inline;"><a href="addcustomer.php?id=<?=$id?>&aid=<?=$cust_data['CustomerAddressID']?>">Edit</a></span></li>
                <li><b>First Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['FirstName']?>
                </li>
                <li><b>Last Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['LastName']?>
                </li>
                <li><b>Company Name:&nbsp;&nbsp;</b>
                  <?=$cust_data['CompanyName']?>
                </li>
                <li><b>Email:&nbsp;&nbsp;</b>
                  <?=$cust_data['Email']?>
                </li>
                <li><b>Address 1:&nbsp;&nbsp;</b>
                  <?=$cust_data['AddressLine1']?>
                </li>
                <li><b>Address 2:&nbsp;&nbsp;</b>
                  <?=$cust_data['AddressLine2']?>
                </li>
                <li><b>City:&nbsp;&nbsp;</b>
                  <?=$cust_data['City']?>
                </li>
                <li><b>State:&nbsp;&nbsp;</b>
                  <?=$cust_data['StateID']?>
                </li>
                <li><b>Zipcode:&nbsp;&nbsp;</b>
                  <?=$cust_data['Zipcode']?>
                </li>
                <li><b>Country:&nbsp;&nbsp;</b>
                  <?=$cust_data['CountryID']?>
                </li>
                <li><b>Phone:&nbsp;&nbsp;</b>
                  <?=$cust_data['Phone']?>
                </li>
                 </ul>
            </div>
               <?php 
									$count++;
								}
							}
							if($aid != "")
						{
							
							$casql = "SELECT * FROM customeraddress WHERE CustomerAddressID=".$aid." and CustomerID=".$id;
							
							
	$cares = mysqli_query($dbLink,$casql) or die ('Could Not Select Customer');
	//$cadata = mysql_fetch_assoc($cares);
    $carow = $cares->fetch_assoc();
	
	$fname=stripslashes($carow['FirstName']);
	$lname=stripslashes($carow['LastName']);
	$CompanyName=stripslashes($carow['CompanyName']);
	$AddressLine1=stripslashes($carow['AddressLine1']);
	$AddressLine2=stripslashes($carow['AddressLine2']);
	$email=stripslashes($carow['Email']);
	$City=stripslashes($carow['City']);
	$state=stripslashes($carow['StateID']);
	$zipcode=stripslashes($carow['Zipcode']);
	$country=stripslashes($carow['CountryID']);
	$Phone=stripslashes($carow['Phone']);

	
				?>
          
         
        
            
             <form action="updateaddress.php?id=<?php echo $id;?>&editid=<?php echo $aid;?>" method="post" name="form1" id="form1" onSubmit="return validate1(this);" >
                
                <div class="section ">
                  <label> First Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="FirstName"  id="FirstName" value="<?=$fname?>">
                  </div>
                </div>
                <div class="section ">
                  <label> LastName<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="LastName"  id="LastName" value="<?=$lname?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Company Name<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="CompanyName"  id="CompanyName" value="<?=$CompanyName?>">
                  </div>
                </div>
                 <div class="section ">
                  <label> Address Line 1<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="AddressLine1"  id="AddressLine1" value="<?=$AddressLine1?>">
                  </div>
                </div>
                 <div class="section ">
                  <label> Address Line 2<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="AddressLine2"  id="AddressLine2" value="<?=$AddressLine2?>">
                  </div>
                </div>
                <div class="section ">
                  <label> City<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="City"  id="City" value="<?=$City?>">
                  </div>
                </div>
                <div class="section ">
                  <label> State<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="state"  id="state" value="<?=$state?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Zip Code<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Zipcode"  id="Zipcode" value="<?=$zipcode?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Country<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="country"  id="country" value="<?=$country?>">
                  </div>
                </div>
                <div class="section ">
                  <label> Phone<small>Text</small></label>
                  <div>
                    <input type="text" class="large" name="Phone"  id="Phone" value="<?=$Phone?>">
                  </div>
                </div>
                <div class="section ">
                  <label>Email<small></small></label>
                  <div>
                  <input type="text" class="large" name="Email"  id="Email" value="<?=$email?>">
                 
                  </div>
                </div>
                <div class="section last">
                  <div>
                    <input name="Submit" type="submit" class="uibutton submit_form" value="Submit" />
                    <!-- <a class="uibutton submit_form" >submitForm</a>--> 
                  </div>
                </div>
              </form>
                     <?php  } ?>
                    </div>
                    
                 <div id="tab3" class="tab_content">
                  
              <div style="float:left;padding:5px;border:1px solid rgb(205,205,205);width:30%;margin:20px 0;">  
                <table width="100%" align="left" cellpadding="0" cellspacing="10">
                	<tr>
                    	<td>Credit Card Name</td>
                        <td><?=$CrediCardName?></td>
                    </tr>
                    	<tr>
                    	<td>Credit Card Number</td>
                        <td><?=$CrediCardNumber?></td>
                    </tr>
                    	<tr>
                    	<td> Credit Card Type</td>
                        <td><?=$CrediCardType?></td>
                    </tr>
                    	<tr>
                    	<td>Verification Code</td>
                        <td><?=$CrediCardVerificationCode?></td>
                    </tr>
                    	<tr>
                    	<td>Exp. Month</td>
                        <td><?=$CrediCardExpMonth?></td>
                    </tr>
                    	<tr>
                    	<td>Exp. Year</td>
                        <td><?=$CrediCardExpYear?></td>
                    </tr>
                </table>
                             
                </div>
             
                 </div>   
                    
                    
                    
                    
                    
                 
            </div>
          </div>
        </div>
    <div class="clear"></div>
    </div>
    </div>
    <?php  include('inc_footer.php'); ?>
  </div>
  <!--// End inner --> 
</div>
<!--// End content -->
</body>
</html>
