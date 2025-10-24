<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package landscape_gardening
 */
?>


<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

<?php 
  if ( ! is_active_sidebar( 'sidebar-1' )) { ?>
	<aside id="secondary" class="widget-area">
		<section id="Search" class="widget widget_block widget_archive " >
		    <h2 class="widget-title"><?php esc_html_e('Search', 'landscape-gardening'); ?></h2>
		    <?php get_search_form(); ?>
		</section>
		<section id="archives" class="widget widget_block widget_archive " >
		    <h2 class="widget-title"><?php esc_html_e('Archives', 'landscape-gardening'); ?></h2>
		    <ul>
		        <?php
		        wp_get_archives(array(
		            'type'            => 'monthly',
		            'show_post_count' => true,
		        ));
		        ?>
		    </ul>
		</section>
		<section id="categories" class="widget widget_categories" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'landscape-gardening'); ?></h2>
		    <ul>
		        <?php
		        wp_list_categories(array(
		            'orderby'    => 'name',
		            'title_li'   => '',
		            'show_count' => true,
		        ));
		        ?>
		    </ul>
		</section>
		<section id="tags" class="widget widget_tag_cloud" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Tags', 'landscape-gardening'); ?></h2>
		    <?php
				$landscape_gardening_tags = get_tags();
				if ($landscape_gardening_tags) {
				    echo '<div class="tag-cloud">';
				    foreach ($landscape_gardening_tags as $landscape_gardening_tag) {
				        $landscape_gardening_tag_link = get_tag_link($landscape_gardening_tag->term_id);
				        echo '<a href="' . esc_url($landscape_gardening_tag_link) . '" style="font-size:' . esc_attr($landscape_gardening_tag->font_size) . 'px;" class="tag-link">' . esc_html($landscape_gardening_tag->name) . '</a>';
				    }
				    echo '</div>';
				} else {
					echo '<p>' . esc_html__( 'No tags found.', 'landscape-gardening' ) . '</p>';
				}
			?>
		</section>
		<section id="recent-posts" class="widget" role="complementary">
		    <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'landscape-gardening'); ?></h2>
		    <ul class="recent-posts-list">
		        <?php
		        $landscape_gardening_recent_posts = get_posts(array(
		            'numberposts' => 5, // Adjust the number of posts to display
		            'post_status' => 'publish',
		        ));

		        foreach ($landscape_gardening_recent_posts as $landscape_gardening_post) :
		            setup_postdata($landscape_gardening_post);
		            ?>
		            <li>
		                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		            </li>
		            <?php
		        endforeach;
		        wp_reset_postdata();
		        ?>
		    </ul>
		</section>

	</aside><!-- #secondary -->
<?php } ?>