<?php

/**
 * Theme Options and Settings
 *
 * @file           theme-customizer.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0.1
 */
 

 /**
 * Adds the Customize page to the WordPress admin area in the Appearance menu group
 */
function luminescence_customizer_menu() {
    add_theme_page( __( 'Customize Luminescence', 'luminescence' ), __( 'Theme Options', 'luminescence' ), 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'luminescence_customizer_menu' );
 
/**
 * Lets create a customizable theme and begin with some pre-setup
 */ 
 
	add_action('customize_register', 'luminescence_theme_customize');
	function luminescence_theme_customize($wp_customize) {

// Lets remove the default background colour so we can move it with a new setting
	$wp_customize->remove_setting( 'background_color');
	$wp_customize->remove_control( 'background_color');

/**
 * Lets add a logo to our Title and Tagline group
 */
	// Setting group for selecting logo title
	$wp_customize->add_setting( 'logo_style', array(
		'default' => 'default',
		'sanitize_callback' => 'luminescence_sanitize_logo_style',
	) );
			
	$wp_customize->add_control( 'logo_style', array(
    'label'   => __( 'Logo Style', 'luminescence' ),
    'section' => 'title_tagline',
	'priority' => 1,
    'type'    => 'radio',
        'choices' => array(
            'default' => __( 'Default Logo', 'luminescence' ),
            'custom' => __( 'Your Logo', 'luminescence' ),
            'logotext' => __( 'Logo with Title and Tagline', 'luminescence' ),
			'text' => __( 'Text Title', 'luminescence' ),
        ),
    ));
	
	// Setting group for uploading logo
    $wp_customize->add_setting('my_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
		'sanitize_callback' => '',
    ));
	
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'my_logo', array(
        'label'    => __('Your Logo', 'luminescence'),
        'section'  => 'title_tagline',
        'settings' => 'my_logo',
		'priority' => 2,
    ))); 

 	// sidebar site title
	$wp_customize->add_setting( 'sidebar_sitetitle', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_sitetitle', array(
		'label'   => __( 'Sidebar Site Title', 'luminescence' ),
		'section' => 'title_tagline',
		'settings'   => 'sidebar_sitetitle',
		'priority' => 3,			
	) ) );

 	// sidebar tagline
	$wp_customize->add_setting( 'sidebar_tagline', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_tagline', array(
		'label'   => __( 'Sidebar Tagline', 'luminescence' ),
		'section' => 'title_tagline',
		'settings'   => 'sidebar_tagline',
		'priority' => 4,			
	) ) );
	 
	 
	 
 	// mobile site title
	$wp_customize->add_setting( 'mobile_sitetitle', array(
		'default'        => '#3c4243',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_sitetitle', array(
		'label'   => __( 'Mobile View Site Title', 'luminescence' ),
		'section' => 'title_tagline',
		'settings'   => 'mobile_sitetitle',
		'priority' => 5,			
	) ) );

 	// mobile tagline
	$wp_customize->add_setting( 'mobile_tagline', array(
		'default'        => '#3c4243',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_tagline', array(
		'label'   => __( 'Mobile View Tagline', 'luminescence' ),
		'section' => 'title_tagline',
		'settings'   => 'mobile_tagline',
		'priority' => 6,			
	) ) );	 

	 
/**
 * This is a custom section called basic settings
 * which contains different options such as layouts
 */
	$wp_customize->add_section( 'basic_settings', array(
		'title'          => __( 'Basic Settings', 'luminescence' ),
		'priority'       => 25,
	) );
	
// Setting for blog layout
	$wp_customize->add_setting( 'blog_layout', array(
		'default' => 'leftcolumn',
		'sanitize_callback' => 'luminescence_sanitize_layout',
	) );
// Control for blog layout	
	$wp_customize->add_control( 'blog_layout', array(
    'label'   => __( 'Blog Sidebar Column', 'luminescence' ),
    'section' => 'basic_settings',
    'type'    => 'radio',
        'choices' => array(
            'leftcolumn' => __( 'Left Column', 'luminescence' ),
            'rightcolumn' => __( 'Right Column', 'luminescence' ),
        ),
    ));

// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'luminescence_sanitize_text',
	) );
	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright', 'preference' ),
		'section'  => 'basic_settings',
		'type'     => 'text',
	) );
		
