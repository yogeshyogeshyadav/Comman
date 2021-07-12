<?php
/*==============================*/
// @package TWSRDC
// @author SLICEmyPAGE
/*=============================*/
/* Template Name: Benefits */
get_header(); 

$ben_bg_image = wp_get_attachment_image_url(get_field('ben_bg_image'),'medium_large');
$ben_right_logo = wp_get_attachment_image(get_field('ben_right_logo'),'medium');
$ben_left_logo = wp_get_attachment_image(get_field('ben_left_logo'),'medium');
$ben_heading = get_field('ben_heading');
$ben_sub_heading = get_field('ben_sub_heading');
?>
<div class="benefits-banner-container">
    <div class="benefits-banner-upper" style="background-image: url('<?php echo $ben_bg_image; ?>');">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="benefits-banner-content d-flex flex-column flex-md-row">
                    	<?php 
                    	if(!empty($ben_right_logo)): echo '<div class="benefits-banner-left">'.$ben_right_logo.'</div>'; endif;
                    	if(!empty($ben_heading)): echo '<div class="benefits-banner-middle"><div class=""> <h4>'.$ben_heading.'</h4><h6>'.$ben_sub_heading.'</h6></div></div>'; endif;
                    	if(!empty($ben_left_logo)): echo '<div class="benefits-banner-right">'.$ben_left_logo.'</div>'; endif; 
                    	?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(have_rows('thumbnail_list')):?>
    <ul class="benefits-banner-lowwer d-flex justify-content-center">
    	<?php while(have_rows('thumbnail_list')): the_row();
    	$thumbnail = wp_get_attachment_image(get_sub_field('thumbnail'),'medium');
    	echo '<li class="benefits-banner-img"><div class="benefits-banner-img-box">'.$thumbnail.'</div></li>';
		endwhile; 
    	?>
    </ul>
    <?php endif; ?>
