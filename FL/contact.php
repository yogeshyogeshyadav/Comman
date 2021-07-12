<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

    <!--==============================Inner Hero container Start ============================-->
    <?php get_template_part('template-parts/inner', 'banner'); ?>
    <!--==============================Inner Hero container End ==============================-->
    <?php $the_content = apply_filters('the_content', get_the_content()); ?>
    <?php if ( !empty($the_content) ) { ?>
	    <!--============================== Intro Container Start ==============================-->
	    <div class="content-container intro-container">
	        <div class="container">
	            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	                <div class="col-lg-10 offset-lg-1">
	                   <?php echo $the_content; ?>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!--============================== Intro Container End ==============================-->
    <?php } ?>
    <!--============================== Contact Start ==============================-->
    <div class="content-container less-pad contact-container yellow-pattern-bg">
        <div class="container">
            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <?php 
						$form_id = get_field('select_form');
						echo do_shortcode('[contact-form-7 id="'.$form_id.'"]');
					?>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Contact End ==============================-->

    <!--============================== Cta Start ==============================-->
    <?php get_template_part( 'template-parts/cta', 'gray' ); ?>
    <!--============================== Cta End ==============================-->


<?php get_footer(); ?>