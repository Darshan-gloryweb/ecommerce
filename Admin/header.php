<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<link href="<?=$frontpath?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?=$frontpath?>/css/responsive-slider.css" rel="stylesheet">
<link rel="stylesheet" href="<?=$frontpath?>/css/jquery-ui.css">
<title><?=$title?></title>
 <!-- TABBING -->
 
 
    <script src="<?=$frontpath?>/js/jquery.js" type="text/javascript" charset="utf-8"></script>    
   
    <script type="text/javascript" charset="utf-8">
		$(function () {
			var tabContainers = $('div.tab > div');
			tabContainers.hide().filter(':first').show();
			
			$('div.tab ul.tabNavigation a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tab ul.tabNavigation a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click();
			//get_products('<?=$_SESSION['item_per_page']?>','<?=$id?>','<?=$_SESSION['item_per_page1']?>');
			
		});
    </script>

    <!-- TABBING -->
<?php  include('validation.php'); ?>
</head>

<body>
<div class="wrapper">
  <div class="header">
    <div class="h_left"> <a href="<?=$frontpath?>" title="logo">  <?php  if($logo!="") { ?>
     		<img src="<?=$frontpath?>/images/<?=$logo?>?<?php  echo time(); ?>" alt="<?=$mywebsitename?>" title="<?=$mywebsitename?>" /> 
    	<?php  }
		else
		{
			echo $mywebsitename; 
		}
		 ?></a> </div>
    <div class="h_right">
      <div class="top">
       
	   <?php  if(isset($_SESSION['Email'])) 
	   	{
			?><a href="<?=$frontpath?>/logout.php" class="a">Logout</a><span>|</span><a href="<?=$frontpath?>/myaccount.php" class="a">My Account</a>
            <?php 
			 echo "<p class='a'>".$_SESSION['Email']."</p>"; ?>  <?php  } 
		else { ?> <a href="<?=$frontpath?>/register.php" class="a">Create an Account</a><span>|</span><a href="<?=$frontpath?>/login.php" class="a">Login</a>  <?php  } ?>
        <?php  require_once('socialicon.php'); ?> 
          </div>
      <div class="bottom">
        <h3><?=$headertext?></h3>
        <a href="cart.php" title="Cart"><img src="<?=$frontpath?>/images/cart.png" alt="Cart" title="Cart" /></a>
        
        <p>Cart</p>
        <span><?=$header_cart_product?> item(s) - £<?php  echo $header_cart_total; ?></span> </div>
    </div>
  </div>
  <div class="search">
    <div class="s_left">
      <input type="text" name="search" value="Search...."  onfocus="if(this.value=='Search....') this.value='';"
                                onblur="if(this.value=='') this.value='Search....';"  />
      <a href="#" title="Search"><img src="<?=$frontpath?>/images/search_btn.jpg" alt="Search" title="Search" /></a> </div>
    <div class="s_right"> <img src="<?=$frontpath?>/images/menu2.png" alt="" title="" /> <a href="#" title="Favour Boxes">Favour Boxes<img src="<?=$frontpath?>/images/boxes.png" alt="" title="" class="img"/></a> <img src="<?=$frontpath?>/images/menu1.jpg" alt="" title="" /> <a href="#" title="Marriage Items" class="a1">Marriage Items<img src="<?=$frontpath?>/images/boxes_1.png" alt="" title="" class="img1"/></a> <img src="<?=$frontpath?>/images/menu1.jpg" alt="" title="" /> <a href="#" title="Mithai Boxes">Mithai Boxes<img src="<?=$frontpath?>/images/boxes_2.png" alt="" title="" class="img"/></a> <img src="<?=$frontpath?>/images/menu3.png" alt="" title="" /> </div>
  </div>
   <div class="content">
    <div class="menu">
    <ul>
    <?php 
			$hsql="select navigation.* from navigation inner join websetting on navigation.menuid=websetting.header_menu and navigation.parent=0 ";
			
			$hres=mysqli_query($dbLink,$hsql) or die ('Could Not Select Page');
			$cnt = 1;
			while($hdata=$hres->fetch_assoc())
				{ ?>
                <li>
					<a href="<?=$frontpath?>/<?=$hdata['slug']?>" title="<?=$hdata['title']; ?>"><?=$hdata['title']; ?></a><?php  if($cnt != mysqli_num_rows($hres)){?><span >|</span> <?php  } ?></li>
				  <?php  
					getTopNav($hdata['id'],$hdata['menuid'],$frontpath);
					?>  <?php  
					$cnt++;
				}
		  ?>
    
      </ul>
    </div>
    <div class="contactus"> <img src="<?=$frontpath?>/images/callus.png" alt="" title="" />
      <p>Call Us : </p>
      <span><?= $sphone?></span> </div>