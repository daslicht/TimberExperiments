<?php

/**
 * Custom Header
 *
 * @file           custom-header.php
 * @package        Luminescence-Lite
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

 
function luminescence_custom_header_setup() {
	$args = array(
				
		// Set height and width, with a maximum value for the width.
		'height'                 => 400,
		'width'                  => 725,
		'max-width'              => 725,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,
		
		// Text 
		'default-text-color'     => '',
		'header-text'            => false,

		// Callbacks for styling the header and the admin preview.
		'admin-preview-callback' => 'luminescence_admin_header_image',	
		
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'luminescence_custom_header_setup' );

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 *
 */
function luminescence_admin_header_image() {
	?>
	<div id="headimg">
		
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }