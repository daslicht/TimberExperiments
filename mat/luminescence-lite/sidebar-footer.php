<?php
/**
 * Sidebar for the footer bottom of page
 *
 * @file           sidebar-footer.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>


<div class="container">
	<div class="row">
			
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div id="footer-wrapper" class="span12" style="color:<?php echo get_theme_mod( 'footer_text', '#abb3b4' ); ?>;">
				<aside id="footer"><?php dynamic_sidebar( 'footer' ); ?></aside>
			</div>			
		<?php endif; ?>
			
	</div>
</div>