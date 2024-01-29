<?php
function renoval_lite_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','clever-fox'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	//Above Footer Documentation Link
	class WP_footer_above_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Footer > Above Footer <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Above Footer Doc Link // 
	$wp_customize->add_setting( 
		'footer_above_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_footer_above_Customize_Control($wp_customize,
	'footer_above_doc_link' , 
		array(
			'label'          => __( 'Footer Above Documentation Link', 'clever-fox' ),
			'section'        => 'footer_above',
			'type'           => 'radio',
			'description'    => __( 'Sidebar Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'clever-fox' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	// Get In Touch Title
	$wp_customize->add_setting(
    	'footer_get_in_touch_title',
    	array(
			'default' => __('Get In Touch','clever-fox'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_get_in_touch_title',
		array(
		    'label'   		=> __('Get In Touch Title','clever-fox'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// Get In Touch Link
	$wp_customize->add_setting(
    	'footer_get_in_touch_link',
    	array(
			'default' => '#',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_url',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_get_in_touch_link',
		array(
		    'label'   		=> __('Get In Touch Link','clever-fox'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'footer_get_in_touch_icon',
    	array(
	        'default' => 'fa-commenting-o',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Renoval_Icon_Picker_Control($wp_customize, 
		'footer_get_in_touch_icon',
		array(
		    'label'   		=> __('Icon','clever-fox'),
		    'section' 		=> 'footer_above',
			'iconset' => 'fa',
			
		))  
	);	
}
add_action( 'customize_register', 'renoval_lite_footer' );

// Footer selective refresh
function renoval_lite_footer_partials( $wp_customize ){	
	//footer_above_content 
	$wp_customize->selective_refresh->add_partial( 'footer_above_content', array(
		'selector'            => '.abover-footer .row',
	) );
	
	}

add_action( 'customize_register', 'renoval_lite_footer_partials' );