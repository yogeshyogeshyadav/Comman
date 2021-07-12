
<?php
/**
 *Template Name:Search Template
 */

get_header();
?>



<div class="container">
	<h1 class="text-center">Search Result</h1>
	<?php 
		$query = get_search_query('s');
		
	?>
	<?php if($query) :?>
		<?php 
			$args = array(
			    's' =>$query,
			    'posts_per_page'		=>10,
            	'post_type'				=>'post',
            	'order'					=>'ASC',
            	'orderby'				=>'postDate',
            	'exact'					=>true,
            	'sentence'				=>true,
			   
			);
			$the_query = new WP_Query( $args );
			if 	($the_query->have_posts() ) {
			        _e("<h2 style='font-weight:bold;color:#000'>Search Results for: ".get_query_var('s')."</h2>");
			        while ($the_query->have_posts() ) {
			           		$the_query->the_post();
			            ?>
			            <div class="row post-content">
		                    <li>
		                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                    </li>
		                    <a href="<?php the_permalink(); ?>" class="title" target="_blank">
								<i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo get_the_title(); ?>
							</a>
							<div class="description"><?php the_excerpt(); ?></div>
							<p class="text-right"><?php the_date( 'Y-m-d'); ?></p>
		                </div>
			           	<?php
			        }
			    }else{ ?>
			        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
			<?php }
		?>
	<?php endif; ?>
</div>

<?php 

get_footer();
?>