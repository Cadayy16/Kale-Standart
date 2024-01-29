<?php
if( ! function_exists( 'cleverfox_eduvert_dynamic_styles' ) ):
    function cleverfox_eduvert_dynamic_styles() {
		$output_css = '';
		
		
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
		$slider_overlay_enable 				 = get_theme_mod('slider_overlay_enable','1');
		$slide_overlay_color 				 = get_theme_mod('slide_overlay_color','#1b575b');
		if($slider_overlay_enable == '1') { 
				$output_css .=".slider-home {
					background: " .esc_attr($slide_overlay_color). ";
				}\n";
			}
			
		/**
		 *  Typography Body
		 */
		 $eduvert_body_text_transform	 	 = get_theme_mod('eduvert_body_text_transform','inherit');
		 $eduvert_body_font_style	 		 = get_theme_mod('eduvert_body_font_style','inherit');
		 $eduvert_body_font_size	 		 = get_theme_mod('eduvert_body_font_size','15');
		 $eduvert_body_line_height		 = get_theme_mod('eduvert_body_line_height','1.5');
		
		 $output_css .=" body{ 
			font-size: " .esc_attr($eduvert_body_font_size). "px;
			line-height: " .esc_attr($eduvert_body_line_height). ";
			text-transform: " .esc_attr($eduvert_body_text_transform). ";
			font-style: " .esc_attr($eduvert_body_font_style). ";
		}\n";		 
		
		/**
		 *  Typography Heading
		 */
		 for ( $i = 1; $i <= 6; $i++ ) {	
			 $eduvert_heading_text_transform 	= get_theme_mod('eduvert_h' . $i . '_text_transform','inherit');
			 $eduvert_heading_font_style	 	= get_theme_mod('eduvert_h' . $i . '_font_style','inherit');
			 $eduvert_heading_font_size	 		 = get_theme_mod('eduvert_h' . $i . '_font_size');
			 $eduvert_heading_line_height		 	 = get_theme_mod('eduvert_h' . $i . '_line_height');
			 
			 $output_css .=" h" . $i . "{ 
				font-size: " .esc_attr($eduvert_heading_font_size). "px;
				line-height: " .esc_attr($eduvert_heading_line_height). ";
				text-transform: " .esc_attr($eduvert_heading_text_transform). ";
				font-style: " .esc_attr($eduvert_heading_font_style). ";
			}\n";
		 }
		 
			
	 wp_add_inline_style( 'eduvert-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'cleverfox_eduvert_dynamic_styles' );
?>