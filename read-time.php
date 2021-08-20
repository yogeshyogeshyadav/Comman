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


function ao_post_read_time($id=null) {
    global $post;
    $id = (!empty($id)?$id:$post->ID);
    // get the post content
    $content = get_post_field( 'post_content', $id );
    // count the words
    $word_count = str_word_count( strip_tags( $content ) );
    // reading time itself
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " minute read";
    } else {
        $timer = " minute read"; // or your version :) I use the same wordings for 1 minute of reading or more
    }
    // I'm going to print 'X minute read' above my post
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}
<?php echo ao_post_read_time(); ?>
