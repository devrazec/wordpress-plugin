<?php
/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $expert_gardener_theme_name = '';
	protected $expert_gardener_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $expert_gardener_page_slug = '';
	protected $expert_gardener_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $expert_gardener_plugin_url = '';

	public $expert_gardener_plugin_path;
	public $parent_slug;
	
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
	
	/**
	 * Constructor
	 *
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
	
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';

		if( isset( $config['expert_gardener_page_slug'] ) ) {
			$this->expert_gardener_page_slug = esc_attr( $config['expert_gardener_page_slug'] );
		}
		if( isset( $config['expert_gardener_page_title'] ) ) {
			$this->expert_gardener_page_title = esc_attr( $config['expert_gardener_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$this->expert_gardener_plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->expert_gardener_plugin_path );
		$this->expert_gardener_plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$expert_gardener_current_theme = wp_get_theme();
		$this->expert_gardener_theme_title = $expert_gardener_current_theme->get( 'Name' );
		$this->expert_gardener_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $expert_gardener_current_theme->get( 'Name' ) ) );
		$this->expert_gardener_page_slug = apply_filters( $this->expert_gardener_theme_name . '_theme_setup_wizard_expert_gardener_page_slug', $this->expert_gardener_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->expert_gardener_theme_name . '_theme_setup_wizard_parent_slug', '' );

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
		wp_enqueue_style( 'expert-gardener-demo-import-style', get_template_directory_uri() . '/demo-import/assets/css/demo-import-style.css');
		wp_register_script( 'expert-gardener-demo-import-script', get_template_directory_uri() . '/demo-import/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'expert-gardener-demo-import-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'expert-gardener' )
			)
		);
		wp_enqueue_script( 'expert-gardener-demo-import-script' );
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
	 * @since 1.1.2
	 */
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
		$this->tgmpa_menu_slug = apply_filters( $this->expert_gardener_theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->expert_gardener_theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->expert_gardener_page_title ), esc_html( $this->expert_gardener_page_title ), 'manage_options', $this->expert_gardener_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 
		tgmpa_load_bulk_installer();

		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( esc_html__( 'Failed to find TGM', 'expert-gardener' ) );
		}

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$expert_gardener_theme = wp_get_theme();
		$expert_gardener_theme_title = $expert_gardener_theme->get( 'Name' );
		$expert_gardener_theme_version = $expert_gardener_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php 
			// Theme Title and Version
			printf( '<h1>%s %s</h1>', esc_html( $expert_gardener_theme_title ), esc_html( '(Version :- ' . $expert_gardener_theme_version . ')' ) );
			?>
			
			<div class="card whizzie-wrap">
				<div class="demo_content_image">
					<div class="demo_content">
						<?php

						$expert_gardener_steps = $this->get_steps();
						echo '<ul class="whizzie-menu">';
						foreach ( $expert_gardener_steps as $expert_gardener_step ) {
							$class = 'step step-' . esc_attr( $expert_gardener_step['id'] );
							echo '<li data-step="' . esc_attr( $expert_gardener_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
							printf( '<h2>%s</h2>', esc_html( $expert_gardener_step['title'] ) );

							$content = call_user_func( array( $this, $expert_gardener_step['view'] ) );
							if ( isset( $content['summary'] ) ) {
								printf(
									'<div class="summary">%s</div>',
									wp_kses_post( $content['summary'] )
								);
							}
							if ( isset( $content['detail'] ) ) {
								printf( '<p><a href="#" class="more-info">%s</a></p>', esc_html__( 'More Info', 'expert-gardener' ) );
								printf(
									'<div class="detail">%s</div>',
									wp_kses_post( $content['detail'] )
								);
							}
							if ( isset( $expert_gardener_step['button_text'] ) && $expert_gardener_step['button_text'] ) {
								printf( 
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $expert_gardener_step['callback'] ),
									esc_attr( $expert_gardener_step['id'] ),
									esc_html( $expert_gardener_step['button_text'] )
								);
							}
							if ( isset( $expert_gardener_step['can_skip'] ) && $expert_gardener_step['can_skip'] ) {
								printf( 
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( 'do_next_step' ),
									esc_attr( $expert_gardener_step['id'] ),
									esc_html__( 'Skip', 'expert-gardener' )
								);
							}
							echo '</li>';
						}
						echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							foreach ( $expert_gardener_steps as $expert_gardener_step ) {
								if ( isset( $expert_gardener_step['icon'] ) && $expert_gardener_step['icon'] ) {
									echo '<li class="nav-step-' . esc_attr( $expert_gardener_step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $expert_gardener_step['icon'] ) . '"></span></li>';
								}
							}
							?>
						</ul>

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->

					<div class="demo_image">
						<div class="demo_image buttons">
							<a href="<?php echo esc_url( EXPERT_GARDENER_PRO_THEME_URL ); ?>" class="button button-primary bundle" target="_blank"><?php echo esc_html__( 'Buy Now', 'expert-gardener' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_GARDENER_THEME_BUNDLE_URL ); ?>" class="button button-primary bundle pro" target="_blank"><?php echo esc_html__( 'Buy All Themes', 'expert-gardener' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_GARDENER_FREE_DOCS_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'expert-gardener' ); ?></a>
							<a href="<?php echo esc_url( EXPERT_GARDENER_SUPPORT_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support', 'expert-gardener' ); ?></a>
						</div>
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $expert_gardener_theme_title ); ?>" />
					</div> <!-- .demo_image -->

				</div> <!-- .demo_content_image -->
			</div> <!-- .whizzie-wrap -->
		</div> <!-- .wrap -->
		<?php
	}


		
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$expert_gardener_dev_steps = $this->config_steps;
		$expert_gardener_steps = array( 
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'expert-gardener' ) . $this->expert_gardener_theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro',
				'callback'		=> 'do_next_step',
				'button_text'	=> __( 'Start Now', 'expert-gardener' ),
				'can_skip'		=> false
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'expert-gardener' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'expert-gardener' ),
				'can_skip'		=> true
			),
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Demo Importer', 'expert-gardener' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text'	=> __( 'Import Demo Content', 'expert-gardener' ),
				'can_skip'		=> true
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'expert-gardener' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $expert_gardener_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from demo-import-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $expert_gardener_dev_steps as $expert_gardener_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $expert_gardener_dev_step['id'] ) ) {
					$id = $expert_gardener_dev_step['id'];
					if( isset( $expert_gardener_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $expert_gardener_dev_step[$element] ) ) {
								$expert_gardener_steps[$id][$element] = $expert_gardener_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $expert_gardener_steps;
	}
	
	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<div class="steps_content">
				<p>
					<?php printf(
						/* translators: %s: Theme name. */
						esc_html__('Thank you for choosing the %s theme. You will only need a few minutes to configure and launch your new website with the help of this quick setup tutorial. To begin using your website, simply follow the wizard\'s instructions.', 'expert-gardener'),
						esc_html($this->expert_gardener_theme_title)
					); ?>
				</p>
			</div>
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
				<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','expert-gardener') ?>
			</p>
		</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {

			if ( $slug != 'yith-woocommerce-wishlist' && $slug != 'woocommerce-currency-switcher' ) {
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
		}
		$content['detail'] .= '</ul>';
		
		return $content;
	}
	
	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
	<div class="summary">
		<p>
			<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them.','expert-gardener'); ?>
		</p>
	</div>
	<?php }
	
	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="expert-gardener-demo-setup-guid">
			<div class="customize_div"><?php echo esc_html( 'Now Customize your website' ); ?>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize_link">
					<?php echo esc_html( 'Customize ' ); ?> 
					<span class="dashicons dashicons-share-alt2"></span>
				</a>
			</div>
			<div class="expert-gardener-setup-finish">
				<a target="_blank" href="<?php echo esc_url( admin_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Go To Dashboard', 'expert-gardener' ); ?>
				</a>
				<a target="_blank" href="<?php echo esc_url( get_home_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Preview Site', 'expert-gardener' ); ?>
				</a>
			</div>
		</div>
	<?php }


	/**
	 * Get the plugins registered with TGMPA
	 */
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

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}
	
	public function setup_plugins() {
		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','expert-gardener' ) ) );
		}
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
					'message'       => esc_html__( 'Activating Plugin','expert-gardener' ),
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
					'message'       => esc_html__( 'Updating Plugin','expert-gardener' ),
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
					'message'       => esc_html__( 'Installing Plugin','expert-gardener' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','expert-gardener' ) ) );
		}
		exit;
	}

	public function expert_gardener_customizer_right_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_gardener_themename = 'Expert Gardener';
		$expert_gardener_menuname = $expert_gardener_themename . ' Primary Right';
		$expert_gardener_menu_right_location = 'primary-left';
		$expert_gardener_menu_exists = wp_get_nav_menu_object($expert_gardener_menuname);

		if (!$expert_gardener_menu_exists) {
			$expert_gardener_menu_id = wp_create_nav_menu($expert_gardener_menuname);

			// Home
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' => __('Home', 'expert-gardener'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$expert_gardener_page_about = get_page_by_path('about');
			if($expert_gardener_page_about){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('About', 'expert-gardener'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($expert_gardener_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$expert_gardener_page_services = get_page_by_path('services');
			if($expert_gardener_page_services){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Services', 'expert-gardener'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($expert_gardener_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$expert_gardener_page_blog = get_page_by_path('blog');
			if($expert_gardener_page_blog){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'expert-gardener'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($expert_gardener_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_gardener_menu_right_location)) {
				$expert_gardener_locations = get_theme_mod('nav_menu_locations');
				$expert_gardener_locations[$expert_gardener_menu_right_location] = $expert_gardener_menu_id;
				set_theme_mod('nav_menu_locations', $expert_gardener_locations);
			}
		}
	}

	public function expert_gardener_customizer_left_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_gardener_themename = 'Expert Gardener';
		$expert_gardener_menuname = $expert_gardener_themename . ' Primary Menu';
		$expert_gardener_menulocation = 'primary-right';
		$expert_gardener_menu_exists = wp_get_nav_menu_object($expert_gardener_menuname);

		if (!$expert_gardener_menu_exists) {
			$expert_gardener_menu_id = wp_create_nav_menu($expert_gardener_menuname);

			// Team
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' =>  __('Team','expert-gardener'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Classes
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' =>  __('Classes','expert-gardener'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// 404 Page
			$expert_gardener_notfound = get_page_by_path('404 Page');
			if($expert_gardener_notfound){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'expert-gardener'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($expert_gardener_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Contact Us
			$expert_gardener_page_contact = get_page_by_path('contact');
			if($expert_gardener_page_contact){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'expert-gardener'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($expert_gardener_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_gardener_menulocation)) {
				$expert_gardener_locations = get_theme_mod('nav_menu_locations');
				$expert_gardener_locations[$expert_gardener_menulocation] = $expert_gardener_menu_id;
				set_theme_mod('nav_menu_locations', $expert_gardener_locations);
			}
		}
	}

	public function expert_gardener_customizer_nav_menu() {

		// ---------------- Create Primary Menu ---------------- //

		$expert_gardener_themename = 'Expert Gardener';
		$expert_gardener_menuname = $expert_gardener_themename . ' Respnsive Menu';
		$expert_gardener_menulocation_respnsive = 'responsive-menu';
		$expert_gardener_menu_exists = wp_get_nav_menu_object($expert_gardener_menuname);

		if (!$expert_gardener_menu_exists) {
			$expert_gardener_menu_id = wp_create_nav_menu($expert_gardener_menuname);

			// Home
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' => __('Home', 'expert-gardener'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$expert_gardener_page_about = get_page_by_path('about');
			if($expert_gardener_page_about){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('About', 'expert-gardener'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($expert_gardener_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$expert_gardener_page_services = get_page_by_path('services');
			if($expert_gardener_page_services){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Services', 'expert-gardener'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($expert_gardener_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$expert_gardener_page_blog = get_page_by_path('blog');
			if($expert_gardener_page_blog){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'expert-gardener'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($expert_gardener_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// 404 Page
			$expert_gardener_notfound = get_page_by_path('404 Page');
			if($expert_gardener_notfound){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('404 Page', 'expert-gardener'),
					'menu-item-classes' => '404',
					'menu-item-url' => get_permalink($expert_gardener_notfound),
					'menu-item-status' => 'publish'
				));
			}

			// Team
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' =>  __('Team','expert-gardener'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Classes
			wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
				'menu-item-title' =>  __('Classes','expert-gardener'),
				'menu-item-classes' => '',
				'menu-item-url' => '#',
				'menu-item-status' => 'publish'));

			// Contact Us
			$expert_gardener_page_contact = get_page_by_path('contact');
			if($expert_gardener_page_contact){
				wp_update_nav_menu_item($expert_gardener_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'expert-gardener'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($expert_gardener_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			if (!has_nav_menu($expert_gardener_menulocation_respnsive)) {
				$expert_gardener_locations = get_theme_mod('nav_menu_locations');
				$expert_gardener_locations[$expert_gardener_menulocation_respnsive] = $expert_gardener_menu_id;
				set_theme_mod('nav_menu_locations', $expert_gardener_locations);
			}
		}
	}

	
	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

		//................................................. MENUS .................................................//
		
			// Creation of home page //
			$expert_gardener_home_content = '';
			$expert_gardener_home_title = 'Home';
			$expert_gardener_home = array(
					'post_type' => 'page',
					'post_title' => $expert_gardener_home_title,
					'post_content'  => $expert_gardener_home_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_slug' => 'home'
			);
			$expert_gardener_home_id = wp_insert_post($expert_gardener_home);

			add_post_meta( $expert_gardener_home_id, '_wp_page_template', 'templates/template-frontpage.php' );

			$expert_gardener_home = get_page_by_path( 'Home' );
			update_option( 'page_on_front', $expert_gardener_home->ID );
			update_option( 'show_on_front', 'page' );

			// Creation of blog page //
			$expert_gardener_blog_title = 'Blog';
			$expert_gardener_blog_check = get_page_by_path('blog');
			if (!$expert_gardener_blog_check) {
				$expert_gardener_blog = array(
					'post_type'    => 'page',
					'post_title'   => $expert_gardener_blog_title,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'blog'
				);
				$expert_gardener_blog_id = wp_insert_post($expert_gardener_blog);

				if (!is_wp_error($expert_gardener_blog_id)) {
					update_option('page_for_posts', $expert_gardener_blog_id);
				}
			}

			// Creation of contact us page //
			$expert_gardener_contact_title = 'Contact Us';
			$expert_gardener_contact_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_gardener_contact_check = get_page_by_path('contact');
			if (!$expert_gardener_contact_check) {
				$expert_gardener_contact = array(
					'post_type'    => 'page',
					'post_title'   => $expert_gardener_contact_title,
					'post_content'   => $expert_gardener_contact_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'contact' // Unique slug for the Contact Us page
				);
				wp_insert_post($expert_gardener_contact);
			}

			// Creation of about page //
			$expert_gardener_about_title = 'About';
			$expert_gardener_about_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_gardener_about_check = get_page_by_path('about');
			if (!$expert_gardener_about_check) {
				$expert_gardener_about = array(
					'post_type'    => 'page',
					'post_title'   => $expert_gardener_about_title,
					'post_content'   => $expert_gardener_about_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'about' // Unique slug for the About page
				);
				wp_insert_post($expert_gardener_about);
			}

			// Creation of services page //
			$expert_gardener_services_title = 'Services';
			$expert_gardener_services_content = 'What is Lorem Ipsum?
														Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
														&nbsp;
														Why do we use it?
														It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
														&nbsp;
														Where does it come from?
														There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
			$expert_gardener_services_check = get_page_by_path('services');
			if (!$expert_gardener_services_check) {
				$expert_gardener_services = array(
					'post_type'    => 'page',
					'post_title'   => $expert_gardener_services_title,
					'post_content'   => $expert_gardener_services_content,
					'post_status'  => 'publish',
					'post_author'  => 1,
					'post_name'    => 'services' // Unique slug for the Services page
				);
				wp_insert_post($expert_gardener_services);
			}

			// Creation of 404 page //
			$expert_gardener_notfound_title = '404 Page';
			$expert_gardener_notfound = array(
				'post_type'   => 'page',
				'post_title'  => $expert_gardener_notfound_title,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug'   => '404'
			);
			$expert_gardener_notfound_id = wp_insert_post($expert_gardener_notfound);
			add_post_meta($expert_gardener_notfound_id, '_wp_page_template', '404.php');


			$expert_gardener_slider_title = 'Where Nature Meets Art in Every Garden 01';
			$expert_gardener_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.';
			$expert_gardener_slider_check = get_page_by_path('slider-page');

			// Check if the page already exists, if not, create the page
			if (!$expert_gardener_slider_check) {
				// Insert the page
				$expert_gardener_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_gardener_slider_title,
					'post_content'  => $expert_gardener_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-page'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_gardener_slider);
				
				// Get the image URL (replace 'slider.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_gardener_slider_title = 'Where Nature Meets Art in Every Garden 02';
			$expert_gardener_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.';
			$expert_gardener_slider_check = get_page_by_path('slider-pages');

			// Check if the page already exists, if not, create the page
			if (!$expert_gardener_slider_check) {
				// Insert the page
				$expert_gardener_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_gardener_slider_title,
					'post_content'  => $expert_gardener_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pages'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_gardener_slider);
				
				// Get the image URL (replace 'slider2.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/slider2.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('slider2.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			$expert_gardener_slider_title = 'Where Nature Meets Art in Every Garden 03';
			$expert_gardener_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.';
			$expert_gardener_slider_check = get_page_by_path('slider-pagess');

			// Check if the page already exists, if not, create the page
			if (!$expert_gardener_slider_check) {
				// Insert the page
				$expert_gardener_slider = array(
					'post_type'   => 'page',
					'post_title'  => $expert_gardener_slider_title,
					'post_content'  => $expert_gardener_slider_content,
					'post_status' => 'publish',
					'post_author' => 1,
					'post_name'   => 'slider-pagess'
				);
				
				// Insert the post (page)
				$page_id = wp_insert_post($expert_gardener_slider);
				
				// Get the image URL (replace 'custom-header.png' with the actual path to the image)
				$image_path = get_template_directory() . '/assets/images/custom-header.png';  // Path to your image in theme folder
				
				// If the image exists, upload it to the media library and set it as the featured image
				if (file_exists($image_path)) {
					// Upload the image
					$upload = wp_upload_bits('custom-header.png', null, file_get_contents($image_path));
					
					// Check if the upload was successful
					if (!$upload['error']) {
						// Create an attachment post
						$attachment = array(
							'guid' => $upload['url'], 
							'post_mime_type' => 'image/png',
							'post_title' => basename($image_path),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						
						// Insert the attachment into the media library
						$attachment_id = wp_insert_attachment($attachment, $upload['file'], $page_id);
						
						// Generate the metadata for the attachment
						$attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
						wp_update_attachment_metadata($attachment_id, $attachment_data);
						
						// Set the image as the featured image for the page
						set_post_thumbnail($page_id, $attachment_id);
					}
				}
			}

			
		/* -------------- Products ------------------*/

		$expert_gardener_product_category= array(
			'Electronics' => array(
						'Product Title Here 1',
						'Product Title Here 2',
						'Product Title Here 3',
						'Product Title Here 4',
						'Product Title Here 5',
						'Product Title Here 6',
						'Product Title Here 7',
						'Product Title Here 8',
			),
		);
		$k = 1;
		foreach ( $expert_gardener_product_category as $expert_gardener_product_cats => $expert_gardener_products_name ) {

			// Insert porduct cats Start
			$content = 'Lorem ipsum dolor sit amet';
			$parent_category	=	wp_insert_term(
			$expert_gardener_product_cats, // the term
			'product_cat', // the taxonomy
			array(
				'description'=> $content,
				'slug' => 'product_cat'.$k
			));

			$image_url = get_template_directory_uri().'/assets/images/slider'.$k.'.png';

			$expert_gardener_image_name= 'img'.$k.'.png';
			$upload_dir       = wp_upload_dir();
			// Set upload folder
			$expert_gardener_image_data= file_get_contents($image_url);
			// Get image data
			$unique_file_name = wp_unique_filename( $upload_dir['path'], $expert_gardener_image_name );
			// Generate unique name
			$filename= basename( $unique_file_name );
			// Create image file name

			// Check folder permission and define file location
			if( wp_mkdir_p( $upload_dir['path'] ) ) {
			$file = $upload_dir['path'] . '/' . $filename;
			} else {
			$file = $upload_dir['basedir'] . '/' . $filename;
			}

			// Create the image  file on the server
			if ( ! function_exists( 'WP_Filesystem' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/file.php' );
			}
			
			WP_Filesystem();
			global $wp_filesystem;
			
			if ( ! $wp_filesystem->put_contents( $file, $expert_gardener_image_data, FS_CHMOD_FILE ) ) {
				wp_die( 'Error saving file!' );
			}
			
			// Check image file type
			$wp_filetype = wp_check_filetype( $filename, null );

			// Set attachment data
			$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title'     => sanitize_file_name( $filename ),
			'post_content'   => '',
			'post_type'     => 'product',
			'post_status'    => 'inherit'
			);

			// Create the attachment
			$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

			// Include image.php
			require_once(ABSPATH . 'wp-admin/includes/image.php');

			// Define attachment metadata
			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

			// Assign metadata to attachment
			wp_update_attachment_metadata( $attach_id, $attach_data );

			update_woocommerce_term_meta( $parent_category['term_id'], 'thumbnail_id', $attach_id );

			// create Product START
			foreach ( $expert_gardener_products_name as $key => $expert_gardener_product_title ) {

				$content = 'Te obtinuit ut adepto satis somno.';
				// Create post object
				$my_post = array(
					'post_title'    => wp_strip_all_tags( $expert_gardener_product_title ),
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'product',
				);

				// Insert the post into the database
				$post_id    = wp_insert_post($my_post);

				wp_set_object_terms( $post_id, 'product_cat' . $k, 'product_cat', true );

				update_post_meta($post_id, '_regular_price', '52.00'); // Set regular price	
				update_post_meta($post_id, '_sale_price', '32.00'); // Set sale price
				update_post_meta($post_id, '_price', '32.00'); // Set current price (sale price is applied)

				// Now replace meta w/ new updated value array
				$image_url = get_template_directory_uri().'/assets/images/'.str_replace( " ", "-", $expert_gardener_product_title).'.png';

				echo $image_url . "<br>";

				$expert_gardener_image_name       = $expert_gardener_product_title.'.png';
				$upload_dir = wp_upload_dir();
				// Set upload folder
				$expert_gardener_image_data = file_get_contents(esc_url($image_url));

				// Get image data
				$unique_file_name = wp_unique_filename($upload_dir['path'], $expert_gardener_image_name);
				// Generate unique name
				$filename = basename($unique_file_name);
				// Create image file name

				// Check folder permission and define file location
				if (wp_mkdir_p($upload_dir['path'])) {
					$file = $upload_dir['path'].'/'.$filename;
				} else {
					$file = $upload_dir['basedir'].'/'.$filename;
				}

				// Create the image  file on the server
				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				
				WP_Filesystem();
				global $wp_filesystem;
				
				if ( ! $wp_filesystem->put_contents( $file, $expert_gardener_image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}

				// Check image file type
				$wp_filetype = wp_check_filetype($filename, null);

				// Set attachment data
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name($filename),
					'post_type'      => 'product',
					'post_status'    => 'inherit',
				);

				// Create the attachment
				$attach_id = wp_insert_attachment($attachment, $file, $post_id);

				// Include image.php
				require_once (ABSPATH.'wp-admin/includes/image.php');

				// Define attachment metadata
				$attach_data = wp_generate_attachment_metadata($attach_id, $file);

				// Assign metadata to attachment
				wp_update_attachment_metadata($attach_id, $attach_data);

				// And finally assign featured image to post
				set_post_thumbnail($post_id, $attach_id);
			}
			// Create product END
			++$k;
		}


		/* -------------- Slider ------------------*/
	
			set_theme_mod('expert_gardener_slider_short_heading', 'Welcome to Garden Landscaping');
			set_theme_mod('expert_gardener_slider_setting', true);


		/* -------------- Products ------------------*/

			set_theme_mod('expert_gardener_our_products_heading_section', 'Best For Garden Care');

			$expert_gardener_slider_pages = array('slider-page', 'slider-pages', 'slider-pagess');

			for ($i = 0; $i < count($expert_gardener_slider_pages); $i++) {
				$page = get_page_by_path($expert_gardener_slider_pages[$i]);

				if ($page) {
					set_theme_mod('expert_gardener_slider_page' . ($i + 1), $page->ID);
				} else {
					set_theme_mod('expert_gardener_slider_page' . ($i + 1), 0);
				}
			}

        
		$this->expert_gardener_customizer_left_menu();
        $this->expert_gardener_customizer_right_menu();
        $this->expert_gardener_customizer_nav_menu();

	    exit;
	}
}