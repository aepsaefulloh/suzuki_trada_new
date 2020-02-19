<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tentang Trada</title>
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
    <!--[if lt IE 9 ]>
<script src="<?php echo ROOT_URL ?>/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
</head>

<body>

    <?php
require_once ('includes/header.php')
 ?>

    <div class="main-slider main-slider-4">
        <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="650px"
            data-slider-arrows="false" data-slider-buttons="false">
            <div class="sp-slides">
                <!-- Slide 1-->
                <div class="sp-slide">
                    <img class="sp-image" src="assets/media/components/b-main-slider/6.jpg" alt="slider" />
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sp-layer" data-show-transition="left" data-hide-transition="left"
                                    data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                                    <div class="main-slider__label">Suzuki Trada</div>
                                    <div class="main-slider__title">Dealer Suzuki Terbaik
                                        <br>Dapatkan Promo nya</div>
                                    <!-- <a class="main-slider__btn btn btn-lg btn-white"
                                        href="<?php echo ROOT_URL ?>/mobil.php">Produk</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-default wrap-inl-bl">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-heart-o"></i>
                        <h3 class="b-advantages-5__title">Kerja Keras</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-headphones"></i>
                        <h3 class="b-advantages-5__title">Integritas</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-shirtsinbulk"></i>
                        <h3 class="b-advantages-5__title">Kebersamaan</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-usd"></i>
                        <h3 class="b-advantages-5__title">No Booking Fee</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-car"></i>
                        <h3 class="b-advantages-5__title">Well Maintained Cars</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <div class="col-md-4">
                    <section class="b-advantages-5"><i class="b-advantages-5__icon fa fa-trophy"></i>
                        <h3 class="b-advantages-5__title">Award Winners</h3>
                        <!-- <div class="b-advantages-5__info"></div> -->
                        <!-- <span class="ui-decor-2"></span> -->
                    </section>
                    <!-- end .b-advantages-->
                </div>
            </div>
        </div>
    </div>

    <section class="section-type-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-type-2__inner">
                        <h2 class="section-type-2__title">Tentang Kami</h2></br>
                        <p>PT Sejahtera Buana Trada adalah Main Dealer kendaraan roda
                            4 (mobil). PT Sejahtera Buana Trada berdiri berdasarkan Akta Pendirian No. 21 tanggal 17
                            Januari 2014
                            yang dibuat oleh Notaris Popie Savitri Martosuhardjo Pharmanto, SH. PT Sejahtera Buana Trada
                            memiliki jaringan dealer di seluruh Indonesia.</p>

                        <br>
                        <h2 class="section-type-2__title">Keunggulan Membeli Produk Di Suzuki Trada</h2>
                        <!-- <div class="section-type-2__subtitle">Keunggulan Membeli Produk Di Suzuki Trada
                        </div> -->
                        <!-- <p>PT Sejahtera Buana Trada berdiri berdasarkan Akta Pendirian No. 21 tanggal 17 Januari 2014
                            yang dibuat oleh Notaris Popie Savitri Martosuhardjo Pharmanto, SH. PT Sejahtera Buana Trada
                            memiliki jaringan dealer di seluruh Indonesia.</p> -->
                        <ul class="list list-mark-5 list_mark-prim list-1-col">
                            <li>Mendapatkan Suzuki Premiere Card.</li>
                            <li>Banyak Bonus Accessories** (tergantung tipe unit)</li>
                            <li>Terdapat Pusat Perbaikan Body yang bekerjasama dengan banyak asuransi.</li>
                            <li>Produk & Sparepart terjamin keasliannya (SGP, SGO, SGC dan SGA).</li>
                            <li>Trade in melalui Suzuki Autovalue.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-type-2__img">
                        <img class="img-responsive"
                            src="<?php echo ROOT_URL?>/assets/img/about-2.png?<?php echo rand()?>" alt="foto">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- <section class="section-isotope" style="padding-bottom:110px;">
        <div class="section-isotope__header bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <h2 class="ui-title-block">Galeri</h2>
                            <div class="ui-subtitle-block">Tempor incididunt labore dolore magna cillium fugiat</div>
                            <div class="ui-decor"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-isotope">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="b-isotope-filter list-inline">
                            <li class="current"><a href="" data-filter="*">all</a>
                            </li>
                            <li><a href="" data-filter=".sale">Dealer</a>
                            </li>
                            <li><a href="" data-filter=".new">Produk</a>
                            </li>
                            <li><a href="" data-filter=".top">top brands</a>
                            </li>
                            <li><a href="" data-filter=".ferrari">ferrari</a>
                            </li>
                            <li><a href="" data-filter=".mercedes">mercedes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="b-isotope-grid grid list-unstyled" style="position: relative; height: 474.726px;">
                <li class="grid-sizer"></li>
                <li class="b-isotope-grid__item grid-item top mercedes" style="position: absolute; left: 0%; top: 0px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/1.jpg">
                        <img src="assets/media/content/gallery/384x300/1.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari"
                    style="position: absolute; left: 19.9447%; top: 0px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/2.jpg">
                        <img src="assets/media/content/gallery/384x300/2.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new top mercedes"
                    style="position: absolute; left: 39.9552%; top: 0px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/3.jpg">
                        <img src="assets/media/content/gallery/384x300/3.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale top"
                    style="position: absolute; left: 59.9658%; top: 0px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/4.jpg">
                        <img src="assets/media/content/gallery/384x300/4.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari"
                    style="position: absolute; left: 79.9763%; top: 0px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/5.jpg">
                        <img src="assets/media/content/gallery/384x300/5.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new top mercedes"
                    style="position: absolute; left: 0%; top: 237px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/6.jpg">
                        <img src="assets/media/content/gallery/384x300/6.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale ferrari"
                    style="position: absolute; left: 19.9447%; top: 237px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/7.jpg">
                        <img src="assets/media/content/gallery/384x300/7.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale top"
                    style="position: absolute; left: 39.9552%; top: 237px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/8.jpg">
                        <img src="assets/media/content/gallery/384x300/8.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item sale mercedes"
                    style="position: absolute; left: 59.9658%; top: 237px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/9.jpg">
                        <img src="assets/media/content/gallery/384x300/9.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
                <li class="b-isotope-grid__item grid-item new" style="position: absolute; left: 79.9763%; top: 237px;">
                    <a class="b-isotope-grid__inner js-zoom-images" href="assets/media/content/gallery/384x300/10.jpg">
                        <img src="assets/media/content/gallery/384x300/10.jpg" alt="foto"><span
                            class="b-isotope-grid__wrap-info helper"><span class="b-isotope-grid__info"><i
                                    class="icon fa fa-search"></i><span class="b-isotope-grid__title">porsche panamera
                                    2018</span></span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </section> -->




    <?php
require_once ('includes/footer.php')
 ?>


    </div>
    <!-- end layout-theme-->


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
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