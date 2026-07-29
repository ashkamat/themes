<?php
/**
 * Centre of Change theme functions
 */

require_once get_template_directory() . '/coc-team-fields.php';

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
 * Hero / CTA top right Customizer Settings
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


/**
 * Navigation CTA Button
 */
$wp_customize->add_section( 'coc_nav_cta', array(
    'title'    => __( 'Navigation CTA Button', 'centreofchange' ),
    'priority' => 40,
) );


/**
 * Nav CTA Text
 */
$wp_customize->add_setting( 'nav_cta_text', array(
    'default'           => 'Get Support',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'nav_cta_text', array(
    'label'   => 'Button Text',
    'section' => 'coc_nav_cta',
    'type'    => 'text',
) );


/**
 * Nav CTA URL
 */
$wp_customize->add_setting( 'nav_cta_url', array(
    'default'           => '/support',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'nav_cta_url', array(
    'label'   => 'Button URL',
    'section' => 'coc_nav_cta',
    'type'    => 'url',
) );



/**
 * Services Cards
 */
$wp_customize->add_section( 'coc_services_cards', array(
    'title'    => __( 'Services Cards', 'centreofchange' ),
    'priority' => 50,
));


$service_cards = array(
    1 => array(
        'title'    => 'Counselling Services',
        'text'     => 'Tailor-made, bespoke programmes for children, young people, and families. Whether addressing trauma and loss or seeking guidance through life coaching, our qualified professionals provide a safe space to manage well-being positively.',
        'cta_text' => 'Get Support',
        'cta_url'  => '/support',
    ),

    2 => array(
        'title'    => 'Professionals & Referrers',
        'text'     => 'We provide safe, professional pathways for GPs, schools, and multi-agency hubs like Family Justice Centres. We act as a critical downstream partner, offering long-term therapeutic support to reduce pressure on statutory crisis services.',
        'cta_text' => 'Refer Someone',
        'cta_url'  => '/referrals',
    ),

    3 => array(
        'title'    => 'Our Impact & Case Studies',
        'text'     => 'Data is our currency. We demonstrate how our holistic model improves educational attainment and emotional resilience, preventing the long-term economic inactivity often associated with youth mental health challenges in the community.',
        'cta_text' => 'View Impact',
        'cta_url'  => '/impact',
    ),
);


foreach ( $service_cards as $number => $card ) {


    /*
     * Card Title
     */
    $wp_customize->add_setting(
        'service_card_' . $number . '_title',
        array(
            'default'           => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'service_card_' . $number . '_title',
        array(
            'label'   => 'Service Card ' . $number . ' Title',
            'section' => 'coc_services_cards',
            'type'    => 'text',
        )
    );



    /*
     * Card Text
     */
    $wp_customize->add_setting(
        'service_card_' . $number . '_text',
        array(
            'default'           => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );


    $wp_customize->add_control(
        'service_card_' . $number . '_text',
        array(
            'label'   => 'Service Card ' . $number . ' Text',
            'section' => 'coc_services_cards',
            'type'    => 'textarea',
        )
    );



    /*
     * CTA Text
     */
    $wp_customize->add_setting(
        'service_card_' . $number . '_cta_text',
        array(
            'default'           => $card['cta_text'],
            'sanitize_callback' => 'sanitize_text_field',
        )
    );


    $wp_customize->add_control(
        'service_card_' . $number . '_cta_text',
        array(
            'label'   => 'Service Card ' . $number . ' Button Text',
            'section' => 'coc_services_cards',
            'type'    => 'text',
        )
    );



    /*
     * CTA URL
     */
    $wp_customize->add_setting(
        'service_card_' . $number . '_cta_url',
        array(
            'default'           => $card['cta_url'],
            'sanitize_callback' => 'esc_url_raw',
        )
    );


    $wp_customize->add_control(
        'service_card_' . $number . '_cta_url',
        array(
            'label'   => 'Service Card ' . $number . ' Button URL',
            'section' => 'coc_services_cards',
            'type'    => 'url',
        )
    );

}

}
add_action( 'customize_register', 'coc_customize_register' );



/**
 * Hero and CTA Customizer Settings END
 */



/**
 * Disable the WordPress content editor for Pages and Posts
 */
function coc_disable_content_editor() {
    remove_post_type_support( 'page', 'editor' );
    remove_post_type_support( 'post', 'editor' );
}
add_action( 'init', 'coc_disable_content_editor' );