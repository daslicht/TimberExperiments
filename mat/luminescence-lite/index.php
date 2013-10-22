<?php

/**
 * Index layout template
 *
 * @file           index.php
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
						
			if ( is_home() || is_category() ):	
				get_template_part( 'loop', 'blog' ); 
			elseif ( is_archive() ):
				get_template_part( 'loop', 'archive' );
			elseif ( is_single() ):
				get_template_part( 'loop', 'single' );
			elseif ( is_search() ):
				get_template_part( 'loop', 'search' );
			endif;
		
			echo '</div>';
			echo '</div></div>';
			get_sidebar( 'blog-left');
			
			
			
		break;
		case "rightcolumn" : 
			echo '<div id="content-left" class="span8 equal"><div class="content-inner">';
			get_template_part( 'partials/mobile-logo' );
			get_template_part( 'partials/social-bar' ); 
			get_template_part( 'partials/horizontal-menu' );
			get_template_part( 'sidebar', 'header' );
			echo '<div id="content" class="site-content" role="main">';
						
			if ( is_home() || is_category() ):
				get_template_part( 'loop', 'blog' ); 
			elseif ( is_archive() ):
				get_template_part( 'loop', 'archive' );
			elseif ( is_single() ):
				get_template_part( 'loop', 'single' );
			elseif ( is_search() ):
				get_template_part( 'loop', 'search' );
			endif;
		
			echo '</div>';
			echo '</div></div>';
			get_sidebar( 'blog-right');
		break;
		} 
?>	

<?php get_footer(); ?>