<?php 
	include('db.php');
	session_start();
	if(isset($_POST['itemperpage']))
	{
	//$item_per_page = $_POST['itemperpage'];
	//$category = $_POST['category'];
	$sorttype = $_POST['sorttype'];
	$stype = $_POST['stype'];
	$_SESSION['item_per_page1'] = $sorttype;
	$_SESSION['sorttype'] = $stype;
	}
	if(isset($_POST['page']))
	{
		$_SESSION['perpage'] = $_POST['page'];
	}
	if(isset($_POST['perpage']))
	{
		$_SESSION['item_per_page'] = $_POST['perpage'];
		$_SESSION['perpage'] = 0;
	}
	if(isset($_POST['min']) && isset($_POST['max']))
	{
		$_SESSION['MaxPrice'] = $_POST['max'];
		$_SESSION['MinPrice'] = $_POST['min'];
	}
  	/*$psql = "select * from product where CategoryID = ".$category." order by ".$_SESSION['item_per_page1']." limit ".$_SESSION['item_per_page'];
	//echo $_SESSION['item_per_page'].'<br>';
	//echo $_SESSION['item_per_page1'].'<br>';
	//echo $psql;
	$pres=mysqli_query($dbLink,$psql) or die('could not select');
	
  ?>
    <?php
  if(mysqli_num_rows($pres)>0)
  {
	  $i = 0;
	  	while($pdata = mysql_fetch_array($pres))
		{
        	$i++;
			?>
  <div class="new  new_product <?php if($i%4 == 0){echo "last1"; }?>" >
    <p><a href="<?=$frontpath?>/product/<?=str_replace(' ','_',$pdata['ProductName'])?>.php"><?=$pdata['ProductName']?></a></p>
    <a href="<?=$frontpath?>/product/<?=str_replace(' ','_',$pdata['ProductName'])?>.php"><img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="103" width="181" alt="" title="" /></a>
    <div class="new_detail">
      <p><?=substr(html_entity_decode(stripslashes($pdata['Description'])),0,100).'...'?></p>
      <p class="p1">Sale Price   : </p>
      <span>£<?=$pdata['SalePrice']?></span> </div>
  
  </div>
  <?php
		}
  }*/
  ?>