<?php

/**
 * Page main content with left sidebar
 *
 * @file           page.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */

get_header(); ?>

<?php $bloglayout = get_theme_mod( 'blog_layout', 'leftcolumn' );
	switch ($bloglayout) {
		case "leftcolumn" :
			echo '<div id="content-right" class="span8 equal"><div class="content-inner">';
			get_template_part( 'partials/mobile-logo' );
			get_template_part( 'partials/social-bar' ); 
			get_template_part( 'partials/horizontal-menu' );
			get_template_part( 'sidebar', 'header' );
			echo '<div id="content" class="site-content" role="main">';
			
			get_template_part( 'loop', 'page' );
				
			echo '</div>';
			echo '</div></div>';
			get_sidebar( 'page-left');
			
		break;
		case "rightcolumn" : 
			echo '<div id="content-left" class="span8 equal"><div class="content-inner">';
			get_template_part( 'partials/mobile-logo' );
			get_template_part( 'partials/social-bar' ); 
			get_template_part( 'partials/horizontal-menu' );
			get_template_part( 'sidebar', 'header' );
			echo '<div id="content" class="site-content" role="main">';
						
			get_template_part( 'loop', 'page' );
		
			echo '</div>';
			echo '</div></div>';
			get_sidebar( 'page-right');
		break;
		} 
?>	

<?php get_footer(); ?>