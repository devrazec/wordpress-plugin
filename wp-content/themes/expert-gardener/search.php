<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Expert Gardener
 */

get_header();
?>
<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<?php 
                $expert_gardener_search_result_sidebar_setting = get_theme_mod('expert_gardener_search_result_sidebar_setting','1');
                $expert_gardener_sidebar_position = get_theme_mod('expert_gardener_sidebar_position', 'right');
                $expert_gardener_content_class = ($expert_gardener_search_result_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';

                // Set classes for left or right sidebar
                $expert_gardener_content_order_class = ($expert_gardener_sidebar_position == 'left') ? 'order-lg-2' : '';
                $expert_gardener_sidebar_order_class = ($expert_gardener_sidebar_position == 'left') ? 'order-lg-1' : '';
            ?>
			<div class="<?php echo esc_attr($expert_gardener_content_class . ' ' . $expert_gardener_content_order_class); ?>">
				<?php if( have_posts() ): ?>
			
					<?php while( have_posts() ) : the_post(); ?>
						<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
					<?php endwhile; 
					the_posts_navigation(); ?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php if( $expert_gardener_search_result_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>	
<?php get_footer(); ?>