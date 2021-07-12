<?php
/**
 * Template Name: Privacy Policy
 */

get_header(); ?>

	<!--==============================Breadcrumb container Start ============================-->
	    <div class="breadcrumb-container"> 
	      <div class="container">
	        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
	          <div class="col-md-10 offset-md-1">
	            <ol class="breadcrumb">
	              <li class="breadcrumb-item"><a href="#!">Home</a></li> 
	              <li class="breadcrumb-item active">Privacy Policy</li>
	            </ol>
	          </div>
	        </div>
	      </div> 
	    </div>
	<!--==============================Breadcrumb container End ==============================-->
	<?php $the_content = apply_filters('the_content', get_the_content());
    	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    	if (!empty($the_content)) { ?>
		<!--============================== Content Start ==============================-->
		<div class="content-container mid-pad">
		    <div class="container">
		        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
		            <div class="col-lg-10 offset-lg-1">
		                <?php echo the_content(); ?>
		            </div> 
		        </div>
		    </div>
		</div>
		<!--============================== Content End ==============================-->
	<?php } ?>
	<!--============================== Cta Start ==============================-->
		<?php get_template_part( 'template-parts/cta', 'green' ); ?>
	<!--============================== Cta End ==============================-->





<?php get_footer(); ?>