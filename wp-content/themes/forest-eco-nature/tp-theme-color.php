<?php

$forest_eco_nature_tp_theme_css = '';

//theme-color
$forest_eco_nature_tp_color_option = get_theme_mod('forest_eco_nature_tp_color_option');

// 1st color
$forest_eco_nature_tp_color_option = get_theme_mod('forest_eco_nature_tp_color_option', '#008D36');
if ($forest_eco_nature_tp_color_option) {
	$forest_eco_nature_tp_theme_css .= ':root {';
	$forest_eco_nature_tp_theme_css .= '--color-primary1: ' . esc_attr($forest_eco_nature_tp_color_option) . ';';
	$forest_eco_nature_tp_theme_css .= '}';
}

// second
$forest_eco_nature_tp_color_sec = get_theme_mod('forest_eco_nature_tp_color_sec');

$forest_eco_nature_tp_color_sec = get_theme_mod('forest_eco_nature_tp_color_sec', '#FFD40C');
if ($forest_eco_nature_tp_color_sec) {
	$forest_eco_nature_tp_theme_css .= ':root {';
	$forest_eco_nature_tp_theme_css .= '--color-primary2: ' . esc_attr($forest_eco_nature_tp_color_sec) . ';';
	$forest_eco_nature_tp_theme_css .= '}';
}

// footer-bg-color
$forest_eco_nature_tp_footer_bg_color_option = get_theme_mod('forest_eco_nature_tp_footer_bg_color_option');

if($forest_eco_nature_tp_footer_bg_color_option != false){
$forest_eco_nature_tp_theme_css .='#footer{';
	$forest_eco_nature_tp_theme_css .='background: '.esc_attr($forest_eco_nature_tp_footer_bg_color_option).' !important;';
$forest_eco_nature_tp_theme_css .='}';
}

// logo tagline color
$forest_eco_nature_site_tagline_color = get_theme_mod('forest_eco_nature_site_tagline_color');

if($forest_eco_nature_site_tagline_color != false){
$forest_eco_nature_tp_theme_css .='.logo h1 a, .logo p a{';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_site_tagline_color).';';
$forest_eco_nature_tp_theme_css .='}';
}

$forest_eco_nature_logo_tagline_color = get_theme_mod('forest_eco_nature_logo_tagline_color');
if($forest_eco_nature_logo_tagline_color != false){
$forest_eco_nature_tp_theme_css .='p.site-description{';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_logo_tagline_color).';';
$forest_eco_nature_tp_theme_css .='}';
}

// footer widget title color
$forest_eco_nature_footer_widget_title_color = get_theme_mod('forest_eco_nature_footer_widget_title_color');
if($forest_eco_nature_footer_widget_title_color != false){
$forest_eco_nature_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_footer_widget_title_color).';';
$forest_eco_nature_tp_theme_css .='}';
}

// copyright text color
$forest_eco_nature_footer_copyright_text_color = get_theme_mod('forest_eco_nature_footer_copyright_text_color');
if($forest_eco_nature_footer_copyright_text_color != false){
$forest_eco_nature_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_footer_copyright_text_color).';';
$forest_eco_nature_tp_theme_css .='}';
}

// header image title color
$forest_eco_nature_header_image_title_text_color = get_theme_mod('forest_eco_nature_header_image_title_text_color');
if($forest_eco_nature_header_image_title_text_color != false){
$forest_eco_nature_tp_theme_css .='.box-text h2{';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_header_image_title_text_color).';';
$forest_eco_nature_tp_theme_css .='}';
}

// menu color
$forest_eco_nature_menu_color = get_theme_mod('forest_eco_nature_menu_color');
if($forest_eco_nature_menu_color != false){
$forest_eco_nature_tp_theme_css .='.main-navigation a{';
$forest_eco_nature_tp_theme_css .='color: '.esc_attr($forest_eco_nature_menu_color).';';
$forest_eco_nature_tp_theme_css .='}';
}
