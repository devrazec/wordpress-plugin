<div class="theme-import">
	<?php 
    // Check if the demo import has been completed
    $tour_planner_ebooking_demo_import_completed = get_option('tour_planner_ebooking_demo_import_completed', false);

    // If the demo import is completed, display the "View Site" button
        if ($tour_planner_ebooking_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'tour-planner-ebooking') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '"  class= "run-import view-site" target="_blank">' . esc_html__('VIEW SITE', 'tour-planner-ebooking') . '</a></span>';
        }


    if (isset($_POST['submit'])) {

        // Check if Contact Form 7 is installed and activated
        if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
          // Install the plugin if it doesn't exist
          $tour_planner_ebooking_plugin_slug = 'contact-form-7';
          $tour_planner_ebooking_plugin_file = 'contact-form-7/wp-contact-form-7.php';

          // Check if plugin is installed
          $tour_planner_ebooking_installed_plugins = get_plugins();
          if (!isset($tour_planner_ebooking_installed_plugins[$tour_planner_ebooking_plugin_file])) {
              include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
              include_once(ABSPATH . 'wp-admin/includes/file.php');
              include_once(ABSPATH . 'wp-admin/includes/misc.php');
              include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

              // Install the plugin
              $tour_planner_ebooking_upgrader = new Plugin_Upgrader();
              $tour_planner_ebooking_upgrader->install('https://downloads.wordpress.org/plugin/contact-form-7.latest-stable.zip');
          }
          // Activate the plugin
          activate_plugin($tour_planner_ebooking_plugin_file);
        }

        // Create a front page and assign the template
        $tour_planner_ebooking_home_page = null;
        // Using WP_Query instead of get_page_by_title()
        $tour_planner_ebooking_home_query = new WP_Query(array(
           'post_type' => 'page',
           'title' => 'Home',
           'post_status' => 'publish',
           'posts_per_page' => 1
        ));
        if (!$tour_planner_ebooking_home_query->have_posts()) {
           $tour_planner_ebooking_home_title = 'Home';           
           // Create the page
           $tour_planner_ebooking_home = array(
               'post_type' => 'page',
               'post_title' => $tour_planner_ebooking_home_title,
               'post_status' => 'publish',
               'post_author' => 1,
               'post_slug' => 'home'
           );
           $tour_planner_ebooking_home_id = wp_insert_post($tour_planner_ebooking_home);
        } else {
           $tour_planner_ebooking_home_page = $tour_planner_ebooking_home_query->posts[0];
           $tour_planner_ebooking_home_id = $tour_planner_ebooking_home_page->ID;
        }

        // Set the home page template
        add_post_meta($tour_planner_ebooking_home_id, '_wp_page_template', 'page-template/custom-front-page.php');

        // Set the static front page
        update_option('page_on_front', $tour_planner_ebooking_home_id);
        update_option('show_on_front', 'page');

        // Create another page if needed
        $tour_planner_ebooking_page_query = new WP_Query(array(
           'post_type' => 'page',
           'title' => 'Page',
           'post_status' => 'publish',
           'posts_per_page' => 1
        ));

        if (!$tour_planner_ebooking_page_query->have_posts()) {
           $tour_planner_ebooking_page_title = 'Page';
           $tour_planner_ebooking_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
           
            $tour_planner_ebooking_page = array(
               'post_type' => 'page',
               'post_title' => $tour_planner_ebooking_page_title,
               'post_content' => $tour_planner_ebooking_content,
               'post_status' => 'publish',
               'post_author' => 1,
               'post_slug' => 'page'
            );
            $tour_planner_ebooking_page_id = wp_insert_post($tour_planner_ebooking_page);
        }       

        // Set the demo import completion flag
    		update_option('tour_planner_ebooking_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'tour-planner-ebooking') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="run-import site-btn" target="_blank">' . esc_html__('VIEW SITE', 'tour-planner-ebooking') . '</a></span>';

    //end

        // Topbar Section
        set_theme_mod( 'tour_planner_ebooking_purchase_btn_text', 'Book A Tour' );
        set_theme_mod( 'tour_planner_ebooking_purchase_btn_url', '#' );    
        set_theme_mod( 'tour_planner_ebooking_book_btn_icon', 'fa-solid fa-angle-right' );
        set_theme_mod( 'tour_planner_ebooking_myaccount_btn_url', '#' );
        set_theme_mod( 'tour_planner_ebooking_myaccount_icon', 'fas fa-user' );

        // slider section    
        set_theme_mod( 'tour_planner_ebooking_slide_number', '3' );
        for($tour_planner_ebooking_i=1; $tour_planner_ebooking_i<=3; $tour_planner_ebooking_i++) {
          set_theme_mod( 'tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i, get_template_directory_uri().'/images/slider'.$tour_planner_ebooking_i.'.png' );
          set_theme_mod( 'tour_planner_ebooking_slider_title'.$tour_planner_ebooking_i, 'Discover the most engaging places' );
          set_theme_mod( 'tour_planner_ebooking_slider_text'.$tour_planner_ebooking_i, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' ); 

          // contact form shortcode
            $tour_planner_ebooking_cf7title = "Contact Page";
            $tour_planner_ebooking_cf7content = '
            <div class="destination select">
                <select class="form-select" required>
                    <option value="" disabled selected>Destination</option>
                    <option value="Paris">Paris</option>
                    <option value="Rome">Rome</option>
                    <option value="Bali">Bali</option>
                    <option value="Sydney">Sydney</option>
                    <option value="Cape Town">Cape Town</option>
                    <option value="Dubai">Dubai</option>
                </select>
                <p>Where are you going?</p>
            </div>
            
            <div class="activity select">
                <select class="form-select" required>
                    <option value="" disabled selected>Activity</option>
                    <option value="Paris>">Trekking</option>
                    <option value="Rome">Snorkeling</option>
                    <option value="Bali">Diving</option>
                    <option value="Sydney">Wildlife Safaris</option>
                    <option value="Cape Town">Snowboarding</option>
                </select>
                <p>All activity</p>
            </div>
            
            <div class="dates select">
                <label for="your-dates">Dates</label>
                <div class="date-input-container">
                    <input type="date" name="your-dates" id="your-dates" class="form-control" placeholder="Dates">
                </div>
            </div>
            
            <div class="guest select">
                <label for="your-guest">[number* your-guest placeholder "Guest"]</label>
                <p>3 person</p>
            </div>
            
            <div>
                <button type="submit" class="search-tour"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>


            [_site_title] "[your-subject]"
            [_site_title] <support@example.com>
            From: [your-name] <[your-email]>
            Subject: [your-subject]

            Message Body:
            [your-message]

            --
            This e-mail was sent from a contact form on [_site_title] ([_site_url])
            [_site_admin_email]
            Reply-To: [your-email]

            0
            0

            [_site_title] "[your-subject]"
            [_site_title] <support@example.com>
            Message Body:
            [your-message]

            --
            This e-mail was sent from a contact form on [_site_title] ([_site_url])
            [your-email]
            Reply-To: [_site_admin_email]

            0
            0
            Thank you for your message. It has been sent.
            There was an error trying to send your message. Please try again later.
            One or more fields have an error. Please check and try again.
            There was an error trying to send your message. Please try again later.
            You must accept the terms and conditions before sending your message.
            The field is required.
            The field is too long.
            The field is too short.
            There was an unknown error uploading the file.
            You are not allowed to upload files of this type.
            The file is too big.
            There was an error uploading the file.';

            $tour_planner_ebooking_cf7_post = array(
            'post_title'    => wp_strip_all_tags( $tour_planner_ebooking_cf7title ),
            'post_content'  => $tour_planner_ebooking_cf7content,
            'post_status'   => 'publish',
            'post_type'     => 'wpcf7_contact_form',
            );
            // Insert the post into the database
            $tour_planner_ebooking_cf7post_id = wp_insert_post( $tour_planner_ebooking_cf7_post );

            add_post_meta($tour_planner_ebooking_cf7post_id, "_form", '
            <div class="destination select">
                <select class="form-select" required>
                    <option value="" disabled selected>Destination</option>
                    <option value="Paris">Paris</option>
                    <option value="Rome">Rome</option>
                    <option value="Bali">Bali</option>
                    <option value="Sydney">Sydney</option>
                    <option value="Cape Town">Cape Town</option>
                    <option value="Dubai">Dubai</option>
                </select>
                <p>Where are you going?</p>
            </div>
            
            <div class="activity select">
                <select class="form-select" required>
                    <option value="" disabled selected>Activity</option>
                    <option value="Paris>">Trekking</option>
                    <option value="Rome">Snorkeling</option>
                    <option value="Bali">Diving</option>
                    <option value="Sydney">Wildlife Safaris</option>
                    <option value="Cape Town">Snowboarding</option>
                </select>
                <p>All activity</p>
            </div>
            
            <div class="dates select">
                <label for="your-dates">Dates</label>
                <div class="date-input-container">
                    <input type="date" name="your-dates" id="your-dates" class="form-control" placeholder="Dates">
                </div>
            </div>
            
            <div class="guest select">
                <label for="your-guest">[number* your-guest placeholder "Guest"]</label>
                <p>3 person</p>
            </div>
            
            <div>
                <button type="submit" class="search-tour"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            ');

            $tour_planner_ebooking_cf7mail_data  = array('subject' => '[_site_title] "[your-subject]"',
                'sender' => '[_site_title] <support@example.com>',
                'body' => 'From: [your-name] <[your-email]>
            Subject: [your-subject]

            Message Body:
            [your-message]

            --
            This e-mail was sent from a contact form on [_site_title] ([_site_url])',
                'recipient' => '[_site_admin_email]',
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html' => 0,
                'exclude_blank' => 0 );

            add_post_meta($tour_planner_ebooking_cf7post_id, "_mail", $tour_planner_ebooking_cf7mail_data);
                      // Gets term object from Tree in the database.
            $tour_planner_ebooking_cf7shortcode = '[contact-form-7 id="'.$tour_planner_ebooking_cf7post_id.'" title="'.$tour_planner_ebooking_cf7title.'"]';
            set_theme_mod( 'tour_planner_ebooking_banner_form_shortcode',$tour_planner_ebooking_cf7shortcode );
        }

        // Best Category Section
        set_theme_mod( 'tour_planner_ebooking_tour_section_text', 'Our Best Category' );
        set_theme_mod( 'tour_planner_ebooking_tour_section_title', 'Make your holiday perfect' );    
        set_theme_mod( 'tour_planner_ebooking_category_btn_text', 'Browse Categories' );
        set_theme_mod( 'tour_planner_ebooking_category_btn_url', '#' ); 
        set_theme_mod( 'tour_planner_ebooking_category_btn_icon', 'fa-solid fa-angle-right' ); 
    
        // Define default categories with images, icons, and text
        $tour_planner_ebooking_categories_data = array(
        'Cruises Tour' => array(
            'image' => get_template_directory_uri() . '/images/category1.png',
            'icon'  => 'fa-solid fa-ship',
            'text'  => '$600'
        ),
        'City Tour' => array(
            'image' => get_template_directory_uri() . '/images/category2.png',
            'icon'  => 'fa-solid fa-city',
            'text'  => '$500'
        ),
        'Hiking Tour' => array(
            'image' => get_template_directory_uri() . '/images/category3.png',
            'icon'  => 'fa-solid fa-person-hiking',
            'text'  => '$300'
        ),
        'Beach Tour' => array(
            'image' => get_template_directory_uri() . '/images/category4.png',
            'icon'  => 'fa-solid fa-umbrella-beach',
            'text'  => '$800'
        )
    );

    $tour_planner_ebooking_counter = 1;
    foreach ($tour_planner_ebooking_categories_data as $tour_planner_ebooking_category_name => $tour_planner_ebooking_data) {
        $tour_planner_ebooking_term = term_exists($tour_planner_ebooking_category_name, 'category');
        if ($tour_planner_ebooking_term === 0 || $tour_planner_ebooking_term === null) {
            $tour_planner_ebooking_term = wp_insert_term($tour_planner_ebooking_category_name, 'category');
            if (!is_wp_error($tour_planner_ebooking_term)) {
                $tour_planner_ebooking_category_id = $tour_planner_ebooking_term['term_id'];
                // Assign category image
                update_term_meta($tour_planner_ebooking_category_id, 'category_image', $tour_planner_ebooking_data['image']);
                error_log("Category '{$tour_planner_ebooking_category_name}' created with image '{$tour_planner_ebooking_data['image']}'.");
            } else {
                error_log("Error creating category '{$tour_planner_ebooking_category_name}': " . $tour_planner_ebooking_term->get_error_message());
                continue;
            }
        } else {
            error_log("Category '{$tour_planner_ebooking_category_name}' already exists.");
            $tour_planner_ebooking_category_id = $tour_planner_ebooking_term['term_id'];
        }

        // Assign settings to Customizer for each category
        set_theme_mod('tour_planner_ebooking_category_cat' . $tour_planner_ebooking_counter, $tour_planner_ebooking_category_name);
        set_theme_mod('tour_planner_ebooking_cat_small_text' . $tour_planner_ebooking_counter, $tour_planner_ebooking_data['text']);
        set_theme_mod('tour_planner_ebooking_category_icon' . $tour_planner_ebooking_counter, $tour_planner_ebooking_data['icon']);

        // Add 2-3 dummy posts for the category
        for ($tour_planner_ebooking_i = 1; $tour_planner_ebooking_i <= 3; $tour_planner_ebooking_i++) {
            $tour_planner_ebooking_post_title = $tour_planner_ebooking_category_name . " Post " . $tour_planner_ebooking_i;
            $tour_planner_ebooking_post_content = "This is a dummy post for the " . $tour_planner_ebooking_category_name . " category.";
            $tour_planner_ebooking_post_status = 'publish';

            $tour_planner_ebooking_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'title'          => $tour_planner_ebooking_post_title,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $tour_planner_ebooking_category_id,
                    ),
                ),
            ));

            if (!$tour_planner_ebooking_query->have_posts()) {
                $tour_planner_ebooking_post_id = wp_insert_post(array(
                    'post_title'   => $tour_planner_ebooking_post_title,
                    'post_content' => $tour_planner_ebooking_post_content,
                    'post_status'  => $tour_planner_ebooking_post_status,
                    'post_category' => array($tour_planner_ebooking_category_id),
                ));

                if (!is_wp_error($tour_planner_ebooking_post_id)) {
                    error_log("Post '{$tour_planner_ebooking_post_title}' created with ID {$tour_planner_ebooking_post_id} in category '{$tour_planner_ebooking_category_name}'.");
                } else {
                    error_log("Error creating post '{$tour_planner_ebooking_post_title}': " . $tour_planner_ebooking_post_id->get_error_message());
                }
            } else {
                error_log("Post '{$tour_planner_ebooking_post_title}' already exists.");
            }

            wp_reset_postdata();
        }

        $tour_planner_ebooking_counter++;
        if ($tour_planner_ebooking_counter > 4) {
            break;
        }
    }
         
    }
    ?>
  
	<p class="note"><?php esc_html_e( 'Please Note: If your website is live and already contains data, we recommend creating a backup first. Running this importer will replace your current settings with the custom values from the demo.', 'tour-planner-ebooking' ); ?></p>
        <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=tour_planner_ebooking_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('tour_planner_ebooking_demo_import_completed')) : ?>
            <button type="submit" name="submit" class="run-import">
                    <?php esc_html_e('Run Importer','tour-planner-ebooking'); ?>
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

