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
    <title>Motor Land / Home</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/master.css" />
    <!-- SWITCHER-->
    <link href="<?php echo ROOT_URL ?>/assets/plugins/switcher/css/switcher.css" rel="stylesheet" id="switcher-css" />
    <link href="<?php echo ROOT_URL ?>/assets/plugins/switcher/css/color1.css" rel="alternate stylesheet"
        title="color1" />
    <link href="<?php echo ROOT_URL ?>/assets/plugins/switcher/css/color2.css" rel="alternate stylesheet"
        title="color2" />
    <link href="<?php echo ROOT_URL ?>/assets/plugins/switcher/css/color3.css" rel="alternate stylesheet"
        title="color3" />
    <link href="<?php echo ROOT_URL ?>/assets/plugins/switcher/css/color4.css" rel="alternate stylesheet"
        title="color4" />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!--[if lt IE 9 ]>
<script src="<?php echo ROOT_URL ?>/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
</head>

<body>

    <?php
require_once ('includes/header.php')
 ?>
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">news blog</h1>
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
                        <li class="active">Latest News</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <main class="l-main-content">
                    <div class="posts-group-2">
                        <section class="b-post b-post-full clearfix">
                            <div class="entry-media">
                                <a class="js-zoom-images" href="assets/media/content/posts/750x380/1.jpg">
                                    <img class="img-responsive" src="assets/media/content/posts/750x380/1.jpg"
                                        alt="Foto" />
                                </a>
                            </div>
                            <div class="entry-main">
                                <div class="entry-meta">
                                    <div class="entry-meta__group-left"><span class="entry-meta__item">Post by<a
                                                class="entry-meta__link" href="blog-main.html"> Thomas
                                                Neil</a></span><span class="entry-meta__item">On<a
                                                class="entry-meta__link" href="blog-main.html"> August 22,
                                                2017</a></span>
                                        <span class="entry-meta__categorie bg-primary">Ford News</span>
                                    </div>
                                    <div class="entry-meta__group-right"><span class="entry-meta__item"><i
                                                class="icon fa fa-heart"></i><a class="entry-meta__link"
                                                href="blog-main.html"> 205</a></span><span class="entry-meta__item"><i
                                                class="icon fa fa-comment-o"></i>Comments<a class="entry-meta__link"
                                                href="blog-main.html"> 518</a></span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h2 class="entry-title"><a href="blog-post.html">General Motors First In
                                            Self-Driving Cars</a></h2>
                                </div>
                                <div class="entry-content">
                                    <p>Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur
                                        excepteurd magna aliqua ut enimad minim veniam quis Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris...</p>
                                </div>
                                <div class="entry-footer"><a class="btn btn-default" href="blog-post.html">read more</a>
                                </div>
                            </div>
                        </section>
                        <!-- end .post-->
                        <section class="b-post b-post-full clearfix">
                            <div class="entry-media">
                                <a class="js-zoom-images" href="assets/media/content/posts/750x380/2.jpg">
                                    <img class="img-responsive" src="assets/media/content/posts/750x380/2.jpg"
                                        alt="Foto" />
                                </a>
                            </div>
                            <div class="entry-main">
                                <div class="entry-meta">
                                    <div class="entry-meta__group-left"><span class="entry-meta__item">Post by<a
                                                class="entry-meta__link" href="blog-main.html"> Thomas
                                                Neil</a></span><span class="entry-meta__item">On<a
                                                class="entry-meta__link" href="blog-main.html"> August 22,
                                                2017</a></span>
                                        <span class="entry-meta__categorie bg-primary">Ford News</span>
                                    </div>
                                    <div class="entry-meta__group-right"><span class="entry-meta__item"><i
                                                class="icon fa fa-heart"></i><a class="entry-meta__link"
                                                href="blog-main.html"> 205</a></span><span class="entry-meta__item"><i
                                                class="icon fa fa-comment-o"></i>Comments<a class="entry-meta__link"
                                                href="blog-main.html"> 518</a></span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h2 class="entry-title"><a href="blog-post.html">Honda Civic Si Brings Sporty
                                            Demeanor</a></h2>
                                </div>
                                <div class="entry-content">
                                    <p>Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur
                                        excepteurd magna aliqua ut enimad minim veniam quis Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris...</p>
                                </div>
                                <div class="entry-footer"><a class="btn btn-default" href="blog-post.html">read more</a>
                                </div>
                            </div>
                        </section>
                        <!-- end .post-->
                        <div class="b-bnr-3">
                            <div class="b-bnr-3__title">We offers the lowest car prices</div>
                            <div class="b-bnr-3__info"><span class="b-bnr-3__info-item">Post by Thomas Neil</span><span
                                    class="b-bnr-3__info-item">On August 22, 2017</span><a class="btn btn-primary"
                                    href="blog-post.html">Ford News</a>
                            </div>
                        </div>
                        <!-- end .b-banner-->
                        <section class="b-post b-post-full clearfix">
                            <div class="entry-media">
                                <div class="owl-carousel owl-theme owl-theme_mod-arrs enable-owl-carousel"
                                    data-pagination="false" data-navigation="true" data-items="1" data-auto-play="7000"
                                    data-transition-style="fade" data-main-text-animation="true"
                                    data-after-init-delay="3000" data-after-move-delay="1000" data-stop-on-hover="true">
                                    <img class="img-responsive" src="assets/media/content/posts/750x380/3.jpg"
                                        alt="Foto" />
                                    <img class="img-responsive" src="assets/media/content/posts/750x380/2.jpg"
                                        alt="Foto" />
                                    <img class="img-responsive" src="assets/media/content/posts/750x380/1.jpg"
                                        alt="Foto" />
                                </div>
                            </div>
                            <div class="entry-main">
                                <div class="entry-meta">
                                    <div class="entry-meta__group-left"><span class="entry-meta__item">Post by<a
                                                class="entry-meta__link" href="blog-main.html"> Thomas
                                                Neil</a></span><span class="entry-meta__item">On<a
                                                class="entry-meta__link" href="blog-main.html"> August 22,
                                                2017</a></span>
                                        <span class="entry-meta__categorie bg-primary">Ford News</span>
                                    </div>
                                    <div class="entry-meta__group-right"><span class="entry-meta__item"><i
                                                class="icon fa fa-heart"></i><a class="entry-meta__link"
                                                href="blog-main.html"> 205</a></span><span class="entry-meta__item"><i
                                                class="icon fa fa-comment-o"></i>Comments<a class="entry-meta__link"
                                                href="blog-main.html"> 518</a></span>
                                    </div>
                                </div>
                                <div class="entry-header">
                                    <h2 class="entry-title"><a href="blog-post.html">BMW Recall Over 45,000 Older
                                            BMW’s</a></h2>
                                </div>
                                <div class="entry-content">
                                    <p>Duis aute irure reprehender voluptate velit esacium fugiat nula pariatur
                                        excepteurd magna aliqua ut enimad minim veniam quis Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua enim ad minim veniam, quis nostrud exercitation
                                        ullamco laboris...</p>
                                </div>
                                <div class="entry-footer"><a class="btn btn-default" href="blog-post.html">read more</a>
                                </div>
                            </div>
                        </section>
                        <!-- end .post-->
                    </div>
                    <ul class="pagination">
                        <li><a href="#"><i class="icon fa fa-angle-double-left"></i></a>
                        </li>
                        <li><a href="#">1</a>
                        </li>
                        <li class="active"><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#"><i class="icon fa fa-angle-double-right"></i></a>
                        </li>
                    </ul>
                </main>
                <!-- end .l-main-content-->
            </div>
            <div class="col-md-4">
                <aside class="l-sidebar-3">
                    <div class="widget widget-searce">
                        <form class="form-sidebar" id="search-global-form">
                            <input class="form-sidebar__input form-control" type="search"
                                placeholder="Search News ..." />
                            <button class="form-sidebar__btn"><i class="icon fa fa-search text-primary"></i>
                            </button>
                        </form>
                    </div>
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">categories</h3>
                        <div class="widget-content">
                            <ul class="widget-list list list-mark-5">
                                <li class="widget-list__item"><a class="widget-list__link"
                                        href="blog-post.html">Ferrari</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link"
                                        href="blog-post.html">Volkswagen</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link"
                                        href="blog-post.html">Lamborghini</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link" href="blog-post.html">Austin
                                        Martin</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link" href="blog-post.html">Land
                                        Rover</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link"
                                        href="blog-post.html">McLaren</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link"
                                        href="blog-post.html">Mercedes-Benz</a>
                                </li>
                                <li class="widget-list__item"><a class="widget-list__link" href="blog-post.html">Buy or
                                        Sell Car</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">recent posts</h3>
                        <div class="widget-content">
                            <div class="post-widget clearfix">
                                <div class="post-widget__media">
                                    <a href="blog-post.html">
                                        <img class="img-responsive" src="assets/media/content/posts/100x80/1.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="post-widget__inner"><a class="post-widget__title" href="blog-post.html">2018
                                        Chevrolet Camaro ZL1 1LE: Review</a>
                                    <div class="post-widget__date">On
                                        <time class="post-widget__time" datetime="2017-10-27 15:20">August 22,
                                            2017</time>
                                    </div>
                                </div>
                                <!-- end .widget-post-->
                            </div>
                            <div class="post-widget clearfix">
                                <div class="post-widget__media">
                                    <a href="blog-post.html">
                                        <img class="img-responsive" src="assets/media/content/posts/100x80/2.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="post-widget__inner"><a class="post-widget__title"
                                        href="blog-post.html">Renault Sport 2027 Vision Concept To Debut</a>
                                    <div class="post-widget__date">On
                                        <time class="post-widget__time" datetime="2017-10-27 15:20">August 22,
                                            2017</time>
                                    </div>
                                </div>
                                <!-- end .widget-post-->
                            </div>
                            <div class="post-widget clearfix">
                                <div class="post-widget__media">
                                    <a href="blog-post.html">
                                        <img class="img-responsive" src="assets/media/content/posts/100x80/3.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="post-widget__inner"><a class="post-widget__title"
                                        href="blog-post.html">Jaguar Offers New Petrol &amp; Technology Options</a>
                                    <div class="post-widget__date">On
                                        <time class="post-widget__time" datetime="2017-10-27 15:20">August 22,
                                            2017</time>
                                    </div>
                                </div>
                                <!-- end .widget-post-->
                            </div>
                            <div class="post-widget clearfix">
                                <div class="post-widget__media">
                                    <a href="blog-post.html">
                                        <img class="img-responsive" src="assets/media/content/posts/100x80/4.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="post-widget__inner"><a class="post-widget__title" href="blog-post.html">2018
                                        Lexus LC500: Definition Of Sexy And Exotic</a>
                                    <div class="post-widget__date">On
                                        <time class="post-widget__time" datetime="2017-10-27 15:20">August 22,
                                            2017</time>
                                    </div>
                                </div>
                                <!-- end .widget-post-->
                            </div>
                        </div>
                    </section>
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">TAGs WIDGET</h3>
                        <div class="widget-content">
                            <ul class="list-tags list-unstyled">
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Car
                                        Dealer</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Ferrari</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Buy Car</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Sell Your
                                        Car</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Latest
                                        Cars</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">SUV’s</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Latest
                                        Vehicles</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link"
                                        href="blog-main.html">Automobile</a>
                                </li>
                                <li class="list-tags__item"><a class="list-tags__link" href="blog-main.html">Truck</a>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!-- end .widget-->
                    <section class="widget widget-gallery section-sidebar">
                        <h3 class="widget-title ui-title-inner">instagram feed</h3>
                        <div class="widget-content">
                            <div class="js-zoom-gallery">
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/1.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/1.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/2.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/2.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/3.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/3.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/4.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/4.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/5.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/5.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/6.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/6.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/7.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/7.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/8.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/8.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="widget-gallery__item">
                                    <a class="widget-gallery__img js-zoom-gallery__item"
                                        href="assets/media/content/gallery/100x80/9.jpg">
                                        <img class="img-responsive" src="assets/media/content/gallery/100x80/9.jpg"
                                            alt="foto" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="widget widget-newsletter section-sidebar">
                        <h3 class="widget-title ui-title-inner">newsletter</h3>
                        <div class="widget-content">
                            <p>Duis aute irure reprehender voluptate velit ese acium fugiat nulla pariatur lorem
                                excepteur ipsum</p>
                            <form class="form-sidebar" id="newsletter-form">
                                <input class="form-sidebar__input form-control" type="text"
                                    placeholder="Email address" />
                                <button class="form-sidebar__btn"><i class="icon fa fa-envelope-open text-primary"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- end .widget-->
                </aside>
                <!-- end .sidebar-->
            </div>
        </div>
    </div>


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