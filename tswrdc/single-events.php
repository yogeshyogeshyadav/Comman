<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

$featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
?>
<!--============================== Content Start ==============================-->
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12"> 
              <div class="cb-box d-lg-flex flex-wrap">
                <?php get_sidebar('event');?>
                <div class="cb-right">
                    <div class="cb-content-box">
                      <div class="cbc-box d-lg-flex flex-wrap">
                        <div class="cbc-img-box">
                          <div class="cbc-bg" style="background-image: url(<?php echo $featured_img; ?>);"></div>
                        </div>
                        <div class="cbc-text-box align-self-end">
                          <h5 class="gradient-text"><?php the_title();?></h5>
                          <p><strong class="gradient-text">Date</strong>- <?php echo get_field('start_date'); ?></p>
                        </div>
                      </div>
                      <h6>Description :</h6>
                      <?php the_content(); ?>
                    </div>
                </div>
              </div>                   
            </div> 
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>