<?php
/**
 * Excerpt
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_excerpt_options',
	array(
		'panel' => 'landscape_gardening_theme_options',
		'title' => esc_html__( 'Excerpt', 'landscape-gardening' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'landscape_gardening_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'landscape_gardening_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'landscape-gardening' ),
		'section'     => 'landscape_gardening_excerpt_options',
		'settings'    => 'landscape_gardening_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);