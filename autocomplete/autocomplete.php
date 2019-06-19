<?php

require_once('../db.php');

if(isset($_GET['part']) and $_GET['part'] != '')

{
	$results = array();

$ssql="select * from category where CategoryName like '%".$_GET['part']."%' and Status = 1";
$sres =mysqli_query($dbLink,$ssql) or die('could not select category');

	if(mysqli_num_rows($sres) > 0 ){
			
			$str = '<ul _ngcontent-c2="" class="h-400 no-padding no-list-style f-left wp-55 border-r  wp-xs-100" style="overflow-y:scroll;">
                    	<li _ngcontent-c2="" class="title ng-star-inserted">Suggestions -</li>';
			while($sdata = $sres->fetch_assoc()){
				$cname = strtolower(str_replace(" ","-",$sdata['CategoryName']));
				if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
					$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
				}
				
				$str.= '<li _ngcontent-c2="" class="ac_even ng-star-inserted" data-index="0" type="suggestionList" value="'.$frontpath.'/category/'.$cname.'" data-value="'.$sdata['CategoryName'].'">'.$sdata['CategoryName'];
				
				$psql="select * from product where ProductName like '%".$_GET['part']."%' and Status = 1 and CategoryID=".$sdata['CategoryID']." LIMIT 3";
				$pres =mysqli_query($dbLink,$psql) or die('could not select Product');
				$count_pro = mysqli_num_rows($pres);
				if(mysqli_num_rows($pres) > 0 )
				{
					
					$str.="<ul class='search-sub-menu'>";
					
					while($product_data = $pres->fetch_assoc())
				
						{
							$str.='<li class="suggestions_li"  style="padding-top:0 !important;"><a href="" class="suggestions_link">'.$product_data['ProductName'].'</a> <img src='.$frontpath.'/ProductImage/'.$product_data['ImageName'].' height="200" width="200" class="suggestions_img"></li>';
						}
					$str.="</ul>";
				}
				
				$str.= '</li>';
				
			}
			$str.='</ul>';
			
			$results[] = $str; 
	}
	else{
		
				$psql="select * from product where ProductName like '%".$_GET['part']."%' and Status = 1 ";
				$pres =mysqli_query($dbLink,$psql) or die('could not select Product');
				
				if(mysqli_num_rows($pres) > 0 )
				{
					$str = '<ul _ngcontent-c2="" class="h-400 no-padding no-list-style f-left wp-55 border-r  wp-xs-100">
							<li _ngcontent-c2="" class="title ng-star-inserted">Suggestions -</li>';
					while($product_data = $pres->fetch_assoc())
				
						{
					$str.='<li _ngcontent-c2="" class="ac_even ng-star-inserted" data-index="0" type="suggestionList">';
					$str.='<img src='.$frontpath.'/ProductImage/'.$product_data['ImageName'].' height="200" width="200">';
					$str.=$product_data['ProductName'];
					$str.='</li>';
							
						}
					$str.='</ul>';
				}
				$results[] = $str; 
	}

echo json_encode($results);

}






//$proresult = mysqli_query($dbLink,"SELECT ProductName,ImageName,Price FROM  product where Status=1");
//
////Prodcut Details
//
//while ($prorow = $proresult->fetch_assoc()) {
//
//   		
//
//		$product[]=array($prorow['ProductName'],$prorow['ImageName'],$prorow['Price']);
//
//}
//
////Product Details
//
//
//
////Category Details
//
//$catresult = mysqli_query($dbLink,"SELECT CategoryName FROM category where Status=1");
//
//while ($catrow = $catresult ->fetch_assoc()) {
//
//    	$category[]=array($catrow['CategoryName']);
//
//}
//
////Category Details
//
//
//
////mysql_free_result($result);
//
////mysql_close($link);
//
//
//
//// check the parameter
//
//
//
//if(isset($_GET['part']) and $_GET['part'] != '')
//
//{
//
//	// initialize the results array
//
//	$results = array();
//
//
//
//	// search colors
//
//	//$cat = 0;
////	
////	foreach($category as $color)
////
////	{
////
////		
////	
////		// if it starts with 'part' add to results
////
////		if( strpos(strtolower($color[0]), strtolower($_GET['part'])) === 0 ){
////
////
////			echo 'hii';
////			
////			exit;
////			if($cat == 0)
////
////			{
////				echo $cat;
////				exit;
////
////				$str = "<div style='font-weight:bold; font-size:14px;'>
////
////				<input type='hidden' value='".$frontpath."/allcategories.php' />
////
////				<span></span>
////
////				<span>Categories</span>
////
////				<span></span>
////
////				</div>";
////
////				$results[] = $str;
////
////				$cat++;
////
////			}
////
////			$str='<div>
////
////			<input type="hidden" value ="'.$frontpath.'/category/'.str_replace(' ','_',$color[0]).'" />
////
////			<span></span>
////
////			<span>'.$color[0].'</span>
////
////			<span></span>
////
////			</div>';
////
////			$results[] = $str; 
////
////		}
////
////	}
//
//	$pro = 0;
//
//	$cnt = 1;
//	$str =  '<div _ngcontent-c2="" class="border box-shadow ac_results z-index-99 bg-white hideSuggestionBlock" id="ac_results" style="position: absolute; width: 885px; height: 400px !important; top: 94px; left: 228px;display:block">
//                    <ul _ngcontent-c2="" class="h-400 no-padding no-list-style f-left wp-55 border-r  wp-xs-100">
//                        
//                        <li _ngcontent-c2="" class="title ng-star-inserted">Suggestions -</li>';
//	foreach($product as $color)
//
//	{
//		
//
//		if($cnt<=5)
//
//		{
//			
//			//exit;
//			
//		// if it starts with 'part' add to results
//
//		//if( strpos(strtolower($color[0]), strtolower($_GET['part'])) === 0 ){
//			
//			if($pro == 0)
//
//			{
//
//				$str = "<div style='font-weight:bold; font-size:14px;'>
//
//				<input type='hidden' value='".$frontpath."/allcategories.php' />
//
//				<span></span>
//
//				<span>Products</span>
//
//				<span></span>
//
//				</div>";
//
//				$results[] = $str;
//
//				$pro++;
//
//			}
//
//			$str.='<li _ngcontent-c2="" class="ac_even ng-star-inserted" data-index="0" type="suggestionList">'.$color[0].'
//						</li>';
//
//			$results[] = $str; 
//
//			$cnt++;
//
//		//}
//
//		}
//
//		else
//
//		{
//
//			break;
//
//		}
//
//	}
//	
//	 $str.=  '</ul></div>';
//
//
//
//	// return the array as json with PHP 5.2
//
//	echo json_encode($results);
//
//}