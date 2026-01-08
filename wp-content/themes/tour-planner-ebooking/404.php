<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package tour-planner-ebooking
 */

get_header(); ?>

<main role="main" id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align">
			<h1><?php echo esc_html(get_theme_mod('tour_planner_ebooking_title_404_page',__('404 Not Found','tour-planner-ebooking')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','tour-planner-ebooking')));?></p>
			<?php if( get_theme_mod('tour_planner_ebooking_button_404_page','Back to Home Page') != ''){ ?>
				<div class="read-moresec my-4">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button px-3 py-2"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_button_404_page',__('Back to Home Page','tour-planner-ebooking')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_button_404_page',__('Back to Home Page','tour-planner-ebooking')));?></span></a>
	        	</div>
        	<?php } ?>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>