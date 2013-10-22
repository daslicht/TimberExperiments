<?php
/**
 * Sidebar showcase header for sliders and more
 *
 * @file           sidebar-header.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>


<div class="container-fluid">
	<div class="row-fluid">
			
		<?php if ( is_active_sidebar( 'banner' ) ) : ?>
			<aside id="lum-banner" class="span12">
				<?php dynamic_sidebar( 'banner' ); ?>
			</aside>
		<?php elseif ( is_front_page() ): ?>	
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<aside id="lum-wpheader" class="span12">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="lum-header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" /></a>
				</aside>				
			<?php endif; ?>
			
		<?php endif; ?>
			
	</div>
</div>