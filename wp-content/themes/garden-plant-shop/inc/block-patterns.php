<?php
/**
 * Block Patterns
 *
 * @package garden_plant_shop
 * @since 1.0
 */

function garden_plant_shop_register_block_patterns() {
	$garden_plant_shop_block_pattern_categories = array(
		'garden-plant-shop' => array( 'label' => esc_html__( 'Garden Plant Shop', 'garden-plant-shop' ) ),
		'pages' => array( 'label' => esc_html__( 'Pages', 'garden-plant-shop' ) ),
	);

	$garden_plant_shop_block_pattern_categories = apply_filters( 'garden_plant_shop_garden_plant_shop_block_pattern_categories', $garden_plant_shop_block_pattern_categories );

	foreach ( $garden_plant_shop_block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'garden_plant_shop_register_block_patterns', 9 );