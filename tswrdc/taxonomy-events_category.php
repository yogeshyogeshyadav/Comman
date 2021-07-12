<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
get_header();

$term = get_queried_object();
$slug =  $term->slug;
$args = array(
    'post_type' => 'events',
    'posts_per_page' => -1,
    'orderby'   => 'title',
    'order' => 'ASC',
    'tax_query' => array(
    array(
    'taxonomy' => 'events_category',
    'field' => 'slug',
    'terms' => $slug
    ))
);
$query = new WP_Query($args); 
?>
<!--============================== Content Start ==============================-->
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12">
                <div class="cb-box d-lg-flex flex-wrap px-0">
                    <?php get_sidebar('event');?>
                     <div class="cb-right pr-0 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                        <ul class="post-list d-flex flex-wrap">
                            <?php
                            while($query->have_posts()): $query->the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            $event_end_date = get_field('end_date');
                            $current_date = date('m/d/Y');
                            ?>
                            <li class="post-item ">
                                <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                                   <div class="post-desc">
                                       <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc d-flex align-items-center">
                                           <span><?php echo get_field('start_date'); ?></span>
                                           <a href="javascript:void(0)" class="gradient-btn" style="background-image: url('<?php echo get_template_directory_uri();?>/include/images/gradient-btn-left.png');">
                                            <?php if($event_end_date > $current_date){
                                                echo '<span class="gradient-text2">Upcoming event</span>';
                                            }else{
                                                echo '<span class="gradient-text2">Past event</span>';
                                            }?>
                                            </a>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="btn-hover color-2">Learn more</a>
                                   </div> 
                                </div>
                            </li>
                            <?php 
                            wp_reset_postdata();
                            endwhile; 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>