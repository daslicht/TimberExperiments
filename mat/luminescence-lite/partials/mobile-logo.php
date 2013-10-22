<?php
/**
 * Main content logo
 *
 * @file           mobile-logo.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>
    
<?php 
	$logostyle = get_theme_mod( 'logo_style', 'default' );
	 switch ($logostyle) {
		case "default" : // default theme logo ?>
        
            <div id="logo-wrapper" class="visible-phone">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri() ; ?>/images/demo/luminescence-logo.png" alt="<?php bloginfo( 'name' ); ?> "/>
                </a>
            </div>
            
            <div id="site-title" class="visible-phone">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                    rel="home" style="color: <?php echo get_theme_mod( 'mobile_sitetitle', '#3c4243' ); ?>;"><?php bloginfo('name'); ?></a></h1>
                <h2 style="color: <?php echo get_theme_mod( 'mobile_tagline', '#3c4243' ); ?>;"><?php bloginfo('description'); ?></h2>
            </div>
            	 
		<?php break;
		case "custom" : // your own logo ?>
			
			<div id="logo-wrapper" class="visible-phone">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_option( 'my_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>
						 
		<?php break;
		case "logotext" : // your own logo with text based title and site description ?>
        
            <div id="logo-wrapper" class="visible-phone">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                    <img src="<?php echo get_option( 'my_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?> "/>
                </a>
            </div>
            
            <div id="site-title" class="visible-phone">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                    rel="home" style="color: <?php echo get_theme_mod( 'mobile_sitetitle', '#3c4243' ); ?>;"><?php bloginfo('name'); ?></a></h1>
                <h2 style="color: <?php echo get_theme_mod( 'mobile_tagline', '#3c4243' ); ?>;"><?php bloginfo('description'); ?></h2>
            </div>
            			
		<?php break;
		case "text" : // text based title and site description ?>
			
            <div id="site-title" class="visible-phone">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
                    rel="home" style="color: <?php echo get_theme_mod( 'mobile_sitetitle', '#3c4243' ); ?>;"><?php bloginfo('name'); ?></a></h1>
                <h2 style="color: <?php echo get_theme_mod( 'mobile_tagline', '#3c4243' ); ?>;"><?php bloginfo('description'); ?></h2>
            </div>	
            		
		<?php break;
	} 
?>    