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


    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Booking Service</h1>
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
                        <li class="active">Booking Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="booking-service">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <form class="booking-service-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="FULLNAME" placeholder="Nama Lengkap"
                                    required="required" />
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="tel" name="TELP" placeholder="Telepon"
                                    required="required" />
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Email"
                                    required="required" />
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="datepicker"
                                    placeholder="Pickup Date &amp; Time" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <select class="selectpicker" data-width="100%" name="MERK">
                                    <option>Merk Mobil</option>
                                    <?php 
                                                foreach($list_mobil as $k => $v){
                                            ?>
                                    <option value="<?php $k ?>"><?php echo $v ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-sitekey="6LeUL9QUAAAAAHTiwLeFe7ciinym06mpxCrwuH4K">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-white">Booking Service</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-6">
                        <img class="img-thumbnail"
                            src="<?php echo ROOT_URL?>/assets/img/suzuki-machine-servis.png?<?php echo rand()?>" alt="foto"
                            >
                </div>
            </div>
        </div>

    </div> -->
    <div class="block-table block-table_xs">
        <div class="block-table__cell col-md-6">
            <div class="block-table__inner">
                <img class="b-services__img" src="<?php echo ROOT_URL?>/assets/img/hero.jpg?<?php echo rand()?>"
                    alt="foto">
            </div>
        </div>
        <div class="block-table__cell col-md-6 bg-grey">
            <div class="block-table__inner">
                <section class="b-services">
                    
                    
                    <!-- <div class="ui-decor"></div> -->
                    <div class="b-services__content">
                        <p>Bila anda tidak ingin antri untuk service mobil suzuki kesayangan anda di bengkel resmi Suzuki Sejahtera Group, silahkan Booking service secara online, mudah dan cepat, sebelum anda mengisi formulir booking service mohon diperhatikan beberapa hal berikut :
Pastikan bengkel terdekat kami ada di wilayah anda, kami memiliki bengkel yang tersebar luas di Jabodetabek.</p>
                    </div>
                    <!-- <a class="btn btn-dark" href="#">Booking Servis</a> -->
                  <!--div class="test-drive-modal">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Booking Test Drive
                            </button>
                        </div-->
						<?php 
                        $var['ACT'] = isset($_REQUEST['ACT'])?$_REQUEST['ACT']:'';
                        $savestatus = 0;
                        if($var['ACT'] == 'ADD'){
                            $var['FULLNAME'] = isset($_REQUEST['FULLNAME'])?$_REQUEST['FULLNAME']:'';
                            $var['EMAIL'] = isset($_REQUEST['EMAIL'])?$_REQUEST['EMAIL']:'';
                            $var['PHONE'] = isset($_REQUEST['PHONE'])?$_REQUEST['PHONE']:'';                            
                            $result = saveRecord('tbl_booking', $var);
                            //echo $result['SQL'];
                            $savestatus = 1;
                        }
						if($savestatus == 0){
                    ?>
						
						<form class="b-form-checkup ui-form-3" action="<? echo ROOT_URL."/booking-service.php" ?>" method="post">
                            <input type='hidden' name='ACT' value='ADD'>
								<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="FULLNAME" placeholder="Nama Lengkap" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="PHONE" placeholder="Telp" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="EMAIL" placeholder="Email" required="required">
                                    </div>
									
                                    <div class="form-group">
                                        <input type='submit' class="btn btn-primary" value='Booking Service'>
                                    </div>
                                </div>
								
                            </div>	
						</form>	
						<?php }else{ ?>
							<b><p>Terima Kasih, kami akan segera menhubungi anda kembali</p></b>
						<?php }	?>
                </section>
                <!-- end .b-services-->
            </div>
        </div>
    </div>
   






    <?php
    require_once ('includes/footer.php')
    ?>



    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


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


    <script>

    </script>




</body>

</html>