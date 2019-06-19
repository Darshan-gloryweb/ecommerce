<?php  require_once('db.php'); ?>

<?php include('include/start_session.php'); ?>

<?php require_once('include/function.php'); ?>

<?php require_once('header.php');?>

<script type="text/javascript" src="<?=$frontpath?>/js/item-custom.js"></script>

<?php



if($_GET['url'])

{



$url = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);

$url = str_replace('.php','',$url);

$url=str_replace('_',' ',$url);



 $bb = str_replace('-',' ',$url);

$sql=mysqli_query($dbLink,"select product.*,category.CategoryName,category.CategoryTypeID from product inner join category on product.CategoryID = category.CategoryID  and product.ProductName='".mysqli_real_escape_string($dbLink,$bb)."'") or die ('Could Not Select Product');

$rows=$sql->fetch_assoc();

$ctypeid = $rows['CategoryTypeID'];

}

else

{

	echo '404 Not URL Availables.';

}



$email = $_SESSION['Email'];

 $sqlcus = "SELECT * FROM customer WHERE Email= '".$email."'";

$rescus = mysqli_query($dbLink,$sqlcus);

$datacus = $rescus->fetch_assoc();

//print_r($datacus);

 $crid = $datacus['CustomerID'];

?>





<?php //echo $rows['ProductID'];?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rating/1.5.0/bootstrap-rating.css" rel="stylesheet">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rating/1.5.0/bootstrap-rating.min.js"></script>

<style type="text/css"> 



   

.clearfix {

  clear:both;

}



.text-center {text-align:center;}



a {

  color: tomato;

  text-decoration: none;

}



a:hover {

  color: #2196f3;

}



pre {

display: block;

padding: 9.5px;

margin: 0 0 10px;

font-size: 13px;

line-height: 1.42857143;

color: #333;

word-break: break-all;

word-wrap: break-word;

background-color: #F5F5F5;

border: 1px solid #CCC;

border-radius: 4px;

}









#a-footer {

  margin: 20px 0;

}



.new-react-version {

  padding: 20px 20px;

  border: 1px solid #eee;

  border-radius: 20px;

  box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);

  

  text-align: center;

  font-size: 14px;

  line-height: 1.7;

}



.new-react-version .react-svg-logo {

  text-align: center;

  max-width: 60px;

  margin: 20px auto;

  margin-top: 0;

}











.success-box {

  margin:50px 0;

  padding:10px 10px;

  border:1px solid #eee;

  background:#f9f9f9;

}



.success-box img {

  margin-right:10px;

  display:inline-block;

  vertical-align:top;

}



.success-box > div {

  vertical-align:top;

  display:inline-block;

  color:#888;

}







/* Rating Star Widgets Style */

.rating-stars ul {

  list-style-type:none;

  padding:0;

  

  -moz-user-select:none;

  -webkit-user-select:none;

}

.rating-stars ul > li.star {

  display:inline-block;

  

}



/* Idle State of the stars */

.rating-stars ul > li.star > i.fa {

  font-size:2.5em; /* Change the size of the stars */

  color:#ccc; /* Color on idle state */

}



/* Hover state of the stars */

.rating-stars ul > li.star.hover > i.fa {

  color:#FFCC36;

}



/* Selected state of the stars */

.rating-stars ul > li.star.selected > i.fa {

  color:#FF912C;

}





</style>


<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><review><div class="container mar-tb-20 review_container">
  <div class="row pad-tb-15">
    <div class="col-sm-12">
      <h4 class="f-size-16 text-400 no-margin">WRITE A REVIEW</h4>
    </div>
  </div>
  <div class="row pad-tb-15 bg-white">
    <div class="col-md-6 col-lg-3 text-left review-img-block">
      <div class="img-box">
         <img src="<?php echo $frontpath;?>/ProductImage/<?=$rows['ImageName']?>">
      </div>
      <p class="f-size-13 no-margin mar-t-10"><?php echo $rows['ProductName'];?></p>
      <div class="clearfix"></div>
      <div class="text-left pad-tb-10">
        <rating class="inline-block wp-99 center-block pad-b-10 ng-untouched ng-pristine ng-valid" style="float:left;" _nghost-c7="">
<span _ngcontent-c7="" aria-valuemin="0" class="rating readonly" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">
    <!----><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="fa fa-star half100" title="1"></i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="fa fa-star half100" title="2"></i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="fa fa-star half100" title="3"></i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="fa fa-star half50" title="4"></i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="fa fa-star half-50" title="5"></i>
    </span>
