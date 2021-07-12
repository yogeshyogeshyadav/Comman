<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" id="google-fonts-css" href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&#038;display=swap" media="all" />
        <link rel="stylesheet" id="bootstrap-css" href="https://www.trufab.co.uk/wp-content/themes/truf/include/css/bootstrap.min.css?ver=4.5.0" media="all" />
        <link rel="stylesheet" id="slick-css" href="https://www.trufab.co.uk/wp-content/themes/truf/include/css/slick.css?ver=1.5.9" media="all" />
        <link rel="stylesheet" id="animate-css" href="https://www.trufab.co.uk/wp-content/themes/truf/include/css/animate.css?ver=3.6.0" media="all" />
        <link rel="stylesheet" id="magnific-popup-css" href="https://www.trufab.co.uk/wp-content/themes/truf/include/css/magnific-popup.css?ver=1.1.0" media="all" />
        <link rel="stylesheet" id="theme-style-css" href="https://www.trufab.co.uk/wp-content/themes/truf/style.css?ver=5.5.3" media="all" />
    </head>
    <body>
        <header>
            <div class="header-upper d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-5">
                            <ul class="social-links">
                                <li>
                                    <a href="https://www.facebook.com/TrufabLtd" aria-label="facebook Link" target="_blank" rel="noopener"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="https://linkedin.com/company/trufabltd" aria-label="linkedin Link" target="_blank" rel="noopener"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/TrufabLtd" aria-label="twitter Link" target="_blank" rel="noopener"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-7">
                            <div class="header-contact text-right">
                                <a href="tel:01706860078"><i class="fa fa-phone fa-flip-horizontal"></i> 01706 860 078</a> <a href="mailto:sales@trufabltd.co.uk"><i class="fa fa-envelope"></i> sales@trufabltd.co.uk</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-lower">
                <!-- Navbar -->
                <nav class="navbar navbar-expand-xl">
                    <div class="container">
                        <a class="navbar-brand d-none d-md-block" href="<?php echo home_url('/');?>"><img src="https://trufab.co.uk/wp-content/uploads/2020/07/logo.png" alt="TruFab" /></a>
                        <a class="navbar-brand d-block d-md-none" href="https://trufab.co.uk/"><img src="https://trufab.co.uk/wp-content/uploads/2020/08/mobile-logo.png" alt="TruFab" /></a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-md-center" id="navbarNavDropdown">
                            <?php
                              	wp_nav_menu( array(
                                  'theme_location'    => 'header_menu',
                                  'depth'             => 3,
                                  'menu_class'        => 'nav navbar-nav',
                                  'menu_id'           =>'main-nav',
                                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                  'walker'            => new WP_Bootstrap_Navwalker(),
                              ) );
                            ?>
                        </div>
                        <div class="header-right d-block d-md-none">
                            <a href="tel:01706860078"><i class="fa fa-phone fa-flip-horizontal"></i></a> <a href="mailto:sales@trufabltd.co.uk"><i class="fa fa-envelope"></i></a>
                        </div>
                        <div class="hero-btn d-none d-md-block"><a href="#" class="btn btn-default">Contact Us</a></div>
                    </div>
                </nav>
            </div>
        </header>
       