</div>
<div class="benefits-list-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="benefits-list-conetent">
                	<?php if(have_rows('body_content')):
                	$bottom_img = wp_get_attachment_image(get_field('bottom_image'),'large');
                	?>
                    <li class="benefits-list-item benefits-left">
                        <div class="benefits-item">
                            <div class="benifits-vision">
                            	<?php while(have_rows('body_content')): the_row();
                            	$heading = get_sub_field('heading');
                            	$body_text = get_sub_field('body_text');
                            	$body_text = str_replace('<ul>', '<ul class="gradient-text">', $body_text);

                            	if(!empty($heading)): echo '<h5>'.$heading.'</h5>'; endif; 
                            	if(!empty($body_text)): echo $body_text; endif; 
                                endwhile; 
                                ?>
                            </div>
                            <?php if(!empty($bottom_img)): echo '<div class="benefits-list-img">'.$bottom_img.'</div>'; endif; ?>
                        </div>
                    </li>
                    <?php 
                	endif;
                	?>
                    <li class="benefits-list-item benefits-middle">
                        <div class="benefits-item">
                        	<?php
                        	if(have_rows('activities')):
                			$ben_dar_heading = get_field('ben_dar_heading');
							?>
                            <div class="benifits-activities">
                                <?php if(!empty($ben_dar_heading)): echo '<h5>'.$ben_dar_heading.'</h5>'; endif; ?>
                                <ul class="grid-list">
                                	<?php while(have_rows('activities')): the_row();
	                            	$heading = get_sub_field('heading');
	                            	$body_text = get_sub_field('body_text');
	                            	$icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
	                            	?>
                                    <li class="grid-item os-animation animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                                        <div class="grid-box d-flex align-items-md-center justify-content-start">
                                        	<?php if(!empty($icon)): echo '<div class="grid-icon">'.$icon.'</div>'; endif;?>
                                            <div class="grid-content">
                                                <?php 
                                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                                                ?> 
                                            </div>
                                        </div>
                                    </li>
                                	<?php endwhile; ?>
                                </ul>
                            </div>
                            <?php 
		                	endif;
		                	if(have_rows('social_icons')):
		                	$life_line = get_field('life_line');
		                	$medial_support = get_field('medial_support');
		                	?>
                            <div class="benifits-activities-footer d-flex align-items-center">
                                <div class="benifits-activities-social-left d-flex justify-content-center">
                                    <ul class="activities-social-link d-flex">
                                    	<?php while(have_rows('social_icons')): the_row();
		                            	$icon = get_sub_field('icon');
		                            	$url = get_sub_field('url');
		                            	echo '<li><a href="'.$url.'" target="_blank">'.$icon.'</a></li>';
		                            	endwhile;
		                            	?>  
                                    </ul>
                                    
                                </div>
                                <div class="benifits-activities-social-right">
                                    <?php 
                                    if(!empty($life_line)): echo '<h6>'.$life_line.'</h6>'; endif;
                                    if(!empty($medial_support)): echo '<p>'.$medial_support.'</p>'; endif;
                                    ?> 
                                </div>
                            </div>
                        	<?php 
                        	endif; 
                        	?>
                        </div>
                    </li>
                	<?php 
		            if(have_rows('approachs')):
		            $ben_app_heading = get_field('ben_app_heading');
                    $app_bottom_image = wp_get_attachment_image(get_field('app_bottom_image'),'large');
		            ?>
                    <li class="benefits-list-item benefits-right">
                        <div class="benefits-item">
                            <div class="benifits-approach">
                                <?php if(!empty($ben_app_heading)): echo '<h5>'.$ben_app_heading.'</h5>'; endif; ?>
                                <ul class="grid-list">
                                	<?php while(have_rows('approachs')): the_row();
	                            	$heading = get_sub_field('heading');
	                            	$body_text = get_sub_field('body_text');
	                            	$icon = wp_get_attachment_image(get_sub_field('icon'),'medium');
	                            	?>
                                    <li class="grid-item os-animation animated fadeIn" data-os-animation="fadeIn" data-os-animation-delay="0.3s" >
                                        <div class="grid-box d-flex align-items-md-center justify-content-start">
                                            <?php if(!empty($icon)): echo '<div class="grid-icon">'.$icon.'</div>'; endif;?>
                                            <div class="grid-content">
                                                <?php 
                                                if(!empty($heading)): echo '<h4>'.$heading.'</h4>'; endif;
                                                if(!empty($body_text)): echo '<p>'.$body_text.'</p>'; endif;
                                                ?> 
                                            </div>
                                        </div>
                                    </li>
                                	<?php 
                                	endwhile; 
                                	?>
                                </ul>
                                <?php if(!empty($app_bottom_image)): echo '<div class="benefits-list-img">'.$app_bottom_image.'</div>'; endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php 
                    endif; 
                    ?>
                </ul>
                <?php 
                $ben_address = get_field('ben_address');
                $ben_office = get_field('ben_office');
                $ben_help_desk = get_field('ben_help_desk');
                $ben_alumni = get_field('ben_alumni');
                $ben_email = get_field('ben_email');
                ?>
                <div class="benefits-info">
                    <?php if(!empty($ben_address)): echo '<p>'.$ben_address.'</p>'; endif; ?>
                    <ul class="benefits-info-list">
                        <li class="benefits-info-item">
                            <div class="benefits-info-icon">
                                <img src="<?php echo IMG.'phone.jpg'; ?>" alt="phone"/>
                            </div>
                            <div class="benefits-info-content">
                            	DAR office:- <a href="tel:<?php echo $ben_office; ?>"><?php echo $ben_office; ?></a>
                            </div>
                        </li>
                        <li class="benefits-info-item">
                            <div class="benefits-info-icon">
                                <img src="<?php echo IMG.'help-desh.jpg'; ?>" alt="help-desh"/>
                            </div>
                            <div class="benefits-info-content">
                            	Help Desk :-<a href="tel:<?php echo $ben_help_desk; ?>"> <?php echo $ben_help_desk; ?></a>
                            </div>
                        </li>
                        <li class="benefits-info-item">
                            <div class="benefits-info-icon">
                                <img src="<?php echo IMG.'site.jpg'; ?>" alt="site" />
                            </div>
                            <div class="benefits-info-content"><?php echo $ben_alumni; ?><a href="<?php echo $ben_email; ?>" target="_blank"> @ tswreis.in </a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


         


<?php get_footer(); ?>