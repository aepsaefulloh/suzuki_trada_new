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
    <title>Booking Test Drive</title>
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
                        <h1 class="b-title-page bg-primary_a">Test Drive</h1>
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
                        <li><a href="<?php echo ROOT_URL?>"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li class="active"><a href="<?php echo ROOT_URL?>/test-drive.php">Test Drive</li></a>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="test-drive">
        <div class="container">
            <div class="row">
                <?php 
                        $var['ACT'] = isset($_REQUEST['ACT'])?$_REQUEST['ACT']:'';
                        $savestatus = 0;
                        if($var['ACT'] == 'ADD'){
                            $var['FULLNAME'] = isset($_REQUEST['FULLNAME'])?$_REQUEST['FULLNAME']:'';
                            $var['EMAIL'] = isset($_REQUEST['EMAIL'])?$_REQUEST['EMAIL']:'';    
                            $var['TELP'] = isset($_REQUEST['TELP'])?$_REQUEST['TELP']:'';
                            $var['KAB'] = isset($_REQUEST['KAB'])?$_REQUEST['KAB']:'';
                            $var['ADDRESS'] = isset($_REQUEST['ADDRESS'])?$_REQUEST['ADDRESS']:'';
                            $var['TD_DATE'] = isset($_REQUEST['TD_DATE'])?$_REQUEST['TD_DATE']:'';
                            $var['CARTYPE'] = isset($_REQUEST['CARTYPE'])?$_REQUEST['CARTYPE']:'';
                            $result = saveRecord('tbl_testdrive', $var);
                            //echo $result['SQL'];
                            $savestatus = 1;
                        }
                    ?>
                <?php
if($savestatus == 0){
?>
                <div class="col-xs-12">
                    <form class="test-drive-form" action="<? echo ROOT_URL."/test-drive.php"?>"
                        method="post">
                        <input type='hidden' name='ACT' value='ADD'>

                        <div class="row">
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="FULLNAME" placeholder="Nama Lengkap"
                                    required="required" />
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="tel" name="TELP" placeholder="Telepon"
                                    required="required" />
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Email"
                                    required="required" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <select class="form-control" data-width="100%" name="KAB">
                                    <option>Kota</option>
                                    <?php 
                                        $var_kab['STATUS']=1;
                                        $var_kab['LIMIT']=200;
                                        $list_kab = getRecord('tbl_kab', $var_kab);
                                        foreach($list_kab['RESULT'] as $list_kab){
                                        echo ['SQL'];
                                    ?>
                                    <option value="<?php echo $list_kab['ID'] ?>"><?php echo $list_kab['KAB'] ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="selectpicker" data-width="100%" name="CARTYPE">
                                    <option>Tipe Mobil</option>
                                    <?php 
                                                foreach($list_mobil as $k => $v){
                                            ?>
                                    <option value="<?php echo $v ?>"><?php echo $v ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="date" name='TD_DATE' required="required">
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-5">
                                <button class="btn btn-white">Booking Test Drive</button>
                            </div>
                        </div>
                    </form>
                    <?php
                            }else{?>
                            <p style='font-weight:bold'>Terima kasih, kami akan segera menghubungi anda kembali<p>
							<?php

                            }
                        ?>
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
    <!--script src="<?php echo ROOT_URL ?>/assets/plugins/contact_me.js"></script-->
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
</body>

</html>