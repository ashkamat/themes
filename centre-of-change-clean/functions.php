<?php
/**
 * Centre of Change theme functions
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function coc_theme_setup() {
	// Lets WP manage the <title> tag instead of hardcoding it
	add_theme_support( 'title-tag' );

	// Featured images (you'll want these for the blog + team later)
	add_theme_support( 'post-thumbnails' );

	// Register the primary menu — matches your #primary-menu list
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'centreofchange' ),
	) );
}
add_action( 'after_setup_theme', 'coc_theme_setup' );

function coc_enqueue_assets() {
	// Remix icons (CDN, keep as-is)
	wp_enqueue_style( 'remixicon', 'https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css', array(), '4.9.0' );

	// Swiper CSS/JS (CDN, keep as-is)
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12' );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12', true );

	// Your theme's own style.css — this is the one WP tracks by version for cache busting
	wp_enqueue_style( 'coc-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Your main.js, now pulled from the theme folder
	wp_enqueue_script(
		'coc-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'swiper' ), // dependency: main.js runs after swiper loads
		wp_get_theme()->get( 'Version' ),
		true // load in footer
	);
}
add_action( 'wp_enqueue_scripts', 'coc_enqueue_assets' );