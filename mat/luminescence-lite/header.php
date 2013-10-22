<?php

/**
 * Header Template
 *
 * @file           header.php
 * @package        Luminescence-Lite 
 * @author         Andre 
 * @copyright      2013 Styledthemes.com
 * @license        license.txt
 * @version        Release: 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper" class="clearfix" style="background-color: <?php echo get_theme_mod( 'content_bg', '#ffffff' ); ?>; color: <?php echo get_theme_mod( 'page_text', '#787c7f' ); ?>;">
	<div class="container-fluid">
		<div class="row-fluid lum-equal-wrap">