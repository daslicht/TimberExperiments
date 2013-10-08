<?php
require 'ChromePhp.php';
add_theme_support('post-formats');
add_theme_support('post-thumbnails');
add_theme_support('menus');


define('THEME_URL', get_template_directory_uri());

function add_to_context($data){
	/* this is where you can add your own data to Timber's context object */
	$data['foo'] = 'bar';
	return $data;
}
add_filter('timber_context', 'add_to_context');

function add_to_twig($twig){
	/* this is where you can add your own fuctions to twig */
	$twig->addExtension(new Twig_Extension_StringLoader());
	$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
	return $twig;
}
add_filter('get_twig', 'add_to_twig');

function myfoo($text){
	$text .= ' bar!';
	return $text;
}


function load_styles() {
	//wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/lib/normalize.css', array(), '1.00' );
	wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/css/main.min.css', array(), '2.13' );
}
add_action('wp_enqueue_scripts', 'load_styles');



function load_scripts(){
	//wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer ); 
	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/lib/modernizr.full.js', array(),'', false );
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_scripts');


ChromePhp::log('Hello console!');


Timber::add_route('blog/:name', function($params){
    ChromePhp::log('Route Blog Called');

	$query = array(
		"category_name" => $params['name']
	);
	Timber::load_template('index.php', $query);
   /* $context = Timber::get_context();

    $args = 'category_name='.$params['name'];*/

	/*$posts = Timber::get_posts($args);
	$context['posts'] = $posts;

	Timber::render('index.twig', $context);*/

    
   // echo "hallo welt";
});