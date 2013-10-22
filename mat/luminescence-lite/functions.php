<?php

/**
 * Theme Functions
 *
 * @file           functions.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0.0
 */


/**
 * Set content width
 */
if ( ! isset( $content_width ) )
		$content_width = 725;

if ( ! function_exists( 'luminescence_setup' ) ):
function luminescence_setup() {
	/**
	 * Luminescence is now available for translations.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'luminescence', get_template_directory() . '/languages' );
	
	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( 'editor-style.css' );

	/**
	 * This feature enables post and comment RSS feed links to head.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	* Enable support for Post Formats
	* @see http://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'status', 'quote', 'audio', 'video' ) );
		
	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	* Setup the WordPress core custom background feature.
	* @see http://codex.wordpress.org/Custom_Backgrounds 
	*/
	$args = array(
			'default-color' => '333535',
			'default-image' => get_template_directory_uri() . '/images/backgrounds/background1.jpg',
	);
	add_theme_support( 'custom-background', $args );
		
	/**
	 * This feature enables custom-menus support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'primary-menu'      => __('Primary Menu', 'luminescence'),
		'footer-menu'       => __('Footer Menu', 'luminescence')
	) );
}
endif;
add_action( 'after_setup_theme', 'luminescence_setup' );


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function luminescence_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'luminescence_page_menu_args' );

/**
 * Sets the post excerpt length to 40 words.
 */
function luminescence_excerpt_length($length) {
	return 40;
}

add_filter('excerpt_length', 'luminescence_excerpt_length');

/**
 * This function removes .menu class from custom menus in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 */
class luminescence_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}
 
	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		return $settings;
	}
 
	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
 
		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';
 
		return $args;
	}
}
new luminescence_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function luminescence_wp_page_menu ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass = $matches[1];
		$replace = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup; }

add_filter('wp_page_menu', 'luminescence_wp_page_menu');
	
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
*/ 
function luminescence_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'luminescence' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'luminescence_wp_title', 10, 2 );
	
/**
 * This function prints post meta data 
 */
if (!function_exists('luminescence_entry_meta')) :

function luminescence_entry_meta() {
	printf( __( '<span class="%3$s"> Author: </span>%4$s', 'luminescence' ),
	'meta-prep meta-prep-author posted', 
	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
		get_permalink(),
		esc_attr( get_the_time() ),
		get_the_date()
	),
	'byline',
	sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'luminescence' ), get_the_author() ),
		get_the_author()
	    )
	);
}
endif;	

/**
 * Returns a "Read more" link for excerpts
 */
	function luminescence_read_more() {
		return '<div class="read-more"><a href="' . get_permalink() . '">' . __('Continue Reading...', 'luminescence') . '</a></div>';
	}
/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
	function luminescence_custom_excerpt_more($output) {
		if (has_excerpt() && !is_attachment()) {
			$output .= luminescence_read_more();
		}
		return $output;
	}

add_filter('get_the_excerpt', 'luminescence_custom_excerpt_more');

/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 * Falls back to the post permalink if no URL is found in the post.
 *
 */
function luminescence_get_link_url() {
	$has_url = get_the_post_format_url();

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * This function removes inline styles set by WordPress gallery.
 */
	function luminescence_remove_gallery_css($css) {
		return preg_replace("#<style type='text/css'>(.*?)</style>#s", '', $css);
	}

	add_filter('gallery_style', 'luminescence_remove_gallery_css');
		
/**
 * This function removes default styles set by WordPress recent comments widget.
 */
	function luminescence_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
	add_action( 'widgets_init', 'luminescence_remove_recent_comments_style' );
 
/**
 * This function removes WordPress generated category and tag atributes.
 * For W3C validation purposes only.
 * 
 */
	function luminescence_category_rel_removal ($output) {
		$output = str_replace(' rel="category tag"', '', $output);
		return $output;
	}

	add_filter('wp_list_categories', 'luminescence_category_rel_removal');
	add_filter('the_category', 'luminescence_category_rel_removal');

/**
 * A comment reply.
 */
    function luminescence_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }

    add_action( 'wp_enqueue_scripts', 'luminescence_enqueue_comment_reply' );

