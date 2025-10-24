<?php
/**
 * Footer Options
 *
 * @package landscape_gardening
 */

$wp_customize->add_section(
	'landscape_gardening_footer_options',
	array(
		'panel' => 'landscape_gardening_theme_options',
		'title' => esc_html__( 'Footer Options', 'landscape-gardening' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_footer_separators', array(
	'label' => __( 'Footer Settings', 'landscape-gardening' ),
	'section' => 'landscape_gardening_footer_options',
	'settings' => 'landscape_gardening_footer_separators',
)));

// Footer Section - Enable Section.
$wp_customize->add_setting(
	'landscape_gardening_enable_footer_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_footer_section',
		array(
			'label'    => esc_html__( 'Show / Hide Footer', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_footer_options',
			'settings' => 'landscape_gardening_enable_footer_section',
		)
	)
);

// column // 
$wp_customize->add_setting(
	'landscape_gardening_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'landscape_gardening_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'landscape_gardening_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','landscape-gardening'),
		'description' => __('Note: Default footer widgets are shown. Add your preferred widgets in (Appearance > Widgets > Footer) to see changes.', 'landscape-gardening'),
	    'section' 		=> 'landscape_gardening_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'landscape-gardening' ),
			'1' => __( '1 Column', 'landscape-gardening' ),
			'2' => __( '2 Column', 'landscape-gardening' ),
			'3' => __( '3 Column', 'landscape-gardening' ),
			'4' => __( '4 Column', 'landscape-gardening' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'landscape-gardening'),
    'section' => 'landscape_gardening_footer_options',
)));

// Footer Background Image Setting
$wp_customize->add_setting('footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'landscape-gardening'),
    'section' => 'landscape_gardening_footer_options',
)));

// Footer Background Attachment
$wp_customize->add_setting(
	'landscape_gardening_footer_image_attachment_setting',
	array(
		'default'=> 'scroll',
		'sanitize_callback' => 'landscape_gardening_sanitize_choices'
	)
);

$wp_customize->add_control(
	'landscape_gardening_footer_image_attachment_setting',
	array(
		'type' => 'select',
		'label' => __('Footer Background Attatchment','landscape-gardening'),
		'choices' => array(
			'fixed' => __('fixed','landscape-gardening'),
			'scroll' => __('scroll','landscape-gardening'),
		),
		'section'=> 'landscape_gardening_footer_options',
  	)
);

//Footer Image Position
$wp_customize->add_setting(
	'landscape_gardening_footer_img_position_setting',
	array(
        'default'			=> 'center center',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'landscape_gardening_sanitize_choices',
		
	)
);	

$wp_customize->add_control(
	'landscape_gardening_footer_img_position_setting',
	array(
		'label'   		=> __('Footer Image Position','landscape-gardening'),
	    'section' 		=> 'landscape_gardening_footer_options',
		'type'			=> 'select',
		'choices'       => 
		array(
			'center center'   => __( 'Center', 'landscape-gardening' ),
			'center top'   	  => __( 'Top', 'landscape-gardening' ),
			'center bottom'   => __( 'Bottom', 'landscape-gardening' ),
		) 
	) 
);

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'landscape-gardening'),
    'section' => 'landscape_gardening_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'landscape-gardening'),
        'capitalize' => __('Capitalize', 'landscape-gardening'),
        'uppercase' => __('Uppercase', 'landscape-gardening'),
        'lowercase' => __('Lowercase', 'landscape-gardening'),
    ),
));


// Footer Heading Alignment
$wp_customize->add_setting(
	'landscape_gardening_footer_header_align',
	array(
		'default' 			=> 'left',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'landscape_gardening_footer_header_align',
	array(
		'label' => __('Footer Heading Alignment ','landscape-gardening'),
		'section' => 'landscape_gardening_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','landscape-gardening'),
			'right' => __('Right','landscape-gardening'),
			'center' => __('Center','landscape-gardening'),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_copyright_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_copyright_separators', array(
	'label' => __( 'Copyright Settings', 'landscape-gardening' ),
	'section' => 'landscape_gardening_footer_options',
	'settings' => 'landscape_gardening_copyright_separators',
)));

