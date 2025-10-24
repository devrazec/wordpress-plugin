<?php
/**
 * Render homepage sections.
 */
function landscape_gardening_homepage_sections() {
	$landscape_gardening_homepage_sections = array_keys( landscape_gardening_get_homepage_sections() );

	foreach ( $landscape_gardening_homepage_sections as $landscape_gardening_section ) {
		require get_template_directory() . '/sections/' . $landscape_gardening_section . '.php';
	}
}