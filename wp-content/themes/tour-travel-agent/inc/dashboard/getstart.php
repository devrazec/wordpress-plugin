<?php
//about theme info
add_action( 'admin_menu', 'tour_travel_agent_gettingstarted' );
function tour_travel_agent_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Demo Content', 'tour-travel-agent'), esc_html__('Theme Demo Content', 'tour-travel-agent'), 'edit_theme_options', 'tour_travel_agent_guide', 'tour_travel_agent_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function tour_travel_agent_admin_theme_style() {
   wp_enqueue_style('tour-travel-agent-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');

	// Admin notice code START
	wp_register_script('tour-travel-agent-notice', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('tour-travel-agent-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'tour_travel_agent_admin_theme_style');

//guidline for about theme
function tour_travel_agent_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'tour-travel-agent' );
?>

<div class="wrapper-info">  
	<div id="tc-header">
		<div class="tc-container main-header">
			<a class="tc-logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</a>
			<span class="tc-header-action">
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customize', 'tour-travel-agent'); ?></a>
			<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tour-travel-agent' ); ?></a>
			<a href="<?php echo esc_url( 'https://www.themescaliber.com/products/travel-agent-wordpress-theme'); ?>" target="_blank"> <?php esc_html_e( 'Get Premium', 'tour-travel-agent' ); ?></a>
			<a href="<?php echo esc_url( 'https://www.themescaliber.com/products/wordpress-theme-bundle' ); ?>" class="bundle_btn" target="_blank"> <?php esc_html_e( 'Bundle of 220+ Themes at $99', 'tour-travel-agent' ); ?></a>
			</span>
		</div>
	</div>
	<div class="tc-container tab-sec">
		<div class="tc-tabs">
			<ul>
				<li class="tablinks home active" onclick="tour_travel_agent_openCity(event, 'tc_demo')">
					<a href="#">
						<?php esc_html_e( 'Theme Demo Import', 'tour-travel-agent' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_travel_agent_openCity(event, 'tc_index')">
					<a href="#">
						<?php esc_html_e( 'Free Theme Information', 'tour-travel-agent' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_travel_agent_openCity(event, 'tc_pro')">
					<a href="#">
						<?php esc_html_e( 'Premium Theme Information', 'tour-travel-agent' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_travel_agent_openCity(event, 'tc_create')">
					<a href="#">
						<?php esc_html_e( 'Theme Support', 'tour-travel-agent' ); ?>
					</a>
				</li>
			</ul>
		</div><!-- END .tc-tabs -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div  id="tc_demo" class="tabcontent">
				<h2><?php esc_html_e( 'Welcome to Tour Travel Agent', 'tour-travel-agent' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
				<hr>
				<div class="demo">
					<h4><?php esc_html_e( 'Click the "Run Importer" button below to load demo content for Tour Travel Agent', 'tour-travel-agent' ); ?></h4>
					<?php /* Demo Import */ require get_parent_theme_file_path( '/inc/dashboard/demo-importer.php' );?>
				</div>
			</div><!-- END .tc-section -->
		</div>
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div  id="tc_index" class="tabcontent">
				<h2><?php esc_html_e( 'Welcome to Tour Travel Agent Theme', 'tour-travel-agent' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
				<hr>
				<div class="info-link">
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tour-travel-agent' ); ?></a>
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'tour-travel-agent'); ?></a>
					<a class="get-pro" href="<?php echo esc_url( TOUR_TRAVEL_AGENT_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'tour-travel-agent'); ?></a>
				</div>
				<div class="col-tc-6">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
				</div>
					<div class="col-tc-6">
					<P><?php esc_html_e( 'Tour Travel Agent is a modern and versatile WordPress theme tailored for travel agencies, tour operators, and companies offering visa, passport, and travel support services. Perfect for showcasing holiday packages, luxury tours, group adventures, eco tours, cultural trips, and destination management services, this theme features a clean, user-friendly design that’s easy for beginners to use and flexible enough for professionals. Built with lightweight, SEO-optimized code, it ensures faster load times and improved search rankings, while its fully responsive and retina-ready layout delivers a flawless experience across all devices. Engaging Call to Action (CTA) buttons, smooth CSS animations, and integrated social media icons enhance interactivity and help you connect with a wider audience. Powered by the Bootstrap framework, the theme includes customization options for layouts, colors, and typography, making it simple to align your site with your brand. Whether you’re offering vacation packages, cruise bookings, safari tours, or guided trips, Tour Travel Agent provides the perfect foundation for a professional, engaging, and high-converting travel website.', 'tour-travel-agent' ); ?></P>
				</div>
			</div>
		</div><!-- END .tc-section -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div id="tc_pro" class="tabcontent">
				<h3><?php esc_html_e( 'Tour Travel Agent Theme Information', 'tour-travel-agent' ); ?></h3>
				<hr>
				<div class="info-link-pro">
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'tour-travel-agent' ); ?></a>
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'tour-travel-agent' ); ?></a>
					<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'tour-travel-agent' ); ?></a>
				</div>
				<div class="pro-image">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
				</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Tour Travel Agent Pro Theme', 'tour-travel-agent' ); ?></h4>
				<P><?php esc_html_e( 'Travel is the most adventurous and interesting thing and if you are looking to create a travel-related website, it needs to look equally interesting and engaging. With this Travel Agent WordPress Theme, it is easily possible for you to get a wonderful website for your travel agency. You may also share your portfolio as a travel agent through your personalized website. With this theme, you get a stunning homepage that features a full-width slider for the display of beautiful travel destinations, hotels, and resorts from all over the world. Loaded with useful Call to Action Buttons (CTA), it will help you get better conversion rates. Travel Agent WordPress Theme gives you a completely customizable design that makes it possible for you to transform the entire default design into something that reflects your business and services. For that, easy customization options are provided and the best part is you don’t need to know the coding stuff. There is a space to show your achievements and with its Testimonial section, you can share the experience of your clients for a positive impression on the target audience. The Woocommerce compatibility of this theme is going to make it easy to sell travel tickets online. Handy shortcodes are also available with this Travel Agent WordPress Theme.', 'tour-travel-agent' ); ?></P>
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'tour-travel-agent' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'tour-travel-agent' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'tour-travel-agent' ); ?></li>
				</ul>				
			</div>	
		</div><!-- END .tc-section -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div id="tc_create" class="tabcontent">
				<div class="tab-cont">
					<h4><?php esc_html_e( 'Need Support?', 'tour-travel-agent' ); ?></h4>				
					<div class="info-link-support">
						<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'tour-travel-agent' ); ?></P>
						<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'tour-travel-agent' ); ?></a>
					</div>
				</div>
				<div class="tab-cont">	
					<h4><?php esc_html_e('Reviews', 'tour-travel-agent'); ?></h4>				
					<div class="info-link-support">
						<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'tour-travel-agent' ); ?></P>
						<a href="<?php echo esc_url( TOUR_TRAVEL_AGENT_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'tour-travel-agent'); ?></a>
					</div>
				</div>

				<div class="tc-section large-section">
					<h2>Let‘s customize your website</h2>
					<p>There are many changes you can make to customize your website. Explore customization options and make it unique.</p>
					<div class="tc-buttons">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="tc-btn primary large-button"><?php esc_html_e('Start Customizing', 'tour-travel-agent'); ?></a>
					</div><!-- END .tc-buttons -->
				</div>
			</div>
		</div><!-- END .tc-section -->
	</div>
</div>
<?php } ?>