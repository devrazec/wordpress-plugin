<?php
/**
 * Template part for displaying service section
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

?>
<?php $forest_eco_nature_static_image= get_template_directory_uri() . '/assets/images/about-img
.png'; ?>
<?php $forest_eco_nature_researve_background_image= get_theme_mod('forest_eco_nature_researve_background_image'); ?>
<?php if( get_theme_mod( 'forest_eco_nature_service_enable',true ) != '') { ?>
<section id="service" class="py-5" style="background-image: url(<?php echo esc_url($forest_eco_nature_researve_background_image); ?>); ">
  <div class="container">
  	<div class="row">
  		<div class="col-lg-8 col-md-8 col-sm-6 align-self-center">
  				<div class="match-heading">
			  		<?php if( get_theme_mod( 'forest_eco_nature_service_sub_heading' ) != '') { ?>
				        <p class="mb-3"><?php echo esc_html(get_theme_mod('forest_eco_nature_service_sub_heading')); ?></p>
				     <?php }?>
			  		<?php if( get_theme_mod( 'forest_eco_nature_service_heading' ) != '') { ?>
				        <h2><?php echo esc_html(get_theme_mod('forest_eco_nature_service_heading')); ?></h2>
				     <?php }?>
  				</div>
  				<?php 
          for($forest_eco_nature_i=1; $forest_eco_nature_i<=3; $forest_eco_nature_i++ ) {?>
          	<div class="tab-details">
          		<div class="row mt-3">
  					<div class="col-lg-2 col-md-2 col-sm-4 pl-md-2 align-self-center">
  					<?php if( get_theme_mod( 'forest_eco_nature_tab_icon'.$forest_eco_nature_i ) != '') { ?>
  						<i class="<?php echo esc_attr(get_theme_mod('forest_eco_nature_tab_icon'.$forest_eco_nature_i)); ?>"></i>
  					<?php } ?>
  					</div>
  					<div class="col-lg-10 col-md-10 col-sm-8 px-lg-0 align-self-center">
  						<h3><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('forest_eco_nature_tab_heading'.$forest_eco_nature_i)); ?></a></h3>
  						<p class="mb-0 serv-text"><?php echo esc_html(get_theme_mod('forest_eco_nature_tab_para'.$forest_eco_nature_i)); ?></p>
  					</div>
  				</div>
          	</div>
	  			<?php } ?>
  		</div>
  		<div class="col-lg-4 col-md-4 col-sm-6 align-self-center">
				<?php $forest_eco_nature_about_page = array();
	        $forest_eco_nature_mod = absint( get_theme_mod( 'forest_eco_nature_about_page' ));
	        if ( 'page-none-selected' != $forest_eco_nature_mod ) {
	          $forest_eco_nature_about_page[] = $forest_eco_nature_mod;
	        }
		      if( !empty($forest_eco_nature_about_page) ) :
		        $forest_eco_nature_args = array(
		          'post_type' => 'page',
		          'post__in' => $forest_eco_nature_about_page,
		          'orderby' => 'post__in'
		        );
	        $forest_eco_nature_query = new WP_Query( $forest_eco_nature_args );
        	if ( $forest_eco_nature_query->have_posts() ) :
          	while ( $forest_eco_nature_query->have_posts() ) : $forest_eco_nature_query->the_post(); ?>
          	<div class="about-block position-relative">
              <div class="about-image1">
                <?php the_post_thumbnail(); ?>
                <div class="image-bg"></div>
                <div class="border-bg"></div>
              </div>
	            <div class="about_btn">
		            <div class="circular-button">
		              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','forest-eco-nature'); ?></a>
		            </div>
	   			 </div>
          </div>
          <?php endwhile; ?>
        	<?php else : ?>
          <div class="no-postfound"></div>
        	<?php endif;
      		endif;
      			wp_reset_postdata();?>
      		<div class="clearfix"></div>
			</div>
    	</div>
    </div>
</section>
<?php }?>