<?php
/**
 * Forest Eco Nature: Customizer
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function forest_eco_nature_customize_register( $wp_customize ) {

	// Pro Version
    class forest_eco_nature_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>Unlock Premium <strong>'. esc_html( $this->label ) .'</strong>? </span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( FOREST_ECO_NATURE_BUY_TEXT,'forest-eco-nature' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function forest_eco_nature_sanitize_custom_control( $input ) {
        return $input;
    }

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Forest_Eco_Nature_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Forest_Eco_Nature_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'forest_eco_nature_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'forest-eco-nature' ),
	    'description' => __( 'Description of what this panel does.', 'forest-eco-nature' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('forest_eco_nature_tp_general_settings',array(
        'title' => __('TP General Option', 'forest-eco-nature'),
        'priority' => 1,
        'panel' => 'forest_eco_nature_panel_id'
    ) );
 	$wp_customize->add_setting('forest_eco_nature_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
 	$wp_customize->add_control('forest_eco_nature_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'forest-eco-nature'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'forest-eco-nature'),
		'section' => 'forest_eco_nature_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','forest-eco-nature'),
		'Container' => __('Container','forest-eco-nature'),
		'Container Fluid' => __('Container Fluid','forest-eco-nature')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('forest_eco_nature_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'forest-eco-nature'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'forest-eco-nature'),
     'section' => 'forest_eco_nature_tp_general_settings',
     'choices' => array(
         'full' => __('Full','forest-eco-nature'),
         'left' => __('Left','forest-eco-nature'),
         'right' => __('Right','forest-eco-nature'),
         'three-column' => __('Three Columns','forest-eco-nature'),
         'four-column' => __('Four Columns','forest-eco-nature'),
         'grid' => __('Grid Layout','forest-eco-nature')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('forest_eco_nature_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'forest-eco-nature'),
        'description'   => __('This option work for single blog page', 'forest-eco-nature'),
        'section' => 'forest_eco_nature_tp_general_settings',
        'choices' => array(
            'full' => __('Full','forest-eco-nature'),
            'left' => __('Left','forest-eco-nature'),
            'right' => __('Right','forest-eco-nature'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('forest_eco_nature_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'forest-eco-nature'),
     'description'   => __('This option work for pages.', 'forest-eco-nature'),
     'section' => 'forest_eco_nature_tp_general_settings',
     'choices' => array(
         'full' => __('Full','forest-eco-nature'),
         'left' => __('Left','forest-eco-nature'),
         'right' => __('Right','forest-eco-nature')
     ),
	) );
	//tp typography option
	$forest_eco_nature_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('forest_eco_nature_typography_option',array(
		'title'         => __('TP Typography Option', 'forest-eco-nature'),
		'priority' => 1,
		'panel' => 'forest_eco_nature_panel_id'
   	));

   	$wp_customize->add_setting('forest_eco_nature_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices',
	));
	$wp_customize->add_control(	'forest_eco_nature_heading_font_family', array(
		'section' => 'forest_eco_nature_typography_option',
		'label'   => __('heading Fonts', 'forest-eco-nature'),
		'type'    => 'select',
		'choices' => $forest_eco_nature_font_array,
	));

	$wp_customize->add_setting('forest_eco_nature_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices',
	));
	$wp_customize->add_control(	'forest_eco_nature_body_font_family', array(
		'section' => 'forest_eco_nature_typography_option',
		'label'   => __('Body Fonts', 'forest-eco-nature'),
		'type'    => 'select',
		'choices' => $forest_eco_nature_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('forest_eco_nature_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'forest-eco-nature'),
		'priority' => 1,
		'panel' => 'forest_eco_nature_panel_id'
	) );
	$wp_customize->add_setting( 'forest_eco_nature_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'forest_eco_nature_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'forest-eco-nature'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_prelaoder_option',
	    'settings' => 'forest_eco_nature_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'forest_eco_nature_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'forest-eco-nature'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_prelaoder_option',
	    'settings' => 'forest_eco_nature_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'forest_eco_nature_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'forest-eco-nature'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_prelaoder_option',
	    'settings' => 'forest_eco_nature_tp_preloader_bg_color_option',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_preloader_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_preloader_pro_version_logo', array(
        'section'     => 'forest_eco_nature_prelaoder_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

  	//TP Color Option
	$wp_customize->add_section('forest_eco_nature_color_option',array(
     'title'         => __('TP Color Option', 'forest-eco-nature'),
     'panel' => 'forest_eco_nature_panel_id',
     'priority' => 1,
    ) );

	$wp_customize->add_setting( 'forest_eco_nature_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_color_option', array(
		'label'     => __('Theme first Color', 'forest-eco-nature'),
	    'description' => __('It will change the complete theme color in one click.', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_color_option',
	    'settings' => 'forest_eco_nature_tp_color_option',
  	)));


  	$wp_customize->add_setting( 'forest_eco_nature_tp_color_sec', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_color_sec', array(
		'label'     => __('Theme Second Color', 'forest-eco-nature'),
	    'description' => __('It will change the complete theme color in one click.', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_color_option',
	    'settings' => 'forest_eco_nature_tp_color_sec',
  	)));

	//TP Blog Option
	$wp_customize->add_section('forest_eco_nature_blog_option',array(
		'title' => __('TP Blog Option', 'forest-eco-nature'),
		'priority' => 1,
		'panel' => 'forest_eco_nature_panel_id'
	) );

	$wp_customize->add_setting('forest_eco_nature_edit_blog_page_title',array(
		'default'=> __('Home','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','forest-eco-nature'),
		'section'=> 'forest_eco_nature_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_edit_blog_page_description',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_edit_blog_page_description',array(
		'label'	=> __('Add Blog Page Description','forest-eco-nature'),
		'section'=> 'forest_eco_nature_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category', 'time'),
        'sanitize_callback' => 'forest_eco_nature_sanitize_sortable',
    ));
    $wp_customize->add_control(new Forest_Eco_Nature_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'forest-eco-nature'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'forest-eco-nature') ,
        'section' => 'forest_eco_nature_blog_option',
        'choices' => array(
            'date' => __('date', 'forest-eco-nature') ,
            'author' => __('author', 'forest-eco-nature') ,
            'comment' => __('comment', 'forest-eco-nature') ,
            'category' => __('category', 'forest-eco-nature') ,
            'time' => __('time', 'forest-eco-nature') ,
        ) ,
    )));
    $wp_customize->add_setting( 'forest_eco_nature_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'forest_eco_nature_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'forest_eco_nature_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','forest-eco-nature' ),
		'section'     => 'forest_eco_nature_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('forest_eco_nature_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'forest_eco_nature_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'forest-eco-nature'),
		'type' => 'checkbox',
		'section' => 'forest_eco_nature_blog_option',
	));

	$wp_customize->add_setting('forest_eco_nature_read_more_text',array(
		'default'=> __('Read More','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_read_more_text',array(
		'label'	=> __('Edit Button Text','forest-eco-nature'),
		'section'=> 'forest_eco_nature_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'forest_eco_nature_sanitize_number_range',
	));
	$wp_customize->add_control(new forest_eco_nature_Range_Slider($wp_customize, 'forest_eco_nature_post_image_round', array(
       'section' => 'forest_eco_nature_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'forest-eco-nature'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('forest_eco_nature_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'forest_eco_nature_sanitize_number_range',
	));
	$wp_customize->add_control(new forest_eco_nature_Range_Slider($wp_customize, 'forest_eco_nature_post_image_width', array(
       'section' => 'forest_eco_nature_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'forest-eco-nature'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('forest_eco_nature_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'forest_eco_nature_sanitize_number_range',
	));
	$wp_customize->add_control(new forest_eco_nature_Range_Slider($wp_customize, 'forest_eco_nature_post_image_length', array(
       'section' => 'forest_eco_nature_blog_option',
      'label' => esc_html__('Edit Post Image height', 'forest-eco-nature'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->add_setting( 'forest_eco_nature_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_blog_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'forest_eco_nature_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'forest_eco_nature_customize_partial_forest_eco_nature_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'forest_eco_nature_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_blog_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'forest_eco_nature_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'forest_eco_nature_customize_partial_forest_eco_nature_remove_tags',
	));
	$wp_customize->add_setting( 'forest_eco_nature_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_blog_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'forest_eco_nature_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'forest_eco_nature_customize_partial_forest_eco_nature_remove_category',
	));
	$wp_customize->add_setting( 'forest_eco_nature_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'forest-eco-nature' ),
	 'section'     => 'forest_eco_nature_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'forest_eco_nature_remove_comment',
	) ) );

	$wp_customize->add_setting( 'forest_eco_nature_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'forest-eco-nature' ),
	 'section'     => 'forest_eco_nature_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'forest_eco_nature_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'forest_eco_nature_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'forest_eco_nature_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'forest_eco_nature_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','forest-eco-nature' ),
		'section'     => 'forest_eco_nature_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 9,
		),
	) );

 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'forest_eco_nature_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'forest-eco-nature' ),
    	'priority' => 2,
		'panel' => 'forest_eco_nature_panel_id'
	) );

	$wp_customize->add_setting('forest_eco_nature_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices',
	));
	$wp_customize->add_control(	'forest_eco_nature_menu_font_family', array(
		'section' => 'forest_eco_nature_menu_typography',
		'label'   => __('Menu Fonts', 'forest-eco-nature'),
		'type'    => 'select',
		'choices' => $forest_eco_nature_font_array,
	));

	$wp_customize->add_setting('forest_eco_nature_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
 	));
 	$wp_customize->add_control('forest_eco_nature_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','forest-eco-nature'),
		'section' => 'forest_eco_nature_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','forest-eco-nature'),
		   'Lowercase' => __('Lowercase','forest-eco-nature'),
		   'Capitalize' => __('Capitalize','forest-eco-nature'),
		),
	) );

	$wp_customize->add_setting('forest_eco_nature_menu_font_size', array(
	  'default' => 14,
      'sanitize_callback' => 'forest_eco_nature_sanitize_number_range',
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Range_Slider($wp_customize, 'forest_eco_nature_menu_font_size', array(
       'section' => 'forest_eco_nature_menu_typography',
      'label' => esc_html__('Font Size', 'forest-eco-nature'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('forest_eco_nature_menus_item_style',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_menus_item_style',array(
		'type' => 'select',
		'section' => 'forest_eco_nature_menu_typography',
		'label' => __('Menu Hover Effect','forest-eco-nature'),
		'choices' => array(
			'None' => __('None','forest-eco-nature'),
			'Zoom In' => __('Zoom In','forest-eco-nature'),
		),
	) );

	$wp_customize->add_setting( 'forest_eco_nature_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_menu_color', array(
			'label'     => __('Change Menu Color', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_menu_typography',
	    'settings' => 'forest_eco_nature_menu_color',
  	)));

  	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_menu_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_menu_pro_version_logo', array(
        'section'     => 'forest_eco_nature_menu_typography',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Top Bar
	$wp_customize->add_section( 'forest_eco_nature_topbar', array(
    	'title'      => __( 'Header Details', 'forest-eco-nature' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'forest-eco-nature' ),
		'panel' => 'forest_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'forest_eco_nature_topbar_show', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_topbar_show', array(
		'label'       => esc_html__( 'Show / Hide Topbar', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_topbar',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_topbar_show',
	) ) );

	$wp_customize->add_setting('forest_eco_nature_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('forest_eco_nature_mail',array(
		'label'	=> __('Add Mail Address','forest-eco-nature'),
		'section'=> 'forest_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_location',array(
		'label'	=> __('Add location','forest-eco-nature'),
		'section'=> 'forest_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_phone_no',array(
		'default'=> '',
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_phone_number'
	));
	$wp_customize->add_control('forest_eco_nature_phone_no',array(
		'label'	=> __('Add Phone No','forest-eco-nature'),
		'section'=> 'forest_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_membership_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_membership_button',array(
		'label'	=> __('Header Button Text','forest-eco-nature'),
		'section'=> 'forest_eco_nature_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_membership_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_membership_link',array(
		'label'	=> __('Header Button Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_topbar',
		'type'=> 'url'
	));

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_header_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_header_pro_version_logo', array(
        'section'     => 'forest_eco_nature_topbar',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Social Link
	$wp_customize->add_section( 'forest_eco_nature_social_media', array(
    	'title'      => __( 'Social Media Links', 'forest-eco-nature' ),
    	'description' => __( 'Add your Social Links', 'forest-eco-nature' ),
		'panel' => 'forest_eco_nature_panel_id',
      'priority' => 2,
	) );
	$wp_customize->add_setting( 'forest_eco_nature_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_social_media',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_header_fb_new_tab',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_facebook_url',array(
		'label'	=> __('Facebook Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'forest_eco_nature_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'forest_eco_nature_customize_partial_forest_eco_nature_facebook_url',
	) );
	$wp_customize->add_setting('forest_eco_nature_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_facebook_icon',array(
		'label'	=> __('Facebook Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'forest_eco_nature_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_social_media',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_twitter_url',array(
		'label'	=> __('Twitter Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('forest_eco_nature_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_twitter_icon',array(
		'label'	=> __('Twitter Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'forest_eco_nature_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_social_media',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_header_ins_new_tab',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_instagram_url',array(
		'label'	=> __('Instagram Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('forest_eco_nature_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_instagram_icon',array(
		'label'	=> __('Instagram Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'forest_eco_nature_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_social_media',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_header_ut_new_tab',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_youtube_url',array(
		'label'	=> __('YouTube Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('forest_eco_nature_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_youtube_icon',array(
		'label'	=> __('YouTube Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'forest_eco_nature_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_social_media',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_header_pint_new_tab',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('forest_eco_nature_pint_url',array(
		'label'	=> __('Pinterest Link','forest-eco-nature'),
		'section'=> 'forest_eco_nature_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('forest_eco_nature_pint_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_pint_icon',array(
		'label'	=> __('Pinterest Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_social_media',
		'type'		=> 'icon'
	)));

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_social_media_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_social_media_pro_version_logo', array(
        'section'     => 'forest_eco_nature_social_media',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//home page slider
	$wp_customize->add_section( 'forest_eco_nature_slider_section' , array(
    	'title'      => __( 'Slider Section', 'forest-eco-nature' ),
    	'priority' => 2,
		'panel' => 'forest_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'forest_eco_nature_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_slider_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_slider_arrows',
	) ) );

	$wp_customize->add_setting( 'forest_eco_nature_show_slider_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new forest_eco_nature_Toggle_Control( $wp_customize, 'forest_eco_nature_show_slider_title', array(
		'label'       => esc_html__( 'Show / Hide Slider Heading', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_slider_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_show_slider_title',
	) ) );

	$wp_customize->add_setting( 'forest_eco_nature_show_slider_content', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new forest_eco_nature_Toggle_Control( $wp_customize, 'forest_eco_nature_show_slider_content', array(
		'label'       => esc_html__( 'Show / Hide Slider Content', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_slider_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_show_slider_content',
	) ) );

	$wp_customize->add_setting('forest_eco_nature_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_slider_short_heading',array(
		'label'	=> __('Add short Heading','forest-eco-nature'),
		'section'=> 'forest_eco_nature_slider_section',
		'type'=> 'text'
	));

	for ( $forest_eco_nature_count = 1; $forest_eco_nature_count <= 4; $forest_eco_nature_count++ ) {

		$wp_customize->add_setting( 'forest_eco_nature_slider_page' . $forest_eco_nature_count, array(
			'default'           => '',
			'sanitize_callback' => 'forest_eco_nature_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'forest_eco_nature_slider_page' . $forest_eco_nature_count, array(
			'label'    => __( 'Select Slide Image Page', 'forest-eco-nature' ),
			'description' => __('Image Size ( 1835 x 700 ) px','forest-eco-nature'),
			'section'  => 'forest_eco_nature_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'forest_eco_nature_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );

	$forest_eco_nature_args = array('numberposts' => -1);
	$post_list = get_posts($forest_eco_nature_args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting( 'forest_eco_nature_slider_opacity_setting', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new forest_eco_nature_Toggle_Control( $wp_customize, 'forest_eco_nature_slider_opacity_setting', array(
		'label'       => esc_html__( 'Show / Hide Image Opacity', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_slider_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_slider_opacity_setting',
	) ) );

    $wp_customize->add_setting( 'forest_eco_nature_image_opacity_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_image_opacity_color', array(
        'label' => __('Slider Image Opacity Color', 'forest-eco-nature'),
        'section' => 'forest_eco_nature_slider_section',
        'settings' => 'forest_eco_nature_image_opacity_color',
    )));

    $wp_customize->add_setting('forest_eco_nature_slider_opacity',array(
        'default'=> '0.7',
        'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
    ));
    $wp_customize->add_control('forest_eco_nature_slider_opacity',array(
        'type' => 'select',
        'label' => esc_html__('Slider Image Opacity','forest-eco-nature'),
        'choices' => array(
            '0'   => '0',
            '0.1' => '0.1',
            '0.2' => '0.2',
            '0.3' => '0.3',
            '0.4' => '0.4',
            '0.5' => '0.5',
            '0.6' => '0.6',
            '0.7' => '0.7',
            '0.8' => '0.8',
            '0.9' => '0.9',
            '1'   => '1',
        ),
        'section'=> 'forest_eco_nature_slider_section',
    ));

    //Slider excerpt
	$wp_customize->add_setting( 'forest_eco_nature_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'absint',
	) );
	$wp_customize->add_control( 'forest_eco_nature_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Content length','forest-eco-nature' ),
		'section'     => 'forest_eco_nature_slider_section',
		'type'        => 'number',
		'settings'    => 'forest_eco_nature_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 100,
		),
	) );

    //Slider height
    $wp_customize->add_setting('forest_eco_nature_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('forest_eco_nature_slider_img_height',array(
        'label' => __('Slider Height','forest-eco-nature'),
        'description'   => __('Add slider height in px(eg. 700px).','forest-eco-nature'),
        'section'=> 'forest_eco_nature_slider_section',
        'type'=> 'text'
    ));

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_slider_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_slider_pro_version_logo', array(
        'section'     => 'forest_eco_nature_slider_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	// Reserve Section
	$wp_customize->add_section('forest_eco_nature_service_section',array(
		'title'	=> __('Services Section','forest-eco-nature'),
		'panel' => 'forest_eco_nature_panel_id',
		'priority' => 3,
	));
	$wp_customize->add_setting( 'forest_eco_nature_service_enable', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_service_enable', array(
		'label'       => esc_html__( 'Show / Hide Services', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_service_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_service_enable',
	) ) );

	$wp_customize->add_setting('forest_eco_nature_researve_background_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'forest_eco_nature_researve_background_image',array(
        'label' => __('Section Background Image ','forest-eco-nature'),
        'description' => __('Image Dimension ( 475 x 300 )','forest-eco-nature'),
        'section' => 'forest_eco_nature_service_section',
        'settings' => 'forest_eco_nature_researve_background_image',
    )));

    $wp_customize->add_setting('forest_eco_nature_service_sub_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_service_sub_heading',array(
		'label'	=> __('Section Sub Title','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_service_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('forest_eco_nature_service_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_service_heading',array(
		'label'	=> __('Section Title','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_service_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'forest_eco_nature_service_heading', array(
		'selector' => '#service h2',
		'render_callback' => 'forest_eco_nature_customize_partial_forest_eco_nature_service_heading',
	) );

	for($i=1;$i<=3;$i++) {

    $wp_customize->add_setting('forest_eco_nature_tab_icon'.$i,array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
        $wp_customize,'forest_eco_nature_tab_icon'.$i,array(
		'label'	=> __('Services Icon','forest-eco-nature').$i,
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_service_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('forest_eco_nature_tab_heading'.$i,array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('forest_eco_nature_tab_heading'.$i,array(
        'label' => __('Service Title ','forest-eco-nature').$i,
        'section'=> 'forest_eco_nature_service_section',
        'setting'=> 'forest_eco_nature_tab_heading'.$i,
        'type'=> 'text'
    ));

    $wp_customize->add_setting('forest_eco_nature_tab_para'.$i,array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('forest_eco_nature_tab_para'.$i,array(
        'label' => __('Service Text ','forest-eco-nature').$i,
        'section'=> 'forest_eco_nature_service_section',
        'setting'=> 'forest_eco_nature_tab_para'.$i,
        'type'=> 'text'
    ));

  }

	$wp_customize->add_setting( 'forest_eco_nature_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'forest_eco_nature_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'forest_eco_nature_about_page', array(
		'label'    => __( 'Select Services Page', 'forest-eco-nature' ),
		'section'  => 'forest_eco_nature_service_section',
		'type'     => 'dropdown-pages'
	) );

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_about_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_about_pro_version_logo', array(
        'section'     => 'forest_eco_nature_service_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('forest_eco_nature_footer_section',array(
		'title'	=> __('Footer Widget Settings','forest-eco-nature'),
		'panel' => 'forest_eco_nature_panel_id',
		'priority' => 7,
	));
	
	// footer columns
	$wp_customize->add_setting('forest_eco_nature_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_footer_columns',array(
		'label'	=> __('Footer Widget Columns','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_footer_section',
		'setting'	=> 'forest_eco_nature_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'forest_eco_nature_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'forest-eco-nature'),
			'description' => __('It will change the complete footer widget backgorund color.', 'forest-eco-nature'),
			'section' => 'forest_eco_nature_footer_section',
			'settings' => 'forest_eco_nature_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('forest_eco_nature_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'forest_eco_nature_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','forest-eco-nature'),
         'section' => 'forest_eco_nature_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('forest_eco_nature_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_footer_section',
	    'setting'	=> 'forest_eco_nature_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'forest_eco_nature_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_footer_section',
	    'settings' => 'forest_eco_nature_footer_widget_title_color',
  	)));

	$wp_customize->add_setting( 'forest_eco_nature_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_footer_section',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_return_to_header',
	) ) );
	
    $wp_customize->add_setting('forest_eco_nature_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Forest_Eco_Nature_Icon_Changer(
	        $wp_customize,'forest_eco_nature_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','forest-eco-nature'),
		'transport' => 'refresh',
		'section'	=> 'forest_eco_nature_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('forest_eco_nature_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'forest-eco-nature'),
        'description'   => __('This option work for scroll to top', 'forest-eco-nature'),
       'section' => 'forest_eco_nature_footer_section',
       'choices' => array(
            'Right' => __('Right','forest-eco-nature'),
            'Left' => __('Left','forest-eco-nature'),
            'Center' => __('Center','forest-eco-nature')
     ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_footer_widget_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_footer_widget_pro_version_logo', array(
        'section'     => 'forest_eco_nature_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//footer
	$wp_customize->add_section('forest_eco_nature_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','forest-eco-nature'),
		'description'	=> __('Add copyright text.','forest-eco-nature'),
		'panel' => 'forest_eco_nature_panel_id',
		'priority' => 7,
	));

	$wp_customize->add_setting('forest_eco_nature_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_footer_text',array(
		'label'	=> __('Copyright Text','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_footer_copyright_section',
		'type'		=> 'text'
	));

	//footer widget title font size
	$wp_customize->add_setting('forest_eco_nature_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_footer_copyright_section',
	    'setting'	=> 'forest_eco_nature_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'forest_eco_nature_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'forest-eco-nature'),
	    'section' => 'forest_eco_nature_footer_copyright_section',
	    'settings' => 'forest_eco_nature_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('forest_eco_nature_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','forest-eco-nature'),
		'section'	=> 'forest_eco_nature_footer_copyright_section',
	    'setting'	=> 'forest_eco_nature_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for copyright
	$wp_customize->add_setting('forest_eco_nature_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
	$wp_customize->add_control('forest_eco_nature_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'forest-eco-nature'),
        'description'   => __('This option work for Copyright', 'forest-eco-nature'),
        'section' => 'forest_eco_nature_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','forest-eco-nature'),
            'Left' => __('Left','forest-eco-nature'),
            'Center' => __('Center','forest-eco-nature')
        ),
	) );

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_copyright_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_copyright_pro_version_logo', array(
        'section'     => 'forest_eco_nature_footer_copyright_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'forest_eco_nature_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'forest_eco_nature_customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('forest_eco_nature_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'forest-eco-nature'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'forest-eco-nature'),
		'priority' => 8,
		'panel' => 'forest_eco_nature_panel_id'
	) );

	$wp_customize->add_setting( 'forest_eco_nature_mobile_blog_description', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new forest_eco_nature_Toggle_Control( $wp_customize, 'forest_eco_nature_mobile_blog_description', array(
		'label'       => esc_html__( 'Show / Hide Blog Page Description', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_mobile_blog_description',
	) ) );

	$wp_customize->add_setting( 'forest_eco_nature_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'forest_eco_nature_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'forest-eco-nature' ),
		'section'     => 'forest_eco_nature_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_related_post_mob',
	) ) );

	//Slider height
    $wp_customize->add_setting('forest_eco_nature_slider_img_height_responsive',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('forest_eco_nature_slider_img_height_responsive',array(
        'label' => __('Slider Height','forest-eco-nature'),
        'description'   => __('Add slider height in px(eg. 700px).','forest-eco-nature'),
        'section'=> 'forest_eco_nature_mobile_media_option',
        'type'=> 'text'
    ));

	// Pro Version
    $wp_customize->add_setting( 'forest_eco_nature_responsive_pro_version_logo', array(
        'sanitize_callback' => 'forest_eco_nature_sanitize_custom_control'
    ));
    $wp_customize->add_control( new forest_eco_nature_Customize_Pro_Version ( $wp_customize,'forest_eco_nature_responsive_pro_version_logo', array(
        'section'     => 'forest_eco_nature_mobile_media_option',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Features ', 'forest-eco-nature' ),
        'description' => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL ),
        'priority'    => 100
    )));

	//Site Identity
	$wp_customize->add_setting( 'forest_eco_nature_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'forest-eco-nature' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_site_title',
	) ) );
	$wp_customize->add_setting('forest_eco_nature_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','forest-eco-nature'),
		'section'	=> 'title_tagline',
		'setting'	=> 'forest_eco_nature_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));

	$wp_customize->add_setting( 'forest_eco_nature_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'forest-eco-nature'),
	    'section' => 'title_tagline',
	    'settings' => 'forest_eco_nature_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'forest_eco_nature_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'forest-eco-nature' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('forest_eco_nature_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','forest-eco-nature'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'forest_eco_nature_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'forest_eco_nature_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'forest-eco-nature'),
	    'section' => 'title_tagline',
	    'settings' => 'forest_eco_nature_logo_tagline_color',
  	)));

    $wp_customize->add_setting('forest_eco_nature_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','forest-eco-nature'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('forest_eco_nature_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
    $wp_customize->add_control('forest_eco_nature_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'forest-eco-nature'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'forest-eco-nature'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','forest-eco-nature'),
            'Same Line' => __('Same Line','forest-eco-nature')
        ),
	) );

	//Woo Coomerce
	$wp_customize->add_setting('forest_eco_nature_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_per_columns',array(
		'label'	=> __('Product Per Row','forest-eco-nature'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('forest_eco_nature_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'forest_eco_nature_sanitize_number_absint'
	));
	$wp_customize->add_control('forest_eco_nature_product_per_page',array(
		'label'	=> __('Product Per Page','forest-eco-nature'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'forest_eco_nature_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'forest-eco-nature' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'forest_eco_nature_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'forest-eco-nature' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_single_product_sidebar',
	) ) );
	
	$wp_customize->add_setting( 'forest_eco_nature_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Forest_Eco_Nature_Toggle_Control( $wp_customize, 'forest_eco_nature_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'forest-eco-nature' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'forest_eco_nature_related_product',
	) ) );

	//add home page setting pannel
	$wp_customize->add_panel( 'forest_eco_nature_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'forest-eco-nature' ),
	    'description' => __( 'Description of what this panel does.', 'forest-eco-nature' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('forest_eco_nature_404_page_section',array(
		'title'         => __('404 Page', 'forest-eco-nature'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'forest_eco_nature_page_panel_id'
	) );

	$wp_customize->add_setting('forest_eco_nature_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('forest_eco_nature_edit_404_title',array(
		'label'	=> __('Edit Title','forest-eco-nature'),
		'section'=> 'forest_eco_nature_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('forest_eco_nature_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_edit_404_text',array(
		'label'	=> __('Edit Text','forest-eco-nature'),
		'section'=> 'forest_eco_nature_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('forest_eco_nature_no_result_section',array(
		'title'         => __('Search Results', 'forest-eco-nature'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'forest_eco_nature_page_panel_id'
	) );

	$wp_customize->add_setting('forest_eco_nature_edit_no_result_title',array(
		'default'=> __('Nothing Found','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('forest_eco_nature_edit_no_result_title',array(
		'label'	=> __('Edit Title','forest-eco-nature'),
		'section'=> 'forest_eco_nature_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('forest_eco_nature_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','forest-eco-nature'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('forest_eco_nature_edit_no_result_text',array(
		'label'	=> __('Edit Text','forest-eco-nature'),
		'section'=> 'forest_eco_nature_no_result_section',
		'type'=> 'text'
	));

	// Header Image Height
    $wp_customize->add_setting(
        'forest_eco_nature_header_image_height',
        array(
            'default'           => 350,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'forest_eco_nature_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'forest-eco-nature' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'forest-eco-nature' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'forest_eco_nature_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'forest_eco_nature_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'forest-eco-nature' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'forest-eco-nature' ),
                'center' => esc_html__( 'Center', 'forest-eco-nature' ),
                'bottom' => esc_html__( 'Bottom', 'forest-eco-nature' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'forest-eco-nature' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'forest_eco_nature_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'forest_eco_nature_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'forest-eco-nature' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'forest-eco-nature' ),
        )
    );

        //Opacity
	$wp_customize->add_setting('forest_eco_nature_header_banner_opacity_color',array(
       'default'              => '0.5',
       'sanitize_callback' => 'forest_eco_nature_sanitize_choices'
	));
    $wp_customize->add_control( 'forest_eco_nature_header_banner_opacity_color', array(
		'label'       => esc_html__( 'Header Image Opacity','forest-eco-nature' ),
		'section'     => 'header_image',
		'type'        => 'select',
		'settings'    => 'forest_eco_nature_header_banner_opacity_color',
		'choices' => array(
           '0' =>  esc_attr(__('0','forest-eco-nature')),
           '0.1' =>  esc_attr(__('0.1','forest-eco-nature')),
           '0.2' =>  esc_attr(__('0.2','forest-eco-nature')),
           '0.3' =>  esc_attr(__('0.3','forest-eco-nature')),
           '0.4' =>  esc_attr(__('0.4','forest-eco-nature')),
           '0.5' =>  esc_attr(__('0.5','forest-eco-nature')),
           '0.6' =>  esc_attr(__('0.6','forest-eco-nature')),
           '0.7' =>  esc_attr(__('0.7','forest-eco-nature')),
           '0.8' =>  esc_attr(__('0.8','forest-eco-nature')),
           '0.9' =>  esc_attr(__('0.9','forest-eco-nature'))
		), 
	) );

   $wp_customize->add_setting( 'forest_eco_nature_header_banner_image_overlay', array(
	    'default'   => true,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'forest_eco_nature_sanitize_checkbox',
	));
	$wp_customize->add_control( new forest_eco_nature_Toggle_Control( $wp_customize, 'forest_eco_nature_header_banner_image_overlay', array(
	    'label'   => esc_html__( 'Show / Hide Header Image Overlay', 'forest-eco-nature' ),
	    'section' => 'header_image',
	)));

    $wp_customize->add_setting('forest_eco_nature_header_banner_image_ooverlay_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'forest_eco_nature_header_banner_image_ooverlay_color', array(
		'label'    => __('Header Image Overlay Color', 'forest-eco-nature'),
		'section'  => 'header_image',
	)));


    $wp_customize->add_setting(
        'forest_eco_nature_header_image_title_font_size',
        array(
            'default'           => 32,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'forest_eco_nature_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'forest-eco-nature' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 32px.', 'forest-eco-nature' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'forest_eco_nature_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'forest_eco_nature_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'forest-eco-nature'),
	    'section' => 'header_image',
	    'settings' => 'forest_eco_nature_header_image_title_text_color',
  	)));

}
add_action( 'customize_register', 'forest_eco_nature_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Forest Eco Nature 1.0
 * @see forest_eco_nature_customize_register()
 *
 * @return void
 */
