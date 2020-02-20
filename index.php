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
    <title><?php echo $objConf['DD_SITENAME']?></title>
    <meta content="<?php echo $objConf['DD_DESCRIPTION']?>" name="description" />
    <meta content="<?php echo $objConf['DD_KEYWORD']?>" name="keywords" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content="telephone=no" name="format-detection" />
    <meta name="HandheldFriendly" content="true" />
    <meta property="og:url" content="<?php echo ROOT_URL?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $objConf['DD_SITENAME']?>" />
    <meta property="og:description" content="<?php echo $objConf['DD_DESCRIPTION']?>" />
    <meta property="og:image" content="<?php echo ROOT_URL?>/assets/img/about_img.jpg?<?php echo rand()?>"/>
    <link rel="shortcut icon" href="/favicon.ico?<?php echo rand()?>" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/master.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/color.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/styles.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/theme.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/responsive.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/css/Corporate-Footer-Clean.css?<?php echo rand()?>" />
    <link rel="stylesheet" href="<?php echo ROOT_URL ?>/assets/plugins/headers/header.css?<?php echo rand()?>" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo ROOT_URL?>/assets/plugins/slick/slick-theme.css?<?php echo rand()?>" />
    <!--[if lt IE 9 ]>
<script src="<?php echo ROOT_URL ?>/assets/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script><meta content="no" http-equiv="imagetoolbar">
<![endif]-->
    <style>
    .banner {
        width: auto;
        margin: 0px auto;
        margin-top: 150px;
    }

    @media (max-width: 700px) {
        .banner {
            margin-top: 100px
        }
    }
    </style>

</head>

<body>

    <?php
