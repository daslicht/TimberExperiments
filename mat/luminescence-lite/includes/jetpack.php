<?php
/**
 * Compatibility settings and functions for Jetpack from Automattic
 * See http://jetpack.me/support/infinite-scroll/
 *
 * @package Luminescence
 */


/**
 * Add support for Infinite Scroll.
 */
function luminescence_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
    'container'  => 'content',
    'footer'     => 'page',
	) );
}
add_action( 'after_setup_theme', 'luminescence_infinite_scroll_init' );


/**
 * Check whether or not footer widgets are present. If they are present, then a button to
 * 'Load more posts' will be displayed and IS will not be triggered unless a user manually clicks on that button.
 *
 * @param bool $has_widgets
 * @uses Jetpack_User_Agent_Info::is_ipad, jetpack_is_mobile, is_active_sidebar
 * @filter infinite_scroll_has_footer_widgets
 * @return bool
 */
function luminescence_has_footer_widgets( $has_widgets ) {
	if ( ( Jetpack_User_Agent_Info::is_ipad() || ( function_exists( 'jetpack_is_mobile' ) && jetpack_is_mobile() ) ) && is_active_sidebar( 'bottom1' ) ) 
		$has_widgets = true;

	return $has_widgets;
}
add_filter( 'infinite_scroll_has_footer_widgets', 'luminescence_has_footer_widgets' );