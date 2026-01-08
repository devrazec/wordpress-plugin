<?php
/**
 * The template part for displaying slider
 *
 * @package Tour Travel Agent
 * @subpackage tour_travel_agent
 * @since Tour Travel Agent 1.0
 */
?>
<?php 
  $tour_travel_agent_grid_columns = get_theme_mod('tour_travel_agent_grid_columns', '3');
  if ($tour_travel_agent_grid_columns == '3') {
    $tour_travel_agent_column_class = 'col-lg-4 col-md-4';
  } elseif ($tour_travel_agent_grid_columns == '4') {
    $tour_travel_agent_column_class = 'col-lg-3 col-md-6';
  } 
?>
<div class="<?php echo esc_attr($tour_travel_agent_column_class); ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box p-3"> 
      <div class="grid-post-box">   
        <?php if(has_post_thumbnail() && get_theme_mod( 'tour_travel_agent_grid_post_image_hide',true) != '') { ?>
          <div class="service-image my-2 p-3">
            <a href="<?php echo esc_url( get_permalink() ); ?>">
              <?php  the_post_thumbnail(); ?>
              <span class="screen-reader-text"><?php the_title(); ?></span>
            </a>
          </div>
        <?php }?>
        <h2 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
        <div class="lower-box">
        <?php if( get_theme_mod( 'tour_travel_agent_grid_post_date_hide', true) != '' || get_theme_mod( 'tour_travel_agent_grid_post_comment_hide', true) != '' || get_theme_mod( 'tour_travel_agent_grid_post_author_hide', true) != '' || get_theme_mod( 'tour_travel_agent_grid_post_time_hide', true) != '') { ?>
            <div class="metabox py-1 px-2 mb-3">
              <?php if( get_theme_mod( 'tour_travel_agent_grid_post_date_hide', true) != '') { ?>
                <span class="entry-date me-2"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_grid_post_date_icon', 'far fa-calendar-alt me-1')); ?>"></i><?php echo esc_html( get_the_date() ); ?></span>
              <?php } ?>

              <?php if( get_theme_mod( 'tour_travel_agent_grid_post_author_hide', true) != '') { ?>
                <span class="entry-author me-2"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_grid_post_author_icon', 'fas fa-user me-1')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
              <?php } ?>

              <?php if( get_theme_mod( 'tour_travel_agent_grid_post_comment_hide', true) != '') { ?>
                <span class="entry-comments me-2"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_grid_post_comment_icon', 'fas fa-comments me-1')); ?>"></i> <?php comments_number( __('0 Comments','tour-travel-agent'), __('1 Comment','tour-travel-agent'), __('% Comments','tour-travel-agent') ); ?></span>
              <?php } ?>

              <?php if( get_theme_mod( 'tour_travel_agent_grid_post_time_hide', true) != '') { ?>
                <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('tour_travel_agent_grid_post_time_icon', 'fas fa-clock me-1')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
              <?php } ?>
            </div>
          <?php } ?> 
          <?php if(get_theme_mod('tour_travel_agent_grid_post_content') == 'Full Content'){ ?>
            <?php the_content(); ?>
          <?php }  
          if(get_theme_mod('tour_travel_agent_grid_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>    
            <?php if(get_the_excerpt()) { ?>
              <p><?php $tour_travel_agent_excerpt = get_the_excerpt(); echo esc_html( tour_travel_agent_string_limit_words( $tour_travel_agent_excerpt, esc_attr(get_theme_mod('tour_travel_agent_grid_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('tour_travel_agent_grid_post_button_excerpt_suffix','[...]') ); ?></p>
            <?php }?>
          <?php } ?> 
          <?php if ( get_theme_mod('tour_travel_agent_post_button_text','READ MORE') != '' ) {?>
            <div class="read-btn mt-4">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('tour_travel_agent_post_button_text',__( 'READ MORE','tour-travel-agent' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('tour_travel_agent_post_button_text',__( 'READ MORE','tour-travel-agent' )) ); ?></span>
              </a>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </article>
</div>