/**
 * Displays navigation to next/previous pages when applicable.
 */	

if ( ! function_exists( 'luminescence_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 */
function luminescence_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h5 class="screen-reader-text"><?php _e( 'More Articles', 'luminescence' ); ?></h5>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'luminescence' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'luminescence' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'luminescence_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*/
function luminescence_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h5 class="screen-reader-text"><?php _e( 'More Articles', 'luminescence' ); ?></h5>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'luminescence' ) ); ?><br />
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'luminescence' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


/**
 * Move the More Link outside the default content paragraph.
 * Special thanks to http://nixgadgets.vacau.com/archives/134
 */
	function luminescence_new_more_link($link) {
		$link = '<p class="more-link">'.$link.'</p>';
		return $link;
	}
	add_filter('the_content_more_link', 'luminescence_new_more_link');	
	
/**
 * Special excerpt length per instance ie showcase column excerpts
 * Thanks to http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
 */ 
	function luminescence_excerpt($num) {  
	  $limit = $num+1;  
	  $excerpt = str_split(get_the_excerpt()); 
	  $length = count($excerpt);
		  if ($length>=$num) {
			$excerpt = array_slice( $excerpt, 0, $num);  
			$excerpt = implode("",$excerpt)."...";  
			echo $excerpt;  
		  
		  }
	}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 * This theme uses this for the portfolio for any sub portfolio categories
 * 
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 * Special thanks to Michal Ochman http://blog.scur.pl/ for modifying this to use the category name instead of ID
 */

	if ( ! function_exists( 'luminescence_post_is_in_descendant_category' ) ) {
		function luminescence_post_is_in_descendant_category( $cats, $_post = null ) {
			foreach ( (array) $cats as $cat ) {
				// get_term_children() accepts integer ID only
				if ( is_string( $cat ) ) {
					$cat = get_term_by( 'slug', $cat, 'category' );
					if ( ! isset( $cat, $cat->term_id ) )
						continue;
					$cat = $cat->term_id;
				}
				$descendants = get_term_children( (int) $cat, 'category' );
				if ( $descendants && in_category( $descendants, $_post ) )
					return true;
			}
			return false;
		}
	}	
	
/**
 * Enqueue scripts and styles
 */

