<?php
function eduvert_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact  Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'clever-fox' ),
			'priority' => 6,
			'panel' => 'eduvert_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'funfact_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'funfact_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'funfact_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'funfact_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	// Funfact Header Section // 
	$wp_customize->add_setting(
		'funfact_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'funfact_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	// Title // 
	$wp_customize->add_setting(
    	'funfact_title',
    	array(
	        'default'			=> __('Why Choose us','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'text',
		)  
	);
	
	// Subtitle // 
	$wp_customize->add_setting(
    	'funfact_subttl',
    	array(
	        'default'			=> __('we bring new developing idea & design','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_subttl',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'text',
		)  
	);
	
	// Description // 
	$wp_customize->add_setting(
    	'funfact_description',
    	array(
	        'default'			=> __('There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Button Label // 
	$wp_customize->add_setting(
    	'funfact_btn_lbl',
    	array(
	        'default'			=> __('Choose Plan','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_btn_lbl',
		array(
		    'label'   => __('Button Label','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'text',
		)  
	);
	
	// Button Link // 
	$wp_customize->add_setting(
    	'funfact_btn_link',
    	array(
	        'default'			=> '#',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_url',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_btn_link',
		array(
		    'label'   => __('Button Link','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'text',
		)  
	);
	

	// Funfact content Section // 
	
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'funfact_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'funfact_setting',
		)
	);
	
	
	/**
	 * Customizer Repeater for add Funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'eduvert_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 7,
			 'default' => eduvert_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Eduvert_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','clever-fox'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New Funfact', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Funfact', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
		//Pro feature
		class Eduvert_funfact__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_funfact_upgrade_section up-to-pro" href="https://www.nayrathemes.com/eduvert-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'eduvert_funfact_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 7,
		));
		$wp_customize->add_control(
			new Eduvert_funfact__section_upgrade(
			$wp_customize,
			'eduvert_funfact_upgrade_to_pro',
				array(
					'section'				=> 'funfact_setting',
					'settings'				=> 'eduvert_funfact_upgrade_to_pro',
				)
			)
		);
	
}

add_action( 'customize_register', 'eduvert_funfact_setting' );

// selective refresh
function eduvert_home_funfact_section_partials( $wp_customize ){	
	// funfact_title
	$wp_customize->selective_refresh->add_partial( 'funfact_title', array(
		'selector'            => '.section-funfact.home1-funfact .section-title h5',
		'settings'            => 'funfact_title',
		'render_callback'  => 'eduvert_funfact_title_render_callback',
	) );
	
	// funfact_subttl
	$wp_customize->selective_refresh->add_partial( 'funfact_subttl', array(
		'selector'            => '.section-funfact.home1-funfact .section-title h3',
		'settings'            => 'funfact_subttl',
		'render_callback'  => 'eduvert_funfact_subttl_render_callback',
	) );
	
	// funfact_description
	$wp_customize->selective_refresh->add_partial( 'funfact_description', array(
		'selector'            => '.section-funfact.home1-funfact .section-title p',
		'settings'            => 'funfact_description',
		'render_callback'  => 'eduvert_funfact_desc_render_callback',
	) );
	
	// funfact_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'funfact_btn_lbl', array(
		'selector'            => '.section-funfact.home1-funfact .text-btn',
		'settings'            => 'funfact_btn_lbl',
		'render_callback'  => 'eduvert_funfact_btn_lbl_render_callback',
	) );
	
	}
add_action( 'customize_register', 'eduvert_home_funfact_section_partials' );

// funfact_title
function eduvert_funfact_title_render_callback() {
	return get_theme_mod( 'funfact_title' );
}

// funfact_subttl
function eduvert_funfact_subttl_render_callback() {
	return get_theme_mod( 'funfact_subttl' );
}

// funfact_description
function eduvert_funfact_desc_render_callback() {
	return get_theme_mod( 'funfact_description' );
}

// funfact_btn_lbl
function eduvert_funfact_btn_lbl_render_callback() {
	return get_theme_mod( 'funfact_btn_lbl' );
}
