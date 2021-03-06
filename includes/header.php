<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
require_once ROOT_PATH.'/lib/json_utility.php';
require_once ROOT_PATH.'/lib/init.php';
?>

<!-- Loader-->
<!-- <div id="page-preloader">
    <span class="spinner border-t_second_b border-t_prim_a">
    </span>
</div> -->
<!-- Loader end-->
<!-- ==========================-->
<!-- MOBILE MENU-->
<!-- ==========================-->
<div data-off-canvas="mobile-slidebar left overlay">
    <a class="navbar-brand scroll" href="<?php echo ROOT_URL ?>">
        <img class="normal-logo img-resonsive visible-xs visible-sm"
            src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_RLOGO']?>" alt="logo" width="120px" />
        <img class="scroll-logo img-resonsive hidden-xs hidden-sm"
            src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_RLOGO']?>" alt="logo" width="120px" />
    </a>
    <ul class="nav navbar-nav">
    <?php 
       $varMenu['ORDER']='ORDNUM ASC';
       $varMenu['LIMIT']=10;
       $varMenu['POS']='top';
       $varMenu['LEVEL']=0;
       $varMenu['STATUS']=1;
       $listMenu = getRecord('tbl_menu', $varMenu);
       $listMenu2 = $listMenu;
       foreach($listMenu['RESULT'] as $listMenu){
        $url=ROOT_URL.'/'.$listMenu['URL'];    
    ?>
    
        <li>
            <h4><a href="<?php echo ROOT_URL?>"></a></h4>
        </li>
        <li><a href="<?php echo $url?>"><?php echo $listMenu['TITLE'] ?></a>
        </li>
       <?php } ?>
        <!-- <li><a href="<?php echo ROOT_URL?>/promo.php">Promo</a>
        </li>
        </li>
        <li><a href="<?php echo ROOT_URL?>/mobil.php">Mobil</a>
        </li>
        <li><a href="<?php echo ROOT_URL?>/jaringan-dealer.php">Jaringan</a>
        </li>
        <li><a href="<?php echo ROOT_URL?>/service.php">Servis</a>
        </li>
        <li><a href="<?php echo ROOT_URL?>/berita.php">Berita</a>
        </li>
        <li><a href="<?php echo ROOT_URL?>/kontak-kami.php">Kontak Kami</a>
        </li> -->
    </ul>
</div>
<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
    <!-- ==========================-->
    <!-- SEARCH MODAL-->
    <!-- ==========================-->
    <div class="header-search open-search">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="navbar-search">
                        <form class="search-global">
                            <input class="search-global__input" type="text" placeholder="Type to search"
                                autocomplete="off" name="s" value="" />
                            <button class="search-global__btn"><i class="icon stroke icon-Search"></i>
                            </button>
                            <div class="search-global__note">Begin typing your search above and press return to search.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button class="search-close close" type="button"><i class="fa fa-times"></i>
        </button>
    </div>
    <header
        class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
        <div class="container container-boxed-width">
            <div class="top-bar">
                <div class="container">
                    <div class="header-topbarbox-1">

                        <a href="<?php echo ROOT_URL?>">
                            <img class="scroll-logo hidden-xs img-responsive"
                                src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_RLOGO']?>" alt="logo" alt="logo"
                                width="150px" />
                        </a>
                    </div>
                    <div class="header-topbarbox-2">
                        <ul>
                            <li>
                                <i class="icon fa fa-phone"></i>
                                <a href="tel:02122808000"><?php echo $objConf['DD_PHONE']?></a>
                            </li>
                            <li>
                                <i class="icon fa fa-envelope-o"></i>
                                <a href="mailto:<?php echo $objConf['DD_EMAIL']?>"><?php echo $objConf['DD_EMAIL']?></a>
                            </li>
                            <li>
                                <!-- <i class="icon fa fa-clock-o"></i><?php echo $objConf['DD_TW']?></li> -->
                            <li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="navbar" id="nav">
                <div class="container">
                    <div class="header-navibox-1">
                        <!-- Mobile Trigger Start-->
                        <button
                            class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button"><i
                                class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                        </button>
                        <!-- Mobile Trigger End-->
                        <a class="navbar-brand scroll" href="<?php echo ROOT_URL?>">
                            <img class="normal-logo img-responsive"
                                src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LLOGO']?>" alt="logo" />
                            <img class="scroll-logo hidden-xs img-responsive"
                                src="<?php echo ROOT_URL.'/images/conf/'.$objConf['DD_LLOGO']?>" alt="logo" />
                        </a>
                    </div>

                    <div class="header-navibox-2">
                 
                        <ul class="yamm main-menu nav navbar-nav">
                        <?php 
                         
                            foreach($listMenu2['RESULT'] as $listMenu2){
                                $url=ROOT_URL.'/'.$listMenu2['URL'];               

                             ?>
                        
                            <li>
                                <a href="<?php echo $url?>"><?php echo $listMenu2['TITLE'] ?></a>
                            </li>
        <?php } ?>
                            <!-- <li>
                                <a href="<?php echo ROOT_URL?>/promo.php">Promo</a>
                            </li>
                            <li>
                                <a href="<?php echo ROOT_URL?>/mobil.php">Mobil</a>
                            </li>
                            <li>
                                <a href="<?php echo ROOT_URL?>/jaringan-dealer.php">Jaringan</a>
                            </li>
                            <li>
                                <a href="<?php echo ROOT_URL?>/service.php">Servis</a>
                            </li>
                            <li>
                                <a href="<?php echo ROOT_URL?>/berita.php">Berita</a>
                            </li>
                            <li>
                                <a href="<?php echo ROOT_URL?>/kontak-kami.php">Kontak Kami</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end .header-->