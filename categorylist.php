<?php  require_once('db.php'); ?>
<?php $title = $mywebsitename; ?>
<?php require_once('header-inner.php');?>

<!--<link href="<?php echo $frontpath; ?>/css/styles.css" rel="stylesheet">-->
<script src="<?php echo $frontpath; ?>/js/category_list_custom.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/js/custom.js"></script>
<?php 

    



if($_GET['url'])

{

$url=$_GET['url'];




if(strpos($url,'/') !== false){
	$url = explode('/',$url);
	$url = $url[1];
}

$url=str_replace('-',' ',$url);

if (strpos($url,' and') !== false) { //first we check if the url contains the string 'en-us'
	$url = str_replace('and', '&', $url); //if yes, we simply replace it with en
}



$ssql="select * from category where CategoryName='$url'";



$sql=mysqli_query($dbLink,$ssql);

$row=$sql->fetch_assoc();

$catg_id=$row['CategoryID'];


    $sqlcat = "select * from category where CategoryID = ".$catg_id."";

	$rescat = mysqli_query($dbLink,$sqlcat) or die("can not select   Category");   

    $datacat = $rescat->fetch_assoc();





    $sqlsubcat = "select count(*) as total from category where parent = ".$datacat['parent']."";

	$ressubcat = mysqli_query($dbLink,$sqlsubcat) or die("can not select  sub Category");

	$datasubcat = $ressubcat->fetch_assoc();
	
	
	
	
	/******/
	
	function getchildcat($dbLink,$parent){

	$sqlrcat = "select * from category where parent =".$parent;
	$resrcat = mysqli_query($dbLink,$sqlrcat) or die("Error : ".mysqli_error());
  $datarcat=$resrcat->fetch_assoc();
	//	while($datarcat=$resrcat->fetch_assoc()){
			
			return $datarcat['CategoryID'];
		//}
	}
	
	/******/

  ?>
<?php 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$urlpath =  parse_url($url, PHP_URL_PATH);

$brandname = explode('brand-',$urlpath);



$brandname = str_replace("-"," ",$brandname[1]);
if (strpos($brandname,'&') !== false) 
{ 
	$brandname = str_replace('and', '&', $brandname);
}

//print_r($priceval1);


$sqlbrandid = "select brandid from brand where brandname='".$brandname."'";
$resbrandid = mysqli_query($dbLink,$sqlbrandid)or die("Error : ".mysqli_error());
$databrandid=$resbrandid->fetch_assoc();

$getbrandid = $databrandid['brandid'];

$priceval = explode('price-',$urlpath);
$priceval1 = explode("-",$priceval[1]);



if($row['parent'] == 0 ){?>

<input type="hidden" value="<?php echo $row['CategoryID'];?>" name="categoryid" />
<?php }else{?>
<input type="hidden" value="<?php echo $row['parent'];?>" name="categoryid" />
<?php }?>
<input type="hidden" data-min-value="<?=$priceval1[0]?>" data-max-value="<?=$priceval1[1]?>" name="priceval">
<input type="hidden" value="<?php echo $getbrandid;?> " name="brandid" class="brand" />
<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet>
  <category class="ng-star-inserted">
    <loader _nghost-c10=""> </loader>
    <div class="container-fluid pad-t-15 hidden-xs-down pad-lr-30">
      <div class="row">
        <div class="col-sm-12 no-padding"> </div>
      </div>
    </div>
    <div class="container-fluid category pad-lr-30 pad-b-15 pad-t-xs-15 pad-lr-xs-15">
      <div class="row">
        <div class="col-md-2 no-padding cat_filter_wrap pad-r-10">
          <div class="container-fluid bg-white prod_filter hp-100">
            <filter _nghost-c11="">
              <div _ngcontent-c11="" class="row enabled-filter ng-star-inserted">
                <div _ngcontent-c6="" class="col-sm-12 border-b pad-tb-5 pad-lr-md-5 ng-star-inserted filter-attribute-div">
                  <h4 _ngcontent-c6="" class="f-size-15 pad-tb-10 pad-l-5 enabled_heading text-500 no-margin clear-btn"> FILTER <span _ngcontent-c6="" class="clear-active clear-span">
                    <button class="clear-div filter-clear">CLEAR ALL</button>
                    </span> </h4>
                  <div _ngcontent-c6="" class="ng-star-inserted filter-value_div filter-price-tag"> </div>
                </div>
                
                <!--random category list start-->
                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                  <h4 _ngcontent-c11="" class="sidebar-category f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo0">category</h4>
                  <ul _ngcontent-c11="" class="no-padding no-list-style no-margin pad-t-10 pad-l-5 collapse max-200 minus in ng-star-inserted" id="demo0">
                    <?php 
							 $sqlcatlist = "select * from category where parent = 0 ORDER BY RAND() LIMIT 5";
							$rescatlist = mysqli_query($dbLink,$sqlcatlist);
							if(mysqli_num_rows($rescatlist)>0){
								while($datacatlist=$rescatlist->fetch_assoc()){?>
                    <?php 

               		$cname = strtolower(str_replace(" ","-",$datacatlist['CategoryName']));
					if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
						$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
					}
				 	//$rr = strtolower(str_replace("&","and",$cname));
					
               ?>
                    <li _ngcontent-c11="" class="ng-star-inserted">
                      <label _ngcontent-c11=""> <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one0"></i> <span _ngcontent-c11="" class="inline-block pad-l-5"> <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13 cat_filter_link" title="<?php echo $datacatlist['CategoryName'];?>" href="<?php echo $frontpath;?>/category/<?=$cname?>"> <?php echo $datacatlist['CategoryName'];?> </a> </span> </label>
                    </li>
                    <?php  }
							}
						?>
                  </ul>
                  <div _ngcontent-c11="" class="collapse category in" id="demo0"> </div>
                </div>
                <!--random category list end--> 
                
                <!--price list filter start-->
                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                  <h4 _ngcontent-c11="" class="sidebar-price f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo1">price</h4>
                  <div _ngcontent-c11="" class="collapse price in" id="demo1">
                    <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="0" data-max-value="100" id="qwwqwqw-<?php echo '0-100';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 0 - <i class="fa fa-inr"></i> 100</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="101" data-max-value="500" id="qwwqwqw-<?php echo '101-500';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 101 - <i class="fa fa-inr"></i> 500</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="501" data-max-value="1000" id="qwwqwqw-<?php echo '501-1000';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 501 - <i class="fa fa-inr"></i> 1000</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="1001" data-max-value="5000" id="qwwqwqw-<?php echo '1001-5000';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 1001 - <i class="fa fa-inr"></i> 5000</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="5001" data-max-value="10000" id="qwwqwqw-<?php echo '5001-10000';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 5001 - <i class="fa fa-inr"></i> 10000</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted price-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sprice" name="filter" type="checkbox" data-min-value="10001" data-max-value="" id="qwwqwqw-<?php echo '10001';?>">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 10001 - *</div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--price list filter end--> 
                
                <!--brand list filter start-->
                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                  <h4 _ngcontent-c11="" class="sidebar-brand f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo2">brand</h4>
                  <div _ngcontent-c11="" class="collapse brand in" id="demo2">
                    <input _ngcontent-c11="" class="form-control border mar-t-15 f-size-13 ng-star-inserted" filtersearchbox="" placeholder="Search brand" style="text-transform: capitalize;" type="text">
                    <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                      <?php  

