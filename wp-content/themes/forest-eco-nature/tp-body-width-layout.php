<?php

	$forest_eco_nature_tp_theme_css = "";

$forest_eco_nature_theme_lay = get_theme_mod( 'forest_eco_nature_tp_body_layout_settings','Full');
if($forest_eco_nature_theme_lay == 'Container'){
$forest_eco_nature_tp_theme_css .='body{';
	$forest_eco_nature_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$forest_eco_nature_tp_theme_css .='}';
$forest_eco_nature_tp_theme_css .='@media screen and (max-width:575px){';
		$forest_eco_nature_tp_theme_css .='body{';
			$forest_eco_nature_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$forest_eco_nature_tp_theme_css .='} }';
$forest_eco_nature_tp_theme_css .='.page-template-front-page .menubar{';
	$forest_eco_nature_tp_theme_css .='position: static;';
$forest_eco_nature_tp_theme_css .='}';
$forest_eco_nature_tp_theme_css .='.scrolled{';
	$forest_eco_nature_tp_theme_css .='width: auto; left:0; right:0;';
$forest_eco_nature_tp_theme_css .='}';
}else if($forest_eco_nature_theme_lay == 'Container Fluid'){
$forest_eco_nature_tp_theme_css .='body{';
	$forest_eco_nature_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$forest_eco_nature_tp_theme_css .='}';
$forest_eco_nature_tp_theme_css .='@media screen and (max-width:575px){';
		$forest_eco_nature_tp_theme_css .='body{';
			$forest_eco_nature_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$forest_eco_nature_tp_theme_css .='} }';
$forest_eco_nature_tp_theme_css .='.page-template-front-page .menubar{';
	$forest_eco_nature_tp_theme_css .='width: 99%';
$forest_eco_nature_tp_theme_css .='}';		
$forest_eco_nature_tp_theme_css .='.scrolled{';
	$forest_eco_nature_tp_theme_css .='width: auto; left:0; right:0;';
$forest_eco_nature_tp_theme_css .='}';
}else if($forest_eco_nature_theme_lay == 'Full'){
$forest_eco_nature_tp_theme_css .='body{';
	$forest_eco_nature_tp_theme_css .='max-width: 100%;';
$forest_eco_nature_tp_theme_css .='}';
}

$forest_eco_nature_scroll_position = get_theme_mod( 'forest_eco_nature_scroll_top_position','Right');
if($forest_eco_nature_scroll_position == 'Right'){
$forest_eco_nature_tp_theme_css .='#return-to-top{';
    $forest_eco_nature_tp_theme_css .='right: 20px;';
$forest_eco_nature_tp_theme_css .='}';
}else if($forest_eco_nature_scroll_position == 'Left'){
$forest_eco_nature_tp_theme_css .='#return-to-top{';
    $forest_eco_nature_tp_theme_css .='left: 20px;';
$forest_eco_nature_tp_theme_css .='}';
}else if($forest_eco_nature_scroll_position == 'Center'){
$forest_eco_nature_tp_theme_css .='#return-to-top{';
    $forest_eco_nature_tp_theme_css .='right: 50%;left: 50%;';
$forest_eco_nature_tp_theme_css .='}';
}

    
//Social icon Font size
$forest_eco_nature_social_icon_fontsize = get_theme_mod('forest_eco_nature_social_icon_fontsize');
	$forest_eco_nature_tp_theme_css .='.media-links a i{';
$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_social_icon_fontsize).'px;';
$forest_eco_nature_tp_theme_css .='}';

// site title font size option
$forest_eco_nature_site_title_font_size = get_theme_mod('forest_eco_nature_site_title_font_size', 25);{
$forest_eco_nature_tp_theme_css .='.logo h1 , .logo p a{';
	$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_site_title_font_size).'px;';
$forest_eco_nature_tp_theme_css .='}';
}

//site tagline font size option
$forest_eco_nature_site_tagline_font_size = get_theme_mod('forest_eco_nature_site_tagline_font_size', 15);{
$forest_eco_nature_tp_theme_css .='.logo p{';
	$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_site_tagline_font_size).'px;';
