<?php  require_once('db.php'); ?>
<?php $title = $mywebsitename; ?>
<?php require_once('header.php');?>
<link href="css/style-category.css" rel="stylesheet">








<?php 

	$sqlcat = "select * from category where CategoryID = ".$_GET['cat_id']."";
	$rescat = mysqli_query($dbLink,$sqlcat) or die("can not select   Category");   
    $datacat = $rescat->fetch_assoc();


     $sqlsubcat = "select count(*) as total from category where parent = ".$datacat['parent']."";
	$ressubcat = mysqli_query($dbLink,$sqlsubcat) or die("can not select  sub Category");
	$datasubcat = $ressubcat->fetch_assoc();
  ?>


<div class="container-fluid" style="margin-top: 0px;">
                    <router-outlet></router-outlet>
                    <category class="ng-star-inserted">
                        <loader _nghost-c10="">
                            <!---->
                        </loader>
                        <div class="container-fluid pad-t-15 hidden-xs-down pad-lr-30">
                            <div class="row">
                                <div class="col-sm-12 no-padding">
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid category pad-lr-30 pad-b-15 pad-t-xs-15 pad-lr-xs-15">
                            <div class="row">
                                <div class="col-md-2 no-padding pad-r-10">
                                    <div class="container-fluid bg-white prod_filter hp-100">
                                        <filter _nghost-c11="">
                                            <!---->
                                            <div _ngcontent-c11="" class="row enabled-filter ng-star-inserted">
                                                <!---->
                                                <!---->
                                                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                                                    <h4 _ngcontent-c11="" class="sidebar-category f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo0">category</h4>
                                                    <!---->
                                                    <ul _ngcontent-c11="" class="no-padding no-list-style no-margin pad-t-10 pad-l-5 collapse max-200 minus in ng-star-inserted" id="demo0">
                                                        <!---->
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one0"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Electricals" href="https://www.moglix.com/electricals/211000000">Electricals</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one0">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two0"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/measurement-testing/electrical-power-testing/115110000">Electrical Power Testing</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two0">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/measurement-testing/electrical-power-testing/flexible-current-probes/115114600">Flexible Current Probes</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two1"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/pumps-motors/motors/123140000">Motors</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two1">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/pumps-motors/motors/general-purpose-motors/123141100">General Purpose Motors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two2"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/211110000">Switches &amp; Sockets</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two2">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/switches/211111100">Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/sockets/211111200">Sockets</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/tv-antenna-outlet/211111300">TV Antenna Outlet</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/switch-socket-combinations/211111400">Switch &amp; Socket Combinations</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/fan-regulators/211111500">Fan Regulators</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/dimmer-controller/211111600">Dimmer Controller</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/fuse-flush/211111700">Fuse Flush</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/communication-jacks/211111800">Communication Jacks</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/telephone-jack/211111811">Telephone Jack</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/computer-jacks/211111812">Computer Jacks</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/receptors/211111813">Receptors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/motor-starter-switches/211111900">Motor Starter Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/lamp-holder/211112200">Lamp Holder</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/ceiling-rose/211112300">Ceiling Rose</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/switches-sockets-accessories/211112500">Switches &amp; Sockets Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/frames/211112514">Frames</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/plates-with-base-frame/211112515">Plates with Base Frame</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/cover-plates/211112517">Cover Plates</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/plates/211112518">Plates</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/boxes/211112519">Boxes</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/dlp-trunking/211112520">DLP Trunking</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/bell-indicator/211112600">Bell Indicator</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/buzzer/211112700">Buzzer</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/volume-controller/211112900">Volume Controller</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/cord-outlet/211113000">Cord Outlet</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/indicator/211113100">Indicator</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/hotel-hospitality/211113200">Hotel &amp; Hospitality</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/foot-lamp/211113300">Foot Lamp</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/door-bell/211113400">Door Bell</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/spike-guards/211113500">Spike Guards</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/plugs-sockets/211113800">Plugs &amp; Sockets</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/plugs/211113900">Plugs</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/plug-tops/211114000">Plug Tops</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/multi-plugs/211114100">Multi Plugs</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/enclosure/211114200">Enclosure</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/switches-and-sockets-accessories/211114300">Switchgear Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/flexicords/211114400">Flexicords</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/switches-sockets/audio-video-connector/211117700">Audio &amp; Video Connector</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two3"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/211120000">Circuit Breakers &amp; Fuses</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two3">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/motor-circuit-breakers/211121300">Motor Circuit Breakers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/mpcb/211121400">MPCB</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/rcbo/211121500">RCBO</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/switchgears-accessories/211121800">Switchgears Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/rcd/211121900">RCD</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/surge-protection-devices/211122000">Surge Protection Devices</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/mcb/211124500">MCB</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/rccb/211124600">RCCB</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/mccb/211124700">MCCB</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/fuses/211124800">Fuses</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/isolators/211124900">Isolators</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/fuse-holders/211126200">Fuse Holders</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/terminal-blocks/211126300">Terminal Blocks</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/circuit-breakers-fuses/air-circuit-breaker/211126400">Air Circuit Breaker</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two4"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/211135000">Distribution Boards</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two4">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/standard-distribution-boards/211135021">Standard Distribution Boards</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/modular-distribution-boards/211135022">Modular Distribution Boards</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/mcb-distribution-boards/211135028">MCB Distribution Boards</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/distribution-boards-accessories/211135100">Distribution Boards Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/distribution-boards/bus-bar/211135123">Bus Bar</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!---->
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/capacitors/211145600">Capacitors</a>
                                                      </label>
                                                                    <!---->
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two6"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/211150000">Relays &amp; Contactors</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two6">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/plug-in-relays/211151200">Plug In Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/thermal-overload-relay/211151300">Thermal Overload Relay</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/overload-relays/211151400">Overload Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/smart-relays/211151500">Smart Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/time-delay-relays/211151600">Time Delay Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/spares-for-contactors/211151700">Spares For Contactors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/contactors/211155300">Contactors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/control-relays/211155400">Control Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/electronic-timerrelay/211155500">Electronic Timer/Relay</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/relays-contactors/protective-relays/211155800">Protective Relays</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two7"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/meters-accessories/211160000">Meters &amp; Accessories</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two7">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/meters-accessories/meters/211165700">Meters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two8"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/211180000">Industrial Switches &amp; Controls</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two8">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/selector-switch/211181200">Selector Switch</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/time-switches/211181600">Time Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/actuators/211181900">Actuators</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/foot-switches/211182000">Foot Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/micro-switches/211182100">Micro Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/rotary-switches/211182200">Rotary Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/pushbutton-switch-hoists/211182300">Pushbutton Switch Hoists</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/proximity-sensors/211182400">Proximity Sensors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/pushbuttons/211185900">Pushbuttons</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/limit-switches/211186000">Limit Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/pilot-lights/211186100">Pilot Lights</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-switches-and-controls/thyristor-switch/211186200">Thyristor Switch</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two9"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/211190000">Wires &amp; Cables</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two9">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/low-tension-cables/211196529">Low Tension Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/high-tension-cables/211196530">High Tension Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/communication-networking-cables/211196600">Communication &amp; Networking Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/telephone-cables/211196632">Telephone Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/co-axial-cables/211196633">Co-Axial Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/cctv-cables/211196634">CCTV Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/submersible-cables/211196700">Submersible Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/industrial-wires-cables/211196800">Industrial Wires &amp; Cables</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/fan-flexible/211196835">Fan Flexible</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/wires-cables/mounting-cable-accessories/211196900">Mounting &amp; Cable Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two10"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-supplies-transformers/211210000">Power Supplies &amp; Transformers</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two10">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-supplies-transformers/power-supplies/211521100">Power Supplies</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two11"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/safety-disconnect-switches/211240000">Safety &amp; Disconnect Switches</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two11">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/safety-disconnect-switches/switch-disconnectors/211121600">Switch Disconnectors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/safety-disconnect-switches/switch-disconnectors-fuse-units/211121700">Switch Disconnectors Fuse Units</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/safety-disconnect-switches/solenoids-brakes/211241100">Solenoids &amp; Brakes</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/safety-disconnect-switches/changeover-switches/211241200">Changeover Switches</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two12"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/control-motor-starters/211510000">Control Motor Starters</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two12">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/control-motor-starters/automatic-motor-starters/211511100">Automatic Motor Starters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/control-motor-starters/manual-motor-starters/211511200">Manual Motor Starters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two13"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/211520000">Power Generation &amp; Transformers</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two13">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/batteries/121240000">Batteries</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/soft-starters/211521200">Soft Starters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/inverters/211521300">Inverters &amp; Home UPS</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/uninterrupted-power-supply-ups/211521400">Uninterrupted Power Supply (UPS)</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/stabilizers/211521500">Stabilizers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/solar-charge-controllers/211521600">Solar Charge Controllers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/current-transformers/211521700">Current Transformers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/inverter-trolleys/211521800">Inverter Trolleys</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/variable-frequency-drives/211521900">Variable Frequency Drives</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/power-generation-transformers/generators/211522000">Generators</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two14"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/211530000">Fans &amp; Blowers</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two14">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/ceiling-fans/211531100">Ceiling Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/table-pedestal-fans/211531200">Pedestal Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/ventilation-fans/211531300">Ventilation Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/fans-accessories/211531400">Fans Accessories</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/wall-mounted-fans/211531500">Wall Mounted Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/cooling-fans/211531600">Cooling Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/axial-fans/211531700">Axial Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/pressure-blowers/211531900">Pressure Blowers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/fans/table-fans/211532200">Table Fans</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two15"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-domestic-coolers/211540000">Industrial &amp; Domestic Coolers</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two15">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-domestic-coolers/air-coolers/211541100">Air Coolers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/industrial-domestic-coolers/desert-coolers/211541200">Desert Coolers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two16"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/geysers-heaters/211560000">Geysers &amp; Heaters</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two16">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/geysers-heaters/immersion-rods/211550000">Immersion Rods</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/geysers-heaters/water-heaters/211561200">Water Heaters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/geysers-heaters/room-heaters/211561300">Room Heaters</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two17"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/pump-accessories/211580000">Pump Accessories</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two17">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/pump-accessories/water-level-controllers/211581100">Water Level Controllers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two18"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/filters-purifiers/211590000">Filters &amp; Purifiers</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two18">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/cleaning/air-purifiers/121200000">Air Purifiers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/filters-purifiers/water-purifiers/211591100">Water Purifiers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/filters-purifiers/water-coolers/211591300">Water Coolers</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two19"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/heat-sinks/211700000">Heat Sinks</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two19">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/heat-sinks/fan-cooled-heat-sinks/211710000">Fan Cooled Heat Sinks</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/heat-sinks/natural-convection-heat-sinks/211720000">Natural Convection Heat Sinks</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!---->
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/insect-and-rodent-repellents/214191000">Insect and Rodent Repellents</a>
                                                      </label>
                                                                    <!---->
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one1"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Pumps &amp; Motors" href="https://www.moglix.com/pumps-motors/128000000">Pumps &amp; Motors</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one1">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two0"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/pumps-motors/motors/123140000">Motors</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two0">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/pumps-motors/motors/general-purpose-motors/123141100">General Purpose Motors</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one2"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Office Stationery &amp; Supplies" href="https://www.moglix.com/office-supplies/214000000">Office Stationery &amp; Supplies</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one2">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!---->
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/electricals/insect-and-rodent-repellents/214191000">Insect and Rodent Repellents</a>
                                                      </label>
                                                                    <!---->
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one3"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Cleaning &amp; Housekeeping" href="https://www.moglix.com/cleaning/121000000">Cleaning &amp; Housekeeping</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one3">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!---->
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/cleaning/air-purifiers/121200000">Air Purifiers</a>
                                                      </label>
                                                                    <!---->
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one4"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Measurement &amp; Testing" href="https://www.moglix.com/measurement-testing/115000000">Measurement &amp; Testing</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one4">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!----><i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer pad-r-5 ng-star-inserted" data-toggle="collapse" data-target="#lev_two0"></i>
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/measurement-testing/electrical-power-testing/115110000">Electrical Power Testing</a>
                                                      </label>
                                                                    <!---->
                                                                    <ul _ngcontent-c11="" class="collapse in no-padding no-margin pad-l-10 no-list-style ng-star-inserted" id="lev_two0">
                                                                        <!---->
                                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                                            <label _ngcontent-c11="">
                                                               <!----> <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/measurement-testing/electrical-power-testing/flexible-current-probes/115114600">Flexible Current Probes</a>
                                                            </label>
                                                                            <!---->
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li _ngcontent-c11="" class="ng-star-inserted">
                                                            <label _ngcontent-c11="">
                                                <i _ngcontent-c11="" aria-hidden="true" class="fa fa-angle-right pointer" data-toggle="collapse" data-target="#lev_one5"></i>
                                                <span _ngcontent-c11="" class="inline-block pad-l-5">
                                                <a _ngcontent-c11="" class="text-400 h-15 block w-120 o-hidden text-semiblack f-size-13" title="Deals" href="https://www.moglix.com/deals/311000000">Deals</a>
                                                </span>
                                                </label>
                                                            <!---->
                                                            <ul _ngcontent-c11="" class="collapse no-list-style no-padding no-margin pad-l-10 ng-star-inserted" id="lev_one5">
                                                                <!---->
                                                                <li _ngcontent-c11="" class="ng-star-inserted">
                                                                    <label _ngcontent-c11="">
                                                         <!---->
                                                         <a _ngcontent-c11="" class="text-400 text-semiblack f-size-13" href="https://www.moglix.com/deals/deals-under-499/311140000">Deals Under 499</a>
                                                      </label>
                                                                    <!---->
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <div _ngcontent-c11="" class="collapse category in" id="demo0">
                                                        <!---->
                                                        <!---->
                                                    </div>
                                                </div>
                                                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                                                    <h4 _ngcontent-c11="" class="sidebar-price f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo1">price</h4>
                                                    <!---->
                                                    <div _ngcontent-c11="" class="collapse price in" id="demo1">
                                                        <!---->
                                                        <!---->
                                                        <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                                                            <!---->
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 0 - <i class="fa fa-inr"></i> 100</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 101 - <i class="fa fa-inr"></i> 500</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 501 - <i class="fa fa-inr"></i> 1000</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 1001 - <i class="fa fa-inr"></i> 5000</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 5001 - <i class="fa fa-inr"></i> 10000</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);"><i class="fa fa-inr"></i> 10001 - *</div>
                                                                <!---->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                                                    <h4 _ngcontent-c11="" class="sidebar-brand f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin minus" data-toggle="collapse" data-target="#demo2">brand</h4>
                                                    <!---->
                                                    <div _ngcontent-c11="" class="collapse brand in" id="demo2">
                                                        <!----><input _ngcontent-c11="" class="form-control border mar-t-15 f-size-13 ng-star-inserted" filtersearchbox="" placeholder="Search brand" style="text-transform: capitalize;" type="text">
                                                        <!---->
                                                        <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                                                            <!---->
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    3M
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(14)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aavritii
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(75)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    ABB
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(998)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Accent
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Adaptor
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    ADI
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(17)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aeroguard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aerostar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    AG Flex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(18)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    AG Lite
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(20)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aircool
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Airkom
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(21)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Almonard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(17)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Alwin
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Amaron
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Anchor
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(982)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Anchor Roma
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Anjali
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Antech
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(59)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    AO Smith
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(20)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    APC
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(34)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aqua Fresh
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aqua Grand
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(11)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aquagrand
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aquaguard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Aquawire
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(50)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Avni D-lite
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(45)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    B-Five
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(22)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    B-Power
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Bajaj
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(257)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Baltra
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    BCI
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(76)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Belkin
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Bentex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(72)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Bizinto
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(8)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Black Cat
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(185)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Blackt Electrotech
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Bluebird
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(187)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Brudo
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Bug Mastrer
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    C&amp;S
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1052)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Cata
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(44)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Champion
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Chint
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(25)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Clearline
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Commscope
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Cona
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(14)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Cona Olive
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Cona Wawa
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Crabtree
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(487)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Credence
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(24)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Crompton
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(137)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Crompton Greaves
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(357)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    CSM
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Cyber Power
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Delton
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Dr. Aquaguard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(7)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Eaton
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    eBanny
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    EGK
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Ego
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Element 14
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(85)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Elettro
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(7)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Elpar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Emerson
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Epcos
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(88)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Eureka Forbes
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(24)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Eveready
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(42)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Everyday
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Exide
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(43)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Fatek
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Finecab
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(25)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Finolex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(533)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Fortuner
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Frendz
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Future
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(38)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Generic
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Genius
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Glen
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Glow Fixtures
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    GM
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(189)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Goldmedal
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(39)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    GreatWhite
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(108)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Green Dot
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Grenoble
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    G Solar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(79)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Havells
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1796)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HB Solar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Heady Daddy
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Hella
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(16)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Hi-Tech
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Hindware
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(42)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Hiwin
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HLF
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Honda
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HONEYWELL
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(17)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Hotstar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(13)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HPC
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HPL
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(110)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    HUL Pureit
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(7)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Humser
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    iBall
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Inalsa
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Intex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    J-BALS
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(24)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jacco
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(21)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jai Balaji
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jaquar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jetsons
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    JPK
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jupiter
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(278)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Jyoti
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(19)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kalinga
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(30)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kalinga Genuine
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(15)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kalinga Plus Rk
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(11)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kalinga RK
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(87)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kalptree
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Katlax
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(56)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kawachi
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    KEI
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1136)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Keltronic Dyna
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(84)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    kenstar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(7)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kent
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(77)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Khaitan
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kirloskar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(212)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    KOEL Chhota Chilli
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Kores
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Krocx
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Krykard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(10)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Larsen &amp; Toubro
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1050)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Lazer
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Legrand
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2755)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    LG
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Livguard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(8)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Livpure
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Lucent Lite
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Luminous
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(217)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Luxmi Solar
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Maharaja
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Maharaja Whiteline
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(42)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Marc
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(65)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Maya
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Mayur Gold
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    MCM
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Mersen
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Mersk
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Micromax
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Microtek
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(63)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Mitzvah
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Monitor
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(8)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Moonbow
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Morphy Richards
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(10)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Motwane
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Multybyte
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    MXVOLT
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(13)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Namibind
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Naresh
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Niki
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Numatic
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Nutronic
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(10)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Okaya
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Ooze
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(24)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Orbit
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Oreva
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(16)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Orient
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(515)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Orpat
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(82)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Padmini
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Padmini Essentia
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(16)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Panasonic
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(80)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Paras
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Parryware
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Philips
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Phoenix
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(27)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Pixel
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Plaza
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Pluton
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(15)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Polycab
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(233)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Premier
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(19)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Prestige
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Prodot
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(18)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Proskit
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Protek
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Pulstron
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(22)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Punta
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Pureit
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Quanta
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Racold
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Rahul
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(152)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Relaxo
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(13)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Reliable
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(52)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Reliance
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(146)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Rich &amp; Comfort
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(18)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    RISTACAB
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(51)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Robin Taper
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Robin Teper
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(10)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    RR
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(25)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    RR Kabel
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(22)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sameer
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(72)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Satec
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Schneider
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2344)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Servokon
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(67)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    SG Controls
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sheling
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Shimi
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Shivalik
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Shiv Power
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Siemens
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(362)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Singer
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sir-G
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    SKP
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    SKS Aquagrand Plus
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Skyline
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sky Power
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(49)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    S R Engineering
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Standard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(827)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Starlight
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Stronger
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Su-kam
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(21)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sunex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sunflame
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(13)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sunrex
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(19)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Sunshine
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(8)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Superdeal
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    SuperDeals
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(4)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Super Hylam
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Surety
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(49)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Surya
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(65)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Surya Maze
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Swadeshi
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(330)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Switch Control India
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(54)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Symphony
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(11)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Syska
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Tara
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(10)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Techno
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(41)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Testec
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    TouchTec
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Tracksun
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    True Sense
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Urja Lite
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(12)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Usha
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(53)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    USS
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    V-Guard
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(160)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    V-Pro
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Vantage
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Vartech
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(6)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Venus
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(111)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Veritek
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(23)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Vijay
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Virdi
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(9)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Visiontech
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    VMV
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Voltas
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(40)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Vontron
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Wayona
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Wellon
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(15)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Westec
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Westighouse
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(1)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Whirlpool
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(5)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Winner
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Wondercool
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Yokins
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(27)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Zebronics
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(2)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Zero B
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(3)</span>
                                                                </div>
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">
                                                                    Zodin
                                                                    <!----><span _ngcontent-c11="" style="padding-left: 2px;" class="ng-star-inserted">(22)</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                                                    <h4 _ngcontent-c11="" class="sidebar-discount f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin" data-toggle="collapse" data-target="#demo3">discount</h4>
                                                    <!---->
                                                    <div _ngcontent-c11="" class="collapse discount out" id="demo3">
                                                        <!---->
                                                        <!---->
                                                        <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                                                            <!---->
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">0 - 10</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">11 - 20</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">21 - 30</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">31 - 40</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">41 - 50</div>
                                                                <!---->
                                                            </li>
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">51 - *</div>
                                                                <!---->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div _ngcontent-c11="" class="col-sm-12 border-b pad-tb-15 ng-star-inserted">
                                                    <h4 _ngcontent-c11="" class="sidebar-availability f-size-15 text-capitalize text-500 pointer pad-l-5 no-margin" data-toggle="collapse" data-target="#demo4">availability</h4>
                                                    <!---->
                                                    <div _ngcontent-c11="" class="collapse availability out" id="demo4">
                                                        <!---->
                                                        <!---->
                                                        <ul _ngcontent-c11="" class="no-padding no-list-style no-margin max-200 ng-star-inserted" style="margin-top:15px !important;">
                                                            <!---->
                                                            <li _ngcontent-c11="" class="clearfix ng-star-inserted" style="padding: 2px 0px;">
                                                                <label _ngcontent-c11="" class="f-left filter-check mar-r-5">
                                                   <input _ngcontent-c11="" class="inline-block pad-r-10" name="filter" type="checkbox">
                                                   <span _ngcontent-c11="" class="inline-block pointer f-ock -13"></span>
                                                   </label>
                                                                <!---->
                                                                <div _ngcontent-c11="" class="f-left f-size-13 lh-17 ng-star-inserted" style="width: calc(100% - 30px);">Show in stock only</div>
                                                                <!---->
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---->
                                        </filter>
                                    </div>
                                </div>
                                <div class="col-md-10 bg-white pad-b-20 mar-lr-xs--15">
                                    <div class="pad-t-5 o-hidden">
                                        <breadcrump _nghost-c12="">
                                            <ul _ngcontent-c12="" class="bread-head no-margin hidden-sm-down">
                                                <li _ngcontent-c12="" class="f-size-12" tabindex="0">Home </li>
                                                <!---->
                                                <li _ngcontent-c12="" class="item f-size-12 ng-star-inserted">
                                                	<?php echo $datacat['CategoryName'];?>
                                                </li>
                                            </ul>
                                        </breadcrump>
                                    </div>
                                    <div class="container-fluid no-pad-xs pad-t-15">
                                        <!---->
                                        <div class="pad-lr-35 mar-lr--30 mar-lr-xs--15 mar-t--15 mar-b--10 ng-star-inserted" style="background: #f3f7f8;">
                                            <!---->
                                            <h1 class="f-size-20 f-size-xs-16 text-400 pad-t-15 pad-t-xs-15 ng-star-inserted">
                                                <?php echo $datacat['CategoryName'];?>
                                                <!----><span class="text-grey f-size-14 f-size-xs-13 text-400 pad-l-5 ng-star-inserted">( <?php echo $datasubcat['total'];?> Categories )</span>
                                            </h1>
                                            <sub-category class="ng-tns-c8-1"><!----><!---->
    <div class="row ng-tns-c8-1 ng-star-inserted" id="subcCategoryTop">
      <!----><!---->
      <?php 
      		  $sqlsubcat = "select * from category where parent = ".$_GET['cat_id']."";
			$ressubcat = mysqli_query($dbLink,$sqlsubcat) or die("can not select  sub Category");
    		while($datasubcat=$ressubcat->fetch_assoc()){?>
    			
    	 		
    

         <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 no-padding mar-t-10 pad-lr-10 wp-xs-50 pad-lr-xs-5 hidden-sm-down ng-tns-c8-1 ng-trigger ng-trigger-fade ng-star-inserted parent_cat_div">
            
            
            <div class="prod_block">
              <div class="prod_image bg-white">
                    <a class="pointer-none" href="#">
                    	<img class="img-fluid pointer" src="<?=$frontpath?>/CategoryIcon/<?php echo $datasubcat['ImageName'];?>" alt="<?php echo $datasubcat['CategoryName'];?>">
                     
                  </a>

              </div>
              <div class="prod_name text-center pad-lr-15 pad-tb-15 pad-lr-xs-0 pad-b-xs-5">
                  <a class="ng-tns-c8-1" href="#">
                      <h3 class="f-size-12 text-black text-400 lh-16"><?php echo $datasubcat['CategoryName'];?></h3>
                  </a>
              </div>
            </div>
          </div>
        <?php }?>

         