if($row['parent'] == 0 ){
	$parentcatid = $catg_id;
}else{
	$parentcatid = $row['parent'];
}


$sqlbr = "select DISTINCT(brand .brandid),brand.brandname as brandname, COUNT(product.ProductID)as procount from brand INNER join product on product.brandid = brand.brandid and product.CategoryID IN (select CategoryID from category where parent = ".$parentcatid." ) GROUP BY product.brandid ORDER BY brand.brandname ";
 $resbr = mysqli_query($dbLink,$sqlbr)or die("Error : ".mysqli_error());
 while ( $databr=$resbr->fetch_assoc() ) { ?>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted brand-filter" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter brand " name="filter" type="checkbox" value="<?php echo $databr['brandid']; ?>" id="aaqwqw-<?=$databr['brandid']?>" >
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"> <?php echo $databr['brandname'];
                   ?> <span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(
                          <?php   echo $databr['procount'];?>
                          )</span> </div>
                      </li>
                      <?php }?>
                    </ul>
                  </div>
                </div>
                <!--brand list filter end--> 
                
                <!--discount list filter start-->
                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                  <h4 _ngcontent-c11="" class="sidebar-discount f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin" data-toggle="collapse" data-target="#demo3">discount</h4>
                  <div _ngcontent-c11="" class="collapse discount out" id="demo3">
                    <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="0" data-max-value="10">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">0 - 10</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="11" data-max-value="20">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">11 - 20</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="21" data-max-value="30">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">21 - 30</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="31" data-max-value="40">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">31 - 40</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="41" data-max-value="50">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">41 - 50</div>
                      </li>
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter sdiscount" name="filter" type="checkbox" data-min-value="51" data-max-value="">
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">51 - *</div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--discount list filter end--> 
                
                <!--availability list filter start-->
                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                  <h4 _ngcontent-c11="" class="sidebar-availability f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin" data-toggle="collapse" data-target="#demo4">availability</h4>
                  <div _ngcontent-c11="" class="collapse availability out" id="demo4">
                    <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                      <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter stock" name="filter" type="checkbox" value="1" >
                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> </label>
                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">Show in stock only</div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!--availability list filter end--> 
                
                <?php
						
