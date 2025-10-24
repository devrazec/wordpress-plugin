<?php
/**
 * Forest Eco Nature functions and definitions
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

function forest_eco_nature_setup() {

	load_theme_textdomain( 'forest-eco-nature', get_template_directory() . '/language' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'forest-eco-nature-featured-image', 2000, 1200, true );
	add_image_size( 'forest-eco-nature-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'forest-eco-nature' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', forest_eco_nature_fonts_url() ) );

	add_theme_support( 'custom-header', apply_filters( 'forest_eco_nature_custom_header_args', array(
        'default-text-color' => 'fff',
        'header-text'        => false,
        'width'              => 1600,
        'height'             => 350,
        'flex-width'         => true,
        'flex-height'        => true,
        'wp-head-callback'   => 'forest_eco_nature_header_style',
        'default-image'      => get_template_directory_uri() . '/assets/images/header_img.png',
    ) ) );

	/**
	 * Implement the Custom Header feature.
	 */
	require get_parent_theme_file_path( '/inc/custom-header.php' );


}
add_action( 'after_setup_theme', 'forest_eco_nature_setup' );

/**
 * Register custom fonts.
 */
function forest_eco_nature_fonts_url(){
	$forest_eco_nature_font_url = '';
	$forest_eco_nature_font_family = array();
	$forest_eco_nature_font_family[] = 'Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Fira Sans Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$forest_eco_nature_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Bad Script';
	$forest_eco_nature_font_family[] = 'Bebas Neue';
	$forest_eco_nature_font_family[] = 'Fjalla One';
	$forest_eco_nature_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$forest_eco_nature_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Alex Brush';
	$forest_eco_nature_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Playball';
	$forest_eco_nature_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Julius Sans One';
	$forest_eco_nature_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Slabo 13px';
	$forest_eco_nature_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$forest_eco_nature_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$forest_eco_nature_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$forest_eco_nature_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$forest_eco_nature_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$forest_eco_nature_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$forest_eco_nature_font_family[] = 'Padauk:wght@400;700';
	$forest_eco_nature_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$forest_eco_nature_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$forest_eco_nature_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$forest_eco_nature_font_family[] = 'Pacifico';
	$forest_eco_nature_font_family[] = 'Indie Flower';
	$forest_eco_nature_font_family[] = 'VT323';
	$forest_eco_nature_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$forest_eco_nature_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$forest_eco_nature_font_family[] = 'Fjalla One';
	$forest_eco_nature_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Oxygen:wght@300;400;700';
	$forest_eco_nature_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Lobster';
	$forest_eco_nature_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$forest_eco_nature_font_family[] = 'Anton';
	$forest_eco_nature_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$forest_eco_nature_font_family[] = 'Bree Serif';
	$forest_eco_nature_font_family[] = 'Gloria Hallelujah';
	$forest_eco_nature_font_family[] = 'Abril Fatface';
	$forest_eco_nature_font_family[] = 'Varela Round';
	$forest_eco_nature_font_family[] = 'Vampiro One';
	$forest_eco_nature_font_family[] = 'Shadows Into Light';
	$forest_eco_nature_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$forest_eco_nature_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Francois One';
	$forest_eco_nature_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$forest_eco_nature_font_family[] = 'Patua One';
	$forest_eco_nature_font_family[] = 'Acme';
	$forest_eco_nature_font_family[] = 'Satisfy';
	$forest_eco_nature_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Architects Daughter';
	$forest_eco_nature_font_family[] = 'Russo One';
	$forest_eco_nature_font_family[] = 'Monda:wght@400;700';
	$forest_eco_nature_font_family[] = 'Righteous';
	$forest_eco_nature_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Hammersmith One';
	$forest_eco_nature_font_family[] = 'Courgette';
	$forest_eco_nature_font_family[] = 'Permanent Marke';
	$forest_eco_nature_font_family[] = 'Cherry Swash:wght@400;700';
	$forest_eco_nature_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$forest_eco_nature_font_family[] = 'Poiret One';
	$forest_eco_nature_font_family[] = 'BenchNine:wght@300;400;700';
	$forest_eco_nature_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Handlee';
	$forest_eco_nature_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$forest_eco_nature_font_family[] = 'Alfa Slab One';
	$forest_eco_nature_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Cookie';
	$forest_eco_nature_font_family[] = 'Chewy';
	$forest_eco_nature_font_family[] = 'Great Vibes';
	$forest_eco_nature_font_family[] = 'Coming Soon';
	$forest_eco_nature_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Days One';
	$forest_eco_nature_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Shrikhand';
	$forest_eco_nature_font_family[] = 'Tangerine:wght@400;700';
	$forest_eco_nature_font_family[] = 'IM Fell English SC';
	$forest_eco_nature_font_family[] = 'Boogaloo';
	$forest_eco_nature_font_family[] = 'Bangers';
	$forest_eco_nature_font_family[] = 'Fredoka One';
	$forest_eco_nature_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$forest_eco_nature_font_family[] = 'Shadows Into Light Two';
	$forest_eco_nature_font_family[] = 'Marck Script';
	$forest_eco_nature_font_family[] = 'Sacramento';
	$forest_eco_nature_font_family[] = 'Unica One';
	$forest_eco_nature_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$forest_eco_nature_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$forest_eco_nature_font_family[] = 'DM Serif Display:ital@0;1';
	$forest_eco_nature_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	
	$forest_eco_nature_query_args = array(
		'family'	=> rawurlencode(implode('|',$forest_eco_nature_font_family)),
	);
	$forest_eco_nature_font_url = add_query_arg($forest_eco_nature_query_args,'//fonts.googleapis.com/css');
	return $forest_eco_nature_font_url;
	$contents = forest_eco_nature_wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Register widget area.
 */
function forest_eco_nature_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'forest-eco-nature' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'forest-eco-nature' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'forest-eco-nature' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'forest-eco-nature' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'forest-eco-nature' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'forest-eco-nature' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'forest-eco-nature' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'forest-eco-nature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'forest_eco_nature_widgets_init' );

// Category count 
function forest_eco_nature_display_post_category_count() {
    $forest_eco_nature_category = get_the_category();
    $forest_eco_nature_category_count = ($forest_eco_nature_category) ? count($forest_eco_nature_category) : 0;
    $forest_eco_nature_category_text = ($forest_eco_nature_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $forest_eco_nature_category_count . ' ' . $forest_eco_nature_category_text;
}

//post tag
function custom_tags_filter($forest_eco_nature_tag_list) {
    // Replace the comma (,) with an empty string
    $forest_eco_nature_tag_list = str_replace(', ', '', $forest_eco_nature_tag_list);

    return $forest_eco_nature_tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $forest_eco_nature_tags = get_the_tags();

    if ($forest_eco_nature_tags) {
        $forest_eco_nature_tags_output = '<div class="post_tag">Tags: ';
        $forest_eco_nature_first_tag = reset($forest_eco_nature_tags);
        foreach ($forest_eco_nature_tags as $tag) {
            $forest_eco_nature_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $forest_eco_nature_first_tag) {
                $forest_eco_nature_tags_output .= ' ';
            }
        }
        $forest_eco_nature_tags_output .= '</div>';
        echo $forest_eco_nature_tags_output;
    }
}
/**
 * Enqueue scripts and styles.
 */
function forest_eco_nature_scripts() {
    $forest_eco_nature_tp_theme_css = ''; // Define the variable

    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('forest-eco-nature-fonts', forest_eco_nature_fonts_url(), array(), null);

    // Bootstrap
    wp_enqueue_style('bootstrap-css', get_theme_file_uri('/assets/css/bootstrap.css'));

    // Theme stylesheet.
    wp_enqueue_style('forest-eco-nature-style', get_stylesheet_uri());

    // Theme stylesheet.
	wp_enqueue_style( 'forest-eco-nature-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'forest-eco-nature-style',$forest_eco_nature_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'forest-eco-nature-style',$forest_eco_nature_tp_theme_css );
	wp_style_add_data('forest-eco-nature-style', 'rtl', 'replace');

    // Theme block stylesheet.
    wp_enqueue_style('forest-eco-nature-block-style', get_theme_file_uri('/assets/css/blocks.css'), array('forest-eco-nature-style'), '1.0');

    // Fontawesome
    wp_enqueue_style('fontawesome-css', get_theme_file_uri('/assets/css/fontawesome-all.css'));

    // Bootstrap JavaScript
    wp_enqueue_script('bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.js'), array('jquery'), true);

    // Custom JavaScript
    wp_enqueue_script('forest-eco-nature-custom-scripts', get_template_directory_uri() . '/assets/js/forest-eco-nature-custom.js', array('jquery'), true);

    // Focus Nav JavaScript
    wp_enqueue_script('forest-eco-nature-focus-nav', get_template_directory_uri() . '/assets/js/focus-nav.js', array('jquery'), true);

    // If comments are open and we have at least one comment, load comment reply script.
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'forest_eco_nature_scripts');


//Admin Enqueue for Admin
function forest_eco_nature_admin_enqueue_scripts(){
	wp_enqueue_style('forest-eco-nature-admin-style', get_template_directory_uri() . '/assets/css/admin.css');

	wp_enqueue_script( 'forest-eco-nature-custom-scripts', get_template_directory_uri(). '/assets/js/forest-eco-nature-custom.js', array('jquery'), true);

	wp_register_script( 'forest-eco-nature-admin-script', get_template_directory_uri() . '/assets/js/forest-eco-nature-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'forest-eco-nature-admin-script',
		'forest_eco_nature',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('forest_eco_nature_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('forest-eco-nature-admin-script');

    wp_localize_script( 'forest-eco-nature-admin-script', 'forest_eco_nature_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'forest_eco_nature_admin_enqueue_scripts' );

/*radio button sanitization*/
function forest_eco_nature_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function forest_eco_nature_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Sanitize Sortable control.
function forest_eco_nature_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

function forest_eco_nature_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'forest_eco_nature_loop_columns');
if (!function_exists('forest_eco_nature_loop_columns')) {
	function forest_eco_nature_loop_columns() {
		$forest_eco_nature_columns = get_theme_mod( 'forest_eco_nature_per_columns', 3 );
		return $forest_eco_nature_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'forest_eco_nature_per_page', 20 );
function forest_eco_nature_per_page( $forest_eco_nature_cols ) {
  	$forest_eco_nature_cols = get_theme_mod( 'forest_eco_nature_product_per_page', 9 );
	return $forest_eco_nature_cols;
}

function forest_eco_nature_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function forest_eco_nature_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function forest_eco_nature_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string);
    return implode(' ', array_slice($words, 0, $word_limit));
}

function forest_eco_nature_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function forest_eco_nature_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','forest_eco_nature_front_page_template' );

add_action( 'wp_ajax_forest_eco_nature_dismissed_notice_handler', 'forest_eco_nature_ajax_notice_handler' );

function forest_eco_nature_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'forest_eco_nature_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function forest_eco_nature_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="forest-eco-nature-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="forest-eco-nature-getting-started-notice clearfix">
        	<div class="row-top">
	            <div class="forest-eco-nature-theme-notice-content">
	                <h2 class="forest-eco-nature-notice-h2">
	                    <?php
	                printf(
	                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
	                    esc_html__( 'Install the Demo Import Plugin now to instantly set up your site like the live preview.', 'forest-eco-nature' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
	                ?>
	                </h2>
	                <a class="forest-eco-nature-btn-get-started button button-primary button-hero forest-eco-nature-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=forest-eco-nature-about' )); ?>" ><?php esc_html_e( 'Get Started with Forest Eco Nature', 'forest-eco-nature' ) ?></a>
	            </div>
	            <div class="image-box">
			    	<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/theme-notice.png' ); ?>" alt="<?php echo esc_attr__( 'Forest Eco Nature', 'forest-eco-nature' ); ?>" />
				</div>
	        </div>
        </div>
    </div>
<?php }

}
add_action( 'admin_notices', 'forest_eco_nature_activation_notice' );

add_action('after_switch_theme', 'forest_eco_nature_setup_options');
function forest_eco_nature_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

/**
 * Logo Custamization.
 */

function forest_eco_nature_logo_width(){

	$forest_eco_nature_logo_width   = get_theme_mod( 'forest_eco_nature_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $forest_eco_nature_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'forest_eco_nature_logo_width' );

function forest_eco_nature_theme_setup() {

	define('FOREST_ECO_NATURE_CREDIT',__('https://www.themespride.com/products/free-eco-nature-wordpress-theme','forest-eco-nature') );
	if ( ! function_exists( 'pharmacy_shop_credit' ) ) {
		function forest_eco_nature_credit(){
			echo "<a href=".esc_url(FOREST_ECO_NATURE_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('forest_eco_nature_footer_text',__('Carpenter Workshop WordPress Theme','forest-eco-nature')))."</a>";
		}
	}

	/**
	 * Custom template tags for this theme.
	 */
	require get_parent_theme_file_path( '/inc/template-tags.php' );

	/**
	 * Additional features to allow styling of the templates.
	 */
	require get_parent_theme_file_path( '/inc/template-functions.php' );

	/**
	 * About Theme Page
	 */
	require get_parent_theme_file_path( '/inc/about-theme.php' );

	/**
	 * Customizer additions.
	 */
	require get_parent_theme_file_path( '/inc/customizer.php' );
	/**
	 * Load Theme Web File
	 */
	require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
	/**
	 * Load Toggle file
	 */
	require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

	/**
	 * load sortable file
	 */
	require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

	/**
	 * TGM Recommendation
	 */
	require get_parent_theme_file_path( '/inc/TGM/tgm.php' );

}
add_action( 'after_setup_theme', 'forest_eco_nature_theme_setup' );