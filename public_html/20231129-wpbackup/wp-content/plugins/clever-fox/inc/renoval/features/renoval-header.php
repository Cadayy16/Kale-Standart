<?php
function renoval_lite_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	
	$theme = wp_get_theme(); // gets the current theme
	
	/*=========================================
	Above Header Section
	=========================================*/
	$wp_customize->add_section(
        'above_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Above Header','clever-fox'),
			'panel'  		=> 'header_section',
		)
    );

	/*=========================================
	Social
	=========================================*/
	$wp_customize->add_setting(
		'hdr_social_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_social_head',
		array(
			'type' => 'hidden',
			'label' => __('Social Icons','clever-fox'),
			'section' => 'above_header',
			'priority' => 1,
		)
	);
	
	
	//Header Social Documentation Link
	class WP_social_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Header > Social Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Header Doc Link // 
	$wp_customize->add_setting( 
		'social_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_social_section_Customize_Control($wp_customize,
	'social_doc_link' , 
		array(
			'label'          => __( 'Social Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Social Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	$wp_customize->add_setting( 
		'hide_show_social_icon' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_social_icon', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);
	
	/**
	 * Customizer Repeater
	 */
		$wp_customize->add_setting( 'social_icons', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'priority' => 2,
			 'default' => renoval_get_social_icon_default()
		)
		);
		
		$wp_customize->add_control( 
			new RENOVAL_Repeater( $wp_customize, 
				'social_icons', 
					array(
						'label'   => esc_html__('Social Icons','clever-fox'),
						'section' => 'above_header',
						'add_field_label'                   => esc_html__( 'Add New Social', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Social', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	//Pro feature
		class Renoval_social__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme
			if('Renoval' == $theme || 'Builderse' == $theme->name || 'Constra' == $theme->name){
			?>
				<a class="customizer_social_upgrade_section up-to-pro"  href="https://www.nayrathemes.com/renoval-pro/" target="_blank"  style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}}
		}
		
		$wp_customize->add_setting( 'renoval_social_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Renoval_social__section_upgrade(
			$wp_customize,
			'renoval_social_upgrade_to_pro',
				array(
					'section'				=> 'above_header',
				)
			)
		);	
	
	
	/*=========================================
	Email
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_email'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 11,
		)
	);

	$wp_customize->add_control(
	'hdr_top_email',
		array(
			'type' => 'hidden',
			'label' => __('Email','clever-fox'),
			'section' => 'above_header',
		)
	);
	
	//Header Email Detail Documentation Link
	class WP_email_details_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Header > Email Details Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Header Doc Link // 
	$wp_customize->add_setting( 
		'email_details_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_email_details_section_Customize_Control($wp_customize,
	'email_details_doc_link' , 
		array(
			'label'          => __( 'Email Details Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Email Details Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	$wp_customize->add_setting( 
		'hide_show_email_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 12,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_email_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_email_icon',
    	array(
	        'default' => 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Renoval_Icon_Picker_Control($wp_customize, 
		'tlh_email_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);	
	
	// Email title // 
	$wp_customize->add_setting(
    	'tlh_email_title',
    	array(
	        'default'			=> __('Email Us','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
			'priority' => 13,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email_title',
		array(
		    'label'   		=> __('Email Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Email // 
	$wp_customize->add_setting(
    	'tlh_email',
    	array(
			'default'			=> __('email@company.com','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'capability' => 'edit_theme_options',
			'priority' => 14,
		)
	);	

	$wp_customize->add_control( 
		'tlh_email',
		array(
		    'label'   		=> __('Email Address','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
		
	
	/*=========================================
	Mobile
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_mbl'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 16,
		)
	);

	$wp_customize->add_control(
	'hdr_top_mbl',
		array(
			'type' => 'hidden',
			'label' => __('Phone','clever-fox'),
			'section' => 'above_header',
			
		)
	);

	//Header Mobile Details Link Documentation Link
	class WP_mbl_details_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Above Header > Phone <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Header Doc Link // 
	$wp_customize->add_setting( 
		'mbl_details_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_mbl_details_section_Customize_Control($wp_customize,
	'mbl_details_doc_link' , 
		array(
			'label'          => __( 'Mobile Details Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Mobile Details Documentation Link', 'clever-fox' ), 
		) 
	) );


	$wp_customize->add_setting( 
		'hide_show_mbl_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 17,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_mbl_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	// icon // 
	$wp_customize->add_setting(
    	'tlh_mobile_icon',
    	array(
	        'default' => 'fa-whatsapp',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Renoval_Icon_Picker_Control($wp_customize, 
		'tlh_mobile_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);
	
	// Mobile title // 
	$wp_customize->add_setting(
    	'tlh_mobile_title',
    	array(
	        'default'			=> __('24x7 Call Supports','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_title',
		array(
		    'label'   		=> __('Phone Title','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	// Mobile Number // 
	$wp_customize->add_setting(
    	'tlh_mobile_number',
    	array(
	        'default'			=> '70 975 975 70',
			'sanitize_callback' => 'renoval_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 18,
		)
	);	

	$wp_customize->add_control( 
		'tlh_mobile_number',
		array(
		    'label'   		=> __('Phone Number','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Office Timing 
	=========================================*/
	$wp_customize->add_setting(
		'hdr_top_office_timing'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_top_office_timing',
		array(
			'type' => 'hidden',
			'label' => __('Office Timing','clever-fox'),
			'section' => 'above_header',
		)
	);

		//Header Office Timing Link Documentation Link
	class WP_office_timing_section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Customizer > Above Header > Office Timing <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Header Doc Link // 
	$wp_customize->add_setting( 
		'office_timing_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_office_timing_section_Customize_Control($wp_customize,
	'office_timing_doc_link' , 
		array(
			'label'          => __( 'Office Timing Documentation Link', 'clever-fox' ),
			'section'        => 'above_header',
			'type'           => 'radio',
			'description'    => __( 'Office Timing Documentation Link', 'clever-fox' ), 
		) 
	) );


	$wp_customize->add_setting( 
		'hide_show_office_timing_details' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_office_timing_details', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'above_header',
			'type'        => 'checkbox'
		) 
	);	
	
	// Office Timing icon // 
	$wp_customize->add_setting(
    	'tlh_office_timing_icon',
    	array(
	        'default' => 'fa-support',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Renoval_Icon_Picker_Control($wp_customize, 
		'tlh_office_timing_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'above_header',
			'iconset' => 'fa',
			
		))  
	);		
	
	// Office Timing // 
	$wp_customize->add_setting(
    	'tlh_office_timing',
    	array(
	        'default'			=> __('Mon to Fri 9.00 A.m to 6.00 P.m','clever-fox'),
			'sanitize_callback' => 'renoval_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'tlh_office_timing',
		array(
		    'label'   		=> __('Office Timing','clever-fox'),
		    'section' 		=> 'above_header',
			'type'		 =>	'text'
		)  
	);
	
	
}
add_action( 'customize_register', 'renoval_lite_header_settings' );

// Header selective refresh
function renoval_header_partials( $wp_customize ){
	
	// hide_show_nav_btn
	$wp_customize->selective_refresh->add_partial(
		'hide_show_nav_btn', array(
			'selector' => '.navigator .av-button-area',
			'container_inclusive' => true,
			'render_callback' => 'header_navigation',
			'fallback_refresh' => true,
		)
	);
	
	// tlh_mobile_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_icon', array(
		'selector'            => '.content-area .contact-icon i',
		'settings'            => 'tlh_mobile_icon',
		'render_callback'  => 'renoval_tlh_mobile_icon_render_callback',
	) );
	
	// tlh_mobile_title
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_title', array(
		'selector'            => '.content-area .contact-info .widget-title',
		'settings'            => 'tlh_mobile_title',
		'render_callback'  => 'renoval_tlh_mobile_title_render_callback',
	) );
	
	// tlh_mobile_title
	$wp_customize->selective_refresh->add_partial( 'tlh_mobile_number', array(
		'selector'            => '.content-area .contact-info a h5',
		'settings'            => 'tlh_mobile_number',
		'render_callback'  => 'renoval_tlh_mobile_number_render_callback',
	) );
	
	// tlh_email_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_email_icon', array(
		'selector'            => '.content-area .contact-icon i',
		'settings'            => 'tlh_email_icon',
		'render_callback'  => 'renoval_tlh_email_icon_render_callback',
	) );
	// tlh_email_title
	$wp_customize->selective_refresh->add_partial( 'tlh_email_title', array(
		'selector'            => '.widget-contact .content-area .contact-info a h5',
		'settings'            => 'tlh_email_title',
		'render_callback'  => 'renoval_tlh_email_title_render_callback',
	) );
	
	// tlh_email
	$wp_customize->selective_refresh->add_partial( 'tlh_email', array(
		'selector'            => '.widget-contact .content-area .contact-info a p',
		'settings'            => 'tlh_email',
		'render_callback'  => 'renoval_tlh_email_render_callback',
	) );
	
	// tlh_office_timing_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_office_timing_icon', array(
		'selector'            => '.content-area .contact-icon i',
		'settings'            => 'tlh_office_timing_icon',
		'render_callback'  => 'renoval_tlh_office_timing_icon_render_callback',
	) );
	
	// tlh_office_timing
	$wp_customize->selective_refresh->add_partial( 'tlh_office_timing', array(
		'selector'            => '.header-above-info .widget-contact .above-right-content p span',
		'settings'            => 'tlh_office_timing',
		'render_callback'  => 'renoval_tlh_office_timing_render_callback',
	) );
	
	// tlh_button_icon
	$wp_customize->selective_refresh->add_partial( 'tlh_button_icon', array(
		'selector'            => '.header-button .main-button i, .header-button-2 .main-button-3 p i',
		'settings'            => 'tlh_button_icon',
		'render_callback'  => 'renoval_tlh_button_icon_render_callback',
	) );
	
	// nav_btn_lbl
	// $wp_customize->selective_refresh->add_partial( 'nav_btn_lbl', array(
		// 'selector'            => '.header-button .main-button span, .header-button-2 .main-button-3 p',
		// 'settings'            => 'nav_btn_lbl',
		// 'render_callback'  => 'renoval_nav_btn_lbl_render_callback',
	// ) );
	// nav_btn_link
	// $wp_customize->selective_refresh->add_partial( 'nav_btn_link', array(
		// 'selector'            => '.header-button .main-button, .header-button-2 .main-button-3',
		// 'settings'            => 'nav_btn_link',
		// 'render_callback'  => 'renoval_nav_btn_link_render_callback',
	// ) );
	
	// hdr_top_icon_menu
	// $wp_customize->selective_refresh->add_partial( 'hdr_top_icon_menu', array(
		// 'selector'            => '.widget-right .widget_pages .page_item a',
		// 'settings'            => 'hdr_top_icon_menu',
		// 'render_callback'  => 'renoval_hdr_top_icon_menu_render_callback',
	// ) );
	
	// hdr_nav_text_content
	// $wp_customize->selective_refresh->add_partial( 'hdr_nav_text_content', array(
		// 'selector'            => '.nav-area .menu-right .widget_text',
		// 'settings'            => 'hdr_nav_text_content',
		// 'render_callback'  => 'renoval_hdr_nav_text_content_render_callback',
	// ) );
	
	// hdr_nav_contact_content
	// $wp_customize->selective_refresh->add_partial( 'hdr_nav_contact_content', array(
		// 'selector'            => '.nav-area .menu-right .widget-contact .ct-area1',
		// 'settings'            => 'hdr_nav_contact_content',
		// 'render_callback'  => 'renoval_hdr_nav_contact_content_render_callback',
	// ) );
	
	// hdr_nav_contact_content2
	// $wp_customize->selective_refresh->add_partial( 'hdr_nav_contact_content2', array(
		// 'selector'            => '.nav-area .menu-right .widget-contact .ct-area2',
		// 'settings'            => 'hdr_nav_contact_content2',
		// 'render_callback'  => 'renoval_hdr_nav_contact2_content_render_callback',
	// ) );
	
	// hdr_nav_contact_content3
	// $wp_customize->selective_refresh->add_partial( 'hdr_nav_contact_content3', array(
		// 'selector'            => '.nav-area .menu-right .widget-contact .ct-area3',
		// 'settings'            => 'hdr_nav_contact_content3',
		// 'render_callback'  => 'renoval_hdr_nav_contact3_content_render_callback',
	// ) );
	}

