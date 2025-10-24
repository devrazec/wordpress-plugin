<?php
/**
 * Block Styles
 *
 * @package garden_plant_shop
 * @since 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	function garden_plant_shop_register_block_styles() {

		//Wp Block Padding Zero
		register_block_style(
			'core/group',
			array(
				'name'  => 'garden-plant-shop-padding-0',
				'label' => esc_html__( 'No Padding', 'garden-plant-shop' ),
			)
		);

		//Wp Block Post Author Style
		register_block_style(
			'core/post-author',
			array(
				'name'  => 'garden-plant-shop-post-author-card',
				'label' => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);

		//Wp Block Button Style
		register_block_style(
			'core/button',
			array(
				'name'         => 'garden-plant-shop-button',
				'label'        => esc_html__( 'Plain', 'garden-plant-shop' ),
			)
		);

		//Post Comments Style
		register_block_style(
			'core/post-comments',
			array(
				'name'         => 'garden-plant-shop-post-comments',
				'label'        => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);

		//Latest Comments Style
		register_block_style(
			'core/latest-comments',
			array(
				'name'         => 'garden-plant-shop-latest-comments',
				'label'        => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);


		//Wp Block Table Style
		register_block_style(
			'core/table',
			array(
				'name'         => 'garden-plant-shop-wp-table',
				'label'        => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);


		//Wp Block Pre Style
		register_block_style(
			'core/preformatted',
			array(
				'name'         => 'garden-plant-shop-wp-preformatted',
				'label'        => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);

		//Wp Block Verse Style
		register_block_style(
			'core/verse',
			array(
				'name'         => 'garden-plant-shop-wp-verse',
				'label'        => esc_html__( 'Theme Style', 'garden-plant-shop' ),
			)
		);
	}
	add_action( 'init', 'garden_plant_shop_register_block_styles' );
}
