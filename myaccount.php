<?php  require_once('db.php'); ?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php $title = $mywebsitename; ?>
<?php require_once('header.php');?>
    <div class="content_left">
          <h3>My Account</h3>
          <div class="myaccount"> <a href="<?=$frontpath?>/myaccount.php?link=orders" class="<?php if($_REQUEST['link']=="orders") { echo "select"; } ?>" title="My Order">My Orders</a> <a href="<?=$frontpath?>/myaccount.php?link=personalinformation" class="<?php if($_REQUEST['link']=="personalinformation" || !isset($_REQUEST['link'])) { echo "select"; } ?>" title="Personal Information">Personal Information</a> <a href="<?=$frontpath?>/myaccount.php?link=changepassword" class="<?php if($_REQUEST['link']=="changepassword") { echo "select"; } ?>" title="Change Password">Change Password</a> <a href="<?=$frontpath?>/myaccount.php?link=addresses" class="<?php if($_REQUEST['link']=="addresses") { echo "select"; } ?>" title="Addresses">Addresses</a>
          <a href="<?=$frontpath?>/myaccount.php?link=wishlist" class="<?php if($_REQUEST['link']=="wishlist") { echo "select"; } ?>" title="My Wishlist">My Wishlist</a>
           </div>
          <div class="tell" onClick="viewpop()">
        <p>Click Here</p>
        <a  title="Tell a Friend">Tell a Friend</a> </div>
        </div>
    <div class="content_right">
          <?php if(isset($_SESSION['Email']) && isset($_SESSION['CustomerID']))
				{
					?>
           
          <div class="myorder">
        <?php
		  			if(isset($_REQUEST['link']) && $_REQUEST['link'] == "orders")
					{?>
                    <div class="sitemap"> <a href="<?=$frontpath?>" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/myaccount.php" title="My Account">My Account</a><span>>></span><p>My Orders</p>
      </div>
                    <?php
						$order_sql = "select custorder.*,ordercart.OrderTotal,ordercart.OrderCartID from custorder inner join ordercart on custorder.OrderNumber = ordercart.OrderNumber and custorder.CustomerID=".$_SESSION['CustomerID']." order by custorder.UpdatedOn DESC";
						$order_res = mysqli_query($dbLink,$order_sql) or die ('Could Not Select Orders');
						
						if(mysqli_num_rows($order_res)>0)
						{
							?>
                            
        <p style="font-size:15px;margin:5px 0">RECENT ORDERS</p>
        <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
            <th>ORDER NO</th>
            <th>PRODUCTS</th>
            <th>TOTAL</th>
            <th>STATUS</th>
            <th>ACTION</th>
          </tr>
              <?php
							while($order_data = $order_res->fetch_assoc())
							{
								?>
              <tr style="border-bottom:1px solid;">
            <td><?=$order_data['OrderNumber']?></td>
            <td><?php
								$order_item = "SELECT product.ProductName,ordercartitems.Price,product.ImageName,ordercartitems.Quantity from product inner join ordercartitems on ordercartitems.OrderCartID=".$order_data['OrderCartID']." and ordercartitems.ProductID=product.ProductID";
								
								$order_item_res = mysqli_query($dbLink,$order_item) or die ('Could Not Select Order Items');
								while($order_item_data=$order_item_res->fetch_assoc())
								{
									?>
                  <p style="width:100%"><img src="<?=$frontpath?>/ProductImage/<?=$order_item_data['ImageName']?>?<?=time()?>"
                                    title="<?=$order_item_data['ProductName']?>" alt="<?=$order_item_data['ProductName']?>"
                                    style="width:50px; height:50px; vertical-align:top; float:left; margin-right:10px;" /> <strong>
                    <?=$order_item_data['ProductName']?>
                    </strong><br />
                Price : <strong>£
                    <?=$order_item_data['Price']?>
                    </strong><br />
                Quantity : <strong>
                    <?=$order_item_data['Quantity']?>
                    </strong></p>
                  <?php
								}
								
								?></td>
            <td>£ <?=$order_data['OrderTotal']?></td>
            <td><?php if($order_data['Status']==1){ echo "Pending";} ?>
                                 <?php if($order_data['Status']==2){ echo "Completed";} ?>
                                    <?php if($order_data['Status']==3){ echo "Cancelled";} ?></td>
            <td style="width: 90px;"><a target="_new" href="invoiceprint.php?id=<?= $order_data['OrderNumber'] ?>">Invoice</a>&nbsp;&nbsp;<!--<a href="<?=$frontpath?>/editorder.php?orderid=<?=$order_data['OrderNumber']?>">Edit</a>--></td>
          </tr>
              <?php
							}
							?>
            </table>
        <?php
						}
						else
						{
							echo "<h2 style='color:red; margin:10px 0;float:left'>There Is Not Any Order Placed</h2>";
						}
					}
					else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "wishlist")
						{
							?>
                            <div class="sitemap"> <a href="<?=$frontpath?>" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/myaccount.php" title="My Account">My Account</a><span>>></span><p>My Wishlist</p>
      </div>
                            <?php
							$order_sql = "select product.* from wishlist inner join product on wishlist.ProductID = product.ProductID and wishlist.CustomerID=".$_SESSION['CustomerID'];
						$pres = mysqli_query($dbLink,$order_sql) or die ('Could Not Select wishlist');
						
						if(mysqli_num_rows($pres)>0)
						{
							$i=0;
							$k=1;
							?>
                            
        <p style="font-size:15px;margin:5px 0;width:100%;">Wishlist Items</p>
		<table width="100%" cellspacing="0" cellpadding="0" id="shoppingcart">
        <tr>
        	<th class="td_left">Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
              <?php while($pdata = $pres->fetch_assoc())
		{
        	$i++;
			?>
            <tr>
            <td class="td_left td_bottom"><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php"><img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="50" width="50" alt="" title="" /></a></td>
            <td><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php">
              <?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,25)?>
              </a></td>
            <td>£ <?=$pdata['Price']?></td>
            <td><a onclick="deleteList(this.id)" id="DeleteWitem<?=$pdata['ProductID']?>" data="<?=$pdata['ProductID']?>" title="Delete From Wishlist">Delete From list</a></td>
            </tr>
            <?php
  			$k++;
		}
						
							?>
                            </table>
            
        <?php
						}
						else
						{
							echo "<h2 style='color:red; margin:10px 0;float:left'>There Is Not Any Item In Wishlist</h2>";
						}
						}
					else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "changepassword")
						{
							?>
                            <div class="sitemap"> <a href="<?=$frontpath?>" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/myaccount.php" title="My Account">My Account</a><span>>></span><p>Change Password</p>
      </div>
        <div class="change_password">
              <form name="Personal" id="Personal" onSubmit="return validatePassword(this)" action="accountp.php" method="post">
            <div class="shoppingptrow" style="color:red;"> <?php echo $_REQUEST['msg']; ?> </div>
            <table width="100%" cellpadding="0" cellspacing="0" style="text-align:left" align="left">
                  <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $_SESSION['Email']; ?></td>
                <td><strong>Old Password</strong></td>
                <td><input type="password" class="textfield" name="oldpassword" id="password" onkeypress="capLock(event)" /></td>
                <td><strong>New Password</strong></td>
                <td><input type="password" class="textfield" name="newpassword" id="password" onkeypress="capLock(event)" /></td>
                <td><strong>Retype New Password</strong></td>
                <td><input type="password" class="textfield" name="confpassword" id="password" onkeypress="capLock(event)" /></td>
                <td><input type="submit" name="changepassword" value="Save" /></td>
              </tr>
                    </tr>
                  
                </table>
          </form>
          </div>
              <?php
							
						}
						else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "addresses")
						{
							
							
                            if(isset($_REQUEST['aid']) && $_REQUEST['aid']!="")
							{
								$sel_address = "SELECT * FROM customeraddress WHERE CustomerAddressID=".$_REQUEST['aid'];
								$res_address = mysqli_query($dbLink,$sel_address) or die('Could Not Select Address');
								$res_data =$res_address->fetch_assoc();
								
								$add_fname = $res_data['FirstName'];
								$add_lname = $res_data['LastName'];
								$add_cname = $res_data['CompanyName'];
								$add_email= $res_data['Email'];
								$add_address1= $res_data['AddressLine1'];
								$add_address2 = $res_data['AddressLine2'];
								$add_city = $res_data['City'];
								$add_state = $res_data['StateID'];
								$add_zipcode = $res_data['Zipcode'];
								$add_country = $res_data['CountryID'];
								$add_phone = $res_data['Phone'];
								$add_type = $res_data['AddressType'];
								
								$add_action = "update";
							}
							else
							{
								$add_action = "insert";
							}
                            ?>
                            <div class="sitemap"> <a href="<?=$frontpath?>" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/myaccount.php" title="My Account">My Account</a><span>>></span><p>Addresses</p>
      </div>
              <div class="addresses">
            <form name="ChangePassword" id="ChangePassword" onSubmit="return validateAddress(this)" action="accountp.php" method="post">
                  <?php
						if(isset($_REQUEST['aid']) && $_REQUEST['aid'] != "")
						{
							?>
                  <input type="hidden" name="addressid" value="<?=$_REQUEST['aid']?>" />
                  <?php	
						}
						?>
                  <input type="hidden" name="action" value="<?=$add_action?>" />
                  <div class="shoppingptrow" style="color:red;"> <?php echo $_REQUEST['msg']; ?> </div>
                  <table>
                <tr>
                      <td><strong>FirstName</strong></td>
                      <td><input type="text" class="textfield" name="fname" id="fname" value="<?=$add_fname?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Last Name</strong></td>
                      <td><input type="text" class="textfield" name="lname" id="lname" value="<?=$add_lname?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Company Name</strong></td>
                      <td><input type="text" class="textfield" name="cname" id="cname" value="<?=$add_cname?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Email</strong></td>
                      <td><input type="text" class="textfield" name="email" id="email" value="<?=$add_email?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Address Line 1</strong></td>
                      <td><input type="text" class="textfield" name="address1" id="address1" value="<?=$add_address1?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Address Line 2</strong></td>
                      <td><input type="text" class="textfield" name="address2" id="address2" value="<?=$add_address2?>" /></td>
                    </tr>
                <tr>
                      <td><strong>City</strong></td>
                      <td><input type="text" class="textfield" name="city" id="city" value="<?=$add_city?>" /></td>
                    </tr>
                <tr>
                      <td><strong>State</strong></td>
                      <td><select name="state" id="state" class="textfield">
                          <option value="">Select</option>
                          <option <?php if($add_state == 1 ) echo "selected='selected'"; ?> value="1">CA</option>
                          <option <?php if($add_state == 2 ) echo "selected='selected'"; ?> value="2">TX</option>
                          <option <?php if($add_state == 3 ) echo "selected='selected'"; ?> value="3">Uk</option>
                        </select></td>
                    </tr>
                <tr>
                      <td><strong>Zipcode</strong></td>
                      <td><input type="text" class="textfield" name="zipcode" id="zipcode" maxlength="5" value="<?=$add_zipcode?>" /></td>
                    </tr>
                <tr>
                      <td><strong>Country</strong></td>
                      <td><select name="country" id="country" class="textfield">
                          <option value="">Select</option>
                          <option <?php if($add_country == 1 ) echo "selected='selected'"; ?>  value="1">USA</option>
                          <option <?php if($add_country == 2 ) echo "selected='selected'"; ?>  value="2">INDIA</option>
                          <option <?php if($add_country == 3 ) echo "selected='selected'"; ?>  value="3">UK</option>
                        </select></td>
                    </tr>
                <tr>
                      <td><strong>Phone</strong></td>
                      <td><input type="text" class="textfield" name="phone" id="phone" value="<?=$add_phone?>" /></td>
                    </tr>
              
                  <?php if(!isset($_REQUEST['aid']))
					   {
						   ?>
                         <!--  <tr>
                  <td><strong>Shipping Address</strong></td>
                <td><input type="checkbox" value="2" name="addresstype" <?php if($add_type==2){ echo "checked='checked'"; } ?> /></td>
              </tr>-->
                  <?php } ?>
                  <tr>
                  <td>
                <input type="submit" name="address" value="Save"  /></td>
                </tr>
                </table>
              
                </form>
          </div>
              <?php
							//Get Addresses
							
							$cust_add = "SELECT * FROM customeraddress WHERE CustomerID=".$_SESSION['CustomerID']." and AddressType=1";
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
                  <li> <strong>Billing Address
                    <?=$count?>
                    </strong> <span style="float:right; display:inline;"><a href="?link=addresses&aid=<?=$cust_data['CustomerAddressID']?>">Edit</a></span></li>
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
                  <?php 
									$dadd = "select count(*) from customer where BillingAddressId=".$cust_data['CustomerAddressID'];
									$dres = mysqli_query($dbLink,$dadd) or die ('Could Not Process Customer Address');
									$ddata = $dres->fetch_assoc();
									if($ddata[0]<=0)
									{
										?>
                  <li class="lastli"><a href="accountp.php?add=bill&id=<?=$cust_data['CustomerAddressID']?>" style="float:left">Default</a> <a href="accountp.php?addtype=del&id=<?=$cust_data['CustomerAddressID']?>" style="float:Right">Delete</a></li>
                  <?php
									}
									
									?>
                </ul>
          </div>
              <?php
									$count++;
								}
							}
							
							?>
              <?php
							//Get Addresses
							
							$cust_add = "SELECT * FROM customeraddress WHERE CustomerID=".$_SESSION['CustomerID']." and AddressType=2";
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
                  <li> <strong>Shipping Address
                    <?=$count?>
                    </strong> <span style="float:right; display:inline;"><a href="?link=addresses&aid=<?=$cust_data['CustomerAddressID']?>">Edit</a></span></li>
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
                  <?php 
									$dadd = "select count(*) from customer where ShippingAddressId=".$cust_data['CustomerAddressID'];
									$dres = mysqli_query($dbLink,$dadd) or die ('Could Not Process Customer Address');
									$ddata = $dres->fetch_assoc();
									if($ddata[0]<=0)
									{
										?>
                  <li class="lastli"><a href="accountp.php?add=ship&id=<?=$cust_data['CustomerAddressID']?>" style="float:left">Default</a> <a href="accountp.php?addtype=del&id=<?=$cust_data['CustomerAddressID']?>" style="float:Right">Delete</a></li>
                  <?php
									}
									
									?>
                </ul>
          </div>
              <?php
									$count++;
								}
							}
							
						}
						else
						{
							
							$sql = "SELECT * FROM customer WHERE CustomerID=".$_SESSION['CustomerID'];
							
	$res = mysqli_query($dbLink,$sql) or die ('Could Not Select Customer');
	$customerdata = $res->fetch_assoc();
	
	$fname = $customerdata['FirstName'];
	$lname = $customerdata['LastName'];
	$phone = $customerdata['PhoneNumber'];
				?>
                <div class="sitemap"> <a href="<?=$frontpath?>" title="Home">Home</a><span>>></span> <a href="<?=$frontpath?>/myaccount.php" title="My Account">My Account</a><span>>></span><p>Personal Information</p>
      </div>
              <form name="Personal" id="Personal" onSubmit="return validatePersonal(this)" action="accountp.php" method="post">
            <div class="personal">
            <div class="shoppingptrow" style="color:red;"> <?php echo $_REQUEST['msg']; ?> </div>
            <table>
                  <tr>
                <td><strong>First Name</strong></td>
                <td><input type="text" name="fname" id="fname" class="textfield" value="<?=$fname?>" /></td>
              </tr>
                  <tr>
                <td><strong> Last Name</strong></td>
                <td><input type="text" class="textfield" name="lname" id="lname" value="<?=$lname?>" /></td>
              </tr>
                  <tr>
                <td><strong>Phone Number</strong></td>
                <td><input type="text" class="textfield" name="phone" id="phone" value="<?=$phone?>" /></td>
              </tr>
                  <tr>
                <td><input type="submit" name="personal" value="Save"  /></td>
              </tr>
                </table>
          </form>
            </div>
        <?php } ?>
      </div>
          <?php } else { 
			
			echo "Please Login";
			}
			?>
        </div>
  </div>
      <?php require_once('footer.php');?>