// Copyright Section - Enable Section.
$wp_customize->add_setting(
	'landscape_gardening_enable_copyright_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_enable_copyright_section',
		array(
			'label'    => esc_html__( 'Show / Hide Copyright', 'landscape-gardening' ),
			'section'  => 'landscape_gardening_footer_options',
			'settings' => 'landscape_gardening_enable_copyright_section',
		)
	)
);

$wp_customize->add_setting(
	'landscape_gardening_footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'landscape_gardening_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'landscape-gardening' ),
		'section'  => 'landscape_gardening_footer_options',
		'settings' => 'landscape_gardening_footer_copyright_text',
		'type'     => 'textarea',
	)
);

//Copyright Alignment
$wp_customize->add_setting(
	'landscape_gardening_footer_bottom_align',
	array(
		'default' 			=> 'center',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'landscape_gardening_footer_bottom_align',
	array(
		'label' => __('Copyright Alignment ','landscape-gardening'),
		'section' => 'landscape_gardening_footer_options',
		'type'			=> 'select',
		'choices' => 
		array(
			'left' => __('Left','landscape-gardening'),
			'right' => __('Right','landscape-gardening'),
			'center' => __('Center','landscape-gardening'),
		),
	)
);

//Copyright Font Size
$wp_customize->add_setting( 
	'landscape_gardening_copyright_font_size', 
	array(
		'default'           => 16,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control( 'landscape_gardening_copyright_font_size', 
	array(
		'type'        => 'number',
		'section'     => 'landscape_gardening_footer_options',
		'label'       => __( 'Copyright Font Size ', 'landscape-gardening' ),
		'input_attrs' => 
		array(
			'min'  => 10,
			'max'  => 100,
			'step' => 1,
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'landscape_gardening_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Landscape_Gardening_Separator_Custom_Control( $wp_customize, 'landscape_gardening_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'landscape-gardening' ),
	'section' => 'landscape_gardening_footer_options',
	'settings' => 'landscape_gardening_scroll_separators',
)));

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'landscape_gardening_scroll_top',
	array(
		'sanitize_callback' => 'landscape_gardening_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Landscape_Gardening_Toggle_Switch_Custom_Control(
		$wp_customize,
		'landscape_gardening_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'landscape-gardening' ),
			'section' => 'landscape_gardening_footer_options',
		)
	)
);
// icon // 
$wp_customize->add_setting(
	'landscape_gardening_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Landscape_Gardening_Change_Icon_Control($wp_customize, 
	'landscape_gardening_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','landscape-gardening'),
	    'section' 		=> 'landscape_gardening_footer_options',
		'iconset' => 'fa',
	))  
);


$wp_customize->add_setting( 'landscape_gardening_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'landscape_gardening_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'landscape_gardening_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'landscape-gardening' ),
    'section'  => 'landscape_gardening_footer_options',
    'settings' => 'landscape_gardening_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'landscape-gardening' ),
        'bottom-left'  => __( 'Bottom Left', 'landscape-gardening' ),
        'bottom-center'=> __( 'Bottom Center', 'landscape-gardening' ),
    ),
) );

$wp_customize->add_setting( 'landscape_gardening_scroll_top_shape', array(
    'default'           => 'box',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'landscape_gardening_scroll_top_shape', array(
    'label'    => __( 'Scroll to Top Button Shape', 'landscape-gardening' ),
    'section'  => 'landscape_gardening_footer_options',
    'settings' => 'landscape_gardening_scroll_top_shape',
    'type'     => 'radio',
    'choices'  => array(
        'box'        => __( 'Box', 'landscape-gardening' ),
        'curved-box' => __( 'Curved Box', 'landscape-gardening' ),
        'circle'     => __( 'Circle', 'landscape-gardening' ),
    ),
) );