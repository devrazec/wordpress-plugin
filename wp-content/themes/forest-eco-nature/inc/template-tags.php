<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Forest Eco Nature
 * @subpackage forest_eco_nature
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function forest_eco_nature_categorized_blog() {
	$forest_eco_nature_category_count = get_transient( 'forest_eco_nature_categories' );

	if ( false === $forest_eco_nature_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$forest_eco_nature_category_count = forest_eco_nature_count( $categories );

		set_transient( 'forest_eco_nature_categories', $forest_eco_nature_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $forest_eco_nature_category_count > 1;
}

if ( ! function_exists( 'forest_eco_nature_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since forest_eco_nature
 */
function forest_eco_nature_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in forest_eco_nature_categorized_blog.
 */
function forest_eco_nature_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'forest_eco_nature_categories' );
}
add_action( 'edit_category', 'forest_eco_nature_category_transient_flusher' );
add_action( 'save_post',     'forest_eco_nature_category_transient_flusher' );