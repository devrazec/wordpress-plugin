<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package tour-planner-ebooking
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  } ?>
  <header role="banner">
  <!-- preloader -->
  <?php if(get_theme_mod('tour_planner_ebooking_preloader_option',false)!= '' || get_theme_mod('tour_planner_ebooking_responsive_preloader', false) != ''){ ?>
    <?php if(get_theme_mod('tour_planner_ebooking_preloader_type_options', 'Preloader 1')  == 'Preloader 1') {?>
      <div id="loader-wrapper" class="w-100 h-100">
        <div id="loader" class="rounded-circle"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php } else if(get_theme_mod('tour_planner_ebooking_preloader_type_options', 'Preloader 2') ==  'Preloader 2') {?>
      <div id="loader-wrapper" class="w-100 h-100">
        <div class="loader">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
    <?php }?>
  <?php }?>
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'tour-planner-ebooking' ); ?></a>
  <div id="header">
    <div class="container topbar-contact-box mt-5">
      <div class="row justify-content-md-center justify-content-lg-center">
        <div class="col-xxl-8 col-xl-8 col-lg-7 col-md-4 col-sm-2 col-6 align-self-center main-header-box">
          <div class="last-row p-0">
            <div class="toggle-menu mobile-menu">
              <button class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','tour-planner-ebooking'); ?></span></button>
            </div>
            <div class="main-menu <?php if( get_theme_mod( 'tour_planner_ebooking_sticky_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
              <div id="menu-sidebar" class="nav sidebar text-center">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'tour-planner-ebooking' ); ?>">
                  <?php
                    wp_nav_menu( array(
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'main-menu-navigation clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) );
                  ?>
                </nav>
                <a href="javascript:void(0)" class="closebtn mobile-menu"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_close_menu_icon','far fa-times-circle')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','tour-planner-ebooking'); ?></span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-6 align-self-center top-logo">
          <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $tour_planner_ebooking_blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $tour_planner_ebooking_blog_info ) ) : ?>
                <?php if( get_theme_mod('tour_planner_ebooking_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title text-uppercase pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-uppercase"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php
              $tour_planner_ebooking_description = get_bloginfo( 'description', 'display' );
              if ( $tour_planner_ebooking_description || is_customize_preview() ) :
                ?>
              <?php if( get_theme_mod('tour_planner_ebooking_tagline',false) != ''){ ?>
                <p class="site-description m-0">
                  <?php echo esc_html($tour_planner_ebooking_description); ?>
                </p>
              <?php }?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 header-profile align-self-center text-end d-flex align-items-center justify-content-end gap-3">
          <?php if(get_theme_mod('tour_planner_ebooking_purchase_btn_text') != '' || get_theme_mod('tour_planner_ebooking_purchase_btn_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('tour_planner_ebooking_purchase_btn_url')); ?>" class="book-btn"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_purchase_btn_text')); ?><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_book_btn_icon','fa-solid fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('tour_planner_ebooking_purchase_btn_text')); ?></span></a>
          <?php }?>
          <?php if(get_theme_mod('tour_planner_ebooking_myaccount_btn_url') != '') {?>
            <a href="<?php echo esc_url(get_theme_mod('tour_planner_ebooking_myaccount_btn_url')); ?>" class="myaccount"><i class="<?php echo esc_attr(get_theme_mod('tour_planner_ebooking_myaccount_icon','fas fa-user')); ?>"></i></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</header>