<?php 
global $_SESSION;
global $dbLink;
$asql="select FirstName,LastName,AImg from adminuser where AdminUserID=".$_SESSION['what_adminid'];
$ares=mysqli_query($dbLink,$asql) or die ('Could Not Select Admin Details');
$adata=$ares->fetch_assoc();
?>
<div id="header" >
                <div id="account_info"> 
                	
                    <?php  if($adata['AImg']!='') { ?>
                    <img src="../UserImage/<?=$adata['AImg']?>?<?php  echo time(); ?>" height="32" width="32" style="border-radius:5px;" alt="Online" class="avatar" />
                    <?php  } else { ?>
                    <img src="images/noimg.jpg" height="32" width="32" style="border-radius:5px;" alt="Online" class="avatar" />
                    <?php  } ?>
					<div class="setting" title="Admin"><b>Welcome,</b> <b class="red"><?php  echo $adata['FirstName'].' '.$adata['LastName']; ?></b><a href="user.php"><img src="images/gear.png" class="gear"  alt="Admin" ></a></div>
					<div class="logout" title="Logout"><a href="logout.php"> <img src="images/connect.png" name="connect" class="disconnect" alt="disconnect" ></a></div> 
                </div>
            </div>