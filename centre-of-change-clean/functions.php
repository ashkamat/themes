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



/**
 * Hero Customizer Settings
 */
function coc_customize_register( $wp_customize ) {

    $wp_customize->add_section( 'coc_hero', array(
        'title'    => __( 'Hero Banner', 'centreofchange' ),
        'priority' => 30,
    ) );

    /**
     * Enable Video
     */
    $wp_customize->add_setting( 'hero_enable_video', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ) );

    $wp_customize->add_control( 'hero_enable_video', array(
        'label'   => 'Enable Hero Video',
        'section' => 'coc_hero',
        'type'    => 'checkbox',
    ) );

    /**
     * Poster Image
     */
    $wp_customize->add_setting( 'hero_poster' );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hero_poster',
            array(
                'label'   => 'Hero Poster Image',
                'section' => 'coc_hero',
            )
        )
    );

    /**
     * MP4 Video
     */
    $wp_customize->add_setting( 'hero_video' );

    $wp_customize->add_control(
        new WP_Customize_Media_Control(
            $wp_customize,
            'hero_video',
            array(
                'label'     => 'Hero MP4 Video',
                'section'   => 'coc_hero',
                'mime_type' => 'video',
            )
        )
    );


// h3 first line
	$wp_customize->add_setting( 'hero_h3', array(
    'default' => 'Early Intervention & Economic Prevention',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'hero_h3', array(
    'label'   => 'Hero Small Heading (H3)',
    'section' => 'coc_hero',
    'type'    => 'text',
) );


// big h1 textg
$wp_customize->add_setting( 'hero_h1', array(
    'default' => 'Counselling',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'hero_h1', array(
    'label'   => 'Hero Main Heading (H1)',
    'section' => 'coc_hero',
    'type'    => 'text',
) );

// paragraph

$wp_customize->add_setting( 'hero_h2', array(
    'default' => 'Helping young people and families in Croydon to overcome emotional barriers',
    'sanitize_callback' => 'sanitize_textarea_field',
) );

$wp_customize->add_control( 'hero_h2', array(
    'label'   => 'Hero Description',
    'section' => 'coc_hero',
    'type'    => 'textarea',
) );


// hero cta 1 

$wp_customize->add_setting( 'hero_button1_text', array(
    'default' => 'Counselling',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'hero_button1_text', array(
    'label'   => 'Button 1 Text',
    'section' => 'coc_hero',
    'type'    => 'text',
) );

// hero ct 1 link

$wp_customize->add_setting( 'hero_button1_url', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'hero_button1_url', array(
    'label'   => 'Button 1 URL',
    'section' => 'coc_hero',
    'type'    => 'url',
) );


// hero cta 2

$wp_customize->add_setting( 'hero_button2_text', array(
    'default' => 'Impact Report',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'hero_button2_text', array(
    'label'   => 'Button 2 Text',
    'section' => 'coc_hero',
    'type'    => 'text',
) );


// hero cta 2 link
$wp_customize->add_setting( 'hero_button2_url', array(
    'default' => '#',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'hero_button2_url', array(
    'label'   => 'Button 2 URL',
    'section' => 'coc_hero',
    'type'    => 'url',
) );

}
add_action( 'customize_register', 'coc_customize_register' );



/**
 * Hero Customizer Settings END
 */