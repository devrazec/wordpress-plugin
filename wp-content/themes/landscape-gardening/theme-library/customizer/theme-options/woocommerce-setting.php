<?php
/**
 * WooCommerce Settings
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_woocommerce_settings',
	array(
		'panel' => 'landscape_gardening_theme_options',
		'title' => esc_html__( 'WooCommerce Settings', 'landscape-gardening' ),
	)
);

//WooCommerce - Products per page.
$wp_customize->add_setting( 'landscape_gardening_products_per_page', array(
    'default'           => 9,
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'landscape_gardening_products_per_page', array(
    'type'        => 'number',
    'section'     => 'landscape_gardening_woocommerce_settings',
    'label'       => __( 'Products Per Page', 'landscape-gardening' ),
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
));

//WooCommerce - Products per row.
$wp_customize->add_setting( 'landscape_gardening_products_per_row', array(
    'default'           => '3',
    'sanitize_callback' => 'landscape_gardening_sanitize_choices',
) );

$wp_customize->add_control( 'landscape_gardening_products_per_row', array(
    'label'    => __( 'Products Per Row', 'landscape-gardening' ),
    'section'  => 'landscape_gardening_woocommerce_settings',
    'settings' => 'landscape_gardening_products_per_row',
    'type'     => 'select',
    'choices'  => array(
        '2' => '2',
		'3' => '3',
		'4' => '4',
    ),
) );

//WooCommerce - Show / Hide Related Product.
$wp_customize->add_setting(
	'landscape_gardening_related_product_show_hide',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_related_product_show_hide',
		array(
			'label'   => esc_html__( 'Show / Hide Related product', 'landscape-gardening' ),
			'section' => 'landscape_gardening_woocommerce_settings',
		)
	)
);

// WooCommerce - Product Sale Position.
$wp_customize->add_setting(
	'landscape_gardening_product_sale_position', 
	array(
		'default' => 'left',
		'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control(
	'landscape_gardening_product_sale_position', 
	array(
		'label' => __('Product Sale Position', 'landscape-gardening'),
		'section' => 'landscape_gardening_woocommerce_settings',
		'settings' => 'landscape_gardening_product_sale_position',
		'type' => 'radio',
		'choices' => 
	array(
		'left' => __('Left', 'landscape-gardening'),
		'right' => __('Right', 'landscape-gardening'),
	),
));