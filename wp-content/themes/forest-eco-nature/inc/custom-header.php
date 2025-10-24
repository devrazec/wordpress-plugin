<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

function forest_eco_nature_custom_header_setup() {
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri() . '/assets/images/header_img.png',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/header_img.png',
            'description'   => __( 'Default Header Image', 'forest-eco-nature' ),
        ),
    ) );
}
add_action( 'after_setup_theme', 'forest_eco_nature_custom_header_setup' );

/**
 * Styles the header image based on Customizer settings.
 */
function forest_eco_nature_header_style() {
    $forest_eco_nature_header_image = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/header_img.png';

    $forest_eco_nature_height     = get_theme_mod( 'forest_eco_nature_header_image_height', 350 );
    $forest_eco_nature_position   = get_theme_mod( 'forest_eco_nature_header_background_position', 'center' );
    $forest_eco_nature_attachment = get_theme_mod( 'forest_eco_nature_header_background_attachment', 1 ) ? 'fixed' : 'scroll';

    $forest_eco_nature_custom_css = "
        .header-img, .single-page-img, .external-div .box-image-page img, .external-div {
            background-image: url('" . esc_url( $forest_eco_nature_header_image ) . "');
            background-size: cover;
            height: " . esc_attr( $forest_eco_nature_height ) . "px;
            background-position: " . esc_attr( $forest_eco_nature_position ) . ";
            background-attachment: " . esc_attr( $forest_eco_nature_attachment ) . ";
        }

        @media (max-width: 1000px) {
            .header-img, .single-page-img, .external-div .box-image-page img,.external-div,.featured-image{
                height: 250px !important;
            }
            .box-text h2{
                font-size: 27px;
            }
        }
    ";

    wp_add_inline_style( 'forest-eco-nature-style', $forest_eco_nature_custom_css );
}
add_action( 'wp_enqueue_scripts', 'forest_eco_nature_header_style' );

/**
 * Enqueue the main theme stylesheet.
 */
function forest_eco_nature_enqueue_styles() {
    wp_enqueue_style( 'forest-eco-nature-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'forest_eco_nature_enqueue_styles' );