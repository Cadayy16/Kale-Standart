<?php
/**
 * Define Theme Version
 */
define( 'APPOINTO_THEME_VERSION', '2.2' );

function appointo_css() {
	$parent_style = 'gradiant-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'appointo-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('appointo-color-default',get_stylesheet_directory_uri() .'/assets/css/color/default.css');
	wp_dequeue_style('gradiant-default');
	
	wp_enqueue_style('appointo-media-query',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('gradiant-media-query');
	
	wp_enqueue_script('appointo-custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);

}
add_action( 'wp_enqueue_scripts', 'appointo_css',999);


/**
 * Dynamic Styles
 */
if( ! function_exists( 'appointo_dynamic_style' ) ):
    function appointo_dynamic_style() {

		$output_css = '';
		
			
		 /**
		 *  Breadcrumb Style
		 */
		$appointo_hs_breadcrumb	= get_theme_mod('hs_breadcrumb','1');	
		
		if($appointo_hs_breadcrumb == '') { 
				$output_css .=".gradiant-content {
					padding-top: 200px;
				}\n";
			}
		
		
		/**
		 *  Parallax
		 */
		$appointo_footer_parallax_enable	= get_theme_mod('footer_parallax_enable','1');	
		$appointo_footer_parallax_margin	= get_theme_mod('footer_parallax_margin','775');	
		
		if($appointo_footer_parallax_enable =='1'):
			 $output_css .="@media (min-width: 992px){.footer-parallax #content.gradiant-content { 
					 margin-bottom: ".esc_attr($appointo_footer_parallax_margin)."px;
			 }}\n";	
		endif; 	
		
        wp_add_inline_style( 'appointo-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'appointo_dynamic_style',999);


/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/appointo-premium.php');

/**
 * Import Options From Parent Theme
 *
 */
function appointo_parent_theme_options() {
	$gradiant_mods = get_option( 'theme_mods_gradiant' );
	if ( ! empty( $gradiant_mods ) ) {
		foreach ( $gradiant_mods as $gradiant_mod_k => $gradiant_mod_v ) {
			set_theme_mod( $gradiant_mod_k, $gradiant_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'appointo_parent_theme_options' );