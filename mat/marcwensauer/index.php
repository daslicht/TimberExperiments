<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
		<!-- WP-HEAD-->
		<?php wp_head(); ?>
		<!-- WP-HEAD-->
	</head>

	<body <?php body_class(); ?>>
		<canvas style="display:none" id="canvas" width="570" height="570"></canvas>
		<canvas style="display:none" id="canvas3" width="570" height="570"></canvas>
		<canvas id="canvas2" width="570" height="570">*** THIS BROWSER DOES NOT SUPPORT THE CANVAS ELEMENT ***</canvas>
		<div id="page" class="hfeed site">
			<header id="masthead" class="site-header" role="banner">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>

				<div id="navbar" class="navbar">
					<nav id="site-navigation" class="navigation main-navigation" role="navigation">
						<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
						<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
						<?php get_search_form(); ?>
					</nav>
				</div>
			</header>

			<div id="main" class="site-main">
				<?php //get_header(); ?>
				<div id="primary" class="content-area">
					<div id="content" class="site-content" role="main">

						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', 'excerpt' ); ?>
							<?php endwhile; ?>
							<?php twentythirteen_paging_nav(); ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>

					</div>
				</div>

				<?php //get_sidebar(); ?>
	
				<?php //get_footer(); ?>
				
			</div>
			<?php get_template_part( 'footer') ?>
		</div>
		<div id='wp-footer'>
		<?php wp_footer(); ?>
		</div>

	</body>
</html>

