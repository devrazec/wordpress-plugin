<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tour Travel Agent
 */
?>
    <footer role="contentinfo">
        <?php //Set widget areas classes based on user choice
            $tour_travel_agent_widget_areas = get_theme_mod('tour_travel_agent_footer_widget_layout', '4');
            if ($tour_travel_agent_widget_areas == '3') {
                $tour_travel_agent_cols = 'col-lg-4 col-md-6';
            } elseif ($tour_travel_agent_widget_areas == '4') {
                $tour_travel_agent_cols = 'col-lg-3 col-md-6';
            } elseif ($tour_travel_agent_widget_areas == '2') {
                $tour_travel_agent_cols = 'col-lg-6 col-md-6';
            } else {
                $tour_travel_agent_cols = 'col-lg-12 col-md-12';
            }
        ?>
        <?php if (get_theme_mod('tour_travel_agent_footer_hide_show', true)){ ?>
            <div class="footertown">
                <div class="container wow bounceInUp">
                    <div class="row">
                        <!-- Footer 1 -->
                        <div class="<?php echo esc_attr($tour_travel_agent_cols); ?> footer-block">
                            <?php if (is_active_sidebar('footer-1')) : ?>
                                <?php dynamic_sidebar('footer-1'); ?>
                            <?php else : ?>
                                <aside id="text-about" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('About Us', 'tour-travel-agent'); ?>">
                                    <h3 class="widget-title"><?php esc_html_e('About Us', 'tour-travel-agent'); ?></h3>
                                    <p><?php esc_html_e('Add a brief description about your business here.', 'tour-travel-agent'); ?></p>
                                </aside>
                            <?php endif; ?>
                        </div>

                        <!-- Footer 2 -->
                        <div class="<?php echo esc_attr($tour_travel_agent_cols); ?> footer-block">
                            <?php if (is_active_sidebar('footer-2')) : ?>
                                <?php dynamic_sidebar('footer-2'); ?>
                            <?php else : ?>
                                <aside id="archives" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('Archives', 'tour-travel-agent'); ?>">
                                    <h3 class="widget-title"><?php esc_html_e('Archives', 'tour-travel-agent'); ?></h3>
                                    <ul>
                                        <?php wp_get_archives(array('type' => 'monthly')); ?>
                                    </ul>
                                </aside>
                            <?php endif; ?>
                        </div>

                        <!-- Footer 3 -->
                        <div class="<?php echo esc_attr($tour_travel_agent_cols); ?> footer-block">
                            <?php if (is_active_sidebar('footer-3')) : ?>
                                <?php dynamic_sidebar('footer-3'); ?>
                            <?php else : ?>
                                <aside id="business-info" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('Business Info', 'tour-travel-agent'); ?>">
                                    <h3 class="widget-title"><?php esc_html_e('Business Info', 'tour-travel-agent'); ?></h3>
                                    <p><?php esc_html_e('Provide your business address, contact details, and other important information here.', 'tour-travel-agent'); ?></p>
                                </aside>
                            <?php endif; ?>
                        </div>

                        <!-- Footer 4 -->
                        <div class="<?php echo esc_attr($tour_travel_agent_cols); ?> footer-block">
                            <?php if (is_active_sidebar('footer-4')) : ?>
                                <?php dynamic_sidebar('footer-4'); ?>
                            <?php else : ?>
                                <aside id="search-widget" class="widget py-3" role="complementary" aria-label="<?php esc_attr_e('Search', 'tour-travel-agent'); ?>">
                                    <h3 class="widget-title"><?php esc_html_e('Search', 'tour-travel-agent'); ?></h3>
                                    <?php the_widget('WP_Widget_Search'); ?>
                                </aside>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>   
      <div class="footer <?php if( get_theme_mod( 'tour_travel_agent_copyright_sticky', false) == 1) { ?> copyright-sticky"<?php } else { ?>close-sticky <?php } ?>">  
        <?php if (get_theme_mod('tour_travel_agent_copyright_hide_show', true)) {?>
            <div id="footer">
            	<div class="container wow bounceInUp">
                    <p class="mb-0"><?php tour_travel_agent_credit_link(); ?> <?php echo esc_html(get_theme_mod('tour_travel_agent_footer_copy',__('By ThemesCaliber','tour-travel-agent'))); ?> </p>
              
                    <?php if (get_theme_mod('tour_travel_agent_show_footer_social_icon', true)){ ?>     
                    <div class="socialicons col-lg-12 col-md-12 col-12 align-self-center">                      
                        <?php if( get_theme_mod( 'tour_travel_agent_footer_facebook_url' ) != '' && get_theme_mod('tour_travel_agent_footer_facebook_icon') != 'None') { ?>
                            <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'tour_travel_agent_footer_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_footer_facebook_icon', 'fab fa-facebook-f')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','tour-travel-agent' );?></span></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'tour_travel_agent_footer_twitter_url' ) != '' && get_theme_mod('tour_travel_agent_footer_twitter_icon') != 'None') { ?>
                            <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'tour_travel_agent_footer_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_footer_twitter_icon', 'fab fa-twitter')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','tour-travel-agent' );?></span></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'tour_travel_agent_footer_linkedin_url' ) != '' && get_theme_mod('tour_travel_agent_footer_linkedin_icon') != 'None') { ?>
                            <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'tour_travel_agent_footer_linkedin_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_footer_linkedin_icon','fab fa-linkedin')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','tour-travel-agent' );?></span></a>
                        <?php } ?>  
                        <?php if( get_theme_mod( 'tour_travel_agent_footer_instagram_url' ) != '' && get_theme_mod('tour_travel_agent_footer_instagram_icon') != 'None') { ?>
                            <a target="_blank" href="<?php echo esc_url( get_theme_mod( 'tour_travel_agent_footer_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_footer_instagram_icon','fab fa-instagram')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','tour-travel-agent' );?></span></a>
                        <?php } ?>                        
                    </div>
                    <?php }?>     

                </div>
            </div>
        <?php }?>  
     </div>   
        <?php if( get_theme_mod( 'tour_travel_agent_show_back_to_top',true) != '' || get_theme_mod('tour_travel_agent_responsive_show_back_to_top',true) != '') { ?>
            <?php $tour_travel_agent_scroll_lay = get_theme_mod( 'tour_travel_agent_back_to_top_alignment','Right');
            if($tour_travel_agent_scroll_lay == 'Left'){ ?>
                <a href="#" class="scrollup left"><span><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?><?php if(get_theme_mod('tour_travel_agent_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('tour_travel_agent_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?></span></a>
            <?php }else if($tour_travel_agent_scroll_lay == 'Center'){ ?>
                <a href="#" class="scrollup center"><span><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?><?php if(get_theme_mod('tour_travel_agent_back_to_top_icon') != 'None') {?><i class="<?php echo esc_html(get_theme_mod('tour_travel_agent_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?></span></a>
            <?php }else{ ?>
                <a href="#" class="scrollup right"><span><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?><?php if(get_theme_mod('tour_travel_agent_back_to_top_icon') != 'None') {?><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_back_to_top_icon','fas fa-arrow-up')); ?> ms-2"></i><?php }?></span><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_back_to_top_text',__('Back to Top', 'tour-travel-agent' )) ); ?></span></a>
            <?php }?>
        <?php }?>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>