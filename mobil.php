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
                        <h1 class="b-title-page bg-primary_a">cars listings III</h1>
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
                        <li class="active">Vehicle Inventry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb-->
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <main class="l-main-content">
                    <div class="filter-goods">
                        <div class="filter-goods__info">Showing results from<strong> 1 - 10</strong> of total<strong>
                                35</strong>
                        </div>
                        <div class="filter-goods__select"><span class="hidden-xs">Sort</span>
                            <!-- <select class="selectpicker" data-width="172">
                                <option>Most Revelant</option>
                                <option>A-Z</option>
                                <option>Z-A</option>
                            </select> -->
                            <div class="btns-switch"><i
                                    class="btns-switch__item js-view-th active icon fa fa-th-large"></i><i
                                    class="btns-switch__item js-view-list icon fa fa-th-list"></i>
                            </div>
                        </div>
                    </div>
                    <!-- end .filter-goods-->
            
                    <div class="goods-group-2 list-goods list-goods_th">
                    <?php 
                        for($i = 0; $i < 6; $i++){
                    ?>
                        <section class="b-goods-1 b-goods-1_mod-a">
                            <div class="row">
                                <div class="b-goods-1__img">
                                    <a class="js-zoom-images" href="assets/media/components/b-goods/263x210_1.jpg">
                                        <img class="img-responsive" src="assets/media/components/b-goods/263x210_1.jpg"
                                            alt="foto" />
                                    </a><span class="b-goods-1__price hidden-th">$45,000
                                        <!-- <span class="b-goods-1__price-msrp">MSRP $27,000</span> -->
                                        </span>
                                </div>
                                <div class="b-goods-1__inner">
                                    <div class="b-goods-1__header"><a class="b-goods-1__choose hidden-th"
                                            href="listing-1.html">
                                            <!-- <i class="icon fa fa-heart-o"></i> -->
                                        </a>
                                        <h2 class="b-goods-1__name"><a href="mobil-detail.php">FERRARI F650 SCUDERIA</a>
                                        </h2>
                                    </div>
                                    <div class="b-goods-1__info">Duis aute irure reprehender voluptate velit esacium
                                        fugiat nula pariatur excepteurd magna aliqua ut enim ad minim veniam quis
                                        nostrud Lorem ipsum dolor sit amet con sectetur adipisicing elit sed do eiusmod
                                        tempor
                                        incididunt<span class="b-goods-1__info-more collapse" id="info-1"> lorem ipsum
                                            dolor sit amet, consectetur adipisicing elit. Odit aut rerum numquam hic
                                            eum, aperiam fuga, pariatur repellendus. Incidunt corporis iusto illo
                                            nesciunt soluta optio eius aliquam. Similique, laborum dicta!</span>
                                        <span class="b-goods-1__info-link" data-toggle="collapse"
                                            data-target="#info-1"></span>
                                    </div><span class="b-goods-1__price_th text-primary visible-th">Rp. 123.123.123
                                        <!-- <span class="b-goods-1__price-msrp">MSRP $27,000</span> -->
                                            <a
                                            class="b-goods-1__choose" href="listing-1.html">
                                            <!-- <i class="icon fa fa-heart-o"></i> -->
                                        </a>
                                    </span>
                                    <div class="b-goods-1__section">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-1">
                                            Highlights</h3>
                                        <div class="collapse in" id="desc-1">
                                            <ul class="b-goods-1__desc list-unstyled">
                                                <li class="b-goods-1__desc-item">35,000 mi</li>
                                                <li class="b-goods-1__desc-item"><span class="hidden-th">Model:</span>
                                                    2017</li>
                                                <li class="b-goods-1__desc-item">Auto</li>
                                                <li class="b-goods-1__desc-item hidden-th">320 hp</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="b-goods-1__section hidden-th">
                                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#list-1">
                                            specifications</h3>
                                        <div class="collapse in" id="list-1">
                                            <ul class="b-goods-1__list list list-mark-5">
                                                <li class="b-goods-1__list-item">Engine DOHC 24-valve V-6</li>
                                                <li class="b-goods-1__list-item">Audio Controls on Steering Wheel</li>
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
                        <!-- end .b-goods-1-->
                    </div>
                    <!-- end .goods-group-2-->
                </main>
                <!-- end .l-main-content-->
            </div>
            <div class="col-md-3 col-md-pull-9">
                <aside class="l-sidebar">
                    <form class="b-filter-2 bg-grey">
                        <h3 class="b-filter-2__title">Cari</h3>
                        <div class="b-filter-2__inner">
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Body style</div>
                                <div class="b-filter-type-2">
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typePickup" type="checkbox" />
                                        <label class="b-filter-type-2__label" for="typePickup"><i
                                                class="b-filter-type-2__icon flaticon-pick-up"></i><span
                                                class="b-filter-type-2__title">PICKUP</span>
                                        </label>
                                    </div>
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typeSuv" type="checkbox" />
                                        <label class="b-filter-type-2__label" for="typeSuv"><i
                                                class="b-filter-type-2__icon flaticon-car-of-hatchback-model"></i><span
                                                class="b-filter-type-2__title">SUV</span>
                                        </label>
                                    </div>
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typeCoupe" type="checkbox" />
                                        <label class="b-filter-type-2__label" for="typeCoupe"><i
                                                class="b-filter-type-2__icon flaticon-coupe-car"></i><span
                                                class="b-filter-type-2__title">coupe</span>
                                        </label>
                                    </div>
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typeConvertible" type="checkbox"
                                            checked="checked" />
                                        <label class="b-filter-type-2__label" for="typeConvertible"><i
                                                class="b-filter-type-2__icon flaticon-cabrio-car"></i><span
                                                class="b-filter-type-2__title">CONVERTIBLE</span>
                                        </label>
                                    </div>
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typeSedan" type="checkbox" />
                                        <label class="b-filter-type-2__label" for="typeSedan"><i
                                                class="b-filter-type-2__icon flaticon-sedan-car-model"></i><span
                                                class="b-filter-type-2__title">sedan</span>
                                        </label>
                                    </div>
                                    <div class="b-filter-type-2__item">
                                        <input class="b-filter-type-2__input" id="typeMinicar" type="checkbox" />
                                        <label class="b-filter-type-2__label" for="typeMinicar"><i
                                                class="b-filter-type-2__icon flaticon-car-1"></i><span
                                                class="b-filter-type-2__title">MINICAR</span>
                                        </label>
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
</body>

</html>