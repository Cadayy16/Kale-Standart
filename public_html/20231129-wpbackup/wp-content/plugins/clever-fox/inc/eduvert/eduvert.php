<?php
/**
 * @package   Eduvert
 */

require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/extras.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/dynamic-style.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-header.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-slider.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-course-category.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-funfact.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-video.php';
require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/features/eduvert-typography.php';

if ( ! function_exists( 'cleverfox_eduvert_frontpage_sections' ) ) :
	function cleverfox_eduvert_frontpage_sections() {	
		require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/sections/section-slider.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/sections/section-course-category.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/sections/section-video.php';
		require CLEVERFOX_PLUGIN_DIR . 'inc/eduvert/sections/section-funfact.php';
    }
	add_action( 'eduvert_sections', 'cleverfox_eduvert_frontpage_sections' );
endif;


function cleverfox_eduvert_enqueue_scripts() {
	wp_enqueue_style('animate',CLEVERFOX_PLUGIN_URL .'/inc/assets/css/animate.css');
}
add_action( 'wp_enqueue_scripts', 'cleverfox_eduvert_enqueue_scripts' );