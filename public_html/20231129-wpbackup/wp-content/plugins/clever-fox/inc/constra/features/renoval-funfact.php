<?php
function renoval_funfact_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Funfact  Section
	=========================================*/
	$wp_customize->add_section(
		'funfact_setting', array(
			'title' => esc_html__( 'Funfact Section', 'clever-fox' ),
			'priority' => 9,
			'panel' => 'renoval_frontpage_sections',
		)
	);

	//Funfact Documentation Link
	class WP_funfact_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Frontpage Section > Funfact Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Funfact Doc Link // 
	$wp_customize->add_setting( 
		'funfact_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_funfact_Customize_Control($wp_customize,
	'funfact_doc_link' , 
		array(
			'label'          => __( 'Funfact Documentation Link', 'clever-fox' ),
			'section'        => 'funfact_setting',
			'type'           => 'radio',
			'description'    => __( 'Funfact Documentation Link', 'clever-fox' ), 
		) 
	) );

	// Funfact Header Section // 
	$wp_customize->add_setting(
		'funfact_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
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
	
	// Funfact Title // 
	// $wp_customize->add_setting(
    	// 'funfact_title',
    	// array(
	        // 'default'			=> '<span class="funfact-title">Technology for tommorow</span>',
			// 'capability'     	=> 'edit_theme_options',
			// 'sanitize_callback' => 'renoval_sanitize_html',
			// 'transport'         => $selective_refresh,
			// 'priority' => 4,
		// )
	// );	
	
	// $wp_customize->add_control( 
		// 'funfact_title',
		// array(
		    // 'label'   => __('Title','clever-fox'),
		    // 'section' => 'funfact_setting',
			// 'type'           => 'text',
		// )  
	// );
	
	// Funfact Subtitle // 
	$wp_customize->add_setting(
    	'funfact_subtitle',
    	array(
	        'default'			=> '<h2>Outstanding</h2><div class="animation"><div class="first"><div>Funfact</div></div></div>',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 4,
		)
	);	
	
	$wp_customize->add_control( 
		'funfact_subtitle',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'funfact_setting',
			'type'           => 'text',
		)  
	);
	
	// Funfact Description // 
	$wp_customize->add_setting(
    	'funfact_description',
    	array(
	        'default'			=> __('Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
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

	// Funfact content Section // 
	
	$wp_customize->add_setting(
		'funfact_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
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
	 * Customizer Repeater for add funfact
	 */
	
		$wp_customize->add_setting( 'funfact_contents', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => renoval_get_funfact_default()
			)
		);
		
		$wp_customize->add_control( 
			new Renoval_Repeater( $wp_customize, 
				'funfact_contents', 
					array(
						'label'   => esc_html__('Funfact','clever-fox'),
						'section' => 'funfact_setting',
						'add_field_label'                   => esc_html__( 'Add New Funfact', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Funfact', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
					) 
				) 
			);
			
	//Pro feature
		class Renoval_funfact__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
				if('Constra' == $theme):
			?>
				<a class="customizer_funfact_upgrade_section up-to-pro" href="https://www.nayrathemes.com/renoval-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php endif;
			}
		}
		
		$wp_customize->add_setting( 'renoval_funfact_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Renoval_funfact__section_upgrade(
			$wp_customize,
			'renoval_funfact_upgrade_to_pro',
				array(
					'section'				=> 'funfact_setting',
				)
			)
		);
	
	//  Left Image // 
    $wp_customize->add_setting( 
    	'funfact_left_img' , 
    	array(
			'default' 			=> esc_url(CLEVERFOX_PLUGIN_URL.'inc/constra/images/left-funfact.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_left_img' ,
		array(
			'label'          => esc_html__( 'Left Image', 'clever-fox'),
			'section'        => 'funfact_setting',
		) 
	));
	
	//  Background Image // 
    $wp_customize->add_setting( 
    	'funfact_bg_img' , 
    	array(
			'default' 			=> esc_url(CLEVERFOX_PLUGIN_URL.'inc/constra/images/funfact-bg.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'funfact_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'clever-fox'),
			'section'        => 'funfact_setting',
		) 
	));
}

add_action( 'customize_register', 'renoval_funfact_setting' );

// funfact selective refresh
function renoval_home_funfact_section_partials( $wp_customize ){	
	// funfact title
	$wp_customize->selective_refresh->add_partial( 'funfact_title', array(
		'selector'            => '.home-funfact .section-title h5 span.funfact-title',
		'settings'            => 'funfact_title',
		'render_callback'  => 'renoval_funfact_title_render_callback',
	
	) );
	
	// funfact_subtitle
	$wp_customize->selective_refresh->add_partial( 'funfact_subtitle', array(
		'selector'            => '.home-funfact .section-title div h2',
		'settings'            => 'funfact_subtitle',
		'render_callback'  => 'renoval_funfact_subtitle_render_callback',
	
	) );
	
	// funfact description
	$wp_customize->selective_refresh->add_partial( 'funfact_description', array(
		'selector'            => '.home-funfact .section-title p span.funfact-title',
		'settings'            => 'funfact_description',
		'render_callback'  => 'renoval_funfact_description_render_callback',
	
	) );
	// funfact content
	$wp_customize->selective_refresh->add_partial( 'funfact_contents', array(
		'selector'            => '#home-funfact .funfact-content'
	
	) );
	
	}

add_action( 'customize_register', 'renoval_home_funfact_section_partials' );

// funfact title
function renoval_funfact_title_render_callback() {
	return get_theme_mod( 'funfact_title' );
}

// funfact_subtitle
function renoval_funfact_subtitle_render_callback() {
	return get_theme_mod( 'funfact_subtitle' );
}

// funfact description
function renoval_funfact_description_render_callback() {
	return get_theme_mod( 'funfact_description' );
}