</span>
</rating>
        <div class="clearfix"></div>
        <p class="inline-block f-size-12 text-500">5/5 Stars</p>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 review-tab">
      <p class="f-size-16 pad-tb-10 text-500">Share your thoughts</p>
      <form novalidate="" class="ng-untouched ng-pristine ng-invalid" action="#">
       <input type="hidden" name="pro_id" value="<?php echo $rows['ProductID'];?>">

	<input type="hidden" name="cr_id" value="<?php echo $crid;?>">

	<input type="hidden" name="pro_name" value="<?php echo $_GET['url'];?>">
        <div class="pad-tb-20">
          <label class="b-text f-size-14 text-400 pad-b-5 pad-b-xs-5">Title</label>
          <div class="relative max-w-500">
            <p class="f-size-11 text-grey absolute top--20 right-0">(Maximum 100 characters.)</p>
            <input type="text" class="form-control ng-untouched ng-pristine ng-invalid" id="title" name="title" maxlength="100">
             <!---->
          </div>
        </div>
        <div class="pad-tb-20">
          <div class="relative max-w-500">
            <label class="b-text f-size-14 text-400 pad-b-xs-5 pad-b-5">Your Thoughts</label>
            <p class="f-size-11 text-grey absolute top-5 right-0">(Maximum 600 characters.)</p>
            <textarea class="form-control ng-untouched ng-pristine ng-invalid" maxlength="600" type="text" name="descr" id="descr"></textarea>
             <!---->
          </div>
        </div>
        
          
        
        <div class="pad-tb-20 o-hidden wp-100">
          <div class="wp-50 o-hidden f-left">
            <label class="b-text f-size-14 inline-block f-left pad-t-10 pad-r-20 text-400">Rate the product</label>
           <!-- <div class="inline-block f-left">
              <rating formcontrolname="rating" style="float:left; padding-top: 10px;" _nghost-c7="" class="ng-untouched ng-pristine ng-valid">
<span _ngcontent-c7="" aria-valuemin="0" class="rating" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">
    <span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="1">☆</i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="2">☆</i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="3">☆</i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="4">☆</i>
    </span><span _ngcontent-c7="">
        <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="5">☆</i>
    </span>
</span>
</rating>
            </div>-->
             <section class='rating-widget'>
              <div class='rating-stars text-center'>
            
                <ul id='stars'>
            
                  <li class='star' title='Poor' data-value='1'>
            
                    <i class='fa fa-star fa-fw'></i>
            
                  </li>
            
                  <li class='star' title='Fair' data-value='2'>
            
                    <i class='fa fa-star fa-fw'></i>
            
                  </li>
            
                  <li class='star' title='Good' data-value='3'>
            
                    <i class='fa fa-star fa-fw'></i>
            
                  </li>
            
                  <li class='star' title='Excellent' data-value='4'>
            
                    <i class='fa fa-star fa-fw'></i>
            
                  </li>
            
                  <li class='star' title='WOW!!!' data-value='5'>
            
                    <i class='fa fa-star fa-fw'></i>
            
                  </li>
            
                </ul>
            
              </div>
              <input type="hidden" name="rating_star" value="" id="rating_star">
            </section>
          </div>
          <div class="wp-50  o-hidden f-left">
            <div class="max-w-500 mar-t--10">
              <div class="text-center pad-tb-10">
                 <button type="button" class="btn btn-red h-40 text-white center-block wp-xs-100 mar-t-xs-10 border-r-3 btn-sub review_submit" >Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12 col-lg-3 right-container">
      <div class="bg-grey pad-tb-15 pad-l-15">
        <p class="f-size-14 text-400 b-text pad-tb-10">What makes a good review</p>
        <p class="f-size-12 pad-tb-5">Have you used this product? It's always better to review a product you have personally experienced.</p>
        <p class="f-size-12 pad-tb-5">Educate your readers Provide a relevant, unbiased overview of the product. Readers are interested in the pros and the cons of the product.</p>
        <p class="f-size-12 pad-tb-5">Be yourself, be informative Let your personality shine through, but it's equally important to provide facts to back up your opinion.</p>
        <p class="f-size-12 pad-tb-5">Get your facts right! Nothing is worse than inaccurate information. If you're not really sure, research always helps.</p>
        <p class="f-size-12 pad-tb-5">Stay concise Be creative but also remember to stay on topic. A catchy title will always get attention!</p>
        <p class="f-size-12 pad-tb-5">Easy to read, easy on the eyes A quick edit and spell check will work wonders for your credibility. Also, break reviews into small, digestible paragraphs.</p>
      </div>
    </div>
  </div>
</div>



<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="sorryModal" role="dialog" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-label="Close" class="close absolute top-10 right-15" data-dismiss="modal" style="z-index: 999;" type="button">
          <span aria-hidden="true">×</span>
        </button>
        <div class="modal-body text-center">
          <img src="images/done.png">
          <h3 class="f-size-28 text-500 pad-tb-20">Great</h3>
          <p class="text-grey f-size-16 max-w-200 center-block mar-tb-30">Review was successfully submitted.</p>
          <button class="btn btn-red w-200 mar-t-20 h-40 text-white" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
</div>
</review>
</div>

<?php require_once('footer.php');?>

	

  