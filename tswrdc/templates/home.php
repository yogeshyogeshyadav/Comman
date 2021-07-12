<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Homepage */
get_header();

if(have_rows('slider')):
?>
<!--============================== Hero  Start ==============================-->
<div class="hero-outer">
    <div class="hero-container d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto">
                    <div class="hero-box text-center">
                        <div class="hero-content-box">
                            <div class="hero-text-box hero-slider pb-0">
                                <?php while(have_rows('slider')): the_row();
                                $heading = get_sub_field('heading');
                                $sub_heading = get_sub_field('sub_heading');
                                $text = get_sub_field('text');
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                ?>
                                <div>
                                    <div class="hero-slide os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <?php if(!empty($heading)): echo '<div class="hero-slide-upper"><h3>'.$heading.'</h3></div>'; endif;?>
                                        <div class="hero-slide-lower">
                                            <?php 
                                            if(!empty($sub_heading)): echo '<h4>'.$sub_heading.'</h4>'; endif;
                                            if(!empty($text)): echo '<p>'.$text.'</p>'; endif;  
                                            if(!empty($button_text && $button_link)): echo '<a href="'.$button_link.'" class="btn btn-default">'.$button_text.'</a>'; endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-image-slider">
        <?php while(have_rows('slider')): the_row();
        $bg_image = wp_get_attachment_image_url(get_sub_field('bg_image'),'full');
        ?>
        <div>
            <div class="hero-slide d-flex align-items-center" style="background-image: url(<?php echo $bg_image; ?>);"></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<!--============================== Hero  End ==============================-->
<?php endif;
if(have_rows('focus_areas',38)):
$home_heading = get_field('home_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container gradient-bg home-card-container white-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(!empty($home_heading)): echo '<div class="heading text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h3>'.$home_heading.'</h3></div>'; endif; ?>
                <ul class="card-list d-md-flex flex-wrap justify-content-center mobile-slider white-dots">
                    <?php while(have_rows('focus_areas',38)): the_row();
                    $heading = get_sub_field('heading');
                    $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');    
                    $body_text = get_sub_field('body_text');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    $index = get_row_index();
                    ?>
                    <li class="card-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $index+2; ?>s">
                        <div class="card-box d-flex flex-column align-items-center">
                            <?php 
                            if(!empty($icon)): echo '<div class="card-img">'.$icon.'</div>'; endif; 
                            if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                            if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;    
                            if(!empty($button_link && $button_text)): echo '<div class="card-btn"><a href="'.$button_link.'" class="btn btn-default">'.$button_text.'</a></div>'; endif;
                            ?>
                        </div>
                    </li>
                   <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
if(post_type_exists('events')):
$args = array(
'post_type' => 'events', 
'posts_per_page' => 5,
'order' =>'DESC',
'orderby' =>'date'
);
$query = new WP_Query($args);  
?>
<!--============================== Content Start ==============================-->
<div class="content-container home-post-list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">events Updates</h5></div>
                <ul class="post-list d-flex flex-wrap post-slider os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($query->have_posts()): $query->the_post();
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'large');
                    $event_end_date = get_field('end_date');
                    $current_date = date('m/d/Y');
                    ?>
                    <li class="post-item">
                        <div class="post-box" style="background-image: url('<?php echo $featured_img; ?>');">
                            <div class="post-desc">
                                <h3><?php the_title(); ?></h3>
                                <div class="post-intro-desc d-flex align-items-center">
                                    <span><?php echo get_the_date(); ?></span>
                                    <a href="javascript:void(0)" class="gradient-btn" style="background-image: url('<?php echo get_template_directory_uri();?>/include/images/gradient-btn-left.png');">
                                    <?php 
                                    if($event_end_date > $current_date){
                                        echo '<span class="gradient-text2">Upcoming event</span>';
                                    }else{
                                        echo '<span class="gradient-text2">Past event</span>';
                                    }
                                    ?>
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
                    <li class="post-item">
                        <div class="post-box">
                            <a href="<?php echo site_url('events'); ?>" class="post-view-all">
                                <span class="viewall-text">VIEW <br /> ALL </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif; 
if(post_type_exists('post')):
$args = array(
'post_type' => 'post', 
'posts_per_page' => 5,
'order' =>'DESC',
'orderby' =>'date',
'cat' =>1
);
$query = new WP_Query($args);  
?>
<!--============================== Content Start ==============================-->
<div class="content-container home-post-list gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
               <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">blog Updates</h5></div>
                <ul class="post-list d-flex flex-wrap post-slider os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($query->have_posts()): $query->the_post();
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'large');
                    $cats = get_the_category();
                    $cat_name = $cats[1]->name;
                    ?>
                    <li class="post-item">
                        <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                            <div class="post-desc">
                                <h3><?php the_title(); ?></h3>
                                <div class="post-intro-desc d-flex align-items-center">
                                    <span><?php echo get_the_date(); ?></span>
                                    <a href="#!" class="gradient-btn" style="background-image: url('<?php echo get_template_directory_uri();?>/include/images/gradient-btn-left.png');" tabindex="-1">
                                    <span class="gradient-text2"><?php echo $cat_name; ?></span>
                                    </a>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn-hover color-2">View blog</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                    <li class="post-item">
                        <div class="post-box">
                            <a href="<?php echo site_url('blog'); ?>" class="post-view-all">
                                <span class="viewall-text">VIEW <br /> ALL</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif; 
if(post_type_exists('gallary')):
$args = array(
'post_type' => 'gallary', 
'posts_per_page' => 5,
'order' =>'DESC',
'orderby' =>'date',
);
$query = new WP_Query($args);   
?>
<!--============================== Content Start ==============================-->
<div class="content-container home-post-list">
    <div class="container">
        <div class="row">
            <div class="col-md-12 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
                <div class="heading gradient text-center os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">Gallery Updates</h5></div>
                <ul class="post-list d-flex flex-wrap post-slider os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s">
                    <?php
                    while($query->have_posts()): $query->the_post();
                    $featured_img = get_the_post_thumbnail_url(get_the_ID(),'large');
                    ?>
                    <li class="post-item">
                        <div class="post-box" style="background-image: url(<?php echo $featured_img; ?>);">
                            <div class="post-desc">
                                <h3><?php the_title(); ?></h3>
                                <div class="post-intro-desc d-flex align-items-center">
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                                <a href="javascript:void(0)" class="btn-hover color-2">View album</a>
                            </div>
                        </div>
                    </li>
                    <?php 
                    wp_reset_postdata();
                    endwhile;
                    ?>
                    <li class="post-item">
                        <div class="post-box">
                            <a href="<?php echo site_url('gallery'); ?>" class="post-view-all">
                                <span class="viewall-text"> VIEW <br /> ALL </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php
endif;
get_footer(); 
?>



