<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
$var['ID'] = isset($_REQUEST['id'])?$_REQUEST['id']:'';
$list = getRecord('tbl_product', $var);
$list = $list['RESULT'][0];

$pr['HIT']=$list['HIT']+1;
$pr['ID']=$list['ID'];
upcountPro($pr);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $list['PRODUCT']?> - Suzuki Trada</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/master.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/color.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/styles.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/theme.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/responsive.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/Corporate-Footer-Clean.css?<?php echo rand()?>" />

    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/plugins/headers/header.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

    <!--[if lt IE 9 ]>
<script src="<?php echo ROOT_URL ?>/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
</head>

<body>
    <style>
    .tz-gallery {
        padding: 40px;
    }

    /* Override bootstrap column paddings */
    .tz-gallery .row>div {
        padding: 2px;
    }

    .tz-gallery .lightbox img {
        width: 100%;
        border-radius: 0;
        position: relative;
    }

    .tz-gallery .lightbox:before {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -13px;
        margin-left: -13px;
        opacity: 0;
        color: #fff;
        font-size: 26px;
        font-family: 'Glyphicons Halflings';
        content: '\e003';
        pointer-events: none;
        z-index: 9000;
        transition: 0.4s;
    }


    .tz-gallery .lightbox:after {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        background-color: rgba(46, 132, 206, 0.7);
        content: '';
        transition: 0.4s;
    }

    .tz-gallery .lightbox:hover:after,
    .tz-gallery .lightbox:hover:before {
        opacity: 1;
    }

    .baguetteBox-button {
        background-color: transparent !important;
    }

    @media(max-width: 768px) {
        body {
            padding: 0;
        }
    }
    </style>

    <?php
require_once ('includes/header.php')
 ?>
    <?php
