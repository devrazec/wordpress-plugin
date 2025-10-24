<?php
/**
 * Getting Started Page.
 *
 * @package landscape_gardening
 */


if( ! function_exists( 'landscape_gardening_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function landscape_gardening_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'landscape-gardening' ),
		__( 'Getting Started', 'landscape-gardening' ),
		'manage_options',
		'landscape-gardening-getting-started',
		'landscape_gardening_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'landscape_gardening_getting_started_menu' );

if( ! function_exists( 'landscape_gardening_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function landscape_gardening_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_landscape-gardening-getting-started' != $hook ) return;

    wp_enqueue_style( 'landscape-gardening-getting-started', get_template_directory_uri() . '/resource/css/getting-started.css', false, LANDSCAPE_GARDENING_THEME_VERSION );

    wp_enqueue_script( 'landscape-gardening-getting-started', get_template_directory_uri() . '/resource/js/getting-started.js', array( 'jquery' ), LANDSCAPE_GARDENING_THEME_VERSION, true );
}
endif;
add_action( 'admin_enqueue_scripts', 'landscape_gardening_getting_started_admin_scripts' );

if( ! function_exists( 'landscape_gardening_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function landscape_gardening_getting_started_page(){ 
	$landscape_gardening_theme = wp_get_theme();?>
	<div class="wrap getting-started">
		<div class="intro-wrap">
			<div class="intro cointaner">
				<div class="intro-content">
					<h3><?php echo esc_html( 'Welcome to', 'landscape-gardening' );?> <span class="theme-name"><?php echo esc_html( LANDSCAPE_GARDENING_THEME_NAME ); ?></span></h3>
					<p class="about-text">
						<?php
						// Remove last sentence of description.
						$landscape_gardening_description = explode( '. ', $landscape_gardening_theme->get( 'Description' ) );

						$landscape_gardening_description = implode( '. ', $landscape_gardening_description );

						echo esc_html( $landscape_gardening_description . '' );
					?></p>
					<div class="btns-getstart">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'Customize', 'landscape-gardening' ); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/landscape-gardening/reviews/#new-post' ); ?>" title="<?php esc_attr_e( 'Visit the Review', 'landscape-gardening' ); ?>" target="_blank">
							<?php esc_html_e( 'Review', 'landscape-gardening' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( 'https://wordpress.org/support/theme/landscape-gardening/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'landscape-gardening' ); ?>" target="_blank">
							<?php esc_html_e( 'Contact Support', 'landscape-gardening' ); ?>
						</a>
			        </div>
			        <div class="btns-wizard">
						<a class="wizard" href="<?php echo esc_url( admin_url( 'themes.php?page=landscapegardening-wizard' ) ); ?>"target="_blank" class="button button-primary"><?php esc_html_e( 'One Click Demo Setup', 'landscape-gardening' ); ?></a>
					</div>
				</div>

				<div class="intro-img">
					<h4 class="bundle-text"><?php esc_html_e( 'WP Theme Bundle', 'landscape-gardening' ); ?></h4>
					<br>
					<img src="<?php echo esc_url(get_template_directory_uri()) .'/resource/img/bundle.png'; ?>" />
					<p class="about-text"><?php esc_html_e('Get access to a collection of premium WordPress themes in one bundle. Enjoy effortless website building, full customization, and dedicated customer support for a smooth, professional web experience.', 'landscape-gardening'); ?></p>
					<a class="button button-primary" href="<?php echo esc_url( 'https://asterthemes.com/products/wp-theme-bundle' ); ?>" title="<?php esc_attr_e( 'Go Pro', 'landscape-gardening' ); ?>" target="_blank">
						<?php esc_html_e( 'Exclusive Theme Bundle - $79', 'landscape-gardening' ); ?>
					</a>
				</div>
				
			</div>
		</div>

		<div class="cointaner panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="help" href="javascript:void(0);">
                        <?php esc_html_e( 'Getting Started', 'landscape-gardening' ); ?>
                    </a>
                </li>
				<li>
                    <a id="free-pro-panel" href="javascript:void(0);">
                        <?php esc_html_e( 'Free Vs Pro', 'landscape-gardening' ); ?>
                    </a>
                </li>
			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/help-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/free-vs-pro-panel.php'; ?>
				<?php require get_template_directory() . '/theme-library/getting-started/tabs/link-panel.php'; ?>
			</div>
		</div>
	</div>
	<?php
}
endif;
