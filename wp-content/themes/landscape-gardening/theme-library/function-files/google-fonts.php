<?php
function landscape_gardening_get_all_google_fonts() {
    $landscape_gardening_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $landscape_gardening_webfonts_json ) ) {
        return array();
    }

    $landscape_gardening_fonts_json_data = file_get_contents( $landscape_gardening_webfonts_json );
    if ( false === $landscape_gardening_fonts_json_data ) {
        return array();
    }

    $landscape_gardening_all_fonts = json_decode( $landscape_gardening_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $landscape_gardening_google_fonts = array();
    foreach ( $landscape_gardening_all_fonts as $landscape_gardening_font ) {
        $landscape_gardening_google_fonts[ $landscape_gardening_font['family'] ] = array(
            'family'   => $landscape_gardening_font['family'],
            'variants' => $landscape_gardening_font['variants'],
        );
    }
    return $landscape_gardening_google_fonts;
}


function landscape_gardening_get_all_google_font_families() {
    $landscape_gardening_google_fonts  = landscape_gardening_get_all_google_fonts();
    $landscape_gardening_font_families = array();
    foreach ( $landscape_gardening_google_fonts as $landscape_gardening_font ) {
        $landscape_gardening_font_families[ $landscape_gardening_font['family'] ] = $landscape_gardening_font['family'];
    }
    return $landscape_gardening_font_families;
}

function landscape_gardening_get_fonts_url() {
    $landscape_gardening_fonts_url = '';
    $landscape_gardening_fonts     = array();

    $landscape_gardening_all_fonts = landscape_gardening_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'landscape_gardening_site_title_font', 'REM' ) ) ) {
        $landscape_gardening_fonts[] = get_theme_mod( 'landscape_gardening_site_title_font', 'REM' );
    }

    if ( ! empty( get_theme_mod( 'landscape_gardening_site_description_font', 'Plus Jakarta Sans' ) ) ) {
        $landscape_gardening_fonts[] = get_theme_mod( 'landscape_gardening_site_description_font', 'Plus Jakarta Sans' );
    }

    if ( ! empty( get_theme_mod( 'landscape_gardening_header_font', 'REM' ) ) ) {
        $landscape_gardening_fonts[] = get_theme_mod( 'landscape_gardening_header_font', 'REM' );
    }

    if ( ! empty( get_theme_mod( 'landscape_gardening_content_font', 'Plus Jakarta Sans' ) ) ) {
        $landscape_gardening_fonts[] = get_theme_mod( 'landscape_gardening_content_font', 'Plus Jakarta Sans' );
    }

    $landscape_gardening_fonts = array_unique( $landscape_gardening_fonts );

    foreach ( $landscape_gardening_fonts as $landscape_gardening_font ) {
        $landscape_gardening_variants      = $landscape_gardening_all_fonts[ $landscape_gardening_font ]['variants'];
        $landscape_gardening_font_family[] = $landscape_gardening_font . ':' . implode( ',', $landscape_gardening_variants );
    }

    $landscape_gardening_query_args = array(
        'family' => urlencode( implode( '|', $landscape_gardening_font_family ) ),
    );

    if ( ! empty( $landscape_gardening_font_family ) ) {
        $landscape_gardening_fonts_url = add_query_arg( $landscape_gardening_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $landscape_gardening_fonts_url;
}