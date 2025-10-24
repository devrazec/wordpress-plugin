<?php
if ( ! get_theme_mod( 'landscape_gardening_enable_banner_section', false ) ) {
	return;
}

$landscape_gardening_slider_content_ids  = array();
$landscape_gardening_slider_content_type = get_theme_mod( 'landscape_gardening_banner_slider_content_type', 'post' );

for ( $landscape_gardening_i = 1; $landscape_gardening_i <= 3; $landscape_gardening_i++ ) {
	$landscape_gardening_slider_content_ids[] = get_theme_mod( 'landscape_gardening_banner_slider_content_' . $landscape_gardening_slider_content_type . '_' . $landscape_gardening_i );
}
// Get the category for the banner slider from theme mods or a default category
$landscape_gardening_banner_slider_category = get_theme_mod('landscape_gardening_banner_slider_category', 'slider');

// Modify query to fetch posts from a specific category
$landscape_gardening_banner_slider_args = array(
	'post_type'           => $landscape_gardening_slider_content_type,
	'post__in'            => array_filter( $landscape_gardening_slider_content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint(3),
	'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $landscape_gardening_slider_content_type && ! empty( $landscape_gardening_banner_slider_category ) ) {
	$landscape_gardening_banner_slider_args['category_name'] = $landscape_gardening_banner_slider_category;
}
$landscape_gardening_banner_slider_args = apply_filters( 'landscape_gardening_banner_section_args', $landscape_gardening_banner_slider_args );

landscape_gardening_render_banner_section( $landscape_gardening_banner_slider_args );

/**
 * Render Banner Section.
 */

function landscape_gardening_render_banner_section( $landscape_gardening_banner_slider_args ) {     ?>

	<section id="landscape_gardening_banner_section" class="banner-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			landscape_gardening_section_link( 'landscape_gardening_banner_section' );
		endif;
		?>
		<div class="banner-section-wrapper">
			<?php
			$landscape_gardening_query = new WP_Query( $landscape_gardening_banner_slider_args );
			if ( $landscape_gardening_query->have_posts() ) :
				?>
				<div class="asterthemes-banner-wrapper banner-slider landscape-gardening-carousel-navigation" data-slick='{"autoplay": false }'>
					<?php
					$landscape_gardening_i = 1;
					while ( $landscape_gardening_query->have_posts() ) :
						$landscape_gardening_query->the_post();
						$landscape_gardening_button_label = get_theme_mod( 'landscape_gardening_banner_button_label_' . $landscape_gardening_i, '' );
						$landscape_gardening_button_link  = get_theme_mod( 'landscape_gardening_banner_button_link_' . $landscape_gardening_i, '' );
						$landscape_gardening_button_link  = ! empty( $landscape_gardening_button_link ) ? $landscape_gardening_button_link : get_the_permalink();
						?>
						<div class="banner-single-outer">
							<div class="banner-single">
								<div class="banner-info  asterthemes-wrapper">
									<div class="banner-caption">
										<div class="asterthemes-wrapper">
											<div class="banner-catption-wrapper">
												<!-- New Heading from Customizer -->
												<h2 class="custom-banner-heading">
													<?php echo esc_html( get_theme_mod( 'landscape_gardening_banner_heading') ); ?>
												</h2>

												<a href="<?php the_permalink(); ?>"> <h2 class="banner-caption-title"><?php the_title(); ?></h2> </a>
												<div class="mag-post-excerpt">
													<?php the_excerpt(); ?>
												</div>
												<?php if ( ! empty( $landscape_gardening_button_label ) ) { ?>
													<div class="banner-slider-btn">
														<a href="<?php echo esc_url( $landscape_gardening_button_link ); ?>" class="asterthemes-button" target="_blank"><?php echo esc_html( $landscape_gardening_button_label ); ?></a>
													</div>
								            	<?php } ?>
											</div>
										</div>
									</div>
									<div class="banner-img">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'full' ); ?>
										<?php else : ?>
											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/resource/img/default.png" />
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<?php
						$landscape_gardening_i++;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>

	<?php
}
