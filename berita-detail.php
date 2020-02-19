<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';

$var['ID'] = isset($_REQUEST['id'])?$_REQUEST['id']:'';
$list = getRecord('tbl_content', $var);
$list = $list['RESULT'][0];
$pr['HIT']=$list['HIT']+1;
$pr['ID']=$list['ID'];
upcountArt($pr);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $objConf['DD_SITENAME']?> | <?php echo $list['TITLE']?></title>
    <meta content="<?php echo $list['SUMMARY']?>" name="description" />
    <meta content="<?php echo $list['KEYWORD']?>" name="keywords" />
    <meta property="og:url" content="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $list['TITLE']?>" />
    <meta property="og:description" content="<?php echo $list['DESCRIPTION']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?> ?>" />
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

    <?php
$list = getRecord('tbl_content', $var);
foreach($list['RESULT'] as $list){

?>
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a"><?php echo $list['TITLE']?></h1>
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
                        <li><a href="<?php echo ROOT_URL?>"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li><a href="<?php echo ROOT_URL?>/berita.php">Latest News</a>
                        </li>
                        <li class="active"><?php echo $list['TITLE']?></li>
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
                    <article class="b-post b-post-full clearfix">
                        <div class="entry-media">
                            <a class="js-zoom-images"
                                href="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>">
                                <img class="img-responsive"
                                    src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>"
                                    alt="Foto" />
                            </a>
                        </div>
                        <div class="entry-main">
                            <div class="entry-meta">
                                <div class="entry-meta__group-left"><span class="entry-meta__item"><a
                                            class="entry-meta__link" href="blog-main.html"></a></span>
                                    <span class="entry-meta__item">Tanggal Rilis<a class="entry-meta__link" href="">
                                            <?php echo tanggal($list['CREATE_TIMESTAMP'], 'tipe3'); ?></a></span>
                                    <!-- <span class="entry-meta__categorie bg-primary">Ford News</span> -->
                                </div>
                                <div class="entry-meta__group-right"><span class="entry-meta__item"><i
                                            class="icon fa fa-heart"></i><a class="entry-meta__link"
                                            href="blog-main.html"> </a></span><span class="entry-meta__item"><i
                                            class="icon fa fa-comment-o"></i><a class="entry-meta__link"
                                            href="blog-main.html"></a></span>
                                </div>
                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title"><a
                                        href="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>"><?php echo $list['TITLE']?></a>
                                </h2>
                            </div>
                            <div class="entry-content">
                                <p><?php 
                                
                                $list['CONTENT']=str_replace('<img','<img style="width:100%"',$list['CONTENT']);
                                 
                                echo $list['CONTENT']?>
                                </p>
                            </div>
                        </div>
                        <!-- <div class="entry-footer">
                            <div class="entry-footer__group">
                                <i class="icon fa fa-tags text-primary"></i><span
                                    class="entry-footer__title">tags:</span><a class="entry-footer__tags"
                                    href="blog-post.html">Buy Car</a><a class="entry-footer__tags"
                                    href="blog-post.html">sell Car</a>
                                <a class="entry-footer__tags" href="blog-post.html">autos</a><a
                                    class="entry-footer__tags" href="blog-post.html">motors</a>
                            </div>
                            <div class="entry-footer__group">
                                <i class="icon fa fa-share-alt text-primary"></i><a class="entry-footer__link"
                                    href="blog-post.html">Share This Post</a>
                            </div>
                        </div> -->
                    </article>
                    <!-- end .post-->
                    <!-- <div class="about-author bg-grey clearfix">
                        <div class="about-author__img">
                            <img class="img-responsive" src="assets/media/content/posts/about-author/1.jpg"
                                alt="foto" />
                        </div>
                        <div class="about-author__inner"><span class="about-author__title">Author:<span
                                    class="about-author__name"> Andrew Burnett</span></span><span
                                class="about-author__category">Senior Post Editor</span>
                            <div class="about-author__description">Elit sed do eiusmod tempor incididunt ut labort
                                dolore magna aliqua enim ad min veniam exercitation ullamco laboris nisi ut aliquip exea
                                comodo consequat. Duis aute irure dolor voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur.</div>
                        </div>
                    </div> -->
                    <!-- end .about-author-->

                    <div class="post-carousel owl-carousel owl-theme enable-owl-carousel" data-min768="2"
                        data-min992="2" data-min1200="2" data-margin="30" data-pagination="false" data-navigation="true"
                        data-auto-play="4000" data-stop-on-hover="true">
                        <?php
                        $vCS['LIMIT'] = 10;
                        $list = getRecord('tbl_content', $vCS);
                        foreach($list['RESULT'] as $list){
                            $url = getNewsUrl($list);

                        ?>
                        <div class="b-post-nav__item"><span class="b-post-nav__img">
                                <img class="img-responsive"
                                    src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>"
                                    alt="foto" /></span>
                            <span class="b-post-nav__inner">
                                <span class="b-post-nav__title"><?php echo $list['TITLE']?></span>
                                <a class="b-post-nav__btn btn btn-primary btn-xs"
                                    href="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>">Read</a>
                            </span>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- <section class="section-comment">
                        <h2 class="ui-title-inner">2 comments</h2>
                        <ul class="comments-list list-unstyled">
                            <li>
                                <article class="comment clearfix">
                                    <div class="comment-face">
                                        <img class="img-responsive" src="assets/media/content/posts/face/1.jpg"
                                            alt="face" />
                                    </div>
                                    <div class="comment-inner">
                                        <header class="comment-header">
                                            <cite class="comment-author">Darren Smith</cite><span
                                                class="comment-datetime">Posted On
                                                <time datetime="2017-09-24T18:18"> 31 August at 3:50 PM</time></span><a
                                                class="comment-btn text-primary" href="blog-post.html"><i
                                                    class="icon fa fa-reply"></i></a>
                                        </header>
                                        <div class="comment-body">
                                            <p>Elit sed do eiusmod tempor incididunt ut labort dolore magna aliqua enim
                                                ad min veniam dui sed exercitation ullamco laboris nisi ut aliquip exea
                                                comodo consequat.</p>
                                        </div>
                                    </div>
                                </article>
                                <ul class="children list-unstyled">
                                    <li>
                                        <article class="comment clearfix">
                                            <div class="comment-face">
                                                <img class="img-responsive" src="assets/media/content/posts/face/2.jpg"
                                                    alt="face" />
                                            </div>
                                            <div class="comment-inner">
                                                <header class="comment-header">
                                                    <cite class="comment-author">Robert Shaw</cite><span
                                                        class="comment-datetime">Posted On
                                                        <time datetime="2017-09-24T18:18"> 31 August at 3:50
                                                            PM</time></span><a class="comment-btn text-primary"
                                                        href="blog-post.html"><i class="icon fa fa-reply"></i></a>
                                                </header>
                                                <div class="comment-body">
                                                    <p>Elit sed do eiusmod tempor incididunt ut labort dolore magna
                                                        aliqua enim ad min veniam dui sed exercitation ullamco laboris
                                                        nisi ut aliquip exea comodo consequat.</p>
                                                </div>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <article class="comment clearfix">
                                    <div class="comment-face">
                                        <img class="img-responsive" src="assets/media/content/posts/face/1.jpg"
                                            alt="face" />
                                    </div>
                                    <div class="comment-inner">
                                        <header class="comment-header">
                                            <cite class="comment-author">Darren Smith</cite><span
                                                class="comment-datetime">Posted On
                                                <time datetime="2017-09-24T18:18"> 31 August at 3:50 PM</time></span><a
                                                class="comment-btn text-primary" href="blog-post.html"><i
                                                    class="icon fa fa-reply"></i></a>
                                        </header>
                                        <div class="comment-body">
                                            <p>Elit sed do eiusmod tempor incididunt ut labort dolore magna aliqua enim
                                                ad min veniam dui sed exercitation ullamco laboris nisi ut aliquip exea
                                                comodo consequat.</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </section> -->
                    <!-- end .section-comment-->
                    <!-- <section class="section-reply-form" id="section-reply-form">
                        <h2 class="ui-title-inner">Leave a comment</h2>
                        <form class="form-reply ui-form-2" action="#" method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="ui-label">your name</div>
                                        <input class="form-control" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <div class="ui-label">Email address</div>
                                        <input class="form-control" type="email" />
                                    </div>
                                    <div class="form-group">
                                        <div class="ui-label">phone</div>
                                        <input class="form-control" type="tel" />
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="ui-label">your Comments</div>
                                        <textarea class="form-control" rows="9"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="text-right">
                                        <button class="ui-form__btn btn btn-primary">submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section> -->
                    <!-- end .section-reply-form-->
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
                    <!-- <section class="widget section-sidebar">
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
                    </section> -->
                    <!-- end .widget-->
                    <section class="widget section-sidebar">
                        <h3 class="widget-title ui-title-inner">recent posts</h3>
                        <div class="widget-content">
                            <?php
                            $varRP['LIMIT']=4;
                           $list = getRecord('tbl_content', $varRP);
                           foreach($list['RESULT'] as $list){
                        ?>
                            <div class="post-widget clearfix">
                                <div class="post-widget__media">
                                    <a href="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>">
                                        <img class="img-responsive"
                                            src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a>
                                </div>
                                <div class="post-widget__inner"><a class="post-widget__title"
                                        href="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>"><?php echo $list['TITLE']?></a>
                                    <div class="post-widget__date">
                                        <time class="post-widget__time"
                                            datetime="2017-10-27 15:20"><?php echo tanggal($list['CREATE_TIMESTAMP'], 'tipe3'); ?></time>
                                    </div>
                                </div>
                                <!-- end .widget-post-->
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <!-- end .widget-->
                    <!-- <section class="widget section-sidebar">
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
                    </section> -->
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

    <?php } ?>
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