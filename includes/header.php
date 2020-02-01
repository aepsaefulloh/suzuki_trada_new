<?php
require_once 'config.php';
require_once ROOT_PATH.'/lib/dao_utility.php';
require_once ROOT_PATH.'/lib/mysqlDao.php';
?>

<!-- Loader-->
<div id="page-preloader">
    <span class="spinner border-t_second_b border-t_prim_a">
    </span>
</div>
<!-- Loader end-->
<!-- ==========================-->
<!-- MOBILE MENU-->
<!-- ==========================-->
<div data-off-canvas="mobile-slidebar left overlay">
    <a class="navbar-brand scroll" href="<?php echo ROOT_URL ?>">
        <img class="normal-logo img-resonsive visible-xs visible-sm" src="assets\img\logo.png" alt="logo" />
        <img class="scroll-logo img-resonsive hidden-xs hidden-sm" src="assets\img\logo.png" alt="logo" />
    </a>
    <ul class="nav navbar-nav">
        <li>
            <h4><a href="">Mobile sidebar</a></h4>
        </li>
        <li><a href="<?php echo ROOT_URL?>">Home</a>
        </li>
        <li><a href="<?php echo ROOT_URL?>/promo.php">Promo</a>
        </li>
        <!-- <li><a href="car-rental.html">Car Rental</a>
                                </li> -->
        <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Korporate<b
                    class="caret"></b></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo ROOT_URL?>/tentang-trada.php" tabindex="-1">Tentang Trada</a>
                </li>
                <li><a href="<?php echo ROOT_URL?>/visi-misi.php" tabindex="-1">Visi Misi</a>
                </li>
                <li><a href="<?php echo ROOT_URL?>/penghargaan.php" tabindex="-1">Penghargaan</a>
                </li>
                <li><a href="<?php echo ROOT_URL?>/csr.php" tabindex="-1">CSR</a>
                </li>
                <li><a href="<?php echo ROOT_URL?>/berita-perusahaan.php" tabindex="-1">Berita Perusahaan</a>
                </li>
            </ul>
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
        </li>
    </ul>
</div>
<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
    <!-- Start Switcher-->
    <!-- <div class="switcher-wrapper">
            <div class="demo_changer">
                <div class="demo-icon text-primary"><i class="fa fa-cog fa-spin fa-2x"></i>
                </div>
                <div class="form_holder">
                    <div class="predefined_styles">
                        <div class="skin-theme-switcher">
                            <h4>Color</h4>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color1" style="background-color:#d01818"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color2" style="background-color:#FFAC3A"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color3" style="background-color:#28af0f"></a>
                            <a class="styleswitch" href="javascript:void(0);" data-switchcolor="color4" style="background-color:#e425e9"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- end switcher-->
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
    <div data-off-canvas="slidebar-1 left overlay">
        <ul class="nav navbar-nav">
            <li><a class="scrollTo" href="#features-section">features</a>
            </li>
            <li><a class="scrollTo" href="#services-section">Services</a>
            </li>
            <li><a class="scrollTo" href="#works-section">Works</a>
            </li>
            <li><a class="scrollTo" href="#about-section">About</a>
            </li>
            <li><a class="scrollTo" href="#team-section">Team</a>
            </li>
            <li><a href="#">News</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="blog.html">Blog 1</a>
                            </li>
                            <li><a href="blog-2.html">Blog 2</a>
                            </li>
                            <li><a href="blog-single.html">Blog single</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="#">Portfolio</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="portfolio.html">Portfolio</a>
                            </li>
                            <li><a href="portfolio-single.html">Portfolio single</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="#">Contact</a>
                <div class="wrap-inside-nav">
                    <div class="inside-col">
                        <ul class="inside-nav">
                            <li><a href="contact.html">Contact 1</a>
                            </li>
                            <li><a href="contact-2.html">Contact 2</a>
                            </li>
                            <li><a href="contact-3.html">Contact 3</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <header
        class="header header-boxed-width navbar-fixed-top header-background-white header-color-black header-topbar-dark header-logo-black header-topbarbox-1-left header-topbarbox-2-right header-navibox-1-left header-navibox-2-right header-navibox-3-right header-navibox-4-right">
        <div class="container container-boxed-width">
            <div class="top-bar">
                <div class="container">
                    <div class="header-topbarbox-1">
                        <ul>
                            <li><i class="icon fa fa-clock-o"></i> Mon - Fri : 0900am to 0600pm</li>
                            <li><i class="icon fa fa-phone"></i><a href="tel:+0427983549">+ 042 798 3549</a>
                            </li>
                            <li><i class="icon fa fa-envelope-o"></i><a
                                    href="mailto:support@motorland.com">suzukitrada@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="header-topbarbox-2">
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
                            <img class="normal-logo img-responsive" src="assets\img\logo.png" alt="logo" />
                            <img class="scroll-logo hidden-xs img-responsive" src="assets\img\logo.png" alt="logo" />
                        </a>
                    </div>
                    <!-- <div class="header-navibox-3">
                            <ul class="nav navbar-nav hidden-xs clearfix vcenter">
                                <li>
                                    <div class="header-cart"><a href="#"><i class="icon fa fa-shopping-basket" aria-hidden="true"></i><span class="header-cart-count bg-primary">3</span></a>
                                    </div>
                                </li>
                                <li><a class="btn_header_search" href="#"><i class="icon fa fa-search"></i></a>
                                </li>
                            </ul><a class="btn btn-primary" href="home.html">sell car</a>
                        </div> -->
                    <div class="header-navibox-2">
                        <ul class="yamm main-menu nav navbar-nav">
                            <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Home<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="home.html" tabindex="-1">Home one page</a>
                                        </li>
                                        <li><a href="home-2.html" tabindex="-1">Home standart</a>
                                        </li>
                                    </ul>
                                </li> -->
                            <li><a href="<?php echo ROOT_URL?>">Home</a>
                            </li>
                            <li><a href="<?php echo ROOT_URL?>/promo.php">Promo</a>
                            </li>
                            <!-- <li><a href="car-rental.html">Car Rental</a>
                                </li> -->
                            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Korporate<b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo ROOT_URL?>/tentang-trada.php" tabindex="-1">Tentang
                                            Trada</a>
                                    </li>
                                    <li><a href="<?php echo ROOT_URL?>/visi-misi.php" tabindex="-1">Visi Misi</a>
                                    </li>
                                    <li><a href="<?php echo ROOT_URL?>/penghargaan.php" tabindex="-1">Penghargaan</a>
                                    </li>
                                    <li><a href="<?php echo ROOT_URL?>/csr.php" tabindex="-1">CSR</a>
                                    </li>
                                    <li><a href="<?php echo ROOT_URL?>/berita-perusahaan.php" tabindex="-1">Berita
                                            Perusahaan</a>
                                    </li>
                                </ul>
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
                            </li>
                            <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Blog<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="blog-main.html" tabindex="-1">Blog main</a>
                                        </li>
                                        <li><a href="blog-post.html" tabindex="-1">Blog post</a>
                                        </li>
                                    </ul>
                                </li> -->
                            <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Pages<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="car-details.html" tabindex="-1">Car details</a>
                                        </li>
                                        <li><a href="typography.html" tabindex="-1">Typography</a>
                                        </li>
                                    </ul>
                                </li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end .header-->