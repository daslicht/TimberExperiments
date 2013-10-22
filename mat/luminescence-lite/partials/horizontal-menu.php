<?php

/**
 * Horizontal menu
 *
 * @file           horizontal-menu.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
 
?>

<nav id="site-navigation" class="main-navigation hidden-desktop hidden-tablet visible-phone" role="navigation">
	<h3 class="menu-toggle"><?php _e( 'Menu', 'luminescence' ); ?></h3>
		<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
</nav><!-- #site-navigation -->	