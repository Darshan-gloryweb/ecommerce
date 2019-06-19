<div class="content_left">
  <h3><a class="allcat" href="<?=$frontpath?>/allcategories.php" title="Product">Product</a></h3>
  <div class="p_content">
    <div id="accordion" style="float:left">
      <?php 
			$csql="select category.CategoryName,category.CategoryID from category inner join categorytype on category.CategoryTypeID = categorytype.id and categorytype.name = 'General' and category.parent = 0 and category.status = 1";
			$cres=mysqli_query($dbLink,$csql) or die("could not select categorys");
			if(mysqli_num_rows($cres) > 0)
			{
				while($sdata = $cres->fetch_assoc())
				{?>  
      <a style="position:relative" href="<?=$frontpath?>/category/<?=str_replace(' ','_',$sdata['CategoryName'])?>" title="<?=$sdata['CategoryName']?>" >
      <?=$sdata['CategoryName']?>
     <!-- <div style="display: block;position: absolute;top: 13px;left: 0px;z-index: 99999;width:138px;" onclick="window.location='<?=$frontpath?>/category/<?=str_replace(' ','_',$sdata['CategoryName'])?>'" title="<?=$sdata['CategoryName']?>">
      
       <?=$sdata['CategoryName']?>
     
      </div>-->
      </a>
      <div>
        <ul>
          <?php 
		$csql1="select ProductName from product where CategoryID = ".$sdata['CategoryID']." and status = 1";
			$cres1=mysqli_query($dbLink,$csql1) or die("could not select category");
			if(mysqli_num_rows($cres1) > 0)
			{
            while($sdata1 = $cres1->fetch_assoc())
				{?>
          <li><a href="<?=$frontpath?>/products/<?=str_replace(' ','_',$sdata1['ProductName'])?>.php" title="<?=$sdata1['ProductName']?>">
            <?=$sdata1['ProductName']?>
            </a></li>
          <?php
				}
			}?>
        </ul>
      </div>
      <?php
				}
			}
			?>
    </div>
  </div>
  <div class="tell" onclick="viewpop()">
    <p>Click Here</p>
    <a  title="Tell a Friend">Tell a Friend</a> </div>
</div>
