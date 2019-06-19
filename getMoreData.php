<?php

include('db.php');

//sleep(3);

$offset = (isset($_REQUEST['offset']) && $_REQUEST['offset']!='') ? $_REQUEST['offset'] : '';

$limit = 8;

$qry1 = mysqli_query($dbLink,"select * from product where status = 1 limit ".$offset.", ".$limit."");

$i = ++$offset;

$k=0;

while($pdata =$qry1->fetch_assoc()){

	$k++;

	 ?>

   

   <div class="new <?php if($k%4 == 0){echo "last1"; }?> loadData" id="myData_<?php echo $i;?>" >

    <p><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>">

      <?=substr(html_entity_decode(stripslashes($pdata['ProductName'])),0,20)?>

      </a></p>

    <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>"><?php 
			if($pdata['ImageName']!="")
			{ ?>
            <img src="<?=$frontpath?>/ProductImage/<?=$pdata['ImageName']?>" height="103" width="181" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" />		<?php } else { ?> <img src="<?=$frontpath?>/images/noimg.jpg" height="103" width="181" alt="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" title="<?=html_entity_decode(stripslashes($pdata['ProductName']))?>" /> <?php } ?></a>

    <div class="new_detail">

      <p>

       <?php
			$d = substr(strip_tags(html_entity_decode(stripslashes($pdata['Description']))),0,120);
			echo $d ;?>

      </p>

      <p class="p1">Price Form   : </p>

      <span>£

      <?=$pdata['Price']?>

      </span> </div>

    <div class="add"> <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="Add to Cart"><img src="images/addtocart.png" alt="Add to Cart" title="Add to Cart" /></a> </div>

  </div>  

     

<!--<div class="tableRow loadData" id="myData_<?php echo $i;?>">

<div class="firstColumn"><?php echo $i; ?></div>

<div class="secondColumn"><?php echo $result['msg']?></div>

</div>-->

<?php $i++; } ?>