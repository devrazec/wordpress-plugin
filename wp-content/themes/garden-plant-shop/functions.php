<?php
/**
 * Garden Plant Shop functions and definitions
 *
 * @package garden_plant_shop
 * @since 1.0
 */

if ( ! function_exists( 'garden_plant_shop_support' ) ) :
	function garden_plant_shop_support() {

		load_theme_textdomain( 'garden-plant-shop', get_template_directory() . '/languages' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		add_theme_support('woocommerce');

		// Enqueue editor styles.
		add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor-style.css');

		/* Theme Credit link */
		define('GARDEN_PLANT_SHOP_BUY_NOW',__('https://www.cretathemes.com/products/plant-shop-wordpress-theme','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_PRO_DEMO',__('https://pattern.cretathemes.com/garden-plant-shop/','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_THEME_DOC',__('https://pattern.cretathemes.com/free-guide/garden-plant-shop/','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_PRO_THEME_DOC',__('https://pattern.cretathemes.com/pro-guide/garden-plant-shop/','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_SUPPORT',__('https://wordpress.org/support/theme/garden-plant-shop','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_REVIEW',__('https://wordpress.org/support/theme/garden-plant-shop/reviews/#new-post','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_PRO_THEME_BUNDLE',__('https://www.cretathemes.com/products/wordpress-theme-bundle','garden-plant-shop'));
		define('GARDEN_PLANT_SHOP_PRO_ALL_THEMES',__('https://www.cretathemes.com/collections/wordpress-block-themes','garden-plant-shop'));

	}
endif;

add_action( 'after_setup_theme', 'garden_plant_shop_support' );

if ( ! function_exists( 'garden_plant_shop_styles' ) ) :
	function garden_plant_shop_styles() {
		// Register theme stylesheet.
		$garden_plant_shop_theme_version = wp_get_theme()->get( 'Version' );

		$garden_plant_shop_version_string = is_string( $garden_plant_shop_theme_version ) ? $garden_plant_shop_theme_version : false;
		wp_enqueue_style(
			'garden-plant-shop-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$garden_plant_shop_version_string
		);

		wp_enqueue_script( 'garden-plant-shop-custom-script', get_theme_file_uri( '/assets/js/custom-script.js' ), array( 'jquery' ), true );

		wp_enqueue_style( 'animate-css', esc_url(get_template_directory_uri()).'/assets/css/animate.css' );

		wp_enqueue_script( 'jquery-wow', esc_url(get_template_directory_uri()) . '/assets/js/wow.js', array('jquery') );

		wp_enqueue_style( 'dashicons' );

		wp_style_add_data( 'garden-plant-shop-style', 'rtl', 'replace' );

		//font-awesome
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/inc/fontawesome/css/all.css'
			, array(), '6.7.0' );

		//homepage slider
		wp_enqueue_style('garden-plant-shop-swiper-bundle-style', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), $garden_plant_shop_version_string);

		wp_enqueue_script('garden-plant-shop-swiper-bundle-scripts', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array(), $garden_plant_shop_version_string, true);
	}
endif;

add_action( 'wp_enqueue_scripts', 'garden_plant_shop_styles' );

/* Enqueue admin-notice-script js */
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook !== 'appearance_page_garden-plant-shop') return;

    wp_enqueue_script('admin-notice-script', get_template_directory_uri() . '/get-started/js/admin-notice-script.js', ['jquery'], null, true);
    wp_localize_script('admin-notice-script', 'pluginInstallerData', [
        'ajaxurl'     => admin_url('admin-ajax.php'),
        'nonce'       => wp_create_nonce('install_cretatestimonial_nonce'), // Match this with PHP nonce check
        'redirectUrl' => admin_url('themes.php?page=garden-plant-shop-guide-page'),
    ]);
});

add_action('wp_ajax_check_creta_testimonial_activation', function () {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
    $garden_plant_shop_plugin_file = 'creta-testimonial-showcase/creta-testimonial-showcase.php';

    if (is_plugin_active($garden_plant_shop_plugin_file)) {
        wp_send_json_success(['active' => true]);
    } else {
        wp_send_json_success(['active' => false]);
    }
});


// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Add block styles
require get_template_directory() . '/inc/block-styles.php';

// Block Filters
require get_template_directory() . '/inc/block-filters.php';

// Svg icons
require get_template_directory() . '/inc/icon-function.php';

// TGM plugin
require get_template_directory() . '/inc/tgm/tgm.php';

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Get Started.
require get_template_directory() . '/inc/get-started/get-started.php';

// Add Getstart admin notice
function garden_plant_shop_admin_notice() { 
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'garden_plant_shop_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();

    if( !$meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } if($current_screen->base != 'appearance_page_garden-plant-shop-guide-page' && $current_screen->base != 'toplevel_page_cretats-theme-showcase' ) { ?>

	    <div class="notice notice-success dash-notice">
	        <h1><?php esc_html_e('Hey, Thank you for installing Garden Plant ShopTheme!', 'garden-plant-shop'); ?></h1>
	        <p> <a href="javascript:void(0);" id="install-activate-button" class="button admin-button info-button get-start-btn">
				   <?php echo __('Nevigate Getstart', 'garden-plant-shop'); ?>
				</a>

				<script type="text/javascript">
				document.getElementById('install-activate-button').addEventListener('click', function () {
				    const garden_plant_shop_button = this;
				    const garden_plant_shop_redirectUrl = '<?php echo esc_url(admin_url("themes.php?page=garden-plant-shop-guide-page")); ?>';
				    // First, check if plugin is already active
				    jQuery.post(ajaxurl, { action: 'check_creta_testimonial_activation' }, function (response) {
				        if (response.success && response.data.active) {
				            // Plugin already active — just redirect
				            window.location.href = garden_plant_shop_redirectUrl;
				        } else {
				            // Show Installing & Activating only if not already active
				            garden_plant_shop_button.textContent = 'Nevigate Getstart';

				            jQuery.post(ajaxurl, {
				                action: 'install_and_activate_creta_testimonial_plugin',
				                nonce: '<?php echo wp_create_nonce("install_activate_nonce"); ?>'
				            }, function (response) {
				                if (response.success) {
				                    window.location.href = garden_plant_shop_redirectUrl;
				                } else {
				                    alert('Failed to activate the plugin.');
				                    garden_plant_shop_button.textContent = 'Try Again';
				                }
				            });
				        }
				    });
				});
				</script>

	        	<a class="button button-primary site-edit" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>"><?php esc_html_e('Site Editor', 'garden-plant-shop'); ?></a> 
				<a class="button button-primary buy-now-btn" href="<?php echo esc_url( GARDEN_PLANT_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'garden-plant-shop'); ?></a>
				<a class="button button-primary bundle-btn" href="<?php echo esc_url( GARDEN_PLANT_SHOP_PRO_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Get Bundle', 'garden-plant-shop'); ?></a>
	        </p>
	        <p class="dismiss-link"><strong><a href="?garden_plant_shop_admin_notice=1"><?php esc_html_e( 'Dismiss', 'garden-plant-shop' ); ?></a></strong></p>
	    </div>
	    <?php }?>
	    <?php
	}
}

add_action( 'admin_notices', 'garden_plant_shop_admin_notice' );

if( ! function_exists( 'garden_plant_shop_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function garden_plant_shop_update_admin_notice(){
    if ( isset( $_GET['garden_plant_shop_admin_notice'] ) && $_GET['garden_plant_shop_admin_notice'] = '1' ) {
        update_option( 'garden_plant_shop_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'garden_plant_shop_update_admin_notice' );

//After Switch theme function
add_action('after_switch_theme', 'garden_plant_shop_getstart_setup_options');
function garden_plant_shop_getstart_setup_options () {
    update_option('garden_plant_shop_admin_notice', FALSE );
}

function garden_plant_shop_google_fonts() {
 
	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', false ); 

	wp_enqueue_style( 'inter', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', false );
}
 
add_action( 'wp_enqueue_scripts', 'garden_plant_shop_google_fonts' );