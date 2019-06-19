<?php  require_once('db.php'); ?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php $title = $mywebsitename; ?>
<?php require_once('header.php');?>

   <div class="content_left">
      
        <h3>My Account</h3>
      
      <div class="myaccount"> <a href="<?=$frontpath?>/myaccount.php?link=myorder" class="<?php if($_REQUEST['link']=="myorder") { echo "select"; } ?>" title="My Order">My Orders</a> <a href="<?=$frontpath?>/myaccount.php?link=personalinformation" class="<?php if($_REQUEST['link']=="personalinformation") { echo "select"; } ?>" title="Personal Information">Personal Information</a> <a href="<?=$frontpath?>/myaccount.php?link=changepassword" class="<?php if($_REQUEST['link']=="changepassword") { echo "select"; } ?>" title="Change Password">Change Password</a> <a href="<?=$frontpath?>/myaccount.php?link=addresses" class="<?php if($_REQUEST['link']=="addresses") { echo "select"; } ?>" title="Addresses">Addresses</a>  </div>
      <div class="tell">
        <p>Click Here</p>
        <a href="#" title="Tell a Friend">Tell a Friend</a> </div>
    </div>
    <div class="content_right">
  <h3>
              <?php 
            if(!isset($_REQUEST['link']))  { echo "Personal Information"; }
            else if($_REQUEST['link']=="changepassword") { echo "Change password"; }
            else if($_REQUEST['link']=="addresses") { echo "Addresses"; }
            else if($_REQUEST['link']=="orders") { echo "My Orders"; }
             ?>
            </h3>
    <div class="myorder">
    <?php if(isset($_SESSION['Email']) && isset($_SESSION['CustomerID']))
				{
					?>
  
				<?php
						if(isset($_REQUEST['link']) && $_REQUEST['link'] == "myorder")
						{
							?>
      <h3>My Order</h3>
      <table width="100%" cellpadding="0" cellspacing="0">
      <tr>
      <th>Order No</th>
      <th>Products</th>
      <th>Dated</th>
      <th>Amount</th>
      <th>Status</th>
      <th>Action</th>
      </tr>
      <tr>
      <td width="17%"><a class="a_bg">OD40123062266</a></td>
      <td width="33%">Polo Ralph Lauren Solid Men's Henley T-...</td>
      <td width="9%">29-jan-2014</td>
      <td width="13%">Rs. 4374 </td>
      <td width="22%">Delivered by Mon, 27th Jan </td>
      <td width="15%"><a class="cancel" title="Cancel"><i></i>Cancel</a></td>
      </tr>
      </table>
        <?php
							
						}
						else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "personalinformation")
						{?>
	 
      <div class="personal">
      <h3 style="font-size:22px;">Personal Informarion</h3>
      <table cellpadding="0" cellspacing="0" style="float:left" align="center">
      <tr>
      	<td>First Name</td>
        <td><input type="text" name="fname" /> </td>
      </tr>
      <tr>
      	<td>Last Name</td>
        <td><input type="text" name="lname" /> </td>
      </tr>
      <tr>
      	<td>Address</td>
        <td><input type="text" name="address" /> </td>
      </tr>
      <tr>
      	<td>Moblile Number</td>
        <td><input type="text" name="mnumber" /> </td>
      </tr>
     
<tr>
	<td></td>
      <td><input type="button" class="savechages" /></td>
</tr>
      </table>
      </div>
      <?php
						}
      else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "changepassword")
						{?>
      <div class="change_password">	
      <h3>Change Password</h3>
       <table cellpadding="0" cellspacing="0" style="float:left" align="center">
      <tr>
      	<td>Email Address</td>
        <td><input type="text" name="fname" /> </td>
      </tr>
      <tr>
      	<td>Old Password</td>
        <td><input type="text" name="lname" /> </td>
      </tr>
      <tr>
      	<td>New Password</td>
        <td><input type="text" name="address" /> </td>
      </tr>
      <tr>
      	<td>Retype New Password</td>
        <td><input type="text" name="mnumber" /> </td>
      </tr>
		<tr>
		<td></td>
	    <td><input type="button" class="savechages" /></td>
		</tr>
      </table>

      </div>
       <?php
						}
      else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "addresses")
						{?>
      <div class="addresses">
      <h3>Addresses</h3>
      <table>
      <tr>
      	<td>Name</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td>Street Address</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td>Landmark</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td>City</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td>State</td>
        <td><select>
        	<option value="">Select State</option>
        </select></td>
      </tr>
      <tr>
      	<td>Country</td>
        <td><label></label></td>
      </tr>
      <tr>
      	<td>Pincode</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td>Phone Number</td>
        <td><input type="text" name="mnumber" /></td>
      </tr>
      <tr>
      	<td></td>
        <td><input type="button" class="savechages" /></td>
      </tr>
      </table>    
      
      <div class="addresses_list">
                                    <ul>
                                    <li><h2 >Address1</h2><span style="float:right; display:inline;"><a href="#">Edit</a></span></li>
                                    <li><b>First Name:&nbsp;&nbsp;</b>Amit</li>
                                    <li><b>Last Name:&nbsp;&nbsp;</b>nayak</li>
                                    <li><b>Company Name:&nbsp;&nbsp;</b>asfasf</li>
                                    <li><b>Email:&nbsp;&nbsp;</b>abc@yahho.com</li>
                                    <li><b>Address 1:&nbsp;&nbsp;</b>afdsaf</li>
                                    <li><b>Address 2:&nbsp;&nbsp;</b>asdfsaf</li>
                                    <li><b>City:&nbsp;&nbsp;</b>asfdsaf</li>
                                    <li><b>State:&nbsp;&nbsp;</b>1</li>
                                    <li><b>Zipcode:&nbsp;&nbsp;</b>31311</li>
                                    <li><b>Country:&nbsp;&nbsp;</b>1</li>
                                    <li><b>Phone:&nbsp;&nbsp;</b>23121321</li>
                                    </ul>
                                    </div>  
      </div>
      
            <?php }} else { 
			
			echo "Please Login";
			}
			?>
            </div>
</div>
</div>

  <?php require_once('footer.php');?>
  <!--<div class="footer">
    <div class="f_left">
      <ul>
        <li><a href="#" title="Home">Home</a> <span>|</span></li>
        <li><a href="#" title="About Us">About Us</a> <span>|</span></li>
        <li><a href="#" title="Contact Us">Contact Us</a> <span>|</span></li>
        <li><a href="#" title="Enquiry">Enquiry</a> <span>|</span></li>
        <li><a href="#" title="Feedback">Feedback</a> </li>
      </ul>
      <p>Copyright © 2013 Devnandan Handloom. All Rights Reserved.</p>
    </div>
    <div class="f_right">
      <p>Select Language</p>
      <a href="#" title=""><img src="images/flag1.jpg" alt="" title="" /></a> <a href="#" title=""><img src="images/flag2.jpg" alt="" title="" /></a> <a href="#" title=""><img src="images/flag3.jpg" alt="" title="" /></a> <a href="#" title=""><img src="images/flag4.jpg" alt="" title="" /></a> </div>
  </div>
</div>
<script src="js/jquery.js"></script> 
<script src="js/responsive-slider.js"></script> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
<script>
$(function() {
$( "#accordion" ).accordion();
});
</script>
</body>
</html>-->
