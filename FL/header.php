<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/20dd01c86d.js" crossorigin="anonymous"></script> 
    <?php wp_head(); ?>
</head>
<body <?php if( is_home() || is_front_page() ) : ?>class="home"<?php endif; ?> <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!--============================== Header Start ==============================-->
<header id="header">
    <nav class="navbar">
        <div class="container">
            <div class="nav-inside d-flex align-items-center justify-content-between">
                <a class="navbar-brand" href="<?php echo home_url('/');?>">
                    <img src="<?php echo get_template_directory_uri();?>/include/images/logo.png" alt="<?php echo bloginfo('name');?>" />
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">
                    <div class="navbar-inside ml-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            <li class="nav-item active"><a class="nav-link" href="#">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Our Fees</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Cookies Policy</a></li>
                        </ul>
                        
                        <div class="header-right d-blck d-md-none"> 
                            <a href="tel:01204866597"><i class="fa fa-mobile-alt"></i>01204 866 597</a>
                            <a href="mailto:info@fairmontlegal.co.uk"><i class="fa fa-envelope"></i>info@fairmontlegal.co.uk</a>
                        </div>
                    </div>
                </div>
                <div class="header-right d-none d-md-block"> 
                    <a href="tel:01204866597"><i class="fa fa-mobile-alt"></i>01204 866 597</a>
                    <a href="mailto:info@fairmontlegal.co.uk"><i class="fa fa-envelope"></i>info@fairmontlegal.co.uk</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--============================== Header End ==============================-->
<!--============================== Main Start ==============================-->
<main id="main">
