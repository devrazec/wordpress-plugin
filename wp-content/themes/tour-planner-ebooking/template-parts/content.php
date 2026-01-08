<?php
/**
 * The template part for displaying post 
 *
 * @package tour-planner-ebooking
 * @subpackage tour-planner-ebooking
 * @since tour-planner-ebooking 1.0
 */
?>  
<?php 
  $tour_planner_ebooking_archive_year  = get_the_time('Y'); 
  $tour_planner_ebooking_archive_month = get_the_time('m'); 
  $tour_planner_ebooking_archive_day   = get_the_time('d'); 
?> 
<article class="page-box wow zoomInLeft delay-1000">
  <?php if( get_theme_mod( 'tour_planner_ebooking_show_featured_image_post',true) != '') { ?>
    <div class="box-img">
      <?php the_post_thumbnail(); ?>
    </div>
  <?php } ?>
  <?php if( get_theme_mod( 'tour_planner_ebooking_show_post_category',true) != '') { ?>
    <?php the_category(); ?>
  <?php } ?>
  <div class="new-text">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if( get_theme_mod( 'tour_planner_ebooking_date_hide',true) != '' || get_theme_mod( 'tour_planner_ebooking_comment_hide',true) != '' || get_theme_mod( 'tour_planner_ebooking_author_hide',true) != '' || get_theme_mod( '
      tour_planner_ebooking_time_hide',true) != '') { ?>
      <div class="metabox">
        <?php if( get_theme_mod( 'tour_planner_ebooking_date_hide',true) != '') { ?>
          <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_date_icon','fa fa-calendar')); ?>"></i><a href="<?php echo esc_url( get_day_link( $tour_planner_ebooking_archive_year, $tour_planner_ebooking_archive_month, $tour_planner_ebooking_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('tour_planner_ebooking_metabox_separator_blog_post','|') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'tour_planner_ebooking_comment_hide',true) != '') { ?>
          <span class="entry-comments"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_comment_icon','fas fa-comments')); ?>"></i><?php comments_number( __('0 Comments','tour-planner-ebooking'), __('0 Comments','tour-planner-ebooking'), __('% Comments','tour-planner-ebooking') ); ?></span><?php echo esc_html( get_theme_mod('tour_planner_ebooking_metabox_separator_blog_post','|') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'tour_planner_ebooking_author_hide',true) != '') { ?>
          <span class="entry-author"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_author_icon','fa fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('tour_planner_ebooking_metabox_separator_blog_post','|') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'tour_planner_ebooking_time_hide',true) != '') { ?>
          <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_time_icon','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
        <?php }?>
      </div>
    <?php }?>
    <?php if(get_theme_mod('tour_planner_ebooking_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><p><?php the_content();?></p></div>
    <?php }
    if(get_theme_mod('tour_planner_ebooking_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $tour_planner_ebooking_excerpt = get_the_excerpt(); echo esc_html( tour_planner_ebooking_string_limit_words( $tour_planner_ebooking_excerpt, esc_attr(get_theme_mod('tour_planner_ebooking_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('tour_planner_ebooking_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('tour_planner_ebooking_button_text','Read More') != ''){ ?>
      <div class="read-more-btn">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_button_text','Read More'));?></span></a>
      </div>
    <?php }?>
  </div>
  <div class="clearfix"></div>
</article>