</div>
      
    </div>
    <div class="row ng-tns-c8-1 ng-star-inserted mar-b-10 mar-t-5">
        <!----><div class="col-sm-12 mar-b-20 hidden-sm-down text-center ng-tns-c8-1 ng-star-inserted"><a class="ng-tns-c8-1" href="#subcCategoryTop" pagescroll=""><button class="f-size-11 text-white b-text w-200" style="background: #313131 !important;" type="button">Show more</button></a></div>
      <!----><div class="col-sm-12 mar-b-20 hidden-sm-up text-center ng-tns-c8-1 ng-star-inserted"><a class="ng-tns-c8-1" href="#subcCategoryTop" pagescroll=""><button class="f-size-11 text-white b-text w-200" style="background: #313131 !important;" type="button" id="loadMore">Show more</button></a></div>
    </div>

</sub-category>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row o-hidden border-b prod_nav hidden-sm-down pad-t-20">
                                            <h1 class="col-sm-6 no-padding">
                                                <span class="f-size-18  pad-t-5 pad-lr-5 b-text text-400 inline-block f-left">
                                      <?php echo $datacat['CategoryName'];?>
                                       </span>
                                            </h1>
                                            <!---->
                                            <div class="col-sm-6 no-padding text-right ng-star-inserted">
                                                <sort-by class="block f-right">
                                                    <ul class="f-left inline_list no-margin no-padding hidden-sm-down">
                                                        <li class="text-500">SORT BY</li>
                                                        <li class="text-uppercase f-size-13 active">Popularity</li>
                                                        <li class="text-uppercase f-size-13 lowest_price" value="<?php echo $_GET['cat_id'];?>" data-attr = "<?php if(isset($_GET["page"])){echo intval($_GET["page"]);}else{echo 1;}?>">lowest price</li>

														<li class="text-uppercase f-size-13 height_price" value="<?php echo $_GET['cat_id'];?>" data-attr = "<?php if(isset($_GET["page"])){echo intval($_GET["page"]);}else{echo 1;}?>">Height price</li>

                                                        
                                                    </ul>
                                                    <select class="pad-tb-5 f-size-13 bg-trans no-border mar-l-30 hidden-sm-up">
                                             <option class="text-500" selected="selected">SORT BY</option>
                                             <option class="text-uppercase f-size-13" value="popularity">Popularity</option>
                                             <option class="text-uppercase f-size-13" value="lowPrice">Low Price</option>
                                             <option class=" text-uppercase f-size-13" value="highPrice">High Price</option>
                                          </select>
                                                </sort-by>
                                            </div>
                                        </div>
                                        <product-list class="block mar-t-10 ng-tns-c15-8">
                                            <!---->
                                            <div class="row prod_list ng-tns-c15-8 ng-star-inserted" lazy-load-images="">
                                            <div id="product_list">    <!---->
