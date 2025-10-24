<?php
/**
 * The main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package landscape_gardening
 */

get_header();

$landscape_gardening_column = get_theme_mod( 'landscape_gardening_archive_column_layout', 'column-1' );
?>
<main id="primary" class="site-main">

	<?php

	if ( have_posts() ) :
		?>

		<div class="landscape-gardening-archive-layout grid-layout <?php echo esc_attr( $landscape_gardening_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'landscape_gardening_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
if ( landscape_gardening_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();