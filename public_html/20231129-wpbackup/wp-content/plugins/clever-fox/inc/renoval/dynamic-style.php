<?php
if( ! function_exists( 'cleverfox_renoval_dynamic_styles' ) ):
    function cleverfox_renoval_dynamic_styles() {
		$output_css = '';
		
		$theme = wp_get_theme(); // gets the current theme
		
		/**
		 * Logo Width 
		 */
		 $logo_width			= get_theme_mod('logo_width','140');		 
		if($logo_width !== '') { 
				$output_css .=".logo img, .mobile-logo img {
					max-width: " .esc_attr($logo_width). "px;
				}\n";
			}
		
		/**
		 * Slider
		 */
		 $overlay_color	= '0.6';		
		$slider_opacity						 = get_theme_mod('slider_opacity',$overlay_color);
		
		$output_css .=".theme-slider {
			background: rgba(0, 0, 0, $slider_opacity);
		}\n";
		
		
		/**
		 * CTA
		 */
		 $cta_bg_setting		= get_theme_mod('cta_bg_setting',esc_url(CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/cta/cta-bg.jpg')); 
		$cta_bg_position	= get_theme_mod('cta_bg_position','scroll');	
				$output_css .=".cta-section {
					background-image: url(".esc_url($cta_bg_setting).");
					background-attachment: " .esc_attr($cta_bg_position). ";
				}\n";
		
		
		
		/**
		 *  Typography Body
		 */
		 $renoval_body_text_transform	 	 = get_theme_mod('renoval_body_text_transform','inherit');
		 $renoval_body_font_style	 		 = get_theme_mod('renoval_body_font_style','inherit');
		 $renoval_body_font_size	 		 = get_theme_mod('renoval_body_font_size','15');
		 $renoval_body_line_height		 = get_theme_mod('renoval_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($renoval_body_font_size). "px;
			line-height: " .esc_attr($renoval_body_line_height). ";
			text-transform: " .esc_attr($renoval_body_text_transform). ";
			font-style: " .esc_attr($renoval_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $renoval_heading_text_transform 	= get_theme_mod('renoval_h' . $i . '_text_transform','inherit');
			 $renoval_heading_font_style	 	= get_theme_mod('renoval_h' . $i . '_font_style','inherit');
			 $renoval_heading_font_size	 		 = get_theme_mod('renoval_h' . $i . '_font_size');
			 $renoval_heading_line_height		 	 = get_theme_mod('renoval_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($renoval_heading_font_size). "px;
				line-height: " .esc_attr($renoval_heading_line_height). ";
				text-transform: " .esc_attr($renoval_heading_text_transform). ";
				font-style: " .esc_attr($renoval_heading_font_style). ";
			}\n";
		 }

			
	 wp_add_inline_style( 'renoval-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_renoval_dynamic_styles' );
?>