/**
 * This is a WordPress section called colors
 * Lets add more options to Colours
 */
 
	// sidebar background
	$wp_customize->add_setting( 'sidebar_bg', array(
		'default'        => '#1c2123',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg', array(
		'label'   => __( 'Sidebar Background', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'sidebar_bg',
		'priority' => 1,			
	) ) );
	
	// sidebar inner background
	$wp_customize->add_setting( 'sidebar_inner', array(
		'default'        => '#23292a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_inner', array(
		'label'   => __( 'Sidebar Inner Background', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'sidebar_inner',
		'priority' => 2,			
	) ) );	

	// sidebar list border colour
	$wp_customize->add_setting( 'sidebar_listborders', array(
		'default'        => '#424748',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_listborders', array(
		'label'   => __( 'Sidebar List Borders', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'sidebar_listborders',
		'priority' => 4,			
	) ) );
		
	// main content background
	$wp_customize->add_setting( 'content_bg', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_bg', array(
		'label'   => __( 'Content Background', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'content_bg',
		'priority' => 5,			
	) ) );

	// bottom background
	$wp_customize->add_setting( 'bottom_bg', array(
		'default'        => '#000000',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_bg', array(
		'label'   => __( 'Bottom Background', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'bottom_bg',
		'priority' => 7,			
	) ) );
	
	// post date
	$wp_customize->add_setting( 'post_date', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_date', array(
		'label'   => __( 'Post Date', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'post_date',
		'priority' => 9,			
	) ) );

	// post date background
	$wp_customize->add_setting( 'post_datebg', array(
		'default'        => '#3d4344',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_datebg', array(
		'label'   => __( 'Post Date Bakcground', 'luminescence' ),
		'section' => 'colors',
		'settings'   => 'post_datebg',
		'priority' => 10,			
	) ) );

/**
 * This is a custom section called Headings, text, and links
 * which contains settings for managing headings
 */
	$wp_customize->add_section( 'text', array(
		'title'          => __( 'Headings, Text, and Links', 'luminescence' ),
		'priority'       => 45,
	) );

	// headings colour
	$wp_customize->add_setting( 'headings', array(
		'default'        => '#3c4243',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headings', array(
		'label'   => __( 'Headings', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'headings',	
		'priority' => 1,		
	) ) );
	
	// linked headings colour
	$wp_customize->add_setting( 'linked_headings', array(
		'default'        => '#3c4243',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linked_headings', array(
		'label'   => __( 'Linked Headings', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'linked_headings',
		'priority' => 2,			
	) ) );	

	// linked headings hover colour
	$wp_customize->add_setting( 'linked_headingshover', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'linked_headingshover', array(
		'label'   => __( 'Linked Headings Hover', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'linked_headingshover',	
		'priority' => 3,		
	) ) );
	
	// sidebar headings colour
	$wp_customize->add_setting( 'sidebar_headings', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_headings', array(
		'label'   => __( 'Sidebar Headings', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'sidebar_headings',
		'priority' => 4,			
	) ) );

	// sidebar text colour
	$wp_customize->add_setting( 'sidebar_text', array(
		'default'        => '#dbdbdb',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text', array(
		'label'   => __( 'Sidebar Text Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'sidebar_text',
		'priority' => 5,			
	) ) );	
	
	// main content text
	$wp_customize->add_setting( 'page_text', array(
		'default'        => '#787c7f',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_text', array(
		'label'   => __( 'Page Text', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'page_text',
		'priority' => 6,			
	) ) );
		
	// bottom text
	$wp_customize->add_setting( 'bottom_text', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_text', array(
		'label'   => __( 'Bottom Text', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'bottom_text',
		'priority' => 7,			
	) ) );	
	
	// page links
	$wp_customize->add_setting( 'page_links', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_links', array(
		'label'   => __( 'Page Link Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'page_links',
		'priority' => 8,			
	) ) );	
 
	// page link hover
	$wp_customize->add_setting( 'page_linkshover', array(
		'default'        => '#787c7f',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_linkshover', array(
		'label'   => __( 'Page Links Hover Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'page_linkshover',
		'priority' => 9,			
	) ) );

	// sidebar links
	$wp_customize->add_setting( 'sidebar_links', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_links', array(
		'label'   => __( 'Sidebar Link Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'sidebar_links',
		'priority' => 10,			
	) ) );	 	

	// sidebar link hover 
	$wp_customize->add_setting( 'sidebar_linkshover', array(
		'default'        => '#787c7f',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_linkshover', array(
		'label'   => __( 'Sidebar Link Hover Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'sidebar_linkshover',
		'priority' => 11,			
	) ) );	
	
	// Bottom links 
	$wp_customize->add_setting( 'bottom_links', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_links', array(
		'label'   => __( 'Bottom Link Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'bottom_links',
		'priority' => 12,			
	) ) );		

	// Bottom link hover
	$wp_customize->add_setting( 'bottom_linkshover', array(
		'default'        => '#cccccc',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_linkshover', array(
		'label'   => __( 'Bottom Link Hover Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'bottom_linkshover',
		'priority' => 13,			
	) ) );
	
	// Bottom list border
	$wp_customize->add_setting( 'bottom_listborder', array(
		'default'        => '#1c2123',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bottom_listborder', array(
		'label'   => __( 'Bottom List Border', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'bottom_listborder',
		'priority' => 14,			
	) ) );
	
	// footer text
	$wp_customize->add_setting( 'footer_text', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'   => __( 'Footer Text', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'footer_text',
		'priority' => 15,			
	) ) );	
	
	// footer links
	$wp_customize->add_setting( 'footer_link', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link', array(
		'label'   => __( 'Footer Link Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'footer_link',
		'priority' => 16,			
	) ) );		
	
	// footer link hover colour
	$wp_customize->add_setting( 'footer_linkhover', array(
		'default'        => '#abb3b4',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_linkhover', array(
		'label'   => __( 'Footer Link Hover Colour', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'footer_linkhover',
		'priority' => 17,			
	) ) );

	// copyright text
	$wp_customize->add_setting( 'copyright_text', array(
		'default'        => '#787c7f',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text', array(
		'label'   => __( 'Copyright Text', 'luminescence' ),
		'section' => 'text',
		'settings'   => 'copyright_text',
		'priority' => 18,			
	) ) );
						
