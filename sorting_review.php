<?php

require_once('db.php');

header("Content-type: text/javascript");

  $_POST['pro_id'];



if(isset($_POST['sorting'])){

if($_POST['sorting'] == 'most-recent-reviw'){

$sqlreview  = "SELECT *
                    FROM customerreview
                    INNER JOIN customer ON customerreview.customerid = customer.CustomerID
                    where customerreview.productid =".$_POST['pro_id']." AND customerreview.status =1 ORDER BY date DESC limit 5
                    ";

//$sqlreview = "select * from customerreview where productid =".$_POST['pro_id']." and status =1 ORDER BY date DESC limit 2" ;

   $resreview = mysqli_query($dbLink,$sqlreview);

  



while($datareview = $resreview->fetch_assoc()) {?>



    
<div class="row pad-tb-30">
                       <div class="col-sm-3 f-left">
                          <div class="cust_review">
                             <rating style="float:left" _nghost-c7="" class="ng-untouched ng-pristine ng-valid">
                                <span _ngcontent-c7="" aria-valuemin="0" class="rating readonly" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">
                                   <?php  
                                   //echo $datareview['ratings'];
                                   for($x=1;$x<=$datareview['ratings'];$x++) {
                                      echo '<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="1">☆</i>';
                                      
                                    }
                                    while ($x<=5) {
                                      echo'<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half0" title="1">☆</i>';
                                      $x++;
                                    }?>
                                   
                                   </span>
                                </span>
                             </rating>
                          </div>
                          <div class="clearfix"></div>
                          
                          <h3 class="f-size-16 pad-tb-10 text-400"><?php echo $datareview['FirstName'];?></h3>
                          <h5 class="f-size-14 text-grey pad-b-30 pad-b-xs-5 no-margin"><?php echo $datareview['date'];?></h5>
                          <!---->
                          <h5 class="f-size-12 pad-b-30 text-green pad-b-xs-5 no-margin">Verified User
                          </h5>
                       </div>
                       <div class="col-sm-9 f-left">
                          <h3 class="f-size-16"><?php echo $datareview['rating_title'];?></h3>
                          <p class="f-size-14 mar-t-20"><?php echo $datareview['descr'];?></p>
                          <div class="cust_suggestion o-hidden mar-t-20 no-margin-xs">
                             <span class="inline-block f-left pad-tb-10 lh-22 pad-r-20 f-size-14">1 of 1 users found this review helpful. Was this review helpful?</span>
                             
                            <?php if(isset($_SESSION['Email'])) {

                               echo "<button class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 like_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-up'></i>
                               </button>
                               <button class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 dislike_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-down'></i>
                               </button>";

                             }else{?>

                                <a class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 ' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-up'></i>
                                 </a>
                                 <a class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 login_redirect' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-down'></i>
                                 </a>
                            <?php  }?>
                          </div>
                       </div>
                    </div>


  <?php  }

}

if($_POST['sorting'] == 'most-helpful-reviw'){

 $sqlreview  = "SELECT *
                    FROM customerreview
                    INNER JOIN customer ON customerreview.customerid = customer.CustomerID
                    where customerreview.productid =".$_POST['pro_id']." AND customerreview.status =1 AND customerreview.review_action >=1 ORDER BY date DESC limit 5
                    ";
    //exit;
    //$sqlreview = "select * from customerreview where productid =".$_POST['pro_id']." and status =1 and review_action =1 ORDER BY date DESC limit 2" ;

   $resreview = mysqli_query($dbLink,$sqlreview);

  



while($datareview = $resreview->fetch_assoc()) {?>



<div class="row pad-tb-30">
                       <div class="col-sm-3 f-left">
                          <div class="cust_review">
                             <rating style="float:left" _nghost-c7="" class="ng-untouched ng-pristine ng-valid">
                                <span _ngcontent-c7="" aria-valuemin="0" class="rating readonly" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">
                                   <?php  
                                   //echo $datareview['ratings'];
                                   for($x=1;$x<=$datareview['ratings'];$x++) {
                                      echo '<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="1">☆</i>';
                                      
                                    }
                                    while ($x<=5) {
                                      echo'<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half0" title="1">☆</i>';
                                      $x++;
                                    }?>
                                   
                                   </span>
                                </span>
                             </rating>
                          </div>
                          <div class="clearfix"></div>
                          
                          <h3 class="f-size-16 pad-tb-10 text-400"><?php echo $datareview['FirstName'];?></h3>
                          <h5 class="f-size-14 text-grey pad-b-30 pad-b-xs-5 no-margin"><?php echo $datareview['date'];?></h5>
                          <!---->
                          <h5 class="f-size-12 pad-b-30 text-green pad-b-xs-5 no-margin">Verified User
                          </h5>
                       </div>
                       <div class="col-sm-9 f-left">
                          <h3 class="f-size-16"><?php echo $datareview['rating_title'];?></h3>
                          <p class="f-size-14 mar-t-20"><?php echo $datareview['descr'];?></p>
                          <div class="cust_suggestion o-hidden mar-t-20 no-margin-xs">
                             <span class="inline-block f-left pad-tb-10 lh-22 pad-r-20 f-size-14">1 of 1 users found this review helpful. Was this review helpful?</span>
                             
                            <?php if(isset($_SESSION['Email'])) {

                               echo "<button class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 like_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-up'></i>
                               </button>
                               <button class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 dislike_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-down'></i>
                               </button>";

                             }else{?>

                                <a class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 ' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-up'></i>
                                 </a>
                                 <a class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 login_redirect' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-down'></i>
                                 </a>
                            <?php  }?>
                          </div>
                       </div>
                    </div>


 <?php   }

}

}