add_action( 'customize_register', 'renoval_header_partials' );

// tlh_mobile_icon
function renoval_tlh_mobile_icon_render_callback() {
	return get_theme_mod( 'tlh_mobile_icon' );
}

// tlh_mobile_title
function renoval_tlh_mobile_title_render_callback() {
	return get_theme_mod( 'tlh_mobile_title' );
}

// tlh_mobile_number
function renoval_tlh_mobile_number_render_callback() {
	return get_theme_mod( 'tlh_mobile_number' );
}

// tlh_email_icon
function renoval_tlh_email_icon_render_callback() {
	return get_theme_mod( 'tlh_email_icon' );
}

// tlh_email_title
function renoval_tlh_email_title_render_callback() {
	return get_theme_mod( 'tlh_email_title' );
}

// tlh_email
function renoval_tlh_email_render_callback() {
	return get_theme_mod( 'tlh_email' );
}

// tlh_office_timing_icon
function renoval_tlh_office_timing_icon_render_callback() {
	return get_theme_mod( 'tlh_office_timing_icon' );
}

// tlh_office_timing
function renoval_tlh_office_timing_render_callback() {
	return get_theme_mod( 'tlh_office_timing' );
}

// nav_btn_lbl
// function renoval_nav_btn_lbl_render_callback() {
	// return get_theme_mod( 'nav_btn_lbl' );
// }
// nav_btn_link
// function renoval_nav_btn_link_render_callback() {
	// return get_theme_mod( 'nav_btn_link' );
// }

// hdr_top_icon_menu
// function renoval_hdr_top_icon_menu_render_callback() {
	// return get_theme_mod( 'hdr_top_icon_menu' );
// }

// hdr_nav_text_content
// function renoval_hdr_nav_text_content_render_callback() {
	// return get_theme_mod( 'hdr_nav_text_content' );
// }

// hdr_nav_contact_content
// function renoval_hdr_nav_contact_content_render_callback() {
	// return get_theme_mod( 'hdr_nav_contact_content' );
// }

// hdr_nav_contact_content2
// function renoval_hdr_nav_contact_content2_render_callback() {
	// return get_theme_mod( 'hdr_nav_contact_content2' );
// }

// hdr_nav_contact_content3
// function renoval_hdr_nav_contact_content3_render_callback() {
	// return get_theme_mod( 'hdr_nav_contact_content3' );
// }

