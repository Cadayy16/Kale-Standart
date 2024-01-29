<?php
function eduvert_course_category_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Course Category  Section
	=========================================*/
	$wp_customize->add_section(
		'course_category_setting', array(
			'title' => esc_html__( 'Course Category Section', 'clever-fox' ),
			'priority' => 2,
			'panel' => 'eduvert_frontpage_sections',
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'course_cat_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'course_cat_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'course_category_setting',
		)
	);
	
	// Hide / Show 
	$wp_customize->add_setting(
		'course_cat_hs'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'course_cat_hs',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'course_category_setting',
		)
	);
	
	// Course Category Header Section // 
	$wp_customize->add_setting(
		'course_category_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'course_category_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'course_category_setting',
		)
	);
	
	// Course Category Title // 
	$wp_customize->add_setting(
    	'course_category_title',
    	array(
	        'default'			=> __('course categories','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'course_category_title',
		array(
		    'label'   => __('Title','clever-fox'),
		    'section' => 'course_category_setting',
			'type'           => 'text',
		)  
	);
	
	// Course Category Description // 
	$wp_customize->add_setting(
    	'course_category_description',
    	array(
	        'default'			=> __('popular topics to learn','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'course_category_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'course_category_setting',
			'type'           => 'textarea',
		)  
	);

	// Course Category content Section // 
	
	$wp_customize->add_setting(
		'course_category_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'course_category_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'course_category_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add Course Category
	 */
	
		$wp_customize->add_setting( 'course_category', 
			array(
			 'sanitize_callback' => 'eduvert_repeater_sanitize',
			 'priority' => 7,
			  'default' => eduvert_get_course_cat_default()
			)
		);
		
		$wp_customize->add_control( 
			new Eduvert_Repeater( $wp_customize, 
				'course_category', 
					array(
						'label'   => esc_html__('Course Category','clever-fox'),
						'section' => 'course_category_setting',
						'add_field_label'                   => esc_html__( 'Add New Course', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Course', 'clever-fox' ),
						
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
			
	
	//Pro feature
		class Eduvert_course__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			?>
				<a class="customizer_course_upgrade_section up-to-pro" href="https://www.nayrathemes.com/eduvert-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'eduvert_course_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 8,
		));
		$wp_customize->add_control(
			new Eduvert_course__section_upgrade(
			$wp_customize,
			'eduvert_course_upgrade_to_pro',
				array(
					'section'				=> 'course_category_setting',
					'settings'				=> 'eduvert_course_upgrade_to_pro',
				)
			)
		);
		
	// Course Category Button Label // 
	$wp_customize->add_setting(
    	'course_category_btn_lbl',
    	array(
	        'default'			=> __('All Categories','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'course_category_btn_lbl',
		array(
		    'label'   => __('All Categories Button Label','clever-fox'),
		    'section' => 'course_category_setting',
			'type'           => 'text',
		)  
	);
	
	
	// Course Category Button Link // 
	$wp_customize->add_setting(
    	'course_category_btn_link',
    	array(
	        'default'			=> '#',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eduvert_sanitize_url',
			'transport'         => $selective_refresh,
			'priority' => 9,
		)
	);	
	
	$wp_customize->add_control( 
		'course_category_btn_link',
		array(
		    'label'   => __('All Categories Button Link','clever-fox'),
		    'section' => 'course_category_setting',
			'type'           => 'text',
		)  
	);
}

add_action( 'customize_register', 'eduvert_course_category_setting' );

// selective refresh
function eduvert_home_course_category_section_partials( $wp_customize ){	
	// course_category_title
	$wp_customize->selective_refresh->add_partial( 'course_category_title', array(
		'selector'            => '.section-category.home1-cat .section-title h5',
		'settings'            => 'course_category_title',
		'render_callback'  => 'eduvert_course_category_title_render_callback',
	) );
	
	// course_category_description
	$wp_customize->selective_refresh->add_partial( 'course_category_description', array(
		'selector'            => '.section-category.home1-cat .section-title h3',
		'settings'            => 'course_category_description',
		'render_callback'  => 'eduvert_course_category_desc_render_callback',
	) );
	
	// course_category_btn_lbl
	$wp_customize->selective_refresh->add_partial( 'course_category_btn_lbl', array(
		'selector'            => '.section-category.home1-cat .categorie-btn a',
		'settings'            => 'course_category_btn_lbl',
		'render_callback'  => 'eduvert_course_category_btn_lbl_render_callback',
	) );
	
	}

add_action( 'customize_register', 'eduvert_home_course_category_section_partials' );

// course_category_title
function eduvert_course_category_title_render_callback() {
	return get_theme_mod( 'course_category_title' );
}

// course_category_description
function eduvert_course_category_desc_render_callback() {
	return get_theme_mod( 'course_category_description' );
}

// course_category_btn_lbl
function eduvert_course_category_btn_lbl_render_callback() {
	return get_theme_mod( 'course_category_btn_lbl' );
}