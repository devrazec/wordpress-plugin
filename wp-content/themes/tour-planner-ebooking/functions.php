<?php
/**
 * Tour Planner eBooking functions and definitions
 *
 * @package tour-planner-ebooking
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function tour_planner_ebooking_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if (!function_exists('tour_planner_ebooking_setup')):

function tour_planner_ebooking_setup() {

	$GLOBALS['content_width'] = apply_filters('tour_planner_ebooking_content_width', 640);
    load_theme_textdomain( 'tour-planner-ebooking', get_template_directory() . '/languages' );
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' ); 
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height'      => 50,
		'width'       => 70,
		'flex-width'  => true,
		'flex-height' => true,
	));
	add_image_size('tour-planner-ebooking-homepage-thumb', 250, 145, true);
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'tour-planner-ebooking'),
	));

	add_theme_support('custom-background', array(
		'default-color' => 'f1f1f1',
	));
	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );


	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style(array('css/editor-style.css', tour_planner_ebooking_font_url()));

	// Theme Activation Notice
	global $pagenow;
	
	if (
		is_admin()
		&&
		('themes.php' == $pagenow)
		// &&
		// isset( $_GET['activated'] )
	) {
		add_action('admin_notices', 'tour_planner_ebooking_activation_notice');
	}
}
endif;
add_action('after_setup_theme', 'tour_planner_ebooking_setup');

// Dashboard Theme Notification   
function tour_planner_ebooking_activation_notice() {
	$tour_planner_ebooking_meta = get_option( 'tour_planner_ebooking_admin_notice' );

	if (!$tour_planner_ebooking_meta) {
	echo '<div id="tour-planner-ebooking-welcome-notice" class="notice is-dismissible tour-planner-ebooking-notice">';
		echo '<div class="tour-planner-ebooking-banner">';
			echo '<div class="tour-planner-ebooking-text">';
				echo '<h2>' . esc_html__( 'Thanks For Installing the "Tour Planner EBooking" Theme !', 'tour-planner-ebooking' ) . '</h2>';
				echo '<p>' . esc_html__( 'We’re excited to help you get started with your new theme! Set up your website quickly and easily by importing our demo content and customizing it to suit your needs.', 'tour-planner-ebooking' ) . '</p>';
				echo '<div class="tour-planner-ebooking-buttons">';
					echo '<a href="' . esc_url( admin_url( 'themes.php?page=tour_planner_ebooking_guide' ) ) . '">' . esc_html__( 'Demo Import', 'tour-planner-ebooking' ) . '</a>';
					echo '<a href="'. esc_url( 'https://preview.themescaliber.com/doc/travel-ebooking/' ) .'" target=_blank>' . esc_html__( 'Documentation', 'tour-planner-ebooking' ) . '</a>';
					echo '<a href="'. esc_url( 'https://www.themescaliber.com/products/tour-booking-wordpress-theme' ) .'" target=_blank>' . esc_html__( 'Get Premium', 'tour-planner-ebooking' ) . '</a>';
					echo '<a class="bundle_btn" href="'. esc_url( 'https://www.themescaliber.com/products/wordpress-theme-bundle' ) .'" target=_blank>' . esc_html__( 'Bundle of 220+ Themes at $99', 'tour-planner-ebooking' ) . '</a>';
				echo '</div>';
			echo '</div>';
			echo '<div class="tour-planner-ebooking-image">';
				echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/demo-preview.png">';
			echo '</div>';
		echo '</div>';
    echo '</div>';
}
}


// Theme Widgets Setup
function tour_planner_ebooking_widgets_init() {
	register_sidebar(array(
		'name'          => __('Blog Sidebar', 'tour-planner-ebooking'),
		'description'   => __('Appears on blog page sidebar', 'tour-planner-ebooking'),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Page Sidebar', 'tour-planner-ebooking'),
		'description'   => __('Appears on page sidebar', 'tour-planner-ebooking'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Third Column Sidebar', 'tour-planner-ebooking'),
		'description'   => __('Appears on page sidebar', 'tour-planner-ebooking'),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	//Footer widget areas
	$tour_planner_ebooking_widget_areas = get_theme_mod('tour_planner_ebooking_footer_widget_areas', '4');
	for ($i=1; $i<=$tour_planner_ebooking_widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Nav', 'tour-planner-ebooking' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'tour-planner-ebooking' ),
		'description'   => __( 'Appears on shop page', 'tour-planner-ebooking' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'tour-planner-ebooking' ),
		'description'   => __( 'Appears on shop page', 'tour-planner-ebooking' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action('widgets_init', 'tour_planner_ebooking_widgets_init');

// edit link
if (!function_exists('tour_planner_ebooking_edit_link')) :
function tour_planner_ebooking_edit_link($view = 'default'){
    global $post;
    edit_post_link(
        sprintf(
            wp_kses(
                __('Edit <span class="screen-reader-text">%s</span>', 'tour-planner-ebooking'),
                array(
                    'span' => array(
                    'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link"><i class="fas fa-edit"></i>',
        '</span>'
    );
}
endif;

/* Theme Font URL */
function tour_planner_ebooking_font_url(){
	$font_family = array(
		'ABeeZee',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Playball',
		'Alegreya Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
		'Julius Sans One',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Slabo 27px',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300;400;500;600;700',
		'Padauk:wght@400;700',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Pacifico',
		'Indie Flower',
		'VT323',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Fjalla One',
		'Oxygen:wght@300;400;700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Lobster',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',	
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Anton',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Bree Serif',
		'Gloria Hallelujah',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Abril Fatface',
		'Varela Round',
		'Vampiro One',
		'Shadows Into Light',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Rokkitt',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Francois One',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Acme',
		'Satisfy',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Architects Daughter',
		'Russo One',
		'Monda:wght@400;700',
		'Righteous',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Hammersmith One',
		'Courgette',
		'Permanent Marker',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Poiret One',
		'BenchNine:wght@300;400;700',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Handlee',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Cookie',
		'Chewy',
		'Great Vibes',
		'Coming Soon',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Days One',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Shrikhand',
		'Tangerine',
		'IM Fell English SC',
		'Boogaloo',
		'Bangers',
		'Fredoka One',
		'Bad Script',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Shadows Into Light Two',
		'Marck Script',
		'Unica One',
		'Noto Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Outfit:wght@100..900'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

//Display the related posts
if ( ! function_exists( 'tour_planner_ebooking_related_posts' ) ) {
	function tour_planner_ebooking_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'tour_planner_ebooking_related_posts_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'tour_planner_ebooking_related_posts_taxanomies_options', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'tour_planner_ebooking_related_posts_taxanomies_options', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

// radio button sanitization
function tour_planner_ebooking_sanitize_choices($input, $setting) {
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}

function tour_planner_ebooking_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function tour_planner_ebooking_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function tour_planner_ebooking_sanitize_number_range( $number, $setting ) {
	$number = absint( $number );
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Excerpt Limit Begin
function tour_planner_ebooking_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tour_planner_ebooking_loop_columns');
if (!function_exists('tour_planner_ebooking_loop_columns')) {
	function tour_planner_ebooking_loop_columns() {
		$tour_planner_ebooking_columns = get_theme_mod( 'tour_planner_ebooking_wooproducts_per_columns', 4 );
		return $tour_planner_ebooking_columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'tour_planner_ebooking_shop_per_page', 20 );
function tour_planner_ebooking_shop_per_page( $cols ) {
  	$tour_planner_ebooking_cols = get_theme_mod( 'tour_planner_ebooking_wooproducts_per_page', 9 );
	return $tour_planner_ebooking_cols;
}

// Theme enqueue scripts
function tour_planner_ebooking_scripts() {
	wp_enqueue_style('tour-planner-ebooking-font', tour_planner_ebooking_font_url(), array());
	// blocks-css
	wp_enqueue_style( 'tour-planner-ebooking-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('tour-planner-ebooking-basic-style', get_stylesheet_uri());
	wp_enqueue_style('tour-planner-ebooking-customcss', get_template_directory_uri().'/css/custom.css');
	wp_enqueue_style('font-awesome-style', get_template_directory_uri().'/css/fontawesome-all.css');
	wp_style_add_data('tour-planner-ebooking-basic-style', 'rtl', 'replace');
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/css/animate.css' );
	wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/js/wow.js', array('jquery'),'' ,true );

	// Paragraph
    $tour_planner_ebooking_paragraph_color = get_theme_mod('tour_planner_ebooking_paragraph_color', '');
    $tour_planner_ebooking_paragraph_font_family = get_theme_mod('tour_planner_ebooking_paragraph_font_family', '');
    $tour_planner_ebooking_paragraph_font_size = get_theme_mod('tour_planner_ebooking_paragraph_font_size', '');
	// "a" tag
	$tour_planner_ebooking_atag_color = get_theme_mod('tour_planner_ebooking_atag_color', '');
    $tour_planner_ebooking_atag_font_family = get_theme_mod('tour_planner_ebooking_atag_font_family', '');
	// "li" tag
	$tour_planner_ebooking_li_color = get_theme_mod('tour_planner_ebooking_li_color', '');
    $tour_planner_ebooking_li_font_family = get_theme_mod('tour_planner_ebooking_li_font_family', '');
	// H1
	$tour_planner_ebooking_h1_color = get_theme_mod('tour_planner_ebooking_h1_color', '');
    $tour_planner_ebooking_h1_font_family = get_theme_mod('tour_planner_ebooking_h1_font_family', '');
    $tour_planner_ebooking_h1_font_size = get_theme_mod('tour_planner_ebooking_h1_font_size', '');
	// H2
	$tour_planner_ebooking_h2_color = get_theme_mod('tour_planner_ebooking_h2_color', '');
    $tour_planner_ebooking_h2_font_family = get_theme_mod('tour_planner_ebooking_h2_font_family', '');
    $tour_planner_ebooking_h2_font_size = get_theme_mod('tour_planner_ebooking_h2_font_size', '');
	// H3
	$tour_planner_ebooking_h3_color = get_theme_mod('tour_planner_ebooking_h3_color', '');
    $tour_planner_ebooking_h3_font_family = get_theme_mod('tour_planner_ebooking_h3_font_family', '');
    $tour_planner_ebooking_h3_font_size = get_theme_mod('tour_planner_ebooking_h3_font_size', '');
	// H4
	$tour_planner_ebooking_h4_color = get_theme_mod('tour_planner_ebooking_h4_color', '');
    $tour_planner_ebooking_h4_font_family = get_theme_mod('tour_planner_ebooking_h4_font_family', '');
    $tour_planner_ebooking_h4_font_size = get_theme_mod('tour_planner_ebooking_h4_font_size', '');
	// H5
	$tour_planner_ebooking_h5_color = get_theme_mod('tour_planner_ebooking_h5_color', '');
    $tour_planner_ebooking_h5_font_family = get_theme_mod('tour_planner_ebooking_h5_font_family', '');
    $tour_planner_ebooking_h5_font_size = get_theme_mod('tour_planner_ebooking_h5_font_size', '');
	// H6
	$tour_planner_ebooking_h6_color = get_theme_mod('tour_planner_ebooking_h6_color', '');
    $tour_planner_ebooking_h6_font_family = get_theme_mod('tour_planner_ebooking_h6_font_family', '');
    $tour_planner_ebooking_h6_font_size = get_theme_mod('tour_planner_ebooking_h6_font_size', '');

	$tour_planner_ebooking_custom_css ='
		p,span{
		    color:'.esc_html($tour_planner_ebooking_paragraph_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_paragraph_font_family).';
		    font-size: '.esc_html($tour_planner_ebooking_paragraph_font_size).';
		}
		a{
		    color:'.esc_html($tour_planner_ebooking_atag_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_atag_font_family).';
		}
		li{
		    color:'.esc_html($tour_planner_ebooking_li_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_li_font_family).';
		}
		h1{
		    color:'.esc_html($tour_planner_ebooking_h1_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h1_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_html($tour_planner_ebooking_h2_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h2_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_html($tour_planner_ebooking_h3_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h3_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_html($tour_planner_ebooking_h4_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h4_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_html($tour_planner_ebooking_h5_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h5_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_html($tour_planner_ebooking_h6_color).'!important;
		    font-family: '.esc_html($tour_planner_ebooking_h6_font_family).'!important;
		    font-size: '.esc_html($tour_planner_ebooking_h6_font_size).'!important;
		}
	';
	wp_add_inline_style( 'tour-planner-ebooking-basic-style',$tour_planner_ebooking_custom_css );

	wp_enqueue_script('tour-planner-ebooking-customscripts-jquery', get_template_directory_uri().'/js/custom.js', array('jquery'));
	wp_enqueue_script('bootstrap-jquery', get_template_directory_uri().'/js/bootstrap.js', array('jquery'));
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'tour-planner-ebooking-basic-style',$tour_planner_ebooking_custom_css );

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'tour_planner_ebooking_scripts');

function tour_planner_ebooking_links_setup() {

	define('TOUR_PLANNER_EBOOKING_BUY_NOW',__('https://www.themescaliber.com/products/tour-booking-wordpress-theme','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_LIVE_DEMO',__('https://preview.themescaliber.com/travel-ebooking-pro/','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_PRO_DOC',__('https://preview.themescaliber.com/doc/ts-travel-ebooking-pro/','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_FREE_DOC',__('https://preview.themescaliber.com/doc/travel-ebooking/','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_CONTACT',__('https://wordpress.org/support/theme/tour-planner-ebooking/','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_CREDIT',__('https://www.themescaliber.com/products/tour-planner-ebooking/','tour-planner-ebooking'));
	define('TOUR_PLANNER_EBOOKING_SUPPORT',__('https://wordpress.org/support/theme/tour-planner-ebooking/', 'tour-planner-ebooking'));
	define( 'TOUR_PLANNER_EBOOKING_REVIEW', 'https://wordpress.org/support/theme/tour-planner-ebooking/reviews/' );

	if (!function_exists('tour_planner_ebooking_credit')) {
		function tour_planner_ebooking_credit() {
			echo "<a href=".esc_url(TOUR_PLANNER_EBOOKING_CREDIT)." target='_blank'>".esc_html__('Travel WordPress Theme ', 'tour-planner-ebooking')."</a>";
		}
	}
}
add_action('after_setup_theme', 'tour_planner_ebooking_links_setup');

// Category
function tour_planner_ebooking_taxonomy_add_custom_field() {
    ?>
    <div class="form-field term-image-wrap">
        <label for="cat-image"><?php echo esc_html( 'Image', 'tour-planner-ebooking' ); ?></label>
        <p><a href="#" class="tour_planner_ebooking_upload_image_button button button-secondary"><?php echo esc_html('Upload Image', 'tour-planner-ebooking'); ?></a></p>
        <input type="text" name="category_image" id="cat-image" value="" size="40" />
    </div>
    <?php
}
add_action( 'category_add_form_fields', 'tour_planner_ebooking_taxonomy_add_custom_field', 10, 2 );
 
function tour_planner_ebooking_taxonomy_edit_custom_field($tour_planner_ebooking_term) {
    $tour_planner_ebooking_image = get_term_meta($tour_planner_ebooking_term->tour_planner_ebooking_term_id, 'category_image', true);
    ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="category_image"><?php echo esc_html( 'Image', 'tour-planner-ebooking' ); ?></label></th>
        <td>
            <p><a href="#" class="tour_planner_ebooking_upload_image_button button button-secondary"><?php echo esc_html('Upload Image', 'tour-planner-ebooking'); ?></a></p><br/>
            <input type="text" name="category_image" id="cat-image" value="<?php echo esc_attr($tour_planner_ebooking_image); ?>" size="40" />
        </td>
    </tr>
    <?php
}
add_action( 'category_edit_form_fields', 'tour_planner_ebooking_taxonomy_edit_custom_field', 10, 2 );

function tour_planner_ebooking_include_script() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'tour-planner-ebooking-script', get_stylesheet_directory_uri() . '/js/category.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'tour_planner_ebooking_include_script' );

function tour_planner_ebooking_save_taxonomy_custom_meta_field( $tour_planner_ebooking_term_id ) {
    if ( isset( $_POST['category_image'] ) ) {
        update_term_meta($tour_planner_ebooking_term_id, 'category_image', wp_unslash( $_POST['category_image']));
    }
}  
add_action( 'edited_category', 'tour_planner_ebooking_save_taxonomy_custom_meta_field', 10, 2 );  
add_action( 'create_category', 'tour_planner_ebooking_save_taxonomy_custom_meta_field', 10, 2 );

if( !function_exists( 'tour_planner_ebooking_post_category_list' ) ) :

    // Post Category List.
    function tour_planner_ebooking_post_category_list( $tour_planner_ebooking_select_cat = true ){

        $tour_planner_ebooking_post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $tour_planner_ebooking_post_cat_cat_array = array();
        if( $tour_planner_ebooking_select_cat ){

            $tour_planner_ebooking_post_cat_cat_array[''] = esc_html__( 'Select Category','tour-planner-ebooking' );

        }

        foreach ( $tour_planner_ebooking_post_cat_lists as $tour_planner_ebooking_post_cat_list ) {

            $tour_planner_ebooking_post_cat_cat_array[$tour_planner_ebooking_post_cat_list->slug] = $tour_planner_ebooking_post_cat_list->name;

        }

        return $tour_planner_ebooking_post_cat_cat_array;
    }

endif;

/* Custom header additions. */
require get_template_directory().'/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory().'/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory().'/inc/customizer.php';

/* TGM */
require get_template_directory().'/inc/tgm.php';

/* Admin about theme */
require get_template_directory() . '/inc/admin/admin.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';


// Admin notice code START
function tour_planner_ebooking_dismissed_notice() {
	update_option( 'tour_planner_ebooking_admin_notice', true );
}
add_action( 'wp_ajax_tour_planner_ebooking_dismissed_notice', 'tour_planner_ebooking_dismissed_notice' );


//After Switch theme function
add_action('after_switch_theme', 'tour_planner_ebooking_getstart_setup_options');
function tour_planner_ebooking_getstart_setup_options () {
    update_option('tour_planner_ebooking_admin_notice', false );
}
// Admin notice code END

