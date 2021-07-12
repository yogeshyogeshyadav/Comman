<?php 
$cta_content = get_field('cta',17);
if($cta_content){ ?>
<div class="cta-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s">
            <div class="col-md-10 offset-md-1">
                <div class="cta-box d-md-flex flex-wrap align-items-center justify-content-between">
                    <h4>Get in touch with our qualified team today...</h4>
                    <div class="cta-btn">
                        <a href="#!" class="btn btn-default">CONTACT US</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php 

$post_objects = get_field('post_objects');

if( $post_objects ): ?>
    <ul>
    <?php foreach( $post_objects as $post_object): ?>
        <li>
            <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a>
            <span>Post Object Custom Field: <?php the_field('cta_text', $post_object->ID); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif;