<?php
/**
 * Landscape Gardening functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package landscape_gardening
 */

$landscape_gardening_theme_data = wp_get_theme();
if( ! defined( 'LANDSCAPE_GARDENING_THEME_VERSION' ) ) define ( 'LANDSCAPE_GARDENING_THEME_VERSION', $landscape_gardening_theme_data->get( 'Version' ) );
if( ! defined( 'LANDSCAPE_GARDENING_THEME_NAME' ) ) define( 'LANDSCAPE_GARDENING_THEME_NAME', $landscape_gardening_theme_data->get( 'Name' ) );
if( ! defined( 'LANDSCAPE_GARDENING_THEME_TEXTDOMAIN' ) ) define( 'LANDSCAPE_GARDENING_THEME_TEXTDOMAIN', $landscape_gardening_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'LANDSCAPE_GARDENING_VERSION' ) ) {
	define( 'LANDSCAPE_GARDENING_VERSION', '1.0.0' );
}

if ( ! function_exists( 'landscape_gardening_setup' ) ) :	
	function landscape_gardening_setup() {
		
		load_theme_textdomain( 'landscape-gardening', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'landscape-gardening' ),
				'social'  => esc_html__( 'Social', 'landscape-gardening' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio', 
		) );

		add_theme_support(
			'custom-background',
			apply_filters(
				'landscape_gardening_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( '/resource/css/editor-style.css' );
	
		/*  Demo Import */
		require get_parent_theme_file_path( '/theme-wizard/config.php' );
	}
endif;
add_action( 'after_setup_theme', 'landscape_gardening_setup' );

function landscape_gardening_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'landscape_gardening_content_width', 640 );
}
add_action( 'after_setup_theme', 'landscape_gardening_content_width', 0 );

function landscape_gardening_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'landscape-gardening' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'landscape-gardening' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$landscape_gardening_footer_widget_column = get_theme_mod('landscape_gardening_footer_widget_column','4');
	for ($landscape_gardening_i=1; $landscape_gardening_i<=$landscape_gardening_footer_widget_column; $landscape_gardening_i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'landscape-gardening' )  . $landscape_gardening_i,
			'id' => 'landscape-gardening-footer-widget-' . $landscape_gardening_i,
			'description' => __( 'The Footer Widget Area', 'landscape-gardening' )  . $landscape_gardening_i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'landscape_gardening_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function landscape_gardening_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'landscape-gardening-style', get_template_directory_uri() . '/style.css', array(), LANDSCAPE_GARDENING_VERSION );

	// RTL style.
	wp_style_add_data('landscape-gardening-style', 'rtl', 'replace');

	// Animate CSS
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/resource/css/animate.css' );

	// Navigation script.
	wp_enqueue_script( 'landscape-gardening-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), LANDSCAPE_GARDENING_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'landscape-gardening-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), LANDSCAPE_GARDENING_VERSION, true );
	
	// Wow script.
	wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/resource/js/wow.js', array('jquery'),'' ,true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	// Load the webfont.
	wp_enqueue_style(
		'REM',
		Landscape_Gardening_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=REM:ital,wght@0,100..900;1,100..900&display=swap' ),
		array(),
		'1.0'
	);

	// Load the webfont.
	wp_enqueue_style(
		'Plus Jakarta Sans',
		Landscape_Gardening_wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'landscape_gardening_scripts' );

//Change number of products per page 
add_filter( 'loop_shop_per_page', 'landscape_gardening_products_per_page' );
function landscape_gardening_products_per_page( $cols ) {
  	return  get_theme_mod( 'landscape_gardening_products_per_page',9);
}

// Change number or products per row 
add_filter('loop_shop_columns', 'landscape_gardening_loop_columns');
	if (!function_exists('landscape_gardening_loop_columns')) {
	function landscape_gardening_loop_columns() {
		return get_theme_mod( 'landscape_gardening_products_per_row', 3 );
	}
}

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/theme-library/function-files/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/theme-library/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Customizer Settings Functions
*/
require get_template_directory() . '/theme-library/function-files/customizer-settings-functions.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';

// Enqueue Customizer live preview script
function landscape_gardening_customizer_live_preview() {
    wp_enqueue_script(
        'landscape-gardening-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('jquery', 'customize-preview'),
        '',
        true
    );
}
add_action('customize_preview_init', 'landscape_gardening_customizer_live_preview');

// Featured Image Dimension
function landscape_gardening_blog_post_featured_image_dimension(){
	if(get_theme_mod('landscape_gardening_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );