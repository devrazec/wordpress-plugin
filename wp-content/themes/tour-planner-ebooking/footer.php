<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tour-planner-ebooking
 */
?>
<footer role="contentinfo">
    <?php if (get_theme_mod('tour_planner_ebooking_show_hide_footer', true)){ ?>
        <?php //Set widget areas classes based on user choice
            $tour_planner_ebooking_widget_areas = get_theme_mod('tour_planner_ebooking_footer_widget_areas', '4');
            if ($tour_planner_ebooking_widget_areas == '3') {
                $tour_planner_ebooking_cols = 'col-lg-4 col-md-4';
            } elseif ($tour_planner_ebooking_widget_areas == '4') {
                $tour_planner_ebooking_cols = 'col-lg-3 col-md-3';
            } elseif ($tour_planner_ebooking_widget_areas == '2') {
                $tour_planner_ebooking_cols = 'col-lg-6 col-md-6';
            } else {
                $tour_planner_ebooking_cols = 'col-lg-12 col-md-12';
            }
        ?>
        <div id="footer" class="copyright-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Footer Column 1 -->
                    <div class="sidebar-column <?php echo esc_attr($tour_planner_ebooking_cols); ?>">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php else : ?>
                            <aside id="calendar" role="complementary" aria-label="firstsidebar" class="widget">
                                <h3 class="widget-title"><?php esc_html_e('Calendar', 'tour-planner-ebooking'); ?></h3>
                                <?php get_calendar(); ?>
                            </aside>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 2 -->
                    <div class="sidebar-column <?php echo esc_attr($tour_planner_ebooking_cols); ?>">
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php else : ?>
                            <aside id="categories" role="complementary" aria-label="secondsidebar" class="widget">
                                <h3 class="widget-title"><?php esc_html_e('Categories', 'tour-planner-ebooking'); ?></h3>
                                <ul>
                                    <?php wp_list_categories(array('title_li' => '')); ?>
                                </ul>
                            </aside>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 3 -->
                    <div class="sidebar-column <?php echo esc_attr($tour_planner_ebooking_cols); ?>">
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <aside id="search" role="complementary" aria-label="thirdsidebar" class="widget">
                                <h3 class="widget-title"><?php esc_html_e('Search', 'tour-planner-ebooking'); ?></h3>
                                <?php get_search_form(); ?>
                            </aside>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 4 -->
                    <div class="sidebar-column <?php echo esc_attr($tour_planner_ebooking_cols); ?>">
                        <?php if (is_active_sidebar('footer-4')) : ?>
                            <?php dynamic_sidebar('footer-4'); ?>
                        <?php else : ?>
                            <aside id="meta" role="complementary" aria-label="fourthsidebar" class="widget">
                                <h3 class="widget-title"><?php esc_html_e('Meta', 'tour-planner-ebooking'); ?></h3>
                                <ul>
                                    <?php wp_register(); ?>
                                    <li><?php wp_loginout(); ?></li>
                                </ul>
                            </aside>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <?php if (get_theme_mod('tour_planner_ebooking_show_hide_copyright', true)) {?>
    <div class="copyright">
        <div class="container">
            <p><?php tour_planner_ebooking_credit();?><?php echo esc_html(get_theme_mod('tour_planner_ebooking_footer_copy', __('By Themescaliber', 'tour-planner-ebooking')));?></p>
        </div>
    </div>
    <?php }?>
    <?php if (get_theme_mod('tour_planner_ebooking_show_hide_footer_social_icon', false)) {?>
        <div class="footer-social-icon">
            <div class="container">
                <?php for ( $tour_planner_ebooking_j = 1; $tour_planner_ebooking_j <= 5; $tour_planner_ebooking_j++ ) { ?>
                    <?php if( get_theme_mod( 'tour_planner_ebooking_social_icon_url' .$tour_planner_ebooking_j) != '') { ?>
                        <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'tour_planner_ebooking_social_icon_url' .$tour_planner_ebooking_j) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_select_social_icon' .$tour_planner_ebooking_j)); ?>" aria-hidden="true"></i></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php }?>
</footer>
<?php if( get_theme_mod( 'tour_planner_ebooking_enable_disable_scroll',true) != '' || get_theme_mod( 'tour_planner_ebooking_responsive_scroll',true) != '') { ?>
    <?php $tour_planner_ebooking_theme_lay = get_theme_mod( 'tour_planner_ebooking_scroll_setting','Right');
      if($tour_planner_ebooking_theme_lay == 'Left'){ ?>
        <button id="scroll-top" class="left-align" title="<?php esc_attr_e('Scroll to Top','tour-planner-ebooking'); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_back_to_top_icon','fas fa-chevron-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'tour-planner-ebooking'); ?></span></button>
      <?php }else if($tour_planner_ebooking_theme_lay == 'Center'){ ?>
        <button id="scroll-top" class="center-align" title="<?php esc_attr_e('Scroll to Top','tour-planner-ebooking'); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_back_to_top_icon','fas fa-chevron-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'tour-planner-ebooking'); ?></span></button>
      <?php }else{ ?>
        <button id="scroll-top" title="<?php esc_attr_e('Scroll to Top','tour-planner-ebooking'); ?>">
        <i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_back_to_top_icon','fas fa-chevron-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Scroll to Top', 'tour-planner-ebooking'); ?></span></button>
    <?php }?>
<?php }?>

<?php wp_footer();?>
</body>
</html>