$var ['LIMIT'] = 1;
// $var ['CATEGORY'] = 3;
$list = getRecord('tbl_product', $var);
foreach($list['RESULT'] as $list){
?>
    <!-- end .header-->
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a"><?php echo $list['PRODUCT']?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end .b-title-page-->
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="home.html"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li><a href="<?php echo ROOT_URL?>/mobil.php">Mobil Lainnya</a>
                        </li>
                        <li class="active"><?php echo $list['PRODUCT']?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <main class="l-main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <section class="b-car-details">
                        <div class="b-car-details__header">
                            <h2 class="b-car-details__title"><?php echo $list['PRODUCT']?></h2></br>
                            <!-- <div class="b-car-details__subtitle">AWD 430i xSmart Drive Coupe</div> -->
                            <!-- <div class="b-car-details__address"><i class="icon fa fa-map-marker text-primary">

                            </i>Lokasi
                            </div> -->
                            <div class="b-car-details__links">
                                <!-- <a class="b-car-details__link" href="car-details.html">
                            <i class="icon fa fa-exchange text-primary">
                            </i> Add to Compare</a> -->
                                <a class="b-car-details__link"
                                    href="<?php echo ROOT_URL.'/images/product/'.$list['BROCHURE'].'?v='.rand()?>">
                                    <i class="icon fa fa-car text-primary"></i> Car Brochure</a>
                                <a class="b-car-details__link" href="car-details.html" style="margin-left:10px;">
                                    <i class="icon fa fa-share-alt text-primary"></i> Share</a>
                            </div>
                        </div>
                        <div class="slider-car-details slider-pro" id="slider-car-details">
                            <div class="sp-slides">
                                <?php 
                    $varai['PRODUCT_ID']=$list['ID'];
                    $varai['LIMIT']=20;
                    $varai['STATUS']=1;
                    $listai = getRecord('tbl_addimage', $varai);
                    foreach ($listai['RESULT'] as $listai) { 
                ?>
                                <div class="sp-slide">
                                    <img class="sp-image"
                                        src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                        alt="img" />
                                </div>
                                <?php } ?>
                            </div>
                            <div class="sp-thumbnails">
                                <?php 
                    $varai2['PRODUCT_ID']=$list['ID'];
                    $varai2['LIMIT']=20;
                    $varai2['STATUS']=1;
                    $listai = getRecord('tbl_addimage', $varai2);
                    foreach ($listai['RESULT'] as $listai) { 
                ?>
                                <div class="sp-thumbnail">
                                    <img class="img-responsive"
                                        src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                        alt="img" />
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- end .b-thumb-slider-->
                        <div class="b-car-details__section">
                            <h3 class="b-car-details__section-title ui-title-inner">Deskripsi Mobil</h3>
                            <div class="b-car-details__section-subtitle"><?php echo $list['SUMMARY']?></div>
                            <p><?php echo $list['SPECS']?></p>
                        </div>
                        <!-- <div class="tz-gallery">

                            <div class="row">

                                <div class="col-sm-12 col-md-4">
                                    <a class="lightbox"
                                        href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                        <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                            alt="Bridge">
                                    </a>
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox"
                                            href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                            <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                                alt="Park">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox"
                                            href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                            <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                                alt="Tunnel">
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <a class="lightbox"
                                            href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                            <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                                alt="Traffic">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox"
                                            href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                            <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                                alt="Coast">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a class="lightbox"
                                            href="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>">
                                            <img src="<?php echo ROOT_URL.'/images/product/'.$listai['IMAGE'].'?v='.rand()?>"
                                                alt="Rails">
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div> -->
                        <!-- <ul class="b-car-details__nav nav nav-tabs bg-primary">
                            <li class="active"><a href="#specifications" data-toggle="tab">Spesifikasi</a>
                            </li>
                            <li><a href="#details" data-toggle="tab">Detail</a>
                            </li>
                            <li><a href="#contact" data-toggle="tab">Kontak</a>
                            </li>
                        </ul>
                        <div class="b-car-details__tabs tab-content">
                            <div class="tab-pane active fade in" id="specifications">
                                <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray
                                    interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer
                                    expectations for many years and always provide
                                    customers with a great value!</p>
                                <div class="b-car-details__tabs-title">more features</div>
                                <ul class="list list-mark-5 list_mark-prim list-2-col">
                                    <li>Drivetrain Oil Cooler: Auxiliary</li>
                                    <li>Engine Alternator: 160 Amps</li>
                                    <li>Exterior Mirrors Manual Folding</li>
                                    <li>Seatbelts Seatbelt Warning Sensors</li>
                                    <li>Front Headrests Adjustable</li>
                                    <li>Cruise Control System</li>
                                    <li>Crumple Zones Front</li>
                                    <li>Roll Stability Control</li>
                                    <li>Multi-Function Display</li>
                                    <li>ABS Brakes (4-Wheel)</li>
                                    <li>Audio System 6 Speakers</li>
                                    <li>Electronic Brakeforce Distribution</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="details">
                                <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray
                                    interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer
                                    expectations for many years and always provide
                                    customers with a great value!</p>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <p>Ut enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea comodo consequat aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore eu fugiat nulla pariatur. Excepteur
                                    sint cupidatat non proident sunt in culpa qui officia deserunt mollit anim.</p>
                                <p>This 2018 model car is Brilliant Black Crystal Pearlcoat with a Black/Diesel Gray
                                    interior. Buy confidence knowing Jeep Dodge Ram Surprise has been exceeding customer
                                    expectations for many years and always provide
                                    customers with a great value!</p>
                            </div>
                        </div> -->
                    </section>
                </div>
                <div class="col-md-4">
                    <aside class="l-sidebar-2">
                        <div class="b-car-info">
                            <!-- <div class="b-car-info__price">RP. <?php echo $list['PRICE']?>

                            </div>
                            <dl class="b-car-info__desc dl-horizontal bg-grey">
                                <dt class="b-car-info__desc-dt">body</dt>
                                <dd class="b-car-info__desc-dd">sedan</dd>
                                <dt class="b-car-info__desc-dt">year</dt>
                                <dd class="b-car-info__desc-dd">2016</dd>
                                <dt class="b-car-info__desc-dt">MILEAGe</dt>
                                <dd class="b-car-info__desc-dd">20,300mi</dd>
                                <dt class="b-car-info__desc-dt">ENGINE</dt>
                                <dd class="b-car-info__desc-dd">5.7L V8</dd>
                                <dt class="b-car-info__desc-dt">TRANSMISSION</dt>
                                <dd class="b-car-info__desc-dd">Auto 8-Speed</dd>
                                <dt class="b-car-info__desc-dt">FUEL</dt>
                                <dd class="b-car-info__desc-dd">hybird</dd>
                                <dt class="b-car-info__desc-dt">colors</dt>
                                <dd class="b-car-info__desc-dd">brown, Black</dd>
                                <dt class="b-car-info__desc-dt">DRIVE TRAIN</dt>
                                <dd class="b-car-info__desc-dd">4x2</dd>
                                <dt class="b-car-info__desc-dt">STOCK #</dt>
                                <dd class="b-car-info__desc-dd">CXH207</dd>
                            </dl> -->
                            <!-- <div class="b-car-info__item">
                                <span class="b-car-info__item-name"><i class="icon flaticon-fuel"></i> Economy</span>
                                <div class="b-car-info__item-inner"><span class="b-car-info__item-info"><span
                                            class="b-car-info__item-info_lg">16</span><span
                                            class="b-car-info__item-info_sm"> CITY</span></span><span
                                        class="b-car-info__item-info"><span class="b-car-info__item-info_lg">24</span>
                                        <span class="b-car-info__item-info_sm">HWY</span>
                                    </span>
                                </div>
                            </div> -->
                            <!-- <div class="b-car-info__item"><span class="b-car-info__item-name"><i
                                        class="icon flaticon-car"></i> Vehicle Demand</span>
                                <div class="b-car-info__item-inner"><span class="b-car-info__item-info">HIGH</span>
                                </div>
                            </div> -->
                            <div class="b-bnr-2">
                                <div class="b-bnr-2__icon flaticon-smartphone"></div>
                                <div class="b-bnr-2__inner">
                                    <div class="b-bnr-2__title">Halo Trada</div>
                                    <div class="b-bnr-2__info"><a href="tel:021-2280 8000" style="color:#fff;">021-2280
                                            8000</div></a>
                                </div>
                            </div>
                            <!-- end .b-banner-->
                            <form class="b-calculator">
                                <div class="b-calculator__header"><i class="icon flaticon-calculator text-primary"></i>
                                    <div class="b-calculator__header-inner">
                                        <div class="b-calculator__name">Simulasi Kredit</div>
                                        <div class="b-calculator__info"><?php echo $list['PRODUCT']?></div>
                                    </div>
                                </div>
                                <div class="b-calculator__group">
                                    <div class="b-calculator__label">Harga Mobil (Rp.)</div>
                                    <input class="b-calculator__input form-control" type="text"
                                        placeholder="Rp. <?php echo $list['PRICE']?>" />
                                </div>
                              
                                
                                <div class="b-calculator__group">
                                    <div class="b-calculator__label">Ansuran</div>
                                    <select class="selectpicker" data-width="100%" name="QABOUT">
                                           
                                            <option value="12">12 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                            <option value="36">36 Bulan</option>
                                            <option value="48">48 Bulan</option>
                                            <option value="60">60 Bulan</option>
                                           
                                        </select>
                                </div>
                                <!-- <div class="b-calculator__group">
                                    <div class="b-calculator__label">down payment</div>
                                    <input class="b-calculator__input form-control" type="text" placeholder="$5,000" />
                                </div> -->
                                <button class="btn btn-dark">Lihat Penawaran</button>
                            </form>
                            <!-- end .b-calculator-->
                        </div>
                        <div class="test-drive-modal">
                            <a href='<?php echo ROOT_URL?>/test-drive.php'><button type="button" class="btn btn-primary">
                                Booking Test Drive
                            </button>
							</a>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <?php 
            } 
        ?>
        <!-- end .b-car-details-->
        <section class="section-default_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="ui-title-block">Mobil Lainnya</h2>
                        <!-- <div class="ui-decor"></div> -->
                        <div class="related-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel"
                            data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false"
                            data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                            <?php
                                $varRC ['LIMIT'] = 6;
                                // $var ['CATEGORY'] = 3;
                                $list = getRecord('tbl_product', $varRC);
                                foreach($list['RESULT'] as $list){
                            ?>
                            <div class="b-goods-feat">
                                <div class="b-goods-feat__img">
                                    <img class="img-responsive"
                                        src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?v='.rand()?>"
                                        alt="foto" /><span class="b-goods-feat__label">RP.
                                        &nbsp;<?php echo $list['PRICE']?>
                                        <!-- <span class="b-goods-feat__label_msrp">MSRP $27,000</span> -->
                                    </span>
                                </div>
                                <!-- <ul class="b-goods-feat__desc list-unstyled">
                                    <li class="b-goods-feat__desc-item">35,000 mi</li>
                                    <li class="b-goods-feat__desc-item">Model: 2017</li>
                                    <li class="b-goods-feat__desc-item">Auto</li>
                                    <li class="b-goods-feat__desc-item">320 hp</li>
                                </ul> -->
                                <h3 class="b-goods-feat__name"><a
                                        href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT']?></a></h3>
                                <!-- <div class="b-goods-feat__info">Duis aute irure reprehender voluptate velit ese acium
                                    fugiat nulla pariatur excepteur ipsum.</div> -->
                            </div>
                            <?php } ?>
                            <!-- end .b-goods-featured-->
                        </div>
                        <!-- end .related-carousel-->
                    </div>
                </div>
            </div>
        </section>
        <!-- end .section-default_top-->
    </main>
    <!-- end .l-main-content-->

    <?php
require_once ('includes/footer.php')
 ?>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>

    <script src="<?php echo ROOT_URL ?>/assets/libs/jquery-1.12.4.min.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/libs/jquery-migrate-1.2.1.js"></script>
    <!-- Bootstrap-->
    <script src="<?php echo ROOT_URL ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
    <!-- User customization-->
    <script src="<?php echo ROOT_URL ?>/assets/js/custom.js"></script>
    <!-- Headers scripts-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/headers/slidebar.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/plugins/headers/header.js"></script>
    <!-- Color scheme-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/switcher/js/dmss.js"></script>
    <!-- Select customization & Color scheme-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- Slider-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Pop-up window-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Mail scripts-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/jqBootstrapValidation.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/plugins/contact_me.js"></script>
    <!-- Filter and sorting images-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/isotope/isotope.pkgd.min.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/plugins/isotope/imagesLoaded.js"></script>
    <!-- Progress numbers-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/plugins/rendro-easy-pie-chart/waypoints.min.js"></script>
    <!-- NoUiSlider-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/noUiSlider/nouislider.min.js"></script>
    <script src="<?php echo ROOT_URL ?>/assets/plugins/noUiSlider/wNumb.js"></script>
    <!-- Animations-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/scrollreveal/scrollreveal.min.js"></script>
    <!-- Main slider-->
    <script src="<?php echo ROOT_URL ?>/assets/plugins/slider-pro/jquery.sliderPro.min.js"></script>
</body>

</html>