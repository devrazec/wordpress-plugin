<?php

$forest_eco_nature_post_args = array(
    'posts_per_page'    => get_theme_mod( 'forest_eco_nature_related_post_per_page', 3 ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$forest_eco_nature_number_of_post_columns = get_theme_mod('forest_eco_nature_related_post_per_columns', 3);

$forest_eco_nature_col_lg_post_class = 'col-lg-' . (12 / $forest_eco_nature_number_of_post_columns);

$forest_eco_nature_related = wp_get_post_terms( get_the_ID(), 'category' );
$forest_eco_nature_ids = array();
foreach( $forest_eco_nature_related as $term ) {
    $forest_eco_nature_ids[] = $term->term_id;
}

$forest_eco_nature_post_args['category__in'] = $forest_eco_nature_ids; 

$forest_eco_nature_related_posts = new WP_Query( $forest_eco_nature_post_args );

if ( $forest_eco_nature_related_posts->have_posts() ) : ?>
        <div class="related-post-block">
        <h3 class="text-center mb-3"><?php echo esc_html(get_theme_mod('forest_eco_nature_related_post_heading',__('Related Posts','forest-eco-nature')));?></h3>
        <div class="row">
            <?php while ( $forest_eco_nature_related_posts->have_posts() ) : $forest_eco_nature_related_posts->the_post(); ?>
                <div class="<?php echo esc_attr($forest_eco_nature_col_lg_post_class); ?> col-md-6">
                    <div id="category-post">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="page-box">
                                <?php if(has_post_thumbnail()) { ?>
                                        <?php the_post_thumbnail();  ?>    
                                <?php } ?>
                                <div class="box-content text-start">
                                    <h4 class="text-start py-2"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
                                    
                                    <p><?php echo wp_trim_words(get_the_content(), get_theme_mod('forest_eco_nature_excerpt_count',10) );?></p>
                                    <?php if(get_theme_mod('forest_eco_nature_remove_read_button',true) != ''){ ?>
                                    <div class="readmore-btn text-start mb-1">
                                        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'forest-eco-nature' ); ?>"><?php echo esc_html(get_theme_mod('forest_eco_nature_read_more_text',__('Read More','forest-eco-nature')));?></a>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </article>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();