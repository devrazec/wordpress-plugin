<?php
/**
 * Active Callbacks
 *
 * @package landscape_gardening
 */

// Theme Options.
function landscape_gardening_is_pagination_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_enable_pagination' )->value() );
}
function landscape_gardening_is_breadcrumb_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_enable_breadcrumb' )->value() );
}
function landscape_gardening_is_layout_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_website_layout' )->value() );
}
function landscape_gardening_is_pagetitle_bcakground_image_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_page_header_style' )->value() );
}
function landscape_gardening_is_preloader_style( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_enable_preloader' )->value() );
}

// Banner Slider Section.
function landscape_gardening_is_banner_slider_section_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_enable_banner_section' )->value() );
}
function landscape_gardening_is_banner_slider_section_and_content_type_post_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_banner_slider_content_type' )->value();
	return ( landscape_gardening_is_banner_slider_section_enabled( $landscape_gardening_control ) && ( 'post' === $landscape_gardening_content_type ) );
}
function landscape_gardening_is_banner_slider_section_and_content_type_page_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_banner_slider_content_type' )->value();
	return ( landscape_gardening_is_banner_slider_section_enabled( $landscape_gardening_control ) && ( 'page' === $landscape_gardening_content_type ) );
}

// Service section.
function landscape_gardening_is_post_tab_section_and_content_type_page_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_banner_slider_content_type' )->value();
	return ( landscape_gardening_is_banner_slider_section_enabled( $landscape_gardening_control ) && ( 'page' === $landscape_gardening_content_type ) );
}
function landscape_gardening_is_post_tab_section_and_content_type_post_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_banner_slider_content_type' )->value();
	return ( landscape_gardening_is_banner_slider_section_enabled( $landscape_gardening_control ) && ( 'post' === $landscape_gardening_content_type ) );
}
function landscape_gardening_is_service_section_enabled( $landscape_gardening_control ) {
	return ( $landscape_gardening_control->manager->get_setting( 'landscape_gardening_enable_service_section' )->value() );
}
function landscape_gardening_is_service_section_and_content_type_post_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_service_content_type' )->value();
	return ( landscape_gardening_is_service_section_enabled( $landscape_gardening_control ) && ( 'post' === $landscape_gardening_content_type ) );
}
function landscape_gardening_is_service_section_and_content_type_page_enabled( $landscape_gardening_control ) {
	$landscape_gardening_content_type = $landscape_gardening_control->manager->get_setting( 'landscape_gardening_service_content_type' )->value();
	return ( landscape_gardening_is_service_section_enabled( $landscape_gardening_control ) && ( 'page' === $landscape_gardening_content_type ) );
}