if(isset($_POST['filter'])){

if($_POST['rat_val'] == 0){
   $sqlreview  = "SELECT *
                    FROM customerreview
                    INNER JOIN customer ON customerreview.customerid = customer.CustomerID
                    where customerreview.productid =".$_POST['pro_id']." AND customerreview.status =1 ORDER BY date DESC limit 5
                    ";
 
   // $sqlreview = "select * from customerreview where productid =".$_POST['pro_id']." and ratings =".$_POST['rat_val']." ORDER BY date DESC limit 2" ;

  
}else{
  
                    $sqlreview  = "SELECT *
                    FROM customerreview
                    INNER JOIN customer ON customerreview.customerid = customer.CustomerID
                    where customerreview.productid =".$_POST['pro_id']." AND customerreview.status =1 AND customerreview.ratings =".$_POST['rat_val']." ORDER BY date DESC limit 5
                    ";
}

   $resreview = mysqli_query($dbLink,$sqlreview);



while($datareview = $resreview->fetch_assoc()) {?>


<div class="row pad-tb-30">
                       <div class="col-sm-3 f-left">
                          <div class="cust_review">
                             <rating style="float:left" _nghost-c7="" class="ng-untouched ng-pristine ng-valid">
                                <span _ngcontent-c7="" aria-valuemin="0" class="rating readonly" role="slider" tabindex="0" aria-valuemax="5" aria-valuenow="5">
                                   <?php  
                                   //echo $datareview['ratings'];
                                   for($x=1;$x<=$datareview['ratings'];$x++) {
                                      echo '<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half100" title="1">☆</i>';
                                      
                                    }
                                    while ($x<=5) {
                                      echo'<span _ngcontent-c7="">
                                   <i _ngcontent-c7="" data-icon="★" class="star-icon half0" title="1">☆</i>';
                                      $x++;
                                    }?>
                                   
                                   </span>
                                </span>
                             </rating>
                          </div>
                          <div class="clearfix"></div>
                          
                          <h3 class="f-size-16 pad-tb-10 text-400"><?php echo $datareview['FirstName'];?></h3>
                          <h5 class="f-size-14 text-grey pad-b-30 pad-b-xs-5 no-margin"><?php echo $datareview['date'];?></h5>
                          <!---->
                          <h5 class="f-size-12 pad-b-30 text-green pad-b-xs-5 no-margin">Verified User
                          </h5>
                       </div>
                       <div class="col-sm-9 f-left">
                          <h3 class="f-size-16"><?php echo $datareview['rating_title'];?></h3>
                          <p class="f-size-14 mar-t-20"><?php echo $datareview['descr'];?></p>
                          <div class="cust_suggestion o-hidden mar-t-20 no-margin-xs">
                             <span class="inline-block f-left pad-tb-10 lh-22 pad-r-20 f-size-14">1 of 1 users found this review helpful. Was this review helpful?</span>
                             
                            <?php if(isset($_SESSION['Email'])) {

                               echo "<button class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 like_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-up'></i>
                               </button>
                               <button class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 dislike_btn' data-attr=".$_SERVER['REMOTE_ADDR']." data-value=".$rows['ProductID']." data-type=".$datareview['crid'].">
                               <i class='fa fa-thumbs-down'></i>
                               </button>";

                             }else{?>

                                <a class='btn f-left bg-trans border-l-grey pointer f-size-14 pad-lr-25 ' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-up'></i>
                                 </a>
                                 <a class='btn f-left mar-l-10 bg-trans border-l-grey pointer f-size-14 pad-lr-25 login_redirect' href="<?php echo $frontpath;?>/login.php">
                                 <i class='fa fa-thumbs-down'></i>
                                 </a>
                            <?php  }?>
                          </div>
                       </div>
                    </div>


<?php 
   }

}

