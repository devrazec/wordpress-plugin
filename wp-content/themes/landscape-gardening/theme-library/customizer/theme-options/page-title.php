<?php
/**
 * Pige Title Options
 *
 * @package landscape_gardening
 */



$wp_customize->add_section(
	'landscape_gardening_page_title_options',
	array(
		'panel' => 'landscape_gardening_theme_options',
		'title' => esc_html__( 'Page Title', 'landscape-gardening' ),
	)
);

$wp_customize->add_setting(
    'landscape_gardening_page_header_visibility',
    array(
        'default'           => 'all-devices',
        'sanitize_callback' => 'landscape_gardening_sanitize_select',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'landscape_gardening_page_header_visibility',
        array(
            'label'    => esc_html__( 'Page Header Visibility', 'landscape-gardening' ),
            'type'     => 'select',
            'section'  => 'landscape_gardening_page_title_options',
            'settings' => 'landscape_gardening_page_header_visibility',
            'priority' => 10,
            'choices'  => array(
                'all-devices'        => esc_html__( 'Show on all devices', 'landscape-gardening' ),
                'hide-tablet'        => esc_html__( 'Hide on Tablet', 'landscape-gardening' ),
                'hide-mobile'        => esc_html__( 'Hide on Mobile', 'landscape-gardening' ),
                'hide-tablet-mobile' => esc_html__( 'Hide on Tablet & Mobile', 'landscape-gardening' ),
                'hide-all-devices'   => esc_html__( 'Hide on all devices', 'landscape-gardening' ),
            ),
        )
    )
);


$wp_customize->add_setting( 'landscape_gardening_page_title_background_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_page_title_background_separator', array(
	'label' => __( 'Page Title BG Image & Color Setting', 'landscape-gardening' ),
	'section' => 'landscape_gardening_page_title_options',
	'settings' => 'landscape_gardening_page_title_background_separator',
)));


$wp_customize->add_setting(
	'landscape_gardening_page_header_style',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => False,
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_page_header_style',
		array(
			'label'   => esc_html__('Page Title Background Image', 'landscape-gardening'),
			'section' => 'landscape_gardening_page_title_options',
		)
	)
);

$wp_customize->add_setting( 'landscape_gardening_page_header_background_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'landscape_gardening_page_header_background_image', array(
    'label'    => __( 'Background Image', 'landscape-gardening' ),
    'section'  => 'landscape_gardening_page_title_options',
	'description' => __('Choose either a background image or a color. If a background image is selected, the background color will not be visible.', 'landscape-gardening'),
    'settings' => 'landscape_gardening_page_header_background_image',
	'active_callback' => 'landscape_gardening_is_pagetitle_bcakground_image_enabled',
)));


$wp_customize->add_setting('landscape_gardening_page_header_image_height', array(
	'default'           => 200,
	'sanitize_callback' => 'landscape_gardening_sanitize_range_value',
));

$wp_customize->add_control(new Landscape_Gardening_Customize_Range_Control($wp_customize, 'landscape_gardening_page_header_image_height', array(
		'label'       => __('Image Height', 'landscape-gardening'),
		'section'     => 'landscape_gardening_page_title_options',
		'settings'    => 'landscape_gardening_page_header_image_height',
		'active_callback' => 'landscape_gardening_is_pagetitle_bcakground_image_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 5,
		),
)));


$wp_customize->add_setting('landscape_gardening_page_title_background_color_setting', array(
    'default' => '#f5f5f5',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'landscape_gardening_page_title_background_color_setting', array(
    'label' => __('Page Title Background Color', 'landscape-gardening'),
    'section' => 'landscape_gardening_page_title_options',
)));

$wp_customize->add_setting('landscape_gardening_pagetitle_height', array(
    'default'           => 50,
    'sanitize_callback' => 'landscape_gardening_sanitize_range_value',
));

$wp_customize->add_control(new Landscape_Gardening_Customize_Range_Control($wp_customize, 'landscape_gardening_pagetitle_height', array(
    'label'       => __('Set Height', 'landscape-gardening'),
    'description' => __('This setting controls the page title height when no background image is set. If a background image is set, this setting will not apply.', 'landscape-gardening'),
    'section'     => 'landscape_gardening_page_title_options',
    'settings'    => 'landscape_gardening_pagetitle_height',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 300,
        'step' => 5,
    ),
)));


$wp_customize->add_setting( 'landscape_gardening_page_title_style_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_page_title_style_separator', array(
	'label' => __( 'Page Title Styling Setting', 'landscape-gardening' ),
	'section' => 'landscape_gardening_page_title_options',
	'settings' => 'landscape_gardening_page_title_style_separator',
)));

$wp_customize->add_setting( 'landscape_gardening_page_header_heading_tag', array(
	'default'   => 'h1',
	'sanitize_callback' => 'landscape_gardening_sanitize_select',
) );

$wp_customize->add_control( 'landscape_gardening_page_header_heading_tag', array(
	'label'   => __( 'Page Title Heading Tag', 'landscape-gardening' ),
	'section' => 'landscape_gardening_page_title_options',
	'type'    => 'select',
	'choices' => array(
		'h1' => __( 'H1', 'landscape-gardening' ),
		'h2' => __( 'H2', 'landscape-gardening' ),
		'h3' => __( 'H3', 'landscape-gardening' ),
		'h4' => __( 'H4', 'landscape-gardening' ),
		'h5' => __( 'H5', 'landscape-gardening' ),
		'h6' => __( 'H6', 'landscape-gardening' ),
		'p' => __( 'p', 'landscape-gardening' ),
		'a' => __( 'a', 'landscape-gardening' ),
		'div' => __( 'div', 'landscape-gardening' ),
		'span' => __( 'span', 'landscape-gardening' ),
	),
) );

$wp_customize->add_setting('landscape_gardening_page_header_layout', array(
	'default' => 'left',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('landscape_gardening_page_header_layout', array(
	'label' => __('Style', 'landscape-gardening'),
	'section' => 'landscape_gardening_page_title_options',
	'description' => __('"Flex Layout Style" wont work below 600px (mobile media)', 'landscape-gardening'),
	'settings' => 'landscape_gardening_page_header_layout',
	'type' => 'radio',
	'choices' => array(
		'left' => __('Classic', 'landscape-gardening'),
		'right' => __('Aligned Right', 'landscape-gardening'),
		'center' => __('Centered Focus', 'landscape-gardening'),
		'flex' => __('Flex Layout', 'landscape-gardening'),
	),
));