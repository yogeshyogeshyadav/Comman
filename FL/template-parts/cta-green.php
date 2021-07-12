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

<?php 

// DISPLAY CONTENT FOR SINGLE POST OBJECT

$post_object = get_field('cta');

if( $post_object ): 

    // override $post
    $post = $post_object;
    setup_postdata( $post ); 

    ?>
    <div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <span>Post Object Custom Field: <?php the_field('field_name'); ?></span>
    </div>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
