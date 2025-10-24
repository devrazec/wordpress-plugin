<?php
/*
* Display topbar details
*/
?>
<?php if( get_theme_mod( 'forest_eco_nature_topbar_show', true ) != '') { ?>
  <div class="topbar">
    <div class="container">
      <div class="row topbar-box">
        <div class="col-lg-3 col-md-4 col-sm-3 align-self-center">
            <?php if( get_theme_mod( 'forest_eco_nature_mail' ) != '') { ?>
              <p class="mb-0"><a href="mailto:<?php echo esc_html( get_theme_mod('forest_eco_nature_mail','') ); ?>"><i class="fas fa-envelope px-2"></i><?php echo esc_html( get_theme_mod('forest_eco_nature_mail','')); ?></a></p>
            <?php } ?>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-6 align-self-center">
            <?php if( get_theme_mod( 'forest_eco_nature_location' ) != '') { ?>
              <p class="mb-0"><i class="fas fa-map-marker-alt px-2"></i><?php echo esc_html( get_theme_mod('forest_eco_nature_location','')); ?></p>
            <?php } ?>
        </div>
        <div class="col-lg-5 col-md-3 col-sm-3 align-self-center text-lg-end">
            <div class="social-media">
            <?php                 
              $forest_eco_nature_header_fb_new_tab = esc_attr(get_theme_mod('forest_eco_nature_header_fb_new_tab','true'));
              $forest_eco_nature_header_twt_new_tab = esc_attr(get_theme_mod('forest_eco_nature_header_twt_new_tab','true'));
              $forest_eco_nature_header_ins_new_tab = esc_attr(get_theme_mod('forest_eco_nature_header_ins_new_tab','true'));
              $forest_eco_nature_header_ut_new_tab = esc_attr(get_theme_mod('forest_eco_nature_header_ut_new_tab','true'));
              $forest_eco_nature_header_pint_new_tab = esc_attr(get_theme_mod('forest_eco_nature_header_pint_new_tab','true'));
              ?>
            <?php if( get_theme_mod( 'forest_eco_nature_facebook_url' ) != '') { ?>
              <a <?php if($forest_eco_nature_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_facebook_icon','fab fa-facebook-f')); ?>"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'forest_eco_nature_twitter_url' ) != '') { ?>
              <a <?php if($forest_eco_nature_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_twitter_icon','fab fa-twitter')); ?>"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'forest_eco_nature_instagram_url' ) != '') { ?>
              <a <?php if($forest_eco_nature_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_instagram_icon','fab fa-instagram')); ?>"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'forest_eco_nature_youtube_url' ) != '') { ?>
              <a <?php if($forest_eco_nature_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_youtube_icon','fab fa-youtube')); ?>"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'forest_eco_nature_pint_url' ) != '') { ?>
              <a <?php if($forest_eco_nature_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'forest_eco_nature_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_pinterest_icon','fab fa-pinterest')); ?>"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>