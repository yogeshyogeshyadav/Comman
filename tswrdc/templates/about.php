<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*==============================*/
/* Template Name: About */
get_header();

$who_heading = get_field('who_heading');
$who_text = get_field('who_text');
$who_image = wp_get_attachment_image(get_field('who_image'),'large');
if(!empty($who_text)):
?>
<!--============================== Content Start ==============================-->
<div class="content-container gradient-bg info-container white-text">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-lg-6 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <?php
                if(!empty($who_heading)): echo '<div class="heading text-center"><h5>'.$who_heading.'</h5></div>'; endif;
                echo $who_text;
                ?>
                </div>
                <?php if(!empty($who_image)): echo '<div class="col-lg-6 os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.4s"><div class="thubnail-image-box border box-shadow">'.$who_image.'</div></div>'; endif; ?>
        </div>
    </div>
</div>
<!--============================== Content End ==============================-->
<?php 
endif;

if(have_rows('content')):
?>
<!--============================== Content Start ==============================-->
<div class="content-container card-block-container pb-0 overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="card-block-list d-flex flex-wrap">
                	<?php while(have_rows('content')): the_row();
                	$heading = get_sub_field('heading');
                    $image = wp_get_attachment_image(get_sub_field('image'),'large');	
                    $body_text = get_sub_field('body_text');
                    $body_text = str_replace('<ul>', '<ul class="dot-list">', $body_text);
                    $index = get_row_index();
                    if($index ==1):
                    	$cls = 'add-shape';
                    elseif($index ==2):
                    	$cls = 'add-shape small right';
                    endif;
                	?>
                    <li class="cb-item os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.<?php echo $index+2; ?>s">
                        <div class="cb-box">
                        	<?php
                            if(!empty($heading)): echo '<div class="heading gradient text-center"><h5 class="gradient-text">'.$heading.'</h5></div>'; endif;
                        	echo $body_text;
                        	if(!empty($image)): echo '<div class="cb-img-outer add-shape '.$cls.'"><div class="cb-img">'.$image.'</div></div>'; endif;
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
<?php endif; 

if(have_rows('focus_areas')):
$focus_heading = get_field('focus_heading');
?>
<!--============================== Content Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
            	<?php if(!empty($focus_heading)): echo '<div class="heading gradient os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s"><h5 class="gradient-text">'.$focus_heading.'</h5></div>'; endif; ?>
                <ul class="card-list d-md-flex flex-wrap justify-content-center mobile-slider white-dots">
                	<?php
                    while(have_rows('focus_areas')): the_row();
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
                            if(!empty($button_link && $button_text)): echo '<div class="card-btn"><a href="'.$button_link.'" class="btn btn-primary">'.$button_text.'</a></div>'; endif;
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

get_footer(); 
?>



