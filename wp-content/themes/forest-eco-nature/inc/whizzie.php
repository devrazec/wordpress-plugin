<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {

    // ------- Create Nav Menu --------
$forest_eco_nature_menuname = 'Main Menus';
$forest_eco_nature_bpmenulocation = 'primary-menu';
$forest_eco_nature_menu_exists = wp_get_nav_menu_object($forest_eco_nature_menuname);

if (!$forest_eco_nature_menu_exists) {
    $forest_eco_nature_menu_id = wp_create_nav_menu($forest_eco_nature_menuname);

    // Create Home Page
    $forest_eco_nature_home_title = 'Home';
    $forest_eco_nature_home = array(
        'post_type' => 'page',
        'post_title' => $forest_eco_nature_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $forest_eco_nature_home_id = wp_insert_post($forest_eco_nature_home);

    // Assign Home Page Template
    add_post_meta($forest_eco_nature_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $forest_eco_nature_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($forest_eco_nature_menu_id, 0, array(
        'menu-item-title' => __('Home', 'forest-eco-nature'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $forest_eco_nature_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $forest_eco_nature_about_title = 'About Us';
    $forest_eco_nature_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $forest_eco_nature_about = array(
        'post_type' => 'page',
        'post_title' => $forest_eco_nature_about_title,
        'post_content' => $forest_eco_nature_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $forest_eco_nature_about_id = wp_insert_post($forest_eco_nature_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($forest_eco_nature_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'forest-eco-nature'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $forest_eco_nature_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $forest_eco_nature_services_title = 'Services';
    $forest_eco_nature_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $forest_eco_nature_services = array(
        'post_type' => 'page',
        'post_title' => $forest_eco_nature_services_title,
        'post_content' => $forest_eco_nature_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $forest_eco_nature_services_id = wp_insert_post($forest_eco_nature_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($forest_eco_nature_menu_id, 0, array(
        'menu-item-title' => __('Services', 'forest-eco-nature'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $forest_eco_nature_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $forest_eco_nature_pages_title = 'Pages';
    $forest_eco_nature_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $forest_eco_nature_pages = array(
        'post_type' => 'page',
        'post_title' => $forest_eco_nature_pages_title,
        'post_content' => $forest_eco_nature_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $forest_eco_nature_pages_id = wp_insert_post($forest_eco_nature_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($forest_eco_nature_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'forest-eco-nature'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $forest_eco_nature_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $forest_eco_nature_contact_title = 'Contact';
    $forest_eco_nature_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $forest_eco_nature_contact = array(
        'post_type' => 'page',
        'post_title' => $forest_eco_nature_contact_title,
        'post_content' => $forest_eco_nature_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $forest_eco_nature_contact_id = wp_insert_post($forest_eco_nature_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($forest_eco_nature_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'forest-eco-nature'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $forest_eco_nature_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($forest_eco_nature_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$forest_eco_nature_bpmenulocation] = $forest_eco_nature_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('forest_eco_nature_mail', 'support@gmail.com');
        set_theme_mod('forest_eco_nature_location', 'Lorem Ipsum is simply dummy text of the printing');
        set_theme_mod('forest_eco_nature_phone_no', '1234567890');
        set_theme_mod('forest_eco_nature_membership_button', 'GET A QUOTE');
        set_theme_mod('forest_eco_nature_membership_link', '#');

        set_theme_mod('forest_eco_nature_header_fb_new_tab', true);
        set_theme_mod('forest_eco_nature_facebook_url', '#');
        set_theme_mod('forest_eco_nature_facebook_icon', 'fab fa-facebook-f');

        set_theme_mod('forest_eco_nature_header_twt_new_tab', true);
        set_theme_mod('forest_eco_nature_twitter_url', '#');
        set_theme_mod('forest_eco_nature_twitter_icon', 'fab fa-twitter');

        set_theme_mod('forest_eco_nature_header_ins_new_tab', true);
        set_theme_mod('forest_eco_nature_instagram_url', '#');
        set_theme_mod('forest_eco_nature_instagram_icon', 'fab fa-instagram');

        set_theme_mod('forest_eco_nature_header_ut_new_tab', true);
        set_theme_mod('forest_eco_nature_youtube_url', '#');
        set_theme_mod('forest_eco_nature_youtube_icon', 'fab fa-youtube');

        set_theme_mod('forest_eco_nature_header_pint_new_tab', true);
        set_theme_mod('forest_eco_nature_pint_url', '#');
        set_theme_mod('forest_eco_nature_pinterest_icon', 'fab fa-pinterest');

        // Slider Section
        set_theme_mod('forest_eco_nature_slider_arrows', true);
        set_theme_mod('forest_eco_nature_slider_short_heading', 'WELCOME TO FOREST THEME');
        for ($i = 1; $i <= 4; $i++) {
            $forest_eco_nature_title = 'Working Towards A Sustainable World';
            $forest_eco_nature_content = 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using';

            // Create post object
            $my_post = array(
                'post_title'    => wp_strip_all_tags($forest_eco_nature_title),
                'post_content'  => $forest_eco_nature_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            // Insert the post into the database
            $post_id = wp_insert_post($my_post);

            if ($post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('forest_eco_nature_slider_page' . $i, $post_id);

                $image_url = get_template_directory_uri() . '/assets/images/slider-img.png';
                $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }

        // About Section
        set_theme_mod('forest_eco_nature_about_show_hide', true);
        set_theme_mod('forest_eco_nature_service_sub_heading', 'WELCOME TO FOREST THEME');
        set_theme_mod('forest_eco_nature_service_heading', 'Preserve Wildlife Let’s Do It Together');
        set_theme_mod('forest_eco_nature_researve_background_image', get_template_directory_uri().'/assets/images/banner.png' );

        set_theme_mod('forest_eco_nature_tab_icon1', 'fas fa-recycle');
        set_theme_mod('forest_eco_nature_tab_icon2', 'fas fa-tint');
        set_theme_mod('forest_eco_nature_tab_icon3', 'fas fa-users');

        set_theme_mod('forest_eco_nature_tab_heading1', 'E-Waste Recycling');
        set_theme_mod('forest_eco_nature_tab_heading2', 'Water Conservation');
        set_theme_mod('forest_eco_nature_tab_heading3', 'Community Foresty');

        set_theme_mod('forest_eco_nature_tab_para1', 'Our goal is to ensure the ability of the earth to nurture life in all its diversity: protect biodiversity in all its forms, prevent pollution of land, air and water');
        set_theme_mod('forest_eco_nature_tab_para2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry');
        set_theme_mod('forest_eco_nature_tab_para3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since');

        $my_post = array(
            'post_status'   => 'publish',
            'post_type'     => 'page',
        );

        // Insert the post into the database
        $post_id = wp_insert_post($my_post);

        if ($post_id) {
            // Set the theme mod for the About page
            set_theme_mod('forest_eco_nature_about_page', $post_id);

            // Sideload image and set as the featured image
            $image_url = get_template_directory_uri() . '/assets/images/about-img.png';
            $image_id = media_sideload_image($image_url, $post_id, null, 'id');

            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            }
        }

    }
?>