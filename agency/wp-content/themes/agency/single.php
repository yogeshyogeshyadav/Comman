<?php
/*==============================*/
// @package SLICEmyPAGE
// @author SLICEmyPAGE
/*==============================*/
if(!defined('ABSPATH')){
    exit; // Exit if accessed directly
} 
get_header();

$bg_image = wp_get_attachment_image_url(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); 
?>
<!--============================== Inner Banner Start ==============================-->
<div class="inner-banner" style="background-image: url(<?php echo $bg_image; ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Latest News &amp; Posts</h2>
                <ul class="breadcrumb">
                    <?php if(function_exists('bcn_display')){bcn_display();} ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--============================== Inner Banner End ==============================-->
<!--============================== Content Section Start ==============================-->
<div class="content-container">
    <div class="container">
        <div class="row os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.2s">
            <div class="col-md-9">
                <div class="single-post-content">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <?php  
                    $post_id = get_the_ID();
                    $author_id = get_post_field( 'post_author', $post_id );
                    $author_name = get_the_author_meta( 'display_name', $author_id );
                    ?>
                    <p>Posted on <strong><?php echo get_the_date('M d, Y'); ?></strong> by <strong><?php echo $author_name; ?></strong></p>
                    <?php the_content(); ?>
                    <div class="share-post">
                        <h5 class="color-text">Share :</h5>
                        <ul class="share-post-list">
                            <?php echo meks_ess_share(); ?>
                        </ul>
                    </div>
                    <?php 
                    $prev_post = get_adjacent_post(false, '', true);
                    $next_post = get_adjacent_post(false, '', false);
                    ?>
                    <ul class="bottom-nav">
                        <li>
                            <a class="template-nav template-prev" <?php if(!empty($prev_post)): ?>href="<?php echo get_permalink($prev_post->ID); ?>"<?php endif; ?>><i class="fa fa-angle-left"></i> <strong class="hidden-xs">Prev Post</strong></a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('/blog/'); ?>"><i class="fas fa-th-large"></i></a>
                        </li>
                        <li>
                            <a class="template-nav template-next" <?php if(!empty($next_post)): ?>href="<?php echo get_permalink($next_post->ID); ?>"<?php endif; ?>><strong class="hidden-xs">Next Post</strong> <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                    <!-- Comment start -->
                   <!--  <div class="comments">
                        <h5>3 Comments</h5>
                        <ul>
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-author vcard"><img src="include/images/default-user.jpg" alt="" /> Admin says:</div>
                                    <div class="comment-meta"><a href="#"> April 7, 2016 at 4:30 pm</a></div>
                                    <p>Sed consequat molestie rutrum. Mauris malesuada vel massa ac iaculis. Donec pharetra urna eget nunc mattis, at vehicula diam convallis.</p>
                                    <div class="reply"><a class="comment-reply-link" href="#">Reply</a></div>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author vcard"><img src="include/images/default-user.jpg" alt="" /> Jane Doe says:</div>
                                            <div class="comment-meta"><a href="#"> April 8, 2016 at 6:09 pm</a></div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ullamcorper vulputate justo nec consectetur. Etiam et lacus venenatis, commodo augue nec, fringilla erat.</p>
                                            <div class="reply"></div>
                                        </div>
                                    </li>
                                   
                                </ul>
                               
                            </li>
                           
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-author vcard"><img src="include/images/default-user.jpg" alt="" />Deepak Verma says:</div>
                                    <div class="comment-meta commentmetadata"><a href="#"> April 8, 2016 at 6:10 pm</a></div>
                                    <p>Donec eros mi, venenatis a ante at, dapibus luctus erat. Vivamus ante purus, ornare non gravida sit amet, tempus vitae dui. In sed varius nisi.</p>
                                    <div class="reply"><a class="comment-reply-link" href="#">Reply</a></div>
                                </div>
                            </li>
                          
                        </ul>
                        
                        <div id="respond" class="comment-respond">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5 id="reply-title" class="comment-reply-title">Leave a Reply</h5>
                                    <form action="#" method="post" id="commentform" class="comment-form">
                                        <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                        <div class="form-group">
                                            <textarea required="required" class="form-control" placeholder="Comment*"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control" placeholder="Name*" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control" placeholder="Email*" required="required" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" value="" class="form-control" placeholder="Website" />
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" type="submit" id="submit" class="submit btn btn-default">Post Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php if(comments_open() || get_comments_number()) :comments_template(); endif; ?>
                    <!-- Comment end -->
                </div>
            </div>
            <?php get_sidebar('sidebar'); ?>
        </div>
    </div>
</div>
<!--============================== Content Section End ==============================-->

<?php get_footer(); ?>