function categoryChild($id) {
global $dbLink;
$s = "SELECT * FROM category WHERE parent = $id";
$r = mysqli_query($dbLink, $s);

$children = array();

if(mysqli_num_rows($r) > 0) {
# It has children, let's get them.
	while($row = mysqli_fetch_array($r)) {
		# Add the child to the list of children, and get its subchildren
		$children[$row['CategoryID']] = categoryChild($row['CategoryID']);
	}
	
}

return $children;
}

$tt = categoryChild($parentcatid);

function array_keys_multi(array $array)
{
    $keys = array();
    foreach ($array as $key => $value) {
        $keys[] = $key;
        if (is_array($array[$key])) {
            $keys = array_merge($keys, array_keys_multi($array[$key]));
        }
    }
    return $keys;
}
$tt1= array_keys_multi($tt);

$imploded_cat_id = implode(',', array_values($tt1));
						
						
						/*******/
						
						$sqlattr = "select DISTINCT(attributes.id),attributes.Name as attributesname from attributes INNER join product on product.attr_pro = attributes.id and product.CategoryID IN (select CategoryID from category where parent in( ".$imploded_cat_id." ) or parent in (".$parentcatid.") ) GROUP BY product.attr_pro ORDER BY attributes.Name";
                	 //$sqlattr = "select * from attributes 
//								INNER JOIN  product ON product.attr_pro = attributes.id
//								and product.CategoryID IN (select CategoryID from category where parent = ".$parentcatid." )
//								";
						 $resattr = mysqli_query($dbLink,$sqlattr)or die("Error : ".mysqli_error());
						 $i=5;
						 while ( $dataattr=$resattr->fetch_assoc() ) { ?>
						 	
							<div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
        			<h4 _ngcontent-c11="" class="f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo<?php echo $i;?>" aria-expanded="true"><?php echo $dataattr['attributesname']; ?></h4>
        
        			<div _ngcontent-c11="" class="colour out collapse in" id="demo5" aria-expanded="true" style="">
                        <input _ngcontent-c11="" class="form-control border mar-t-15 f-size-13 ng-star-inserted" filtersearchbox="" placeholder="Search <?php echo $dataattr['attributesname']; ?>" style="text-transform: capitalize;" type="text">
                        <ul _ngcontent-c11="" class="no-padding no-list-style no-margin o-hidden max-200 ng-star-inserted" style="margin-top:15px !important;">
                                     
						<?php 
							$sqlattrvar = "select * from attributes_variation where  attr_id = ".$dataattr['id']."";
							$resattrvar = mysqli_query($dbLink,$sqlattrvar);
							if(mysqli_num_rows($resattrvar) > 0) {
								while ( $dataattrvar=$resattrvar->fetch_assoc() ) {?>
									<li _ngcontent-c11="" class="clearfix ng-star-inserted brand-filter" style="padding: 2px 0px;">
                                        <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                          <input _ngcontent-c11="" class="inline-block pad-r-10 item_filter attr_var " name="filter" type="checkbox" value="<?php echo $dataattrvar['id']; ?>" id="aaqwqw123-<?=$dataattrvar['id']?>" >
                                          <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span> 
                                         </label>
                                        <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"> <?php echo $dataattrvar['variation_name'];
                                   ?> </div>
                                  </li>	
									
							<?php }
							}
						?>
                           
                      
                                         
                            
                        </ul>
                    </div>
    			</div>
						
						<?php  $i++; }
				
				?>
                
                
                
                
              </div>
            </filter>
          </div>
        </div>
        <?php 
		
		
		
                                                            
        $sqlselectparentcat = "select CategoryName from category where CategoryID=".$row['parent'];
		$resselctparentcat = mysqli_query($dbLink,$sqlselectparentcat);
		$rowselctparentcat=$resselctparentcat->fetch_assoc();
		$PCategoryName=$rowselctparentcat['CategoryName'];
		
		                                                        
	$cname = strtolower(str_replace(" ","-",$row['CategoryName']));
