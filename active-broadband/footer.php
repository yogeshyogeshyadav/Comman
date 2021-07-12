  </main>  
  <!--============================== Footer Start ==============================-->
    <footer id="footer">
          <div class="container">
              <div class="row">
                	<div class="col-lg-4 d-flex justify-content-center order-lg-1">
                      <?php if( have_rows('social_links', 'option') ) :  ?>
                        	<div class="footer-social-link mb-2 mb-lg-0">
                              <?php while( have_rows('social_links','option') ): the_row(); ?> 
                         		    <a href="<?php echo the_sub_field('url','option'); ?>" target="_blank"><?php echo the_sub_field('icon','option'); ?></a>
                              <?php endwhile; ?>
                         	</div>
                      <?php endif; ?>
                  </div>
                  <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-start">
                      <div class="footer-left mb-1 mb-lg-0">
                       	<div class="copyright d-flex align-items-center">
                       		<p class="mb-0 mr-2"><?php echo do_shortcode(get_field('copyrights','option')); ?></p>
                       	</div>
                      </div>
                  </div>
                  <?php if(get_field('designed_by','option')) : ?>
                      <div class="col-lg-4 d-flex justify-content-lg-end justify-content-center justify-content-lg-end order-lg-1">
      	               <div class="footer-right d-flex">
          		            <div class="site-by d-flex align-items-center">
          		               <p class="mb-0 mr-2"><?php echo the_field('designed_by','option'); ?></p>
          		            </div>
      	               </div>
                      </div>
                  <?php endif; ?>
              </div>
          </div>
    </footer>
  <?php wp_footer(); ?>
  <!--============================== Footer End ==============================-->
  </body>
</html>