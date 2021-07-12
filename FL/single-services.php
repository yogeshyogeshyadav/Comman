<?php
/**
 * Services single page template
*/
get_header(); ?>

    <!--==============================Breadcrumb container Start ============================-->
    <div class="breadcrumb-container">
        <div class="container">
            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="col-lg-10 offset-lg-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#!">Home</a></li>
                        <li class="breadcrumb-item"><a href="#!">Services</a></li>
                        <li class="breadcrumb-item active">Road Traffic Accidents</li>
                    </ol>
                  
                </div>
            </div>
        </div>
    </div>
    <!--==============================Breadcrumb container End ==============================-->

    <!--============================== inro-container container start ==============================-->

    <div class="content-container service-intro-container">
        <div class="container">
            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="col-lg-10 offset-lg-1">
                    <div class="service-intro-content d-flex flex-wrap">
                        <div class="service-intro-left">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="service-intro-icon">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="service-intro-right">
                            <h1><?php the_title() ?></h1>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================== inro-container container end ==============================-->
    <!--============================== block container container start ==============================-->

    <div class="content-container block-container p-0">
        <div class="container">
            <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                <div class="col-xl-10 offset-xl-1">
                    <?php $content = get_field('body_text'); ?>
                    <div class="cb-box d-flex flex-wrap">
                        <?php if(!empty($content)): ?>
                            <div class="cb-left">
                                <div class="cb-left-content">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(have_rows('image_slider') ): ?>
                            <div class="cb-right">
                                <div class="cb-image-right service-slider pb-0">
                                    <?php while( have_rows('image_slider') ): the_row();$img = get_sub_field('image');?>
                                        <div class="service-slide">
                                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['title']; ?>" />
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================== block container container end ==============================-->
    <!--============================== list container container start ==============================-->
    <?php $bottom_text = get_field('bc_body_text');
    if(!empty($bottom_text)):?>
        <div class="content-container list-container pb-0 mob-pb-30">
            <div class="container">
                <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
                    <div class="col-lg-8 offset-lg-1">
                        <div class="service-bottom-content">
                            <?php echo $bottom_text; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--============================== list container container end ==============================-->
    <!--============================== Cta Start ==============================-->
        <?php get_template_part( 'template-parts/cta', 'gray' ); ?>
    <!--============================== Cta End ==============================-->

<?php get_footer(); ?>