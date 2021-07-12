
<?php
/**
 *Template Name:Front Page
 */

get_header(); ?>

    <!--============================== Hero Start ==============================-->
        <?php if( have_rows('slider') ) : ?>
            <div class="hero-slider simple-slider">
                <?php while( have_rows('slider') ): the_row(); 
                    $bgimage = get_sub_field('background_image');
                    $heading = get_sub_field('heading');
                    $text = get_sub_field('text');
                ?>
                <div class="hero-slide" <?php if(!empty($bgimage)): ?>style="background-image: url(<?php echo $bgimage; ?> );" <?php endif; ?>>
                    <div class="container">
                        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.5s">
                           <div class="col-lg-10 offset-lg-1">
                                <div class="hero-content">
                                    <?php if(!empty($heading)): ?><h1><?php echo $heading; ?></h1><?php endif; ?>
                                    <?php if(!empty($text)): ?><p><?php echo $text; ?></p><?php endif; ?>
                                    <div class="hear-btn-group">
                                        <a href="#connection" class="btn btn-default page-scroll">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    <!--============================== Hero End ==============================-->
    <!--============================== About Start ==============================-->
        <?php 
            $short_description = get_field('short_description');
            $about_heading = get_field('about_us_heading');
            $about_image = get_field('about_image');
            $about_text = get_field('content');
        ?>
        <div class="content-container" id="about">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <div class="heading">
                            <?php if($about_heading): ?><h3><?php echo $about_heading; ?></h3><?php endif; ?>
                            <?php if($short_description): ?><p><?php echo $short_description; ?><?php endif; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                    <div class="col-lg-12">
                       <div class="row">
                            <?php if(!empty($about_image)): ?>
                                <div class="col-md-6">
                                    <div class="about-image">
                                        <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['title']; ?>">
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-6">
                                <div class="about-content">
                                   <?php echo $about_text; ?>
                                </div>
                            </div>
                       </div>
                       <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="cta-container">
                                    <a href="#connection" class="btn btn-default page-scroll">GET CONNECTION</a>
                                </div> 
                            </div>
                       </div>
                    </div>
                </div> 
            </div>
        </div>
    <!--============================== About End ==============================-->
    <!--============================== Why us Start ==============================-->
        <?php if( have_rows('services') ) :  ?>
            <?php 
                $section_heading = get_field('services_heading'); 
                $short_description = get_field('services_short_description');
            ?> 
            <div class="content-container grey-bg" id="why-us">
                <div class="container">
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="heading">
                                <?php if(!empty($section_heading)): ?><h3><?php echo $section_heading; ?></h3> <?php endif; ?>
                                <?php if(!empty($short_description)): ?><p><?php echo $short_description; ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-12">
                            <div class="why-content">
                                <ul class="why-list mobile-slider">
                                    <?php while( have_rows('services') ): the_row(); 
                                        $icon = get_sub_field('service_icon');
                                        $heading = get_sub_field('heading');
                                        $text = get_sub_field('text');
                                    ?> 
                                        <li class="why-item">
                                            <div class="why-box">
                                                <div class="why-icon">
                                                    <span><?php echo $icon; ?></span>
                                                </div>
                                                <div class="why-content">
                                                    <?php if(!empty($heading)) : ?><h4><?php echo $heading; ?></h4> <?php endif; ?>
                                                    <?php if(!empty($text)) : ?><p><?php echo $text; ?></p> <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="cta-container">
                                <a href="#connection" class="btn btn-default page-scroll">GET CONNECTION</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <!--============================== Why End ==============================-->
    <!--============================== Plan Start ==============================-->
        <?php if( have_rows('plans') ) : ?>
            <?php 
                $section_heading = get_field('plan_heading');
                $short_description = get_field('plan_short_description');
                $otherInfo = get_field('other_info'); 
            ?>
            <div class="content-container" id="plans">
                <div class="container">
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="heading">
                                <?php if(!empty($section_heading)) : ?><h3><?php echo $section_heading; ?></h3> <?php endif; ?>
                                <?php if(!empty($short_description)) : ?><p><?php echo $short_description; ?></p> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-12">
                            <div class="plan-content">
                                <ul class="plan-list mobile-slider">
                                    <?php while( have_rows('plans') ): the_row(); 
                                        $planName = get_sub_field('heading');
                                    ?> 
                                        <li class="plan-item">
                                            <div class="plan-box">
                                                <div class="plan-header">
                                                    <?php if(!empty($planName)): ?><h5><?php echo $planName; ?></h5> <?php endif; ?>
                                                </div>
                                                <?php if( have_rows('plan_list') ): $count = get_row_index(); ?>
                                                    <ul class="pricing-list">
                                                        <?php while( have_rows('plan_list') ): the_row(); 
                                                            $speed = get_sub_field('speed');
                                                            $price = get_sub_field('price');
                                                        ?>
                                                            <li>
                                                                <div class="<?php if($count % 2 == 0){ echo 'pricing-box grey-bg';  } else{ echo 'pricing-box'; }  ?>">
                                                                    <p><?php echo $price; ?></p>
                                                                    <h6><?php echo $speed; ?></h6>
                                                                </div>
                                                            </li>
                                                            <?php $count = $count+1; ?>
                                                        <?php endwhile; ?>
                                                    </ul>
                                                <?php endif; ?>  
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                                <div class="cta-container">
                                    <a href="#connection" class="btn btn-default page-scroll">GET CONNECTION</a>
                                </div>
                                <?php if($otherInfo) :?>
                                    <div class="other-info">
                                        <?php echo $otherInfo; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?> 
    <!--============================== Plan End ==============================-->
    <!--============================== faqs Start ==============================-->
        <?php if( have_rows('faqs') ) : ?>
            <?php 
                $section_heading = get_field('section_heading');
                $short_description = get_field('faqs_short_description');
            ?> 
            <div class="content-container grey-bg faqs-container grey-bg" id="faqs">
                <div class="container">
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="heading">
                                <?php if($section_heading) : ?><h3><?php echo $section_heading; ?></h3><?php endif; ?>
                                <?php if($short_description) : ?><p><?php echo $short_description; ?></p><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="faqs-content">
                                <div class="accordion" id="faqs-accordion">
                                    <?php while( have_rows('faqs') ): the_row(); 
                                        $faqsHeading = get_sub_field('heading');
                                        $faqsContent = get_sub_field('content');
                                    ?> 
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="panel-title" data-toggle="collapse" data-target="#collapse-<?php echo get_row_index(); ?>" aria-expanded="false"><?php echo $faqsHeading; ?></h3>
                                            </div>
                                            <div id="collapse-<?php echo get_row_index(); ?>" class="card-body collapse" aria-labelledby="heading-<?php echo get_row_index(); ?>" data-parent="#faqs-accordion">
                                                <div class="card-body-content">
                                                    <p><?php echo $faqsContent; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    
                                </div>
                                <div class="cta-container">
                                    <a href="#connection" class="btn btn-default page-scroll">GET CONNECTION</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <!--============================== faqs End ==============================-->
    <!--============================== Contact Start ==============================-->
        <div class="content-container" id="connection">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <?php
                            
                            $heading = get_field('contact_heading');
                            $short_description = get_field('contact_short_description');
                        ?>
                        <div class="heading">
                            <?php if($heading): ?><h3><?php echo $heading; ?></h3><?php endif; ?>
                            <?php if($heading): ?><p><?php echo $short_description; ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s">
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        <?php echo do_shortcode('[contact-form-7 id="136" title="Contact Form"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    <!--============================== Contact End ==============================-->

 
<?php get_footer(); ?>