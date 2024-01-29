<?php

/**
 * Define Theme Version
 */
define( 'COLORPRESS_THEME_VERSION', '2.7' );

function colorpress_css() {
	$parent_style = 'gradiant-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'colorpress-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('colorpress-color-default',get_stylesheet_directory_uri() .'/assets/css/color/default.css');
	wp_dequeue_style('gradiant-default');
	
	wp_enqueue_style('colorpress-media-query',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('gradiant-media-query');

}
add_action( 'wp_enqueue_scripts', 'colorpress_css',999);



/**
 * Dynamic Styles
 */
if( ! function_exists( 'colorpress_dynamic_style' ) ):
    function colorpress_dynamic_style() {

		$output_css = '';
		
			
		 /**
		 *  Breadcrumb Style
		 */
		$colorpress_hs_breadcrumb	= get_theme_mod('hs_breadcrumb','1');	
		
		if($colorpress_hs_breadcrumb == '') { 
				$output_css .=".gradiant-content {
					padding-top: 200px;
				}\n";
			}
		
		
		/**
		 *  Parallax
		 */
		$colorpress_footer_parallax_enable	= get_theme_mod('footer_parallax_enable','1');	
		$colorpress_footer_parallax_margin	= get_theme_mod('footer_parallax_margin','775');	
		
		if($colorpress_footer_parallax_enable =='1'):
			 $output_css .="@media (min-width: 992px){.footer-parallax #content.gradiant-content { 
					 margin-bottom: ".esc_attr($colorpress_footer_parallax_margin)."px;
			 }}\n";	
		endif; 	
		
		if ( !function_exists( 'cleverfox_activate' ) ) {
			$output_css .="@media (min-width: 992px){.header.header-eight .navbar-area .av-column-3.my-auto .logo { 
					   top: -30px !important;
			 }}\n";	
		}
		
        wp_add_inline_style( 'colorpress-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'colorpress_dynamic_style',999);



/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/colorpress-premium.php');

/**
 * Import Options From Parent Theme
 *
 */
function colorpress_parent_theme_options() {
	$gradiant_mods = get_option( 'theme_mods_gradiant' );
	if ( ! empty( $gradiant_mods ) ) {
		foreach ( $gradiant_mods as $gradiant_mod_k => $gradiant_mod_v ) {
			set_theme_mod( $gradiant_mod_k, $gradiant_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'colorpress_parent_theme_options' );