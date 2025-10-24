<?php
/**
 * Service Section
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_services_section',
	array(
		'panel'    => 'landscape_gardening_front_page_options',
		'title'    => esc_html__( 'Services Section', 'landscape-gardening' ),
		'priority' => 10,
	)
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'landscape_gardening_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Services Section', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_services_section',
			'settings' => 'landscape_gardening_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'landscape_gardening_enable_service_section',
		array(
			'selector' => '#landscape_gardening_service_section .section-link',
			'settings' => 'landscape_gardening_enable_service_section',
		)
	);
}

// Service Section - Button Label.
$wp_customize->add_setting(
	'landscape_gardening_trending_product_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'landscape_gardening_trending_product_heading',
	array(
		'label'           => esc_html__( 'Heading', 'landscape-gardening' ),
		'section'         => 'landscape_gardening_services_section',
		'settings'        => 'landscape_gardening_trending_product_heading',
		'type'            => 'text',
		'active_callback' => 'landscape_gardening_is_service_section_enabled',
	)
);

// Services Section - Content Type.
$wp_customize->add_setting(
	'landscape_gardening_service_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
	)
);

$wp_customize->add_control(
	'landscape_gardening_service_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'landscape-gardening' ),
		'section'         => 'landscape_gardening_services_section',
		'settings'        => 'landscape_gardening_service_content_type',
		'type'            => 'select',
		'active_callback' => 'landscape_gardening_is_service_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'landscape-gardening' ),
			'post' => esc_html__( 'Post', 'landscape-gardening' ),
		),
	)
);

// Services Category Setting.
$wp_customize->add_setting('landscape_gardening_services_category', array(
	'default'           => 'services',
	'sanitize_callback' => 'sanitize_text_field',
));

// Add custom control for Services Category with conditional visibility.
$wp_customize->add_control(new Landscape_Gardening_Customize_Category_Dropdown_Control($wp_customize, 'landscape_gardening_services_category', array(
	'label'    => __('Select Services Category', 'landscape-gardening'),
	'section'  => 'landscape_gardening_services_section',
	'settings' => 'landscape_gardening_services_category',
	'active_callback' => function() use ($wp_customize) {
		return $wp_customize->get_setting('landscape_gardening_service_content_type')->value() === 'post';
	},
)));


for ( $landscape_gardening_i = 1; $landscape_gardening_i <= 3; $landscape_gardening_i++ ) {
	
	// Service Section - Select Post.
	$wp_customize->add_setting(
		'landscape_gardening_service_content_post_' . $landscape_gardening_i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'landscape_gardening_service_content_post_' . $landscape_gardening_i,
		array(
			'label'           => esc_html__( 'Select Post ', 'landscape-gardening' ) . $landscape_gardening_i,
			'description'     => sprintf( esc_html__( 'Kindly :- Select a Post based on the category selected in the upper settings', 'landscape-gardening' ), $landscape_gardening_i ),
			'section'         => 'landscape_gardening_services_section',
			'settings'        => 'landscape_gardening_service_content_post_' . $landscape_gardening_i,
			'active_callback' => 'landscape_gardening_is_service_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => landscape_gardening_get_post_choices(),
		)
	);

	$wp_customize->add_setting('landscape_gardening_services_icon'.$landscape_gardening_i,array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
		$wp_customize->add_control('landscape_gardening_services_icon'.$landscape_gardening_i,array(
		'label' => __('Icon ','landscape-gardening').$landscape_gardening_i,
		'description' => __('Fontawesome Icon (e.g., fas fa-seedling)','landscape-gardening'),
		'section'=> 'landscape_gardening_services_section',
		'active_callback' => 'landscape_gardening_is_service_section_and_content_type_post_enabled',
		'type'=> 'text'
	));

}