/**
 * This is a custom section called Social Networking
 * which contains settings for social networking icons and links
 */
	$wp_customize->add_section( 'social_networking', array(
		'title'          => __( 'Social Networking', 'luminescence' ),
		'priority'       => 50,
	) );


	
// Setting for hiding the social bar	
	$wp_customize->add_setting( 'hide_social', array(
		'sanitize_callback' => 'luminescence_sanitize_checkbox',
		) );
	
// Control for hiding the social bar	
	$wp_customize->add_control( 'hide_social', array(
        'label' => __( 'Hide Social Bar', 'luminescence' ),
		'type' => 'checkbox',
		'section' => 'social_networking',
		'priority' => 1,
    ) );

	
// Setting group for Twitter
	$wp_customize->add_setting( 'twitter_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'twitter_uid', array(
		'settings' => 'twitter_uid',
		'label'    => __( 'Twitter', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 2,
	) );	
	
// Setting group for Facebook
	$wp_customize->add_setting( 'facebook_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'facebook_uid', array(
		'settings' => 'facebook_uid',
		'label'    => __( 'Facebook', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 3,
	) );	
	
// Setting group for Google+
	$wp_customize->add_setting( 'google_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'google_uid', array(
		'settings' => 'google_uid',
		'label'    => __( 'Google+', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 4,
	) );	
	
// Setting group for Linkedin
	$wp_customize->add_setting( 'linkedin_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'linkedin_uid', array(
		'settings' => 'linkedin_uid',
		'label'    => __( 'Linkedin', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 5,
	) );	
	
// Setting group for Pinterest
	$wp_customize->add_setting( 'pinterest_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'pinterest_uid', array(
		'settings' => 'pinterest_uid',
		'label'    => __( 'Pinterest', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 6,
	) );

// Setting group for Flickr
	$wp_customize->add_setting( 'flickr_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'flickr_uid', array(
		'settings' => 'flickr_uid',
		'label'    => __( 'Flickr', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 7,
	) );
// Setting group for Youtube
	$wp_customize->add_setting( 'youtube_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'youtube_uid', array(
		'settings' => 'youtube_uid',
		'label'    => __( 'Youtube', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 8,
	) );	
