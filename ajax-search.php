<?php
require_once('db.php');

header("Content-type: text/javascript");

$brand="";
$catid = isset($_REQUEST['catid'])?$_REQUEST['catid']:"";
$brand = isset($_REQUEST['brand'])?$_REQUEST['brand']:"";
$attr_var = isset($_REQUEST['attr_var'])?$_REQUEST['attr_var']:"";

$stock = isset($_REQUEST['stock'])?$_REQUEST['stock']:"";
$minprice = isset($_REQUEST['minprice'])?$_REQUEST['minprice']:"";
$maxprice = isset($_REQUEST['maxprice'])?$_REQUEST['maxprice']:"";
$minprice = $minprice[0];
if(!empty($maxprice)){
	$maxprice = end($maxprice);
}
$mindiscount = isset($_REQUEST['mindiscount'])?$_REQUEST['mindiscount']:"";
$maxdiscount = isset($_REQUEST['maxdiscount'])?$_REQUEST['maxdiscount']:"";
$mindiscount = $mindiscount[0];
if(!empty($maxdiscount)){
	$maxdiscount = end($maxdiscount);
}

$brandid = isset($_REQUEST['brandid'])?$_REQUEST['brandid']:"";

$menuminprice = isset($_REQUEST['menuminprice'])?$_REQUEST['menuminprice']:"";
$menumaxprice = isset($_REQUEST['menumaxprice'])?$_REQUEST['menumaxprice']:"";

$clearfilter = isset($_REQUEST['clearfilter'])?$_REQUEST['clearfilter']:"";

$sorting_p_a = $_REQUEST['sorting'];

$sorting = isset($_REQUEST['sorting'])?$_REQUEST['sorting']:"";
$sorting_p =isset($sorting_p_a[0])?$sorting_p_a[0]:"";

$limit = 5;  

if (isset($_REQUEST["page"])) {
	$page  = $_REQUEST["page"]; 
} else { 
	$page=1; 
};  
$pre = $page-1;
$next = $page+1;
$start_from = ($page-1) * $limit; 

$search_keyword = isset($_REQUEST['search_keyword'])?$_REQUEST['search_keyword']:"";

