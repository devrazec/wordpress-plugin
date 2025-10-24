<?php
/**
 * Dynamic CSS
 */
function landscape_gardening_dynamic_css() {
	$landscape_gardening_primary_color = get_theme_mod( 'primary_color', '#0B3D2C' );

	$landscape_gardening_site_title_font       = get_theme_mod( 'landscape_gardening_site_title_font', 'REM' );
	$landscape_gardening_site_description_font = get_theme_mod( 'landscape_gardening_site_description_font', 'Plus Jakarta Sans' );
	$landscape_gardening_header_font           = get_theme_mod( 'landscape_gardening_header_font', 'REM' );
	$landscape_gardening_content_font          = get_theme_mod( 'landscape_gardening_content_font', 'Plus Jakarta Sans' );

	// Enqueue Google Fonts
	$landscape_gardening_fonts_url = landscape_gardening_get_fonts_url();
	if ( ! empty( $landscape_gardening_fonts_url ) ) {
		wp_enqueue_style( 'landscape-gardening-google-fonts', esc_url( $landscape_gardening_fonts_url ), array(), null );
	}

	$landscape_gardening_custom_css  = '';
	$landscape_gardening_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $landscape_gardening_primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$landscape_gardening_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $landscape_gardening_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $landscape_gardening_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $landscape_gardening_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $landscape_gardening_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $landscape_gardening_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'landscape-gardening-style', $landscape_gardening_custom_css );
}
add_action( 'wp_enqueue_scripts', 'landscape_gardening_dynamic_css', 99 );