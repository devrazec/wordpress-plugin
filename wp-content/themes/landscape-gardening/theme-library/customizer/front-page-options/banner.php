<?php
/**
 * Banner Section
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_banner_section',
	array(
		'panel'    => 'landscape_gardening_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'landscape-gardening' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'landscape_gardening_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_banner_section',
			'settings' => 'landscape_gardening_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'landscape_gardening_enable_banner_section',
		array(
			'selector' => '#landscape_gardening_banner_section .section-link',
			'settings' => 'landscape_gardening_enable_banner_section',
		)
	);
}

$wp_customize->add_setting( 'landscape_gardening_banner_heading', array(
    'default'           => '',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add the control for the new heading
$wp_customize->add_control( 'landscape_gardening_banner_heading', array(
    'label'    => __( 'Banner Heading', 'landscape-gardening' ),
    'section'  => 'landscape_gardening_banner_section',
    'settings' => 'landscape_gardening_banner_heading',
    'type'     => 'text',
	'active_callback' => 'landscape_gardening_is_banner_slider_section_enabled',
));

// Banner Section - Banner Slider Content Type.
$wp_customize->add_setting(
	'landscape_gardening_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
	)
);

$wp_customize->add_control(
	'landscape_gardening_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'landscape-gardening' ),
		'section'         => 'landscape_gardening_banner_section',
		'settings'        => 'landscape_gardening_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'landscape_gardening_is_banner_slider_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'landscape-gardening' ),
			'post' => esc_html__( 'Post', 'landscape-gardening' ),
		),
	)
);

// Banner Slider Category Setting.
$wp_customize->add_setting('landscape_gardening_banner_slider_category', array(
	'default'           => 'slider',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Banner Slider Category with conditional visibility.
$wp_customize->add_control(new Landscape_Gardening_Customize_Category_Dropdown_Control($wp_customize, 'landscape_gardening_banner_slider_category', array(
	'label'    => __('Select Banner Category', 'landscape-gardening'),
	'section'  => 'landscape_gardening_banner_section',
	'settings' => 'landscape_gardening_banner_slider_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('landscape_gardening_banner_slider_content_type')->value() === 'post';
	},
)));

for ( $landscape_gardening_i = 1; $landscape_gardening_i <= 3; $landscape_gardening_i++ ) {

	// Banner Section - Select Banner Post.
	$wp_customize->add_setting(
		'landscape_gardening_banner_slider_content_post_' . $landscape_gardening_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'landscape_gardening_banner_slider_content_post_' . $landscape_gardening_i,
		array(
			/* translators: %d: Post Count. */
			'label'           => sprintf( esc_html__( 'Select Post %d', 'landscape-gardening' ), $landscape_gardening_i ),
			'description'     => sprintf( esc_html__( 'Kindly :- Select a Post based on the category selected in the upper settings', 'landscape-gardening' ), $landscape_gardening_i ),
			'section'         => 'landscape_gardening_banner_section',
			'settings'        => 'landscape_gardening_banner_slider_content_post_' . $landscape_gardening_i,
			'active_callback' => 'landscape_gardening_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => landscape_gardening_get_post_choices(),
		)
	);

	// Banner Section - Select Banner Page.
	$wp_customize->add_setting(
		'landscape_gardening_banner_slider_content_page_' . $landscape_gardening_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'landscape_gardening_banner_slider_content_page_' . $landscape_gardening_i,
		array(
			/* translators: %d: Page Count. */
			'label'           => sprintf( esc_html__( 'Select Page %d', 'landscape-gardening' ), $landscape_gardening_i ),
			'section'         => 'landscape_gardening_banner_section',
			'settings'        => 'landscape_gardening_banner_slider_content_page_' . $landscape_gardening_i,
			'active_callback' => 'landscape_gardening_is_banner_slider_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => landscape_gardening_get_page_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'landscape_gardening_banner_button_label_' . $landscape_gardening_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'landscape_gardening_banner_button_label_' . $landscape_gardening_i,
		array(
			/* translators: %d: Button Label Count. */
			'label'           => sprintf( esc_html__( 'Button Label %d', 'landscape-gardening' ), $landscape_gardening_i ),
			'section'         => 'landscape_gardening_banner_section',
			'settings'        => 'landscape_gardening_banner_button_label_' . $landscape_gardening_i,
			'type'            => 'text',
			'active_callback' => 'landscape_gardening_is_banner_slider_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'landscape_gardening_banner_button_link_' . $landscape_gardening_i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'landscape_gardening_banner_button_link_' . $landscape_gardening_i,
		array(
			/* translators: %d: Button Link Count. */
			'label'           => sprintf( esc_html__( 'Button Link %d', 'landscape-gardening' ), $landscape_gardening_i ),
			'section'         => 'landscape_gardening_banner_section',
			'settings'        => 'landscape_gardening_banner_button_link_' . $landscape_gardening_i,
			'type'            => 'url',
			'active_callback' => 'landscape_gardening_is_banner_slider_section_enabled',
		)
	);

}