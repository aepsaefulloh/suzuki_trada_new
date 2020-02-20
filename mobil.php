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
<?php require_once ROOT_PATH.'/includes/analytics.php'?>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Produk | <?php echo $objConf['DD_SITENAME']?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <meta property="og:url" content="<?php echo ROOT_URL?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $objConf['DD_SITENAME']?>" />
    <meta property="og:description" content="<?php echo $objConf['DD_DESCRIPTION']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL?>/assets/img/about_img.jpg?<?php echo rand()?>"/>
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

    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Suzuki Trada Produk</h1>
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
                        <li><a href="<?php echo ROOT_URL ?>"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li class="active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="banner-ads">
        <img class="img-fluid ads-img" src="<?php echo ROOT_URL?>/assets/img/ads_img.jpg?<?php echo rand()?>"/>
</div> -->
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row mobile-reverse">
            <div class="col-md-9 col-md-push-3 ">
                <main class="l-main-content">
                    <div class="filter-goods">
                        <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong>
                                35</strong>
                        </div>
                        <!-- <div class="filter-goods__select"><span class="hidden-xs">Sort</span>
                            <select class="selectpicker" data-width="172">
                                <option>Most Revelant</option>
                                <option>A-Z</option>
                                <option>Z-A</option>
                            </select>
                            <div class="btns-switch"><i
                                    class="btns-switch__item js-view-th active icon fa fa-th-large"></i><i
                                    class="btns-switch__item js-view-list icon fa fa-th-list"></i>
                            </div>
                        </div> -->
                    </div>
                    <!-- end .filter-goods-->
                    <div class="goods-group-2 list-goods list-goods_th filtr-container">
                        <?php
                            $var_all['LIMIT'] = 9;
                            // $var_all['CATEGORY'] = 3;
                            $var_all['STATUS']=1;
                            $list = getRecord('tbl_product', $var_all);
                            foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-goods-1 b-goods-1_mod-a filtr-item" data-category="1">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images"
                                        href="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                                        <img class="img-responsive anim-img"
                                            src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">RP. <?php echo $list['PRICE']?>
                                    </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                        </a>
                                        <h2 class="b-goods-1__name"><a
                                                href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT'] ?></a>
                                        </h2>
                                    </div>
                                    <span
                                        class="b-goods-1__price_th text-primary visible-th">Rp.&nbsp;<?php echo $list['PRICE']?>
                                        <a class="b-goods-1__choose" href="">
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel
                                                </li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>
                        <?php
                            $var_hb['LIMIT'] = 9;
                            $var_hb['CATEGORY'] = 3;
                            $var_hb['STATUS']=1;
                            $list = getRecord('tbl_product', $var_hb);
                            foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-goods-1 b-goods-1_mod-a filtr-item" data-category="2">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images"
                                        href="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                                        <img class="img-responsive anim-img"
                                            src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">RP. <?php echo $list['PRICE']?>
                                    </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                        </a>
                                        <h2 class="b-goods-1__name"><a
                                                href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT'] ?></a>
                                        </h2>
                                    </div>
                                    <span
                                        class="b-goods-1__price_th text-primary visible-th">Rp.&nbsp;<?php echo $list['PRICE']?>
                                        <a class="b-goods-1__choose" href="">
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel
                                                </li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>
                        <?php
                            $var_mpv ['LIMIT'] = 9;
                            $var_mpv['CATEGORY'] = 8;
                            $list = getRecord('tbl_product', $var_mpv);
                            foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-goods-1 b-goods-1_mod-a filtr-item" data-category="3">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images"
                                        href="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                                        <img class="img-responsive anim-img"
                                            src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">RP. <?php echo $list['PRICE']?>
                                    </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                        </a>
                                        <h2 class="b-goods-1__name"><a
                                                href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT'] ?></a>
                                        </h2>
                                    </div>
                                    <span
                                        class="b-goods-1__price_th text-primary visible-th">Rp.&nbsp;<?php echo $list['PRICE']?>
                                        <a class="b-goods-1__choose" href="">
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel
                                                </li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>
                        <?php
                            $var_cc['LIMIT'] = 9;
                            $var_cc['CATEGORY'] = 11;
                            $var_cc['STATUS']=1;
                            $list = getRecord('tbl_product', $var_cc);
                            foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-goods-1 b-goods-1_mod-a filtr-item" data-category="4">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images"
                                        href="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                                        <img class="img-responsive anim-img"
                                            src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">RP. <?php echo $list['PRICE']?>
                                    </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                        </a>
                                        <h2 class="b-goods-1__name"><a
                                                href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT'] ?></a>
                                        </h2>
                                    </div>
                                    <span
                                        class="b-goods-1__price_th text-primary visible-th">Rp.&nbsp;<?php echo $list['PRICE']?>
                                        <a class="b-goods-1__choose" href="">
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel
                                                </li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>
                        <?php
                            $var_niaga ['LIMIT'] = 9;
                            $var_niaga['CATEGORY'] = 10;
                            $var_niaga['STATUS']=1;
                            $list = getRecord('tbl_product', $var_niaga);
                            foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-goods-1 b-goods-1_mod-a filtr-item" data-category="5">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images"
                                        href="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                                        <img class="img-responsive anim-img"
                                            src="<?php echo ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">RP. <?php echo $list['PRICE']?>
                                    </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                        </a>
                                        <h2 class="b-goods-1__name"><a
                                                href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>"><?php echo $list['PRODUCT'] ?></a>
                                        </h2>
                                    </div>
                                    <span
                                        class="b-goods-1__price_th text-primary visible-th">Rp.&nbsp;<?php echo $list['PRICE']?>
                                        <a class="b-goods-1__choose" href="">
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel
                                                </li>
                                                <li class="b-goods-1__list-item">Power Windows</li>
                                                <li class="b-goods-1__list-item">Daytime Running Lights</li>
                                                <li class="b-goods-1__list-item">Cruise Control, ABS</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php } ?>
                    </div>
                </main>
            </div>

            <div class="col-md-3 col-md-pull-9">
                <aside class="l-sidebar">
                    <form class="b-filter-2 bg-grey">
                        <h3 class="b-filter-2__title">Cari</h3>
                        <div class="b-filter-2__inner">
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Tipe Mobil</div>
                                <div class="list-group" style="padding-top:10px; margin-bottom:0px;">
                                    <a href="#" class="list-group-item list-group-item-action" data-filter="1"
                                        id="filter-control">Semua
                                        <i class="fa fa-angle-right" id="icon-angle-right"></i></a>
                                    <a href="#" class="list-group-item list-group-item-action" data-filter="2"
                                        id="filter-control">Hatchback
                                        <i class="fa fa-angle-right" id="icon-angle-right"></i></a>
                                    <a href="#" class="list-group-item list-group-item-action" data-filter="3"
                                        id="filter-control">MPV
                                        <i class="fa fa-angle-right" id="icon-angle-right"></i></a>
                                    <a href="#" class="list-group-item list-group-item-action" data-filter="4"
                                        id="filter-control">City Car
                                        <i class="fa fa-angle-right" id="icon-angle-right"></i></a>
                                    <a href="#" class="list-group-item list-group-item-action" data-filter="5"
                                        id="filter-control">Niaga
                                        <i class="fa fa-angle-right" id="icon-angle-right"></i></a>

                                </div>
                            </div>
                        </div>
            </div>
        </div>

    </div>
    </form>
    <!-- end .b-filter-->
    </aside>
    <!-- end .l-sidebar-->
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
    <!-- Filter -->
    <script src="<?php echo ROOT_URL?>/assets/plugins/filter/filter.js?<?php echo rand()?>"></script>

</body>

</html>