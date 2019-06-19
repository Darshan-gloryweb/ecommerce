<?php
require_once('db.php'); 
include('include/start_session.php'); 
$title = 'Bulk Order | '.$mywebsitename; 
require_once('include/function.php'); 
require_once('header-inner.php');
?>
<script type="text/javascript" src="<?=$frontpath?>/js/bulkorder.js"></script>
<script type="text/javascript" src="<?=$frontpath?>/js/custom.js"></script>

<div class="container-fluid pad-lr-md-0" style="margin-top: 0px;">
  <router-outlet></router-outlet><bulk-enquiry><div class="bg-white container-fluid bulk-enquiry mar-t-10 mar-t-xs-0 mar-lr-xs--15">
<div class="row row-eq-height pad-lr-xs-15 bulk-enquiry-bg">
    <div class="col-md-8 center-block no-border-xs pad-b-30  mar-t-xs-20 pad-t-xs-5">
     <router-outlet></router-outlet><create-enquiry-component><div id="create_rfq">
    <!----><!---->
        <h1 class="l-text f-size-20 pad-t-20 f-size-18 text-400 mar-t-10 mar-b-10 text-center">Buying for Your Business ? Get the Best Quotes</h1>
        <p class="no-margin text-center pad-b-15 f-size-12 text-grey">Fill in the below fields to help us serve you better.</p>
        <form novalidate="" class="ng-invalid ng-dirty ng-touched " id="bulk_order_form">
            <div class="relative ng-dirty ng-touched ng-invalid" formarrayname="products">
            
            
                <!----><div class="row ng-dirty ng-touched ng-valid tr_clone">
                    <div class="form-group col-sm-5 no-padding pad-l-15 pad-lr-xs-15">
                        <input class="form-control f-size-13 text-grey text-400 pad-tb-5 h-35 border-tr-r-0 border-br-r-0 ng-touched ng-dirty ng-valid" name="productName[]" id="prod_detail" placeholder="Product/Category Details*" type="text">
                        <!---->
                    </div>
                    <div class="form-group col-sm-4 border-darkblack-lpad-lr-xs-15">
                        <input class="form-control f-size-13 text-grey pad-tb-5 text-400 h-35 relative left--1 b-l-xs-1 ng-dirty ng-valid ng-touched" name="quantity[]" id="prod_qty" maxlength="3" min="0" placeholder="Qty*" type="number">
                        <!---->
                    </div>
                    <div class="form-group col-sm-3 pad-lr-xs-15">
                        <input class="form-control f-size-13 text-grey pad-tb-5 text-400 h-35 ng-touched ng-dirty ng-valid" name="brand[]" placeholder="Brand*" type="text" id="brand">
                        <!---->
                    </div>
                    
                    <!---->
                    <div class="pad-b-30 pad-lr-15">
                            <div class="pad-t-5">
                               
                                
                               <input type="button" name="add" value="+ Add Product / Category" class="tr_clone_add wp-100 btn inline-block f-left h-35 rfq_addbtn text-center" disabled="disabled">
                              <!-- <button class="wp-100 btn inline-block f-left h-35 rfq_addbtn text-center" disabled="disabled">+ Add Product / Category</button>-->
                                
                            </div>
                        </div>
                </div>
                
                
                
                
                
                
            </div>
            <div class="pad-tb-10 pointer">
                <label>                     
                     <input type="checkbox" class="bus_che" name="isbusiness" value="0"> 
                     <span class="checkbox b-text f-size-14">I am a business customer</span>                    
                </label>
            </div>
            <div class="login-form " id="bdetails">
                 
                    <!----><div class="row business_details">
                                <div class="form-group col-sm-6">
                                    <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-valid ng-touched" name="companyname" placeholder="Business Name" type="text">
                                </div>
                                <div class="form-group col-sm-6">
                                        <select class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-valid ng-touched" name="buyertype">
                                            <option selected="true" value="">Industry</option>
                                            <!----><option value="1">Manufacturer</option><option value="2">Retailer</option><option value="3">Reseller</option><option value="4">Corporate</option><option value="5">Individual</option>
                
                                        </select>
                                        
                                    </div>
                                <div class="form-group col-sm-6">
                                                <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-valid ng-touched" name="gstno" placeholder="GSTIN" type="text">
                                                <!---->
                                                <!---->
                                            </div>
								<div class="form-group col-sm-6">
                                                <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-valid ng-touched" name="panno" placeholder="PAN NO" type="text">
                                            </div>
                           </div>
                         
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-invalid ng-touched" name="firstname" placeholder="First Name*" type="text" required="required">
                        <!---->
                    </div>
                    <div class="form-group col-sm-6">
                        <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-untouched ng-pristine ng-valid" name="lastname" placeholder="Last Name" type="text">
                        <!---->
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-invalid ng-touched" name="email" placeholder="Email*" type="email">
                        <!---->
                        <!---->

                    </div>
                    <div class="form-group col-sm-6">
                        <input class="form-control f-size-13 text-grey pad-tb-5 h-35 ng-pristine ng-invalid ng-touched" name="phoneno" id="pwd" maxlength="10" minlength="10" placeholder="Phone No*" type="text">
                        <!---->
                        <!---->
                    </div>
                </div>

                <div class="row pad-b-30">
                    <div class="col-sm-12">
                        <textarea class="f-size-14 h-70 form-control ng-pristine ng-valid ng-touched" name="description" maxlength="250" placeholder="Write product description here"></textarea>
                    </div>
                </div>
               <div class="row mar-t-20">
                    <div class="form-group col-sm-12 text-center">
                       <?php /*?> <button class=" h-45 f-size-16 font-500 btn btn-default btn-red text-white text-center inline-block h-35 submit_rfq" type="submit">Submit RFQ
                        </button><?php */?>
                        <input type="submit"  value="Submit RFQ"  class="h-45 f-size-16 font-500 btn btn-default btn-red text-white text-center inline-block h-35 submit_rfq"/>
                        
                    </div>
                </div>
                
            </div>
        </form>
    

    <!---->
