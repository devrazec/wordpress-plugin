<?php
/**
 * Typography Setting
 *
 * @package landscape_gardening
 */

// Typography Setting
$wp_customize->add_section(
    'landscape_gardening_typography_setting',
    array(
        'panel' => 'landscape_gardening_theme_options',
        'title' => esc_html__( 'Typography Setting', 'landscape-gardening' ),
    )
);

$wp_customize->add_setting(
    'landscape_gardening_site_title_font',
    array(
        'default'           => 'REM',
        'sanitize_callback' => 'landscape_gardening_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'landscape_gardening_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'landscape-gardening' ),
        'section'  => 'landscape_gardening_typography_setting',
        'settings' => 'landscape_gardening_site_title_font',
        'type'     => 'select',
        'choices'  => landscape_gardening_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'landscape_gardening_site_description_font',
	array(
		'default'           => 'Plus Jakarta Sans',
		'sanitize_callback' => 'landscape_gardening_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'landscape_gardening_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'landscape-gardening' ),
		'section'  => 'landscape_gardening_typography_setting',
		'settings' => 'landscape_gardening_site_description_font',
		'type'     => 'select',
		'choices'  => landscape_gardening_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'landscape_gardening_header_font',
	array(
		'default'           => 'REM',
		'sanitize_callback' => 'landscape_gardening_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'landscape_gardening_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'landscape-gardening' ),
		'section'  => 'landscape_gardening_typography_setting',
		'settings' => 'landscape_gardening_header_font',
		'type'     => 'select',
		'choices'  => landscape_gardening_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'landscape_gardening_content_font',
	array(
		'default'           => 'Plus Jakarta Sans',
		'sanitize_callback' => 'landscape_gardening_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'landscape_gardening_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'landscape-gardening' ),
		'section'  => 'landscape_gardening_typography_setting',
		'settings' => 'landscape_gardening_content_font',
		'type'     => 'select',
		'choices'  => landscape_gardening_get_all_google_font_families(),
	)
);
