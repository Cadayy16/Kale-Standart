<?php
function eduvert_video_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Video  Section
	=========================================*/
	$wp_customize->add_section(
		'video_setting', array(
			'title' => esc_html__( 'Video Section', 'clever-fox' ),
			'priority' => 5,
			'panel' => 'eduvert_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'video_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'video_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'video_setting',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'video_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'video_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'video_setting',
		)
	);
	
	// Video Header Section // 
	$wp_customize->add_setting(
		'video_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'video_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'video_setting',
		)
	);
	
	// Video Title // 
	$wp_customize->add_setting(
    	'video_title',
    	array(
	        'default'			=> __('Live classes','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'video_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'video_setting',
			'type'           => 'text',
		)  
	);
	
	// Video Description // 
	$wp_customize->add_setting(
    	'video_description',
    	array(
	        'default'			=> __('high quality Live classes','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'video_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'video_setting',
			'type'           => 'textarea',
		)  
	);

	// Video content Section // 
	
	$wp_customize->add_setting(
		'video_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'video_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'video_setting',
		)
	);
	
	// Video Link // 
	$wp_customize->add_setting(
    	'video_link',
    	array(
	        'default'			=> 'https://www.youtube.com/embed/cdfMgotGKIM',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_url',
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'video_link',
		array(
		    'label'   => __('Video Link','clever-fox'),
		    'section' => 'video_setting',
			'type'           => 'textarea',
		)  
	);
}

add_action( 'customize_register', 'eduvert_video_setting' );

// selective refresh
function eduvert_home_video_section_partials( $wp_customize ){	
	// video_title
	$wp_customize->selective_refresh->add_partial( 'video_title', array(
		'selector'            => '.section-video.home1-video .section-title h5',
		'settings'            => 'video_title',
		'render_callback'  => 'eduvert_video_title_render_callback',
	) );
	
	// video_description
	$wp_customize->selective_refresh->add_partial( 'video_description', array(
		'selector'            => '.section-video.home1-video .section-title h3',
		'settings'            => 'video_description',
		'render_callback'  => 'eduvert_video_desc_render_callback',
	) );
	
	}
add_action( 'customize_register', 'eduvert_home_video_section_partials' );

// video_title
function eduvert_video_title_render_callback() {
	return get_theme_mod( 'video_title' );
}

// video_description
function eduvert_video_desc_render_callback() {
	return get_theme_mod( 'video_description' );
}
