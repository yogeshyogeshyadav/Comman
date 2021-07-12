<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
    .navbar-nav .nav-item.menu-item.menu-item-type-custom.menu-item-object-custom a {
        font-size: 13px;
        line-height: 43px;
        font-weight: 700;
        color: #fff;
        padding: 0;
        margin: 0;
        text-transform: uppercase;
    }

    .fixed #header .navbar-expand-xl .navbar-nav .menu-item-object-custom a{
        color: rgba(51, 51, 51, 1);
    }
</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <?php
        $blacklogo = get_field('black_logo','option');
        $whitelogo = get_field('white_logo','option');
        $phone_label = get_field('text','option');
        $phone = get_field('phone','option');
    ?>
    <!--============================== Header Start ==============================-->
        <header id="header">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <div class="nav-inside d-flex align-items-center justify-content-between p-0">
                        <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
                            <?php if(!empty($blacklogo)): ?>
                                <img src="<?php echo $blacklogo; ?>" class="logo-1" alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" />
                            <?php endif; ?>
                            <?php if(!empty($whitelogo)): ?>
                                <img src="<?php echo $whitelogo; ?>" class="logo-2" alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>">
                            <?php endif; ?>
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mainNav">
                            <div class="navbar-inside ml-auto">
                                <?php 
                                    wp_nav_menu( array(
                                        'theme_location' => 'header_menu',
                                        'menu_class' => 'navbar-nav',
                                        'container' => false,
                                        'depth' => 1
                                    ) ); 
                                ?>
                            </div>
                        </div>
                        <div class="header-right d-none d-md-block">
                            <p><?php echo $phone_label; ?></p>
                            <a href="tel:<?php echo $phone; ?>" class="contact-us"><?php echo $phone; ?></a>
                        </div>
                        <div class="header-right d-block d-md-none">
                            <a href="tel:<?php echo $phone; ?>" class="contact-us"><i class="fas fa-phone-alt"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    <!--============================== Header End ==============================-->
    <main id="main">

