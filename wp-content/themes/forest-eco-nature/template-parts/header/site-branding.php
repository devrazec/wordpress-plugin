<?php
/*
* Display Logo and nav
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row head-bg">
      <div class="col-lg-3 logo-box">
        <?php $forest_eco_nature_logo_settings = get_theme_mod( 'forest_eco_nature_logo_settings','Different Line');
          if($forest_eco_nature_logo_settings == 'Different Line'){ ?>
            <div class="logo">
              <?php if( has_custom_logo() ) forest_eco_nature_the_custom_logo(); ?>
              <?php if(get_theme_mod('forest_eco_nature_site_title',true) == 1){ ?>
                <?php if (is_front_page() || is_home()) : ?>
                  <h1 class="text-capitalize">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </h1>
                <?php else : ?>
                  <p class="text-capitalize site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
                <?php endif; ?>
              <?php }?>
              <?php $forest_eco_nature_description = get_bloginfo( 'description', 'display' );
              if ( $forest_eco_nature_description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('forest_eco_nature_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($forest_eco_nature_description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          <?php }else if($forest_eco_nature_logo_settings == 'Same Line'){ ?>
            <div class="logo logo-same-line mb-md-0 text-center text-lg-start">
              <div class="row">
                <div class="col-lg-5 col-md-5 align-self-md-center">
                  <?php if( has_custom_logo() ) forest_eco_nature_the_custom_logo(); ?>
                </div>
                <div class="col-lg-7 col-md-7 align-self-md-center">
                  <?php if(get_theme_mod('forest_eco_nature_site_title',true) == 1){ ?>
                    <?php if (is_front_page() || is_home()) : ?>
                      <h1 class="text-capitalize">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                      </h1>
                    <?php else : ?>
                      <p class="text-capitalize site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                      </p>
                    <?php endif; ?>
                    <?php }?>
                    <?php $forest_eco_nature_description = get_bloginfo( 'description', 'display' );
                    if ( $forest_eco_nature_description || is_customize_preview() ) : ?>
                    <?php if(get_theme_mod('forest_eco_nature_site_tagline',false)){ ?>
                      <p class="site-description mb-0"><?php echo esc_html($forest_eco_nature_description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php }?>
      </div>
      <div class="col-lg-9">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      <div class="row top-header">
        <div class="col-lg-4 col-md-4 col-sm-5 col-12 align-self-center">
          <?php if( get_theme_mod( 'forest_eco_nature_phone_no' ) != '') { ?>
            <p class="mb-0"><a href="tel:<?php echo esc_html( get_theme_mod('forest_eco_nature_phone_no','') ); ?>"><i class="fas fa-phone px-2"></i><?php esc_html_e( 'Emergency Contact No ', 'forest-eco-nature' ); ?><?php echo esc_html( get_theme_mod('forest_eco_nature_phone_no','')); ?></a></p>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 px-sm-0 text-lg-end align-self-center pr-lg-0">
          <div class="search-block">
            <?php get_search_form(); ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-3 col-12 px-sm-0 align-self-center text-lg-end px-lg-0">
        <?php if( get_theme_mod( 'forest_eco_nature_membership_link' ) != '' || get_theme_mod( 'forest_eco_nature_membership_button' ) != '') { ?>
         <div class="join-btn">
            <a href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_membership_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'forest_eco_nature_membership_button','' ) ); ?></a>
        </div>
        <?php } ?>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>