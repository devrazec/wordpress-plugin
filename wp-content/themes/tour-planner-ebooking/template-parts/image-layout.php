<?php
/**
 * The template part for displaying Image content
 *
 * @package tour-planner-ebooking
 * @subpackage tour-planner-ebooking
 * @since tour-planner-ebooking 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title();?></span></a></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php tour_planner_ebooking_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'tour-planner-ebooking' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'tour-planner-ebooking' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'tour-planner-ebooking' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'tour-planner-ebooking' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'tour-planner-ebooking' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'tour-planner-ebooking' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'tour-planner-ebooking' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
</article>