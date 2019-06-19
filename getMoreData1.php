<?php
include('db.php');
session_start();
//sleep(3);
$offset = (isset($_REQUEST['offset']) && $_REQUEST['offset']!='') ? $_REQUEST['offset'] : '';
$cid = $_REQUEST['cid'];
$limit = 8;

				//$pagination = "select ProductID from product where CategoryID = ".$cid." and Status=1";
				//$pagination_res = mysqli_query($dbLink,$pagination) or die ('Could Not Select Per Page');				
				//$ids='0';
				//while($pagiantion_data = mysql_fetch_assoc($pagination_res))
				//{
					//$ids=$ids.','.$pagiantion_data['ProductID'];
				//}

$psql = "select * from product where CategoryID=".$cid." order by ".$_SESSION['item_per_page1']." ".$_SESSION['sorttype']." limit ".$offset.", ".$limit;
$qry1 = mysqli_query($dbLink,$psql);
$i = ++$offset;
$k=0;
while($pdata = $qry1->fetch_assoc()){
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
       </div>
    <div class="add"> <a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$pdata['ProductName'])?>.php" title="Price From : £ <?=$pdata['Price']?>">Price From : £ <?=$pdata['Price']?></a> </div>
  </div>  
     
<!--<div class="tableRow loadData" id="myData_<?php echo $i;?>">
<div class="firstColumn"><?php echo $i; ?></div>
<div class="secondColumn"><?php echo $result['msg']?></div>
</div>-->
<?php $i++; } ?>