<?php

$perpage = 5;

if(isset($_GET["page"])){
$page = intval($_GET["page"]);
}
else {
$page = 1;
}
$calc = $perpage * $page;
$start = $calc - $perpage;
$result = mysqli_query($dbLink, "select * from product where CategoryID =".$_GET['cat_id']."  Limit $start, $perpage");

$rows = mysqli_num_rows($result);

if($rows){
$i = 0;
while($datapro = mysqli_fetch_assoc($result)) {?>
		
		<div class="col-xs-6 col-sm-4 col-md-3 no-padding mar-t-10 pad-lr-5 prod_grid pad-lr-xs--0 no-margin-xs ng-tns-c15-8 ng-trigger ng-trigger-fade ng-star-inserted"  id="product_list">
                                                    <a class="hidden-sm-up" href="https://www.moglix.com/havells-10-hp-hi-flow-d-series-monoblock-pump-mhpbds1x00/mp/msn2w2tmx6qqb7">
                                                        <div class="prod_block relative">
                                                            <div class="prod_image pad-lr-15 pad-lr-xs-5">
                                                                <a class="ng-tns-c15-8">
                                                                	
                                           							<img  style="height: 150px;width: 180px;" class="iimg-fluid" src="<?=$frontpath?>/ProductImage/<?php echo $datapro['ImageName'];?>">
                                          						</a>
                                                            </div>
                                                            <div class="prod_name pad-lr-15 pad-lr-xs-5">
                                                                <a class="ng-tns-c15-8">
                                                                    <h4 class="text-blue b-text pad-t-5">
                                                                    	<?php 
                                                                    	$in = $datapro['ProductName'];
                                                                    	echo $out = strlen($in) > 50 ? substr($in,0,50)."..." : $in;
                                                                    	?>	
                                                                    	<?php //echo $datapro['ProductName'];?>
                                                                        
                                                                    </h4>
                                                                </a>
                                                            </div>
                                                            <!---->
                                                            <!---->
                                                            <div class="prod_price pad-lr-15 pad-lr-xs-5 ng-tns-c15-8 ng-star-inserted" style="">
                                                                <!---->
                                                                <p class="discount ng-tns-c15-8 ng-star-inserted">24% OFF</p>
                                                                <!---->
                                                                <h5 class="no-margin no-padding f-size-12 line-through ng-tns-c15-8 ng-star-inserted">₹12,015</h5>
                                                                <!---->
                                                                <h3 class="no-margin no-padding pad-t-5 f-size-20 f-size-xs-18 text-500">₹<?php echo $datapro['Price']?></h3>
                                                            </div>
                                                            <div class="prod_detail pad-t-3 pad-b-15 pad-lr-10 pad-lr-xs-5">
                                                                <ul class="no-margin no-padding pad-lr-5 pad-lr-xs-0">
                                                                    <!---->
                                                                    <!---->
                                                                    <!---->
                                                                    <?php
                                                                    	$sqlbrand = 'select * from brand where brandid = '.$datapro['brandid'];
                                                                    	$resbrand =  mysqli_query($dbLink,$sqlbrand) or die("can not select   brand");   
    																	$databrand = $resbrand->fetch_assoc();
    																	if($databrand['brandname'] != ''){	
                                                                    ?>
                                                                    <li class="ng-tns-c15-8 ng-star-inserted" style="">
                                                                        Brand:<b class="text-grey">
                                                                        	<?php echo $databrand['brandname'];  ?>
                                                                        </b>
                                                                    </li>
                                                                    <?php }?>
                                                                    <!---->
                                                                    <!---->
                                                                    <!---->
                                                                    <!---->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </a>
                                                   
                                                </div>

		
		
		
	<?php 
	//echo '</div>';
//

}
}

