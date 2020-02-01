<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
?>


<!-- Start: Footer -->
<footer class="page-footer">
    <div class="container">
        <div class="row">
            <?php 
        // $varjns['TIPE']='product';
        // $varjns['LIMIT']=4;
        // $varjns['STATUS']=1;
        // $listjns = getRecord('tbl_category', $varjns);
        // foreach($listjns['RESULT'] as $listjns){
        ?>
            <div class="col-6 col-md-3">
                <!-- <h5><?php echo $listjns['CATEGORY']?></h5> -->
                <!-- <ul class="footer-links"> -->
                    <?php
                    // $varproduk['CATEGORY']=$listjns['ID'];
                    // $listproduct=getRecord('tbl_product', $varproduk);
                    // foreach($listproduct['RESULT'] as $listproduct){     
                    //     $urlproduct=ROOT_URL."/mobil-detail.php?id=".$listproduct['ID'];               
                    ?>
                    <!-- <li><a href="<?php echo $urlproduct ?>"><?php echo $listproduct['PRODUCT']?></a></li> -->
                    <?php 
                    // }
                     ?>
                <!-- </ul> -->
            </div>
            <?php 
            // }
            ?>
        </div>
        <div class="row">
            <div class="col-6 col-md-3">
                <h5>Suzuki Trada Corporate</h5>
                <ul class="footer-links">
                    <li><a href="#">Tentang Suzuki Trada</a></li>
                    <!-- <li><a href="#">Sejarah</a></li> -->
                    <li><a href="#">Penghargaan</a></li>
                    <li><a href="#">CSR</a></li>
                    <li><a href="#">Berita Perusahaan</a></li>
                    <!-- <li><a href="#">Servis</a></li>
                    <li><a href="#">Suku Cadang</a></li> -->
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <h5>Produk & Layanan</h5>
                <ul class="footer-links">
                    <li><a href="<?php echo ROOT_URL?>/#">Passenger</a></li>
                    <li><a href="<?php echo ROOT_URL?>/#">Commercial</a></li>
                    <li><a href="#">Daftar Harga</a></li>
                    <li><a href="#">Temukan Dealer</a></li>
                    <li><a href="#">Servis</a></li>
                    <!-- <li><a href="#">Suku Cadang</a></li> -->
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <h5>Lainnya</h5>
                <ul class="footer-links">
                    <li><a href="#">Kontak Kami</a></li>
                    <li><a href="#">Suzuki Finance Indonesia</a></li>
                    <li><a href="autovalue.co.id">Suzuki Autovalue</a></li>
                    <li><a href="#">Suzuki Insurance</a></li>
                </ul>
                <!-- <h5>Nulla cursus finibus</h5>
                <ul class="footer-links">
                    <li><a href="#">Curabitur elementum odio</a></li>
                    <li><a href="#">Proin condimentum ac</a></li>
                </ul> -->
            </div>
            <div class="col-6 col-md-3">
                <h5>Hubungi Kami</h5>
                <ul class="footer-links">
                    <li><a href="#">Hallo Trada</a></li>
                    <li><a href="tel:021-2280 8000">021-2280 8000</a></li>
                    <!-- <li><p>24 Jam Siaga Melayani Anda</p></li> -->
                    <li><a href="mailto: info@suzuki-mobil.co.id">info@suzuki-mobil.co.id</a></li>
                    <img class="img-fluid" id="logo-suzuki-trada"
                        src="<?php echo ROOT_URL?>/assets/img/logo-suzuki-trada-1.png" />

                </ul>
                <!-- <h5>Ut eget feugiat ante</h5>
                <ul class="footer-links">
                    <li><a href="#">Etiam ornare vestibulum</a></li>
                    <li><a href="#">Donec tincidunt tempus</a></li>
                </ul> -->
            </div>
        </div>
        <p>PT Sejahtera Buana Trada (SBT) adalah Main Dealer kendaraan roda 4 (mobil) Suzuki di Indonesia yang
            beroperasi langsung di bawah naungan PT Suzuki Indomobil sales (SIS) selaku ATPM (Agen Tunggal Pemegang
            Merk) Suzuki di indonesia. PT Sejahtera Buana Trada berdiri berdasarkan Akta Pendirian No. 21 tanggal 17
            Januari 2014 yang dibuat oleh Notaris Popie Savitri Martosuhardjo Pharmanto, SH. PT Sejahtera Buana Trada
            memiliki Jaringan di seluruh Indonesia.</p>
        <hr>
        <div class="footer-legal">
            <div class="float-md-right region">
                <a href="https://www.instagram.com/suzukitrada/"><i class="fab fa-instagram"
                        id="socialmedia-icon"></i></a>
                <a href="https://www.facebook.com/suzukitradaofficial/?ref=br_tf&epa=SEARCH_BOX"><i
                        class="fab fa-facebook-square" id="socialmedia-icon"></i></a>
                <a href="#"><i class="fab fa-twitter" id="socialmedia-icon"></i></a>
                <a href="#"><i class="fab fa-youtube" id="socialmedia-icon"></i></a></div>
            <div class="d-inline-block copyright">
                <p class="d-inline-block">© 2018 Suzuki Trada. All rights reserved.<br></p>
            </div>
            <div class="d-inline-block legal-links">
                <div class="d-inline-block item">
                    <h5>Privacy Policy</h5>
                </div>
                <div class="d-inline-block item">
                    <h5>Terms of Use</h5>
                </div>
                <div class="d-inline-block item">
                    <h5>Legal</h5>
                </div>
                <div class="d-inline-block item">
                    <h5>License</h5>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End: Footer -->