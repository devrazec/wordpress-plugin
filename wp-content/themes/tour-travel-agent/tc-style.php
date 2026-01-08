<?php 
	$tour_travel_agent_theme_color = get_theme_mod('tour_travel_agent_theme_color');
	$tour_travel_agent_custom_css ='';

	/*------------------ Theme Color Option -----------*/

	if ($tour_travel_agent_theme_color) {
		$tour_travel_agent_custom_css .= ':root {';
		$tour_travel_agent_custom_css .= '--primary-color: ' . esc_attr($tour_travel_agent_theme_color) . ' !important;';
		$tour_travel_agent_custom_css .= '} ';
	}

	/*----------------Width Layout -------------------*/
	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_width_options','Full Layout');
    if($tour_travel_agent_theme_lay == 'Full Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='max-width: 100%;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == 'Contained Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == 'Boxed Layout'){
		$tour_travel_agent_custom_css .='body{';
			$tour_travel_agent_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$tour_travel_agent_custom_css .='}';
	}
	

	/*------ Button Style -------*/
	$tour_travel_agent_top_buttom_padding = get_theme_mod('tour_travel_agent_top_button_padding');
	$tour_travel_agent_left_right_padding = get_theme_mod('tour_travel_agent_left_button_padding');
	if($tour_travel_agent_top_buttom_padding != false || $tour_travel_agent_left_right_padding != false ){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_top_buttom_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_top_buttom_padding).'px; padding-left: '.esc_attr($tour_travel_agent_left_right_padding).'px; padding-right: '.esc_attr($tour_travel_agent_left_right_padding).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_button_border_radius = get_theme_mod('tour_travel_agent_button_border_radius');
	$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_button_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_btn_font_weight = get_theme_mod('tour_travel_agent_btn_font_weight');{
	$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
	$tour_travel_agent_custom_css .='font-weight: '.esc_attr($tour_travel_agent_btn_font_weight).';';
	$tour_travel_agent_custom_css .='}';
	} 
	
	$tour_travel_agent_button_letter_spacing = get_theme_mod('tour_travel_agent_button_letter_spacing');
	$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$tour_travel_agent_custom_css .='letter-spacing: '.esc_attr($tour_travel_agent_button_letter_spacing).'px;';
	$tour_travel_agent_custom_css .='}';
	
	//Button Shape
	$tour_travel_agent_btn_shape = get_theme_mod('tour_travel_agent_btn_shape', 'Round');
	if($tour_travel_agent_btn_shape == 'Square' ){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$tour_travel_agent_custom_css .=' border-radius: 0';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_btn_shape == 'Round' ){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$tour_travel_agent_custom_css .=' border-radius: .3em';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_btn_shape == 'Pill' ){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$tour_travel_agent_custom_css .=' border-radius: 2em;';
		$tour_travel_agent_custom_css .='}';
	}

	//Button hover effect
	$tour_travel_agent_button_hover_effect = get_theme_mod('tour_travel_agent_button_hover_effect', 'disable');
	if ($tour_travel_agent_button_hover_effect !== 'disable') {
		$tour_travel_agent_custom_css .= '.read-btn a.blogbutton-small:hover {';
		switch ($tour_travel_agent_button_hover_effect) {
			case 'pulse':
				$tour_travel_agent_custom_css .= 'animation: pulse 0.5s ease-in-out;';
				break;
			case 'rubberBand':
				$tour_travel_agent_custom_css .= 'animation: rubberBand 0.5s ease-in-out;';
				break;
			case 'swing':
				$tour_travel_agent_custom_css .= 'animation: swing 0.5s ease-in-out;';
				break;
			case 'tada':
				$tour_travel_agent_custom_css .= 'animation: tada 0.5s ease-in-out;';
				break;
			case 'jello':
				$tour_travel_agent_custom_css .= 'animation: jello 0.5s ease-in-out;';
				break;
		}
		$tour_travel_agent_custom_css .= '}';
	}

	//keyframes for all animations
	$tour_travel_agent_custom_css .= '
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.1); }
		100% { transform: scale(1); }
	}

	@keyframes rubberBand {
		0% { transform: scale(1); }
		30% { transform: scaleX(1.25) scaleY(0.75); }
		40% { transform: scaleX(0.75) scaleY(1.25); }
		50% { transform: scale(1); }
	}

	@keyframes swing {
		20% { transform: rotate(15deg); }
		40% { transform: rotate(-10deg); }
		60% { transform: rotate(5deg); }
		80% { transform: rotate(-5deg); }
		100% { transform: rotate(0deg); }
	}

	@keyframes tada {
		0% { transform: scale(1); }
		10%, 20% { transform: scale(0.9) rotate(-3deg); }
		30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
		40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
		100% { transform: scale(1) rotate(0); }
	}

	@keyframes jello {
		0%, 11.1%, 100% { transform: none; }
		22.2% { transform: skewX(-12.5deg) skewY(-12.5deg); }
		33.3% { transform: skewX(6.25deg) skewY(6.25deg); }
		44.4% { transform: skewX(-3.125deg) skewY(-3.125deg); }
		55.5% { transform: skewX(1.5625deg) skewY(1.5625deg); }
		66.6% { transform: skewX(-0.78125deg) skewY(-0.78125deg); }
		77.7% { transform: skewX(0.390625deg) skewY(0.390625deg); }
		88.8% { transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
	}';

	/*-------------- Woocommerce Button  -------------------*/

	$tour_travel_agent_woocommerce_button_padding_top = get_theme_mod('tour_travel_agent_woocommerce_button_padding_top');
	if($tour_travel_agent_woocommerce_button_padding_top != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_button_padding_top).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_button_padding_right = get_theme_mod('tour_travel_agent_woocommerce_button_padding_right');
	if($tour_travel_agent_woocommerce_button_padding_right != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='padding-left: '.esc_attr($tour_travel_agent_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_button_padding_right).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_button_border_radius = get_theme_mod('tour_travel_agent_woocommerce_button_border_radius');
	if($tour_travel_agent_woocommerce_button_border_radius != false){
		$tour_travel_agent_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_button_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_related_product = get_theme_mod('tour_travel_agent_related_product',true);

	if($tour_travel_agent_related_product == false){
		$tour_travel_agent_custom_css .='.related.products{';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_border = get_theme_mod('tour_travel_agent_woocommerce_product_border',true);

	if($tour_travel_agent_woocommerce_product_border == false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='border: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_padding_top = get_theme_mod('tour_travel_agent_woocommerce_product_padding_top',10);
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_product_padding_top).'px;';
		$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_product_padding_right = get_theme_mod('tour_travel_agent_woocommerce_product_padding_right',10);
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='padding-left: '.esc_attr($tour_travel_agent_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_product_padding_right).'px;';
		$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_product_border_radius = get_theme_mod('tour_travel_agent_woocommerce_product_border_radius');
	if($tour_travel_agent_woocommerce_product_border_radius != false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_product_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_woocommerce_product_box_shadow = get_theme_mod('tour_travel_agent_woocommerce_product_box_shadow');
	if($tour_travel_agent_woocommerce_product_box_shadow != false){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$tour_travel_agent_custom_css .='box-shadow: '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px '.esc_attr($tour_travel_agent_woocommerce_product_box_shadow).'px #aaa;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_product_sale_font_size = get_theme_mod('tour_travel_agent_product_sale_font_size');
	$tour_travel_agent_custom_css .='.woocommerce span.onsale {';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_product_sale_font_size).'px;';
	$tour_travel_agent_custom_css .='}';

	/*---- Preloader Color ----*/
	$tour_travel_agent_preloader_color = get_theme_mod('tour_travel_agent_preloader_color');
	$tour_travel_agent_preloader_bg_color = get_theme_mod('tour_travel_agent_preloader_bg_color');
	$tour_travel_agent_preloader_background_img = get_theme_mod('tour_travel_agent_preloader_background_img');

	if($tour_travel_agent_preloader_color != false){
		$tour_travel_agent_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_preloader_color).';';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_preloader_bg_color != false){
		$tour_travel_agent_custom_css .='.preloader{';
			$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_preloader_bg_color).';';
		$tour_travel_agent_custom_css .='}';
	}
	if ( $tour_travel_agent_preloader_background_img != false ) {
		$tour_travel_agent_custom_css .= '.preloader{';
		$tour_travel_agent_custom_css .= 'background: url(' . esc_url( $tour_travel_agent_preloader_background_img ) . ');';
		$tour_travel_agent_custom_css .= '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$tour_travel_agent_custom_css .= '}';
	}

	$tour_travel_agent_resp_sidebar = get_theme_mod( 'tour_travel_agent_sidebar_hide_show',true);
    if($tour_travel_agent_resp_sidebar == true){
    	$tour_travel_agent_custom_css .='@media screen and (max-width:575px) {';
		$tour_travel_agent_custom_css .='#sidebar{';
			$tour_travel_agent_custom_css .='display:block;';
		$tour_travel_agent_custom_css .='} }';
	}else if($tour_travel_agent_resp_sidebar == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px) {';
		$tour_travel_agent_custom_css .='#sidebar{';
			$tour_travel_agent_custom_css .='display:none;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_menu_toggle_btn_bg_color = get_theme_mod('tour_travel_agent_menu_toggle_btn_bg_color');
	if($tour_travel_agent_menu_toggle_btn_bg_color != false){
		$tour_travel_agent_custom_css .='.toggle-menu i {';
			$tour_travel_agent_custom_css .='background: '.esc_attr($tour_travel_agent_menu_toggle_btn_bg_color).'';
		$tour_travel_agent_custom_css .='}';
	}	

	/*-------- Scrollup icon css -------*/
	$tour_travel_agent_scroll_icon_font_size = get_theme_mod('tour_travel_agent_scroll_icon_font_size', 18);
	$tour_travel_agent_custom_css .='.scrollup{';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_scroll_icon_font_size).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_scroll_icon_color = get_theme_mod('tour_travel_agent_scroll_icon_color');
	$tour_travel_agent_custom_css .='.scrollup{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_scroll_icon_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_scroll_icon_hover_color = get_theme_mod('tour_travel_agent_scroll_icon_hover_color');
	$tour_travel_agent_custom_css .='.scrollup:hover{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_scroll_icon_hover_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_scroll_text_transform = get_theme_mod( 'tour_travel_agent_scroll_text_transform','Capitalize');
	if($tour_travel_agent_scroll_text_transform== 'Capitalize'){
		$tour_travel_agent_custom_css .='.scrollup{';
			$tour_travel_agent_custom_css .='text-transform:Capitalize;';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_scroll_text_transform == 'Lowercase'){
		$tour_travel_agent_custom_css .='.scrollup{';
			$tour_travel_agent_custom_css .='text-transform:Lowercase;';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_scroll_text_transform == 'Uppercase'){
		$tour_travel_agent_custom_css .='.scrollup{';
			$tour_travel_agent_custom_css .='text-transform:Uppercase;';
		$tour_travel_agent_custom_css .='}';
	}

	/*---- Copyright css ----*/

	$tour_travel_agent_copyright_color = get_theme_mod('tour_travel_agent_copyright_color');
	$tour_travel_agent_custom_css .='#footer p,#footer p a{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_copyright_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_copyright__hover_color = get_theme_mod('tour_travel_agent_copyright__hover_color');
	$tour_travel_agent_custom_css .='#footer p:hover,#footer p a:hover{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_copyright__hover_color).'!important;';
	$tour_travel_agent_custom_css .='}';
	
	$tour_travel_agent_copyright_fontsize = get_theme_mod('tour_travel_agent_copyright_fontsize',16);
	if($tour_travel_agent_copyright_fontsize != false){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_copyright_fontsize).'px; ';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_copyright_top_bottom_padding = get_theme_mod('tour_travel_agent_copyright_top_bottom_padding',15);
	if($tour_travel_agent_copyright_top_bottom_padding != false){
		$tour_travel_agent_custom_css .='#footer {';
			$tour_travel_agent_custom_css .='padding-top:'.esc_attr($tour_travel_agent_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_copyright_top_bottom_padding).'px; ';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_copyright_alignment = get_theme_mod( 'tour_travel_agent_copyright_alignment','Center');
    if($tour_travel_agent_copyright_alignment == 'Left'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:start;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_copyright_alignment == 'Center'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:center;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_copyright_alignment == 'Right'){
		$tour_travel_agent_custom_css .='#footer p{';
			$tour_travel_agent_custom_css .='text-align:end;';
		$tour_travel_agent_custom_css .='}';
	}

	// sticky copyright
	$tour_travel_agent_resp_stickycopyright = get_theme_mod( 'tour_travel_agent_stickycopyright_hide_show',false);
	if($tour_travel_agent_resp_stickycopyright == true && get_theme_mod( 'tour_travel_agent_copyright_sticky',false) != true){
    	$tour_travel_agent_custom_css .='.copyright-sticky{';
			$tour_travel_agent_custom_css .='position:static;';
		$tour_travel_agent_custom_css .='} ';
	}
	
	//Footer Social Icon Font size
	$tour_travel_agent_footer_icon_font_size = get_theme_mod('tour_travel_agent_footer_icon_font_size');
	$tour_travel_agent_custom_css .='#footer .socialicons i{';
	$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_footer_icon_font_size).'px;';
	$tour_travel_agent_custom_css .='}';

	//Footer Social Icon Alignment
	$tour_travel_agent_footer_icon_alignment = get_theme_mod( 'tour_travel_agent_footer_icon_alignment','Center');
    if($tour_travel_agent_footer_icon_alignment == 'Left'){
		$tour_travel_agent_custom_css .='#footer .socialicons{';
			$tour_travel_agent_custom_css .='text-align:start;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_icon_alignment == 'Center'){
		$tour_travel_agent_custom_css .='#footer .socialicons{';
			$tour_travel_agent_custom_css .='text-align:center;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_icon_alignment == 'Right'){
		$tour_travel_agent_custom_css .='#footer .socialicons{';
			$tour_travel_agent_custom_css .='text-align:end;';
		$tour_travel_agent_custom_css .='}';
	}
	/*------- Wocommerce sale css -----*/
	$tour_travel_agent_woocommerce_sale_top_padding = get_theme_mod('tour_travel_agent_woocommerce_sale_top_padding');
	$tour_travel_agent_woocommerce_sale_left_padding = get_theme_mod('tour_travel_agent_woocommerce_sale_left_padding');
	$tour_travel_agent_custom_css .=' .woocommerce span.onsale{';
		$tour_travel_agent_custom_css .='padding-top: '.esc_attr($tour_travel_agent_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($tour_travel_agent_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($tour_travel_agent_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($tour_travel_agent_woocommerce_sale_left_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_woocommerce_sale_border_radius = get_theme_mod('tour_travel_agent_woocommerce_sale_border_radius', 0);
	$tour_travel_agent_custom_css .='.woocommerce span.onsale{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_woocommerce_sale_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_sale_position = get_theme_mod( 'tour_travel_agent_sale_position','right');
    if($tour_travel_agent_sale_position == 'left'){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product .onsale{';
			$tour_travel_agent_custom_css .='left: -10px; right: auto;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_sale_position == 'right'){
		$tour_travel_agent_custom_css .='.woocommerce ul.products li.product .onsale{';
			$tour_travel_agent_custom_css .='left: auto; right: 0;';
		$tour_travel_agent_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$tour_travel_agent_footer_background_color = get_theme_mod('tour_travel_agent_footer_background_color');
	$tour_travel_agent_custom_css .='.footertown{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_footer_background_color).';';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_footer_background_img = get_theme_mod('tour_travel_agent_footer_background_img');
	if($tour_travel_agent_footer_background_img != false){
		$tour_travel_agent_custom_css .='.footertown{';
			$tour_travel_agent_custom_css .='background: url('.esc_attr($tour_travel_agent_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_img_footer','scroll');
	if($tour_travel_agent_theme_lay == 'fixed'){
		$tour_travel_agent_custom_css .='.footertown{';
			$tour_travel_agent_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$tour_travel_agent_custom_css .='}';
	}elseif ($tour_travel_agent_theme_lay == 'scroll'){
		$tour_travel_agent_custom_css .='.footertown{';
			$tour_travel_agent_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_footer_img_position = get_theme_mod('tour_travel_agent_footer_img_position','center center');
	if($tour_travel_agent_footer_img_position != false){
		$tour_travel_agent_custom_css .='.footertown{';
			$tour_travel_agent_custom_css .='background-position: '.esc_attr($tour_travel_agent_footer_img_position).'!important;';
		$tour_travel_agent_custom_css .='}';
	}

	/*---- Comment form ----*/
	$tour_travel_agent_comment_width = get_theme_mod('tour_travel_agent_comment_width', '100');
	$tour_travel_agent_custom_css .='#comments textarea{';
		$tour_travel_agent_custom_css .=' width:'.esc_attr($tour_travel_agent_comment_width).'%;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_comment_submit_text = get_theme_mod('tour_travel_agent_comment_submit_text', 'Post Comment');
	if($tour_travel_agent_comment_submit_text == ''){
		$tour_travel_agent_custom_css .='#comments p.form-submit {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_comment_title = get_theme_mod('tour_travel_agent_comment_title', 'Leave a Reply');
	if($tour_travel_agent_comment_title == ''){
		$tour_travel_agent_custom_css .='#comments h2#reply-title {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	// Sticky Header padding
	$tour_travel_agent_sticky_header_padding = get_theme_mod('tour_travel_agent_sticky_header_padding');
	$tour_travel_agent_custom_css .='.fixed-header{';
		$tour_travel_agent_custom_css .=' padding-top:'.esc_attr($tour_travel_agent_sticky_header_padding).'px; padding-bottom:'.esc_attr($tour_travel_agent_sticky_header_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	// Navigation Font Size 
	$tour_travel_agent_nav_font_size = get_theme_mod('tour_travel_agent_nav_font_size');
	if($tour_travel_agent_nav_font_size != false){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_nav_font_size).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_navigation_case = get_theme_mod('tour_travel_agent_navigation_case', 'uppercase');
	if($tour_travel_agent_navigation_case == 'uppercase' ){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .=' text-transform: uppercase;';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_navigation_case == 'capitalize' ){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .=' text-transform: capitalize;';
		$tour_travel_agent_custom_css .='}';
	}


	//Site title Font size
	$tour_travel_agent_site_title_fontsize = get_theme_mod('tour_travel_agent_site_title_fontsize');
	$tour_travel_agent_custom_css .='.logo h1, .logo p.site-title{';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_site_title_fontsize).'px;';
	$tour_travel_agent_custom_css .='}';

	$tour_travel_agent_site_description_fontsize = get_theme_mod('tour_travel_agent_site_description_fontsize');
	$tour_travel_agent_custom_css .='.logo p.site-description{';
		$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_site_description_fontsize).'px;';
	$tour_travel_agent_custom_css .='}';

	/*----- Featured image css -----*/
	$tour_travel_agent_featured_image_border_radius = get_theme_mod('tour_travel_agent_featured_image_border_radius');
	if($tour_travel_agent_featured_image_border_radius != false){
		$tour_travel_agent_custom_css .='.inner-service .post-box img{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_featured_image_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_featured_image_box_shadow = get_theme_mod('tour_travel_agent_featured_image_box_shadow');
	if($tour_travel_agent_featured_image_box_shadow != false){
		$tour_travel_agent_custom_css .='.inner-service .service-image img{';
			$tour_travel_agent_custom_css .='box-shadow: 8px 8px '.esc_attr($tour_travel_agent_featured_image_box_shadow).'px #aaa;';
		$tour_travel_agent_custom_css .='}';
	} 

	// featured image dimention
	$tour_travel_agent_blog_post_featured_image_dimension = get_theme_mod('tour_travel_agent_blog_post_featured_image_dimension', 'default');
	$tour_travel_agent_blog_post_featured_image_custom_width = get_theme_mod('tour_travel_agent_blog_post_featured_image_custom_width',250);
	$tour_travel_agent_blog_post_featured_image_custom_height = get_theme_mod('tour_travel_agent_blog_post_featured_image_custom_height',250);
	if($tour_travel_agent_blog_post_featured_image_dimension == 'custom'){
		$tour_travel_agent_custom_css .='.post .services-box .blog-image img{';
			$tour_travel_agent_custom_css .='width: '.esc_attr($tour_travel_agent_blog_post_featured_image_custom_width).'!important; height: '.esc_attr($tour_travel_agent_blog_post_featured_image_custom_height).';';
		$tour_travel_agent_custom_css .='}';
	}

	/*------Shop page pagination ---------*/
	$tour_travel_agent_shop_page_pagination = get_theme_mod('tour_travel_agent_shop_page_pagination', true);
	if($tour_travel_agent_shop_page_pagination == false){
		$tour_travel_agent_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$tour_travel_agent_post_blocks = get_theme_mod('tour_travel_agent_post_blocks', 'Without box');
	if($tour_travel_agent_post_blocks == 'Within box' ){
		$tour_travel_agent_custom_css .='.post-box{';
			$tour_travel_agent_custom_css .=' border: 1px solid #222;';
		$tour_travel_agent_custom_css .='}';
	}

	//  ------------ Mobile Media Options ----------
	$tour_travel_agent_hide_topbar_responsive = get_theme_mod('tour_travel_agent_hide_topbar_responsive',false);
	if($tour_travel_agent_hide_topbar_responsive == true && get_theme_mod('tour_travel_agent_show_topbar',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.topbar{';
			$tour_travel_agent_custom_css .='display:none;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_hide_topbar_responsive == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.topbar{';
			$tour_travel_agent_custom_css .='display:none;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_sticky_header = get_theme_mod('tour_travel_agent_responsive_sticky_header',false);
	if($tour_travel_agent_responsive_sticky_header == true && get_theme_mod('tour_travel_agent_sticky_header',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.fixed-header{';
			$tour_travel_agent_custom_css .='position:static !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_sticky_header == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.fixed-header{';
			$tour_travel_agent_custom_css .='position:static !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	//Header Social Icon Font size
	$tour_travel_agent_header_icon_font_size = get_theme_mod('tour_travel_agent_header_icon_font_size');
	$tour_travel_agent_custom_css .='.topbar .social-icon i {';
	$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_header_icon_font_size).'px;';
	$tour_travel_agent_custom_css .='}';	

	/*--------------------------- Slider Opacity -------------------*/
	$tour_travel_agent_slider_layout = get_theme_mod( 'tour_travel_agent_slider_opacity_color','0.7');
	if($tour_travel_agent_slider_layout == '0'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.1'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.1 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.2'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.2 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.3'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.3 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.4'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.4 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.5'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.5 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.6'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.6 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.7'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.7 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.8'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.8 !important;';
		$tour_travel_agent_custom_css .='}';
		}else if($tour_travel_agent_slider_layout == '0.9'){
		$tour_travel_agent_custom_css .='#slider img{';
			$tour_travel_agent_custom_css .='opacity:0.9 !important;';
		$tour_travel_agent_custom_css .='}';
		}	

	// responsive slider
	if (get_theme_mod('tour_travel_agent_slider_responsive',true) == true && get_theme_mod('tour_travel_agent_slider_hide_show',false) == false) {
		$tour_travel_agent_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$tour_travel_agent_custom_css .=' display: none;';
		$tour_travel_agent_custom_css .='} }';
	}
	if (get_theme_mod('tour_travel_agent_slider_responsive',true) == false) {
		$tour_travel_agent_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$tour_travel_agent_custom_css .=' display: none;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_show_back_to_top = get_theme_mod('tour_travel_agent_responsive_show_back_to_top',true);
	if($tour_travel_agent_responsive_show_back_to_top == true && get_theme_mod('tour_travel_agent_show_back_to_top',true) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$tour_travel_agent_custom_css .='visibility:hidden;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_show_back_to_top == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$tour_travel_agent_custom_css .='visibility:hidden;';
		$tour_travel_agent_custom_css .='} }';
	}

	$tour_travel_agent_responsive_preloader_hide = get_theme_mod('tour_travel_agent_responsive_preloader_hide',false);
	if($tour_travel_agent_responsive_preloader_hide == true && get_theme_mod('tour_travel_agent_preloader_hide',false) == false){
		$tour_travel_agent_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$tour_travel_agent_custom_css .='display:none !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	if($tour_travel_agent_responsive_preloader_hide == false){
		$tour_travel_agent_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$tour_travel_agent_custom_css .='display:none !important;';
		$tour_travel_agent_custom_css .='} }';
	}

	// menu font weight
	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_font_weight_menu_option','600');
    if($tour_travel_agent_theme_lay == '100'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight:100;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '200'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 200;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '300'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 300;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '400'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 400;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '500'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 500;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '600'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 600;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '700'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 700;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '800'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 800;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_theme_lay == '900'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='font-weight: 900;';
		$tour_travel_agent_custom_css .='}';
	}

	// menu padding
	$tour_travel_agent_menu_padding = get_theme_mod('tour_travel_agent_menu_padding');
	$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
		$tour_travel_agent_custom_css .='padding: '.esc_attr($tour_travel_agent_menu_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	// Menu Item Hover Style	
	$tour_travel_agent_menus_item = get_theme_mod( 'tour_travel_agent_menus_item_style','None');
	if($tour_travel_agent_menus_item == 'None'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a{';
			$tour_travel_agent_custom_css .='';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_menus_item == 'Zoom In'){
		$tour_travel_agent_custom_css .='.primary-navigation ul li a:hover{';
			$tour_travel_agent_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$tour_travel_agent_custom_css .='}';
	}

	// menu color
	$tour_travel_agent_menu_color = get_theme_mod('tour_travel_agent_menu_color');

	$tour_travel_agent_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// menu hover color
	$tour_travel_agent_menu_hover_color = get_theme_mod('tour_travel_agent_menu_hover_color');
	$tour_travel_agent_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_hover_color).' !important;';
	$tour_travel_agent_custom_css .='}';

	// Submenu color
	$tour_travel_agent_submenu_menu_color = get_theme_mod('tour_travel_agent_submenu_menu_color');
	$tour_travel_agent_custom_css .='.primary-navigation ul.children a, .primary-navigation ul.children li a{';
			$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_submenu_menu_color).' !important;';
	$tour_travel_agent_custom_css .='}';

	// Submenu Hover Color Option
	$tour_travel_agent_submenu_hover_color = get_theme_mod('tour_travel_agent_submenu_hover_color');
	$tour_travel_agent_custom_css .='.primary-navigation ul.children li a:hover {';
	$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_submenu_hover_color).'!important;';
	$tour_travel_agent_custom_css .='} ';

	// Breadcrumb color option
	$tour_travel_agent_breadcrumb_color = get_theme_mod('tour_travel_agent_breadcrumb_color');
	$tour_travel_agent_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_breadcrumb_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Breadcrumb bg color option
	$tour_travel_agent_breadcrumb_background_color = get_theme_mod('tour_travel_agent_breadcrumb_background_color');
	$tour_travel_agent_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_breadcrumb_background_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Breadcrumb hover color option
	$tour_travel_agent_breadcrumb_hover_color = get_theme_mod('tour_travel_agent_breadcrumb_hover_color');
	$tour_travel_agent_custom_css .='.bradcrumbs a:hover{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_breadcrumb_hover_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Breadcrumb hover bg color option
	$tour_travel_agent_breadcrumb_hover_bg_color = get_theme_mod('tour_travel_agent_breadcrumb_hover_bg_color');
	$tour_travel_agent_custom_css .='.bradcrumbs a:hover{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_breadcrumb_hover_bg_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Category color option
	$tour_travel_agent_category_color = get_theme_mod('tour_travel_agent_category_color');
	$tour_travel_agent_custom_css .='.tc-single-category a{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_category_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Category bg color option
	$tour_travel_agent_category_background_color = get_theme_mod('tour_travel_agent_category_background_color');
	$tour_travel_agent_custom_css .='.tc-single-category a{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_category_background_color).'!important;';
	$tour_travel_agent_custom_css .='}';

	// Single post image border radious
	$tour_travel_agent_single_post_img_border_radius = get_theme_mod('tour_travel_agent_single_post_img_border_radius', 0);
	$tour_travel_agent_custom_css .='.feature-box img{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_single_post_img_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	/*-------- Copyright background css -------*/
	$tour_travel_agent_copyright_background_color = get_theme_mod('tour_travel_agent_copyright_background_color');
	$tour_travel_agent_custom_css .='#footer{';
		$tour_travel_agent_custom_css .='background-color: '.esc_attr($tour_travel_agent_copyright_background_color).';';
	$tour_travel_agent_custom_css .='}';

	// Logo padding
	$tour_travel_agent_logo_padding = get_theme_mod('tour_travel_agent_logo_padding');
	$tour_travel_agent_custom_css .='.logo{';
		$tour_travel_agent_custom_css .=' padding:'.esc_attr($tour_travel_agent_logo_padding).'px;';
	$tour_travel_agent_custom_css .='}';

	 // site title color option
	$tour_travel_agent_site_title_color_setting = get_theme_mod('tour_travel_agent_site_title_color_setting');
	$tour_travel_agent_custom_css .=' .logo h1 a, .logo p a{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_site_title_color_setting).'!important;';
	$tour_travel_agent_custom_css .='} ';

	$tour_travel_agent_tagline_color_setting = get_theme_mod('tour_travel_agent_tagline_color_setting');
	$tour_travel_agent_custom_css .=' .logo p.site-description{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_tagline_color_setting).'!important;';
	$tour_travel_agent_custom_css .='} ';

	// Logo margin
	$tour_travel_agent_logo_margin = get_theme_mod('tour_travel_agent_logo_margin');
	$tour_travel_agent_custom_css .='.logo{';
		$tour_travel_agent_custom_css .=' margin:'.esc_attr($tour_travel_agent_logo_margin).'px;';
	$tour_travel_agent_custom_css .='}';

   // menu color option
	$tour_travel_agent_menu_color_setting = get_theme_mod('tour_travel_agent_menu_color_setting');
	$tour_travel_agent_custom_css .='.toggle-menu i{';
		$tour_travel_agent_custom_css .='color: '.esc_attr($tour_travel_agent_menu_color_setting).'!important;';
	$tour_travel_agent_custom_css .='} ';

	// Single post image border radius
	$tour_travel_agent_single_post_img_border_radius = get_theme_mod('tour_travel_agent_single_post_img_border_radius', 0);
	$tour_travel_agent_custom_css .='.feature-box img{';
		$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_single_post_img_border_radius).'px;';
	$tour_travel_agent_custom_css .='}';

	// Single post image box shadow
	$tour_travel_agent_single_post_img_box_shadow = get_theme_mod('tour_travel_agent_single_post_img_box_shadow',0);
	$tour_travel_agent_custom_css .='.feature-box img{';
		$tour_travel_agent_custom_css .='box-shadow: '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px '.esc_attr($tour_travel_agent_single_post_img_box_shadow).'px #ccc;';
	$tour_travel_agent_custom_css .='}';

	// Single post image dimention
	$tour_travel_agent_single_post_featured_image_dimension = get_theme_mod('tour_travel_agent_single_post_featured_image_dimension', 'default');
	$tour_travel_agent_single_post_featured_image_custom_width = get_theme_mod('tour_travel_agent_single_post_featured_image_custom_width');
	$tour_travel_agent_single_post_featured_image_custom_height = get_theme_mod('tour_travel_agent_single_post_featured_image_custom_height');
	if($tour_travel_agent_single_post_featured_image_dimension == 'custom'){
		$tour_travel_agent_custom_css .='.feature-box.single-post-img img{';
			$tour_travel_agent_custom_css .='width: '.esc_attr($tour_travel_agent_single_post_featured_image_custom_width).'!important; height: '.esc_attr($tour_travel_agent_single_post_featured_image_custom_height).';';
		$tour_travel_agent_custom_css .='}';
	}

	// Grid Post into blocks
	$tour_travel_agent_grid_post_blocks = get_theme_mod('tour_travel_agent_grid_post_blocks', 'Without box');
	if($tour_travel_agent_grid_post_blocks == 'Within box' ){
		$tour_travel_agent_custom_css .='.inner-service .services-box{';
			$tour_travel_agent_custom_css .=' border: 1px solid #222;';
		$tour_travel_agent_custom_css .='}';
	}

	//Grid Post Metabox Seperator
	$tour_travel_agent_grid_post_metabox_seperator = get_theme_mod('tour_travel_agent_grid_post_metabox_seperator','|');
	if($tour_travel_agent_grid_post_metabox_seperator != '' ){
		$tour_travel_agent_custom_css .='.grid-post-box .metabox .me-2:after{';
			$tour_travel_agent_custom_css .=' content: "'.esc_attr($tour_travel_agent_grid_post_metabox_seperator).'"; padding-left:10px;';
		$tour_travel_agent_custom_css .='}';		
	}

	// Grid Post Featured image css
	$tour_travel_agent_grid_post_featured_image_border_radius = get_theme_mod('tour_travel_agent_grid_post_featured_image_border_radius');
	if($tour_travel_agent_grid_post_featured_image_border_radius != false){
		$tour_travel_agent_custom_css .='.inner-service .grid-post-box img{';
			$tour_travel_agent_custom_css .='border-radius: '.esc_attr($tour_travel_agent_grid_post_featured_image_border_radius).'px;';
		$tour_travel_agent_custom_css .='}';
	}

	// Metabox Seperator
	$tour_travel_agent_metabox_seperator = get_theme_mod('tour_travel_agent_metabox_seperator','|');
	if($tour_travel_agent_metabox_seperator != '' ){
		$tour_travel_agent_custom_css .='.metabox .me-2:after{';
			$tour_travel_agent_custom_css .=' content: "'.esc_attr($tour_travel_agent_metabox_seperator).'"; padding-left:10px;';
		$tour_travel_agent_custom_css .='}';		
	}

	// Metabox Seperator
	$tour_travel_agent_single_post_metabox_seperator = get_theme_mod('tour_travel_agent_single_post_metabox_seperator','|');
	if($tour_travel_agent_single_post_metabox_seperator != '' ){
		$tour_travel_agent_custom_css .='.metabox .px-2:after{';
			$tour_travel_agent_custom_css .=' content: "'.esc_attr($tour_travel_agent_single_post_metabox_seperator).'"; padding-left:10px;';
		$tour_travel_agent_custom_css .='}';		
	}

	// Related post Metabox Seperator
	$tour_travel_agent_related_post_metabox_seperator = get_theme_mod('tour_travel_agent_related_post_metabox_seperator','|');
	if($tour_travel_agent_related_post_metabox_seperator != '' ){
		$tour_travel_agent_custom_css .='.related-posts .metabox .entry-date:after,.related-posts .metabox .entry-author:after,.related-posts .metabox .entry-comments:after{';
			$tour_travel_agent_custom_css .=' content: "'.esc_attr($tour_travel_agent_related_post_metabox_seperator).'"; padding-left:1px;';
			$tour_travel_agent_custom_css .= 'display: inline; ';
		$tour_travel_agent_custom_css .='}';		
	}

	$tour_travel_agent_theme_lay = get_theme_mod( 'tour_travel_agent_footer_text_transform','Capitalize');
		if($tour_travel_agent_theme_lay == 'Capitalize'){
			$tour_travel_agent_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
				$tour_travel_agent_custom_css .='text-transform:Capitalize;';
			$tour_travel_agent_custom_css .='}';
		}
		if($tour_travel_agent_theme_lay == 'Lowercase'){
			$tour_travel_agent_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
				$tour_travel_agent_custom_css .='text-transform:Lowercase;';
			$tour_travel_agent_custom_css .='}';
		}
		if($tour_travel_agent_theme_lay == 'Uppercase'){
			$tour_travel_agent_custom_css .='.footertown .widget h3, a.rsswidget.rss-widget-title{';
				$tour_travel_agent_custom_css .='text-transform:Uppercase;';
			$tour_travel_agent_custom_css .='}';
		}

	// widgets heading font size
	$tour_travel_agent_widgets_heading_fontsize = get_theme_mod('tour_travel_agent_widgets_heading_fontsize',25);
	if($tour_travel_agent_widgets_heading_fontsize != false){
		$tour_travel_agent_custom_css .='.footertown .widget h3{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_widgets_heading_fontsize).'px; ';
		$tour_travel_agent_custom_css .='}';
	}

	// widgets heading font weight
	$tour_travel_agent_widgets_heading_font_weight = get_theme_mod('tour_travel_agent_widgets_heading_font_weight', '');
  	$tour_travel_agent_custom_css .='.footertown .widget h3{';
    $tour_travel_agent_custom_css .='font-weight: '.esc_attr($tour_travel_agent_widgets_heading_font_weight).';';
  	$tour_travel_agent_custom_css .='}';

	/*----------- Footer widgets heading letter spacing -----*/
	$tour_travel_agent_button_footer_heading_letter_spacing = get_theme_mod('tour_travel_agent_button_footer_heading_letter_spacing');
	$tour_travel_agent_custom_css .='.footertown .widget h3,a.rsswidget.rss-widget-title{';
		$tour_travel_agent_custom_css .='letter-spacing: '.esc_attr($tour_travel_agent_button_footer_heading_letter_spacing).'px;';
	$tour_travel_agent_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$tour_travel_agent_footer_widgets_heading = get_theme_mod( 'tour_travel_agent_footer_widgets_heading','Left');
    if($tour_travel_agent_footer_widgets_heading == 'Left'){
		$tour_travel_agent_custom_css .='footer h3{';
		$tour_travel_agent_custom_css .='text-align: left;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_widgets_heading == 'Center'){
		$tour_travel_agent_custom_css .='footer h3{';
			$tour_travel_agent_custom_css .='text-align: center;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_widgets_heading == 'Right'){
		$tour_travel_agent_custom_css .='footer h3{';
			$tour_travel_agent_custom_css .='text-align: right;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_footer_widgets_content = get_theme_mod( 'tour_travel_agent_footer_widgets_content','Left');
    if($tour_travel_agent_footer_widgets_content == 'Left'){
		$tour_travel_agent_custom_css .='footer .footer-block p, footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer.gallery,aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
		$tour_travel_agent_custom_css .='text-align: left;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_widgets_content == 'Center'){
		$tour_travel_agent_custom_css .='footer .footer-block p, footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$tour_travel_agent_custom_css .='text-align: center;';
		$tour_travel_agent_custom_css .='}';
	}else if($tour_travel_agent_footer_widgets_content == 'Right'){
		$tour_travel_agent_custom_css .='footer .footer-block p, footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar-2 caption{';
			$tour_travel_agent_custom_css .='text-align: right !important;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_show_hide_post_categories = get_theme_mod('tour_travel_agent_show_hide_post_categories',true);
	if($tour_travel_agent_show_hide_post_categories == false){
		$tour_travel_agent_custom_css .='.tc-category{';
			$tour_travel_agent_custom_css .='display: none;';
		$tour_travel_agent_custom_css .='}';
	}

	/*-------- Blog Post Alignment ------*/
	$tour_travel_agent_post_alignment = get_theme_mod('tour_travel_agent_blog_post_alignment', 'left');
	if($tour_travel_agent_post_alignment == 'center' ){
		$tour_travel_agent_custom_css .='.services-box,.services-box h2,.services-box .read-btn{';
			$tour_travel_agent_custom_css .=' text-align: '. $tour_travel_agent_post_alignment .'!important;';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_post_alignment == 'right' ){
		$tour_travel_agent_custom_css .='.services-box,.services-box h2,.services-box .read-btn{';
			$tour_travel_agent_custom_css .='text-align: '. $tour_travel_agent_post_alignment .'!important;';
		$tour_travel_agent_custom_css .='}';
	}

	/*---- Slider Image overlay -----*/
	$tour_travel_agent_slider_image_overlay = get_theme_mod('tour_travel_agent_slider_image_overlay',true);
	if($tour_travel_agent_slider_image_overlay == false){
		$tour_travel_agent_custom_css .='#slider .slider-bgimage img{';
			$tour_travel_agent_custom_css .='opacity: 1;';
		$tour_travel_agent_custom_css .='}';
	}

	$tour_travel_agent_slider_overlay_color = get_theme_mod('tour_travel_agent_slider_overlay_color','#000');
	if($tour_travel_agent_slider_overlay_color != false){
		$tour_travel_agent_custom_css .='#slider .slider-bgimage{';
			$tour_travel_agent_custom_css .='background: '.esc_attr($tour_travel_agent_slider_overlay_color).';';
		$tour_travel_agent_custom_css .='}';
	}

	// Blog Post Button Font Size 
	$tour_travel_agent_button_font_size = get_theme_mod('tour_travel_agent_button_font_size');
	if($tour_travel_agent_button_font_size != false){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small{';
			$tour_travel_agent_custom_css .='font-size: '.esc_attr($tour_travel_agent_button_font_size).'px;';
		$tour_travel_agent_custom_css .='}';
	}
	
	$tour_travel_agent_button_text_transform = get_theme_mod( 'tour_travel_agent_button_text_transform','Capitalize');
	if($tour_travel_agent_button_text_transform == 'Capitalize'){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small{';
			$tour_travel_agent_custom_css .='text-transform:Capitalize;';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_button_text_transform == 'Lowercase'){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small{';
			$tour_travel_agent_custom_css .='text-transform:Lowercase;';
		$tour_travel_agent_custom_css .='}';
	}
	if($tour_travel_agent_button_text_transform == 'Uppercase'){
		$tour_travel_agent_custom_css .='.read-btn a.blogbutton-small{';
			$tour_travel_agent_custom_css .='text-transform:Uppercase;';
		$tour_travel_agent_custom_css .='}';
	}

	//Initial Cap
	$tour_travel_agent_initial_caps_enable = get_theme_mod('tour_travel_agent_initial_caps_enable', 'false');
	if($tour_travel_agent_initial_caps_enable == 'true' ){
		$tour_travel_agent_custom_css .='.post-box p:nth-of-type(1)::first-letter{';
			$tour_travel_agent_custom_css .=' font-size: 60px!important; font-weight: 800!important;';
		$tour_travel_agent_custom_css .=' margin-right: 10px!important;';
			$tour_travel_agent_custom_css .=' font-family: "Vollkorn", serif!important;';
			$tour_travel_agent_custom_css .=' line-height: 1!important;';
		$tour_travel_agent_custom_css .='}';
	}elseif($tour_travel_agent_initial_caps_enable == 'false' ){
		$tour_travel_agent_custom_css .='.post-box p:nth-of-type(1)::first-letter{';
			$tour_travel_agent_custom_css .='display: none!important;';
		$tour_travel_agent_custom_css .='}';
	}

	