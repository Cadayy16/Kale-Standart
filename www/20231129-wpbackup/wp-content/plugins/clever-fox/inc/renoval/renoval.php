<?php
/**
 * @package   Renoval
 */

require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/above-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/above-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-footer.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-service.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-cta.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-client.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/features/renoval-typography.php';

if ( ! function_exists( 'cleverfox_renoval_frontpage_sections' ) ) :
	function cleverfox_renoval_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/section-service.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/section-cta.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/renoval/sections/section-client.php';
    }
	add_action( 'renoval_sections', 'cleverfox_renoval_frontpage_sections' );
endif;


function cleverfox_renoval_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_renoval_enqueue_scripts' );

function constra_customize_remove( $wp_customize ) {
	$wp_customize->remove_control('tlh_mobile_title');
	$wp_customize->remove_control('tlh_email_title');
}
add_action( 'customize_register', 'constra_customize_remove' );
