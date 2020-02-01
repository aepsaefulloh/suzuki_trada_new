<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Suzuki Trada</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/master.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/styles.css?<?php echo rand()?>" />
    <!-- <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/Corporate-Footer-Clean.css?<?php echo rand()?>" /> -->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!--[if lt IE 9 ]>
<script src="<?php echo ROOT_URL ?>/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
</head>

<body>

    <?php
require_once ('includes/header.php')
 ?>
    <?php
require_once ('includes/banner.php')
 ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-advantages-1">
                    <section class="b-advantages-1"><i class="b-advantages-1__icon flaticon-gearbox"></i>
                        <h3 class="b-advantages-1__title">Largest Dealership of Cars</h3>
                        <div class="b-advantages-1__info">MotorLand is nisi aliquip ex consequat duis velit esse cillum
                            dolore fugiat nulla pariatur excepteur sint occaecat.
                        </div>
                        <span class="ui-decor-2"></span>
                    </section>
                    <!-- end .b-advantages-->
                    <section class="b-advantages-1 active"><i class="b-advantages-1__icon flaticon-steering-wheel"></i>
                        <h3 class="b-advantages-1__title">We Offers Lower Cars Prices</h3>
                        <div class="b-advantages-1__info">MotorLand is nisi aliquip ex consequat duis velit esse cillum
                            dolore fugiat nulla pariatur excepteur sint occaecat.
                        </div>
                        <span class="ui-decor-2">

                        </span>
                    </section>
                    <!-- end .b-advantages-->
                    <section class="b-advantages-1"><i class="b-advantages-1__icon flaticon-wrench"></i>
                        <h3 class="b-advantages-1__title">Multipoint Safety Checks</h3>
                        <div class="b-advantages-1__info">MotorLand is nisi aliquip ex consequat duis velit esse cillum
                            dolore fugiat nulla pariatur excepteur sint occaecat.
                        </div>
                        <span class="ui-decor-2">
                        </span>
                    </section>
                    <!-- end .b-advantages-->
                </div>
                <!-- end .section-advantages-1-->
            </div>
        </div>
    </div>
    <section class="section-filter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Penjualan Terbaik</h2>
                        <div class="ui-subtitle-block">Tempor incididunt labore dolore magna aliqua sed ipsum</div>
                        <div class="ui-decor"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php 
                for($i=0; $i < 6; $i++){
                ?>
                <div class="col-6 col-md-4 col-xs-6" id="col-card-produk">
                    <div class="card" id="card-produk">
                        <img class="img-fluid card-img-top w-100 d-block" data-bs-hover-animate="pulse" id="foto-produk"
                            src="https://suzukitrada.sketsahouse.com/images/product/a0c8895e061573a74ffb50901d750c42.jpg?var=844889498">
                        <div class="card-body" id="card-body-produk">
                            <h4 class="card-title" id="card-title-produk">New SX4-Cross</h4>
                            <!-- <span class="d-flex d-md-none d-lg-none d-xl-none justify-content-center"
                                id="span-produk-mobile">Harga Mulai Dari</span> -->
                            <div class="list-group list-group-horizontal text-center" id="list-card">
                                <a class="list-group-item list-group-item-action d-xl-flex justify-content-xl-center"
                                    id="list-group-harga">
                                    <span class="harga">Rp. 291.000.000</span></a>
                                <a class="list-group-item list-group-item-action d-none d-xl-flex justify-content-xl-center"
                                    id="list-group-brosur" href="#">
                                    <span class="download-brosur">Download Brosur</span></a></div>
                            <div class="buy-explore-btn">
                                <a class="btn btn-dark" id="btn-beli" href="home.html">Beli</a><a
                                    class="btn btn-primary" id="btn-explore" href="home.html">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- end .b-filter-->
    </section>
    <!-- end .section-filter-->
    <section class="b-about section-default_btm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="b-about__inner">
                        <h2 class="ui-title-block">Tentang Suzuki Trada</h2>
                        <div class="ui-subtitle-block">Tempor incididunt duis labore dolore magna aliqua sed ipsum</div>
                        <div class="ui-decor"></div>
                        <div class="b-about-main">
                            <div class="b-about-main__title">We are a Trusted Name in Auto Industry</div>
                            <div class="b-about-main__subtitle">Visited by Million of Car Buyers Every Month!</div>
                            <p>MotorLand is aliquip exd ea consequat duis lorem ipsum dolor sit amet consectetur dipis
                                icing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam quis nostrud exercitation.</p>
                            <p>Slamco laboris nisi ut aliquip ex ea comdo consequat uis aute irure dolor raeprehenderit
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <div class="b-about-main__btns"><a class="btn btn-dark" href="home.html">Our partners</a><a
                                    class="btn btn-primary" href="home.html">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <ul class="b-about-list list-unstyled">
                        <li class="b-about-list__item"><i class="b-about-list__icon flaticon-travel"></i>
                            <div class="b-about-list__inner">
                                <div class="b-about-list__title">10 Years in Business</div>
                                <div class="b-about-list__info">MotorLand is nisi aliquip ea consequat duis velit esse
                                    cillum dolore fugiat nulla pariatur excepteur sint occaecat.</div>
                                <div class="ui-decor-2"></div>
                            </div>
                        </li>
                        <li class="b-about-list__item"><i class="b-about-list__icon flaticon-handshake"></i>
                            <div class="b-about-list__inner">
                                <div class="b-about-list__title">Trusted by Auto Buyers</div>
                                <div class="b-about-list__info">MotorLand is nisi aliquip ea consequat duis velit esse
                                    cillum dolore fugiat nulla pariatur excepteur sint occaecat.</div>
                                <div class="ui-decor-2"></div>
                            </div>
                        </li>
                        <li class="b-about-list__item"><i class="b-about-list__icon flaticon-transport"></i>
                            <div class="b-about-list__inner">
                                <div class="b-about-list__title">Affordable Auto Prices</div>
                                <div class="b-about-list__info">MotorLand is nisi aliquip ea consequat duis velit esse
                                    cillum dolore fugiat nulla pariatur excepteur sint occaecat.</div>
                                <div class="ui-decor-2"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end .b-about-->
    </section>
    <!-- end .b-about-->
    <div class="info-group block-table block-table_md">
        <div class="info-group__section col-md-6">
            <section class="b-info b-info_mod-a area-bg area-bg_op_80 area-bg_prim parallax"
                style="background-image: url(<?php echo ROOT_URL ?>/assets/media/content/bg/bg-4.jpg)">
                <div class="area-bg__inner">
                    <h2 class="b-info__title">Are You Looking<strong class="b-info__title_lg">TO BUY A CAR?</strong>
                    </h2>
                    <div class="b-info__desc">MotorLand is nisi aliquip exa con velit esse cillum dolore fugiatal sint
                        occaecat excepteur ipsum dolor sit amet consectetur.</div><a class="btn btn-white"
                        href="#">search your car</a>
                </div>
            </section>
        </div>
        <div class="info-group__section col-md-6">
            <section class="b-info b-info_mod-b area-bg area-bg_op_80 area-bg_dark-2 parallax"
                style="background-image: url(<?php echo ROOT_URL ?>/assets/media/content/bg/bg-3.jpg)">
                <div class="area-bg__inner">
                    <h2 class="b-info__title">Do You Want To<strong class="b-info__title_lg">SELL YOUR CAR?</strong>
                    </h2>
                    <div class="b-info__desc">MotorLand is nisi aliquip exa con velit esse cillum dolore fugiatal sint
                        occaecat excepteur ipsum dolor sit amet consectetur.</div><a class="btn btn-white" href="#">let
                        us know</a>
                </div>
            </section>
        </div>
    </div>
    <!-- end .b-info-group-->
    <section class="section-news section-news_mod-a">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Latest News</h2>
                        <div class="ui-subtitle-block">Tempor incididunt labore dolore magna clium fugiat alique</div>
                        <div class="ui-decor"></div>
                    </div>
                    <div class="carousel-news owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel"
                        data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false"
                        data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                        <section class="b-post b-post-1 clearfix">
                            <div class="entry-media">
                                <img class="img-responsive" src="<?php echo ROOT_URL?>\assets\img\img_news.jpeg"
                                    alt="Foto" />
                            </div>
                            <div class="entry-main">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <div class="entry-meta__face">
                                            <img class="img-responsive" src="assets/img/img-news.jpeg" alt="face" />
                                        </div>
                                        <!-- <span class="entry-meta__item">Post by<a class="entry-meta__link"
                                                href="blog-main.html"> Thomas Neil</a></span><a
                                            class="entry-meta__categorie" href="blog-main.html"><strong>Ford
                                                News</strong></a> -->
                                    </div>
                                    <h2 class="entry-title"><a href="blog-post.html">Ford Motors overhauled its design
                                            team </a></h2>
                                </div>
                                <div class="entry-content">
                                    <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur
                                        ipsum doloe amet consecteur adipisicing elit.</p>
                                </div>
                                <div class="entry-footer">
                                    <div class="entry-footer__inner">
                                        <div class="b-post-social">SHARE
                                            <ul class="b-post-social__list list-inline">
                                                <li><a href="twitter.com"><i class="icon fa fa-twitter"></i></a>
                                                </li>
                                                <li><a href="facebook.com"><i class="icon fa fa-facebook"></i></a>
                                                </li>
                                                <li><a href="plus.google.com"><i class="icon fa fa-google-plus"></i></a>
                                                </li>
                                                <li><a href="pinterest.com"><i class="icon fa fa-pinterest-p"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- <div class="entry-meta">
                                            <span class="entry-meta__item"><i
                                                    class="entry-meta__icon fa fa-heart"></i>300</span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- end .post-->
                    </div>
                    <!-- end .carousel-news-->
                </div>
            </div>
        </div>
    </section>
    <!-- end .section-news-->
   

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
    <script src="<?php echo ROOT_URL ?>/assets/plugins/headers/header.js?<?php echo rand()?>"></script>
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