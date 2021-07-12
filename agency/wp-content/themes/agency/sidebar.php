<div class="col-md-3 fix">
    <div class="sidebar">
        <div class="widget-box">
            <h5>Popular Posts</h5>
            <ul class="list">
                <?php
                setPostViews(get_the_ID());
                query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=5');
                if(have_posts()) : while(have_posts()): the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                endwhile; endif;
                wp_reset_query();
               ?>
            </ul>
        </div>
        <div class="widget-box">
            <h5>Latest Posts</h5>
            <ul class="list">
                <?php
                $recent_args = array('post_type'=> 'post','post_status'=> 'publish','posts_per_page' => 5,);
                $recent_query = new WP_Query($recent_args);
                while($recent_query->have_posts()) : $recent_query->the_post(); 
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><small><?php echo get_the_date('d.m.Y'); ?></small></li>
                <?php 
                endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        
        <?php 
        $tags = get_tags();
        if($tags):
        ?>
        <div class="widget-box">
            <h5>Tags</h5>
            <div class="tag-box"> 
                <?php foreach($tags as $tag): ?>
                    <a href="<?php echo esc_url(get_tag_link( $tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a> 
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>