<?php
/**
 * Tour Planner eBooking Theme Customizer
 *
 * @package tour-planner-ebooking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function tour_planner_ebooking_customize_register($wp_customize) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$tour_planner_ebooking_post_category_list = tour_planner_ebooking_post_category_list();

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'tour_planner_ebooking_customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'tour_planner_ebooking_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$wp_customize->add_panel('tour_planner_ebooking_panel_id', array(
		'priority'       => 12,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'tour-planner-ebooking'),
	));	

	// font array
	$tour_planner_ebooking_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Coming+Soon' => 'Coming+Soon',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Noto Sans' => 'Noto Sans',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Poppins' => 'Poppins',
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Roboto' => 'Roboto',
        'Roboto Condensed' => 'Roboto Condensed',
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Satisfy' => 'Satisfy',
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Unica One' => 'Unica One',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz'
    );

	$wp_customize->add_section( 'tour_planner_ebooking_typography', array(
    	'title'      => __( 'Typography', 'tour-planner-ebooking' ),
		'priority'   => 30,
		'panel' => 'tour_planner_ebooking_panel_id'
	) );

	$wp_customize->add_setting('tour_planner_ebooking_typography_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_typography_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_typography'
	));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_paragraph_color', array(
		'label' => __('Paragraph Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_paragraph_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'Paragraph Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	$wp_customize->add_setting('tour_planner_ebooking_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_atag_color', array(
		'label' => __('"a" Tag Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_atag_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( '"a" Tag Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_li_color', array(
		'label' => __('"li" Tag Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_li_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( '"li" Tag Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h1_color', array(
		'label' => __('H1 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h1_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'H1 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h1_font_size',array(
		'label'	=> __('h1 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h2_color', array(
		'label' => __('h2 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h2_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'h2 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h2_font_size',array(
		'label'	=> __('h2 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h3_color', array(
		'label' => __('h3 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h3_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'h3 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h3_font_size',array(
		'label'	=> __('h3 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h4_color', array(
		'label' => __('h4 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h4_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'h4 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h4_font_size',array(
		'label'	=> __('h4 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h5_color', array(
		'label' => __('h5 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h5_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'h5 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h5_font_size',array(
		'label'	=> __('h5 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'tour_planner_ebooking_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_h6_color', array(
		'label' => __('h6 Color', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_typography',
		'settings' => 'tour_planner_ebooking_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('tour_planner_ebooking_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_h6_font_family', array(
	    'section'  => 'tour_planner_ebooking_typography',
	    'label'    => __( 'h6 Fonts','tour-planner-ebooking'),
	    'type'     => 'select',
	    'choices'  => $tour_planner_ebooking_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('tour_planner_ebooking_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_h6_font_size',array(
		'label'	=> __('h6 Font Size','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_typography',
		'setting'	=> 'tour_planner_ebooking_h6_font_size',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_background_skin_mode',array(
        'default' => 'Transpert Background',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_background_skin_mode',array(
        'type' => 'select',
        'label' => 'Background Type',
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background','tour-planner-ebooking'),
            'Transpert Background' => __('Transparent Background','tour-planner-ebooking'),
        ),
	) );

	// woocommerce section
	$wp_customize->add_section('tour_planner_ebooking_woocommerce_settings', array(
		'title'    => __('WooCommerce Settings', 'tour-planner-ebooking'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

   	$wp_customize->add_setting( 'tour_planner_ebooking_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ) );
   	$wp_customize->add_control('tour_planner_ebooking_shop_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Woocommerce Page Sidebar','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_woocommerce_settings'
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('tour_planner_ebooking_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_woocommerce_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-planner-ebooking'),
			'Right Sidebar' => __('Right Sidebar', 'tour-planner-ebooking'),
		),
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_wocommerce_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ) );
   	$wp_customize->add_control('tour_planner_ebooking_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Show / Hide Single Product Page Sidebar','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_woocommerce_settings'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('tour_planner_ebooking_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_woocommerce_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-planner-ebooking'),
			'Right Sidebar' => __('Right Sidebar', 'tour-planner-ebooking'),
		),
	));

	$wp_customize->add_setting('tour_planner_ebooking_show_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   $wp_customize->add_control('tour_planner_ebooking_show_related_products',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Related Product','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_woocommerce_settings',
    ));

	$wp_customize->add_setting('tour_planner_ebooking_show_wooproducts_border',array(
       'default' => false,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   $wp_customize->add_control('tour_planner_ebooking_show_wooproducts_border',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Product Border','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_woocommerce_settings',
    ));

   $wp_customize->add_setting( 'tour_planner_ebooking_wooproducts_per_columns' , array(
		'default'           => 4,
		'transport'         => 'refresh',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_wooproducts_per_columns', array(
		'label'    => __( 'Display Product Per Columns', 'tour-planner-ebooking' ),
		'section'  => 'tour_planner_ebooking_woocommerce_settings',
		'type'     => 'select',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	)  );

	$wp_customize->add_setting('tour_planner_ebooking_wooproducts_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));	
	$wp_customize->add_control('tour_planner_ebooking_wooproducts_per_page',array(
		'label'	=> __('Display Product Per Page','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_woocommerce_settings',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_top_bottom_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control( 'tour_planner_ebooking_top_bottom_wooproducts_padding',	array(
		'label' => esc_html__( 'Top Bottom Product Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_left_right_wooproducts_padding',array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control( 'tour_planner_ebooking_left_right_wooproducts_padding',	array(
		'label' => esc_html__( 'Right Left Product Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_wooproducts_border_radius',array(
		'default' => 0,
		'sanitize_callback'    => 'tour_planner_ebooking_sanitize_number_range',
	));
	$wp_customize->add_control('tour_planner_ebooking_wooproducts_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_wooproducts_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'tour_planner_ebooking_sanitize_number_range',
	));
	$wp_customize->add_control('tour_planner_ebooking_wooproducts_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	));

	$wp_customize->add_setting('tour_planner_ebooking_products_navigation',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_choices'
    ));
   $wp_customize->add_control('tour_planner_ebooking_products_navigation',array(
       'type' => 'radio',
       'label' => __('Woocommerce Products Navigation','tour-planner-ebooking'),
       'choices' => array(
            'Yes' => __('Yes','tour-planner-ebooking'),
            'No' => __('No','tour-planner-ebooking'),
        ),
       'section' => 'tour_planner_ebooking_woocommerce_settings',
    ));

	$wp_customize->add_setting( 'tour_planner_ebooking_top_bottom_product_button_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_top_bottom_product_button_padding',	array(
		'label' => esc_html__( 'Product Button Top Bottom Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'tour_planner_ebooking_left_right_product_button_padding',array(
		'default' => 16,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_left_right_product_button_padding',array(
		'label' => esc_html__( 'Product Button Right Left Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_product_button_border_radius',array(
		'default' => 3,
		'sanitize_callback'    => 'tour_planner_ebooking_sanitize_number_range',
	));
	$wp_customize->add_control('tour_planner_ebooking_product_button_border_radius',array(
		'label' => esc_html__( 'Product Button Border Radius','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'type'		=> 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('tour_planner_ebooking_align_product_sale',array(
        'default' => 'Right',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_align_product_sale',array(
        'type' => 'radio',
        'label' => __('Product Sale Button Alignment','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_woocommerce_settings',
        'choices' => array(
            'Right' => __('Right','tour-planner-ebooking'),
            'Left' => __('Left','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_border_radius_product_sale',array(
		'default' => 50,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_border_radius_product_sale', array(
        'label'  => __('Product Sale Button Border Radius','tour-planner-ebooking'),
        'section'  => 'tour_planner_ebooking_woocommerce_settings',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    ) );

	$wp_customize->add_setting('tour_planner_ebooking_product_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_product_sale_font_size',array(
		'label'	=> __('Product Sale Button Font Size','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_woocommerce_settings',
		'type'=> 'number'
	));

	// sale button padding
	$wp_customize->add_setting( 'tour_planner_ebooking_sale_padding_top',array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control( 'tour_planner_ebooking_sale_padding_top',	array(
		'label' => esc_html__( ' Product Sale Top Bottom Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_sale_padding_left',array(
		'default' => 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control( 'tour_planner_ebooking_sale_padding_left',	array(
		'label' => esc_html__( ' Product Sale Left Right Padding','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_woocommerce_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'tour_planner_ebooking_theme_color_option', array( 
		'panel' => 'tour_planner_ebooking_panel_id', 
		'title' => esc_html__( 
		'Theme Color Option', 'tour-planner-ebooking' ) )
	);

	$wp_customize->add_setting('tour_planner_ebooking_theme_color_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_theme_color_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_theme_color_option'
	));

  	$wp_customize->add_setting( 'tour_planner_ebooking_theme_color_first', array(
	    'default' => '#0279E7',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_theme_color_first', array(
  		'label' => 'Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_theme_color_option',
	    'settings' => 'tour_planner_ebooking_theme_color_first',
  	)));

	//Top Bar
	$wp_customize->add_section('tour_planner_ebooking_topbar',array(
		'title'	=> __('Topbar Section','tour-planner-ebooking'),
		'description'	=> __('Add topbar content','tour-planner-ebooking'),
		'priority'	=> null,
		'panel' => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_topbar_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_topbar_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_topbar'
	));

	$wp_customize->add_setting('tour_planner_ebooking_purchase_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('tour_planner_ebooking_purchase_btn_text',array(
		'label'	=> __('Add Button Text','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_topbar',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_purchase_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('tour_planner_ebooking_purchase_btn_url',array(
		'label'	=> __('Add Button URL','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_topbar',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tour_planner_ebooking_book_btn_icon',array(
		'default'	=> 'fa-solid fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_book_btn_icon',array(
		'label'	=> __('Add Category Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_topbar',
		'setting'	=> 'tour_planner_ebooking_book_btn_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_myaccount_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('tour_planner_ebooking_myaccount_btn_url',array(
		'label'	=> __('Add Account URL','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_topbar',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tour_planner_ebooking_myaccount_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_myaccount_icon',array(
		'label'	=> __('Add Account Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_topbar',
		'setting'	=> 'tour_planner_ebooking_myaccount_icon',
		'type'		=> 'icon'
	)));

	//menu settings
	$wp_customize->add_section('tour_planner_ebooking_menu_setting',array(
		'title'	=> __('Menus Settings','tour-planner-ebooking'),
		'description'	=> __('Add menus content','tour-planner-ebooking'),
		'priority'	=> null,
		'panel' => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_menus_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_menus_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_menu_setting'
	));

	$wp_customize->add_setting('tour_planner_ebooking_text_tranform_menu',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
 	));
 	$wp_customize->add_control('tour_planner_ebooking_text_tranform_menu',array(
		'type' => 'radio',
		'label' => __('Menu Text Transform','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_menu_setting',
		'choices' => array(
		   'Uppercase' => __('Uppercase','tour-planner-ebooking'),
		   'Lowercase' => __('Lowercase','tour-planner-ebooking'),
		   'Capitalize' => __('Capitalize','tour-planner-ebooking'),
		),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_menus_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_menus_font_size',array(
		'label'	=> __('Menus Font Size','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_menu_setting',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_menu_weight',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_menu_weight',array(
		'label'	=> __('Menus Font Weight','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_menu_setting',
		'type' => 'select',
		'choices' => array(
            '100' => __('100','tour-planner-ebooking'),
            '200' => __('200','tour-planner-ebooking'),
            '300' => __('300','tour-planner-ebooking'),
            '400' => __('400','tour-planner-ebooking'),
            '500' => __('500','tour-planner-ebooking'),
            '600' => __('600','tour-planner-ebooking'),
            '700' => __('700','tour-planner-ebooking'),
            '800' => __('800','tour-planner-ebooking'),
            '900' => __('900','tour-planner-ebooking'),
        ),
	));

	$wp_customize->add_setting('tour_planner_ebooking_menus_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_menus_padding',array(
		'label'	=> __('Menus Padding','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_menu_setting',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_menus_item_style',array(
        'type' => 'select',
        'section' => 'tour_planner_ebooking_menu_setting',
		'label' => __('Menu Hover Effect','tour-planner-ebooking'),
		'choices' => array(
            'None' => __('None','tour-planner-ebooking'),
            'Zoom In' => __('Zoom In','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_menu_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_menu_color_settings', array(
  		'label' => __('Menu Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_menu_setting',
	    'settings' => 'tour_planner_ebooking_menu_color_settings',
  	)));

  	$wp_customize->add_setting( 'tour_planner_ebooking_menu_hover_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_menu_hover_color_settings', array(
  		'label' => __('Menu Hover Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_menu_setting',
	    'settings' => 'tour_planner_ebooking_menu_hover_color_settings',
  	)));
 
  	$wp_customize->add_setting( 'tour_planner_ebooking_submenu_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_submenu_color_settings', array(
  		'label' => __('Sub-menu Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_menu_setting',
	    'settings' => 'tour_planner_ebooking_submenu_color_settings',
  	)));

  	$wp_customize->add_setting( 'tour_planner_ebooking_submenu_hover_color_settings', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_submenu_hover_color_settings', array(
  		'label' => __('Sub-menu Hover Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_menu_setting',
	    'settings' => 'tour_planner_ebooking_submenu_hover_color_settings',
  	)));

	//Slider
	$wp_customize->add_section( 'tour_planner_ebooking_slider' , array(
    	'title'      => __( 'Slider Settings', 'tour-planner-ebooking' ),
		'priority'   => null,
		'panel' => 'tour_planner_ebooking_panel_id'
	) );

	$wp_customize->add_setting('tour_planner_ebooking_slider_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_slider_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','tour-planner-ebooking'),
		'description' => "<ul><li>". esc_html__('You can change how many slides there are.','tour-planner-ebooking') ."</li><li>". esc_html__('You can change the font family and the colours of headings.','tour-planner-ebooking') ."</li><li>". esc_html__('And so on...','tour-planner-ebooking') ."</li></ul><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_slider'
	));

	$wp_customize->add_setting('tour_planner_ebooking_slide_number',array(
		'default'	=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_slide_number',array(
		'label'	=> __('Number of slides to show','tour-planner-ebooking'),
		'description' => __('Add Max 3 number Of slide and refresh page','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_slider',
		'type'		=> 'select',
		'choices'  => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
		),
	));

	$tour_planner_ebooking_count =  get_theme_mod('tour_planner_ebooking_slide_number');

	for($tour_planner_ebooking_i=1; $tour_planner_ebooking_i<=$tour_planner_ebooking_count; $tour_planner_ebooking_i++) {		

		$wp_customize->add_setting('tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i,array(
	      'label' => __('Slider Background Image','tour-planner-ebooking'),
			'description' => __('Image Size (1200px x 600px)','tour-planner-ebooking'),
	      'section' => 'tour_planner_ebooking_slider'
		)));

	 	$wp_customize->add_setting('tour_planner_ebooking_slider_title'.$tour_planner_ebooking_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('tour_planner_ebooking_slider_title'.$tour_planner_ebooking_i,array(
			'label'	=> __('Slider Title','tour-planner-ebooking'),
			'input_attrs' => array(
	        'placeholder' => __( 'Discover the most engaging places', 'tour-planner-ebooking' ),
	        ),
			'type'	=> 'text',
			'section'	=> 'tour_planner_ebooking_slider',
		));

	 	$wp_customize->add_setting('tour_planner_ebooking_slider_text'.$tour_planner_ebooking_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('tour_planner_ebooking_slider_text'.$tour_planner_ebooking_i,array(
			'label'	=> __('Slider Content','tour-planner-ebooking'),
			'input_attrs' => array(
	        'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'tour-planner-ebooking' ),
	        ),
			'type'		=> 'text',
			'section'	=> 'tour_planner_ebooking_slider',
		));
	}

	$wp_customize->add_setting('tour_planner_ebooking_banner_form_hide_show',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_planner_ebooking_banner_form_hide_show',array(
     	'type' => 'checkbox',
      'label' => __('Show / Hide Form','tour-planner-ebooking'),
      'section' => 'tour_planner_ebooking_slider',
	));

 	$wp_customize->add_setting('tour_planner_ebooking_banner_form_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_banner_form_shortcode',array(
		'label'	=> __('Add Contact Form Shortcode','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_slider',
		'type'=> 'text',
	));

	//Best Category Section
	$wp_customize->add_section('tour_planner_ebooking_tour_section',array(
		'title'	=> __('Best Category Section','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_category_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_category_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','tour-planner-ebooking'),
		'description' => "<ul><li>". esc_html__('Includes settings to set section title.','tour-planner-ebooking') ."</li><li>". esc_html__('Contains settings for the background colour.','tour-planner-ebooking') ."</li><li>". esc_html__('Contains options for background images.','tour-planner-ebooking') ."</li><li>". esc_html__('You can change the font family and colours of heading.','tour-planner-ebooking') ."</li><li>". esc_html__('And so on...','tour-planner-ebooking') ."</li></ul><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_tour_section'
	));

	$wp_customize->add_setting('tour_planner_ebooking_tour_section_text',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tour_planner_ebooking_tour_section_text',array(
	    'label' => __('Section Text','tour-planner-ebooking'),
	    'input_attrs' => array(
	        'placeholder' => __( 'Our Best Category', 'tour-planner-ebooking' ),
	        ),
	    'section' => 'tour_planner_ebooking_tour_section',
	    'type'  => 'text'
   	));

	$wp_customize->add_setting('tour_planner_ebooking_tour_section_title',array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_text_field',
   	));
   	$wp_customize->add_control('tour_planner_ebooking_tour_section_title',array(
	    'label' => __('Section Title','tour-planner-ebooking'),
	    'input_attrs' => array(
	        'placeholder' => __( 'Make your holiday perfect', 'tour-planner-ebooking' ),
	        ),
	    'section' => 'tour_planner_ebooking_tour_section',
	    'type'  => 'text'
   	));

   	$wp_customize->add_setting('tour_planner_ebooking_category_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('tour_planner_ebooking_category_btn_text',array(
		'label'	=> __('Add Button Text','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_tour_section',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_category_btn_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control('tour_planner_ebooking_category_btn_url',array(
		'label'	=> __('Add Button URL','tour-planner-ebooking'),
		'section'	=> 'tour_planner_ebooking_tour_section',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('tour_planner_ebooking_category_btn_icon',array(
		'default'	=> 'fa-solid fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_category_btn_icon',array(
		'label'	=> __('Add Category Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_tour_section',
		'setting'	=> 'tour_planner_ebooking_category_btn_icon',
		'type'		=> 'icon'
	)));

	$tour_planner_ebooking_categories = get_categories( array(
	    'hide_empty' => false,
	) );

	$tour_planner_ebooking_post_category_list = array();

	if ( ! empty( $tour_planner_ebooking_categories ) ) {
	    foreach ( $tour_planner_ebooking_categories as $tour_planner_ebooking_category ) {
	        $tour_planner_ebooking_post_category_list[$tour_planner_ebooking_category->slug] = $tour_planner_ebooking_category->name;
	    }
	}

   	for ($tour_planner_ebooking_j = 1; $tour_planner_ebooking_j <= 4; $tour_planner_ebooking_j++) {
	    $wp_customize->add_setting( 'tour_planner_ebooking_category_cat'.$tour_planner_ebooking_j,array(
	     	'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	        )
	    );
	    $wp_customize->add_control( 'tour_planner_ebooking_category_cat'.$tour_planner_ebooking_j, array(
	        'label'       => esc_html__( 'Select Category', 'tour-planner-ebooking' ),
	        'section'     => 'tour_planner_ebooking_tour_section',
	        'type'        => 'select',
	        'choices'     => $tour_planner_ebooking_post_category_list,
	        )
	    );

		$wp_customize->add_setting( 'tour_planner_ebooking_cat_small_text'.$tour_planner_ebooking_j, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( 'tour_planner_ebooking_cat_small_text'.$tour_planner_ebooking_j, array(
			'label'    => __( 'Add Small Text', 'tour-planner-ebooking' ),
			'input_attrs' => array(
	            'placeholder' => __( '$600', 'tour-planner-ebooking' ),
	        ),
			'section'  => 'tour_planner_ebooking_tour_section',
			'type'     => 'text',
		) );

		$wp_customize->add_setting('tour_planner_ebooking_category_icon'.$tour_planner_ebooking_j,array(
			'default'	=> 'fa-solid fa-person-hiking',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
	        $wp_customize,'tour_planner_ebooking_category_icon'.$tour_planner_ebooking_j,array(
			'label'	=> __('Add Category Icon','tour-planner-ebooking'),
			'transport' => 'refresh',
			'section'	=> 'tour_planner_ebooking_tour_section',
			'setting'	=> 'tour_planner_ebooking_category_icon'.$tour_planner_ebooking_j,
			'type'		=> 'icon'
		)));
	}

	//404 Page Setting
	$wp_customize->add_section('tour_planner_ebooking_404_page_setting',array(
		'title'	=> __('404 Page','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_404_page_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_404_page_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_404_page_setting'
	));

	$wp_customize->add_setting('tour_planner_ebooking_title_404_page',array(
		'default'=> __('404 Not Found','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_title_404_page',array(
		'label'	=> __('404 Page Title','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_content_404_page',array(
		'default'=> __('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_content_404_page',array(
		'label'	=> __('404 Page Content','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_404_page_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_404_page',array(
		'default'=> __('Back to Home Page','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_button_404_page',array(
		'label'	=> __('404 Page Button','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_404_page_setting',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_section('tour_planner_ebooking_blog_post',array(
		'title'	=> __('Blog Post Settings','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_blog_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_blog_post_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_blog_post'
	));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_date_hide', array(
		'selector' => '.our-services .page-box',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_date_hide',
	));

	$wp_customize->add_setting('tour_planner_ebooking_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_date_icon',array(
		'label'	=> __('Post Date Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_comment_icon',array(
		'label'	=> __('Comments Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_author_icon',array(
		'label'	=> __('Author Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Time','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_time_icon',array(
		'label'	=> __('Time Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_show_post_category',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_show_post_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Category','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

    $wp_customize->add_setting('tour_planner_ebooking_show_featured_image_post',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_show_featured_image_post',array(
       'type' => 'checkbox',
       'label' => __('Blog Post Image','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

    //blog post img radius
    $wp_customize->add_setting( 'tour_planner_ebooking_featured_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_featured_img_border_radius', array(
		'label'       => esc_html__( 'Blog Post Image Border Radius','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_blog_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_featured_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_featured_img_box_shadow',array(
		'label' => esc_html__( 'Blog Post Image Shadow','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'tour_planner_ebooking_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'tour-planner-ebooking'),
		'type' => 'checkbox',
		'section' => 'tour_planner_ebooking_blog_post',
	));

   $wp_customize->add_setting('tour_planner_ebooking_blog_post_description_option',array(
    	'default'   => 'Excerpt Content',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_blog_post',
        'choices' => array(
            'No Content' => __('No Content','tour-planner-ebooking'),
            'Excerpt Content' => __('Excerpt Content','tour-planner-ebooking'),
            'Full Content' => __('Full Content','tour-planner-ebooking'),
        ),
	) );

    $wp_customize->add_setting( 'tour_planner_ebooking_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_blog_post',
		'type'        => 'number',
		'settings'    => 'tour_planner_ebooking_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_post_suffix_option', array(
		'default'   => __('...','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_blog_post',
		'type'        => 'text',
		'settings'    => 'tour_planner_ebooking_post_suffix_option',
	) );

    $wp_customize->add_setting( 'tour_planner_ebooking_metabox_separator_blog_post', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_metabox_separator_blog_post', array(
		'label'       => esc_html__( 'Meta Box Separator','tour-planner-ebooking' ),
		'input_attrs' => array(
        'placeholder' => __( 'Add Meta Separator. e.g.: "|", "/", etc.', 'tour-planner-ebooking' ),
        	),
		'section'     => 'tour_planner_ebooking_blog_post',
		'type'        => 'text',
		'settings'    => 'tour_planner_ebooking_metabox_separator_blog_post',
	) );

	$wp_customize->add_setting('tour_planner_ebooking_display_blog_page_post',array(
        'default' => 'In Box',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_display_blog_page_post',array(
        'type' => 'radio',
        'label' => __('Display Blog Page Post :','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_blog_post',
        'choices' => array(
            'In Box' => __('In Box','tour-planner-ebooking'),
            'Without Box' => __('Without Box','tour-planner-ebooking'),
        ),
	) );

    $wp_customize->add_setting('tour_planner_ebooking_blog_post_alignment',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_blog_post_alignment',array(
	    'type' => 'select',
	    'label' => __('Blog Post Alignment','tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_blog_post',
	    'choices' => array(
	    	'Left' => __('Left','tour-planner-ebooking'),
	        'Center' => __('Center','tour-planner-ebooking'),
	        'Right' => __('Right','tour-planner-ebooking')
	    ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_blog_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   $wp_customize->add_control('tour_planner_ebooking_blog_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Pagination in Blog Page','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_blog_post'
    ));

	$wp_customize->add_setting( 'tour_planner_ebooking_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_choices'
    ));
    $wp_customize->add_control( 'tour_planner_ebooking_pagination_settings', array(
        'section' => 'tour_planner_ebooking_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'tour-planner-ebooking' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'tour-planner-ebooking' ),
            'next-prev' => __( 'Next / Previous', 'tour-planner-ebooking' ),
    )));

    $wp_customize->add_setting('tour_planner_ebooking_pagination_alignment',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_pagination_alignment',array(
	    'type' => 'select',
	    'label' => __('Pagination Alignment','tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_blog_post',
	    'choices' => array(
	    	'Left' => __('Left','tour-planner-ebooking'),
	        'Center' => __('Center','tour-planner-ebooking'),
	        'Right' => __('Right','tour-planner-ebooking')
	    ),
	) );

	// Button
	$wp_customize->add_section( 'tour_planner_ebooking_theme_button', array(
		'title' => __('Button Option','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_button_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_theme_button'
	));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_button_text', array(
		'selector' => '.page-box .new-text .read-more-btn',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_button_text',
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_text',array(
		'default'=> __('Read More','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_button_text',array(
		'label'	=> __('Add Button Text','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_theme_button',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_button_font_size',array(
		'label'	=> __('Button Font Size','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_font_weight',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_button_font_weight',array(
		'label'	=> __('Button Font Weight','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_theme_button',
		'type' => 'select',
		'choices' => array(
            '100' => __('100','tour-planner-ebooking'),
            '200' => __('200','tour-planner-ebooking'),
            '300' => __('300','tour-planner-ebooking'),
            '400' => __('400','tour-planner-ebooking'),
            '500' => __('500','tour-planner-ebooking'),
            '600' => __('600','tour-planner-ebooking'),
            '700' => __('700','tour-planner-ebooking'),
            '800' => __('800','tour-planner-ebooking'),
            '900' => __('900','tour-planner-ebooking'),
        ),
	));

	// button letter spacing
	$wp_customize->add_setting( 'tour_planner_ebooking_button_letter_spacing',array(
		'default' => '',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_button_letter_spacing', array(
		'label'  =>  esc_html__('Button Letter Spacing','tour-planner-ebooking'),
		'type'=> 'number',
		'section'  => 'tour_planner_ebooking_theme_button',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		)
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_text_transform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
 	));
 	$wp_customize->add_control('tour_planner_ebooking_button_text_transform',array(
		'type' => 'radio',
		'label' => __('Button Text Transform','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_theme_button',
		'choices' => array(
		   'Uppercase' => __('Uppercase','tour-planner-ebooking'),
		   'Lowercase' => __('Lowercase','tour-planner-ebooking'),
		   'Capitalize' => __('Capitalize','tour-planner-ebooking'),
		),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_button_padding_top_bottom',array(
		'label'	=> __('Top and Bottom Padding','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_button_padding_left_right',array(
		'label'	=> __('Left and Right Padding','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_theme_button',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_theme_button',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Single Post Settings
	$wp_customize->add_section('tour_planner_ebooking_single_post',array(
		'title'	=> __('Single Post Settings','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_single_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_single_post_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_single_post'
	));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_single_post_date_hide', array(
		'selector' => '.single-post .page-box-single',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_single_post_date_hide',
	));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_single_post_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Date','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_single_post_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_single_post_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Comments','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_single_post_comment_icon',array(
		'label'	=> __('Single Post Comments Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_single_post_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_single_post_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Author','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_single_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_single_post_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_single_post_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Time','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_single_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'tour_planner_ebooking_single_post_breadcrumb',array(
		'default' => false,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_planner_ebooking_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','tour-planner-ebooking' ),
        'section' => 'tour_planner_ebooking_single_post'
    ));

   	$wp_customize->add_setting('tour_planner_ebooking_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   	$wp_customize->add_control('tour_planner_ebooking_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

   	$wp_customize->add_setting('tour_planner_ebooking_show_featured_image_single_post',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   	$wp_customize->add_control('tour_planner_ebooking_show_featured_image_single_post',array(
       'type' => 'checkbox',
       'label' => __('Single Post Image','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

   	//single post img radius
    $wp_customize->add_setting( 'tour_planner_ebooking_single_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_single_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_single_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_single_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','tour-planner-ebooking' ),
		'section' => 'tour_planner_ebooking_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'tour_planner_ebooking_single_post_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'tour-planner-ebooking'),
		'type' => 'checkbox',
		'section' => 'tour_planner_ebooking_single_post',
	));

   	$wp_customize->add_setting('tour_planner_ebooking_show_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   	$wp_customize->add_control('tour_planner_ebooking_show_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Single Post Pagination','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

   	$wp_customize->add_setting( 'tour_planner_ebooking_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	) );
	$wp_customize->add_control('tour_planner_ebooking_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Single Post Comment Box','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_single_post'
	));

	$wp_customize->add_setting('tour_planner_ebooking_category_show_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_category_show_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Category','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

    $wp_customize->add_setting('tour_planner_ebooking_title_comment_form',array(
       'default' => __('Leave a Reply','tour-planner-ebooking'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_planner_ebooking_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

    $wp_customize->add_setting('tour_planner_ebooking_comment_form_button_content',array(
       'default' => __('Post Comment','tour-planner-ebooking'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('tour_planner_ebooking_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_single_post'
    ));

    //Comment Textarea Width
    $wp_customize->add_setting( 'tour_planner_ebooking_comment_width', array(
		'default'=> '100',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(
	    'tour_planner_ebooking_comment_width', array(
		'label'  => __('Comment Textarea Width','tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_single_post',
		'description' => __('Measurement is in %.','tour-planner-ebooking'),
		'input_attrs' => array(
		   'step'=> 1,
		   'min' => 0,
		   'max' => 100,
		),
		'type'		=> 'number'
    ));

    $wp_customize->add_setting( 'tour_planner_ebooking_single_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_single_post',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','tour-planner-ebooking'),
		'type'        => 'text',
		'settings'    => 'tour_planner_ebooking_single_post_meta_seperator',
	) );

	//Grid Post Settings
	$wp_customize->add_section('tour_planner_ebooking_grid_post',array(
		'title'	=> __('Grid Post Settings','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_grid_post_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_grid_post'
	));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_grid_post_date',array(
       'type' => 'checkbox',
       'label' => __('Post Date','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_grid_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_grid_post_date_icon',array(
		'label'	=> __('Post Date Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_grid_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_grid_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Post Comment','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_grid_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_grid_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_grid_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_grid_post_author',array(
       'type' => 'checkbox',
       'label' => __('Post Author','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_grid_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_author_icon',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_grid_post_author_icon',array(
		'label'	=> __('Post Author Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_grid_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_grid_post_time',array(
       'type' => 'checkbox',
       'label' => __('Post Time','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_grid_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_grid_post_time_icon',array(
		'label'	=> __('Post Time Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_grid_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_grid_post_alignment',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_grid_post_alignment',array(
	    'type' => 'select',
	    'label' => __('Grid Post Alignment','tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_grid_post',
	    'choices' => array(
	    	'Left' => __('Left','tour-planner-ebooking'),
	        'Center' => __('Center','tour-planner-ebooking'),
	        'Right' => __('Right','tour-planner-ebooking')
	    ),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_grid_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_grid_post',
		'type'        => 'number',
		'settings'    => 'tour_planner_ebooking_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'tour_planner_ebooking_grid_post_suffix_option', array(
		'default'   => __('...','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_grid_post_suffix_option', array(
		'label'       => esc_html__( 'Post Excerpt Indicator Option','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_grid_post',
		'type'        => 'text',
		'settings'    => 'tour_planner_ebooking_grid_post_suffix_option',
	) );

    $wp_customize->add_setting( 'tour_planner_ebooking_metabox_separator_grid_post', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_metabox_separator_grid_post', array(
		'label'       => esc_html__( 'Meta Box Separator','tour-planner-ebooking' ),
		'input_attrs' => array(
        'placeholder' => __( 'Add Meta Separator. e.g.: "|", "/", etc.', 'tour-planner-ebooking' ),
        	),
		'section'     => 'tour_planner_ebooking_grid_post',
		'type'        => 'text',
		'settings'    => 'tour_planner_ebooking_metabox_separator_grid_post',
	) );

	$wp_customize->add_setting('tour_planner_ebooking_show_featured_image_grid_post',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_show_featured_image_grid_post',array(
       'type' => 'checkbox',
       'label' => __('Grid Post Image','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_grid_post'
    ));

    //blog post img radius
    $wp_customize->add_setting( 'tour_planner_ebooking_img_border_radius_grid_post', array(
		'default'=> 0,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	) );
	$wp_customize->add_control( 'tour_planner_ebooking_img_border_radius_grid_post', array(
		'label'       => esc_html__( 'Grid Post Image Border Radius','tour-planner-ebooking' ),
		'section'     => 'tour_planner_ebooking_grid_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_display_grid_page_post',array(
        'default' => 'In Box',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_display_grid_page_post',array(
        'type' => 'radio',
        'label' => __('Display Grid Post Box:','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_grid_post',
        'choices' => array(
            'In Box' => __('In Box','tour-planner-ebooking'),
            'Without Box' => __('Without Box','tour-planner-ebooking'),
        ),
	) );

	//Related Post Settings
	$wp_customize->add_section('tour_planner_ebooking_related_post',array(
		'title'	=> __('Related Post Settings','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_related_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_related_post_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_related_post'
	));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_show_related_post', array(
		'selector' => '.related-posts',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_show_related_post',
	));

	$wp_customize->add_setting( 'tour_planner_ebooking_show_related_post',array(
		'default' => true,
      	'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ) );
   	$wp_customize->add_control('tour_planner_ebooking_show_related_post',array(
    	'type' => 'checkbox',
        'label' => __( 'Related Post','tour-planner-ebooking' ),
        'section' => 'tour_planner_ebooking_related_post'
    ));

   	$wp_customize->add_setting('tour_planner_ebooking_related_posts_taxanomies_options',array(
        'default' => 'categories',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_related_posts_taxanomies_options',array(
        'type' => 'radio',
        'label' => __('Related Post Taxonomies','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_related_post',
        'choices' => array(
            'categories' => __('Categories','tour-planner-ebooking'),
            'tags' => __('Tags','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_related_post_title',array(
		'default'=> __('Related Posts','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_related_post_title',array(
		'label'	=> __('Related Post Title','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_related_post',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('tour_planner_ebooking_show_featured_image_related_post',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   	$wp_customize->add_control('tour_planner_ebooking_show_featured_image_related_post',array(
       'type' => 'checkbox',
       'label' => __('Related Post Image','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_related_post'
    ));

   	$wp_customize->add_setting('tour_planner_ebooking_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_related_posts_number',array(
		'label'	=> __('Related Post Number','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_related_post',
		'type'=> 'number',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('tour_planner_ebooking_related_post_excerpt_number',array(
		'default'=> 20,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_related_post_excerpt_number',array(
		'label'	=> __('Related Post Content Limit','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_related_post',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('tour_planner_ebooking_related_post_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_related_post_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_related_post'
    ));

	$wp_customize->add_setting('tour_planner_ebooking_related_post_date_icon',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_related_post_date_icon',array(
		'label'	=> __('Post Date Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_related_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_related_button_text',array(
		'default'=> esc_html__('Read More','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','tour-planner-ebooking'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'tour-planner-ebooking' ),
        ),
		'section'=> 'tour_planner_ebooking_related_post',
		'type'=> 'text'
	));

	//Layouts
	$wp_customize->add_section('tour_planner_ebooking_left_right', array(
		'title'    => __('Layout Settings', 'tour-planner-ebooking'),
		'priority' => null,
		'panel'    => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_left_right_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_left_right_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_left_right'
	));

	$wp_customize->add_setting('tour_planner_ebooking_theme_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','tour-planner-ebooking'),
        'description' => __('Here you can change the Width layout. ','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_left_right',
        'choices' => array(
            'Default' => __('Default','tour-planner-ebooking'),
            'Container' => __('Container','tour-planner-ebooking'),
            'Box Container' => __('Box Container','tour-planner-ebooking'),
        ),
	));

	$wp_customize->add_setting('tour_planner_ebooking_preloader_option',array(
       'default' => false,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
   $wp_customize->add_control('tour_planner_ebooking_preloader_option',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Preloader','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_left_right'
    ));

  	$wp_customize->add_setting('tour_planner_ebooking_preloader_type_options', array(
		'default'           => 'Preloader 1',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_preloader_type_options',array(
		'type'           => 'radio',
		'label'          => __('Preloader Type', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_left_right',
		'choices'        => array(
			'Preloader 1'  => __('Preloader 1', 'tour-planner-ebooking'),
			'Preloader 2' => __('Preloader 2', 'tour-planner-ebooking'),
		),
	));

	$wp_customize->add_setting('tour_planner_ebooking_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tour_planner_ebooking_preloader_bg_image',array(
        'label' => __('Preloader Background Image','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_left_right'
	)));

   	$wp_customize->add_setting( 'tour_planner_ebooking_loader_background_color_first', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_loader_background_color_first', array(
  		'label' => __('Background Color for Preloader', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_left_right',
	    'settings' => 'tour_planner_ebooking_loader_background_color_first',
  	)));

	$wp_customize->add_setting( 'tour_planner_ebooking_breadcrumb_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_breadcrumb_color', array(
  		'label' => __('Breadcrumb Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_left_right',
	    'settings' => 'tour_planner_ebooking_breadcrumb_color',
  	)));

  	$wp_customize->add_setting( 'tour_planner_ebooking_breadcrumb_bg_color', array(
	    'default' => '#0279E7',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_breadcrumb_bg_color', array(
  		'label' => __('Breadcrumb Background Color', 'tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_left_right',
	    'settings' => 'tour_planner_ebooking_breadcrumb_bg_color',
  	)));

   	$wp_customize->add_setting( 'tour_planner_ebooking_single_page_breadcrumb',array(
		'default' => false,
      	'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ) );
    $wp_customize->add_control('tour_planner_ebooking_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','tour-planner-ebooking' ),
        'section' => 'tour_planner_ebooking_left_right'
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('tour_planner_ebooking_layout_options', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Blog Page Layouts', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-planner-ebooking'),
			'Right Sidebar' => __('Right Sidebar', 'tour-planner-ebooking'),
			'One Column'    => __('One Column', 'tour-planner-ebooking'),
			'Three Columns' => __('Three Columns', 'tour-planner-ebooking'),
			'Four Columns'  => __('Four Columns', 'tour-planner-ebooking'),
			'Grid Layout'   => __('Grid Layout', 'tour-planner-ebooking')
		),
	));

	$wp_customize->add_setting('tour_planner_ebooking_single_post_sidebar_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_single_post_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Post Layouts', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-planner-ebooking'),
			'Right Sidebar' => __('Right Sidebar', 'tour-planner-ebooking'),
			'One Column'    => __('One Column', 'tour-planner-ebooking'),
		),
	));

	$wp_customize->add_setting('tour_planner_ebooking_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
	));
	$wp_customize->add_control('tour_planner_ebooking_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'tour-planner-ebooking'),
		'section'        => 'tour_planner_ebooking_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tour-planner-ebooking'),
			'Right Sidebar' => __('Right Sidebar', 'tour-planner-ebooking'),
			'One Column'    => __('One Column', 'tour-planner-ebooking'),
		),
	));

	//no Result Found
	$wp_customize->add_section('tour_planner_ebooking_noresult_found',array(
		'title'	=> __('No Result Found','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));	

	$wp_customize->add_setting('tour_planner_ebooking_noresult_found_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_noresult_found_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_noresult_found'
	));

	$wp_customize->add_setting('tour_planner_ebooking_nosearch_found_title',array(
		'default'=> __('Nothing Found','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_nosearch_found_title',array(
		'label'	=> __('No Result Found Title','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_nosearch_found_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','tour-planner-ebooking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_nosearch_found_content',array(
		'label'	=> __('No Result Found Content','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_noresult_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('tour_planner_ebooking_show_noresult_search',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_show_noresult_search',array(
       'type' => 'checkbox',
       'label' => __('No Result search','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_noresult_found'
    ));

	//Responsive Media Settings
	$wp_customize->add_section('tour_planner_ebooking_responsive_setting',array(
		'title'	=> __('Responsive Settings','tour-planner-ebooking'),
		'panel' => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_responsive_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_responsive_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_responsive_setting'
	));

	// taggle button color
  	$wp_customize->add_setting( 'tour_planner_ebooking_taggle_menu_bg_color_settings', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tour_planner_ebooking_taggle_menu_bg_color_settings', array(
  		'label' => __('Toggle Menu Bg Color', 'tour-planner-ebooking'),
	   'section' => 'tour_planner_ebooking_responsive_setting',
	   'settings' => 'tour_planner_ebooking_taggle_menu_bg_color_settings',
  	)));

	$wp_customize->add_setting('tour_planner_ebooking_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_responsive_setting',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_close_menu_icon',array(
		'default'	=> 'far fa-times-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_responsive_setting',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_responsive_scroll',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_responsive_scroll',array(
       'type' => 'checkbox',
       'label' => __('Scroll To Top','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_responsive_setting'
    ));

    $wp_customize->add_setting('tour_planner_ebooking_responsive_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_responsive_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Sidebar','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_responsive_setting'
    ));

    $wp_customize->add_setting('tour_planner_ebooking_responsive_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
    ));
    $wp_customize->add_control('tour_planner_ebooking_responsive_preloader',array(
       'type' => 'checkbox',
       'label' => __('Preloader','tour-planner-ebooking'),
       'section' => 'tour_planner_ebooking_responsive_setting'
    ));

	//Footer
	$wp_customize->add_section('tour_planner_ebooking_footer_section', array(
		'title'       => __('Footer Text', 'tour-planner-ebooking'),
		'priority'    => null,
		'panel'       => 'tour_planner_ebooking_panel_id',
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_premium_info',array(
		'type'=> 'hidden',
		'description' => "<p>". esc_html__('Upgrade to premium for more features.','tour-planner-ebooking') ."</p><a target='_blank' href='". esc_url(TOUR_PLANNER_EBOOKING_BUY_NOW) ." '>". esc_html__('Upgrade to Pro','tour-planner-ebooking') ."</a>",
		'section'=> 'tour_planner_ebooking_footer_section'
	));

	$wp_customize->add_setting('tour_planner_ebooking_show_hide_footer',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_planner_ebooking_show_hide_footer',array(
     	'type' => 'checkbox',
      'label' => __('Show / Hide Footer','tour-planner-ebooking'),
      'section' => 'tour_planner_ebooking_footer_section',
	));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_footer_widget_areas', array(
		'selector' => '#footer',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_footer_widget_areas',
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices',
    ));
    $wp_customize->add_control('tour_planner_ebooking_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'tour-planner-ebooking'),
        'section'     => 'tour_planner_ebooking_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'tour-planner-ebooking'),
        'choices' => array(
            '1'     => __('One', 'tour-planner-ebooking'),
            '2'     => __('Two', 'tour-planner-ebooking'),
            '3'     => __('Three', 'tour-planner-ebooking'),
            '4'     => __('Four', 'tour-planner-ebooking')
        ),
    ));

    $wp_customize->add_setting('tour_planner_ebooking_footer_widget_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_footer_widget_bg_color', array(
		'label'    => __('Footer Widget Background Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_section',
	)));

	$wp_customize->add_setting('tour_planner_ebooking_footer_widget_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'tour_planner_ebooking_footer_widget_bg_image',array(
        'label' => __('Footer Widget Background Image','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_footer_section'
	)));

	$wp_customize->add_setting('tour_planner_ebooking_footer_heading',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_heading',array(
	    'type' => 'select',
	    'label' => __('Footer Heading Alignment','tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','tour-planner-ebooking'),
	        'Center' => __('Center','tour-planner-ebooking'),
	        'Right' => __('Right','tour-planner-ebooking')
	    ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_footer_content',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_content',array(
	    'type' => 'select',
	    'label' => __('Footer Content Alignment','tour-planner-ebooking'),
	    'section' => 'tour_planner_ebooking_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','tour-planner-ebooking'),
	        'Center' => __('Center','tour-planner-ebooking'),
	        'Right' => __('Right','tour-planner-ebooking')
	    ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_footer_font_size',array(
		'default'=> 20,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_heading_font_weight',array(
        'default' => '600',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
    ));
    $wp_customize->add_control('tour_planner_ebooking_footer_heading_font_weight',array(
        'type' => 'select',
        'label' => __('Footer Heading Font Weight','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_footer_section',
        'choices' => array(
            '100' => __('100','tour-planner-ebooking'),
            '200' => __('200','tour-planner-ebooking'),
            '300' => __('300','tour-planner-ebooking'),
            '400' => __('400','tour-planner-ebooking'),
            '500' => __('500','tour-planner-ebooking'),
            '600' => __('600','tour-planner-ebooking'),
            '700' => __('700','tour-planner-ebooking'),
            '800' => __('800','tour-planner-ebooking'),
            '900' => __('900','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_footer_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
 	));
 	$wp_customize->add_control('tour_planner_ebooking_footer_text_tranform',array(
		'type' => 'radio',
		'label' => __('Footer Heading Text Transform','tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','tour-planner-ebooking'),
		   'Lowercase' => __('Lowercase','tour-planner-ebooking'),
		   'Capitalize' => __('Capitalize','tour-planner-ebooking'),
		),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_show_hide_copyright',array(
		'default' => true,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_planner_ebooking_show_hide_copyright',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Copyright','tour-planner-ebooking'),
      	'section' => 'tour_planner_ebooking_footer_section',
	));

	$wp_customize->selective_refresh->add_partial('tour_planner_ebooking_footer_copy', array(
		'selector' => '.copyright p',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_footer_copy',
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_copy', array(
		'label'   => __('Copyright Text', 'tour-planner-ebooking'),
		'section' => 'tour_planner_ebooking_footer_section',
		'type'    => 'text',
	));

	$wp_customize->add_setting('tour_planner_ebooking_copyright_content_align',array(
        'default' => 'center',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_copyright_content_align',array(
        'type' => 'select',
        'label' => __('Copyright Text Alignment ','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_footer_section',
        'choices' => array(
            'left' => __('Left','tour-planner-ebooking'),
            'right' => __('Right','tour-planner-ebooking'),
            'center' => __('Center','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_footer_content_font_size',array(
		'default'=> 16,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_content_font_size',array(
		'label' => esc_html__( 'Copyright Font Size','tour-planner-ebooking' ),
		'section'=> 'tour_planner_ebooking_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'type' => 'number',
	));

	$wp_customize->add_setting('tour_planner_ebooking_copyright_padding',array(
		'default'=> 15,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_copyright_padding',array(
		'label'	=> __('Copyright Padding','tour-planner-ebooking'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_footer_section',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_footer_text_color', array(
		'label'    => __('Copyright Text Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_section',
	)));

	$wp_customize->add_setting('tour_planner_ebooking_footer_text_bg_color', array(
		'default'           => '#0279E7',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_footer_text_bg_color', array(
		'label'    => __('Copyright Background Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_section',
	)));

	$wp_customize->selective_refresh->add_partial( 'tour_planner_ebooking_enable_disable_scroll', array(
		'selector' => '#scroll-top i',
		'render_callback' => 'tour_planner_ebooking_customize_partial_tour_planner_ebooking_enable_disable_scroll',
	));

	$wp_customize->add_setting('tour_planner_ebooking_enable_disable_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_planner_ebooking_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','tour-planner-ebooking'),
      	'section' => 'tour_planner_ebooking_footer_section',
	));

	$wp_customize->add_setting('tour_planner_ebooking_back_to_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
        $wp_customize,'tour_planner_ebooking_back_to_top_icon',array(
		'label'	=> __('Scroll Back to Top Icon','tour-planner-ebooking'),
		'transport' => 'refresh',
		'section'	=> 'tour_planner_ebooking_footer_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('tour_planner_ebooking_back_to_top_bg_color', array(
		'default'           => '#0279E7',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_back_to_top_bg_color', array(
		'label'    => __('Back to Top Background Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_section',
	)));

    $wp_customize->add_setting('tour_planner_ebooking_back_to_top_bg_hover_color', array(
		'default'           => '#0279E7',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_back_to_top_bg_hover_color', array(
		'label'    => __('Back to Top Background Hover Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_section',
	)));
	
	$wp_customize->add_setting('tour_planner_ebooking_scroll_setting',array(
        'default' => 'Right',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_footer_section',
        'choices' => array(
            'Left' => __('Left','tour-planner-ebooking'),
            'Right' => __('Right','tour-planner-ebooking'),
            'Center' => __('Center','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_scroll_font_size_icon',array(
		'default'=> 20,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float',
	));
	$wp_customize->add_control('tour_planner_ebooking_scroll_font_size_icon',array(
		'label'	=> __('Scroll Icon Font Size','tour-planner-ebooking'),
		'section'=> 'tour_planner_ebooking_footer_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 30,
        ),
        'type' => 'number',
	)	);

	//Footer Social Icon
	$wp_customize->add_section( 'tour_planner_ebooking_footer_social_icon' , array(
    	'title'      => __( 'Footer Social Icon Settings', 'tour-planner-ebooking' ),
		'panel' => 'tour_planner_ebooking_panel_id'
	) );

	$wp_customize->add_setting('tour_planner_ebooking_show_hide_footer_social_icon',array(
		'default' => false,
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_checkbox'
	));
	$wp_customize->add_control('tour_planner_ebooking_show_hide_footer_social_icon',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Footer Social Icon','tour-planner-ebooking'),
      	'section' => 'tour_planner_ebooking_footer_social_icon',
	));

	for ( $tour_planner_ebooking_j = 1; $tour_planner_ebooking_j <= 5; $tour_planner_ebooking_j++ ) {
		$wp_customize->add_setting('tour_planner_ebooking_social_icon_url' .$tour_planner_ebooking_j,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));	
		$wp_customize->add_control('tour_planner_ebooking_social_icon_url' .$tour_planner_ebooking_j,array(
			'label'	=> __('Add Social link','tour-planner-ebooking'),
			'section'	=> 'tour_planner_ebooking_footer_social_icon',
			'setting'	=> 'tour_planner_ebooking_social_icon_url' .$tour_planner_ebooking_j,
			'type'	=> 'url'
		));

		$wp_customize->add_setting('tour_planner_ebooking_select_social_icon' .$tour_planner_ebooking_j,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control(new Tour_Planner_Ebooking_Icon_Changer(
	        $wp_customize,'tour_planner_ebooking_select_social_icon' .$tour_planner_ebooking_j,array(
			'label'	=> __('Add Social Icon','tour-planner-ebooking'),
			'transport' => 'refresh',
			'section'	=> 'tour_planner_ebooking_footer_social_icon',
			'type'		=> 'icon'
		)));
	}

	$wp_customize->add_setting('tour_planner_ebooking_align_footer_social_icon',array(
        'default' => 'center',
        'sanitize_callback' => 'tour_planner_ebooking_sanitize_choices'
	));
	$wp_customize->add_control('tour_planner_ebooking_align_footer_social_icon',array(
        'type' => 'select',
        'label' => __('Social Icon Alignment ','tour-planner-ebooking'),
        'section' => 'tour_planner_ebooking_footer_social_icon',
        'choices' => array(
            'left' => __('Left','tour-planner-ebooking'),
            'right' => __('Right','tour-planner-ebooking'),
            'center' => __('Center','tour-planner-ebooking'),
        ),
	) );

	$wp_customize->add_setting('tour_planner_ebooking_footer_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'tour_planner_ebooking_sanitize_float'
	));
	$wp_customize->add_control('tour_planner_ebooking_footer_icon_font_size',array(
		'label'	=> __('Footer Icon Font Size','tour-planner-ebooking'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'tour_planner_ebooking_footer_social_icon',
		'type'=> 'number'
	));

	$wp_customize->add_setting('tour_planner_ebooking_footer_icon_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tour_planner_ebooking_footer_icon_color', array(
		'label'    => __('Icon Color', 'tour-planner-ebooking'),
		'section'  => 'tour_planner_ebooking_footer_social_icon',
	)));
}
add_action('customize_register', 'tour_planner_ebooking_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tour_Planner_Ebooking_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the contour_planner_ebooking_Customizetrols.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Tour_Planner_Ebooking_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Tour_Planner_Ebooking_Customize_Section_Pro(
				$manager,
				'tour_planner_ebooking_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Tour Planner eBooking Pro ', 'tour-planner-ebooking'),
					'pro_text' => esc_html__('Get Pro', 'tour-planner-ebooking'),
					'pro_url'  => esc_url('https://www.themescaliber.com/products/tour-booking-wordpress-theme'),
				)
			)
		);

		$manager->add_section(
			new Tour_Planner_Ebooking_Customize_Section_Pro(
				$manager,
				'tour_planner_ebooking_doc_link',
				array(
					'priority' => 10,
					'title'    => esc_html__('Guide', 'tour-planner-ebooking'),
					'pro_text' => esc_html__('Documentation', 'tour-planner-ebooking'),
					'pro_url'  => esc_url('https://preview.themescaliber.com/doc/travel-ebooking/'),
				)
			)
		);

		$manager->add_section(
			new Tour_Planner_Ebooking_Customize_Section_Pro(
				$manager,
				'tour_planner_ebooking_demo_link',
				array(
					'priority' => 11,
					'title'    => esc_html__('Live Demo', 'tour-planner-ebooking'),
					'pro_text' => esc_html__('Preview', 'tour-planner-ebooking'),
					'pro_url'  => esc_url('https://preview.themescaliber.com/travel-ebooking-pro/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('tour-planner-ebooking-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/js/customize-controls.js', array('customize-controls'));
		wp_enqueue_style('tour-planner-ebooking-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Tour_Planner_Ebooking_Customize::get_instance();