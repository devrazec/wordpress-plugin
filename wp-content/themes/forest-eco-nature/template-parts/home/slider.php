<?php
/**
 * Template part for displaying slider section
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

?>
<?php $forest_eco_nature_static_image= get_template_directory_uri() . '/assets/images/slider-img.png'; ?>
<?php if( get_theme_mod( 'forest_eco_nature_slider_arrows', true) != '') { ?>
  <section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide vertical" data-ride="carousel">
    <?php $forest_eco_nature_slide_pages = array();
      for ( $forest_eco_nature_count = 1; $forest_eco_nature_count <= 4; $forest_eco_nature_count++ ) {
        $mod = intval( get_theme_mod( 'forest_eco_nature_slider_page' . $forest_eco_nature_count ));
        if ( 'page-none-selected' != $mod ) {
          $forest_eco_nature_slide_pages[] = $mod;
        }
      }
      if( !empty($forest_eco_nature_slide_pages) ) :
        $forest_eco_nature_args = array(
          'post_type' => 'page',
          'post__in' => $forest_eco_nature_slide_pages,
          'orderby' => 'post__in'
        );
        $forest_eco_nature_query = new WP_Query( $forest_eco_nature_args );
        if ( $forest_eco_nature_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $forest_eco_nature_query->have_posts() ) : $forest_eco_nature_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'. esc_url($forest_eco_nature_static_image).'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <?php if( get_theme_mod( 'forest_eco_nature_slider_short_heading' ) != '' ) { ?>
                <p class="slider-top"><?php echo esc_html( get_theme_mod( 'forest_eco_nature_slider_short_heading','' ) ); ?></p>
              <?php } ?>
              <?php if (get_theme_mod('forest_eco_nature_show_slider_title', true)) : ?>
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <?php endif; ?>
              <?php if (get_theme_mod('forest_eco_nature_show_slider_content', true)) : ?>
                <p><?php $forest_eco_nature_excerpt = get_the_excerpt(); echo esc_html( forest_eco_nature_string_limit_words( $forest_eco_nature_excerpt, esc_attr(get_theme_mod('forest_eco_nature_slider_excerpt_length','20')))); ?></p>
              <?php endif; ?>
               <div class="more-btn mt-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','forest-eco-nature'); ?>  <i class="fas fa-arrow-right px-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-up"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-down"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>
<?php } ?>