?>

         
                                            </div>
                                             </div>
                                            <!---->
                                        </product-list>
                                        <div class="filter_wrapper wp-100 border-light-bottom o-hidden hidden-sm-up" style="position: fixed; bottom: -10px; z-index: 9;
                                    left:0px; width: 100%; box-shadow:1px 1px 8px #cecece;">
                                            <button class="text-white wp-50 h-65 text-500 bg-white f-size-16 no-border btn-trans f-left filter_btn  text-black" type="button">
                                       <i aria-hidden="true" class="fa fa-filter" style="padding-right: 5px;"></i> FILTER
                                       <p class="pad-tb-5 f-size-13" style="text-transform: capitalize !important;">Select</p>
                                    </button>
                                            <!---->
                                        </div>
                                        <!---->
                                        <div class="row o-hidden border-t border-b pad-tb-10 prod_nav mar-t-30 ng-star-inserted">
                                            <div class="colcre-sm-12 no-padding text-right">
                                                <pagination class="block o-hidden h-35  h-auto-xs">
                                                    <!---->
                                                    <ul class="f-right no-list-style no-margin no-padding ng-star-inserted">
                                                    	<li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                        <li class="ng-star-inserted"></li>
                                                    </ul>
                                                    <!---->

                                                     

                                                    <pagination-controls nextlabel="" previouslabel="" class="ng-star-inserted">
                                                        <pagination-template>
                                                          
                                                            <ul class="ngx-pagination ng-star-inserted" role="navigation" aria-label="Pagination">  