if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
	$cname = str_replace('&', 'and', $cname); 
}
	$cbname = strtolower(str_replace(" ","-",$datasubcat['CategoryName']));
if (strpos($cbname,'&') !== false) { //first we check if the url contains the string 'en-us'
	$cbname = str_replace('&', 'and', $cbname); //if yes, we simply replace it with en
}
$cpname = strtolower(str_replace(" ","-",$PCategoryName));
if (strpos($cpname,'&') !== false) { //first we check if the url contains the string 'en-us'
	$cpname = str_replace('&', 'and', $cpname); 
}
?>
        <div class="col-md-10 bg-white pad-b-20 product_wrap mar-lr-xs--15">
          <div class="pad-t-5 o-hidden">
            <breadcrump _nghost-c12="">
              <ul _ngcontent-c12="" class="bread-head no-margin hidden-sm-down">
                <li _ngcontent-c12="" class="f-size-12" tabindex="0"> <a href="<?php echo $frontpath;?>">Home</a> </li>
                <?php 
                                            if(strpos($_GET['url'],'/') !== false){
                                                $url = explode('/',$_GET['url']);
                                                
												$url=str_replace('-',' ',$url[0]);

												if (strpos($url,'and') !== false) { //first we check if the url contains the string 'en-us'
													$url = str_replace('and', '&', $url); //if yes, we simply replace it with en
												}
												
												$ssql="select * from category where CategoryName='$url'";
												$sql=mysqli_query($dbLink,$ssql);
												$row=$sql->fetch_assoc();
												$catg_name=$row['CategoryName'];
																							
												echo '<li _ngcontent-c12="" class="item f-size-12 ng-star-inserted"><a href="'.$frontpath.'/category/'.$cpname.'">';
												echo $catg_name;
												echo '</a></li>';
												
                                            }?>
                <li _ngcontent-c12="" class="item f-size-12 ng-star-inserted"> <?php echo $datacat['CategoryName'];?> </li>
              </ul>
            </breadcrump>
          </div>
          <div class="container-fluid no-pad-xs pad-t-15 subcat-list-div">
            <div class="pad-lr-35 mar-lr--30 mar-lr-xs--15 mar-t--15 mar-b--10 ng-star-inserted" style="background: #f3f7f8;">
              <h1 class="f-size-20 f-size-xs-16 text-400 pad-t-15 pad-t-xs-15 ng-star-inserted"> <?php echo $datacat['CategoryName'];?>
                <?php /*?><span class="text-grey f-size-14 f-size-xs-13 text-400 pad-l-5 ng-star-inserted">( <?php echo $datasubcat['total'];?> Categories )</span>
                                <?php */?>
              </h1>
              <sub-category class="ng-tns-c8-1">
                <div class="row sub-product ng-tns-c8-1 ng-star-inserted" id="subcCategoryTop">
                  <?php 
                                                    $sqlsubcat = "select * from category where parent = ".$catg_id."";
                                                    $ressubcat = mysqli_query($dbLink,$sqlsubcat) or die("can not select  sub Category");
                                                    while($datasubcat=$ressubcat->fetch_assoc()){?>
                  <?php //echo $datasubcat['CategoryID'];?>
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mar-t-10 pad-lr-10 wp-xs-50 pad-lr-xs-5 hidden-sm-down ng-tns-c8-1 ng-trigger ng-trigger-fade ng-star-inserted parent_cat_div sub_category_Div">
                    <?php 
									$cbname = strtolower(str_replace(" ","-",$datasubcat['CategoryName']));
if (strpos($cbname,'&') !== false) { //first we check if the url contains the string 'en-us'
	$cbname = str_replace('&', 'and', $cbname); //if yes, we simply replace it with en
}
?>
                    <div class="prod_block">
                      <div class="prod_image bg-white"> <a class="pointer-none" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>"> <img class="img-fluid pointer" src="<?=$frontpath?>/CategoryIcon/<?php echo $datasubcat['CategoryImage'];?>" alt="<?php echo $datasubcat['CategoryName'];?>"> </a> </div>
                      <div class="prod_name text-center pad-lr-15 pad-tb-15 pad-lr-xs-0 pad-b-xs-5"> <a class="ng-tns-c8-1" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cbname?>">
                        <h3 class="f-size-12 text-black text-400 lh-16"> <?php echo $datasubcat['CategoryName'];?> </h3>
                        </a> </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
                <div class="row ng-tns-c8-1 ng-star-inserted mar-b-10 mar-t-5">
                  <div class="col-sm-12 mar-b-20 hidden-sm-down text-center ng-tns-c8-1 ng-star-inserted"> <a href="#" id="loadMore" class="f-size-11 text-white b-text w-200" style="background: #313131 !important; padding:10px;">Show More</a></div>
                  
                  <!--
<div class="col-sm-12 mar-b-20 hidden-sm-up text-center ng-tns-c8-1 ng-star-inserted"><a href="#" id="loadMore" class="f-size-11 text-white b-text w-200" style="background: #313131 !important;">Show More</a>

</div>
--> 
                  
                </div>
                <style>
                                    .sub_category_Div {
                                        display: none;
                                    }

                                </style>
              </sub-category>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="o-hidden border-b prod_nav hidden-sm-down pad-t-20">
            <h1 class="f-left no-padding list-head-txt"> <span class="f-size-18  pad-t-5 pad-lr-5 b-text text-400 inline-block f-left"> <?php echo $datacat['CategoryName'];?> </span> </h1>
            <div class="f-right no-padding text-right sort_wap ng-star-inserted">
              <sort-by class="block f-right">
                <ul class="f-left inline_list no-margin no-padding hidden-md-down" id="shorting-pagi">
                  <li class="text-500 ddd" data-value="sort">SORT BY</li>
                  <li class="text-uppercase f-size-13 popularity item_filter ddd active " data-value="pop">Popularity</li>
                  <li class="text-uppercase f-size-13 lowest_price ddd item_filter" value="<?php echo $catg_id;?>" data-value="low">Low Price</li>
                  <li class="text-uppercase f-size-13 height_price ddd item_filter" value="<?php echo $catg_id;?>" data-value="heigh">High Price</li>
                </ul>
                <select class="pad-tb-5 f-size-13 bg-trans no-border center-block hidden-lg-up block">
                  <option class="text-500">SORT BY</option>
                  <option class="text-uppercase f-size-13" value="popularity">Popularity</option>
                  <option class="text-uppercase f-size-13" value="lowPrice">Low Price</option>
                  <option class=" text-uppercase f-size-13" value="highPrice">High Price</option>
                </select>
              </sort-by>
            </div>
          </div>
          <product-list class="block mar-t-10 ng-tns-c16-5">
            <div class="row prod_list ng-tns-c16-5 ng-star-inserted" lazy-load-images="" id="product_list">
              <div id="target-content"><img src="http://glorywebsdev.com/ecommerce/images/colorful-loader-gif-transparent-1.gif" id="loder_img" height="100" width="100" /></div>
            </div>
          </product-list>
          <?php
//$limit = 5;
//$zz = 0;
//$aa = "select COUNT(ProductID)as procount from product WHERE  CategoryID IN (select CategoryID from category where parent = ".$catg_id." )";
//$resaa = mysqli_query($dbLink,$aa);
//if(mysqli_num_rows($resaa)>0){
//	$dataaa=$resaa->fetch_assoc();
//}
//$total_records =$dataaa['procount'];  
//$total_pages = ceil($total_records / $limit);
?>
          <div class="o-hidden border-t border-b pad-tb-10 prod_nav mar-t-30 ng-star-inserted paginationhtml"> </div>
        </div>
      </div>
    </div>
  </category>
</div>
<div class="footer-cat visible-xs wp-100 border-light-bottom o-hidden nav-up" style="position: fixed; bottom: -10px; z-index: 9;left:0px; width: 100%; box-shadow:1px 1px 8px #cecece;">
  <button class="text-white wp-50 h-65 text-500 bg-white f-size-16 no-border btn-trans f-left filter_btn  text-black" type="button"><i aria-hidden="true" class="fa fa-filter" style="padding-right: 5px;"></i> FILTER
  <p class="pad-tb-5 f-size-13" style="text-transform: capitalize !important;">Select</p>
  </button>
  <button class="text-white wp-50 h-65 text-500 f-size-16 border-light-r no-border bg-white f-left text-black ng-star-inserted" type="button">
  <i aria-hidden="true" class="fa fa-sort" style="padding-right:5px;"></i> SORT BY
  <sort-by>
    <ul class="f-left inline_list no-margin no-padding hidden-md-down">
      <li class="text-500">SORT BY</li>
      <li class="text-uppercase f-size-13 active">Popularity</li>
      <li class="text-uppercase f-size-13">Low Price</li>
      <li class="text-uppercase f-size-13">High Price</li>
    </ul>
    <select class="pad-tb-5 f-size-13 bg-trans no-border center-block hidden-lg-up block">
      <option class="text-500">SORT BY</option>
      <option class="text-uppercase f-size-13" value="popularity">Popularity</option>
      <option class="text-uppercase f-size-13" value="lowPrice">Low Price</option>
      <option class=" text-uppercase f-size-13" value="highPrice">High Price</option>
    </select>
  </sort-by>
  </button>
</div>
<div _ngcontent-c11="" class="row bg-white resmob_filter up5 ng-star-inserted upTrans1" id="mob_filter" style="box-shadow: 1px 1px 8px #cecece; position: fixed; top: 150px; left: 15px; width: 100%; height: 110%; z-index: 100;">
  <div _ngcontent-c11="" class="wp-100 border-light-bottom o-hidden">
    <div _ngcontent-c11="" class="h-60 border-light-r pad-t-20 pad-lr-15 inline-block"> <i _ngcontent-c11="" class="fa fa-chevron-left back-arrow f-size-22 h-20 pointer inline-block"></i> </div>
    <button _ngcontent-c11="" class="text-white wp-30 h-40 text-500 f-size-13 mar-t-10 mar-lr-5 no-border btn-red f-right wp-xs-47" style="width: 47% !important; border-radius: 0 !important;" type="button">APPLY</button>
    <button _ngcontent-c11="" class="text-white wp-30 h-40 text-500 text-darkblue mar-t-10 f-size-13 mar-lr-5 no-border btn-trans f-right wp-xs-47" style="width: 30% !important; background: transparent !important; color: black !important; " type="button"> <span _ngcontent-c11="">RESET</span> </button>
  </div>
  <div _ngcontent-c11="" class="row row-eq-height mobile_filter" style="display: flex !important; height: 84%; overflow: auto;">
    <div _ngcontent-c11="" class="wp-40 f-left filt_left bg-white" style="justify-content: space-between; overflow: auto;">
      <ul _ngcontent-c11="" class="no-list-style no-padding no-margin cat_lists">
        
        <li _ngcontent-c11="" class="pad-tb-10 active ng-star-inserted">
        <a href="#details1" data-toggle="tab"><span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">category</span></a> </li>
        <li _ngcontent-c11="" class="pad-tb-10 ng-star-inserted">
        <a href="#details2" data-toggle="tab"><span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">price</span></a></li>
        <li _ngcontent-c11="" class="pad-tb-10 ng-star-inserted">
      <a href="#details3" data-toggle="tab"><span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">brand</span></a> </li>
        <li _ngcontent-c11="" class="pad-tb-10 ng-star-inserted"> <span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">discount</span> </li>
        <li _ngcontent-c11="" class="pad-tb-10 ng-star-inserted"> <span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">items in pack</span> </li>
        <li _ngcontent-c11="" class="pad-tb-10 ng-star-inserted"> <span _ngcontent-c11="" class="inline-block pad-l-5 pointer f-size-13 checkbox text-400" style="text-transform: capitalize; font-size: 13px !important;">availability</span> </li>
      </ul>
    </div>
    <div _ngcontent-c11="" class="wp-60 f-left no-padding bg-grey relative filt_right" style="justify-content: space-between;"> 
      
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted tab-content" id="details1"> 
        <span _ngcontent-c11="" class="ng-star-inserted"> 
        
        <div _ngcontent-c11="" class="ng-star-inserted">
          <label _ngcontent-c11=""> <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow" data-toggle="collapse" data-target="#lev_one0"></i> <span _ngcontent-c11="" class="inline-block" style="font-size:13px !important; font-weight: bold !important;"> <a _ngcontent-c11="" class="text-500 text-semiblack" style="font-weight: bold;" href="/lighting-luminaries/212000000">LED &amp; Lighting</a> </span> </label>
          
          
          <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one0">
            
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two0"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/211200000">LED</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two0">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/safety-and-security/led-headlamps/211201300">LED Headlamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-modules/211201400">LED Modules</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-string-lights/211201600">LED String Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-strip-lights/211201700">LED Strip Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/flood-lights/211201900">LED Flood Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-street-lights/211202000">LED Street Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-bay-lights/211202100">LED Bay Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-garden-lights/211202200">LED Garden Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-foot-lights/211202600">LED Foot Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-flashlights-torches/211202700">LED Flashlights &amp; Torches</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-spot-lights/211207000">LED Spot Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-bulbs/211207100">LED Bulbs</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-panel-lights/211207200">LED Panel Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-downlights/211207300">LED Downlights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/batten-light/211207400">LED Batten Lights</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two1"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/211207500">Lamps</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two1">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/floor-lamps/211207511">Floor Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/pendant-lamps/211207512">Pendant Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/lamp-shades/211207514">Lamp Shades</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/night-lights/211207536">Night Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/desk-lamps/211207537">Study Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/table-lamps/211207538">Table Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/indoor-wall-lamps/211331100">Indoor Wall Lamps</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two2"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting/211220000">Lighting</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two2">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting/incandescent-bulbs-tubes/211221100">Incandescent Bulbs &amp; Tubes</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                 
                <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/other-lights-lighting-products/211260000">Other Lights &amp; Lighting Products</a> </label>
               
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two4"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/211280000">Ceiling &amp; Wall Lights</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two4">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/batten-light/211207400">LED Batten Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/downlights/211208000">Downlights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/modular-luminaires/211208100">Modular Luminaires</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/tube-lights/211281100">Tube Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/spot-lights/211281200">Spot Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/ceiling-wall-lights/panel-lights/211281300">Panel Lights</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two5"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/outdoor-lighting/211290000">Outdoor Lighting</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two5">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/flood-lights/211201900">LED Flood Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-foot-lights/211202600">LED Foot Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/outdoor-lighting/flood-lights/211291100">Flood Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/outdoor-lighting/street-lights/211291300">Street Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/outdoor-lighting/garden-lights/211291400">Garden Lights</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two6"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting-accessories/211300000">Lighting Accessories</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two6">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting-accessories/ballasts-chokes-starters/211201800">Ballasts, Chokes &amp; Starters</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting-accessories/led-power-supply/211301200">LED Power Supply</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lighting-accessories/fixtures-holders/211301400">Fixtures &amp; Holders</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two7"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/light-bulbs/211310000">Light Bulbs</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two7">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-bulbs/211207100">LED Bulbs</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/light-bulbs/compact-fluorescent-lamps-cfl/211227600">Compact Fluorescent Lamps (CFL)</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/light-bulbs/halogen-bulbs/211311200">Halogen Bulbs</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two8"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/portable-lighting/211320000">Portable Lighting</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two8">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-flashlights-torches/211202700">LED Flashlights &amp; Torches</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/portable-lighting/flashlights-torches/211321100">Flashlights &amp; Torches</a></label>
                   
                </li>
              </ul>
            </li>
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow ng-star-inserted" data-toggle="collapse" data-target="#lev_two9"></i> <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/decorative-lights/211321000">Decorative Lights</a> </label>
              
              <ul _ngcontent-c11="" class="collapse no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two9">
                
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-string-lights/211201600">LED String Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/led/led-strip-lights/211201700">LED Strip Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/floor-lamps/211207511">Floor Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/pendant-lamps/211207512">Pendant Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/night-lights/211207536">Night Lights</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/desk-lamps/211207537">Study Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/table-lamps/211207538">Table Lamps</a></label>
                   
                </li>
                <li _ngcontent-c11="" class="ng-star-inserted">
                  <label _ngcontent-c11="">  <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/lighting-luminaries/lamps/indoor-wall-lamps/211331100">Indoor Wall Lamps</a></label>
                   
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div _ngcontent-c11="" class="ng-star-inserted">
          <label _ngcontent-c11=""> <i _ngcontent-c11="" aria-hidden="true" class="f-size-10 f-left pointer pad-r-5 fa fa-angle-right right-arrow" data-toggle="collapse" data-target="#lev_one1"></i> <span _ngcontent-c11="" class="inline-block" style="font-size: 13px !important; font-weight: bold !important; "> <a _ngcontent-c11="" class="text-500 text-semiblack" style="font-weight: bold;" href="/safety-and-security/116000000">Safety</a> </span> </label>
          
          
          <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one1">
            
            <li _ngcontent-c11="" class="ng-star-inserted">
              <label _ngcontent-c11=""> 
                 
                <a _ngcontent-c11="" class="text-400 text-semiblack" style="font-size: 13px !important;" href="/safety-and-security/led-headlamps/211201300">LED Headlamps</a> </label>
               
            </li>
          </ul>
        </div>
        </span> 
        
         
      </div>
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted tab-content" id="details2"> 
        <span _ngcontent-c10="" class="ng-star-inserted">
                  
                    
                <ul _ngcontent-c10="" class="no-padding no-list-style">
                    <li _ngcontent-c10="" class="o-hidden ng-star-inserted" style="padding:4px 0 !important; border:none !important;">
                        <label _ngcontent-c10="" class="f-left filter-check mar-r-5">
                        <input _ngcontent-c10="" class="inline-block pad-r-10" name="filter" type="checkbox">
                        <span _ngcontent-c10="" class="inline-block pointer f-ock -13 icon-font text-black icon-span"></span>
                    </label>
                    <div _ngcontent-c10="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 0 - <i class="fa fa-inr"></i> 100</div>
                    
                    </li><li _ngcontent-c10="" class="o-hidden ng-star-inserted" style="padding:4px 0 !important; border:none !important;">
                        <label _ngcontent-c10="" class="f-left filter-check mar-r-5">
                        <input _ngcontent-c10="" class="inline-block pad-r-10" name="filter" type="checkbox">
                        <span _ngcontent-c10="" class="inline-block pointer f-ock -13 icon-font text-black icon-span"></span>
                    </label>
                    <div _ngcontent-c10="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 101 - <i class="fa fa-inr"></i> 500</div>
                    
                    </li>
                </ul>
            </span>
      </div>
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted tab-content" id="details3"> 
          <!---->

                <!----><span _ngcontent-c10="" class="ng-star-inserted">
                  <!----><input _ngcontent-c10="" class="form-control border bg-white fixed top-50 right-0 ng-star-inserted" filtersearchbox="" placeholder="Search brand" style="text-transform: capitalize; background: white !important; width: 220px;" type="text">
                    
                <ul _ngcontent-c10="" class="no-padding no-list-style pad-t-30">
                    <!----><li _ngcontent-c10="" class="o-hidden ng-star-inserted" style="padding: 4px 0px !important; border:none !important;">
                        <label _ngcontent-c10="" class="f-left filter-check mar-r-5">
                        <input _ngcontent-c10="" class="inline-block pad-r-10" name="filter" type="checkbox">
                        <span _ngcontent-c10="" class="inline-block pointer f-ock -13 icon-font text-black icon-span"></span>
                    </label>
                    <!---->
                    <!----><div _ngcontent-c10="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                        A-Max
                      <span _ngcontent-c10="" style="padding-left: 3px;">(106)</span>
                    </div>
                    </li>
                    <li _ngcontent-c10="" class="o-hidden ng-star-inserted" style="padding: 4px 0px !important; border:none !important;">
                        <label _ngcontent-c10="" class="f-left filter-check mar-r-5">
                        <input _ngcontent-c10="" class="inline-block pad-r-10" name="filter" type="checkbox">
                        <span _ngcontent-c10="" class="inline-block pointer f-ock -13 icon-font text-black icon-span"></span>
                    </label>
                    <!---->
                    <!----><div _ngcontent-c10="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                        A-Max
                      <span _ngcontent-c10="" style="padding-left: 3px;">(106)</span>
                    </div>
                    </li>
                  </ul>
               </span>
            </div>
      </div>
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted"> 
         
        
         
      </div>
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted"> 
         
        
         
      </div>
      <div _ngcontent-c11="" class="no-padding no-list-style no-margin absolute top-15 left-10 wp-85 ng-star-inserted"> 
         
        
         
      </div>
    </div>
  </div>
</div>
<style>
    .lowest_price_active {
        color: #0C0;
    }

</style>
<?php 

}

else

{

echo '404 Not URL Available.';

}?>
<?php require_once('footer.php');?>
<script>
$(document).ready(function(){
    $(".btn-trans").click(function(){
        $(".resmob_filter").addClass("resopenfilter");
    });
	$(".back-arrow").click(function(){
		 $(".resmob_filter").removeClass("resopenfilter");
	});
});
</script>
<script type="text/javascript">
$(document).ready(function($) {
  $('.tab-content').hide();
  $('.tab-content:first').show();
  $('.cat_lists li:first').addClass('active');
  $('.cat_lists li').click(function(event) {
    $('.cat_lists li').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').hide();

    var selectTab = $(this).find('a').attr("href");

    $(selectTab).fadeIn(200);
  });
});
</script>