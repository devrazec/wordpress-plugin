<?php
/**
 * @package tour-planner-ebooking
 * @subpackage tour-planner-ebooking
 * @since tour-planner-ebooking 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses tour_planner_ebooking_header_style()
*/

function tour_planner_ebooking_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'tour_planner_ebooking_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 150,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'tour_planner_ebooking_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'tour_planner_ebooking_custom_header_setup' );

if ( ! function_exists( 'tour_planner_ebooking_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see tour_planner_ebooking_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'tour_planner_ebooking_header_style' );
function tour_planner_ebooking_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$tour_planner_ebooking_custom_css = "
        #header, .topbar,.topbar-contact-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size:cover;
		}";
	   	wp_add_inline_style( 'tour-planner-ebooking-basic-style', $tour_planner_ebooking_custom_css );
	endif;
}
endif;