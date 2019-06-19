<div class="content_left1">
  <h3><a class="allcat" href="<?=$frontpath?>/allcategories.php" title="Product">Product</a></h3>
  <div class="p_content">
    <div id="accordion" style="float:left">
      <?php 
			$csql="select CategoryName,CategoryID from category where parent = 0 and status = 1";
			$cres=mysqli_query($dbLink,$csql) or die("could not select categorys");
			if(mysqli_num_rows($cres) > 0)
			{
				$active_menu=0;
				$i=0;
				while($sdata = $cres->fetch_assoc())
				{
					if($sdata['CategoryName']==$row['CategoryName']) { $active_menu=$i; } else { $i++;}
					
					?>
                
      <a style="position:relative" href="<?=$frontpath?>/category/<?=str_replace(' ','_',$row['CategoryName'])?>" title="<?=$sdata['CategoryName']?>" >
      <?=$sdata['CategoryName']?>
      <div style="display: block;position: absolute;top: 13px;left: 0px;z-index: 99999; width:138px;" onclick="window.location='<?=$frontpath?>/category/<?=str_replace(' ','_',$sdata['CategoryName'])?>'" title="<?=$sdata['CategoryName']?>">
      
       <?=$sdata['CategoryName']?>     
      </div>
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
 
<form name="frm" method="post" id="frm">   
<p>
  <label for="amount" style="display: inline-block;font-size: 15px;margin: 10px 0px 20px 0px;">Price range:</label>
  <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;display: inline-block;margin: 10px 0px;"> 
  <input type="hidden" id="min" value="" />
  <input type="hidden" id="max" value="" />
</p> 
<div id="slider-range"></div>
<input type="button" value="Search" onclick="priceSlider()" style="display: inline-block;padding: 5px;margin: 10px 0px 0px;" />  
</form>  
<div class="tell" onclick="viewpop()">
    <p>Click Here</p>
    <a  title="Tell a Friend">Tell a Friend</a> </div>
</div>
 
  
