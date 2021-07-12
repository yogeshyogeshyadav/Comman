<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Events */
get_header();

/*global $wp;
$url = home_url($wp->request);
$link_array = explode('/',$url);
$lastSegment = end($link_array);*/
$lastSegment = $_GET['status'];
?>
<!--============================== Content Start ==============================-->
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12">
                <div class="cb-box d-lg-flex flex-wrap px-0">
                    <?php get_sidebar('event');
                    if(post_type_exists('events')): 
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    ?>
                    <div class="cb-right pr-0 os-animation animated fadeIn">
                        <?php if($lastSegment =='upcoming-events'):
                        $today = current_time('Y-m-d');
                        $upcoming_args = array (
                            'post_type'  => 'events',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key'       => 'end_date',
                                    'value'     => $today,
                                    'compare'   => '>',
                                    'type'      => 'DATE',
                                ),
                            ),
                            'meta_key' => 'end_date',
                            'orderby'  => 'meta_value',
                            'order'    => 'ASC'
                        );
                        $upcoming_event = new WP_Query($upcoming_args);  
                        ?>
                        <ul class="post-list d-flex flex-wrap">
                            <?php
                            while($upcoming_event->have_posts()): $upcoming_event->the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            ?>
                            <li class="post-item">
                                <div class="post-box" style="background-image: url(<?php echo  $featured_img; ?>);">
                                    <div class="post-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc d-flex align-items-center">
                                            <span><strong><?php echo get_field('start_date'); ?></strong></span>
                                            <a href="javascript:void(0)" class="gradient-btn" style="background-image: url('<?php echo get_template_directory_uri();?>/include/images/gradient-btn-left.png');">
                                            <span class="gradient-text2">Upcoming event</span></a>
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

                        <?php 
                        elseif($lastSegment =='past-events'):
                        $today = current_time('Y-m-d');
                        $upcoming_args = array (
                            'post_type'  => 'events',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key'       => 'end_date',
                                    'value'     => $today,
                                    'compare'   => '<',
                                    'type'      => 'DATE',
                                ),
                            ),
                            'meta_key' => 'end_date',
                            'orderby'  => 'meta_value',
                            'order'    => 'ASC'
                        );
                        $upcoming_event = new WP_Query($upcoming_args);  
                        ?>
                        <ul class="post-list d-flex flex-wrap">
                            <?php
                            while($upcoming_event->have_posts()): $upcoming_event->the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            ?>
                            <li class="post-item">
                                <div class="post-box" style="background-image: url(<?php echo  $featured_img; ?>);">
                                    <div class="post-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc d-flex align-items-center">
                                            <span><strong><?php echo get_field('start_date'); ?></strong></span>
                                            <a href="javascript:void(0)" class="gradient-btn" style="background-image: url('<?php echo get_template_directory_uri();?>/include/images/gradient-btn-left.png');">
                                            <span class="gradient-text2">Past event</span></a>
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
                        <?php
                        else:
                        ?>
                        <ul class="post-list d-flex flex-wrap">
                            <?php
                            $args = array(
                                'post_type' => 'events',
                                'posts_per_page' => -1
                            );
                            $query = new WP_Query($args);  
                            while($query->have_posts()): $query->the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            $event_end_date = get_field('end_date', false, false);
                            $event_end_date = new DateTime($event_end_date);
                            $event_start_date = get_field('start_date');
                            $current_date = new DateTime();

                            ?>
                            <li class="post-item">
                                <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                                    <div class="post-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc d-flex align-items-center">
                                            <span><strong><?php echo get_field('start_date'); ?></strong></span>
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
                        <?php 
                            //echo ao_wp_pagination($paged,$query->max_num_pages);
                        endif; 
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>