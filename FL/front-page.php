<?php
/**
 * Homepage
*/
get_header(); ?>

    <!--============================== Hero Container Start ============================-->
    <div class="hero-outer">
        <?php if( have_rows('hero_slider') ): ?>
            <div class="hero-container hero-slider">
                <?php while( have_rows('hero_slider') ): the_row(); 
                    $bg_image   = get_sub_field('hero_bg_image');
                    $bg_mobile  = get_sub_field('hero_bg_image_mob');
                    $heading    = get_sub_field('heading');
                    $btn_text   = get_sub_field('button_text');
                    $btn_link   = get_sub_field('button_link');
                ?>
                    <div>
                        <div class="hero-slide d-flex align-items-center" <?php if(!empty($bg_image)): ?>style="background-image: url(<?php echo $bg_image; ?> );" <?php endif; ?>>
                            <div class="hero-slide-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <div class="hero-box">
                                                <?php if($heading):?> <h3><?php echo $heading; ?></h3><?php endif; ?>
                                                <?php if($btn_text) :?>
                                                    <a href="<?php echo $btn_link; ?>" class="btn btn-default"><?php echo $btn_text; ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div id="usp-banner" class="usp-banner">
            <?php if(get_field('heading')): ?>
            <div class="usp-banner-text d-none d-md-block"><?php the_field('heading'); ?></div>
            <?php endif; ?>
            <?php if(get_field('heading_mobile')): ?>
            <div class="usp-banner-text d-block d-md-none"><?php the_field('heading_mobile'); ?></div>
            <?php endif; ?>
        </div>
       
        <div class="hero-fl-icon d-none d-lg-block os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <img src="<?php echo get_template_directory_uri(); ?>/include/images/fl-icon.png" alt="" />
        </div>
        
    </div>
    <!--============================== Hero Container End ==============================-->
    <?php $the_content = apply_filters('the_content', get_the_content());
    $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
    if (!empty($the_content)) { ?>
        <!--============================== Intro Container Start ==============================-->
        <div class="content-container intro-container background-bg" style="background-image: url(<?php echo $url;?>);">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <div class="col-md-10 offset-md-1">
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--============================== Intro Container End ==============================-->
    <?php } ?>
    <!--============================== Content Start ==============================-->
    <?php if ( have_posts() ) : ?>
        <div class="content-container home-services-container">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <div class="col-md-12">
                        <?php 
                            $args = array( 'post_type' => 'services', 'posts_per_page' => -1);
                            $wp_query = new WP_Query( $args ); 
                        ?>
                        <ul class="home-services-list d-flex flex-wrap">
                            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                                <li class="home-service-item">
                                    <a href="<?php the_permalink(); ?>" class="home-service-box d-flex flex-wrap align-items-center">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="home-service-icon">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="home-service-text"><?php the_title(); ?></div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--============================== Content End ==============================-->

    <!--============================== Content Start ==============================-->
    <?php if( have_rows('testimonial') ): ?>
        <div class="content-container testimonial-container py-0">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <div class="col-md-10 offset-md-1">
                        <div class="testimonial-box simple-slider pb-0">
                            <?php while (have_rows('testimonial')): the_row();  
                                $review = get_sub_field('text');
                                $review_by = get_sub_field('by');
                            ?>
                                <div class="tb-item">
                                    <blockquote>
                                       <?php echo $review; ?>
                                    </blockquote>
                                    <small class="quote-by"><?php echo $review_by; ?></small>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--============================== Content End ==============================-->

    <!--============================== Cta Start ==============================-->
  
    <?php get_template_part( 'template-parts/cta', 'green' ); ?>
    
    <!--============================== Cta End ==============================-->
   

<?php get_footer(); ?>