$forest_eco_nature_tp_theme_css .='}';
}

// related post
$forest_eco_nature_related_post_mob = get_theme_mod('forest_eco_nature_related_post_mob', true);
$forest_eco_nature_related_post = get_theme_mod('forest_eco_nature_remove_related_post', true);
$forest_eco_nature_tp_theme_css .= '.related-post-block {';
if ($forest_eco_nature_related_post == false) {
    $forest_eco_nature_tp_theme_css .= 'display: none;';
}
$forest_eco_nature_tp_theme_css .= '}';
$forest_eco_nature_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($forest_eco_nature_related_post == false || $forest_eco_nature_related_post_mob == false) {
    $forest_eco_nature_tp_theme_css .= '.related-post-block { display: none; }';
}
$forest_eco_nature_tp_theme_css .= '}';

// slider btn
$forest_eco_nature_slider_buttom_mob = get_theme_mod('forest_eco_nature_slider_buttom_mob', true);
$forest_eco_nature_slider_button = get_theme_mod('forest_eco_nature_slider_button', true);
$forest_eco_nature_tp_theme_css .= '#slider .more-btn {';
if ($forest_eco_nature_slider_button == false) {
    $forest_eco_nature_tp_theme_css .= 'display: none;';
}
$forest_eco_nature_tp_theme_css .= '}';
$forest_eco_nature_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($forest_eco_nature_slider_button == false || $forest_eco_nature_slider_buttom_mob == false) {
    $forest_eco_nature_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$forest_eco_nature_tp_theme_css .= '}';

//return to header mobile				
$forest_eco_nature_return_to_header_mob = get_theme_mod('forest_eco_nature_return_to_header_mob', true);
$forest_eco_nature_return_to_header = get_theme_mod('forest_eco_nature_return_to_header', true);
$forest_eco_nature_tp_theme_css .= '.return-to-header{';
if ($forest_eco_nature_return_to_header == false) {
    $forest_eco_nature_tp_theme_css .= 'display: none;';
}
$forest_eco_nature_tp_theme_css .= '}';
$forest_eco_nature_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($forest_eco_nature_return_to_header == false || $forest_eco_nature_return_to_header_mob == false) {
    $forest_eco_nature_tp_theme_css .= '.return-to-header{ display: none; }';
}
$forest_eco_nature_tp_theme_css .= '}';

//blog description              
$forest_eco_nature_mobile_blog_description = get_theme_mod('forest_eco_nature_mobile_blog_description', true);
$forest_eco_nature_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($forest_eco_nature_mobile_blog_description == false) {
    $forest_eco_nature_tp_theme_css .= '.blog-description{ display: none; }';
}
$forest_eco_nature_tp_theme_css .= '}';

//footer image
$forest_eco_nature_footer_widget_image = get_theme_mod('forest_eco_nature_footer_widget_image');
if($forest_eco_nature_footer_widget_image != false){
$forest_eco_nature_tp_theme_css .='#footer{';
	$forest_eco_nature_tp_theme_css .='background: url('.esc_attr($forest_eco_nature_footer_widget_image).');';
$forest_eco_nature_tp_theme_css .='}';
}

// related product
$forest_eco_nature_related_product = get_theme_mod('forest_eco_nature_related_product',true);
if($forest_eco_nature_related_product == false){
$forest_eco_nature_tp_theme_css .='.related.products{';
	$forest_eco_nature_tp_theme_css .='display: none;';
$forest_eco_nature_tp_theme_css .='}';
}

//menu font size
$forest_eco_nature_menu_font_size = get_theme_mod('forest_eco_nature_menu_font_size', 14);{
$forest_eco_nature_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_menu_font_size).'px;';
$forest_eco_nature_tp_theme_css .='}';
}

