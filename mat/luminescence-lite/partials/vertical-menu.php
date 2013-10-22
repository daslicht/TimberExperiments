<?php

/**
 * Vertical menu
 *
 * @file           vertical-menu.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
 
//$walker = new Luminescence_Menu_With_Description; ?>

<nav id="site-navigation" class="main-navigation vertical-menu main-menu hidden-phone" role="navigation">
	<h3 class="menu-toggle"><?php _e( 'Menu', 'luminescence' ); ?></h3>
	
	<?php wp_nav_menu( array( 
		'theme_location' => 'primary-menu', 
		'menu_class' => 'menu', 
		//'walker' => $walker, 
		) ); 
	?>
</nav><!-- #site-navigation -->