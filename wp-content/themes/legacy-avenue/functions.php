<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */


require __DIR__ . '/inc/cleanup.php';
require __DIR__ . '/inc/helpers.php';
require __DIR__ . '/inc/menus.php';
require __DIR__ . '/inc/posts.php';
require __DIR__ . '/inc/widgets.php';


// Remove Gutenberg CSS.
add_action('wp_enqueue_scripts', function() {
	// TODO: update this with the brands.css only
	wp_enqueue_style('fontawesome-styles', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
	// wp_enqueue_style('fontawesome-styles', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css');
	// wp_enqueue_style('fontawesome-styles', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css');

	// Remove twentyfifteen funtions.js file
	// wp_dequeue_script('twentyfifteen-script');
	// wp_enqueue_script('legacyavenue-script', get_stylesheet_directory_uri() . '/js/functions.js', $deps = array( 'jquery' ), $ver = '20230401', $in_footer = false );

	wp_enqueue_script( 'legacyavenue-script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery' ), '20230404', true );
	wp_localize_script(
		'legacyavenue-script',
		'screenReaderText',
		array(
			'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen-child' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen-child' ) . '</span>',
		)
	);
}, 20);



// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

