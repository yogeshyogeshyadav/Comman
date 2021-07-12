<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: Community */
get_header();

$comm_heading = get_field('comm_heading');
?>
<!--============================== content container Start ==============================-->
<div class="content-container white-text">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="content-text-box">
                	<?php
                    if(!empty($comm_heading)): echo '<div class="heading os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h4>'.$comm_heading.'</h4></div>'; endif; 
    				if(have_rows('services')):
    				?>
                    <ul class="grid-list">
                        <?php while(have_rows('services')): the_row();
                        $icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
                        $heading = get_sub_field('heading');
                        $text = get_sub_field('text');
                        $index = get_row_index();
                        ?>
                        <li class="grid-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $index+3; ?>s">
                            <div class="grid-box d-flex align-items-md-center justify-content-center">
                                <?php if(!empty($icon)): echo '<div class="grid-icon">'.$icon.'</div>'; endif; ?>
                                <div class="grid-content">
                                    <?php 
                                    if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                    if(!empty($text)): echo $text; endif; 
                                    ?> 
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(have_rows('thumbnail_list')): ?>
            <div class="col-lg-5">
            	<?php while(have_rows('thumbnail_list')): the_row();
                $index = get_row_index()+5;
                $thumbnail = wp_get_attachment_image(get_sub_field('thumbnail'),'large');
                echo '<div class="thubnail-image-box border box-shadow os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.'.$index.'s">'.$thumbnail.'</div>';
            	endwhile;
                ?>
            </div>
        	<?php endif; ?>
        </div>
    </div>
    <!--============================== content container End ==============================-->
</div>
<?php get_footer(); ?>