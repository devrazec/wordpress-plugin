<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function forest_eco_nature_register_recommended_plugins() {
	$plugins = array(
		array(
            'name'             => __( 'Advanced Appointment Booking & Scheduling', 'forest-eco-nature' ),
            'slug'             => 'advanced-appointment-booking-scheduling',
            'required'         => false,
            'force_activation' => false,
        ),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'forest_eco_nature_register_recommended_plugins' );
