<?php 
    $tour_planner_ebooking_archive_year  = get_the_time('Y'); 
    $tour_planner_ebooking_archive_month = get_the_time('m'); 
    $tour_planner_ebooking_archive_day   = get_the_time('d'); 

    $tour_planner_ebooking_related_posts = tour_planner_ebooking_related_posts();

    if(get_theme_mod('tour_planner_ebooking_show_related_post',true)==1){ ?>
    <?php if ( $tour_planner_ebooking_related_posts->have_posts() ): ?>
        <div class="related-posts">
            <?php if ( get_theme_mod('tour_planner_ebooking_related_post_title','Related Posts') != '' ) {?>
                <h3 class="mb-3"><?php echo esc_html( get_theme_mod('tour_planner_ebooking_related_post_title',__('Related Posts','tour-planner-ebooking')) ); ?></h3>
            <?php }?>
            <div class="row">
                <?php while ( $tour_planner_ebooking_related_posts->have_posts() ) : $tour_planner_ebooking_related_posts->the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="related-box mb-3 p-2">
                            <?php if( get_theme_mod( 'tour_planner_ebooking_show_featured_image_related_post',true) != '') { ?>
                                <?php if(has_post_thumbnail()) { ?>
                                    <div class="box-image mb-3">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php }?>
                            <?php }?>
                            <h4 class="p-0"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                            <div class="metabox mt-3">
                                <?php if( get_theme_mod( 'tour_planner_ebooking_related_post_date_hide',true) != '') { ?>
                                    <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_related_post_date_icon','fa fa-calendar')); ?>"></i><a href="<?php echo esc_url( get_day_link( $tour_planner_ebooking_archive_year, $tour_planner_ebooking_archive_month, $tour_planner_ebooking_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
                                <?php } ?>
                            </div>
                            <div class="entry-content"><p><?php $tour_planner_ebooking_excerpt = get_the_excerpt(); echo esc_html( tour_planner_ebooking_string_limit_words( $tour_planner_ebooking_excerpt, esc_attr(get_theme_mod('tour_planner_ebooking_related_post_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('tour_planner_ebooking_post_suffix_option','...') ); ?></p></div>
                            <?php if( get_theme_mod('tour_planner_ebooking_related_button_text','Read More') != ''){ ?>
                                <div class="read-more-btn">
                                    <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_related_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_related_button_text','Read More'));?></span></a>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
<?php wp_reset_postdata(); }?>