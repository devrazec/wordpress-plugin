<?php
/**
 * 404 page
 *
 * @package landscape_gardening
 */

/*=========================================
404 Page
=========================================*/
$wp_customize->add_section(
	'404_pg_options', array(
		'title' => esc_html__( '404 Page', 'landscape-gardening' ),
		'panel' => 'landscape_gardening_theme_options',
	)
);

/*=========================================
404 Page
=========================================*/


//  Title // 
$wp_customize->add_setting(
	'landscape_gardening_pg_404_ttl',
	array(
        'default'			=> __('404 Page Not Found','landscape-gardening'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'landscape_gardening_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'landscape_gardening_pg_404_ttl',
	array(
	    'label'   => __('Title','landscape-gardening'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

$wp_customize->add_setting('landscape_gardening_pg_404_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'landscape_gardening_pg_404_image', array(
        'label'    => __('404 Page Image', 'landscape-gardening'),
        'section'  => '404_pg_options', // Add this section if it doesn't exist
        'settings' => 'landscape_gardening_pg_404_image',
    )));

    // Existing settings for 404 title, text, button label, and link
    $wp_customize->add_setting('landscape_gardening_pg_404_ttl', array(
        'default' => __( '404 Page Not Found', 'landscape-gardening' ),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('landscape_gardening_pg_404_ttl', array(
        'label'    => __('404 Page Title', 'landscape-gardening'),
        'section'  => '404_pg_options',
        'settings' => 'landscape_gardening_pg_404_ttl',
    ));

    $wp_customize->add_setting('landscape_gardening_pg_404_text', array(
        'default' => __( 'Apologies, but the page you are seeking cannot be found.', 'landscape-gardening' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('landscape_gardening_pg_404_text', array(
        'label'    => __('404 Page Text', 'landscape-gardening'),
        'section'  => '404_pg_options',
        'settings' => 'landscape_gardening_pg_404_text',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('landscape_gardening_pg_404_btn_lbl', array(
        'default' => __( 'Go Back Home', 'landscape-gardening' ),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('landscape_gardening_pg_404_btn_lbl', array(
        'label'    => __('404 Button Label', 'landscape-gardening'),
        'section'  => '404_pg_options',
        'settings' => 'landscape_gardening_pg_404_btn_lbl',
    ));

    $wp_customize->add_setting('landscape_gardening_pg_404_btn_link', array(
        'default'           => esc_url(home_url('/')),
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('landscape_gardening_pg_404_btn_link', array(
        'label'    => __('404 Button Link', 'landscape-gardening'),
        'section'  => '404_pg_options',
        'settings' => 'landscape_gardening_pg_404_btn_link',
    ));