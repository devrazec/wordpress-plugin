<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Expert Gardener
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function expert_gardener_sanitize_checkbox( $expert_gardener_checked ) {
	return ( ( isset( $expert_gardener_checked ) && true == $expert_gardener_checked ) ? true : false );
}

/* Sanitization Text*/
function expert_gardener_sanitize_text( $expert_gardener_text ) {
	return wp_filter_post_kses( $expert_gardener_text );
}

function expert_gardener_sanitize_dropdown_pages( $expert_gardener_page_id, $expert_gardener_setting ) {
  // Ensure $expert_gardener_input is an absolute integer.
  $expert_gardener_page_id = absint( $expert_gardener_page_id );
  // If $expert_gardener_page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $expert_gardener_page_id ) ? $expert_gardener_page_id : $expert_gardener_setting->default );
}

function expert_gardener_sanitize_phone_number( $expert_gardener_phone ) {
  return preg_replace( '/[^\d+]/', '', $expert_gardener_phone );
}

function expert_gardener_sanitize_select( $expert_gardener_input, $expert_gardener_setting ) {
  $expert_gardener_input = sanitize_key( $expert_gardener_input );
  $expert_gardener_choices = $expert_gardener_setting->manager->get_control( $expert_gardener_setting->id )->choices;
  return ( array_key_exists( $expert_gardener_input, $expert_gardener_choices ) ? $expert_gardener_input : $expert_gardener_setting->default );
}

// Sanitize the input
function expert_gardener_sanitize_sidebar_position( $expert_gardener_input ) {
    $expert_gardener_valid = array( 'right', 'left' );

    if ( in_array( $expert_gardener_input, $expert_gardener_valid ) ) {
        return $expert_gardener_input;
    } else {
        return 'right';
    }
}

function expert_gardener_sanitize_copyright_position( $expert_gardener_input ) {
    $expert_gardener_valid = array( 'right', 'left', 'center' );

    if ( in_array( $expert_gardener_input, $expert_gardener_valid, true ) ) {
        return $expert_gardener_input;
    } else {
        return 'right';
    }
}

function expert_gardener_sanitize_choices( $expert_gardener_input, $expert_gardener_setting ) {
    global $wp_customize; 
    $expert_gardener_control = $wp_customize->get_control( $expert_gardener_setting->id ); 
    if ( array_key_exists( $expert_gardener_input, $expert_gardener_control->choices ) ) {
        return $expert_gardener_input;
    } else {
        return $expert_gardener_setting->default;
    }
}

// Sanitization callback function for logo width
function expert_gardener_sanitize_logo_width($expert_gardener_input) {
    $expert_gardener_input = absint($expert_gardener_input); // Convert to integer
    // Ensure the value is between 1 and 150
    return ($expert_gardener_input >= 1 && $expert_gardener_input <= 300) ? $expert_gardener_input : 150; // Default to 270 if out of range
}