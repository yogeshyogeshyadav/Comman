<?php
/**
 * Template Name: Services
 */

get_header(); ?>

    <?php get_template_part('template-parts/inner', 'banner'); ?>
    <!--============================== Intro Container Start ==============================-->
    <div class="content-container intro-container mob-text-left">
        <div class="container">
            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="col-md-10 offset-md-1">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--============================== Intro Container End ==============================-->
    <!--============================== Content Start ==============================-->
    <?php $args = array('post_type' => 'services', 'orderby' => 'title', 'order' => 'ASC', );
    	$query = new WP_Query($args);
    if($query){ ?>
	    <div class="content-container py-0 overflow-hidden">
	        <div class="container">
	            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	                <div class="col-md-12">
	                    <ul class="services-list mobile-slider blue-dots d-flex flex-wrap">
	                    	<?php while($query->have_posts()):$query->the_post(); ?>
		                        <li class="service-item">
		                            <a href="<?php the_permalink(); ?>" class="service-box btn-parent">
		                                <div class="service-header">
		                                    <?php if(has_post_thumbnail()) : ?>
	                                            <div class="service-icon">
	                                                <?php the_post_thumbnail(); ?>
	                                            </div>
	                                        <?php endif; ?>
		                                    <div class="service-text">
		                                       <?php the_title(); ?>
		                                    </div>
		                                </div>
		                                <div class="service-content">
		                                   <?php the_excerpt(); ?>
		                                </div>
		                                <div class="learnmore-btn">
		                                    <span class="btn btn-outline">LEARN MORE</span>
		                                </div>
		                            </a>
		                        </li>
	                        <?php endwhile; ?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	<?php } ?>
    <!--============================== Content End ==============================-->

    <!--============================== Cta Start ==============================-->
    <?php get_template_part('template-parts/cta', 'gray'); ?>
    <!--============================== Cta End ==============================-->
   



<?php get_footer(); ?>