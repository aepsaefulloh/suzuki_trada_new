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

  
<div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <section class="section-type-1">
                            <h2 class="ui-title-block-2">Read FAQ’s</h2>
                            <div class="ui-subtitle-block">Tempor incididunt duis labore dolore magna aliqua sed ipsum</div>
                            <div class="ui-decor"></div>
                            <div class="panel-group accordion accordion-1" id="accordion-1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a class="btn-collapse" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1"><i class="icon"></i>What is the procedure for auto checkup?</a></h3>
                                    </div>
                                    <div class="panel-collapse collapse in" id="collapse-1">
                                        <div class="panel-body">
                                            <p>Duis aute irure reprehender voluptate velits fugiat nulla pariatur excepteur doloe amet consecteur adipisicing elit labore et dolore magna aliquaut enim minim veniam, quis nostrud exercitation ullamco.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2"><i class="icon"></i>What type of vehicles you repair?</a></h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse-2">
                                        <div class="panel-body">
                                            <p>Norem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud exrcitation ullam co laboris nisi ut aliquip ex ea commodo
                                                consequat magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-3"><i class="icon"></i>Do you offer free checkups or discounts?</a></h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse-3">
                                        <div class="panel-body">
                                            <p>Corem ipsum dolor amet consectetur sed dipisicing elit do eiusmod tempor incidid labore etsed dolore magna aliqua enimad minim incididunt lorem ipsum dolor amet consectetur adipisic ding elit sed eiusmod tempor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-4"><i class="icon"></i>What type of vehicles you repair?</a></h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse-4">
                                        <div class="panel-body">
                                            <p>Corem ipsum dolor amet consectetur sed dipisicing elit do eiusmod tempor incidid labore etsed dolore magna aliqua enimad minim incididunt lorem ipsum dolor amet consectetur adipisic ding elit sed eiusmod tempor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-5"><i class="icon"></i>Do you offer free checkups or discounts?</a></h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="collapse-5">
                                        <div class="panel-body">
                                            <p>Corem ipsum dolor amet consectetur sed dipisicing elit do eiusmod tempor incidid labore etsed dolore magna aliqua enimad minim incididunt lorem ipsum dolor amet consectetur adipisic ding elit sed eiusmod tempor.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end .accordion-->
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="section-type-1">
                            <h2 class="ui-title-block-2">Book Auto Checkup</h2>
                            <div class="ui-subtitle-block">Tempor incididunt duis labore dolore magna aliqua sed ipsum</div>
                            <div class="ui-decor"></div>
                            <div id="success"></div>
                            <form class="b-form-checkup ui-form-3" id="contactForm" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" id="user-name" type="text" name="user-name" placeholder="Your Name" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" id="user-phone" type="tel" name="user-phone" placeholder="Phone" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="form-control" id="user-email" type="email" name="user-email" placeholder="Email" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="datetimepicker" placeholder="Pick Date" required="required" /><i class="form-control-feedback icon fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <select class="selectpicker" data-width="100%">
                                                    <option>Please choose a Service</option>
                                                    <option>Service 1</option>
                                                    <option>Service 2</option>
                                                    <option>Service 3</option>
                                                </select>
                                        </div>
                                        <textarea class="form-control" id="user-message" rows="6" placeholder="Message" required="required"></textarea>
                                        <button class="btn btn-primary">book auto checkup</button>
                                    </div>
                                </div>
                            </form>
                            <!-- end .b-form-checkup-->
                        </section>
                    </div>
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