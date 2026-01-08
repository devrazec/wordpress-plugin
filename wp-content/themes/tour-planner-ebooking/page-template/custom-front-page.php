<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'tour_planner_ebooking_above_slider' ); ?>
  
  <?php 
    $tour_planner_ebooking_number = get_theme_mod('tour_planner_ebooking_slide_number');
    if($tour_planner_ebooking_number != ''){
  ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_slider_speed_option', 3000)); ?>">
          <div class="carousel-inner" role="listbox">
            <?php for ($tour_planner_ebooking_i=1; $tour_planner_ebooking_i<=$tour_planner_ebooking_number; $tour_planner_ebooking_i++) {?>
              <div <?php if($tour_planner_ebooking_i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if(get_theme_mod('tour_planner_ebooking_slider_title'.$tour_planner_ebooking_i) != ''){ ?>
                      <h1 class="slide_title p-0 mb-2" class=""><?php echo esc_html(get_theme_mod('tour_planner_ebooking_slider_title'.$tour_planner_ebooking_i)); ?></h1>
                    <?php } ?>
                    <?php if(get_theme_mod('tour_planner_ebooking_slider_text'.$tour_planner_ebooking_i) != ''){ ?>
                      <p class="slide_text mb-4"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_slider_text'.$tour_planner_ebooking_i)); ?></p>
                    <?php } ?>
                  </div>
                </div>
                <div class="travel-form">
                  <?php if(get_theme_mod( 'tour_planner_ebooking_banner_form_hide_show', true)){ ?>
                    <?php echo do_shortcode(get_theme_mod('tour_planner_ebooking_banner_form_shortcode')); ?>
                  <?php }?> 
                </div>
                <div class="slider-carousel">
                  <div class="image-overlay"></div>
                  <?php if ( get_theme_mod('tour_planner_ebooking_banner_background_image_sec',true) != "" ) {?>
                    <img class="slider-carousel-img" src="<?php echo esc_url(get_theme_mod('tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i)); ?>" alt="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_slide_title'.$tour_planner_ebooking_i, true)); ?>" title="#slidecaption<?php echo esc_html($tour_planner_ebooking_i); ?>">
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="slider-indicator carousel-indicators text-center carousel slide"  class="carousel slide" data-bs-ride="carousel">
            <?php for ($tour_planner_ebooking_i=1; $tour_planner_ebooking_i<=$tour_planner_ebooking_number; $tour_planner_ebooking_i++) {?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo esc_html($tour_planner_ebooking_i-1); ?>" <?php if ($tour_planner_ebooking_i == 1) { echo 'class="indicator active"'; } ?> >
                  <?php if( get_theme_mod('tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i)) { ?>
                    <img src="<?php echo esc_url(get_theme_mod('tour_planner_ebooking_banner_background_image_sec'.$tour_planner_ebooking_i)); ?>" alt="Slider Image">
                  <?php }?>
               </button>
             <?php }?>
          </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'tour_planner_ebooking_below_slider' ); ?>

  <!-- Tour Section -->
  <section id="tour-section" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-8 col-12 align-self-center">
          <div class="tour-sec-text text-start">
            <?php if( get_theme_mod('tour_planner_ebooking_tour_section_text') != ''){ ?>
              <p class="mb-0"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_tour_section_text')); ?></p>
            <?php } ?>
            <?php if( get_theme_mod('tour_planner_ebooking_tour_section_title') != ''){ ?>
              <h2 class="p-0"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_tour_section_title')); ?></h2>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12 align-self-center text-end tour-sec-btn">
          <?php if(get_theme_mod('tour_planner_ebooking_category_btn_text') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('tour_planner_ebooking_category_btn_url')); ?>" class="category-btn">
              <?php echo esc_html(get_theme_mod('tour_planner_ebooking_category_btn_text')); ?>
              <i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_category_btn_icon','fa-solid fa-angle-right')); ?>"></i>
              <span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_category_btn_text')); ?></span>
            </a>
          <?php }?>
        </div>
      </div>
      <div class="row">
        <?php
        for ($tour_planner_ebooking_j = 1; $tour_planner_ebooking_j <= 4; $tour_planner_ebooking_j++) {
            $tour_planner_ebooking_c_category = get_theme_mod('tour_planner_ebooking_category_cat'.$tour_planner_ebooking_j);

            if ($tour_planner_ebooking_c_category) {
                // Get the category object by slug
                $tour_planner_ebooking_cat_obj = get_category_by_slug($tour_planner_ebooking_c_category);
                $tour_planner_ebooking_cat_name = isset($tour_planner_ebooking_cat_obj->name) ? $tour_planner_ebooking_cat_obj->name : '';
                $tour_planner_ebooking_cat_id = isset($tour_planner_ebooking_cat_obj->term_id) ? $tour_planner_ebooking_cat_obj->term_id : '';
                $tour_planner_ebooking_cat_link = get_category_link($tour_planner_ebooking_cat_id);
                $tour_planner_ebooking_thumbnail_id = get_term_meta($tour_planner_ebooking_cat_id, 'category_image', true);
                $tour_planner_ebooking_post_count = isset($tour_planner_ebooking_cat_obj->count) ? $tour_planner_ebooking_cat_obj->count : 0; // Get post count
                ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-12 align-self-center mt-4">
                  <div class="cat-box">
                    <?php
                      if ($tour_planner_ebooking_thumbnail_id) {
                        echo '<img class="thumb_img" src="' . esc_url($tour_planner_ebooking_thumbnail_id) . '" alt="" />';
                      } else { ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/dummy-category.png" alt="" class="thumb_img" />
                    <?php } ?>
                      
                    <a href="<?php echo esc_url($tour_planner_ebooking_cat_link); ?>" class="category-icon">
                      <i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_category_icon'.$tour_planner_ebooking_j, 'fa-solid fa-person-hiking')); ?>"></i>
                    </a>
                    <div class="tours">
                      <?php if ($tour_planner_ebooking_cat_name) { ?>
                        <h2 class="category-title pt-0 pb-1">
                          <a href="<?php echo esc_url($tour_planner_ebooking_cat_link); ?>" tabindex="0">
                            <?php echo esc_html($tour_planner_ebooking_cat_name); ?>
                          </a>
                        </h2>
                      <?php } ?>
                      <div class="tour-content">
                        <span><?php echo esc_html('From','tour-planner-ebooking'); ?></span>
                        <?php if (get_theme_mod('tour_planner_ebooking_cat_small_text'.$tour_planner_ebooking_j) != '') { ?>
                          <span class="tour-rate"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_cat_small_text'.$tour_planner_ebooking_j,'')); ?></span>
                        <?php } ?>
                        <?php echo esc_html('/','tour-planner-ebooking'); ?>
                        <span class="post-count-num"><?php echo esc_html($tour_planner_ebooking_post_count); ?></span>
                        <span><?php echo esc_html(' Tours','tour-planner-ebooking'); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
            <?php }
        } ?>
      </div>
    </div>
  </section>
  <?php do_action( 'tour_planner_ebooking_post_section' ); ?>

  <div id="content">
    <div class="container entry-content">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>