// menu text tranform
$forest_eco_nature_menu_text_tranform = get_theme_mod( 'forest_eco_nature_menu_text_tranform','capitalize');
if($forest_eco_nature_menu_text_tranform == 'Uppercase'){
$forest_eco_nature_tp_theme_css .='.main-navigation a {';
	$forest_eco_nature_tp_theme_css .='text-transform: uppercase;';
$forest_eco_nature_tp_theme_css .='}';
}else if($forest_eco_nature_menu_text_tranform == 'Lowercase'){
$forest_eco_nature_tp_theme_css .='.main-navigation a {';
	$forest_eco_nature_tp_theme_css .='text-transform: lowercase;';
$forest_eco_nature_tp_theme_css .='}';
}
else if($forest_eco_nature_menu_text_tranform == 'Capitalize'){
$forest_eco_nature_tp_theme_css .='.main-navigation a {';
	$forest_eco_nature_tp_theme_css .='text-transform: capitalize;';
$forest_eco_nature_tp_theme_css .='}';
}

// Font Family
$forest_eco_nature_body_font_family = get_theme_mod('forest_eco_nature_body_font_family', '');
$forest_eco_nature_heading_font_family = get_theme_mod('forest_eco_nature_heading_font_family', '');
$forest_eco_nature_menu_font_family = get_theme_mod('forest_eco_nature_menu_font_family', '');

$forest_eco_nature_tp_theme_css .= 'body {
    font-family: ' . esc_html($forest_eco_nature_body_font_family) . ';
}
.more-btn a {
    font-family: ' . esc_html($forest_eco_nature_body_font_family) . ';
}
h1, h2, h3, h4, h5, h6, #theme-sidebar .wp-block-search .wp-block-search__label {
    font-family: ' . esc_html($forest_eco_nature_heading_font_family) . ';
}
.menubar, .main-navigation a {
    font-family: ' . esc_html($forest_eco_nature_menu_font_family) . ';
}';


// for header
$forest_eco_nature_slider_arrows = get_theme_mod('forest_eco_nature_slider_arrows',true);
if($forest_eco_nature_slider_arrows == false){
$forest_eco_nature_tp_theme_css .='.header-box{';
	$forest_eco_nature_tp_theme_css .='posititon:static !important;';
$forest_eco_nature_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
	$forest_eco_nature_post_image_round = get_theme_mod('forest_eco_nature_post_image_round', 0);
	if($forest_eco_nature_post_image_round != false){
		$forest_eco_nature_tp_theme_css .='.blog .box-image img{';
			$forest_eco_nature_tp_theme_css .='border-radius: '.esc_attr($forest_eco_nature_post_image_round).'px;';
		$forest_eco_nature_tp_theme_css .='}';
	}

	$forest_eco_nature_post_image_width = get_theme_mod('forest_eco_nature_post_image_width', '');
	if($forest_eco_nature_post_image_width != false){
		$forest_eco_nature_tp_theme_css .='.blog .box-image img{';
			$forest_eco_nature_tp_theme_css .='Width: '.esc_attr($forest_eco_nature_post_image_width).'px;';
		$forest_eco_nature_tp_theme_css .='}';
	}

	$forest_eco_nature_post_image_length = get_theme_mod('forest_eco_nature_post_image_length', '');
	if($forest_eco_nature_post_image_length != false){
		$forest_eco_nature_tp_theme_css .='.blog .box-image img{';
			$forest_eco_nature_tp_theme_css .='height: '.esc_attr($forest_eco_nature_post_image_length).'px;';
		$forest_eco_nature_tp_theme_css .='}';
	}

	// footer widget title font size
	$forest_eco_nature_footer_widget_title_font_size = get_theme_mod('forest_eco_nature_footer_widget_title_font_size', '');{
	$forest_eco_nature_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
		$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_footer_widget_title_font_size).'px;';
	$forest_eco_nature_tp_theme_css .='}';
	}

	// Copyright text font size
	$forest_eco_nature_footer_copyright_font_size = get_theme_mod('forest_eco_nature_footer_copyright_font_size', '');{
	$forest_eco_nature_tp_theme_css .='#footer .site-info p{';
		$forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_footer_copyright_font_size).'px;';
	$forest_eco_nature_tp_theme_css .='}';
	}

	// copyright padding
	$forest_eco_nature_footer_copyright_top_bottom_padding = get_theme_mod('forest_eco_nature_footer_copyright_top_bottom_padding', '');
	if ($forest_eco_nature_footer_copyright_top_bottom_padding !== '') { 
	    $forest_eco_nature_tp_theme_css .= '.site-info {';
	    $forest_eco_nature_tp_theme_css .= 'padding-top: ' . esc_attr($forest_eco_nature_footer_copyright_top_bottom_padding) . 'px;';
	    $forest_eco_nature_tp_theme_css .= 'padding-bottom: ' . esc_attr($forest_eco_nature_footer_copyright_top_bottom_padding) . 'px;';
	    $forest_eco_nature_tp_theme_css .= '}';
	}

	// copyright position
	$forest_eco_nature_copyright_text_position = get_theme_mod( 'forest_eco_nature_copyright_text_position','Center');
	if($forest_eco_nature_copyright_text_position == 'Center'){
	$forest_eco_nature_tp_theme_css .='#footer .site-info p{';
	$forest_eco_nature_tp_theme_css .='text-align:center;';
	$forest_eco_nature_tp_theme_css .='}';
	}else if($forest_eco_nature_copyright_text_position == 'Left'){
	$forest_eco_nature_tp_theme_css .='#footer .site-info p{';
	$forest_eco_nature_tp_theme_css .='text-align:left;';
	$forest_eco_nature_tp_theme_css .='}';
	}else if($forest_eco_nature_copyright_text_position == 'Right'){
	$forest_eco_nature_tp_theme_css .='#footer .site-info p{';
	$forest_eco_nature_tp_theme_css .='text-align:right;';
	$forest_eco_nature_tp_theme_css .='}';
}

