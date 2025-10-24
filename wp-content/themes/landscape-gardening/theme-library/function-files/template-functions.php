<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package landscape_gardening
 */

function landscape_gardening_body_classes( $landscape_gardening_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$landscape_gardening_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$landscape_gardening_classes[] = 'no-sidebar';
	}

	$landscape_gardening_classes[] = landscape_gardening_sidebar_layout();

	return $landscape_gardening_classes;
}
add_filter( 'body_class', 'landscape_gardening_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function landscape_gardening_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'landscape_gardening_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function landscape_gardening_get_post_choices() {
	$landscape_gardening_choices = array( '' => esc_html__( '--Select--', 'landscape-gardening' ) );
	$landscape_gardening_args    = array( 'numberposts' => -1 );
	$landscape_gardening_posts   = get_posts( $landscape_gardening_args );

	foreach ( $landscape_gardening_posts as $landscape_gardening_post ) {
		$landscape_gardening_id             = $landscape_gardening_post->ID;
		$landscape_gardening_title          = $landscape_gardening_post->post_title;
		$landscape_gardening_choices[ $landscape_gardening_id ] = $landscape_gardening_title;
	}

	return $landscape_gardening_choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function landscape_gardening_get_page_choices() {
	$landscape_gardening_choices = array( '' => esc_html__( '--Select--', 'landscape-gardening' ) );
	$landscape_gardening_pages   = get_pages();

	foreach ( $landscape_gardening_pages as $landscape_gardening_page ) {
		$landscape_gardening_choices[ $landscape_gardening_page->ID ] = $landscape_gardening_page->post_title;
	}

	return $landscape_gardening_choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function landscape_gardening_get_post_cat_choices() {
	$landscape_gardening_choices = array( '' => esc_html__( '--Select--', 'landscape-gardening' ) );
	$landscape_gardening_cats    = get_categories();

	foreach ( $landscape_gardening_cats as $landscape_gardening_cat ) {
		$landscape_gardening_choices[ $landscape_gardening_cat->term_id ] = $landscape_gardening_cat->name;
	}

	return $landscape_gardening_choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function landscape_gardening_get_post_donation_form_choices() {
	$landscape_gardening_choices = array( '' => esc_html__( '--Select--', 'landscape-gardening' ) );
	$landscape_gardening_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $landscape_gardening_posts as $landscape_gardening_post ) {
		$landscape_gardening_choices[ $landscape_gardening_post->ID ] = $landscape_gardening_post->post_title;
	}
	return $landscape_gardening_choices;
}

if ( ! function_exists( 'landscape_gardening_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function landscape_gardening_excerpt_length( $landscape_gardening_length ) {
		if ( is_admin() ) {
			return $landscape_gardening_length;
		}

		return get_theme_mod( 'landscape_gardening_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'landscape_gardening_excerpt_length', 999 );

if ( ! function_exists( 'landscape_gardening_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function landscape_gardening_excerpt_more( $landscape_gardening_more ) {
		if ( is_admin() ) {
			return $landscape_gardening_more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'landscape_gardening_excerpt_more' );

if ( ! function_exists( 'landscape_gardening_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function landscape_gardening_sidebar_layout() {
		$landscape_gardening_sidebar_position      = get_theme_mod( 'landscape_gardening_sidebar_position', 'right-sidebar' );
		$landscape_gardening_sidebar_position_post = get_theme_mod( 'landscape_gardening_post_sidebar_position', 'right-sidebar' );
		$landscape_gardening_sidebar_position_page = get_theme_mod( 'landscape_gardening_page_sidebar_position', 'right-sidebar' );

		if ( is_home() ) {
			$landscape_gardening_sidebar_position = $landscape_gardening_sidebar_position_post;
		} elseif ( is_page() ) {
			$landscape_gardening_sidebar_position = $landscape_gardening_sidebar_position_page;
		}

		return $landscape_gardening_sidebar_position;
	}
}

if ( ! function_exists( 'landscape_gardening_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function landscape_gardening_is_sidebar_enabled() {
		$landscape_gardening_sidebar_position      = get_theme_mod( 'landscape_gardening_sidebar_position', 'right-sidebar' );
		$landscape_gardening_sidebar_position_post = get_theme_mod( 'landscape_gardening_post_sidebar_position', 'right-sidebar' );
		$landscape_gardening_sidebar_position_page = get_theme_mod( 'landscape_gardening_page_sidebar_position', 'right-sidebar' );

		$landscape_gardening_sidebar_enabled = true;
		if ( is_single() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $landscape_gardening_sidebar_position ) {
				$landscape_gardening_sidebar_enabled = false;
			}
		} elseif ( is_home() ) {
			if ( 'no-sidebar' === $landscape_gardening_sidebar_position || 'no-sidebar' === $landscape_gardening_sidebar_position_post ) {
				$landscape_gardening_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $landscape_gardening_sidebar_position || 'no-sidebar' === $landscape_gardening_sidebar_position_page ) {
				$landscape_gardening_sidebar_enabled = false;
			}
		}
		return $landscape_gardening_sidebar_enabled;
	}
}

if ( ! function_exists( 'landscape_gardening_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function landscape_gardening_get_homepage_sections() {
		$landscape_gardening_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'landscape-gardening' ),
			'services' => esc_html__( 'Services Section', 'landscape-gardening' ),
		);
		return $landscape_gardening_sections;
	}
}

/**
 * Renders customizer section link
 */
function landscape_gardening_section_link( $landscape_gardening_section_id ) {
	$landscape_gardening_section_name      = str_replace( 'landscape_gardening_', ' ', $landscape_gardening_section_id );
	$landscape_gardening_section_name      = str_replace( '_', ' ', $landscape_gardening_section_name );
	$landscape_gardening_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $landscape_gardening_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $landscape_gardening_starting_notation . $landscape_gardening_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function landscape_gardening_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'landscape_gardening_section_link_css' );

/**
 * Breadcrumb.
 */
function landscape_gardening_breadcrumb( $landscape_gardening_args = array() ) {
	if ( ! get_theme_mod( 'landscape_gardening_enable_breadcrumb', true ) ) {
		return;
	}

	$landscape_gardening_args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $landscape_gardening_args );
}
add_action( 'landscape_gardening_breadcrumb', 'landscape_gardening_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function landscape_gardening_breadcrumb_trail_print_styles() {
	$landscape_gardening_breadcrumb_separator = get_theme_mod( 'landscape_gardening_breadcrumb_separator', '/' );

	$landscape_gardening_style = '
		.trail-items li::after {
			content: "' . $landscape_gardening_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$landscape_gardening_style = apply_filters( 'landscape_gardening_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $landscape_gardening_style ) ) );

	if ( $landscape_gardening_style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $landscape_gardening_style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'landscape_gardening_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function landscape_gardening_render_posts_pagination() {
	$landscape_gardening_is_pagination_enabled = get_theme_mod( 'landscape_gardening_enable_pagination', true );
	if ( $landscape_gardening_is_pagination_enabled ) {
		$landscape_gardening_pagination_type = get_theme_mod( 'landscape_gardening_pagination_type', 'default' );
		if ( 'default' === $landscape_gardening_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'landscape_gardening_posts_pagination', 'landscape_gardening_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function landscape_gardening_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'landscape_gardening_post_navigation', 'landscape_gardening_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function landscape_gardening_output_footer_copyright_content() {
    $landscape_gardening_theme_data = wp_get_theme();
    $landscape_gardening_copyright_text = get_theme_mod('landscape_gardening_footer_copyright_text');

    if (!empty($landscape_gardening_copyright_text)) {
        $landscape_gardening_text = $landscape_gardening_copyright_text;
    } else {
		$landscape_gardening_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/landscape-gardening','landscape-gardening')) . '" target="_blank"> ' . esc_html($landscape_gardening_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'landscape-gardening') . '&nbsp;<a target="_blank" href="' . esc_url($landscape_gardening_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($landscape_gardening_theme_data->get('Author'))) . '</a>';
		/* translators: %s: WordPress.org URL */
        $landscape_gardening_default_text .= sprintf(esc_html__(' | Powered by %s', 'landscape-gardening'), '<a href="' . esc_url(__('https://wordpress.org/', 'landscape-gardening')) . '" target="_blank">WordPress</a>. ');

        $landscape_gardening_text = $landscape_gardening_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($landscape_gardening_text); ?></span>
    <?php
}
add_action('landscape_gardening_footer_copyright', 'landscape_gardening_output_footer_copyright_content');

/* Footer Social Icons */ 
function landscape_gardening_footer_social_links() {

    if ( get_theme_mod('landscape_gardening_enable_footer_icon_section', true) ) {

            ?>
			<div class="socialicons">
				<div class="asterthemes-wrapper">
					<?php if ( get_theme_mod('landscape_gardening_footer_facebook_link', 'https://www.facebook.com/') != '' ) { ?>
						<a target="_blank" href="<?php echo esc_url(get_theme_mod('landscape_gardening_footer_facebook_link', 'https://www.facebook.com/')); ?>">
							<i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_facebook_icon', 'fab fa-facebook-f')); ?>"></i>
							<span class="screen-reader-text"><?php esc_html_e('Facebook', 'landscape-gardening'); ?></span>
						</a>
					<?php } ?>
					<?php if ( get_theme_mod('landscape_gardening_footer_twitter_link', 'https://x.com/') != '' ) { ?>
						<a target="_blank" href="<?php echo esc_url(get_theme_mod('landscape_gardening_footer_twitter_link', 'https://x.com/')); ?>">
							<i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_twitter_icon', 'fab fa-twitter')); ?>"></i>
							<span class="screen-reader-text"><?php esc_html_e('Twitter', 'landscape-gardening'); ?></span>
						</a>
					<?php } ?>
					<?php if ( get_theme_mod('landscape_gardening_footer_instagram_link', 'https://www.instagram.com/') != '' ) { ?>
						<a target="_blank" href="<?php echo esc_url(get_theme_mod('landscape_gardening_footer_instagram_link', 'https://www.instagram.com/')); ?>">
							<i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_instagram_icon', 'fab fa-instagram')); ?>"></i>
							<span class="screen-reader-text"><?php esc_html_e('Instagram', 'landscape-gardening'); ?></span>
						</a>
					<?php } ?>
					<?php if ( get_theme_mod('landscape_gardening_footer_linkedin_link', 'https://in.linkedin.com/') != '' ) { ?>
						<a target="_blank" href="<?php echo esc_url(get_theme_mod('landscape_gardening_footer_linkedin_link', 'https://in.linkedin.com/')); ?>">
							<i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_linkedin_icon', 'fab fa-linkedin')); ?>"></i>
							<span class="screen-reader-text"><?php esc_html_e('Linkedin', 'landscape-gardening'); ?></span>
						</a>
					<?php } ?>
					<?php if ( get_theme_mod('landscape_gardening_footer_youtube_link', 'https://www.youtube.com/') != '' ) { ?>
						<a target="_blank" href="<?php echo esc_url(get_theme_mod('landscape_gardening_footer_youtube_link', 'https://www.youtube.com/')); ?>">
							<i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_youtube_icon', 'fab fa-youtube')); ?>"></i>
							<span class="screen-reader-text"><?php esc_html_e('Youtube', 'landscape-gardening'); ?></span>
						</a>
					<?php } ?>
				</div>
			</div>
            <?php
    }
}
add_action('wp_footer', 'landscape_gardening_footer_social_links');

if ( ! function_exists( 'landscape_gardening_footer_widget' ) ) :
	function landscape_gardening_footer_widget() {
		$landscape_gardening_footer_widget_column = get_theme_mod('landscape_gardening_footer_widget_column','4');

		$landscape_gardening_column_class = '';
		if ($landscape_gardening_footer_widget_column == '1') {
			$landscape_gardening_column_class = 'one-column';
		} elseif ($landscape_gardening_footer_widget_column == '2') {
			$landscape_gardening_column_class = 'two-columns';
		} elseif ($landscape_gardening_footer_widget_column == '3') {
			$landscape_gardening_column_class = 'three-columns';
		} else {
			$landscape_gardening_column_class = 'four-columns';
		}
	
		if($landscape_gardening_footer_widget_column !== ''): 
		?>
		<div class="dt_footer-widgets <?php echo esc_attr($landscape_gardening_column_class); ?>">
			<div class="footer-widgets-column">
				<?php
				$footer_widgets_active = false;

				// Loop to check if any footer widget is active
				for ($landscape_gardening_i = 1; $landscape_gardening_i <= $landscape_gardening_footer_widget_column; $landscape_gardening_i++) {
					if (is_active_sidebar('landscape-gardening-footer-widget-' . $landscape_gardening_i)) {
						$footer_widgets_active = true;
						break;
					}
				}

				if ($footer_widgets_active) {
					// Display active footer widgets
					for ($landscape_gardening_i = 1; $landscape_gardening_i <= $landscape_gardening_footer_widget_column; $landscape_gardening_i++) {
						if (is_active_sidebar('landscape-gardening-footer-widget-' . $landscape_gardening_i)) : ?>
							<div class="footer-one-column">
								<?php dynamic_sidebar('landscape-gardening-footer-widget-' . $landscape_gardening_i); ?>
							</div>
						<?php endif;
					}
				} else {
				?>
				<div class="footer-one-column default-widgets">
					<aside id="search-2" class="widget widget_search default_footer_search">
						<div class="widget-header">
							<h4 class="widget-title"><?php esc_html_e('Search Here', 'landscape-gardening'); ?></h4>
						</div>
						<?php get_search_form(); ?>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-posts-2" class="widget widget_recent_entries">
						<h2 class="widget-title"><?php esc_html_e('Recent Posts', 'landscape-gardening'); ?></h2>
						<ul>
							<?php
							$recent_posts = wp_get_recent_posts(array(
								'numberposts' => 5,
								'post_status' => 'publish',
							));
							foreach ($recent_posts as $post) {
								echo '<li><a href="' . esc_url(get_permalink($post['ID'])) . '">' . esc_html($post['post_title']) . '</a></li>';
							}
							wp_reset_query();
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="recent-comments-2" class="widget widget_recent_comments">
						<h2 class="widget-title"><?php esc_html_e('Recent Comments', 'landscape-gardening'); ?></h2>
						<ul>
							<?php
							$recent_comments = get_comments(array(
								'number' => 5,
								'status' => 'approve',
							));
							foreach ($recent_comments as $comment) {
								echo '<li><a href="' . esc_url(get_comment_link($comment)) . '">' .
									/* translators: %s: details. */
									sprintf(esc_html__('Comment on %s', 'landscape-gardening'), get_the_title($comment->comment_post_ID)) .
									'</a></li>';
							}
							?>
						</ul>
					</aside>
				</div>
				<div class="footer-one-column default-widgets">
					<aside id="calendar-2" class="widget widget_calendar">
						<h2 class="widget-title"><?php esc_html_e('Calendar', 'landscape-gardening'); ?></h2>
						<?php get_calendar(); ?>
					</aside>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php
		endif;
	}
	endif;
add_action( 'landscape_gardening_footer_widget', 'landscape_gardening_footer_widget' );


function landscape_gardening_footer_text_transform_css() {
    $landscape_gardening_footer_text_transform = get_theme_mod('footer_text_transform', 'none');
    ?>
    <style type="text/css">
        .site-footer h4,footer#colophon h2.wp-block-heading,footer#colophon .widgettitle,footer#colophon .widget-title {
            text-transform: <?php echo esc_html($landscape_gardening_footer_text_transform); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'landscape_gardening_footer_text_transform_css');

/**
 * GET START FUNCTION
 */

 function landscape_gardening_getpage_css($hook) {
	wp_enqueue_script( 'landscape-gardening-admin-script', get_template_directory_uri() . '/resource/js/landscape-gardening-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'landscape-gardening-admin-script', 'landscape_gardening_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'landscape-gardening-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'landscape_gardening_getpage_css' );


add_action('wp_ajax_landscape_gardening_dismissable_notice', 'landscape_gardening_dismissable_notice');
function landscape_gardening_switch_theme() {
    delete_user_meta(get_current_user_id(), 'landscape_gardening_dismissable_notice');
}
add_action('after_switch_theme', 'landscape_gardening_switch_theme');
function landscape_gardening_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'landscape_gardening_dismissable_notice', true);
    die();
}

function landscape_gardening_deprecated_hook_admin_notice() {
    global $landscape_gardening_pagenow;
    
    // Check if the current page is the one where you don't want the notice to appear
    if ( $landscape_gardening_pagenow === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'landscape-gardening-getting-started' ) {
        return;
    }

    $landscape_gardening_dismissed = get_user_meta( get_current_user_id(), 'landscape_gardening_dismissable_notice', true );
    if ( !$landscape_gardening_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
            <div class="at-admin-content" >
                <h2><?php esc_html_e('Welcome to Landscape Gardening', 'landscape-gardening'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your Landscape Gardening journey to the next level.', 'landscape-gardening'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'landscape-gardening'); ?><p>
                <div style="display: flex; justify-content: center; align-items:center; flex-wrap: wrap; gap: 5px">
                    <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=landscape-gardening-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'landscape-gardening' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/landscape-gardening/"><?php esc_html_e('View Demo', 'landscape-gardening') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/gardening-wordpress-theme"><?php esc_html_e('Buy Now', 'landscape-gardening') ?></a>
					<a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( admin_url( 'themes.php?page=landscapegardening-wizard' ) ); ?>"><?php esc_html_e('Demo Importer', 'landscape-gardening') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'landscape_gardening_deprecated_hook_admin_notice' );

//Admin Notice For Getstart
function landscape_gardening_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}