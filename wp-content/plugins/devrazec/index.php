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

function devrazec_add_admin_menu() {
	add_menu_page(
		__( 'Devrazec', 'devrazec' ),  // Page title
		__( 'Devrazec', 'devrazec' ),  // Menu title
		'manage_options',              // Capability
		'devrazec',                    // Menu slug
		'devrazec_admin_page',         // Callback function
		'dashicons-admin-generic',     // Icon
		100                            // Position
	);
}
add_action( 'admin_menu', 'devrazec_add_admin_menu' );

// Register settings
function devrazec_register_settings() {
	register_setting( 'devrazec_settings_group', 'devrazec_textbox' );
	register_setting( 'devrazec_settings_group', 'devrazec_combobox' );
	register_setting( 'devrazec_settings_group', 'devrazec_checkbox' );
}
add_action( 'admin_init', 'devrazec_register_settings' );

// Admin page
function devrazec_admin_page() {
	?>
	<div class="wrap">
		<h1><?php _e( 'Welcome to Devrazec', 'devrazec' ); ?></h1>
		<p><?php _e( 'This is the Devrazec plugin admin page.', 'devrazec' ); ?></p>

		<form method="post" action="options.php">
			<?php settings_fields( 'devrazec_settings_group' ); ?>
			<?php do_settings_sections( 'devrazec_settings_group' ); ?>

			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'Textbox', 'devrazec' ); ?></th>
					<td>
						<input type="text" name="devrazec_textbox" value="<?php echo esc_attr( get_option( 'devrazec_textbox' ) ); ?>" />
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'Combobox', 'devrazec' ); ?></th>
					<td>
						<select name="devrazec_combobox">
							<option value="option1" <?php selected( get_option( 'devrazec_combobox' ), 'option1' ); ?>><?php _e( 'Option 1', 'devrazec' ); ?></option>
							<option value="option2" <?php selected( get_option( 'devrazec_combobox' ), 'option2' ); ?>><?php _e( 'Option 2', 'devrazec' ); ?></option>
							<option value="option3" <?php selected( get_option( 'devrazec_combobox' ), 'option3' ); ?>><?php _e( 'Option 3', 'devrazec' ); ?></option>
						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e( 'Checkbox', 'devrazec' ); ?></th>
					<td>
						<label>
							<input type="checkbox" name="devrazec_checkbox" value="1" <?php checked( get_option( 'devrazec_checkbox' ), 1 ); ?> />
							<?php _e( 'Enable feature', 'devrazec' ); ?>
						</label>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}