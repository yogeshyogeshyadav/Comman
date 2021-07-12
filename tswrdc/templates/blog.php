<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Blog */
get_header(); ?>
<!--============================== Content Start ==============================-->
<div class="content-block-container">
    <div class="container container1">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
            <div class="col-md-12">
                <div class="cb-box d-flex flex-wrap">
                    <?php get_sidebar();
                    if(have_posts()): 
                    ?>
                    <div class="cb-right">
                        <ul class="post-list d-flex flex-wrap">
                            <?php 
                            $args = array(
                                'post_type' => 'post', 
                                'posts_per_page' => -1,
                                'cat' =>1
                            );
                            $query = new WP_Query($args);  
                            while($query->have_posts()): $query->the_post();
                            $featured_img = get_the_post_thumbnail_url(get_the_ID(),'medium_large');
                            $year = get_field('year');
                            $country = get_field('country');
                            $state = get_field('state');
                            $school = get_field('school');
                            $experience = get_field('experience');
                            ?>
                            <li class="post-item">
                                <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                                    <div class="post-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <div class="post-intro-desc">
                                            <?php 
                                            if(!empty($year)): echo '<span><strong>Year -</strong>'.$year.'</span>'; endif;
                                            if(!empty($country)): echo '<span><strong>Country -</strong>'.$country.'</span>'; endif;
                                            ?> 
                                        </div>
                                        <?php if(!empty($school)): echo '<p><strong>School: </strong>'.$school.'</p>'; endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="btn-hover color-2">View Experience</a>
                                    </div>
                                </div>
                            </li>
                           <?php 
                            wp_reset_postdata();
                            endwhile; 
                            ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php get_footer(); ?>