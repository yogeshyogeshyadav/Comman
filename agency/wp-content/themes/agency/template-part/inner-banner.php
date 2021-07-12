<?php
$bg_image = wp_get_attachment_image_url(get_field('bg_image'),'full');
?>
<div class="inner-banner" style="background-image: url(<?php echo $bg_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_title(); ?></h2>
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>