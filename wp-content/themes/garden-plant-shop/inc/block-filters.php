<?php
/**
 * Block Filters
 *
 * @package garden_plant_shop
 * @since 1.0
 */

function garden_plant_shop_block_wrapper( $garden_plant_shop_block_content, $garden_plant_shop_block ) {

	if ( 'core/button' === $garden_plant_shop_block['blockName'] ) {
		
		if( isset( $garden_plant_shop_block['attrs']['className'] ) && strpos( $garden_plant_shop_block['attrs']['className'], 'has-arrow' ) ) {
			$garden_plant_shop_block_content = str_replace( '</a>', garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'caret-circle-right' ) ) ) . '</a>', $garden_plant_shop_block_content );
			return $garden_plant_shop_block_content;
		}
	}

	if( ! is_single() ) {
	
		if ( 'core/post-terms'  === $garden_plant_shop_block['blockName'] ) {
			if( 'post_tag' === $garden_plant_shop_block['attrs']['term'] ) {
				$garden_plant_shop_block_content = str_replace( '<div class="taxonomy-post_tag wp-block-post-terms">', '<div class="taxonomy-post_tag wp-block-post-terms flex">' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'tags' ) ) ), $garden_plant_shop_block_content );
			}

			if( 'category' ===  $garden_plant_shop_block['attrs']['term'] ) {
				$garden_plant_shop_block_content = str_replace( '<div class="taxonomy-category wp-block-post-terms">', '<div class="taxonomy-category wp-block-post-terms flex">' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'category' ) ) ), $garden_plant_shop_block_content );
			}
			return $garden_plant_shop_block_content;
		}
		if ( 'core/post-date' === $garden_plant_shop_block['blockName'] ) {
			$garden_plant_shop_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'calendar' ) ) ), $garden_plant_shop_block_content );
			return $garden_plant_shop_block_content;
		}
		if ( 'core/post-author' === $garden_plant_shop_block['blockName'] ) {
			$garden_plant_shop_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'user' ) ) ), $garden_plant_shop_block_content );
			return $garden_plant_shop_block_content;
		}
	}
	if( is_single() ){

		// Add chevron icon to the navigations
		if ( 'core/post-navigation-link' === $garden_plant_shop_block['blockName'] ) {
			if( isset( $garden_plant_shop_block['attrs']['type'] ) && 'previous' === $garden_plant_shop_block['attrs']['type'] ) {
				$garden_plant_shop_block_content = str_replace( '<span class="post-navigation-link__label">', '<span class="post-navigation-link__label">' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'prev' ) ) ), $garden_plant_shop_block_content );
			}
			else {
				$garden_plant_shop_block_content = str_replace( '<span class="post-navigation-link__label">Next Post', '<span class="post-navigation-link__label">Next Post' . garden_plant_shop_get_svg( array( 'icon' => esc_attr( 'next' ) ) ), $garden_plant_shop_block_content );
			}
			return $garden_plant_shop_block_content;
		}
		if ( 'core/post-date' === $garden_plant_shop_block['blockName'] ) {
            $garden_plant_shop_block_content = str_replace( '<div class="wp-block-post-date">', '<div class="wp-block-post-date flex">' . garden_plant_shop_get_svg( array( 'icon' => 'calendar' ) ), $garden_plant_shop_block_content );
            return $garden_plant_shop_block_content;
        }
		if ( 'core/post-author' === $garden_plant_shop_block['blockName'] ) {
            $garden_plant_shop_block_content = str_replace( '<div class="wp-block-post-author">', '<div class="wp-block-post-author flex">' . garden_plant_shop_get_svg( array( 'icon' => 'user' ) ), $garden_plant_shop_block_content );
            return $garden_plant_shop_block_content;
        }

	}
    return $garden_plant_shop_block_content;
}
	
add_filter( 'render_block', 'garden_plant_shop_block_wrapper', 10, 2 );
