<!--==============================Inner Hero container Start ============================-->
<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?> 
<div class="inner-hero-container d-flex align-items-center">
    <div class="inner-hero-bg dektop-bg d-none d-md-block" style="background-image: url('<?php echo $url;?>');"></div>
    <div class="inner-hero-bg mobile-bg d-block d-md-none" style="background-image: url('<?php echo $url;?>');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php 
                    $page_title = get_field('page_title');
                    $title = get_the_title();
                    if($page_title){
                        //echo '<h1>'.$title.'</h1>';
                        echo '<div class="inner-hero-text os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h1>'.$page_title.'</h1></div>';
                    }else{
                        //echo '<h1>'.$page_title.'</h1>';
                        echo '<div class="inner-hero-text os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h1>'.$title.'</h1></div>';
                    }
                ?>
                <div class="inner-hero-icon d-none d-md-block os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><img src="<?php echo get_template_directory_uri(); ?>/include/images/fl-banner-icon.png" alt="" /></div>
            </div>
        </div>
    </div>
</div>
<!--==============================Inner Hero container End ==============================-->