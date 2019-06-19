<div id="left_menu">
                    <ul id="main_menu" class="main_menu">
                    
                    	<li class="limenu <?php  if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)=='index.php') { echo "select"; } ?>" ><a href="index.php"><span class="ico gray shadow abacus"></span><b>Home</b></a></li>
                    
                    
                    	<?php 
                      $admin_menu="select access from adminuser where AdminUserID=".$_SESSION['what_adminid'];
					  $admin_menu_res=mysqli_query($dbLink,$admin_menu) or die ('Could Not Select');
					  if(mysqli_num_rows($admin_menu_res)>0)
					  {
						  $d=$admin_menu_res->fetch_assoc();
						  $pstr=$d['access'];
						  $pages=explode(',',$pstr);
						  for($i=0;$i<count($pages);$i++)
						  {
							  if($pages[$i]!="")
							  {
								$menu_name="select name from admin_menu where url='".$pages[$i]."' order by displayorder";
								$menu_name_res=mysqli_query($dbLink,$menu_name) or die ('Could Not Select');
								$mname=$menu_name_res->fetch_assoc();
							  ?>
                              <li class="limenu <?php  if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)==$pages[$i]) { echo "select"; } ?>" ><a href="<?=$pages[$i]?>" title="<?=$mname['name']?>"><span class="ico gray shadow abacus" ></span>
                              <b>
                              <?php 
								echo $mname['name'];
							  ?>
                              </b></a></li>
                              <?php 
							  }
						  }
					  }
                      ?>
                        
                    </ul>
              </div>