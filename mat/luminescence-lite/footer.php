<?php

/**
 * Footer Template
 *
 * @file           footer.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>

					
				</div><!-- end row-fluid for content columns -->
				
					<div class="row-fluid">
						<div id="bottom-wrapper" style="background-color: <?php echo get_theme_mod( 'bottom_bg', '#000000' ); ?>; color: <?php echo get_theme_mod( 'bottom_text', '#abb3b4' ); ?>;">
							<?php get_sidebar( 'bottom' ); ?>
						</div> 
					</div>
               
			</div><!-- end container-fluid -->
		</div><!-- end wrapper -->
        
        <?php get_sidebar( 'footer'); ?>
        
        
			        
                <div id="footer-menu-wrapper">
                    <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => false, 'container' => false, 'menu_id' => 'footer-menu' ) ); ?>
                </div>
           
               
        		<div id="copyright-wrapper" style="color: <?php echo get_theme_mod( 'copyright_text', '#787c7f' ); ?>;">
					<?php esc_attr_e('Copyright &copy;', 'luminescence'); ?> <?php _e(date('Y')); ?> <?php echo get_theme_mod( 'copyright', 'Your Name' ); ?>.<?php esc_attr_e('All rights reserved.', 'luminescence'); ?>
                </div>

        
		<?php wp_footer(); ?>
	</body>
</html>