<?php 
$cta_bg_image = wp_get_attachment_image_url(get_field('cta_bg_image','option'),'full');
$cta_heading = get_field('cta_heading','option');
$cta_button_text = get_field('cta_button_text','option');
$cta_button_link = get_field('cta_button_link','option');
$black_logo = get_field('black_logo','option');
$short_text = get_field('short_text','option');
$copyrights = get_field('copyrights','option');
?>
<!--============================== Content Section Start ==============================-->
<div class="cta-container" style="background-image: url(<?php echo $cta_bg_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(!empty($cta_heading)): echo '<h3>'.$cta_heading.'</h3>'; endif; 
                if(!empty($cta_button_text)): echo '<a href="'.$cta_button_link.'" class="btn btn-default">'.$cta_button_text.'</a>'; endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->
<!--============================== Footer Start ==============================-->
<footer>
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mar-30">
                    <?php 
                    echo '<a class="footer-logo" href="'.home_url('/').'"><img src="'.$black_logo.'" alt="'.get_bloginfo('name').'" /></a>';
                    if(!empty($short_text)): echo '<p>'.$short_text.'</p>'; endif;
                    if(have_rows('social_links','option')):
                    ?>
                    <ul class="social-links">
                        <?php
                        while(have_rows('social_links','option')): the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>';
                        endwhile; 
                        ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4 mar-30">
                            <h5>Sitemap</h5>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'sitemap',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'footer-nav',
                                'menu_id'           => 'footer-nav',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                        <div class="col-md-4 mar-30">
                            <h5>Services</h5>
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'services',
                                'depth'             => 1,
                                'container'         => false,
                                'menu_class'        => 'footer-nav',
                                'menu_id'           => 'footer-nav',
                                'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            ));
                            ?>
                        </div>
                        <div class="col-md-4">
                            <h5>Subscribe</h5>
                            <div class="newsletter-form">
                                <?php echo do_shortcode('[email-subscribers-form id="1"]');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(!empty($copyrights)):?>
    <div class="footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><?php echo $copyrights; ?> </p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</footer>
<!--============================== Footer End ==============================-->
<?php wp_footer(); ?>
</body>
</html>