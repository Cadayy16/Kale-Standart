<?php
function builderse_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Contact
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_contact'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_top_contact',
		array(
			'type' => 'hidden',
			'label' => __('Contact Address','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	//Header Contact Details Documentation Link
	class WP_cntct_details_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Header > Contact Details Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Header Doc Link // 
	$wp_customize->add_setting( 
		'cntct_details_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_cntct_details_section_Customize_Control($wp_customize,
	'cntct_details_doc_link' , 
		array(
			'label'          => __( 'Contact Details Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Contact Details Documentation Link', 'clever-fox' ), 
		) 
	) );

	$wp_customize->add_setting( 
		'hide_show_cntct_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_cntct_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_contct_icon',
    	array(
	        'default' => 'fa-support',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Renoval_Icon_Picker_Control($wp_customize, 
		'tlh_contct_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	// Address title // 
	$wp_customize->add_setting(
    	'tlh_contact_address_title',
    	array(
	        'default'			=> __('Contact Address Title','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_address_title',
		array(
		    'label'   		=> __('Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Address // 
	$wp_customize->add_setting(
    	'tlh_contact_address',
    	array(
	        'default'			=> __('Contact Address','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_contact_address',
		array(
		    'label'   		=> __('Contact Address','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
	/*=========================================
	Text Slider
	=========================================*/
	$wp_customize->add_setting(
		'text_slider'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'text_slider',
		array(
			'type' => 'hidden',
			'label' => __('Text Slider','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	$wp_customize->add_setting(
    	'tlh_text_slider',
    	array(
			'default'			=> __('Welcome to Renoval Construction Company, Renoval Construction Company, Construction Company','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 14,
		)
	);	

	$wp_customize->add_control( 
		'tlh_text_slider',
		array(
		    'label'   		=> __('Text Slider','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'textarea'
		)  
	);
	
	
	/**** Sidebar Option ****/
	/*=========================================
	About Text
	=========================================*/
	$wp_customize->add_setting(
		'about_text'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'about_text',
		array(
			'type' => 'hidden',
			'label' => __('About Text','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	$wp_customize->add_setting(
    	'tlh_about_text',
    	array(
			'default'			=> __('About','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 14,
		)
	);	

	$wp_customize->add_control( 
		'tlh_about_text',
		array(
		    'label'   		=> __('About Text','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	About Description
	=========================================*/
	$wp_customize->add_setting(
    	'tlh_about_desc',
    	array(
			'default'			=> __('There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or at randomised words which don"t look even slightly believable.','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 14,
		)
	);	

	$wp_customize->add_control( 
		'tlh_about_desc',
		array(
		    'label'   		=> __('About Description','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 	=>	'textarea'
		)  
	);
	
	/*=========================================
	Gallery Title
	=========================================*/
	$wp_customize->add_setting(
		'About Gallery'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
		'About Gallery',
			array(
				'type' => 'hidden',
				'label' => __('About Gallery','clever-fox'),
				'section' => 'above_header',
			)
	);
	
	$wp_customize->add_setting(
    	'tlh_gallery_text',
    	array(
			'default'			=> __('Instagram Gallery','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 14,
		)
	);	

	$wp_customize->add_control( 
		'tlh_gallery_text',
		array(
		    'label'   		=> __('Gallery Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'instagram_gallery', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'priority' => 2,
			 'default' => renoval_get_instagram_gallery_default()
		)
		);

	//Header instagram Documentation Link
	class WP_instagram_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Header > Instagram Gallery Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p> 
			
		<?php
	   }
	}
	
	// Header instagram Doc Link // 
	$wp_customize->add_setting( 
		'instagram_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_instagram_section_Customize_Control($wp_customize,
	'instagram_doc_link' , 
		array(
			'label'          => __( 'Instagram Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Instagram Documentation Link', 'clever-fox' ), 
		) 
	) );
		
	$wp_customize->add_control( 
		new RENOVAL_Repeater( $wp_customize, 
			'instagram_gallery', 
				array(
					'label'   => esc_html__('Instagram Gallery','clever-fox'),
					'section' => 'above_header',
					'add_field_label'                   => esc_html__( 'Add Instagram Gallery', 'clever-fox' ),
					'item_name'                         => esc_html__( 'Headimage', 'clever-fox' ),
					'customizer_repeater_image_control' => true,
				) 
			) 
		);
	
	//Pro feature
		class Renoval_headgallery__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			 ?>
				 <a class="customizer_headgallery_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/renoval-pro/" target="_blank"  style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a> 
			 <?php
			}
		}
		
		$wp_customize->add_setting( 'renoval_headgallery_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Renoval_headgallery__section_upgrade(
			$wp_customize,
			'renoval_headgallery_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);
}
add_action( 'customize_register', 'builderse_header_settings' );

// Header selective refresh
function builderse_header_partials( $wp_customize ){
	// tlh_contct_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_contct_icon', array(
		'selector'            => '.content-area .contact-icon i',
		'settings'            => 'tlh_contct_icon',
		'render_callback'  => 'renoval_tlh_contct_icon_render_callback',
	) );
		
	// tlh_contact_address_title
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_address_title', array(
		'selector'            => '.widget-contact .widget-title',
		'settings'            => 'tlh_contact_address_title',
		'render_callback'  => 'renoval_tlh_contact_address_title_render_callback',
	) );
	
	// tlh_contact_address
	$wp_customize->selective_refresh->add_partial( 'tlh_contact_address', array(
		'selector'            => '.widget-contact .content-area .contact-info p',
		'settings'            => 'tlh_contact_address',
		'render_callback'  => 'renoval_tlh_contact_address_render_callback',
	) );	
	
	// tlh_text_slider
	$wp_customize->selective_refresh->add_partial( 'tlh_text_slider', array(
		'selector'            => '.above-left-content .mation-text div p span',
		'settings'            => 'tlh_text_slider',
		'render_callback'  => 'renoval_tlh_text_slider_render_callback',
	) );	
}

add_action( 'customize_register', 'builderse_header_partials' );

// tlh_contct_icon
function renoval_tlh_tlh_contct_icon_render_callback() {
	return get_theme_mod( 'tlh_contct_icon' );
}

// tlh_contact_address_title
function renoval_tlh_contact_address_title_render_callback() {
	return get_theme_mod( 'tlh_contact_address_title' );
}

// tlh_contact_address
function renoval_tlh_contact_address_render_callback() {
	return get_theme_mod( 'tlh_contact_address' );
}

// tlh_text_slider
function renoval_tlh_text_slider_render_callback() {
	return get_theme_mod( 'tlh_text_slider' );
}
