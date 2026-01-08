<div class="theme-import">
	<?php 
        // Check if the demo import has been completed
        $tour_travel_agent_demo_import_completed = get_option('tour_travel_agent_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($tour_travel_agent_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'tour-travel-agent') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '"  class= "run-import view-site" target="_blank">' . esc_html__('VIEW SITE', 'tour-travel-agent') . '</a></span>';
        }

		// POST and update the customizer and other related data
        if (isset($_POST['submit'])) {

             // ------- Create Nav Menu --------
            $tour_travel_agent_menuname = 'Main Menus';
            $tour_travel_agent_bpmenulocation = 'primary';
            $tour_travel_agent_menu_exists = wp_get_nav_menu_object($tour_travel_agent_menuname);

            if (!$tour_travel_agent_menu_exists) {
                $tour_travel_agent_menu_id = wp_create_nav_menu($tour_travel_agent_menuname);

                // Create Home Page
                $tour_travel_agent_home_title = 'Home';
                $tour_travel_agent_home = array(
                    'post_type' => 'page',
                    'post_title' => $tour_travel_agent_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $tour_travel_agent_home_id = wp_insert_post($tour_travel_agent_home);
                // Assign Home Page Template
                add_post_meta($tour_travel_agent_home_id, '_wp_page_template', 'page-template/custom-frontpage.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $tour_travel_agent_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($tour_travel_agent_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'tour-travel-agent'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $tour_travel_agent_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Destination Page with Dummy Content
                $tour_travel_agent_pages_title = 'Destination';
                $tour_travel_agent_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $tour_travel_agent_pages = array(
                    'post_type' => 'page',
                    'post_title' => $tour_travel_agent_pages_title,
                    'post_content' => $tour_travel_agent_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $tour_travel_agent_pages_id = wp_insert_post($tour_travel_agent_pages);
                // Add Destination Page to Menu
                wp_update_nav_menu_item($tour_travel_agent_menu_id, 0, array(
                    'menu-item-title' => __('Destination', 'tour-travel-agent'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $tour_travel_agent_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $tour_travel_agent_about_title = 'Pages';
                $tour_travel_agent_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $tour_travel_agent_about = array(
                    'post_type' => 'page',
                    'post_title' => $tour_travel_agent_about_title,
                    'post_content' => $tour_travel_agent_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $tour_travel_agent_about_id = wp_insert_post($tour_travel_agent_about);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($tour_travel_agent_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'tour-travel-agent'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $tour_travel_agent_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Blog Page with Dummy Content
                $tour_travel_agent_pages_title = 'Blog';
                $tour_travel_agent_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $tour_travel_agent_pages = array(
                    'post_type' => 'page',
                    'post_title' => $tour_travel_agent_pages_title,
                    'post_content' => $tour_travel_agent_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $tour_travel_agent_pages_id = wp_insert_post($tour_travel_agent_pages);
                // Add Blog Page to Menu
                wp_update_nav_menu_item($tour_travel_agent_menu_id, 0, array(
                    'menu-item-title' => __('Blog', 'tour-travel-agent'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $tour_travel_agent_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));


                // Create Contact Us Page with Dummy Content
                $tour_travel_agent_pages_title = 'Contact Us';
                $tour_travel_agent_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $tour_travel_agent_pages = array(
                    'post_type' => 'page',
                    'post_title' => $tour_travel_agent_pages_title,
                    'post_content' => $tour_travel_agent_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $tour_travel_agent_pages_id = wp_insert_post($tour_travel_agent_pages);
                // Add Contact Us Page to Menu
                wp_update_nav_menu_item($tour_travel_agent_menu_id, 0, array(
                    'menu-item-title' => __('Contact Us', 'tour-travel-agent'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $tour_travel_agent_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                

                // Set the menu location if it's not already set
                if (!has_nav_menu($tour_travel_agent_bpmenulocation)) {
                    $tour_travel_agent_locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($tour_travel_agent_locations)) {
                        $tour_travel_agent_locations = array();
                    }
                    $tour_travel_agent_locations[$tour_travel_agent_bpmenulocation] = $tour_travel_agent_menu_id;
                    set_theme_mod('nav_menu_locations', $tour_travel_agent_locations);
                }
                
        }     


            // Set the home page template
            add_post_meta($tour_travel_agent_home_id, '_wp_page_template', 'page-template/custom-frontpage.php');

            // Set the static front page
            update_option('page_on_front', $tour_travel_agent_home_id);
            update_option('show_on_front', 'page');

            // Create another page if needed
            $tour_travel_agent_page_query = new WP_Query(array(
               'post_type' => 'page',
               'title' => 'Page',
               'post_status' => 'publish',
               'posts_per_page' => 1
            ));

            if (!$tour_travel_agent_page_query->have_posts()) {
               $tour_travel_agent_page_title = 'Page';
               $tour_travel_agent_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                    All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
               
                $tour_travel_agent_page = array(
                   'post_type' => 'page',
                   'post_title' => $tour_travel_agent_page_title,
                   'post_content' => $tour_travel_agent_content,
                   'post_status' => 'publish',
                   'post_author' => 1,
                   'post_slug' => 'page'
                );
                $tour_travel_agent_page_id = wp_insert_post($tour_travel_agent_page);
            }       

            // Top Bar 
            set_theme_mod( 'tour_travel_agent_topbar_phone', '(+00)123 4567 890' ); 
            set_theme_mod( 'tour_travel_agent_topbar_email', 'example@gmail.com' ); 
            set_theme_mod( 'tour_travel_agent_topbar_location', '77 Franklin st, San Francisco' ); 
            set_theme_mod( 'tour_travel_agent_facebook_url', '#' ); 
            set_theme_mod( 'tour_travel_agent_twitter_url', '#' ); 
            set_theme_mod( 'tour_travel_agent_linkedin_url', '#' ); 
            set_theme_mod( 'tour_travel_agent_instagram_url', '#' ); 

            // Header
            set_theme_mod( 'tour_travel_agent_book_btn_text', 'Book Now' ); 
            set_theme_mod( 'tour_travel_agent_book_btn_url', '#' ); 

            // Slider     
            set_theme_mod( 'tour_travel_agent_slider_hide_show', true);
            set_theme_mod( 'tour_travel_agent_slider_title', 'Ready to start your exciting journey.' );
            set_theme_mod( 'tour_travel_agent_slider_text', 'Lorem ipsum dolor sit amet constur adipisg elit. Amet veriis aspetur, peiatis nuuam dsimos aliquid!' );
            set_theme_mod( 'tour_travel_agent_slider_background_img', get_template_directory_uri().'/images/slider-bg.png');
            set_theme_mod( 'tour_travel_agent_location_text', 'Location' );
            set_theme_mod( 'tour_travel_agent_slider_category', 'postcategory1' );

            // Define post category names and post titles
            $tour_travel_agent_category_names = array('postcategory1', 'postcategory2', 'postcategory3', 'postcategory4');
            $tour_travel_agent_title_array = array(
                array("Iceland", "Spain", "Africa", "Asia"),
                array("Iceland", "Spain", "Africa", "Asia"),
                array("Iceland", "Spain", "Africa", "Asia"),
                array("Iceland", "Spain", "Africa", "Asia")
            );

            foreach ($tour_travel_agent_category_names as $tour_travel_agent_index => $tour_travel_agent_category_name) {
                // Create or retrieve the post category term ID
                $tour_travel_agent_term = term_exists($tour_travel_agent_category_name, 'category');
                if ($tour_travel_agent_term === 0 || $tour_travel_agent_term === null) {
                    // If the term does not exist, create it
                    $tour_travel_agent_term = wp_insert_term($tour_travel_agent_category_name, 'category');
                }
                if (is_wp_error($tour_travel_agent_term)) {
                    error_log('Error creating category: ' . $tour_travel_agent_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                for ($tour_travel_agent_i = 0; $tour_travel_agent_i < 4; $tour_travel_agent_i++) {
                    // Create post content
                    $tour_travel_agent_title = $tour_travel_agent_title_array[$tour_travel_agent_index][$tour_travel_agent_i];

                    // Create post post object
                    $tour_travel_agent_my_post = array(
                        'post_title'    => wp_strip_all_tags($tour_travel_agent_title),
                        'post_status'   => 'publish',
                        'post_type'     => 'post', // Post type set to 'post'
                    );

                    // Insert the post into the database
                    $tour_travel_agent_post_id = wp_insert_post($tour_travel_agent_my_post);

                    if (is_wp_error($tour_travel_agent_post_id)) {
                        error_log('Error creating post: ' . $tour_travel_agent_post_id->get_error_message());
                        continue; // Skip to the next post if creation fails
                    }

                    // Assign the category to the post
                    wp_set_post_categories($tour_travel_agent_post_id, array((int)$tour_travel_agent_term['term_id']));

                    // Handle the featured image using media_sideload_image
                    $tour_travel_agent_image_url = get_template_directory_uri() . '/images/tour-category' . ($tour_travel_agent_i + 1) . '.png';
                    $tour_travel_agent_image_id = media_sideload_image($tour_travel_agent_image_url, $tour_travel_agent_post_id, null, 'id');

                    if (is_wp_error($tour_travel_agent_image_id)) {
                        error_log('Error downloading image: ' . $tour_travel_agent_image_id->get_error_message());
                        continue; // Skip to the next post if image download fails
                    }
                    // Assign featured image to post
                    set_post_thumbnail($tour_travel_agent_post_id, $tour_travel_agent_image_id);
                }
            }

            // Popular Tour Section
            set_theme_mod( 'tour_travel_agent_popular_tour_hide_show', true ); 
            set_theme_mod( 'tour_travel_agent_section_title', 'Most Popular Tour' ); 
            set_theme_mod( 'tour_travel_agent_section_bg_title', 'Popular Tour' ); 
            set_theme_mod( 'tour_travel_agent_popular_tour_category', 'tourcategory1' );


            // Define post category names and post titles
            $tour_travel_agent_category_names = array('tourcategory1', 'tourcategory2', 'tourcategory3', 'tourcategory4');
            $tour_travel_agent_title_array = array(
                array("Enjoy a night party with friends in America", "Where to Spend a Month in greece in September?", "Enjoy the beauty of the floating of the city" , "dream destination to visit this year in spain"),
                array("Enjoy a night party with friends in America", "Where to Spend a Month in greece in September?", "Enjoy the beauty of the floating of the city" , "dream destination to visit this year in spain"),
                array("Enjoy a night party with friends in America", "Where to Spend a Month in greece in September?", "Enjoy the beauty of the floating of the city" , "dream destination to visit this year in spain"),
                array("Enjoy a night party with friends in America", "Where to Spend a Month in greece in September?", "Enjoy the beauty of the floating of the city" , "dream destination to visit this year in spain")
            );

            foreach ($tour_travel_agent_category_names as $tour_travel_agent_index => $tour_travel_agent_category_name) {
                // Create or retrieve the post category term ID
                $tour_travel_agent_term = term_exists($tour_travel_agent_category_name, 'category');
                if ($tour_travel_agent_term === 0 || $tour_travel_agent_term === null) {
                    // If the term does not exist, create it
                    $tour_travel_agent_term = wp_insert_term($tour_travel_agent_category_name, 'category');
                }
                if (is_wp_error($tour_travel_agent_term)) {
                    error_log('Error creating category: ' . $tour_travel_agent_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                for ($tour_travel_agent_i = 0; $tour_travel_agent_i < 4; $tour_travel_agent_i++) {
                    // Create post content
                    $tour_travel_agent_title = $tour_travel_agent_title_array[$tour_travel_agent_index][$tour_travel_agent_i];
                    $tour_travel_agent_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

                    // Create post post object
                    $tour_travel_agent_my_post = array(
                        'post_title'    => wp_strip_all_tags($tour_travel_agent_title),
                        'post_content'  => $tour_travel_agent_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'post', // Post type set to 'post'
                    );

                    // Insert the post into the database
                    $tour_travel_agent_post_id = wp_insert_post($tour_travel_agent_my_post);

                    if (is_wp_error($tour_travel_agent_post_id)) {
                        error_log('Error creating post: ' . $tour_travel_agent_post_id->get_error_message());
                        continue; // Skip to the next post if creation fails
                    }

                    // Assign the category to the post
                    wp_set_post_categories($tour_travel_agent_post_id, array((int)$tour_travel_agent_term['term_id']));

                    // Handle the featured image using media_sideload_image
                    $tour_travel_agent_image_url = get_template_directory_uri() . '/images/popular-tour' . ($tour_travel_agent_i + 1) . '.png';
                    $tour_travel_agent_image_id = media_sideload_image($tour_travel_agent_image_url, $tour_travel_agent_post_id, null, 'id');

                    if (is_wp_error($tour_travel_agent_image_id)) {
                        error_log('Error downloading image: ' . $tour_travel_agent_image_id->get_error_message());
                        continue; // Skip to the next post if image download fails
                    }
                    // Assign featured image to post
                    set_post_thumbnail($tour_travel_agent_post_id, $tour_travel_agent_image_id);
                }
            }

            //Copyright Text
            set_theme_mod( 'tour_travel_agent_footer_copy', 'By ThemesCaliber' ); 

            // Set the demo import completion flag
    		update_option('tour_travel_agent_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'tour-travel-agent') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="run-import site-btn" target="_blank">' . esc_html__('VIEW SITE', 'tour-travel-agent') . '</a></span>';

        }
    ?>
  
    <p class="note"><?php esc_html_e( 'Please Note: If your website is live and already contains data, we recommend creating a backup first. Running this importer will replace your current settings with the custom values from the demo.', 'tour-travel-agent' ); ?></p>
        <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=tour_travel_agent_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('tour_travel_agent_demo_import_completed')) : ?>
            <button type="submit" name="submit" class="run-import">
                    <?php esc_html_e('Run Importer','tour-travel-agent'); ?>
                    <span id="spinner" style="display: none;">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/spinner.gif" alt="Loading..." style="width:34px; height:34px; vertical-align: middle;" />
                    </span>
            </button>
        <?php endif; ?>
        </form>
        <script type="text/javascript">
            function validate(valid) {
                if(confirm("Do you really want to import the theme demo content?")){
                    document.getElementById('spinner').style.display = 'inline-block';
                }
                else {
                    return false;
                }
            }
        </script>
    </div>