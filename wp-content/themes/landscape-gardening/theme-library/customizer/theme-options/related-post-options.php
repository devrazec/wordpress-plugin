<?php
/**
 * Related Post Options
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_related_post_options',
	array(
		'title' => esc_html__( 'Related Post Options', 'landscape-gardening' ),
		'panel' => 'landscape_gardening_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'landscape-gardening' ),
	'section' => 'landscape_gardening_related_post_options',
	'settings' => 'landscape_gardening_related_post_separator',
) ) );

// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'landscape_gardening_post_hide_related_posts',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'landscape-gardening' ),
			'section' => 'landscape_gardening_related_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
    'landscape_gardening_related_posts_count',
    array(
        'default'           => 3,
        'sanitize_callback' => 'absint', // Ensure it's an integer
    )
);

// Add control for number of related posts
$wp_customize->add_control(
    'landscape_gardening_related_posts_count',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Number of Related Posts to Display', 'landscape-gardening' ),
        'section'     => 'landscape_gardening_related_post_options',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3, // Adjust maximum based on your preference
            'step' => 1,
        ),
    )
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'landscape_gardening_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'landscape-gardening' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'landscape_gardening_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'landscape-gardening' ),
		'section'  => 'landscape_gardening_related_post_options',
		'settings' => 'landscape_gardening_post_related_post_label',
		'type'     => 'text',
	)
);