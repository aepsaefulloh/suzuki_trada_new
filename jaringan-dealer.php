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
    <title>Jaringan Dealer</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <meta property="og:image" content="<?php echo ROOT_URL?>/assets/img/about_img.jpg?<?php echo rand()?>"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta property="og:url" content="<?php echo ROOT_URL?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $objConf['DD_SITENAME']?>" />
    <meta property="og:description" content="<?php echo $objConf['DD_DESCRIPTION']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL?>/assets/img/about_img.jpg?<?php echo rand()?>"/>
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

    <div class="hero-image">
        <div class="hero-text">
            <h1 class="hero-title">Dealer Suzuki Trada</h1>
        </div>
    </div>



    <section class="jaringan-delaer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jaringan-dealer-inner">
                    <iframe class="iframe-dealer" src="https://www.google.com/maps/d/embed?mid=1EJI0KJry2vgr_thh8WajcvZlyIS-7XzH&hl=en"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- end .b-about-->
    </section>


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