function luminescence_scripts() {
	global $wp_styles;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Loads the Bootstrap responsive stylesheet
	wp_enqueue_style( 'luminescence-responsive', get_template_directory_uri() . '/responsive.css', array( ), '2.2.2', 'all' );
	// Loads the theme stylesheet	
	wp_enqueue_style( 'luminescence-style', get_stylesheet_uri() );
	
	// Loads the theme scripts
	wp_enqueue_script('luminescence-equal', get_template_directory_uri() . '/js/luminescence-equal.js', array('jquery'), '1.0.0', false);	
	wp_enqueue_script('luminescence-modernizr', get_template_directory_uri() . '/js/luminescence-modernizr.js', array('jquery'), '2.6.2', false);
    wp_enqueue_script('luminescence-bootstrap', get_template_directory_uri() . '/js/luminescence-bootstrap.min.js', array('jquery'), '2.3.2', true);
	wp_enqueue_script('luminescence-bootstrap-st', get_template_directory_uri() . '/js/luminescence-bootstrap-st.js', array('jquery'), '2.2.2', true);	
	wp_enqueue_script('luminescence-navigation', get_template_directory_uri() . '/js/luminescence-navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'luminescence_scripts' );

	
/**
 * Adds customizable styles to your <head>
 */
	function luminescence_theme_customize_css()
	{
		?>
		<style type="text/css">
			a,a:visited {color: <?php echo get_theme_mod( 'page_links', '#d2a76a' ); ?>;}
			a:hover {color: <?php echo get_theme_mod( 'page_linkshover', '#787c7f' ); ?>;}
			#bottom-wrapper a {color: <?php echo get_theme_mod( 'bottom_links', '#abb3b4' ); ?>;}
			#bottom-wrapper a:hover {color: <?php echo get_theme_mod( 'bottom_linkshover', '#cccccc' ); ?>;}
			#footer-wrapper a, #footer-menu-wrapper a {color: <?php echo get_theme_mod( 'footer_link', '#d2a76a' ); ?>;}
			#footer-wrapper a:hover, #footer-menu-wrapper a:hover {color: <?php echo get_theme_mod( 'footer_linkhover', '#abb3b4' ); ?>;}			
			#bottom-wrapper li {border-color: <?php echo get_theme_mod( 'bottom_listborder', '#1c2123' ); ?>;}
			#equal-well a, #equal-well a:visited {color: <?php echo get_theme_mod( 'sidebar_links', '#d2a76a' ); ?>;}
			#equal-well a:hover {color: <?php echo get_theme_mod( 'sidebar_linkshover', '#787c7f' ); ?>;}
			#equal-well .main-menu ul:first-child > li,
			#equal-well .main-menu ul:first-child,
			#equal-well .main-menu .menu ul li,
			#equal-well li {border-color: <?php echo get_theme_mod( 'sidebar_listborders', '#424748' ); ?>;}
			h1, h2, h3, h4, h5, h6 {color: <?php echo get_theme_mod( 'headings', '#3c4243' ); ?>;}
			.entry-title a {color: <?php echo get_theme_mod( 'linked_headings', '#55595b' ); ?>;}
			.entry-title a:hover {color: <?php echo get_theme_mod( 'linked_headingshover', '#d2a76a' ); ?>;}		
			.sidebar-heading {color: <?php echo get_theme_mod( 'sidebar_headings', '#f5f5f5' ); ?>;}
			#social-icons a {color: <?php echo get_theme_mod( 'social_colour', '#c8c8c8' ); ?>;}
			#social-icons a:hover {color: <?php echo get_theme_mod( 'social_hover', '#d2a76a' ); ?>;}
			#socialbar .genericon {background-color: <?php echo get_theme_mod( 'social_bg', '#ededed' ); ?>;}
			.entry-date-box {background-color: <?php echo get_theme_mod( 'post_datebg', '#3d4344' ); ?>;	color: <?php echo get_theme_mod( 'post_date', '#ffffff' ); ?>;}		
			#equal-well nav.main-menu ul li, #equal-well nav.main-menu ul li a, #equal-well nav.main-menu ul li.home.current-menu-item a {color: <?php echo get_theme_mod( 'menu_linkcolour', '#f5f5f5' ); ?>;}
			#equal-well nav.main-menu ul li a:hover {color: <?php echo get_theme_mod( 'menu_linkhover', '#d2a76a' ); ?>;}
			#equal-well .menu-desc {color: <?php echo get_theme_mod( 'menu_desc', '#8f8f93' ); ?>;}
			#equal-well .main-menu .menu ul {background-color:<?php echo get_theme_mod( 'submenu_bg', '#222829' ); ?>;}			
			#equal-well .main-navigation .current-menu-item > a,
			#equal-well .main-navigation .current-menu-ancestor > a,
			#equal-well .main-navigation .current_page_item > a,
			#equal-well .main-navigation .current_page_ancestor > a,
			#equal-well .main-navigation ul.sub-menu li.current-menu-item > a,
			#equal-well .main-navigation ul.sub-menu li.current-menu-ancestor > a,
			#equal-well .main-navigation ul.sub-menu li.current_page_item > a,
			#equal-well .main-navigation ul.sub-menu li.current_page_ancestor > a {
				color:<?php echo get_theme_mod( 'active_menu', '#d2a76a' ); ?>;
			}
	
		</style>
		<?php
	}
	add_action( 'wp_head', 'luminescence_theme_customize_css');
	
/**
 *
 * Load additional functions and theme options
 *
 */
	require ( get_template_directory() . '/includes/theme-customizer.php' );
	require ( get_template_directory() . '/includes/custom-header.php' );
	require ( get_template_directory() . '/includes/widgets.php' );
	require ( get_template_directory() . '/includes/comment-form.php' );
	//require ( get_template_directory() . '/includes/nav-walker.php' );

/**
 * WordPress.com-specific functions and definitions
 */
	require( get_template_directory() . '/includes/wpcom.php' );

/**
* Load Jetpack compatibility file.
*/
	require( get_template_directory() . '/includes/jetpack.php' );