$query = "select * from product where Status = '1' and ProductName like '%".$search_keyword."%'";
        
                   //filter query start
                      if(!empty($brandid)){
                         // $branddata =implode("','",$brandid);
                          $query  .= " and brandid = ".$brandid." ";
                      }
                      if(!empty($brand)){
                          $branddata =implode("','",$brand);
                          $query  .= " and brandid in('$branddata')";
                      }
					  if(!empty($attr_var)){
						  $numItems = count($attr_var);
						  $attr_vardata =implode(",",$attr_var);
						  $query  .= " and  ";
						  $i = 0;
							foreach($attr_var as $key) {
								$query  .= "attr_var LIKE ".'"%'.$key.'%"'."";
								
							  if(++$i !== $numItems) {
								
								$query  .=" or ";
							  }
							}    
						  
                      }
					  if($minprice != ' ' && !empty($maxprice)){
						 
                          $query  .= " and SalePrice >='$minprice' and SalePrice <='$maxprice'";
                      }
					  if($maxprice == "" && !empty($minprice))
					  {
						  $query  .= " and SalePrice >='$minprice'";
					  }
					  
					  if($menuminprice != ' ' && !empty($menumaxprice)){
						 
                          $query  .= " and SalePrice >='$menuminprice' and SalePrice <='$menumaxprice'";
                      }
					  if($menumaxprice == "" && !empty($menuminprice))
					  {
						  $query  .= " and SalePrice >='$menuminprice'";
					  }
					  
					  
					  if($mindiscount != ' ' && !empty($maxdiscount)){
						 
                          $query  .= " and discount_lable >='$mindiscount' and discount_lable <='$maxdiscount' and is_deal_pro = 1 ";
                      }
					  if($maxdiscount == "" && !empty($mindiscount))
					  {
						  $query  .= " and discount_lable >='$mindiscount'";
					  }
					  if($stock[0] == 1){
                          
                          $query  .= " and Inventory > 0";
                      }
					  if($sorting == 'low' || $sorting_p == 'low' ){
						  
						   $query  .= " ORDER BY  SalePrice  ASC"; 
					  	
					  }
					  if($sorting == 'heigh' || $sorting_p == 'heigh'){
					  	 $query  .= " ORDER BY  SalePrice  DESC";
					  }
					  if($clearfilter == 'allclear'){
					  	
					  }
					  $query.= '  LIMIT '.$start_from.', '.$limit.'';
					  
					// echo $query;
					 
					// exit;
                        
               
                    
                     $rs = mysqli_query($dbLink,$query) or die("Error : ".mysqli_error());
					 $prodata = array();
					 
					 if(mysqli_num_rows($rs)>0){
						 
                    	while($product_data=$rs->fetch_assoc()){	
                    
                  	?>
                   
<?php 

$product_list = '
					<div class="no-padding pad-lr-5 prod_grid pad-lr-xs--0 no-margin-xs ng-tns-c16-5 ng-trigger ng-trigger-fade ng-star-inserted">';
					$pname = strtolower(str_replace(" ","-",$product_data['ProductName']));
					
                  $product_list.= '<a class="hidden-sm-down" target="_blank" href="'.$frontpath.'/products/'.$pname.'">
                     <div class="prod_block relative">
                         <div class="prod_image pad-lr-15 pad-lr-xs-5">
                             <img alt="'.$product_data['ProductName'].'" class="img-fluid ng-tns-c16-5 ng-star-inserted ng-lazyloaded" src="'.$frontpath.'/ProductImage/'.$product_data['ImageName'].'" style="">
                                              </div>
                                              <div class="prod_name pad-lr-15 pad-lr-xs-5">
                                                  <h4 class="text-blue b-text pad-t-5">
                                                  	'.$product_data['ProductName'].'
                                                    
                                                  </h4>
                                              </div>
                                              
                                              <div class="prod_price pad-lr-15 pad-lr-xs-5 ng-tns-c16-5 ng-star-inserted" style="">';
                                              
									if ($product_data['is_deal_pro']==1){
					   $product_list .= '<p class="discount ng-tns-c16-5 ng-star-inserted">
                                                 	'.$product_data['discount_lable'].'% OFF                                                 </p>
                                                 <h5 class="no-margin no-padding f-size-12 line-through ng-tns-c16-5 ng-star-inserted">₹'.$product_data['Price'].'</h5>
                                               <h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500">₹'.$product_data['SalePrice'].'</h3>';
													
												  
												  }else{
                                 $product_list .= '<h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500">₹'.$product_data['Price'].'</h3>';
												  }
                                             
                       $product_list .= '  </div>
                                              <div class="prod_detail pad-t-3 pad-b-15 pad-lr-10 pad-lr-xs-5">
                                                <ul class="no-margin no-padding pad-lr-5">
                                                  <li class="ng-tns-c16-5 ng-star-inserted" style="">';
                                                  
                                                
													 $sqlbrand = "select * from brand where brandid=".$product_data['brandid'];
													 $resbrand = mysqli_query($dbLink,$sqlbrand);
													 $databrand=$resbrand->fetch_assoc();
													
													
												
                       $product_list .= '   Brand:<b class="text-grey">
                                                      '.$databrand['brandname'].'
                                                      </b>
                                                    </li>
                                                 </ul>
                                              </div>
                                            </div>
                                          </a>
                                        </div>';
// $product_list;
 $prodata[] = $product_list;



  }
					 }
					 else{
						 $product_list =  'No Product Found';
						 }
						 
					if(!empty($brandid) ){
						 
						 $sqlbrand = "select * from brand where brandid=".$brandid;
						 $resbrand = mysqli_query($dbLink,$sqlbrand);
						 $databrand=$resbrand->fetch_assoc();
													 
													 
						 $filterdiv_1 = '<span _ngcontent-c6="" class="ng-star-inserted" style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			brand : '.$databrand['brandname'].'
                                			
                            			</span>
                    				  </span>';
                           //$filterdiv = $brandid;
                          
                      
					 }else{
					  	$filterdiv_1='';
					  }
					 
					 if(!empty($brand)){
						 
						 
						 $branddata =implode(",",$brand);
						 
						 $sqlbrand1 = "select * from brand where brandid in (".$branddata.")";
						 $resbrand1 = mysqli_query($dbLink,$sqlbrand1);
						 
						 while($databrand1=$resbrand1->fetch_assoc()){
						 	//echo $databrand1['brandid'];
							$filterdiv_2[] = '<span _ngcontent-c6="" class="ng-star-inserted" style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			brand : '.$databrand1['brandname'].'
                                			
                            			</span>
                    				  </span>';
						 }
                      
					 }else{
					  	$filterdiv_2[]='';
					 }
					 if(!empty($attr_var)){
						 
						
						$attr_vardata =implode(",",$attr_var);
						$sqlarr1 = "select * from attributes_variation where id in (".$attr_vardata.")";
						$resarr1 = mysqli_query($dbLink,$sqlarr1);
							    
						 
						 
						 while($dataarr1=$resarr1->fetch_assoc()){
						 	//echo $databrand1['brandid'];
							$filterdiv_8[] = '<span _ngcontent-c6="" class="ng-star-inserted" style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Variation : '.$dataarr1['variation_name'].'
                                			
                            			</span>
                    				  </span>';
						 }
                      
					 }else{
					  	$filterdiv_8[]='';
					 }
					 
					 if($menuminprice != ' ' && !empty($menumaxprice)){
						 
						 $filterdiv_3[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Price : <i class="fa fa-inr"></i>'.$menuminprice.' - <i class="fa fa-inr"></i>'.$menumaxprice.'
                                			
                            			</span>
                    				  </span>';
									  
                         
                      
					 
					 }else{
					  	$filterdiv_3[]='';
					 }
					 
					 if($menumaxprice == "" && !empty($menuminprice)){
						   $filterdiv_3[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Price : <i class="fa fa-inr"></i>'.$menuminprice.' - *
                                			
                            			</span>
                    				  </span>';
					  
					 }else{
					  	$filterdiv_3[]='';
					 }
					 
					 if($minprice != ' ' && !empty($maxprice)){
						 
						  $filterdiv_4[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Price : <i class="fa fa-inr"></i>'.$minprice.' - <i class="fa fa-inr"></i>'.$maxprice.'
                                			
                            			</span>
                    				  </span>';
									  
                          
                      
					 
					 }else{
					  	$filterdiv_4[]='';
					 }
					  
					 if($maxprice == "" && !empty($minprice)){
						  
						  $filterdiv_4[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Price : <i class="fa fa-inr"></i>'.$minprice.'- *
                                			
                            			</span>
                    				  </span>';
						  
					  
					 
					 }else{
					  	$filterdiv_4[]='';
					 }

					 if($mindiscount != ' ' && !empty($maxdiscount)){
						 
						  $filterdiv_5[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			discount : '.$mindiscount.' - '.$maxdiscount.'
                                			
                            			</span>
                    				  </span>';
					 
					 
					 }else{
					  	$filterdiv_5[]='';
					 }
					 
					 if($maxdiscount == "" && !empty($mindiscount)){
						 
						  
						  $filterdiv_5[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			discount : '.$mindiscount.'- *
                                			
                            			</span>
                    				  </span>';
						  
					  
					 
						 
					 
					 }else{
					  	$filterdiv_5[]='';
					 }
					 
					 if($stock[0] == 1){
						  
						  $filterdiv_6[] = '<span _ngcontent-c6="" class="ng-star-inserted " style="display:block">
                            			<span _ngcontent-c6="" class="text-black relative f-size-11 ng-star-inserted" style="text-transform: capitalize;">
                                			Availability : Show in stock only
                                			
                            			</span>
                    				  </span>';
						  
                      
					 }else{
					  	$filterdiv_6[]='';
					 }	 
						 
					$query1 = "select * from product where Status = '1' and ProductName like '%".$search_keyword."%'";
        
                   //filter query start
                      if(!empty($brandid)){
                         // $branddata =implode("','",$brandid);
                          $query1  .= " and brandid = ".$brandid." ";
                      }
                      if(!empty($brand)){
                          $branddata =implode("','",$brand);
                          $query1  .= " and brandid in('$branddata')";
                      }
					  if(!empty($attr_var)){
						  $numItems = count($attr_var);
						  $attr_vardata =implode(",",$attr_var);
						  $query  .= " and  ";
						  $i = 0;
							foreach($attr_var as $key) {
								$query  .= "attr_var LIKE ".'"%'.$key.'%"'."";
								
							  if(++$i !== $numItems) {
								
								$query  .=" or ";
							  }
							}    
						  
                      }
					  if($minprice != ' ' && !empty($maxprice)){
						 
                          $query1  .= " and SalePrice >='$minprice' and SalePrice <='$maxprice'";
                      }
					  if($maxprice == "" && !empty($minprice))
					  {
						  $query1  .= " and SalePrice >='$minprice'";
					  }
					  
					  if($menuminprice != ' ' && !empty($menumaxprice)){
						 
                          $query1  .= " and SalePrice >='$menuminprice' and SalePrice <='$menumaxprice'";
                      }
					  if($menumaxprice == "" && !empty($menuminprice))
					  {
						  $query1  .= " and SalePrice >='$menuminprice'";
					  }
					  
					  
					  if($mindiscount != ' ' && !empty($maxdiscount)){
						 
                          $query1  .= " and discount_lable >='$mindiscount' and discount_lable <='$maxdiscount' and is_deal_pro = 1 ";
                      }
					  if($maxdiscount == "" && !empty($mindiscount))
					  {
						  $query  .= " and discount_lable >='$mindiscount'";
					  }
					  if($stock[0] == 1){
                          
                          $query1  .= " and Inventory > 0";
                      }
					  if($sorting == 'low' || $sorting_p == 'low' ){
					  	 $query1  .= " ORDER BY SalePrice ASC";
					  }
					  if($sorting == 'heigh' || $sorting_p == 'heigh'){
					  	 $query1  .= " ORDER BY SalePrice DESC";
					  }
					  if($clearfilter == 'allclear'){
					  	
					  }
					  //$query.= '  LIMIT '.$start_from.', '.$limit.'';
					  
					 //echo $query1;
					 //exit;
                        
               
                    
                     $rs1 = mysqli_query($dbLink,$query1) or die("Error : ".mysqli_error());
					$count_pro = mysqli_num_rows($rs1);
					 
					 $countpro = mysqli_num_rows($rs1);
					 if($countpro>0){
						  
						 $total_pages = ceil($countpro / $limit);
						$paginationhtml = '<div class="colcre-sm-12 no-padding text-right">
                        <pagination class="block  h-35  h-auto-xs">
                    

<pagination-controls nextlabel="" previouslabel="" class="ng-star-inserted" role="navigation" aria-label="Pagination">
    <pagination-template>
    
    		<ul class="pagination text-center ngx-pagination ng-star-inserted" id="pagination">
            <li class="pagination-previous disabled ng-star-inserted" id="pre-'.$pre.'"> 
           		<span class="ng-star-inserted">
                <span class="show-for-sr">page</span>
            	</span>
        	</li>';
 if(!empty($total_pages)):
		
		for($i=1; $i<=$total_pages; $i++):  
			if($i == 1):
            $paginationhtml.= '<li class="current ng-star-inserted item_page" id="'.$i.'" >
                <div class="ng-star-inserted">
                	
                    <span class="show-for-sr">Youre on page </span>
                    <span>'.$i.'</span>
                     
                </div>
            </li>';
              
			else:
            $paginationhtml.='<li class="ng-star-inserted item_page" id="'.$i.'">
                
                    <span class="show-for-sr">page </span>
                    <span>'.$i.'</span>
                
        	</li>';
			
		 endif;			
endfor;endif;  
			$paginationhtml.='<li class="pagination-next ng-star-inserted" id="next-'.$next.'">
           		<a aria-label=" page" class="ng-star-inserted">
                  <span class="show-for-sr">page</span>
            	</a>
            </li>
</ul>
    
    
    
    
    </pagination-template>
    </pagination-controls>
</pagination>
                    </div>';
					 }	 
						 
						 

$data = array(
            "product_list"  => $prodata,
			"filterdiv_1"  => $filterdiv_1,
			"filterdiv_2"  => $filterdiv_2,
			"filterdiv_3"=>$filterdiv_3,
			"filterdiv_4"=>$filterdiv_4,
			"filterdiv_5"=>$filterdiv_5,
			"filterdiv_6"=>$filterdiv_6,
			"count_pro" =>$count_pro,
			"filterdiv_8"=>$filterdiv_8,
			"filterdiv_7"=>$paginationhtml
        );
echo json_encode($data);			