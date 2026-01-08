<?php
/**
 * The template for displaying image attachments.
 *
 * @package tour-planner-ebooking
 */

get_header(); ?>

<main role="main" id="maincontent" class="our-services">
    <div class="innerlightbox">
        <div class="container">
            <?php
            $tour_planner_ebooking_left_right = get_theme_mod( 'tour_planner_ebooking_layout_options','Right Sidebar');
            if($tour_planner_ebooking_left_right == 'Left Sidebar'){ ?>
                <div class="row m-0">
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                          while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/image-layout' ); 
                          endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                          endif; 
                        ?> 
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>               
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                </div>
            <?php }else if($tour_planner_ebooking_left_right == 'Right Sidebar'){ ?>
                <div class="row m-0">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/image-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>               
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else if($tour_planner_ebooking_left_right == 'One Column'){ ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                        the_archive_title( '<h2 class="page-title">', '</h2>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/image-layout' ); 
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                    <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>               
                        <div class="navigation">
                            <?php tour_planner_ebooking_pagination_type(); ?>
                        </div>
                    <?php } ?> 
                </div>
            <?php }else if($tour_planner_ebooking_left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3 mt-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 col-md-6'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/image-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>                
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div> 
                        <?php } ?>
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3 mt-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($tour_planner_ebooking_left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-lg-3 col-md-3 mt-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-3 col-md-3'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/image-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>                
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div> 
                        <?php } ?> 
                    </div>
                    <div id="sidebar" class="col-lg-3 col-md-3 mt-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-lg-3 col-md-3 mt-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($tour_planner_ebooking_left_right == 'Grid Layout'){ ?>
                <div class="row m-0">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/image-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>               
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row m-0">
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>
                        <?php
                            the_archive_title( '<h2 class="page-title">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/image-layout' ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <?php if( get_theme_mod( 'tour_planner_ebooking_blog_post_pagination',true) != '') { ?>               
                            <div class="navigation">
                                <?php tour_planner_ebooking_pagination_type(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }?>
            <div class="clearfix"></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>