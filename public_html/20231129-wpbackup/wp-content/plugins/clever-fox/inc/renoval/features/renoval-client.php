<?php
function renoval_client_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Client  Section
	=========================================*/
	$wp_customize->add_section(
		'client_setting', array(
			'title' => esc_html__( 'Client Section', 'clever-fox' ),
			'priority' => 8,
			'panel' => 'renoval_frontpage_sections',
		)
	);

	//Client Documentation Link
	class WP_client_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Frontpage Section > Client Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Client Doc Link // 
	$wp_customize->add_setting( 
		'cl_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_client_Customize_Control($wp_customize,
	'cl_doc_link' , 
		array(
			'label'          => __( 'Client Documentation Link', 'clever-fox' ),
			'section'        => 'client_setting',
			'type'           => 'radio',
			'description'    => __( 'Client Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	// Client Header Section // 
	$wp_customize->add_setting(
		'client_headings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'client_headings',
		array(
			'type' => 'hidden',
			'label' => __('Header','clever-fox'),
			'section' => 'client_setting',
		)
	);
	
	
	// Client Subtitle // 
	$wp_customize->add_setting(
    	'client_subtitle',
    	array(
	        'default'			=> __('<h2>Outstanding</h2><div class="animation"><div class="first"><div>Sponser</div></div></div>','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_html',
			'priority' => 5,
		)
	);	
	
	$wp_customize->add_control( 
		'client_subtitle',
		array(
		    'label'   => __('Subtitle','clever-fox'),
		    'section' => 'client_setting',
			'type'           => 'textarea',
		)  
	);
	
	// Client Description // 
	$wp_customize->add_setting(
    	'client_description',
    	array(
	        'default'			=> __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'client_description',
		array(
		    'label'   => __('Description','clever-fox'),
		    'section' => 'client_setting',
			'type'           => 'textarea',
		)  
	);

	// Client content Section // 
	
	$wp_customize->add_setting(
		'client_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 7,
		)
	);

	$wp_customize->add_control(
	'client_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','clever-fox'),
			'section' => 'client_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add client
	 */
	
		$wp_customize->add_setting( 'client_contents', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 8,
			 'default' => renoval_get_client_default()
			)
		);
		
		$wp_customize->add_control( 
			new Renoval_Repeater( $wp_customize, 
				'client_contents', 
					array(
						'label'   => esc_html__('Client','clever-fox'),
						'section' => 'client_setting',
						'add_field_label'                   => esc_html__( 'Add New Client', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Client', 'clever-fox' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => false,
						'customizer_repeater_subtitle_control' => false,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
			
				
	//Pro feature
		class Renoval_client__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
				if('Renoval' == $theme || 'Constra' == $theme):
			?>
				<a class="customizer_client_upgrade_section up-to-pro" href="https://www.nayrathemes.com/renoval-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
				
			<?php endif;
			}
		}
		
		$wp_customize->add_setting( 'renoval_client_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Renoval_client__section_upgrade(
			$wp_customize,
			'renoval_client_upgrade_to_pro',
				array(
					'section'				=> 'client_setting',
				)
			)
		);	
	}

add_action( 'customize_register', 'renoval_client_setting' );

// client selective refresh
function renoval_home_client_section_partials( $wp_customize ){	
	// client title
	$wp_customize->selective_refresh->add_partial( 'client_title', array(
		'selector'            => '#sponsor-section .section-title h5',
		'settings'            => 'client_title',
		'render_callback'  => 'renoval_client_title_render_callback',
	
	) );
	
	// client_subtitle
	$wp_customize->selective_refresh->add_partial( 'client_subtitle', array(
		'selector'            => '#sponsor-section .section-title div h2',
		'settings'            => 'client_subtitle',
		'render_callback'  => 'renoval_client_subtitle_render_callback',
	
	) );
	
	// client description
	$wp_customize->selective_refresh->add_partial( 'client_description', array(
		'selector'            => '#sponsor-section .section-title p',
		'settings'            => 'client_description',
		'render_callback'  => 'renoval_client_desc_render_callback',
	
	) );
	// client content
	$wp_customize->selective_refresh->add_partial( 'client_contents', array(
		'selector'            => '.client-home .partner-carousel'
	
	) );
	
	}

add_action( 'customize_register', 'renoval_home_client_section_partials' );

// client title
function renoval_client_title_render_callback() {
	return get_theme_mod( 'client_title' );
}
// client_subtitle
function renoval_client_subtitle_render_callback() {
	return get_theme_mod( 'client_subtitle' );
}

// client description
function renoval_client_desc_render_callback() {
	return get_theme_mod( 'client_description' );
}