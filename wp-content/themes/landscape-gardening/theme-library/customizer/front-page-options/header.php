<?php
/**
 * Header Section Settings
 *
 * @package landscape_gardening
 */

// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------

$wp_customize->add_section(
	'landscape_gardening_header_options',
	array(
		'panel' => 'landscape_gardening_front_page_options',
		'title' => esc_html__( 'Header Options', 'landscape-gardening' ),
        'priority' => 1,
	)
);

// Add setting for sticky header
$wp_customize->add_setting(
	'landscape_gardening_enable_sticky_header',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'landscape-gardening' ),
			'section' => 'landscape_gardening_header_options',
		)
	)
);

// Header Section - Enable Section.
$wp_customize->add_setting(
	'landscape_gardening_enable_header_search_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_header_search_section',
		array(
			'label'    => esc_html__( 'Enable Search Section', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_header_options',
			'settings' => 'landscape_gardening_enable_header_search_section',
		)
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_menu_separator', array(
	'label' => __( 'Menu Settings', 'landscape-gardening' ),
	'section' => 'landscape_gardening_header_options',
	'settings' => 'landscape_gardening_menu_separator',
)));

$wp_customize->add_setting( 'landscape_gardening_menu_font_size', array(
    'default'           => 15,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'landscape_gardening_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'landscape_gardening_header_options',
    'label'       => __( 'Menu Font Size ', 'landscape-gardening' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

// Add setting for menu font weight
$wp_customize->add_setting('landscape_gardening_menu_font_weight', array(
    'default'           => '500',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add control for menu font weight
$wp_customize->add_control('landscape_gardening_menu_font_weight', array(
    'type'     => 'select',
    'section'  => 'landscape_gardening_header_options', 
    'label'    => __('Menu Font Weight', 'landscape-gardening'),
    'choices'  => array(
		'100' => __('100','landscape-gardening'),
		'200' => __('200','landscape-gardening'),
		'300' => __('300','landscape-gardening'),
		'400' => __('400','landscape-gardening'),
		'500' => __('500','landscape-gardening'),
		'600' => __('600','landscape-gardening'),
		'700' => __('700','landscape-gardening'),
		'800' => __('800','landscape-gardening'),
		'900' => __('900','landscape-gardening'),
    ),
));

$wp_customize->add_setting( 'landscape_gardening_menu_text_transform', array(
    'default'           => 'capitalize', 
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'landscape_gardening_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'landscape_gardening_header_options',
    'label'    => __( 'Menu Text Transform', 'landscape-gardening' ),
    'choices'  => array(
        'none'       => __( 'None', 'landscape-gardening' ),
        'capitalize' => __( 'Capitalize', 'landscape-gardening' ),
        'uppercase'  => __( 'Uppercase', 'landscape-gardening' ),
        'lowercase'  => __( 'Lowercase', 'landscape-gardening' ),
    ),
) );

// Menu Text Color 
$wp_customize->add_setting(
	'landscape_gardening_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'landscape_gardening_menu_text_color', 
		array(
			'label' => __('Menu Color', 'landscape-gardening'),
			'section' => 'landscape_gardening_header_options',
		)
	)
);

// Sub Menu Text Color 
$wp_customize->add_setting(
	'landscape_gardening_sub_menu_text_color', 
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 
		'landscape_gardening_sub_menu_text_color', 
		array(
			'label' => __('Sub Menu Color', 'landscape-gardening'),
			'section' => 'landscape_gardening_header_options',
		)
	)
);