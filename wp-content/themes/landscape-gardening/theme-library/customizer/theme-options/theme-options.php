<?php
/**
 * Header Options
 *
 * @package landscape_gardening
 */

// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------
// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'landscape_gardening_general_options',
	array(
		'panel' => 'landscape_gardening_theme_options',
		'title' => esc_html__( 'General Options', 'landscape-gardening' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'landscape-gardening' ),
	'section' => 'landscape_gardening_general_options',
	'settings' => 'landscape_gardening_preloader_separator',
) ) );


// General Options - Enable Preloader.
$wp_customize->add_setting(
	'landscape_gardening_enable_preloader',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'landscape-gardening' ),
			'section' => 'landscape_gardening_general_options',
		)
	)
);

// Preloader Style Setting
$wp_customize->add_setting(
	'landscape_gardening_preloader_style',
	array(
		'default'           => 'style1',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'landscape_gardening_preloader_style',
	array(
		'type'     => 'select',
		'label'    => esc_html__('Select Preloader Styles', 'landscape-gardening'),
		'active_callback' => 'landscape_gardening_is_preloader_style',
		'section'  => 'landscape_gardening_general_options',
		'choices'  => array(
			'style1' => esc_html__('Style 1', 'landscape-gardening'),
			'style2' => esc_html__('Style 2', 'landscape-gardening'),
			'style3' => esc_html__('Style 3', 'landscape-gardening'),
		),
	)
);

// Preloader Background Color Setting
$wp_customize->add_setting(
	'landscape_gardening_preloader_background_color_setting',
	 array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'landscape_gardening_preloader_background_color_setting', 
		array(
			'label' => __('Preloader Background Color', 'landscape-gardening'),
			'active_callback' => 'landscape_gardening_is_preloader_style',
			'section' => 'landscape_gardening_general_options',
		)
	)
);

// Preloader Background Image Setting
$wp_customize->add_setting(
	'landscape_gardening_preloader_background_image_setting', 
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize, 'landscape_gardening_preloader_background_image_setting',
		 array(
			'label' => __('Preloader Background Image', 'landscape-gardening'),
			'active_callback' => 'landscape_gardening_is_preloader_style',
			'section' => 'landscape_gardening_general_options',
		)
	)
);

// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'landscape-gardening' ),
	'section' => 'landscape_gardening_general_options',
	'settings' => 'landscape_gardening_pagination_separator',
) ) );

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'landscape_gardening_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_general_options',
			'settings' => 'landscape_gardening_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'landscape_gardening_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
	)
);

$wp_customize->add_control(
	'landscape_gardening_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'landscape-gardening' ),
		'section'         => 'landscape_gardening_general_options',
		'settings'        => 'landscape_gardening_pagination_type',
		'active_callback' => 'landscape_gardening_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'landscape-gardening' ),
			'numeric' => __( 'Numeric', 'landscape-gardening' ),
		),
	)
);

// ---------------------------------------- BREADCRUMB ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'landscape-gardening' ),
	'section' => 'landscape_gardening_general_options',
	'settings' => 'landscape_gardening_breadcrumb_separators',
)));

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'landscape_gardening_enable_breadcrumb',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'landscape-gardening' ),
			'section' => 'landscape_gardening_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'landscape_gardening_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'landscape_gardening_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'landscape-gardening' ),
		'active_callback' => 'landscape_gardening_is_breadcrumb_enabled',
		'section'         => 'landscape_gardening_general_options',
	)
);

// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'landscape-gardening' ),
	'section' => 'landscape_gardening_general_options',
	'settings' => 'landscape_gardening_layuout_separator',
)));


$wp_customize->add_setting(
	'landscape_gardening_website_layout',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'landscape-gardening'),
			'section' => 'landscape_gardening_general_options',
		)
	)
);

$wp_customize->add_setting('landscape_gardening_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'landscape_gardening_sanitize_range_value',
));

$wp_customize->add_control(new Landscape_Gardening_Customize_Range_Control($wp_customize, 'landscape_gardening_layout_width_margin', array(
		'label'       => __('Set Width', 'landscape-gardening'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'landscape-gardening'),
		'section'     => 'landscape_gardening_general_options',
		'settings'    => 'landscape_gardening_layout_width_margin',
		'active_callback' => 'landscape_gardening_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));

// ----------------------------------------SITE IDENTITY----------------------------------------------------


// Site Logo - Enable Setting.
$wp_customize->add_setting(
	'landscape_gardening_enable_site_logo',
	array(
		'default'           => true, // Default is to display the logo.
		'sanitize_callback' => 'landscape_gardening_sanitize_switch', // Sanitize using a custom switch function.
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_site_logo',
		array(
			'label'    => esc_html__( 'Enable Site Logo', 'landscape-gardening' ),
			'section'  => 'title_tagline', // Section to add this control.
			'settings' => 'landscape_gardening_enable_site_logo',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'landscape_gardening_enable_site_title_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Enable Site Title', 'landscape-gardening' ),
			'section'  => 'title_tagline',
			'settings' => 'landscape_gardening_enable_site_title_setting',
		)
	)
);

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'landscape_gardening_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'landscape-gardening' ),
			'section'  => 'title_tagline',
			'settings' => 'landscape_gardening_enable_tagline_setting',
		)
	)
);

$wp_customize->add_setting( 'landscape_gardening_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'landscape_gardening_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'landscape-gardening' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );

$wp_customize->add_setting('landscape_gardening_site_logo_width', array(
    'default'           => 300,
    'sanitize_callback' => 'landscape_gardening_sanitize_range_value',
));

$wp_customize->add_control(new Landscape_Gardening_Customize_Range_Control($wp_customize, 'landscape_gardening_site_logo_width', array(
    'label'       => __('Adjust Site Logo Width', 'landscape-gardening'),
    'description' => __('This setting controls the Width of Site Logo', 'landscape-gardening'),
    'section'     => 'title_tagline',
    'settings'    => 'landscape_gardening_site_logo_width',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 400,
        'step' => 5,
    ),
)));