require_once ('includes/header.php')
 ?>
    <!-- banner -->
    <div class="banner">
        <?php
        $varsl['LIMIT']=3;
        $varsl['STATUS'] = 1 ;
        $varsl['POS'] = 'SLIDER';
        $list=getRecord('tbl_banners', $varsl);
        // echo $list['SQL'];
        foreach($list['RESULT'] as $list){
        ?>
        <div>
            <img class="d-block w-100" src="<?php echo ROOT_URL.'/images/banner/'.$list['FILENAME'].'?var='.rand()?>">
        </div>
        <?php
        }
        ?>

    </div>
    </div>
    <!-- end banner -->


    <div class="section-default Service">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 col-sm-3">
                    <a href="<?php echo ROOT_URL?>/test-drive.php">
                        <section class="b-advantages-3">
                            <i class="b-advantages-3__icon flaticon-car-driver"></i>
                            <h3 class="b-advantages-3__title">Test Drive</h3>
                        </section>
                    </a>
                </div>
                <div class="col-xs-3 col-sm-3">
                    <a href="tel:02122808000">
                        <section class="b-advantages-3">
                            <i class="b-advantages-3__icon flaticon-screwdriver-and-wrench"></i>
                            <h3 class="b-advantages-3__title">Booking Servis</h3>
                        </section>
                    </a>
                </div>
                <div class="col-xs-3 col-sm-3">
                    <a href="<?php echo ROOT_URL?>/mobil.php">
                        <section class="b-advantages-3">
                            <i class="b-advantages-3__icon flaticon-car-black-side-view-pointing-left"></i>
                            <h3 class="b-advantages-3__title">Beli Mobil</h3>
                        </section>
                    </a>
                </div>
                <div class="col-xs-3 col-sm-3">
                    <a href="https://www.sfi.co.id/credit_simulation" target="blank">
                        <section class="b-advantages-3">
                            <i class="b-advantages-3__icon flaticon-calculator"></i>
                            <h3 class="b-advantages-3__title">Simulasi Kredit</h3>
                        </section>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="section-filter">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <h2 class="ui-title-block">Produk Unggulan Kami</h2>
                        <div class="ui-subtitle-block">Harga Sewaktu-waktu Dapat Berubah Tanpa Pemberitahuan</div>
                        <!-- <div class="ui-decor"></div> -->
                        </br>
                        </br>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $var ['LIMIT'] = 6;
                // $var['CATEGORY'] = '3';
                $list = getRecord('tbl_product', $var);
                foreach($list['RESULT'] as $list){
                ?>
                <div class="col-6 col-md-4 col-xs-6" id="col-card-produk">
                    <div class="card" id="card-produk">
                        <div class="bg-color-img">
                            <img class="img-fluid card-img-top w-100 d-block" id="foto-produk"
                                src="<?php echo  ROOT_URL.'/images/product/'.$list['IMAGE'].'?var='.rand()?>">
                        </div>
                        <div class="card-body" id="card-body-produk">
                            <a href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">
                                <h4 class="card-title" id="card-title-produk"><?php echo $list['PRODUCT'] ?></h4>
                            </a>
                            <!-- <span class="d-flex d-md-none d-lg-none d-xl-none justify-content-center"
                                id="span-produk-mobile">Harga Mulai Dari</span> -->
                            <div class="list-group list-group-horizontal text-center" id="list-card">
                                <a class="list-group-item list-group-item-action d-xl-flex justify-content-xl-center"
                                    id="list-group-harga">
                                    <span class="harga">Rp. <?php echo $list['PRICE'] ?></span></a>
                                <a class="list-group-item list-group-item-action d-none d-xl-flex justify-content-xl-center"
                                    id="list-group-brosur"
                                    href="<?php echo ROOT_URL.'/images/product/'.$list['BROCHURE'].'?v='.rand()?>">
                                    <span class="download-brosur">Download Brosur</span>
                                    <img class="flaticon"
                                        src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB4Ij48cGF0aCBkPSJtNDA5Ljc4NTE1NiAyNzguNS0xNTMuNzg1MTU2IDE1My43ODUxNTYtMTUzLjc4NTE1Ni0xNTMuNzg1MTU2IDI4LjI4NTE1Ni0yOC4yODUxNTYgMTA1LjUgMTA1LjV2LTM1NS43MTQ4NDRoNDB2MzU1LjcxNDg0NGwxMDUuNS0xMDUuNXptMTAyLjIxNDg0NCAxOTMuNWgtNTEydjQwaDUxMnptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PC9zdmc+Cg==" />

                                </a>
                            </div>
                            <!--div class="buy-explore-btn">
                                <a class="btn btn-dark" id="btn-beli" href="#">Beli</a><a class="btn btn-primary"
                                    id="btn-explore"
                                    href="<?php echo ROOT_URL.'/mobil-detail.php?id='.$list['ID']?>">Explore</a>
                            </div-->
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
                        <div class="ui-subtitle-block">PT Sejahtera Buana Trada adalah Dealer Terbesar kendaraan roda
                            4 (mobil).</div>
                        <!-- <div class="ui-decor"></div> -->
                        <div class="b-about-main">
                            <div class="b-about-main__title">Dealer Suzuki Terbesar di Indonesia</div>
                            <div class="b-about-main__subtitle">Dapatkan Pelayanan Terbaik Dari Kami !</div>
                            <p>PT Sejahtera Buana Trada berdiri berdasarkan Akta Pendirian No. 21 tanggal 17 Januari
                                2014 yang dibuat oleh Notaris Popie Savitri Martosuhardjo Pharmanto, SH. PT Sejahtera
                                Buana Trada memiliki jaringan dealer di seluruh Indonesia.</p>
                            <div class="b-about-main__btns">
                                <!-- <a class="btn btn-dark" href="home.html">Our partners</a> -->
                                <a class="btn btn-primary"
                                    href="<?php echo ROOT_URL?>/tentang-trada.php">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-type-2__img">
                        <img class="img-responsive"
                            src="<?php echo ROOT_URL?>/assets/img/about_img.jpg?<?php echo rand()?>" alt="foto">
                    </div>
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
                    <h2 class="b-info__title">Apakah Anda Ingin<strong class="b-info__title_lg">Beli Mobil?</strong>
                    </h2>
                    <div class="b-info__desc">Berkendara bukan hanya sebuah perjalanan, namun cerita dan kebanggaan.
                        Temukan berbagai mobil pilihan Suzuki yang dirancang khusus dengan presisi melalui teknologi
                        modern dan desain stylish sesuai gaya Anda.
                    </div>
                    <a class="btn btn-white" href="<?php echo ROOT_URL?>/mobil.php">Cari Mobil</a>
                </div>
            </section>
        </div>
        <div class="info-group__section col-md-6">
            <section class="b-info b-info_mod-b area-bg area-bg_op_80 area-bg_dark-2 parallax"
                style="background-image: url(<?php echo ROOT_URL ?>/assets/media/content/bg/bg-3.jpg)">
                <div class="area-bg__inner">
                    <h2 class="b-info__title">Apakah Anda Ingin<strong class="b-info__title_lg">Service Mobil?</strong>
                    </h2>
                    <div class="b-info__desc">Untuk ketenangan Anda, rawatlah kendaraan Suzuki Anda secara berkala dan
                        hati-hati, sebagai contoh dengan melaksanakan penggantian oli mesin dan brake-pad pada waktu
                        yang telah ditentukan.
                    </div>
                    <a class="btn btn-white" href="<?php echo ROOT_URL?>/service.php">Ayo Service</a>
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
                        <h2 class="ui-title-block">Berita Terbaru</h2>
                        <div class="ui-subtitle-block"></div>
                        <!-- <div class="ui-decor"></div> -->
                    </div>

                    <div class="carousel-news owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel"
                        data-min768="2" data-min992="3" data-min1200="3" data-margin="30" data-pagination="false"
                        data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                        <?php
                        $varBS['LIMIT']=6;
                        $list = getRecord('tbl_content', $varBS);
                        foreach($list['RESULT'] as $list){
                        ?>
                        <section class="b-post b-post-1 clearfix">
                            <div class="entry-media">
                                <img class="img-responsive"
                                    src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>"
                                    alt="Foto" />
                            </div>
                            <div class="entry-main">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <!-- <div class="entry-meta__face">
                                            <img class="img-responsive" src="<?php echo ROOT_URL.'/images/content/'.$list['IMAGE'].'?var='.rand()?>" alt="face" />
                                        </div> -->
                                        <!-- <span class="entry-meta__item">Post by<a class="entry-meta__link"
                                                href="blog-main.html"> Thomas Neil</a></span><a
                                            class="entry-meta__categorie" href="blog-main.html"><strong>Ford
                                                News</strong></a> -->
                                    </div>
                                    <h2 class="entry-title"><a
                                            href="<?php echo ROOT_URL.'/berita-detail.php?id='.$list['ID']?>"><?php echo $list['TITLE']?>
                                        </a>
                                    </h2>
                                </div>
                                <div class="entry-content">
                                    <p><?php echo substr($list['CONTENT'],0,80).' ...';?></p>
                                </div>
                                <!-- <div class="entry-footer">
                                    <div class="entry-footer__inner">
                                        <div class="b-post-social">SHARE
                                            <ul class="b-post-social__list list-inline">
                                                <li>
                                                    <a href="twitter.com"><i class="icon fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="facebook.com"><i class="icon fa fa-facebook"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="entry-meta">
                                            <span class="entry-meta__item"><i
                                                    class="entry-meta__icon fa fa-heart"></i>300</span>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </section>
                        <?php } ?>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo ROOT_URL?>/assets/plugins/slick/slick.min.js"></script>
    <!-- Slick -->
    <script>
    $(document).ready(function() {
        $('.banner').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            autoplaySpeed: 5000,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    });
    </script>
</body>

</html>