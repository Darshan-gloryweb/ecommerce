<?php  require_once('db.php'); ?>
<?php include('include/start_session.php'); ?>
<?php  $title = 'All Categories | '.$mywebsitename; ?>
<?php require_once('include/function.php'); ?>

<?php require_once('header-inner.php');?>
<link rel="stylesheet" href="<?php echo $frontpath;?>/icomoon/style.css">
<div class="container-fluid pad-lr-md-0">
  <router-outlet></router-outlet><view _nghost-c6="" class="ng-star-inserted">
  <section _ngcontent-c6="" class="container-fluid pad-lr-0 compliance mar-b-20 mar-t-15" id="view_all-page">
  <div _ngcontent-c6="" class="row pad-lr-20 pad-lr-xs-0 category-list bg-white">
  	<?php 
		$sqlcat = "select * from category where Status=1 and parent = 0 ORDER BY DisplayOrder ";
		$rescat= mysqli_query($dbLink,$sqlcat)or die('could not select Category');
		while($datacat=$rescat->fetch_assoc()){
	?>
    	
		<div _ngcontent-c6="" class="col-sm-3 col-md-2 col-xs-3 pad-lr-10 border-white-2 margin-top category-icon">
        <div _ngcontent-c6="" class="cat-icon-bg">
          <?php $cname = strtolower(str_replace(" ","-",$datacat['CategoryName'])); 
          	if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
			}
		  ?>
          <span class="icon-<?php echo $cname;?>">
                
                </span>
          </div>
          <div _ngcontent-c6="">
          <a _ngcontent-c6="" href="<?php echo $frontpath;?>/category/<?=$cname?>" class="cat_name">
          
          <h5 _ngcontent-c6="" class="pad-top-8 text-uppercase text-400" href="<?php echo $frontpath;?>/category/<?=$cname?>" target="_blank">
          	<!--<i _ngcontent-c6="" class="mar-r-5  icon-led-lighting"></i> -->
            <?php echo $datacat['CategoryName'] ?>
           </h5>
         	</a>
        </div>
</div>

    <?php }?>
  
  </div>
   

 <!--<div _ngcontent-c6="" class="row pad-lr-20 bg-white pad-tb-20 viewH4 view_light">
    <div _ngcontent-c6="" class="col-md-12 ">
    <img src="<?php echo $frontpath.'/CategoryIcon/'.$datacat['CategoryImage'];?>"  class="CategoryImage"/>
    
      <h4 _ngcontent-c6="" class="cat_iocn"><span _ngcontent-c6="">
      	<?php $cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
				if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
			}
		
		 ?>
      	<a _ngcontent-c6="" href="<?php echo $frontpath;?>/category/<?=$cname?>"> <?php echo $datacat['CategoryName'] ?></a></span></h4>
        
      	 <ul _ngcontent-c6="" class="no-list-style no-margin-xs pad-l-xs-25">
      <?php 
	  	$sqlsubcat = "select * from category where Status=1 and parent= '".$datacat['CategoryID']."'";
		$ressubcat =mysqli_query($dbLink,$sqlsubcat)or die('could not select sub Category');
		while($datasubcat=$ressubcat->fetch_assoc()){
	  ?>
         
             <?php $cname1 = strtolower(str_replace(" ","-",$datasubcat['CategoryName']));
			 		if (strpos($cname1,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname1 = str_replace('&', 'and', $cname1); //if yes, we simply replace it with en
			}
			  ?>
              <li _ngcontent-c6="" class="pad-b-10 sub_cat_title"><a _ngcontent-c6="" class="f-size-12 text-grey" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cname1?>"><?php echo $datasubcat['CategoryName']?></a></li>
            
	      
      
      <?php }?></ul>
    </div>
  </div>-->
   <?php 
		$sqlcat = "select * from category where Status=1 and parent = 0 ORDER BY DisplayOrder ";
		$rescat= mysqli_query($dbLink,$sqlcat)or die('could not select Category');
		while($datacat=$rescat->fetch_assoc()){
	?>
  <div _ngcontent-c6="" class="row pad-lr-20 pad-top-70">
      <div _ngcontent-c6="" class="category-btm-container clearfix mob-pad">
        <div _ngcontent-c6="" class="col-md-12 bg-white sub-category-list clearfix">
            <div _ngcontent-c6="" class="col-md-12 col-sm-12 col-xs-12 pad-mob-col">
               <div _ngcontent-c6="" class="col-xs-4 col-md-2">
                  <div _ngcontent-c6="" class="sub-icon-bg">
                      <a _ngcontent-c6="" href="<?php echo $frontpath;?>/category/<?=$cname?>">
                         <?php $cname = strtolower(str_replace(" ","-",$datacat['CategoryName'])); 
          	if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
			}
		  ?>
          <span class="icon-<?php echo $cname;?>">
                
                </span>
                      </a>
                  </div>
               </div>
               <div _ngcontent-c6="" class="col-xs-8 col-md-10">
                  <h4 _ngcontent-c6="" class="">
                  <?php $cname = strtolower(str_replace(" ","-",$datacat['CategoryName']));
				if (strpos($cname,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname = str_replace('&', 'and', $cname); //if yes, we simply replace it with en
			}
		
		 ?>
                    <a _ngcontent-c6="" href="<?php echo $frontpath;?>/category/<?=$cname?>"><?php echo $datacat['CategoryName'] ?></a>
                  </h4>
               </div>
            </div>
  
            <div _ngcontent-c6="" class="col-md-10 col-sm-12 col-xs-12 pull-right">
              <div _ngcontent-c6="" class="col-md-12 col-sm-12 col-xs-12 pad-left-0">
                <ul _ngcontent-c6="" class="no-list-style no-margin-xs pad-l-xs-25">
                 <?php 
	  	$sqlsubcat = "select * from category where Status=1 and parent= '".$datacat['CategoryID']."'";
		$ressubcat =mysqli_query($dbLink,$sqlsubcat)or die('could not select sub Category');
		while($datasubcat=$ressubcat->fetch_assoc()){
	  ?>
         
             <?php $cname1 = strtolower(str_replace(" ","-",$datasubcat['CategoryName']));
			 		if (strpos($cname1,'&') !== false) { //first we check if the url contains the string 'en-us'
				$cname1 = str_replace('&', 'and', $cname1); //if yes, we simply replace it with en
			}
			  ?>
                  <li _ngcontent-c6="" class="pad-b-10">
                    <a _ngcontent-c6="" class="f-size-12 text-grey" href="<?php echo $frontpath;?>/category/<?=$cname?>/<?=$cname1?>"><?php echo $datasubcat['CategoryName']?></a>
                  </li><?php }?>
                </ul>
              </div>
  
              
  
              
  
              
  
            </div>
        </div>
      </div>
    </div>
  
   <?php }?>

</section>
</view>
</div>
<style>
.CategoryImage{
	float: left;
	display: inline-block;
	width: 3%;
	height: auto;
	margin-left: -38px;
}
.sub_cat_title{
	width:25%;
	float:left;
}
.viewH4[_ngcontent-c6] h4[_ngcontent-c6] span[_ngcontent-c6] a[_ngcontent-c6] {
    color: #2d708f !important;
	font-size: 2.5rem;
	font-weight: 500;
	line-height: 1.1;
	margin-left: 10px;
}
.viewH4[_ngcontent-c6] h4[_ngcontent-c6] span[_ngcontent-c6] {
    border-bottom: 1px solid #b5c7d0;
    display: block;
    padding-bottom: 5px;
}

</style>

<?php require_once('footer.php');?>
