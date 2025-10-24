<?php
/**
 * Wizard
 *
 * @package Whizzie
 * @author Aster Themes
 * @since 1.0.0
 */

class Whizzie {

	protected $version = '1.1.0';
	protected $theme_name = '';
	protected $theme_title = '';
	protected $page_slug = '';
	protected $page_title = '';
	protected $config_steps = array();
	public $plugin_path;
	public $parent_slug;
	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_url = '';

	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;

	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

	/*** Constructor ***
	* @param $config	Our config parameters
	*/
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}

	/**
	* Set some settings
	* @since 1.0.0
	* @param $config	Our config parameters
	*/

	public function set_vars( $config ) {
		// require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';

		if( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$this->plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->plugin_path );
		$this->plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );
	}

	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */
	public function init() {
		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ), );

		wp_localize_script(
			'theme-wizard-script',
			'landscape_gardening_whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'verify_text'	=> esc_html( 'verifying', 'landscape-gardening' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
	}

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}

	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2*/
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}

	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}

	/***        Make a modal screen for the wizard        ***/
	
	public function menu_page() {
		add_theme_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'landscape_gardening_setup_wizard' ) );
	}

	/***        Make an interface for the wizard        ***/

	public function wizard_page() {
		tgmpa_load_bulk_installer();
		// install plugins with TGM.
		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( 'Failed to find TGM' );
		}
		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );

		// copied from TGM
		$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
		$fields = array_keys( $_POST ); // Extra fields to pass to WP_Filesystem.
		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true; // Stop the normal page form from displaying, credential request form will be shown.
		}
		// Now we have some credentials, setup WP_Filesystem.
		if ( ! WP_Filesystem( $creds ) ) {
			// Our credentials were no good, ask the user for them again.
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}
		/* If we arrive here, we have the filesystem */ ?>
		<div class="main-wrap">
			<?php
			echo '<div class="card whizzie-wrap">';
				// The wizard is a list with only one item visible at a time
				$steps = $this->get_steps();
				echo '<ul class="whizzie-menu">';
				foreach( $steps as $step ) {
					$class = 'step step-' . esc_attr( $step['id'] );
					echo '<li data-step="' . esc_attr( $step['id'] ) . '" class="' . esc_attr( $class ) . '">';
						printf( '<h2>%s</h2>', esc_html( $step['title'] ) );
						// $content is split into summary and detail
						$content = call_user_func( array( $this, $step['view'] ) );
						if( isset( $content['summary'] ) ) {
							printf(
								'<div class="summary">%s</div>',
								wp_kses_post( $content['summary'] )
							);
						}
						if( isset( $content['detail'] ) ) {
							// Add a link to see more detail
							printf( '<p><a href="#" class="more-info">%s</a></p>', __( 'More Info', 'landscape-gardening' ) );
							printf(
								'<div class="detail">%s</div>',
								$content['detail'] // Need to escape this
							);
						}
						// The next button
						if( isset( $step['button_text'] ) && $step['button_text'] ) {
							printf(
								'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
								esc_attr( $step['callback'] ),
								esc_attr( $step['id'] ),
								esc_html( $step['button_text'] )
							);
						}
					echo '</li>';
				}
				echo '</ul>';
				?>		
				<div class="step-loading"><span class="spinner"></span></div>
			</div><!-- .whizzie-wrap -->

		</div><!-- .wrap -->
	<?php }

	public function activation_page() {
		?>
		<div class="main-wrap">
			<h3><?php esc_html_e('Theme Setup Wizard','landscape-gardening'); ?></h3>
		</div>
		<?php
	}

	public function landscape_gardening_setup_wizard(){

			$display_string = '';

			$body = [
				'home_url'					 => home_url(),
				'theme_text_domain'	 => wp_get_theme()->get( 'TextDomain' )
			];

			$body = wp_json_encode( $body );
			$options = [
				'body'        => $body,
				'sslverify' 	=> false,
				'headers'     => [
					'Content-Type' => 'application/json',
				]
			];

			//custom function about theme customizer
			$return = add_query_arg( array()) ;
			$theme = wp_get_theme( 'landscape-gardening' );

			?>
				<div class="wrapper-info get-stared-page-wrap">
					<div class="tab-sec theme-option-tab">
						<div id="demo_offer" class="tabcontent">
							<?php $this->wizard_page(); ?>
						</div>
					</div>
				</div>
			<?php
	}
	

	/**
	* Set options for the steps
	* Incorporate any options set by the theme dev
	* Return the array for the steps
	* @return Array
	*/
	public function get_steps() {
		$dev_steps = $this->config_steps;
		$steps = array(
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'landscape-gardening' ) . $this->theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro', // Callback for content
				'callback'		=> 'do_next_step', // Callback for JS
				'button_text'	=> __( 'Start Now', 'landscape-gardening' ),
				'can_skip'		=> false // Show a skip button?
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'landscape-gardening' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'landscape-gardening' ),
				'can_skip'		=> true
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'landscape-gardening' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo', 'landscape-gardening' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'landscape-gardening' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);

		// Iterate through each step and replace with dev config values
		if( $dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from config.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $dev_steps as $dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $dev_step['id'] ) ) {
					$id = $dev_step['id'];
					if( isset( $steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $dev_step[$element] ) ) {
								$steps[$id][$element] = $dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $steps;
	}

	/*** Display the content for the intro step ***/
	public function get_step_intro() { ?>
		<div class="summary">
			<p style="text-align: center;"><?php esc_html_e( 'Thank you for choosing our theme! We are excited to help you get started with your new website.', 'landscape-gardening' ); ?></p>
			<p style="text-align: center;"><?php esc_html_e( 'To ensure you make the most of our theme, we recommend following the setup steps outlined here. This process will help you configure the theme to best suit your needs and preferences. Click on the "Start Now" button to begin the setup.', 'landscape-gardening' ); ?></p>
		</div>
	<?php }
	
	

	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
		$plugins = $this->get_plugins();
		$content = array(); ?>
			<div class="summary">
				<p>
					<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','landscape-gardening') ?>
				</p>
			</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<span>';
			$keys = array();
			if ( isset( $plugins['install'][ $slug ] ) ) {
			    $keys[] = 'Installation';
			}
			if ( isset( $plugins['update'][ $slug ] ) ) {
			    $keys[] = 'Update';
			}
			if ( isset( $plugins['activate'][ $slug ] ) ) {
			    $keys[] = 'Activation';
			}
			$content['detail'] .= implode( ' and ', $keys ) . ' required';
			$content['detail'] .= '</span></li>';
		}
		$content['detail'] .= '</ul>';

		return $content;
	}

	/*** Display the content for the widgets step ***/
	public function get_step_widgets() { ?>
		<div class="summary">
			<p><?php esc_html_e('To get started, use the button below to import demo content and add widgets to your site. After installation, you can manage settings and customize your site using the Customizer. Enjoy your new theme!', 'landscape-gardening'); ?></p>
		</div>
	<?php }

	/***        Print the content for the final step        ***/

	public function get_step_done() { ?>
		<div id="aster-demo-setup-guid">
			<div class="aster-setup-menu">
				<h3><?php esc_html_e('Setup Navigation Menu','landscape-gardening'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Menu','landscape-gardening'); ?></p>
				<h4><?php esc_html_e('A) Create Pages','landscape-gardening'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Pages >> Add New','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Enter Page Details And Save Changes','landscape-gardening'); ?></li>
				</ol>
				<h4><?php esc_html_e('B) Add Pages To Menu','landscape-gardening'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Menu','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Click On The Create Menu Option','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Select The Pages And Click On The Add to Menu Button','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Select Primary Menu From The Menu Setting','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Click On The Save Menu Button','landscape-gardening'); ?></li>
				</ol>
			</div>
			<div class="aster-setup-widget">
				<h3><?php esc_html_e('Setup Footer Widgets','landscape-gardening'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Footer Widgets','landscape-gardening'); ?></p>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Widgets','landscape-gardening'); ?></li>
					<li><?php esc_html_e('Drag And Add The Widgets In The Footer Columns','landscape-gardening'); ?></li>
				</ol>
			</div>
			<div style="display:flex; flex-wrap: wrap; justify-content: center; margin-top: 20px; gap:20px">
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url(home_url()); ?>" class="button button-primary">Visit Site</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary">Customize Your Demo</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('themes.php?page=landscape-gardening-getting-started') ); ?>" class="button button-primary">Getting Started</a>
				</div>
			</div>
		</div>
	<?php }

	/***       Get the plugins registered with TGMPA       ***/
	public function get_plugins() {
		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}


	public function setup_plugins() {
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();

		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','landscape-gardening' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','landscape-gardening' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','landscape-gardening' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','landscape-gardening' ) ) );
		}
		exit;
	}

	/***------------------------------------------------- Imports the Demo Content* @since 1.1.0 ----------------------------------------------****/


	//                      ------------- MENUS -----------------                    //

	public function landscape_gardening_customizer_primary_menu(){
		// ------- Create Primary Menu --------
		$landscape_gardening_themename = 'Landscape Gardening'; // Ensure the theme name is set
		$landscape_gardening_menuname = $landscape_gardening_themename . ' Primary Menu';
		$landscape_gardening_bpmenulocation = 'primary';
		$landscape_gardening_menu_exists = wp_get_nav_menu_object($landscape_gardening_menuname);
	
		if( !$landscape_gardening_menu_exists ) {
			$landscape_gardening_menu_id = wp_create_nav_menu($landscape_gardening_menuname);
			
			// Home
			wp_update_nav_menu_item($landscape_gardening_menu_id, 0, array(
				'menu-item-title' => __('Home', 'landscape-gardening'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$page_about = get_page_by_path('about');
			if($page_about){
				wp_update_nav_menu_item($landscape_gardening_menu_id, 0, array(
					'menu-item-title' => __('About', 'landscape-gardening'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($page_about),
					'menu-item-status' => 'publish'
				));
			}
	
			// Service
			$page_service = get_page_by_path('service'); // Preferred over get_page_by_title()
			if($page_service){
				wp_update_nav_menu_item($landscape_gardening_menu_id, 0, array(
					'menu-item-title' => __('Service', 'landscape-gardening'),
					'menu-item-classes' => 'service',
					'menu-item-url' => get_permalink($page_service),
					'menu-item-status' => 'publish'
				));
			}
	
			// Blogs
			$page_blog = get_page_by_path('blog');
			if($page_blog){
				wp_update_nav_menu_item($landscape_gardening_menu_id, 0, array(
					'menu-item-title' => __('Blogs', 'landscape-gardening'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// Contact
			$page_contact = get_page_by_path('contact');
			if($page_contact){
				wp_update_nav_menu_item($landscape_gardening_menu_id, 0, array(
					'menu-item-title' => __('Contact', 'landscape-gardening'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($page_contact),
					'menu-item-status' => 'publish'
				));
			}
	
			// Assign menu to location if not set
			if( !has_nav_menu($landscape_gardening_bpmenulocation) ){
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$landscape_gardening_bpmenulocation] = $landscape_gardening_menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}


	//                      ------------- /*** Imports demo content ***/ -----------------                    //

	public function setup_widgets() {

		// Create a front page and assign the template
		$landscape_gardening_home_title = 'Home';
		$landscape_gardening_home_check = get_page_by_path('home');
		if (!$landscape_gardening_home_check) {
			$landscape_gardening_home = array(
				'post_type'    => 'page',
				'post_title'   => $landscape_gardening_home_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'home' // Unique slug for the home page
			);
			$landscape_gardening_home_id = wp_insert_post($landscape_gardening_home);

			// Set the static front page
			if (!is_wp_error($landscape_gardening_home_id)) {
				update_option('page_on_front', $landscape_gardening_home_id);
				update_option('show_on_front', 'page');
			}
		}

		// Create a posts page and assign the template
		$landscape_gardening_blog_title = 'Blogs';
		$landscape_gardening_blog_check = get_page_by_path('blog');
		if (!$landscape_gardening_blog_check) {
			$landscape_gardening_blog = array(
				'post_type'    => 'page',
				'post_title'   => $landscape_gardening_blog_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'blog' // Unique slug for the blog page
			);
			$landscape_gardening_blog_id = wp_insert_post($landscape_gardening_blog);

			// Set the posts page
			if (!is_wp_error($landscape_gardening_blog_id)) {
				update_option('page_for_posts', $landscape_gardening_blog_id);
			}
		}

		// Create a about page and assign the template
		$landscape_gardening_about_title = 'About';
		$landscape_gardening_about_check = get_page_by_path('about');
		if (!$landscape_gardening_about_check) {
			$landscape_gardening_about = array(
				'post_type'    => 'page',
				'post_title'   => $landscape_gardening_about_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'about' // Unique slug for the about page
			);
			wp_insert_post($landscape_gardening_about);
		}

		// Create a Services page and assign the template
		$landscape_gardening_service_title = 'Service';
		$landscape_gardening_service_check = get_page_by_path('service');
		if (!$landscape_gardening_service_check) {
			$landscape_gardening_service = array(
				'post_type'    => 'page',
				'post_title'   => $landscape_gardening_service_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'service' // Unique slug for the Services page
			);
			wp_insert_post($landscape_gardening_service);
		}


		// Create a Contact page and assign the template
		$landscape_gardening_contact_title = 'Contact';
		$landscape_gardening_contact_check = get_page_by_path('contact');
		if (!$landscape_gardening_contact_check) {
			$landscape_gardening_contact = array(
				'post_type'    => 'page',
				'post_title'   => $landscape_gardening_contact_title,
				'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'contact' // Unique slug for the Contact page
			);
			wp_insert_post($landscape_gardening_contact);
		}
		
		/*----------------------------------------- Header Button --------------------------------------------------*/

			set_theme_mod( 'landscape_gardening_enable_header_search_section', true);

		// ------------------------------------------ Blogs for Sections --------------------------------------

			// Create categories if not already created
			$landscape_gardening_category_slider = wp_create_category('Slider');
			$landscape_gardening_category_services = wp_create_category('Services');

			// Array of categories to assign to each set of posts
			$landscape_gardening_categories = array($landscape_gardening_category_slider, $landscape_gardening_category_services);

			// Array of image URLs for the "Services" category
			$services_images = array(
				get_template_directory_uri() . '/resource/img/service1.png',
				get_template_directory_uri() . '/resource/img/service2.png',
				get_template_directory_uri() . '/resource/img/service3.png',
			);

			// Loop to create posts
			for ($i = 1; $i <= 6; $i++) { // 7 posts (3 for Slider, 4 for Blog)
				$titles = [
					'CULTIVATING FORESTS',
					'Lush Landscapes',
					'Scenic Greens',
					'Landscape Design',
					'Garden Installation',
					'Lawn Care & Maintenance',
				];
			
				$content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
			
				// Determine category index (first 3 posts for Slider, next 4 for Blog)
				$category_index = ($i <= 3) ? 0 : 1;
			
				// Assign post title
				$post_title = $titles[$i - 1];
			
				// Create post object
				$my_post = [
					'post_title'    => wp_strip_all_tags($post_title),
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'post',
					'post_category' => [$landscape_gardening_categories[$category_index]],
				];
			
				// Insert post
				$post_id = wp_insert_post($my_post);
			
				// Set image URLs
				if ($category_index === 0) { // Slider category (first 3 posts)
					$slider_images = [
						get_template_directory_uri() . '/resource/img/slider1.png',
						get_template_directory_uri() . '/resource/img/slider2.png',
						get_template_directory_uri() . '/resource/img/slider3.png',
					];
					$landscape_gardening_image_url = $slider_images[$i - 1]; // i = 1 to 3
				} else { // Services category (next 4 posts)
					$services_image_index = $i - 4; // i = 4 to 7 → index 0 to 3
					if (isset($services_images[$services_image_index])) {
						$landscape_gardening_image_url = $services_images[$services_image_index];
					} else {
						$landscape_gardening_image_url = get_template_directory_uri() . '/resource/img/default.png';
					}
				}				
			
				$landscape_gardening_image_name = basename($landscape_gardening_image_url);
				$landscape_gardening_upload_dir = wp_upload_dir();
				$landscape_gardening_image_data = file_get_contents($landscape_gardening_image_url);
				$landscape_gardening_unique_file_name = wp_unique_filename($landscape_gardening_upload_dir['path'], $landscape_gardening_image_name);
				$filename = basename($landscape_gardening_unique_file_name);
			
				if (wp_mkdir_p($landscape_gardening_upload_dir['path'])) {
					$file = $landscape_gardening_upload_dir['path'] . '/' . $filename;
				} else {
					$file = $landscape_gardening_upload_dir['basedir'] . '/' . $filename;
				}
			
				if (!function_exists('WP_Filesystem')) {
					require_once ABSPATH . 'wp-admin/includes/file.php';
				}
			
				WP_Filesystem();
				global $wp_filesystem;
			
				if (!$wp_filesystem->put_contents($file, $landscape_gardening_image_data, FS_CHMOD_FILE)) {
					wp_die('Error saving file!');
				}
			
				$wp_filetype = wp_check_filetype($filename, null);
				$attachment = [
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name($filename),
					'post_content'   => '',
					'post_status'    => 'inherit'
				];
			
				$landscape_gardening_attach_id = wp_insert_attachment($attachment, $file, $post_id);
			
				require_once ABSPATH . 'wp-admin/includes/image.php';
			
				$landscape_gardening_attach_data = wp_generate_attachment_metadata($landscape_gardening_attach_id, $file);
				wp_update_attachment_metadata($landscape_gardening_attach_id, $landscape_gardening_attach_data);
				set_post_thumbnail($post_id, $landscape_gardening_attach_id);
			}					
		
		// ---------------------------------------- Slider --------------------------------------------------- //

			for($i=1; $i<=3; $i++) {
				set_theme_mod('landscape_gardening_banner_button_label_'.$i,'Explore Now');
				set_theme_mod('landscape_gardening_banner_button_link_'.$i,'');
			}
			set_theme_mod('landscape_gardening_banner_heading', 'Nurturing Gardens');
			set_theme_mod('landscape_gardening_enable_banner_section',true);


		// ---------------------------------------- Services --------------------------------------------------- //

			$services_icons = array(
				'fas fa-seedling',      
				'fas fa-water',          
				'fas fa-tree',         
			);

			set_theme_mod('landscape_gardening_enable_service_section', true);
			set_theme_mod('landscape_gardening_trending_product_heading', 'Best services for all solution');

			// Save icons individually with numeric keys
			for ($i = 1; $i <= 3; $i++) {
				if (isset($services_icons[$i - 1])) {
					set_theme_mod('landscape_gardening_services_icon' . $i, $services_icons[$i - 1]);
				}
			}

		$this->landscape_gardening_customizer_primary_menu();
	}
}