<?php

if(isset($page))

{

$result = mysqli_query($dbLink,"select Count(*) As Total from product where CategoryID =".$_GET['cat_id']." ");

$rows = mysqli_num_rows($result);

if($rows)

{

$rs = mysqli_fetch_assoc($result);

$total = $rs["Total"];

}

$totalPages = ceil($total / $perpage);

if($page <=1 ){

echo '<li class="pagination-previous disabled ng-star-inserted"><span class="ng-star-inserted"><span class="show-for-sr">page</span></span></li>';

}

else

{

$j = $page - 1;



echo '<li class="pagination-previous ng-star-inserted"><a aria-label=" page" class="ng-star-inserted" href="'.$frontpath.'/categorylist.php?cat_id='.$_GET['cat_id'].'&page='.$j.'"><span class="show-for-sr">page</span></a></li>';


}

for($i=1; $i <= $totalPages; $i++)

{

if($i<>$page)

{


echo '<li class="ng-star-inserted"><a class="ng-star-inserted" href="'.$frontpath.'/categorylist.php?cat_id='.$_GET['cat_id'].'&page='.$i.'"><span class="show-for-sr">page </span><span>'.$i.'</span></a></li>';

}

else

{


	echo '<li class="current ng-star-inserted"><div class="ng-star-inserted"><span class="show-for-sr"></span><span>'.$i.'</span></div></li>';



}

}

if($page == $totalPages )

{

//echo "<span id='page_links' style='font-weight: bold;'>Next ></span>";
echo '<li class="pagination-next ng-star-inserted"><a aria-label=" page" class="ng-star-inserted"><span class="show-for-sr">page</span></a></li>';

}

else

{

$j = $page + 1;


echo '<li class="pagination-next ng-star-inserted"><a aria-label=" page" class="ng-star-inserted" href="'.$frontpath.'/categorylist.php?cat_id='.$_GET['cat_id'].'&page='.$j.'"><span class="show-for-sr">page</span></a></li>';
}

}