// Header Image title font size
$forest_eco_nature_header_image_title_font_size = get_theme_mod('forest_eco_nature_header_image_title_font_size', '32');{
$forest_eco_nature_tp_theme_css .='.box-text h2{';
    $forest_eco_nature_tp_theme_css .='font-size: '.esc_attr($forest_eco_nature_header_image_title_font_size).'px;';
$forest_eco_nature_tp_theme_css .='}';
}

/*--------------------------- banner image Opacity -------------------*/
    $forest_eco_nature_theme_lay = get_theme_mod( 'forest_eco_nature_header_banner_opacity_color','0.5');
        if($forest_eco_nature_theme_lay == '0'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.1'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.1';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.2'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.2';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.3'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.3';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.4'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.4';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.5'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.5';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.6'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.6';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.7'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.7';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.8'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.8';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '0.9'){
            $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
                $forest_eco_nature_tp_theme_css .='opacity:0.9';
            $forest_eco_nature_tp_theme_css .='}';
        }else if($forest_eco_nature_theme_lay == '1'){
            $forest_eco_nature_tp_theme_css .='#slider img{';
                $forest_eco_nature_tp_theme_css .='opacity:1';
            $forest_eco_nature_tp_theme_css .='}';
        }

    $forest_eco_nature_header_banner_image_overlay = get_theme_mod('forest_eco_nature_header_banner_image_overlay', true);
    if($forest_eco_nature_header_banner_image_overlay == false){
        $forest_eco_nature_tp_theme_css .='.single-page-img, .featured-image{';
            $forest_eco_nature_tp_theme_css .='opacity:1;';
        $forest_eco_nature_tp_theme_css .='}';
    }

    $forest_eco_nature_header_banner_image_ooverlay_color = get_theme_mod('forest_eco_nature_header_banner_image_ooverlay_color', true);
    if($forest_eco_nature_header_banner_image_ooverlay_color != false){
        $forest_eco_nature_tp_theme_css .='.box-image-page{';
            $forest_eco_nature_tp_theme_css .='background-color: '.esc_attr($forest_eco_nature_header_banner_image_ooverlay_color).';';
        $forest_eco_nature_tp_theme_css .='}';
    }

     /*------------------ Slider CSS -------------------*/
    $forest_eco_nature_slider_opacity_setting = get_theme_mod('forest_eco_nature_slider_opacity_setting', true);
    $forest_eco_nature_image_opacity_color    = get_theme_mod('forest_eco_nature_image_opacity_color', '');
    $forest_eco_nature_slider_opacity         = get_theme_mod('forest_eco_nature_slider_opacity', '0.7');

    if ($forest_eco_nature_slider_opacity_setting) {
        // Apply opacity value to slider image
        if ($forest_eco_nature_slider_opacity !== '') {
            $forest_eco_nature_tp_theme_css .= '#slider img {';
            $forest_eco_nature_tp_theme_css .= 'opacity: ' . esc_attr($forest_eco_nature_slider_opacity) . ';';
            $forest_eco_nature_tp_theme_css .= '}';
        }

        // Apply background color to slider if defined
        if ($forest_eco_nature_image_opacity_color !== '') {
            $forest_eco_nature_tp_theme_css .= '#slider {';
            $forest_eco_nature_tp_theme_css .= 'background-color: ' . esc_attr($forest_eco_nature_image_opacity_color) . ';';
            $forest_eco_nature_tp_theme_css .= '}';
        }
    } else {
        // If setting is disabled, force full opacity
        $forest_eco_nature_tp_theme_css .= '#slider img {';
        $forest_eco_nature_tp_theme_css .= 'opacity: 0.7;';
        $forest_eco_nature_tp_theme_css .= '}';
    }

    // Slider Height
    $forest_eco_nature_slider_img_height      = get_theme_mod('forest_eco_nature_slider_img_height');
    $forest_eco_nature_slider_img_height_resp = get_theme_mod('forest_eco_nature_slider_img_height_responsive');

    // Desktop height
    $forest_eco_nature_tp_theme_css .= '@media screen and (min-width: 768px) {';
    $forest_eco_nature_tp_theme_css .= '#slider img {';
    if ( $forest_eco_nature_slider_img_height ) {
        $forest_eco_nature_tp_theme_css .= 'height: ' . esc_attr( $forest_eco_nature_slider_img_height ) . ';';
    }
    $forest_eco_nature_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $forest_eco_nature_tp_theme_css .= '}';
    $forest_eco_nature_tp_theme_css .= '}';

    // Mobile height
    $forest_eco_nature_tp_theme_css .= '@media screen and (max-width: 767px) {';
    $forest_eco_nature_tp_theme_css .= '#slider img {';
    if ( $forest_eco_nature_slider_img_height_resp ) {
        $forest_eco_nature_tp_theme_css .= 'height: ' . esc_attr( $forest_eco_nature_slider_img_height_resp ) . ' !important;';
    }
    $forest_eco_nature_tp_theme_css .= 'width: 100%; object-fit: cover;';
    $forest_eco_nature_tp_theme_css .= '}';
    $forest_eco_nature_tp_theme_css .= '}';

    
    //First Cap ( Blog Post )
    $forest_eco_nature_show_first_caps = get_theme_mod('forest_eco_nature_show_first_caps', 'false');
    if($forest_eco_nature_show_first_caps == 'true' ){
    $forest_eco_nature_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter{';
    $forest_eco_nature_tp_theme_css .=' font-size: 55px; font-weight: 600;';
    $forest_eco_nature_tp_theme_css .=' margin-right: 6px;';
    $forest_eco_nature_tp_theme_css .=' line-height: 1;';
    $forest_eco_nature_tp_theme_css .='}';
    }elseif($forest_eco_nature_show_first_caps == 'false' ){
    $forest_eco_nature_tp_theme_css .='.blog .page-box p:nth-of-type(1)::first-letter {';
    $forest_eco_nature_tp_theme_css .='display: none;';
    $forest_eco_nature_tp_theme_css .='}';
    }

    // Menu hover effect
    $forest_eco_nature_menus_item = get_theme_mod( 'forest_eco_nature_menus_item_style','None');
    if($forest_eco_nature_menus_item == 'None'){
        $forest_eco_nature_tp_theme_css .='.main-navigation a:hover{';
            $forest_eco_nature_tp_theme_css .='';
        $forest_eco_nature_tp_theme_css .='}';
    }else if($forest_eco_nature_menus_item == 'Zoom In'){
        $forest_eco_nature_tp_theme_css .='.main-navigation a:hover{';
            $forest_eco_nature_tp_theme_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
        $forest_eco_nature_tp_theme_css .='}';
    }
