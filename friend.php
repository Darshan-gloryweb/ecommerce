<?php  require_once('db.php'); ?>
<?php require_once('include/function.php'); ?>
<?php require_once('include/start_session.php'); ?>
<?php $title = $mywebsitename; ?>
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
<?php include('validation.php'); ?>
</head>

<body>
<div class="wrapper">
  <div class="header">
    <div class="h_left"> <a href="<?=$frontpath?>" title="logo">  <?php if($logo!="") { ?>
     		<img src="<?=$frontpath?>/images/<?=$logo?>?<?php echo time(); ?>" alt="<?=$mywebsitename?>" title="<?=$mywebsitename?>" /> 
    	<?php }
		else
		{
			echo $mywebsitename; 
		}
		 ?></a> </div>
      
  </div>
  </div>
  <div class="wrapper">
   <div class="content" style="min-height:200px;">
<form name="send" id="send" action="tellafriendp.php" onsubmit="return tellfriend(this);" method="post">
<table cellpadding="5" cellspacing="5">
<tr><td colspan="2"><?=$_REQUEST['msg']?></td></tr>
<tr>
	<td><span class="lbl">Email Address : </span></td>
    <td>
    <input type="text" name="email" id="email" class="tellfrd" />
    </td>
</tr>
<tr>
<td><input type="submit" value="Send" name="send" class="sbmt" /></td>
<td></td>
</tr>
</table>
</form>
</div>
<div class="footer">
    <div class="f_left">
    	 <?php			
			$hsql="select navigation.* from navigation inner join websetting on navigation.menuid=websetting.footer_menu and navigation.parent=0 order by displayorder";
			$hres=mysqli_query($dbLink,$hsql) or die ('Could Not Select Page');
			$cnt=mysqli_num_rows($hres);
			$i=1;
			while($hdata=$hres->fetch_assoc())
				{ ?>
					<a href="<?=$frontpath?>/<?=$hdata['slug']?>" title="<?=$hdata['title']; ?>"><?=$hdata['title']?></a><?php if($i!=$cnt) { ?> <span>|</span> <?php } ?>
				  <?php 
					getFooterNav($hdata['id'],$hdata['menuid']);
					$i++;
				}
		  ?>
   
      <p><?=$footertitle?></p>
    </div>
    <div class="f_right">
      <p>Select Language</p>
      <a href="#" title=""><img src="<?=$frontpath?>/images/flag1.jpg" alt="" title="" /></a> <a href="#" title=""><img src="<?=$frontpath?>/images/flag2.jpg" alt="" title="" /></a> <a href="#" title=""><img src="<?=$frontpath?>/images/flag3.jpg" alt="" title="" /></a> <a href="#" title=""><img src="<?=$frontpath?>/images/flag4.jpg" alt="" title="" /></a> </div>
  </div>
  <?php require_once('reviewpopup.php'); ?>
</div>
<script src="<?=$frontpath?>/js/jquery.js"></script> 
<script src="<?=$frontpath?>/js/responsive-slider.js"></script> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
    <script>
$(function() {
$( "#accordion" ).accordion();
});
</script>
<script>
function Showtab()
{
 
  document.getElementById("first").style.display = "none";
  document.getElementById("second").style.display = "block";
 
  window.location.hash = '#review';
  Reviews.setAttribute("class", "selected");
  $("#Description").removeClass("selected");


  
  return false;
  
}
</script>
<div class="modal"></div>
</body>
</html>