</div>


<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="sorryModal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close absolute top-10 right-15" data-dismiss="modal" style="z-index: 999;" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body text-center">
                    <img src="https://cdnx1.moglix.com/img/others/cancel.png">
                    <h3 class="f-size-28 text-500 pad-tb-20">Sorry</h3>
                    <p class="text-grey f-size-16 max-w-200 center-block mar-tb-30">Fields marked by * cannot be left blank.</p>
                    <button class="btn btn-red w-200 mar-t-20 h-35 text-white" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div></create-enquiry-component>
    </div>
</div>

<div class="three-simple-steps row-eq-height pad-lr-xs-15 pad-tb-80 light-blue-bg">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h3 class="text-center">How it Works</h3> 
        <div class="col-sm-4 col-xs-4 pad-b-xs-40 res-100">
            <img class="pad-tb-15 wp-45 center-block block" src="images/place_rfq.png">
            <h4 class="pad-t-10 text-center f-size-15">1.Place RFQ.</h4>
            <p class="text-center pad-lr-15 lh-22">You can place your requests manually.</p>
        </div>
       
        <div class="col-sm-4 col-xs-4 pad-b-xs-40 res-100">
            <img class="pad-tb-15 wp-45 center-block block" src="images/receive_quotes.png">
            <h4 class="pad-t-10 text-center f-size-15">2.Receive Quotes</h4>
            <p class="text-center pad-lr-15 lh-22">Our executives will review and quote within 24 hrs.</p>
        </div>
        
        <div class="col-sm-4 col-xs-4 pad-b-xs-40 res-100">
            <img class="pad-tb-15 wp-45 center-block block" src="images/finalize.png">
            <h4 class="pad-t-10 text-center f-size-15">3.Finalize</h4>
            <p class="text-center pad-lr-15 lh-22">Once you like the quotes, lets finalize and deliver your product.</p>
        </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
  <div class="customer_review pad-lr-30 pad-lr-xs-15 row row-eq-height pad-tb-30 bg-white">
      <div class="col-md-12">
         
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    <h3 class="text-center pad-tb-20">Customer Testimonials</h3>

                    <owl-carousel class="ng-tns-c7-2">
                    <owl-carousel-child class="owl-theme owl-carousel owl-loaded owl-drag" style="display: block;">
                    <!---->
                    <div class="owl-stage-outer"><div class="owl-stage1" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                    <div class="owl-item active">
                        <div class="review-col clearfix h-xs-auto">
                        <div class="col-md-3 col-xs-6 review-img-bg no-padding pad-l-20">
                           <img class="wp-100 wp-xs-85 pad-b-xs-15 pad-t-15 img-circle" src="images/rivigo_logo.png">
                        </div>
                        <div class="bulk-review-cont col-md-9 col-xs-12">
                           
                           <p class="f-size-12 testimonial_text">Our association with Moglix has been worthwhile since day one. Moglix has done a tremendous job in procuring quality laden, hard to find equipment for us. They offered us a complete package at a reasonable budget and continued to fine tune it as per our directions. Kudos!</p>
                               <h4 class="f-size-12  pad-t-10"><strong>Mr Sachin Singh</strong></h4>
                               <h6 class="f-size-12"><strong>Rivigo</strong></h6>
                          </div>
                        </div>
                      </div>
                    <div class="owl-item">
                        <div class="review-col clearfix h-xs-auto">
                        <div class="col-md-3 col-xs-6 review-img-bg no-padding pad-l-20">
                           <img class="wp-100 wp-xs-85 pad-b-xs-15 pad-t-15 img-circle" src="images/wwf_logo.png">

                        </div>
                        <div class="bulk-review-cont col-md-9 col-xs-12">
                           
                           <p class="f-size-12 testimonial_text">Procuring safety products have never been simpler..we are very impressed with the quality of range and the treatment we get at Moglix... We are very much satisfied and now look forward to explore other supplies as well, else than Safety.</p>
                               <h4 class="f-size-12  pad-t-10"><strong>Ms Renu Atwal</strong></h4>
                               <h6 class="f-size-12"><strong>WWF-India</strong></h6>
                          </div>
                        </div>
                      </div>
                    <div class="owl-item">
                        <div class="review-col clearfix h-xs-auto">
                        <div class="col-md-3 col-xs-6 review-img-bg no-padding pad-l-20">
                           <img class="wp-100 wp-xs-85 pad-b-xs-15 pad-t-15 img-circle" src="images/wwf_logo.png">
                        </div>
                        <div class="bulk-review-cont col-md-9 col-xs-12">
                           
                           <p class="f-size-12 testimonial_text">Procuring safety products have never been simpler..we are very impressed with the quality of range and the treatment we get at Moglix... We are very much satisfied and now look forward to explore other supplies as well, else than Safety.</p>
                               <h4 class="f-size-12  pad-t-10"><strong>Ms Renu Atwal</strong></h4>
                               <h6 class="f-size-12"><strong>WWF-India</strong></h6>
                          </div>
                        </div>
                      </div>
                          
                       </div></div>
                       </owl-carousel-child>
                       </owl-carousel>
          </div>
          <div class="col-md-1"></div>
        </div>
          </div>
          <div class="row row-eq-height pad-tb-30 faq-bulk-enquiry">
              <div class="col-md-12 ">
                  <div class="col-md-2"></div>
                     <div class="col-md-8">
                      <h3 class="text-center pad-tb-20">FAQ's</h3>  
                       <div class="panel-group" id="accordion">
                           <div class="panel panel-default">
                               <div class="panel-heading">
                                 <p class="panel-title">
                                   <span aria-expanded="false" class="f-size-14 inline-block pad-lr-5 pointer accordion-toggle colbox wp-100" data-parent="#accordion" data-toggle="collapse" href="#collapseOne"> <i class="more-less glyphicon glyphicon-plus"></i>
                                      How do I submit a RFQ?
                                   </span>
                                 </p>
                               </div>
                               <div class="panel-collapse collapse" id="collapseOne">
                                 <div class="panel-body pad-tb-15 f-size-13 pad-l-20">
                                 <span class="lh-22"> 
                                    An RFQ (Request for Quote) is a purchase request by the buyer to request quotes from Moglix. You
                                    submit all the detail information of your wanted product in a purchase request, and our team of
                                    executives will source the products you want to buy. Moglix can save you a lot of time compared to
                                    searching your products directly. Fill in the required fields on the RFQ page and our team will contact you in due time.
                                 </span> 
                                 </div>
                               </div>
                          </div>
                               <div class="panel panel-default">
                                       <div class="panel-heading">
                                           <p class="panel-title">
                                               <span aria-expanded="false" class="f-size-14 inline-block pad-lr-5 pointer accordion-toggle colbox wp-100" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo"><i class="more-less glyphicon glyphicon-plus"></i>
                                                  What kind of RFQs will not be accepted?
                                               </span>
                                             </p>
                                       </div>
                                       <div class="panel-collapse collapse  " id="collapseTwo">
                                         <div class="panel-body pad-tb-15 f-size-13 pad-l-20">
                                         <span class="lh-22"> 
                                           1. Requests not sent from a verified email address: The buyer's email address should be verified before
                                           posting a buying request.
                                           <br>
                                           2. Lack of key information: Necessary information: product name included in the subject, and other
                                           product details in the body part, such as size, color, type, and any other specifications. The more
                                           descriptive you can be the better.
                                           <br>
                                           3. Banned or restricted products (including trademarked/branded goods): It is highly suggested to
                                           contact the owner or authorized distributor of any trademarked/branded product to buy it.
                                           <br>
                                           4. Duplicate Buying Request regarding the same product.
                                           <br>
                                           5. Small order quantity: Larger MOQ (minimum order quantity) orders tend to be preferred. Note that
                                           MOQ will vary depending on the product type.
                                           <br>
                                           6. Make sure you provide your company's GSTIN and PAN No. correctly. 
                                           
                                         </span> 
                                         </div>
                                       </div>
                               </div>
                                   <div class="panel panel-default">
                                           <div class="panel-heading">
                                               <p class="panel-title">
                                                <span aria-expanded="false" class="f-size-14 inline-block pad-lr-5 pointer accordion-toggle colbox wp-100" data-parent="#accordion" data-toggle="collapse" href="#collapseThree"><i class="more-less glyphicon glyphicon-plus"></i> Why can't I submit a RFQ?
                                                </span>
                                               </p>
                                           </div>
                                           <div class="panel-collapse collapse  " id="collapseThree">
                                             <div class="panel-body pad-b-15 f-size-13">
                                             <p class="mar-t--5 lh-22"> 
                                                1. There might be some blank(s) left. Please double check and fill in all the fields with product details as
                                                required.
                                                <br>
                                                
                                                2. There might be some problem with the browser. Please use another browser or clear the cache and
                                                cookies to try again.
                                             </p> 
                                             </div>
                                           </div>
                                   </div>
                                   <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <p class="panel-title">
                                           <span aria-expanded="false" class="f-size-14 inline-block pad-lr-5 pointer accordion-toggle colbox wp-100" data-parent="#accordion" data-toggle="collapse" href="#collapseFour"> <i class="more-less glyphicon glyphicon-plus"></i>When will I receive a quote for my RFQ?
                                           </span>
                                          </p>
                                      </div>
                                      <div class="panel-collapse collapse  " id="collapseFour">
                                        <div class="panel-body pad-b-15 f-size-13">
                                        <p class="mar-t--5 lh-22 "> 
                                            As soon as you submit your query our team of executives will get on the job to providing you with best possible quote. Once the request is shared by the buyer our team will get in touch with you within
                                            24hours to get a better understanding of your request. As soon as the request gets finalized our team will provide you with the best priced quote within 48hours and once all the payment terms are finalized
                                            products get delivered to your doorstep within 10-15 days.
                                        </p> 
                                        </div>
                                      </div>
                              </div>
                              </div>
                       </div>
                      <div class="col-md-2"></div>
                   </div>
           </div> 
           <div class="row pad-tb-30 bulk-request">
            <h3 class="text-center pad-tb-20 text-white">Get started. Request for your bulk quote now.</h3>
          <button class="f-size-16 h-45 font-500 btn btn-default btn-red text-white text-center block  center-block" id="create-request-btn">Create RFQ
          </button>
          
           </div>
          </div>


</bulk-enquiry>
</div>
<script>
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
<script>
if ($('#create-request-btn').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#create-request-btn').addClass('show');
            } else {
                $('#create-request-btn').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#create-request-btn').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}


</script>
<script>
$("#prod_detail, #prod_qty, #brand").on("keyup", function(){
    if($(this).val() != "" && $("#prod_qty").val() != "" && $("#brand").val() != "" ){
        $(".rfq_addbtn").removeAttr("disabled");
    }
});

$("#prod_detail, #prod_qty, #brand").on("change", function(){
    if($(this).val() != "" && $("#prod_qty").val() != "" && $("#brand").val() != "" ){
        $(".rfq_addbtn").removeAttr("disabled");
    }
});

$('.rfq_addbtn').click(function(){
        $('.rfq_addbtn').prop('disabled', false);
});
</script>
<!-- /table#table-data -->
<?php require_once('footer-inner.php');?>
