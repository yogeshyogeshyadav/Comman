<?php 
/**
 * Plugin Name: Test One
 * Description: This is my test plugin
 * Version: 1.0
 * Author: smp
 * Author URI: https://slicemypage.com/
*/


function smp_show_current_mounth_post() {
		if(!current_user_can('administrator')) :
			return;
		endif;
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'post',
			'post_status' => 'publish',
			'date_query' => array(
			    array(
			      'after'   => '-1 month',
			    ),
			 ),
			'orderby' => 'date',
			'order' => 'DESC',
		);
		$query = new WP_Query( $args );
		ob_start();
		while( $query->have_posts() ) :
			$query->the_post(); ?>
			<h5><?php the_title(); ?></h5>
			By <?php the_author(); ?> on <?php echo get_the_date('d.m.Y'); ?>
		<?php endwhile;
		wp_reset_postdata();
		return ob_get_clean();
}
add_shortcode('smp_show_current_mounth_post', 'smp_show_current_mounth_post' );
