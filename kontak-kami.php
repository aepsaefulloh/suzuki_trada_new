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
    <title>Kontak Kami</title>
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

    <div class="section-area kontak">
        <div class="container">
            <?php 
                        $var['ACT'] = isset($_REQUEST['ACT'])?$_REQUEST['ACT']:'';
                        $savestatus = 0;
                        if($var['ACT'] == 'ADD'){
                            $var['FULLNAME'] = isset($_REQUEST['FULLNAME'])?$_REQUEST['FULLNAME']:'';
                            $var['EMAIL'] = isset($_REQUEST['EMAIL'])?$_REQUEST['EMAIL']:'';    
                            $var['QABOUT'] = isset($_REQUEST['QABOUT'])?$_REQUEST['QABOUT']:'';
                            $var['TELP'] = isset($_REQUEST['TELP'])?$_REQUEST['TELP']:'';
                            $var['MESSAGE'] = isset($_REQUEST['MESSAGE'])?$_REQUEST['MESSAGE']:'';
                            $result = saveRecord('tbl_contact', $var);
                            //echo $result['SQL'];
                            $savestatus = 1;
                        }
                    ?>

            <div class="row">
                <div class="col-md-6">

                    <section class="section-type-1">
                        <h2 class="ui-title-block-2">Kontak</h2>
                        <div class="ui-subtitle-block">Silahkan hubungi customer service kami seputar produk &
                            pelayanan.</div>
                        <?php
                    if($savestatus == 0){
                    ?>
                        <form class="b-form-checkup ui-form-3" action="<?php echo ROOT_URL."/kontak-kami.php" ?>"
                            method="post">
                            <input type='hidden' name='ACT' value='ADD'>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="FULLNAME"
                                            placeholder="Nama Lengkap" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="number" name="TELP" placeholder="Telepon"
                                            min="10" required="required" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="EMAIL" placeholder="Email"
                                            required="required" />
                                    </div>
                                    <div class="form-group">
                                        <select class="selectpicker" data-width="100%" name="QABOUT">
                                            <?php 
                                                foreach($qAbout as $k => $v){
                                            ?>
                                            <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea class="form-control" rows="6" name="MESSAGE" placeholder="Pesan"
                                        required="required">
                                        </textarea>
                                    <div class="form-group">
                                        <div class="g-recaptcha"
                                            data-sitekey="6LeUL9QUAAAAAHTiwLeFe7ciinym06mpxCrwuH4K">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                        <?php
                            }else{
                            echo '<h2 class="section-type-2__title" style="background:green; color:white;">Terima Kasih, Pesan Anda Segera Kami Proses.</h2>';
                            }
                        ?>
                        <!-- end .b-form-checkup-->
                    </section>

                </div>

                <div class="col-md-6">
                    <section class="section-type-1">
                        <h2 class="ui-title-block-2">Lokasi</h2>
                        <div class="ui-subtitle-block">Kunjungi Dealer Suzuki Trada di sekitar anda.</div>
                        <div class="kontak-map" style="padding-top:30px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.596916385039!2d106.90586031474996!3d-6.184664862319774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4cda5296df3%3A0x8d2bca77037a5b8f!2sSuzuki%20Pulogadung%20Sejahtera%20Buana%20Trada%20%26%20Body%20Repair!5e0!3m2!1sen!2sid!4v1580655230009!5m2!1sen!2sid"
                                width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <!-- end .section-area-->




    <?php
    require_once ('includes/footer.php')
    ?>





    <!-- ++++++++++++-->
    <!-- MAIN SCRIPTS-->
    <!-- ++++++++++++-->
    <!-- google recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- END google recaptcha -->
    <script src="<?php echo ROOT_URL ?>/assets/libs/jquery-1.12.4.min.js?<?php echo rand()?>"></script>
    <script src="<?php echo ROOT_URL ?>/assets/libs/jquery-migrate-1.2.1.js?<?php echo rand()?>"></script>
    <!-- Bootstrap-->
    <script src="<?php echo ROOT_URL ?>/assets/libs/bootstrap/bootstrap.min.js"></script>
    <!-- User customization-->
    <script src="<?php echo ROOT_URL ?>/assets/js/custom.js?<?php echo rand()?>"></script>
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
    <!-- <script src="<?php echo ROOT_URL ?>/assets/plugins/contact_me.js?<?php echo rand()?>"></script> -->
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