<?php
/**
 * Color Option
 *
 * @package landscape_gardening
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#0B3D2C',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'landscape-gardening' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
