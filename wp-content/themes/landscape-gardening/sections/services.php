<?php
if ( ! get_theme_mod( 'landscape_gardening_enable_service_section', false ) ) {
  return;
}

$landscape_gardening_content_ids  = array();
$landscape_gardening_content_type = get_theme_mod( 'landscape_gardening_service_content_type', 'post' );

for ( $landscape_gardening_i = 1; $landscape_gardening_i <= 3; $landscape_gardening_i++ ) {
  $landscape_gardening_content_ids[] = get_theme_mod( 'landscape_gardening_service_content_' . $landscape_gardening_content_type . '_' . $landscape_gardening_i );
}

// Get the category for the services slider from theme mods or a default category
$landscape_gardening_services_category = get_theme_mod('landscape_gardening_services_category', 'services');

// Modify query to fetch posts from a specific category
$landscape_gardening_services_args = array(
    'post_type'           => $landscape_gardening_content_type,
    'post__in'            => array_filter( $landscape_gardening_content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint(3),
    'ignore_sticky_posts' => true,
);

// Apply category filter only if content type is 'post'
if ( 'post' === $landscape_gardening_content_type && ! empty( $landscape_gardening_services_category ) ) {
    $landscape_gardening_services_args['category_name'] = $landscape_gardening_services_category;
}

$landscape_gardening_services_args = apply_filters( 'landscape_gardening_service_section_args', $landscape_gardening_services_args );

landscape_gardening_render_service_section( $landscape_gardening_services_args );

/**
 * Render Service Section.
 */

 function landscape_gardening_render_service_section( $landscape_gardening_services_args ) {
 ?>
  <section id="landscape_gardening_service_section" class="asterthemes-frontpage-section service-section service-style-1">
    <?php
    if ( is_customize_preview() ) :
      landscape_gardening_section_link( 'landscape_gardening_service_section' );
    endif;

    $landscape_gardening_trending_product_heading = get_theme_mod( 'landscape_gardening_trending_product_heading');
    ?>
    <div class="asterthemes-wrapper">
      
      <div class="services-inner">
        <?php if ( ! empty( $landscape_gardening_trending_product_heading ) ) { ?>
          <h3><?php echo esc_html( $landscape_gardening_trending_product_heading ); ?></h3>
        <?php } ?>
      </div>
      <div class="video-main-box">
      <?php 
        $landscape_gardening_query = new WP_Query( $landscape_gardening_services_args );
        if ( $landscape_gardening_query->have_posts() ) :
        ?>
          <div class="section-body">
            <div class="service-section-wrapper">
              <?php
              $landscape_gardening_i = 1;
              while ( $landscape_gardening_query->have_posts() ) :
                $landscape_gardening_query->the_post();

                if ( $landscape_gardening_i % 2 !== 0 ) {
                  // Odd: Content first, then image
                  ?>
                  <div class="service-single">
                    <div class="services-info">
                      <!-- Icon & Title -->
                      <div class="service-post-title">
                        <div class="service-icon">
                          <?php if(get_theme_mod('landscape_gardening_services_icon'.$landscape_gardening_i)){ ?>
                            <i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_services_icon'.$landscape_gardening_i)); ?>"></i>
                          <?php } ?>
                        </div>
                        <div class="service-title">
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="service-content">
                        <div class="mag-post-excerpt"><?php the_excerpt(); ?></div>
                      </div>
                    </div>
                    <div class="service-image">
                      <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full' );
                      } else { ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/resource/img/default.png" />
                      <?php } ?>
                    </div>
                  </div>
                <?php
                } else {
                  // Even: Image first, then content
                  ?>
                  <div class="service-single">
                    <div class="service-image">
                      <?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full' );
                      } else { ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/resource/img/default.png" />
                      <?php } ?>
                    </div>
                    <div class="services-info">
                      <!-- Icon & Title -->
                      <div class="service-post-title">
                        <div class="service-icon">
                          <?php if(get_theme_mod('landscape_gardening_services_icon'.$landscape_gardening_i)){ ?>
                            <i class="<?php echo esc_attr(get_theme_mod('landscape_gardening_services_icon'.$landscape_gardening_i)); ?>"></i>
                          <?php } ?>
                        </div>
                        <div class="service-title">
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="service-content">
                        <div class="mag-post-excerpt"><?php the_excerpt(); ?></div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                $landscape_gardening_i++;
              endwhile;
              wp_reset_postdata();
              ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </section>
  <?php
}