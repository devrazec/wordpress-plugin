<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package landscape_gardening
 */

?>
<?php $landscape_gardening_readmore = get_theme_mod( 'landscape_gardening_readmore_button_text','Read More');?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="mag-post-single <?php echo esc_attr( get_theme_mod( 'landscape_gardening_enable_animation', true ) ? 'wow zoomIn delay-1000' : '' ); ?>">
		<div class="mag-post-img">
			<?php landscape_gardening_post_thumbnail(); ?>
		</div>
		<div class="mag-post-detail">
			<div class="mag-post-category">
				<?php landscape_gardening_categories_list(); ?>
			</div>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title mag-post-title">', '</h1>' );
			else :
				if ( get_theme_mod( 'landscape_gardening_post_hide_post_heading', true ) ) { 
					the_title( '<h2 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			    }
			endif;
			?>
			<div class="mag-post-meta">
				<?php
				landscape_gardening_posted_on();
				landscape_gardening_posted_by();
				landscape_gardening_posted_comments();
				landscape_gardening_posted_time();
				?>
			</div>
			<?php if ( get_theme_mod( 'landscape_gardening_post_hide_post_content', true ) ) { ?>
				<div class="mag-post-excerpt">
					<?php the_excerpt(); ?>
				</div>
		    <?php } ?>
			<?php if ( get_theme_mod( 'landscape_gardening_post_readmore_button', true ) === true ) : ?>
				<div class="mag-post-read-more">
					<a href="<?php the_permalink(); ?>" class="read-more-button">
						<?php if ( ! empty( $landscape_gardening_readmore ) ) { ?> <?php echo esc_html( $landscape_gardening_readmore ); ?> <?php } ?>
						<i class="<?php echo esc_attr( get_theme_mod( 'landscape_gardening_readmore_btn_icon', 'fas fa-chevron-right' ) ); ?>"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->