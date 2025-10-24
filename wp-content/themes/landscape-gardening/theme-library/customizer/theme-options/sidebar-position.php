<?php
/**
 * Sidebar Position
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'landscape-gardening' ),
		'panel' => 'landscape_gardening_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'landscape-gardening' ),
	'section' => 'landscape_gardening_sidebar_position',
	'settings' => 'landscape_gardening_global_sidebar_separator',
)));

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'landscape_gardening_sidebar_position',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'landscape_gardening_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'landscape-gardening' ),
		'section' => 'landscape_gardening_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'landscape-gardening' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'landscape-gardening' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'landscape-gardening' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'landscape-gardening' ),
	'section' => 'landscape_gardening_sidebar_position',
	'settings' => 'landscape_gardening_post_sidebar_separator',
)));

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'landscape_gardening_post_sidebar_position',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'landscape_gardening_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'landscape-gardening' ),
		'section' => 'landscape_gardening_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'landscape-gardening' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'landscape-gardening' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'landscape-gardening' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'landscape-gardening' ),
	'section' => 'landscape_gardening_sidebar_position',
	'settings' => 'landscape_gardening_page_sidebar_separator',
)));

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'landscape_gardening_page_sidebar_position',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'landscape_gardening_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'landscape-gardening' ),
		'section' => 'landscape_gardening_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'landscape-gardening' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'landscape-gardening' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'landscape-gardening' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'landscape-gardening' ),
	'section' => 'landscape_gardening_sidebar_position',
	'settings' => 'landscape_gardening_sidebar_width_separator',
)));


$wp_customize->add_setting( 'landscape_gardening_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'landscape_gardening_sanitize_range_value',
) );

$wp_customize->add_control(new Landscape_Gardening_Customize_Range_Control($wp_customize, 'landscape_gardening_sidebar_width', array(
	'section'     => 'landscape_gardening_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'landscape-gardening' ),
	'description' => __( 'Adjust the width of the sidebar.', 'landscape-gardening' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));

$wp_customize->add_setting( 'landscape_gardening_sidebar_widget_font_size', array(
    'default'           => 24,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'landscape_gardening_sidebar_widget_font_size', array(
    'type'        => 'number',
    'section'     => 'landscape_gardening_sidebar_position',
    'label'       => __( 'Sidebar Widgets Heading Font Size ', 'landscape-gardening' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));