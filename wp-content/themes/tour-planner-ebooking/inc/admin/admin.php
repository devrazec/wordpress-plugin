<?php
//about theme info
add_action( 'admin_menu', 'tour_planner_ebooking_gettingstarted' );
function tour_planner_ebooking_gettingstarted() {    	
	add_theme_page( esc_html__('Theme Demo Content', 'tour-planner-ebooking'), esc_html__('Theme Demo Content', 'tour-planner-ebooking'), 'edit_theme_options', 'tour_planner_ebooking_guide', 'tour_planner_ebooking_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function tour_planner_ebooking_admin_theme_style() {
   wp_enqueue_style('tour-planner-ebooking-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/admin/admin.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/admin/js/tab.js');

   // Admin notice code START
	wp_register_script('tour-planner-ebooking-notice', esc_url(get_template_directory_uri()) . '/inc/admin/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('tour-planner-ebooking-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'tour_planner_ebooking_admin_theme_style');

//guidline for about theme
function tour_planner_ebooking_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'tour-planner-ebooking' );
?>

<div class="wrapper-info">  
	<div id="tc-header">
		<div class="tc-container  main-header">
			<a class="tc-logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
			</a>
			<span class="tc-header-action">
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customize', 'tour-planner-ebooking'); ?></a>
			<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_FREE_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tour-planner-ebooking' ); ?></a>
			<a href="<?php echo esc_url( 'https://www.themescaliber.com/products/tour-booking-wordpress-theme'); ?>" target="_blank"> <?php esc_html_e( 'Get Premium', 'tour-planner-ebooking' ); ?></a>
			<a href="<?php echo esc_url( 'https://www.themescaliber.com/products/wordpress-theme-bundle' ); ?>" class="bundle_btn" target="_blank"> <?php esc_html_e( 'Bundle of 220+ Themes at $99', 'tour-planner-ebooking' ); ?></a>
			</span>
		</div>
	</div>
	<div class="tc-container tab-sec">
		<div class="tc-tabs">
			<ul>
				<li class="tablinks home active" onclick="tour_planner_ebooking_openCity(event, 'tc_demo')">
					<a href="#">
						<?php esc_html_e( 'Theme Demo Import', 'tour-planner-ebooking' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_planner_ebooking_openCity(event, 'tc_index')">
					<a href="#">
						<?php esc_html_e( 'Free Theme Information', 'tour-planner-ebooking' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_planner_ebooking_openCity(event, 'tc_pro')">
					<a href="#">
						<?php esc_html_e( 'Premium Theme Information', 'tour-planner-ebooking' ); ?>
					</a>
				</li>
				<li class="tablinks" onclick="tour_planner_ebooking_openCity(event, 'tc_create')">
					<a href="#">
						<?php esc_html_e( 'Theme Support', 'tour-planner-ebooking' ); ?>
					</a>
				</li>
			</ul>
		</div><!-- END .tc-tabs -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div  id="tc_demo" class="tabcontent">
				<h2><?php esc_html_e( 'Welcome to Tour Planner EBooking', 'tour-planner-ebooking' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
				<hr>
				<div class="demo">
					<h4><?php esc_html_e( 'Click the "Run Importer" button below to load demo content for Tour Planner EBooking', 'tour-planner-ebooking' ); ?></h4>
					<?php /* Demo Import */ require get_parent_theme_file_path( '/inc/admin/demo-import.php' );?>
				</div>
			</div><!-- END .tc-section -->
		</div>
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div  id="tc_index" class="tabcontent">
				<h2><?php esc_html_e( 'Welcome to Tour Planner EBooking Theme', 'tour-planner-ebooking' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
				<hr>
				<div class="info-link">
					<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_FREE_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'tour-planner-ebooking' ); ?></a>
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'tour-planner-ebooking'); ?></a>
					<a class="get-pro" href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'tour-planner-ebooking'); ?></a>
				</div>
				<div class="col-tc-6">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.png" alt="" />
				</div>
				<div class="col-tc-6">
				<P><?php esc_html_e( 'Tour Planner eBooking is a modern, dynamic, and user-friendly theme designed for travel agencies, tour operators, and vacation planners who want to streamline online bookings. Perfect for showcasing travel packages, guided tours, adventure trips, honeymoon packages, city excursions, eco-tourism experiences, group travel, and customized itineraries, this theme offers a visually engaging platform to attract travelers. Featuring a clean, responsive, and mobile-friendly design, it ensures seamless browsing across desktops, tablets, and smartphones. Key features include sections for tour galleries, package details, customer testimonials, itinerary highlights, interactive banners, and strategically placed Call to Action (CTA) buttons. With advanced personalization options for layouts, colors, and typography, you can create a website that reflects your travel brand identity. Fully compatible with WooCommerce for booking and payment management, Contact Form 7 for inquiries, and WP Travel plugin for tour management and reservations, Tour Planner eBooking is an SEO-optimized, agency-friendly, and complete solution for building a professional and efficient travel booking website.', 'tour-planner-ebooking' ); ?></P>
				</div>
			</div>
		</div><!-- END .tc-section -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div id="tc_pro" class="tabcontent">
				<h3><?php esc_html_e( 'Tour Planner EBooking Theme Information', 'tour-planner-ebooking' ); ?></h3>
				<hr>
				<div class="info-link-pro">
					<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'tour-planner-ebooking' ); ?></a>
					<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'tour-planner-ebooking' ); ?></a>
					<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'tour-planner-ebooking' ); ?></a>
				</div>
				<div class="pro-image">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/responsiveimg.jpg" alt="" />
				</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Tour Planner EBooking Pro Theme', 'tour-planner-ebooking' ); ?></h4>
				<P><?php esc_html_e( 'Our Travel Booking WordPress Theme, meticulously designed to elevate your travel business with a blend of functionality and style. This premium theme is perfect for travel agencies, tour operators, and travel bloggers looking to create a dynamic and user-friendly website. Our theme includes a suite of premium plugins integrated into the design, allowing you to extend your site’s functionality without additional costs. These plugins are selected to enhance your site’s performance and features, ensuring a seamless experience for both you and your visitors. The intuitive package booking feature streamlines the booking process, enabling customers to browse various travel packages, select their desired options, and book directly through your site. This feature enhances the user experience and simplifies the process of securing travel arrangements. Travel Booking WordPress Theme is perfect for showcasing your tour offerings is effortless with our beautifully designed tour package sections. You can highlight key details, itineraries, and special features of each tour package, helping potential travelers find their ideal adventure and inspiring them to book with you.', 'tour-planner-ebooking' ); ?></P>	
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'tour-planner-ebooking' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title, and tagline customization', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Separate Newsletter Section', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slide', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Post type', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'tour-planner-ebooking' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'tour-planner-ebooking' ); ?></li>
				</ul>				
			</div>	
		</div><!-- END .tc-section -->
	</div>

	<div class="tc-container">
		<div class="tc-section">
			<div id="tc_create" class="tabcontent">
				<div class="tab-cont">
					<h4><?php esc_html_e( 'Need Support?', 'tour-planner-ebooking' ); ?></h4>				
					<div class="info-link-support">
						<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'tour-planner-ebooking' ); ?></P>
						<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'tour-planner-ebooking' ); ?></a>
					</div>
				</div>
				<div class="tab-cont">	
					<h4><?php esc_html_e('Reviews', 'tour-planner-ebooking'); ?></h4>				
					<div class="info-link-support">
						<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'tour-planner-ebooking' ); ?></P>
						<a href="<?php echo esc_url( TOUR_PLANNER_EBOOKING_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'tour-planner-ebooking'); ?></a>
					</div>
				</div>

				<div class="tc-section large-section">
					<h2>Let‘s customize your website</h2>
					<p>There are many changes you can make to customize your website. Explore customization options and make it unique.</p>
					<div class="tc-buttons">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="tc-btn primary large-button"><?php esc_html_e('Start Customizing', 'tour-planner-ebooking'); ?></a>
					</div><!-- END .tc-buttons -->
				</div>
			</div>
		</div><!-- END .tc-section -->
	</div>
</div>
<?php } ?>