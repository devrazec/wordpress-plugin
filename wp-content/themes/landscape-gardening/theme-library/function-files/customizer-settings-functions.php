<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package landscape_gardening
 */


// Output inline CSS based on Customizer setting
function landscape_gardening_customizer_css() {
    $landscape_gardening_enable_breadcrumb = get_theme_mod('landscape_gardening_enable_breadcrumb', true);
    ?>
    <style type="text/css">
        <?php if (!$landscape_gardening_enable_breadcrumb) : ?>
            nav.woocommerce-breadcrumb {
                display: none;
            }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_customizer_css');

function landscape_gardening_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#0B3D2C' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'landscape_gardening_customize_css' );


function landscape_gardening_enqueue_selected_fonts() {
    $landscape_gardening_fonts_url = landscape_gardening_get_fonts_url();
    if (!empty($landscape_gardening_fonts_url)) {
        wp_enqueue_style('landscape-gardening-google-fonts', $landscape_gardening_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'landscape_gardening_enqueue_selected_fonts');

function landscape_gardening_layout_customizer_css() {
    $landscape_gardening_margin = get_theme_mod('landscape_gardening_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($landscape_gardening_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_layout_customizer_css');

function landscape_gardening_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $landscape_gardening_blog_layout_option = get_theme_mod('landscape_gardening_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $landscape_gardening_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($landscape_gardening_blog_layout_option === 'Default') {
        $landscape_gardening_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($landscape_gardening_blog_layout_option === 'Left') {
        $landscape_gardening_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($landscape_gardening_blog_layout_option === 'Right') {
        $landscape_gardening_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($landscape_gardening_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_blog_layout_customizer_css');

function landscape_gardening_sidebar_width_customizer_css() {
    $landscape_gardening_sidebar_width = get_theme_mod('landscape_gardening_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($landscape_gardening_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($landscape_gardening_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_sidebar_width_customizer_css');

if ( ! function_exists( 'landscape_gardening_get_page_title' ) ) {
    function landscape_gardening_get_page_title() {
        $landscape_gardening_title = '';

        if (is_404()) {
            $landscape_gardening_title = esc_html__('Page Not Found', 'landscape-gardening');
        } elseif (is_search()) {
            $landscape_gardening_title = esc_html__('Search Results for: ', 'landscape-gardening') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $landscape_gardening_title = esc_html__('Blogs', 'landscape-gardening');
        } elseif (function_exists('is_shop') && is_shop()) {
            $landscape_gardening_title = esc_html__('Shop', 'landscape-gardening');
        } elseif (is_page()) {
            $landscape_gardening_title = get_the_title();
        } elseif (is_single()) {
            $landscape_gardening_title = get_the_title();
        } elseif (is_archive()) {
            $landscape_gardening_title = get_the_archive_title();
        } else {
            $landscape_gardening_title = get_the_archive_title();
        }

        return apply_filters('landscape_gardening_page_title', $landscape_gardening_title);
    }
}

if ( ! function_exists( 'landscape_gardening_has_page_header' ) ) {
    function landscape_gardening_has_page_header() {
        // Default to true (display header)
        $landscape_gardening_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('landscape_gardening_page_header_visibility', 'all-devices')) {
            $landscape_gardening_return = false;
        }

        // Apply filters and return
        return apply_filters('landscape_gardening_display_page_header', $landscape_gardening_return);
    }
}

if ( ! function_exists( 'landscape_gardening_page_header_style' ) ) {
    function landscape_gardening_page_header_style() {
        $landscape_gardening_style = get_theme_mod('landscape_gardening_page_header_style', 'default');
        return apply_filters('landscape_gardening_page_header_style', $landscape_gardening_style);
    }
}

function landscape_gardening_page_title_customizer_css() {
    $landscape_gardening_layout_option = get_theme_mod('landscape_gardening_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($landscape_gardening_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($landscape_gardening_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_page_title_customizer_css');

function landscape_gardening_pagetitle_height_css() {
    $landscape_gardening_height = get_theme_mod('landscape_gardening_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($landscape_gardening_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_pagetitle_height_css');

function landscape_gardening_site_logo_width() {
    $landscape_gardening_site_logo_width = get_theme_mod('landscape_gardening_site_logo_width', 300);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($landscape_gardening_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_site_logo_width');

function landscape_gardening_menu_font_size_css() {
    $landscape_gardening_menu_font_size = get_theme_mod('landscape_gardening_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($landscape_gardening_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_menu_font_size_css');

//Menu Font Weight
function landscape_gardening_menu_font_weight_css() {
	$landscape_gardening_font_weight = get_theme_mod( 'landscape_gardening_menu_font_weight', 500);

	$landscape_gardening_custom_css = "
		.main-navigation a {
		    font-weight: {$landscape_gardening_font_weight};
		}
	";

	wp_add_inline_style( 'landscape-gardening-style', $landscape_gardening_custom_css );
}
add_action( 'wp_enqueue_scripts', 'landscape_gardening_menu_font_weight_css' );

function landscape_gardening_menu_text_transform_css() {
    $menu_text_transform = get_theme_mod('landscape_gardening_menu_text_transform', 'capitalize');
    ?>
    <style type="text/css">
        .main-navigation a {
            text-transform: <?php echo esc_attr($menu_text_transform); ?> !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_menu_text_transform_css');

// Featured Image Dimension
function landscape_gardening_custom_featured_image_css() {
    $landscape_gardening_dimension = get_theme_mod('landscape_gardening_blog_post_featured_image_dimension', 'default');
    $landscape_gardening_width = get_theme_mod('landscape_gardening_blog_post_featured_image_custom_width', '');
    $landscape_gardening_height = get_theme_mod('landscape_gardening_blog_post_featured_image_custom_height', '');
    
    if ($landscape_gardening_dimension === 'custom' && $landscape_gardening_width && $landscape_gardening_height) {
        $landscape_gardening_custom_css = "body:not(.single-post) .mag-post-single .mag-post-img img { width: {$landscape_gardening_width}px !important; height: {$landscape_gardening_height}px !important; }";
        wp_add_inline_style('landscape-gardening-style', $landscape_gardening_custom_css);
    }
}
add_action('wp_enqueue_scripts', 'landscape_gardening_custom_featured_image_css');

// Featured Image Border Radius
function landscape_gardening_featured_image_border_radius_css() {
    $landscape_gardening_featured_image_border_radius = get_theme_mod('landscape_gardening_featured_image_border_radius', 10);
    ?>
    <style type="text/css">  
        .mag-post-single img {
            border-radius: <?php echo esc_attr($landscape_gardening_featured_image_border_radius); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_featured_image_border_radius_css');

function landscape_gardening_sidebar_widget_font_size_css() {
    $landscape_gardening_sidebar_widget_font_size = get_theme_mod('landscape_gardening_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($landscape_gardening_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_sidebar_widget_font_size_css');

// Woocommerce Related Products Settings
function landscape_gardening_related_product_css() {
    $landscape_gardening_related_product_show_hide = get_theme_mod('landscape_gardening_related_product_show_hide', true);

    if ( $landscape_gardening_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'landscape_gardening_related_product_css');

// Woocommerce Product Sale Position 
function landscape_gardening_product_sale_position_customizer_css() {
    $landscape_gardening_layout_option = get_theme_mod('landscape_gardening_product_sale_position', 'left');
    ?>
    <style type="text/css">
        .woocommerce ul.products li.product .onsale {
            <?php if ($landscape_gardening_layout_option === 'left') : ?>
                right: auto;
                left: 0px;
            <?php else : ?>
                left: auto;
                right: 0px;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_product_sale_position_customizer_css'); 

//Footer Social Icon Alignment
function landscape_gardening_footer_icons_alignment_css() {
    $landscape_gardening_footer_social_align = get_theme_mod( 'landscape_gardening_footer_social_align', 'center' );   
    ?>
    <style type="text/css">
        .socialicons {
            text-align: <?php echo esc_attr( $landscape_gardening_footer_social_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .socialicons {
                text-align: center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'landscape_gardening_footer_icons_alignment_css' );

//Copyright Alignment
function landscape_gardening_footer_copyright_alignment_css() {
    $landscape_gardening_footer_bottom_align = get_theme_mod( 'landscape_gardening_footer_bottom_align', 'center' );   
    ?>
    <style type="text/css">
        .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
            justify-content: <?php echo esc_attr( $landscape_gardening_footer_bottom_align ); ?> 
        }

        /* Mobile Specific */
        @media screen and (max-width: 575px) {
            .site-footer .site-footer-bottom .site-footer-bottom-wrapper {
                justify-content: center;
                text-align:center;
            }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'landscape_gardening_footer_copyright_alignment_css' );


//Copyright Font Size
function landscape_gardening_copyright_font_size_css() {
    $landscape_gardening_copyright_font_size = get_theme_mod('landscape_gardening_copyright_font_size', 16);
    ?>
    <style type="text/css">
        .site-footer-bottom .site-info span {
            font-size: <?php echo esc_attr($landscape_gardening_copyright_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_copyright_font_size_css');

// Preloader Background Color Setting
function landscape_gardening_preloader_background_colors_css() {
    $landscape_gardening_preloader_background_color_setting = get_theme_mod('landscape_gardening_preloader_background_color_setting', '');
        // Only output CSS if a color is set
        if (empty($landscape_gardening_preloader_background_color_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-color: <?php echo esc_attr($landscape_gardening_preloader_background_color_setting); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_preloader_background_colors_css');

// Preloader Background Image Setting
function landscape_gardening_preloader_background_image_css() {
    $landscape_gardening_preloader_background_image_setting = get_theme_mod('landscape_gardening_preloader_background_image_setting', '');
        // Only output CSS if the background image is set
        if (empty($landscape_gardening_preloader_background_image_setting)) {
            return;
        }
    ?>
    <style type="text/css">
        #loader {
            background-image: url('<?php echo esc_url($landscape_gardening_preloader_background_image_setting); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_preloader_background_image_css');

//Footer Heading Alignment
function landscape_gardening_footer_heading_alignment_css() {
    $landscape_gardening_footer_header_align = get_theme_mod( 'landscape_gardening_footer_header_align', 'left' );   
    ?>
    <style type="text/css">
        .site-footer h4, footer#colophon h2.wp-block-heading, footer#colophon .widgettitle, footer#colophon .widget-title {
            text-align: <?php echo esc_attr( $landscape_gardening_footer_header_align ); ?> 
        }
    </style>
    <?php
}
add_action( 'wp_head', 'landscape_gardening_footer_heading_alignment_css' );