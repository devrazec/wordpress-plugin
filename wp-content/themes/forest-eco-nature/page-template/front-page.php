<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

get_header(); ?>

<main id="tp_content" role="main">
		<?php do_action( 'forest_eco_nature_before_slider' ); ?>

		<?php get_template_part( 'template-parts/home/slider' ); ?>
		<?php do_action( 'forest_eco_nature_after_slider' ); ?>

		<?php get_template_part( 'template-parts/home/service' ); ?>
		<?php do_action( 'forest_eco_nature_after_service' ); ?>
		<?php get_template_part( 'template-parts/home/home-content' ); ?>
		<?php do_action( 'forest_eco_nature_after_home_content' ); ?>
</main>

<?php get_footer();