<?php
function gradiant_features_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Features  Section
	=========================================*/
	$wp_customize->add_section(
		'features_setting', array(
			'title' => esc_html__( 'Features Section', 'gradiant' ),
			'priority' => 4,
			'panel' => 'gradiant_frontpage_sections',
		)
	);

	// Features Header Section // 
	$wp_customize->add_setting(
		'features_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'features_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','gradiant'),
			'section' => 'features_setting',
		)
	);
	
	// Features Title // 
	$wp_customize->add_setting(
    	'features_title',
    	array(
	        'default'			=> 'Why Choose <span class="primary-color">Appointo?</span>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'features_title',
		array(
		    'label'   => __('Title','gradiant'),
		    'section' => 'features_setting',
			'type'           => 'text',
		)  
	);
	
	// Features Description // 
	$wp_customize->add_setting(
    	'features_desc',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','gradiant'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'features_desc',
		array(
		    'label'   => __('Description','gradiant'),
		    'section' => 'features_setting',
			'type'           => 'textarea',
		)  
	);

	// Features content Section // 
	
	$wp_customize->add_setting(
		'features_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'features_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Left Content','gradiant'),
			'section' => 'features_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add features
	 */
	
		$wp_customize->add_setting( 'features_contents', 
			array(
			 'sanitize_callback' => 'gradiant_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => gradiant_get_features_default()
			)
		);
		
		$wp_customize->add_control( 
			new Gradiant_Repeater( $wp_customize, 
				'features_contents', 
					array(
						'label'   => esc_html__('Features','gradiant'),
						'section' => 'features_setting',
						'add_field_label'                   => esc_html__( 'Add New Feature', 'gradiant' ),
						'item_name'                         => esc_html__( 'Features', 'gradiant' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
			//Pro feature
		class Gradiant_features__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
			?>
				<a class="customizer_features_upgrade_section up-to-pro" href="https://www.nayrathemes.com/gradiant-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php
			}
		}
		
		$wp_customize->add_setting( 'gradiant_features_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Gradiant_features__section_upgrade(
			$wp_customize,
			'gradiant_features_upgrade_to_pro',
				array(
					'section'				=> 'features_setting',
				)
			)
		);	
		
	
	
	
	// Features Right content // 
	
	$wp_customize->add_setting(
		'features_right_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'features_right_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Right Content','gradiant'),
			'section' => 'features_setting',
		)
	);
	
	//  Image // 
    $wp_customize->add_setting( 
    	'features_right_img' , 
    	array(
			'default' 			=> plugin_dir_url( dirname(__FILE__) ) .'images/features.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'gradiant_sanitize_url',	
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'features_right_img' ,
		array(
			'label'          => esc_html__(  'Image', 'gradiant'),
			'section'        => 'features_setting',
		) 
	));
}

add_action( 'customize_register', 'gradiant_features_setting' );

// features selective refresh
function gradiant_home_features_section_partials( $wp_customize ){	
	// features title
	$wp_customize->selective_refresh->add_partial( 'features_title', array(
		'selector'            => '.features-home .heading-default h3',
		'settings'            => 'features_title',
		'render_callback'  => 'gradiant_features_title_render_callback',
	
	) );
	
	// features description
	$wp_customize->selective_refresh->add_partial( 'features_desc', array(
		'selector'            => '.features-home .heading-default p',
		'settings'            => 'features_desc',
		'render_callback'  => 'gradiant_features_desc_render_callback',
	
	) );
	// features content
	$wp_customize->selective_refresh->add_partial( 'features_contents', array(
		'selector'            => '.features-home .features-contents'
	) );
	
	}

add_action( 'customize_register', 'gradiant_home_features_section_partials' );

// features title
function gradiant_features_title_render_callback() {
	return get_theme_mod( 'features_title' );
}

// features description
function gradiant_features_desc_render_callback() {
	return get_theme_mod( 'features_desc' );
}