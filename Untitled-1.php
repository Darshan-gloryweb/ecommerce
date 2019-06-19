<?php if(isset($_SESSION['Email']) && isset($_SESSION['CustomerID']))
				{
					?>
          <?php
		  			if(isset($_REQUEST['link']) && $_REQUEST['link'] == "orders")
					{
						$order_sql = "select custorder.*,ordercart.OrderTotal,ordercart.OrderCartID from custorder inner join ordercart on custorder.OrderNumber = ordercart.OrderNumber and custorder.CustomerID=".$_SESSION['CustomerID'];
						$order_res = mysqli_query($dbLink,$order_sql) or die ('Could Not Select Orders');
						if(mysqli_num_rows($order_res)>0)
						{
							?>
                            <p>RECENT ORDERS</p>
                            <table width="100%">
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
                                <td>
                                <?php
								$order_item = "SELECT product.ProductName,product.Price,product.ImageName,ordercartitems.Quantity from product inner join ordercartitems on ordercartitems.OrderCartID=".$order_data['OrderCartID']." and ordercartitems.ProductID=product.ProductID";
								
								$order_item_res = mysqli_query($dbLink,$order_item) or die ('Could Not Select Order Items');
								while($order_item_data=$order_item_res->fetch_assoc())
								{
									?>
                                    <p><img src="<?=$frontpath?>/ProductImage/<?=$order_item_data['ImageName']?>?<?=time()?>"
                                    title="<?=$order_item_data['ProductName']?>" alt="<?=$order_item_data['ProductName']?>"
                                    style="width:50px; height:50px; vertical-align:top; float:left; margin-right:10px;" />
                                    <strong><?=$order_item_data['ProductName']?></strong><br />
                                    Price : <strong>$<?=$order_item_data['Price']?></strong><br />
                                    Quantity : <strong><?=$order_item_data['Quantity']?></strong></p>
                                    <?php
								}
								
								?>                                
                                </td>
                                <td><?=$order_data['OrderTotal']?></td>
                                <td><?php if($order_data['Status']==1)
									{
										echo "Pending";
									}
									?></td>
                                <td><a href="invoiceprint.php?id=<?= $order_data['OrderNumber'] ?>">Invoice</a>&nbsp;&nbsp;<a href="<?=$frontpath?>/shop/editorder.php?orderid=<?=$order_data['OrderNumber']?>">Edit</a></td>
                                </tr>
                                <?php
							}
							?>
                            </table>
                            <?php
						}
						else
						{
							echo "There Is Not Any Order";
						}
					}
					else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "changepassword")
						{
							?>
          <form name="Personal" id="Personal" onSubmit="return validatePassword(this)" action="accountp.php" method="post">
            <div class="shoppingptrow" style="color:red;"> <?php echo $_REQUEST['msg']; ?> </div>
            <p><strong>Email</strong><br />
              <?php echo $_SESSION['Email']; ?></p>
            <p><strong>Old Password</strong><br />
              <input type="password" class="textfield" name="oldpassword" id="password" onkeypress="capLock(event)" />
            </p>
            <p><strong>New Password</strong><br />
              <input type="password" class="textfield" name="newpassword" id="password" onkeypress="capLock(event)" />
            </p>
            <p><strong>Retype New Password</strong><br />
              <input type="password" class="textfield" name="confpassword" id="password" onkeypress="capLock(event)" />
            </p>
            <p>
              <input type="submit" name="changepassword" value="Save" />
            </p>
          </form>
          <?php
							
						}
						else if(isset($_REQUEST['link']) && $_REQUEST['link'] == "addresses")
						{
							
                            if(isset($_REQUEST['aid']) && $_REQUEST['aid']!="")
							{
								$sel_address = "SELECT * FROM customeraddress WHERE CustomerAddressID=".$_REQUEST['aid'];
								$res_address = mysqli_query($dbLink,$sel_address) or die('Could Not Select Address');
								$res_data = $res_address->fetch_assoc();
								
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
                  <p><strong>FirstName</strong><br /><input type="text" class="textfield" name="fname" id="fname" value="<?=$add_fname?>" /></p>
                  <p><strong>Last Name</strong><br />
                    <input type="text" class="textfield" name="lname" id="lname" value="<?=$add_lname?>" /></p>
                   <p> <strong>Company Name</strong><br />
                      <input type="text" class="textfield" name="cname" id="cname" value="<?=$add_cname?>" /></p>
					<p><strong>Email</strong><br /><input type="text" class="textfield" name="email" id="email" value="<?=$add_email?>" /></p>
                    <p><strong>Address Line 1</strong><br />
                     <input type="text" class="textfield" name="address1" id="address1" value="<?=$add_address1?>" /></p>
                    <p><strong>Address Line 2</strong><br />
                      <input type="text" class="textfield" name="address2" id="address2" value="<?=$add_address2?>" /></p>
                    <p><strong>City</strong><br />
                      <input type="text" class="textfield" name="city" id="city" value="<?=$add_city?>" /></p>
                    <p><strong>State</strong>
                    <br />
                      <select name="state" id="state" class="textfield">
                        <option value="">Select</option>
                        <option <?php if($add_state == 1 ) echo "selected='selected'"; ?> value="1">CA</option>
                        <option <?php if($add_state == 2 ) echo "selected='selected'"; ?> value="2">TX</option>
                        <option <?php if($add_state == 3 ) echo "selected='selected'"; ?> value="3">Uk</option>
                      </select></p>
                    <p><strong>Zipcode</strong><br />
                      <input type="text" class="textfield" name="zipcode" id="zipcode" maxlength="5" value="<?=$add_zipcode?>" /></p>
                      <p><strong>Country</strong><br />
                      <select name="country" id="country" class="textfield">
                        <option value="">Select</option>
                        <option <?php if($add_country == 1 ) echo "selected='selected'"; ?>  value="1">USA</option>
                        <option <?php if($add_country == 2 ) echo "selected='selected'"; ?>  value="2">INDIA</option>
                        <option <?php if($add_country == 3 ) echo "selected='selected'"; ?>  value="3">UK</option>
                      </select></p>
                    <p><strong>Phone</strong><br />
                      <input type="text" class="textfield" name="phone" id="phone" value="<?=$add_phone?>" /></p>
                    
                  <?php if(!isset($_REQUEST['aid']))
					   {
						   ?>
                  <p><strong>Shipping Address</strong>
                  <input type="checkbox" value="2" name="addresstype" <?php if($add_type==2){ echo "checked='checked'"; } ?> /></p>
                  <?php } ?>
                  <p><input type="submit" name="address" value="Save"  /></p>
                </form>
                
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
                <li>
                  <strong>Billing Address<?=$count?></strong>
                  <span style="float:right; display:inline;"><a href="">Edit</a></span></li>
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
                <li>
                  <strong>Shipping Address <?=$count?></strong>
                  
                  <span style="float:right; display:inline;"><a href="">Edit</a></span></li>
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
          <form name="Personal" id="Personal" onSubmit="return validatePersonal(this)" action="accountp.php" method="post">
            <div class="shoppingptrow" style="color:red;"> <?php echo $_REQUEST['msg']; ?> </div>
            <p><strong><strong>First Name</strong></strong><br />
              <input type="text" name="fname" id="fname" class="textfield" value="<?=$fname?>" />
            </p>
            <p> <strong> Last Name</strong><br />
              <input type="text" class="textfield" name="lname" id="lname" value="<?=$lname?>" />
            </p>
            <p> <strong>Phone Number</strong><br />
              <input type="text" class="textfield" name="phone" id="phone" value="<?=$phone?>" />
            </p>
            <p>
              <input type="submit" name="personal" value="Save"  />
            </p>
          </form>
          <?php } ?>
          <?php } else { 
			
			echo "Please Login";
			}
			?>