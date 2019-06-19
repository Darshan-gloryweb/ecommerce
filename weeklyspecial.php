	<div style="float:left;width:100%;">

 <div class="content_img">

<?php $psql = "select * from product where status = 1 and isweeklyspecial = 1 order by rand() limit 1";



	$pres=mysqli_query($dbLink,$psql) or die('could not select');



	  	while($pdata = $pres->fetch_assoc())



		{

?>

              <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php">  <img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>?<?=time()?>" alt="<?=$pdata['ProductName']?>" title="<?=$pdata['ProductName']?>" width="136" height="260" style="margin:0px 20px 0px 90px ;" /></a>

                 <div class="offer">

                	<img src="<?=$frontpath?>/images/weeklyspecial.png" alt="<?=$pdata['ProductName']?>" title="<?=$pdata['ProductName']?>" width="96" height="98" />

                </div>

                <div class="product_detail">

                	<p><?=$pdata['ProductName']?></p>

<span>Price: £ <?=$pdata['Price']?></span>

                </div>

<?php } ?>

                </div>