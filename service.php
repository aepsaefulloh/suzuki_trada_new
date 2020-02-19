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
    <title>Service | <?php echo $objConf['DD_SITENAME']?></title>
    <meta content="<?php echo $objConf['DD_DESCRIPTION']?>" name="description" />
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
    require_once ('includes/header.php');s
    ?>

    <div class="main-slider main-slider-4">
        <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="650px"
            data-slider-arrows="false" data-slider-buttons="false">
            <div class="sp-slides">
                <!-- Slide 1-->
                <div class="sp-slide">
                    <img class="sp-image"
                        src="<?php echo ROOT_URL ?>/assets/img/hero-automobile.jpg?<?php echo rand()?>" alt="slider" />
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="sp-layer" data-show-transition="left" data-hide-transition="left"
                                    data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                                    <div class="main-slider__label">Service Mobil</div>
                                    <div class="main-slider__title">Service Mobil Suzuki Anda
                                    </div>
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

    <section class="section-type-2 title" style="padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-type-2__inner">
                        <h2 class="section-type-2__title">EDUKASI SERVIS MOBIL
                        </h2>
                        <div class="section-type-2__subtitle">Pentingnya Perawatan Berkala
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-type-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-type-2__inner">
                        <h2 class="section-type-2__title">Menjaga keamanan, kenyamanan, ketahanan, dan performa
                            kendaraan
                        </h2></br>
                        <p>Seiring dengan waktu, suku cadang akan mengalami keausan dan penurunan kualitas, demikian
                            halnya dengan oli dan fluida.</br></br>

                            Mungkin Anda tidak menyadarai perubahan yang terjadi karena proses ini tidak terlihat dan
                            terjadi dalam waktu yang lama namun pasti.</br></br>

                            Untuk keamanan dan kenyamanan dalam berkendara, rawatlah Suzuki Anda secara berkala dan
                            rutin, penggantian oli mesin dan minyak rem sesuai waktu yang telah ditentukan akan menjamin
                            keamanan, kenyamanan, ketahanan dan performa Suzuki yang optimal.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-type-2__inner">
                        <h2 class="section-type-2__title">Berhemat dalam jangka panjang
                        </h2>
                        </br>
                        <p>Hal ini membantu Anda berhemat dan dalam jangka waktu lama dan dapat terhindar dari
                            kemungkinan terjadinya masalah yang serius dan memerlukan biaya besar. Perawatan yang baik
                            juga akan menaikkan harga jual kembali kendaraan Suzuki Anda.</p>
                    </div>
                    </br>
                    <div class="section-type-2__inner">
                        <h2 class="section-type-2__title">Jaminan suku cadang asli
                        </h2>
                        </br>
                        <p>Suzuki menganjurkan penggunaan suku cadang asli saat perawatan atau perbaikan. Suku cadang
                            asli Suzuki menjanjikan pengalaman berkendaraan terbaik.</br>

                            Kami memberikan jaminan untuk suku cadang yang dibeli dan dipasang di Bengkel Resmi serta
                            pekerjaan perbaikan dan perawatan yang dilakukan sesuai ketentuan yang berlaku.</p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
    require_once ('includes/footer.php')
    ?>


    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <!-- google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- END google recaptcha -->
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
    <script src="<?php echo ROOT_URL ?>/assets/plugins/datepicker/jquery.datetimepicker.js"></script>


    <script>

    </script>




</body>

</html>