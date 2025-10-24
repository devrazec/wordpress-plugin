<?php
function landscape_gardening_sanitize_select( $landscape_gardening_input, $landscape_gardening_setting ) {
	$landscape_gardening_input = sanitize_key( $landscape_gardening_input );
	$landscape_gardening_choices = $landscape_gardening_setting->manager->get_control( $landscape_gardening_setting->id )->choices;
	return ( array_key_exists( $landscape_gardening_input, $landscape_gardening_choices ) ? $landscape_gardening_input : $landscape_gardening_setting->default );
}

function landscape_gardening_sanitize_switch( $landscape_gardening_input ) {
	if ( true === $landscape_gardening_input ) {
		return true;
	} else {
		return false;
	}
}

function landscape_gardening_sanitize_google_fonts( $landscape_gardening_input, $landscape_gardening_setting ) {
	$landscape_gardening_choices = $landscape_gardening_setting->manager->get_control( $landscape_gardening_setting->id )->choices;
	return ( array_key_exists( $landscape_gardening_input, $landscape_gardening_choices ) ? $landscape_gardening_input : $landscape_gardening_setting->default );
}
/**
 * Sanitize HTML input.
 *
 * @param string $landscape_gardening_input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function landscape_gardening_sanitize_html( $landscape_gardening_input ) {
    return wp_kses_post( $landscape_gardening_input );
}

/**
 * Sanitize URL input.
 *
 * @param string $landscape_gardening_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function landscape_gardening_sanitize_url( $landscape_gardening_input ) {
    return esc_url_raw( $landscape_gardening_input );
}

// Sanitize Scroll Top Position
function landscape_gardening_sanitize_scroll_top_position( $landscape_gardening_input ) {
    $valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $landscape_gardening_input, $valid_positions ) ) {
        return $landscape_gardening_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function landscape_gardening_sanitize_choices( $landscape_gardening_input, $landscape_gardening_setting ) {
	global $wp_customize; 
	$control = $wp_customize->get_control( $landscape_gardening_setting->id ); 
	if ( array_key_exists( $landscape_gardening_input, $control->choices ) ) {
		return $landscape_gardening_input;
	} else {
		return $landscape_gardening_setting->default;
	}
}

function landscape_gardening_sanitize_range_value( $landscape_gardening_number, $landscape_gardening_setting ) {

	// Ensure input is an absolute integer.
	$landscape_gardening_number = absint( $landscape_gardening_number );

	// Get the input attributes associated with the setting.
	$landscape_gardening_atts = $landscape_gardening_setting->manager->get_control( $landscape_gardening_setting->id )->input_attrs;

	// Get minimum number in the range.
	$landscape_gardening_min = ( isset( $landscape_gardening_atts['min'] ) ? $landscape_gardening_atts['min'] : $landscape_gardening_number );

	// Get maximum number in the range.
	$landscape_gardening_max = ( isset( $landscape_gardening_atts['max'] ) ? $landscape_gardening_atts['max'] : $landscape_gardening_number );

	// Get step.
	$landscape_gardening_step = ( isset( $landscape_gardening_atts['step'] ) ? $landscape_gardening_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $landscape_gardening_min <= $landscape_gardening_number && $landscape_gardening_number <= $landscape_gardening_max && is_int( $landscape_gardening_number / $landscape_gardening_step ) ? $landscape_gardening_number : $landscape_gardening_setting->default );
}