// Setting group for Vimeo
	$wp_customize->add_setting( 'vimeo_uid', array(
		'default'        => '',
		'sanitize_callback' => 'luminescence_sanitize_url',
	) );

	$wp_customize->add_control( 'vimeo_uid', array(
		'settings' => 'vimeo_uid',
		'label'    => __( 'Vimeo', 'luminescence' ),
		'section'  => 'social_networking',
		'type'     => 'text',
		'priority' => 9,
	) );	

	// Social icon colour
	$wp_customize->add_setting( 'social_colour', array(
		'default'        => '#c8c8c8',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_colour', array(
		'label'   => __( 'Social Icon Colour', 'luminescence' ),
		'section' => 'social_networking',
		'settings'   => 'social_colour',
		'priority' => 10,			
	) ) );

	// Social icon colour on hover
	$wp_customize->add_setting( 'social_hover', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_hover', array(
		'label'   => __( 'Social Icon Hover', 'luminescence' ),
		'section' => 'social_networking',
		'settings'   => 'social_hover',
		'priority' => 11,			
	) ) );
	
	// Social icon background
	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '#ededed',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => __( 'Social Icon Background', 'luminescence' ),
		'section' => 'social_networking',
		'settings'   => 'social_bg',
		'priority' => 12,			
	) ) );		

/**
 * This is a WordPress section called nav
 * Lets add more options to nav
 */
	// main menu links
	$wp_customize->add_setting( 'menu_linkcolour', array(
		'default'        => '#f5f5f5',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_linkcolour', array(
		'label'   => __( 'Main Menu Links', 'luminescence' ),
		'section' => 'nav',
		'settings'   => 'menu_linkcolour',
		'priority' => 10,			
	) ) ); 
 
	// main menu link hover
	$wp_customize->add_setting( 'menu_linkhover', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_linkhover', array(
		'label'   => __( 'Main Menu Hover', 'luminescence' ),
		'section' => 'nav',
		'settings'   => 'menu_linkhover',
		'priority' => 11,			
	) ) );
	
	// Main menu link description
	$wp_customize->add_setting( 'menu_desc', array(
		'default'        => '#8f8f93',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_desc', array(
		'label'   => __( 'Main Menu Description', 'luminescence' ),
		'section' => 'nav',
		'settings'   => 'menu_desc',
		'priority' => 12,			
	) ) );	
	
	// submenu background
	$wp_customize->add_setting( 'submenu_bg', array(
		'default'        => '#222829',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bg', array(
		'label'   => __( 'Submenu Background', 'luminescence' ),
		'section' => 'nav',
		'settings'   => 'submenu_bg',
		'priority' => 13,			
	) ) );	

	// active current menu items
	$wp_customize->add_setting( 'active_menu', array(
		'default'        => '#d2a76a',
		'sanitize_callback' => 'luminescence_sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'active_menu', array(
		'label'   => __( 'Active Menu Colour', 'luminescence' ),
		'section' => 'nav',
		'settings'   => 'active_menu',
		'priority' => 14,			
	) ) );	
		
// lets close everything	
}


/**
 * adds sanitization callback function : colors
 * @package Luminescence Lite
 */
	function luminescence_sanitize_hex_color( $color ) {
	if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
		return '#' . $unhashed;

	return $color;
}

/**
 * adds sanitization callback function : text
 * @package Luminescence Lite
 */
function luminescence_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * adds sanitization callback function : url
 * @package Luminescence Lite
 */
	function luminescence_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}

/**
 * adds sanitization callback function : checkbox
 * @package Luminescence Lite
 */
function luminescence_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	

/**
 * adds sanitization callback function for the layout : radio
 * @package Luminescence Lite
 */
function luminescence_sanitize_layout( $input ) {
    $valid = array(
		'leftcolumn' => __( 'Left Column', 'luminescence' ),
        'rightcolumn' => __( 'Right Column', 'luminescence' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}


/**
 * adds sanitization callback function for the logo style : radio
 * @package Luminescence Lite
 */
function luminescence_sanitize_logo_style( $input ) {
    $valid = array(
            'default' => __( 'Default Logo', 'luminescence' ),
            'custom' => __( 'Your Logo', 'luminescence' ),
            'logotext' => __( 'Logo with Title and Tagline', 'luminescence' ),
			'text' => __( 'Text Title', 'luminescence' ),
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}