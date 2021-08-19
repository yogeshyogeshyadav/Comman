function yy_content_read_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readTime = ceil($word_count / 200);
    if($readTime == 1) {
        $timer = " minute";
    }else{
        $timer = " minutes";
    }
    $totalreadTime = $readTime . $timer;
    return $totalreadTime;
}

<?php echo yy_content_read_time(); ?>
