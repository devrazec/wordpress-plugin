<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package tour-planner-ebooking
 */
?>

<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside id="archives" role="complementary" aria-label="<?php esc_attr_e( 'firstsidebar', 'tour-planner-ebooking' ); ?>" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'tour-planner-ebooking' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside id="meta" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'tour-planner-ebooking' ); ?>" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'tour-planner-ebooking' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
        <aside id="search" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'tour-planner-ebooking' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Search', 'tour-planner-ebooking' ); ?></h3>
            <?php get_search_form(); ?>
        </aside>
        <aside id="categories" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'forthsidebar', 'tour-planner-ebooking' ); ?>">
            <h3 class="widget-title"><?php esc_html_e( 'Categories', 'tour-planner-ebooking' ); ?></h3>
            <ul>
                <?php wp_list_categories('title_li=');  ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>