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
    <title>Motor Land / Home</title>
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

    <div class="section-title-page test-drive area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Simulasi Kredit</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="https://suzukitrada.sketsahouse.com"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li class="active">Simulasi Kredit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="simulasi-kredit">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form class="b-calculator simulasi">
                        <div class="b-calculator__group g_sk">
                            <div class="b-calculator__label lbl_sk">Mobil Mobil</div>
                            <select class="selectpicker" data-width="100%" name="QABOUT">
                                <option>Tipe Mobil</option>
                                <?php 
                                        foreach($list_mobil as $k => $v){
                                    ?>
                                <option value="<?php $k ?>"><?php echo $v ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="b-calculator__group g_sk">
                            <div class="b-calculator__label lbl_sk">Tipe Mobil</div>
                            <select class="selectpicker" data-width="100%" name="QABOUT">
                                <option>Tipe Mobil</option>
                                <?php 
                                        foreach($list_mobil as $k => $v){
                                    ?>
                                <option value="<?php $k ?>"><?php echo $v ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="b-calculator__group g_sk">
                            <div class="b-calculator__label lbl_sk">Harga OTR</div>
                            <input class="b-calculator__input form-control" type="number" placeholder="Rp. 0" />
                        </div>
                        <div class="b-calculator__group g_sk">
                            <div class="b-calculator__label lbl_sk">Ansuran</div>
                            <select class="selectpicker" data-width="100%" name="QABOUT">
                                <option value="12">12 Bulan</option>
                                <option value="24">24 Bulan</option>
                                <option value="36">36 Bulan</option>
                                <option value="48">48 Bulan</option>
                                <option value="60">60 Bulan</option>
                            </select>
                        </div>
                        <button class="btn btn-dark">Kalkulasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
require_once ('includes/footer.php')
 ?>


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