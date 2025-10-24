<?php
/**
 * Single Post Options
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'landscape-gardening' ),
		'panel' => 'landscape_gardening_theme_options',
	)
);

// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'landscape_gardening_single_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'landscape_gardening_single_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Show / Hide Comments.
$wp_customize->add_setting(
	'landscape_gardening_single_post_hide_comments',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_single_post_hide_comments',
		array(
			'label'   => esc_html__( 'Show / Hide Comments', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Show / Hide Time.
$wp_customize->add_setting(
	'landscape_gardening_single_post_hide_time',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_single_post_hide_time',
		array(
			'label'   => esc_html__( 'Show / Hide Time', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'landscape_gardening_single_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'landscape_gardening_post_hide_tags',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'landscape-gardening' ),
			'section' => 'landscape_gardening_single_post_options',
		)
	)
);

// Post Options - Comment Title.
$wp_customize->add_setting(
	'landscape_gardening_blog_post_comment_title',
	array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'landscape_gardening_blog_post_comment_title',
	array(
		'label'	=> __('Comment Title','landscape-gardening'),
		'input_attrs' => array(
			'placeholder' => __( 'Leave a Reply', 'landscape-gardening' ),
		),
		'section'=> 'landscape_gardening_single_post_options',
		'type'=> 'text'
	)
);