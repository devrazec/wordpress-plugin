<?php
/**
 * @package Devrazec
 * @version 1.0.0
 */
/*
Plugin Name: Devrazec
Plugin URI: https://devrazec.com/
Description: This is just a plugin.
Author: Cezar Souza
Version: 1.0.0
*/

if	( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function devrazec_plugin_init() {
	// Plugin initialization code can go here.
}

add_action( 'plugins_loaded', 'devrazec_plugin_init' );

function devrazec_plugin_activate() {
	// Code to run on plugin activation can go here.
}

register_activation_hook( __FILE__, 'devrazec_plugin_activate' );

function devrazec_plugin_deactivate() {
	// Code to run on plugin deactivation can go here.
}

register_deactivation_hook( __FILE__, 'devrazec_plugin_deactivate' );
function devrazec_plugin_admin_notice() {
	?>
	<div class="notice notice-success is-dismissible">
		<p><?php _e( 'Devrazec plugin is activated!', 'devrazec' ); ?></p>
	</div>
	<?php
}