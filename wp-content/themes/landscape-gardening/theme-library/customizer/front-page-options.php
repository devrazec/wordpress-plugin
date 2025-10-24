<?php
/**
 * Front Page Options
 *
 * @package Landscape Gardening
 */

$wp_customize->add_panel(
	'landscape_gardening_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'landscape-gardening' ),
		'priority' => 20,
	)
);

// Header Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/header.php';

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Services Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/services.php';