if(isset($_POST['review_action'])){

  

  if($_POST['review_action'] == 'like'){



    $sqlrr = "select review_action from customerreview where productid = ".$_POST['pro_id']." and crid =".$_POST['crid'];

    $resrr = mysqli_query($dbLink,$sqlrr);

    $datarr=$resrr->fetch_assoc();

    $datarr['review_action'];

    //print_r($datarr);
    if($datarr['review_action'] == "")
    {
      $lates_count = 1;
    }else{

      $lates_count = $datarr['review_action']+1;

    }



      $sqlreview = "update customerreview set review_action= ".$lates_count." WHERE productid = ".$_POST['pro_id']." and crid =".$_POST['crid'];

      $resreview = mysqli_query($dbLink,$sqlreview);



      if($resreview){

        echo $pro_div = "<div class='text-red'>Thanks for your Feedback</div>";

        

        

      }



  }

   if($_POST['review_action'] == 'dislike'){
$sqlrr = "select review_action from customerreview where productid = ".$_POST['pro_id']." and crid =".$_POST['crid'];

    $resrr = mysqli_query($dbLink,$sqlrr);

    $datarr=$resrr->fetch_assoc();

    
    if($datarr['review_action'] == "")
    {
      $lates_count = 0;
    }else{

      $lates_count = $datarr['review_action'];

    }
      $sqlreview = "update customerreview set review_action= ".$lates_count." WHERE productid = ".$_POST['pro_id']." and crid =".$_POST['crid'];
//exit;
      $resreview = mysqli_query($dbLink,$sqlreview);

      if($resreview){ echo $pro_div = "<div class='text-red'>Thanks for your Feedback</div>";}

  }



}



if(isset($_POST['review_submit_form'])){

   $pro_div = $_POST['pro_id'];

   $pro_div.=$_POST['descr'];

   $pro_div.=$_POST['title'];

   $date = date('Y-m-d h:i:s');

   $ipaddress=$_SERVER['REMOTE_ADDR'];

   $rating_star = $_POST['rating_star'];

   

     $sqlreview = "insert into  customerreview(productid,customerid,ratings,rating_title,descr,date,ipaddress)values (".$_POST['pro_id'].",".$_POST['crid'].",".$rating_star.",'".$_POST['title']."','".$_POST['descr']."','".$date."','".$ipaddress."')" ;
   $resreview = mysqli_query($dbLink,$sqlreview);



   if($resreview){echo $pro_div="inserted";}



   

}

	







?>