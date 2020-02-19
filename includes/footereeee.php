<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
?>

<footer class="footer area-bg">
    <div class="area-bg__inner">
        <div class="footer__main">
            <div class="container">
                <div class="row">
                    <?php 
                        $varjns['TIPE']='product';
                        $varjns['LIMIT']=5;
                        $varjns['STATUS']=1;
                        $listjns = getRecord('tbl_category', $varjns);
                        foreach($listjns['RESULT'] as $listjns){
                    ?>
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner"><?php echo $listjns['CATEGORY']?></h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                <?php
                                    $varproduk['CATEGORY']=$listjns['ID'];
                                    $varproduk['LIMIT']=5;
                                    $varproduk['STATUS']=1;
                                    $listproduct=getRecord('tbl_product', $varproduk);
                                    foreach($listproduct['RESULT'] as $listproduct){     
                                        $urlproduct=ROOT_URL."/mobil-detail.php?id=".$listproduct['ID'];               
                                    ?>
                                <li class="footer-list__item">
                                    <a class="footer-list__link"
                                        href="<?php echo $urlproduct ?>"><?php echo $listproduct['PRODUCT']?> </a>
                                </li>
                                <?php 
                                    }
                                ?>
                            </ul>
                        </section>
                    </div>
                    <?php 
                    }
                 ?>
                </div>
                <div class="row">
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Suzuki Trada Corporate</h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/tentang-trada.php">Tentang
                                        Trada</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/visi-misi.php">Visi & Misi</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/kontak-kami.php">Hubungi Kami</a>
                                </li>
                                <!--li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>">Call Center</a>
                                </li-->
                            </ul>
                        </section>
                    </div>
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Produk & Layanan</h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/test-drive.php">Test Drive</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/service.php">Booking Service</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/mobil.php">Beli Mobil</a>
                                </li>
								
                                <!--li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>">Call Center</a>
                                </li-->
                            </ul>
                        </section>
                    </div>
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Lainnya</h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo ROOT_URL?>/kontak-kami.php">Kontak
                                        Kami</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="https://www.sfi.co.id/">Suzuki Finance Indonesia</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="https://autovalue.co.id">Suzuki Autovalue</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="https://www.suzuki.co.id/suzuki-insurance">Suzuki Insurance</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Follow Us</h3>
                            <ul class="footer-list footer-list_columns list-unstyled">
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo $objConf['DD_FB']?>">Facebook</a>
                                </li>
                                <li class="footer-list__item">
                                    <a class="footer-list__link" href="<?php echo $objConf['DD_IG']?>">Instagram</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-6 col-md-2 col-xs-6">
                        <section class="footer-section footer-section_list-columns">
                            <h3 class="footer-section__title ui-title-inner">Hubungi Kami</h3>
                            <p>
							 Jalan Raya Bekasi KM.19, Rawa Terate,
Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13920
                            </p>
                        </section>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6">
                        <ul class="social-links">
                            <li><a href="/" target="_blank"><i class="social_icons fa fa-twitter"></i></a>
                            </li>
                            <li><a href="/" target="_blank"><i class="social_icons fa fa-facebook"></i></a>
                            </li>
                            <li><a href="/" target="_blank"><i class="social_icons fa fa-linkedin"></i></a>
                            </li>
                            <li class="li-last"><a href="/" target="_blank"><i
                                        class="social_icons fa fa-instagram"></i></a>
                            </li>
                            <li><a href="/" target="_blank"><i class="social_icons fa fa-youtube-play"></i></a>
                            </li>
                        </ul>
                </div> -->
                </div>
            </div>
        </div>
        <!--div class="copyright">
            <div class="container"  style='color:#fff'>
                <div class="row" >
                    <div class="col-xs-12" style='color:#fff'>Copyrights 2019<a class="copyright__brand" href="<?php echo ROOT_URL?>">
                            Suzuki Trada</a>
                        All Rights Reserved<a class="copyright__link"
                            href="<?php echo ROOT_URL ?>/privacy-policy.php">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div-->
		<span class="btn-up" id="toTop">TOP</span>
    </div>
</footer>
<!-- .footer-->