?>
                                                         
                                                            </ul>
                                                        </pagination-template>
                                                    </pagination-controls>
                                                </pagination>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category_data pad-t-15 pad-b-30 pad-lr-15">
                            <h2><strong>What Are Electrical Devices and Why Do We Need Them?</strong></h2>
                            <p>Consider this, you have a regular flow of electricity however there is no bulb or a tube light nor any switches and sockets installed at your place. Neither do you have any electrical meters working in your factory. Now how
                                are you supposed to utilize all that power which is available at your disposal?
                            </p>
                            <br>
                            <p>Simply install <strong>electrical devices!</strong> These are the means and mediums that transfer electrical energy into other useful forms that fulfill many household and industrial functions. Today several innovative <strong>electrical products</strong>                                have been introduced in the market which efficiently harness power and utilize it in a safe and cost effective manner.
                            </p>
                            <br>
                            <p>Thus the requirement and usage of such user friendly <strong>electrical devices</strong> has become inevitable especially for responsible consumption of electricity in an efficient way. Moglix with its impressive portfolio
                                of electrical products has been able to identify and fulfill the need for <strong>electrical components</strong> and supplies required by our industrial users.
                            </p>
                            <br>
                            <h3><strong>What Are Energy Saving Electrical Devices and Why Should You Use Them?</strong></h3>
                            <p>Many trusted <strong>electrical equipment companies</strong> have developed high quality energy saving devices which are available online with us. We encourage consumers to use such electrical devices over traditional ones
                                so as to do their part in saving electricity and avoiding higher costs on consumption.
                            </p>
                            <br>
                            <p>A household power voltage saving device also known as <strong>Power Saver</strong> is one such electrical equipment which saves up to 40% of electricity consumption thereby reducing your monthly electricity bills considerably.
                            </p>
                            <br>
                            <p>Many <strong><a href="https://www.moglix.com/electricals/capacitors/211145600">capacitor</a></strong> banks are also available that can be installed with high voltage electrical durables such as air conditioners and washing
                                machines to save power and reduce cost. They also help in maintaining a smooth current flow to your electrical appliances and prevent them from overheating.
                            </p>
                            <br>
                            <h3><strong>What Are the Various Electrical Devices Available at Moglix?</strong></h3>
                            <p>Moglix offers you a wide range of <strong>electrical devices</strong> that are energy saving and high quality products from leading brands like <strong><a href="https://www.moglix.com/brand-store/havells">Havells</a></strong>,
                                <strong>Polycab</strong>, <strong>Finolex</strong>, <strong>Anchor</strong>, <strong>Panasonic</strong>, <strong>Legrand</strong>, <strong>Crabtree</strong>, <strong>Schneider</strong> and more. From switches and sockets,
                                LED bulbs &amp;tubes, wires and cables to <strong><a href="https://www.moglix.com/electricals/industrial-switches-and-controls/211180000">Industrial switches and controls</a></strong>, <strong><a href="https://www.moglix.com/electricals/circuit-breakers-fuses/211120000">circuit breakers and fuses</a></strong>                                and even <strong><a href="https://www.moglix.com/electricals/relays-contactors/211150000">relays and contactors</a></strong>, we possess electrical equipment for every function, purpose and budget.</p>
                            <br>
                            <h2><strong>Ensure Efficient Cooling with The Latest Range of Fans from Moglix</strong></h2>
                            <p><strong><a href="https://www.moglix.com/electricals/fans/211530000">Fans</a></strong> are one of the most widely used and efficient cooling solutions. To ensure a high quality of air circulation within homes and offices, Moglix
                                has come up with a wide range of <strong><a href="https://www.moglix.com/electricals/fans/ceiling-fans/211531100">ceiling fans</a></strong>, <strong><a href="https://www.moglix.com/electricals/fans/ventilation-fans/211531300">exhaust fans</a></strong>,
                                cooling fans, <strong><a href="https://www.moglix.com/electricals/fans/wall-mounted-fans/211531500">wall mounted fans</a></strong>, table &amp; pedestal fans, and <strong><a href="https://www.moglix.com/electricals/fans/axial-fans/211531700">axial fans</a></strong>.
                                These fans have been sourced from leading brands in the market such as <strong><a href="https://www.moglix.com/brands/orient">Orient</a></strong>, <strong>Usha</strong>, <strong>Khaitan</strong>.
                            </p>
                            <br>
                            <h2><strong>Select from The Assortment of Distribution Boards Available at Moglix.com</strong></h2>
                            <p><strong><a href="https://www.moglix.com/electricals/distribution-boards/211135000">Distribution boards</a></strong> are one of the vital components of electrical systems. They are used for dividing electrical power feed into
                                subsidiary circuits and play an active role in offering a protective breaker for each of these circuits. At Moglix, we present <strong><a href="https://www.moglix.com/electricals/distribution-boards/modular-distribution-boards/211135022">modular distribution boards</a></strong>,
                                vertical distribution boards, and double door distribution boards.
                            </p>
                            <br>
                            <h2><strong>Exciting Collection of Switches and Sockets at Moglix</strong></h2>
                            <p><strong><a href="https://www.moglix.com/electricals/switches-sockets/211110000">Switches and sockets</a></strong> are one of the most widely used day to day applications. To satisfy the ever growing market demands for switches
                                and sockets of different models, Moglix has introduced an exciting range of products online in this category from leading brands in the Indian market such as <strong>Anchor Rider</strong>, <strong>Great White</strong>,
                                <strong>Switch Control</strong> India etc.
                            </p>
                            <br>
                            <h2><strong>Buy Wires &amp; Cables from Leading Brands at Moglix</strong></h2>
                            <p><strong><a href="https://www.moglix.com/electricals/wires-cables/211190000">Wires and cables</a></strong> form an integral part of the electrical connection systems within residential and commercial buildings. At Moglix, we
                                know how important wires and cables are in the lives of our customer base. Therefore, we have sourced a vast collection of wires and cables such as <strong><a href="https://www.moglix.com/electricals/wires-cables/submersible-cables/211196700">submersible cables</a></strong>,
                                industrial wires and cables, low tension cables, co-axial cables, <strong><a href="https://www.moglix.com/electricals/wires-cables/cctv-cables/211196634">CCTV cables</a></strong>, telephone cables etc. from famous brands
                                such as <strong>Hensel</strong>, <strong>Finolex</strong>, <strong>Prima</strong>, <strong>Reliance</strong> and more.
                            </p>
                            <br>
                            <h3><strong>Meet Your Charging Needs with The New Range of Plugs and Receptacles from Moglix</strong></h3>
                            <p><strong><a href="https://www.moglix.com/electricals/plugs-receptacles/211250000">Plugs and receptacles</a></strong> are must-haves to ensure the proper charging of a wide range of devices starting from mobiles and tablets to
                                laptops. At Moglix, we have an exciting collection of plugs and receptacles with different poles such as 2 pin, 2P+E, 3 P+E, P+E+N, 3 P+N+E from trusted brands such as <strong>Himel</strong>, <strong>G Controls</strong>,
                                <strong>SG Controls</strong>, <strong>Ved-G</strong>.
                            </p>
                            <br>
                            <h3><strong>Acquire the Newest Range of Relays and Contactors</strong></h3>
                            <p><strong>Relays</strong> are normally used in low voltage applications such as switching a tube light. <strong>Contactors</strong> on the other hand are used for high voltage switching purposes. At Moglix, we are offering bi-metal
                                overload relays, <strong><a href="https://www.moglix.com/electricals/relays-contactors/electronic-timerrelay/211155500">electronic timer relays</a></strong>, thermal overload relays, time delay relays and <strong><a href="https://www.moglix.com/electricals/relays-contactors/plug-in-relays/211151200">plug-in relays</a></strong>.</p>
                            <br>
                            <h3><strong>Enhance The Efficiency of Industrial Applications with The Assorted Range of Meters and Accessories from Moglix</strong></h3>
                            <p><strong><a href="https://www.moglix.com/electricals/meters-accessories/211160000">Meters and accessories</a></strong> are of different types such as <strong>energy meters</strong>, <strong>VAF meters</strong>, <strong>voltmeters</strong>,
                                <strong>power factor meters</strong>, <strong>frequency meters</strong>, <strong>multifunction meters</strong>, and <strong>energy meters</strong>. The products that we present as a part of this category have been procured
                                from reputed brands such as <strong>SELEC</strong>, <strong>Sigma</strong>, <strong>Dolphin Automation</strong>, <strong>Crown</strong>, <strong>Unitech Engineers</strong> etc.</p>
                            <br>
                            <h3><strong>Bag The Best Deals on Industrial Switches and Controls from Moglix</strong></h3>
                            <p>At Moglix, we deal in an impressive range of industrial switches and controls such as <strong><a href="https://www.moglix.com/electricals/industrial-switches-and-controls/foot-switches/211182000">foot switches</a></strong>,
                                limit switches, <strong><a href="https://www.moglix.com/electricals/industrial-switches-and-controls/pilot-lights/211186100">pilot lights</a></strong>, time switches, <strong><a href="https://www.moglix.com/electricals/industrial-switches-and-controls/actuators/211181900">actuators</a></strong>,
                                <strong><a href="https://www.moglix.com/electricals/industrial-switches-and-controls/rotary-switches/211182200">rotary switches</a></strong>, and micro switches. These devices have been selected after a great deal scrutiny
                                from established brands in the market such as <strong>Honeywell</strong>, <strong>Switch Control India</strong>, <strong>SG Controls</strong> etc.
                            </p>
                            <br>
                            <h4><strong>Select from The Exciting Range of Control Motor Starters Available at Moglix.com</strong></h4>
                            <p><strong><a href="https://www.moglix.com/electricals/control-motor-starters/211510000">Motor control starters</a></strong> are used in induction motors. To satisfy the needs of industry based users, we at Moglix have come up
                                with an exciting collection of motor control starters such as direct-on line starters from well-known brands such as <strong>SHI</strong>.
                            </p>
                            <br>
                            <h4><strong>Acquire Circuit Breakers and Buses at The Best Price from Moglix</strong></h4>
                            <p><strong>Circuit breaker and fuses</strong> are used for stopping the continuous flow of electricity in case it exceeds the safety flow in different parts of a building. At Moglix, we have an assorted collection of circuit breakers
                                and fuses that have been procured from some of the best brands in the market such as <strong>3M</strong>, <strong>Allwin</strong>, <strong>Ambitec</strong>, <strong>Bosch</strong>, <strong>Dewalt</strong> etc.
                            </p>
                            <br>
                            <h4><strong>Buy Safety and Disconnect Switches Online</strong></h4>
                            <p>To suit the basic requirement of both domestic and office based users, Moglix presents a wide range of <strong><a href="https://www.moglix.com/electricals/safety-disconnect-switches/211240000">safety and disconnect switches</a></strong>                                from leading brands in the market such as <strong>Elcon</strong>, <strong>SG Controls</strong>, <strong>Siemens</strong> etc.</p>
                        </div>
                    </category>
                </div>



<?php require_once('footer.php');?>