function forest_eco_nature_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Forest Eco Nature 1.0
 * @see forest_eco_nature_customize_register()
 *
 * @return void
 */
function forest_eco_nature_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'FOREST_ECO_NATURE_PRO_THEME_NAME' ) ) {
	define( 'FOREST_ECO_NATURE_PRO_THEME_NAME', esc_html__( 'Forest Eco Nature Pro', 'forest-eco-nature' ));
}

if ( ! defined( 'FOREST_ECO_NATURE_PRO_THEME_URL' ) ) {
	define( 'FOREST_ECO_NATURE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/forest-wordpress-theme'));
}
if ( ! defined( 'FOREST_ECO_NATURE_DOCS_URL' ) ) {
	define( 'FOREST_ECO_NATURE_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/forest-eco-nature/'));
}


if ( ! defined( 'FOREST_ECO_NATURE_TEXT' ) ) {
    define( 'FOREST_ECO_NATURE_TEXT', __( 'Forest Eco Nature Pro','forest-eco-nature' ));
}
if ( ! defined( 'FOREST_ECO_NATURE_BUY_TEXT' ) ) {
    define( 'FOREST_ECO_NATURE_BUY_TEXT', __( 'Upgrade Pro','forest-eco-nature' ));
}


add_action( 'customize_register', function( $manager ) {

// Load custom sections.
load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

    $manager->register_section_type( forest_eco_nature_Button::class );

    $manager->add_section(
        new forest_eco_nature_Button( $manager, 'forest_eco_nature_pro', [
            'title'       => esc_html( FOREST_ECO_NATURE_TEXT,'forest-eco-nature' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'forest-eco-nature' ),
            'button_url'  => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL )
        ] )
    );

} );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Forest_Eco_Nature_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
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
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Forest_Eco_Nature_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Forest_Eco_Nature_Customize_Section_Pro(
				$manager,
				'forest_eco_nature_section_pro',
				array(
					'priority'   => 9,
					'title'    => FOREST_ECO_NATURE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'forest-eco-nature' ),
					'pro_url'  => esc_url( FOREST_ECO_NATURE_PRO_THEME_URL, 'forest-eco-nature' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new forest_eco_nature_Customize_Section_Pro(
				$manager,
				'forest_eco_nature_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'forest-eco-nature' ),
					'pro_text' => esc_html__( 'Click Here', 'forest-eco-nature' ),
					'pro_url'  => esc_url( FOREST_ECO_NATURE_DOCS_URL, 'forest-eco-nature'),
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

		wp_enqueue_script( 'forest-eco-nature-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'forest-eco-nature-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Forest_Eco_Nature_Customize::get_instance();
