<?php
function renoval_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
$theme = wp_get_theme(); // gets the current theme
	/*=========================================
	Slider Section Panel
	=========================================*/
	$wp_customize->add_panel(
		'renoval_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Homepage Sections', 'clever-fox' ),
		)
	);
	
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'clever-fox' ),
			'panel' => 'renoval_frontpage_sections',
			'priority' => 1,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	//Slider Documentation Link
	class WP_slider_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Frontpage Section > Slider Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Slider Doc Link // 
	$wp_customize->add_setting( 
		'slider_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_slider_Customize_Control($wp_customize,
	'slider_doc_link' , 
		array(
			'label'          => __( 'Slider Documentation Link', 'clever-fox' ),
			'section'        => 'slider_setting',
			'type'           => 'radio',
			'description'    => __( 'Slider Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	// Hide / Show 
	$wp_customize->add_setting(
		'hs_slider'
			,array(
			'default'     	=> '1',	
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'hs_slider',
		array(
			'type' => 'checkbox',
			'label' => __('Hide / Show','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	// slider Contents
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'renoval_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Contents','clever-fox'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
	
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'priority' => 5,
			  'default' => renoval_get_slider_default()
			)
		);
		
		// if ( 'Renoval' == $theme->name){
			$wp_customize->add_control( 
			new Renoval_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','clever-fox'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'clever-fox' ),
						'item_name'                         => esc_html__( 'Slider', 'clever-fox' ),					
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_subtitle2_control' => true,
						'customizer_repeater_text2_control' => true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_checkbox_control' => true,
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
		// }
		
	
	//Pro feature
		class Renoval_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { 
			$theme = wp_get_theme(); // gets the current theme	
		if ( 'Renoval' == $theme->name || 'Builderse' == $theme->name || 'Constra' == $theme->name){
			?>
				<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/renoval-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}
			}
		}
		
		$wp_customize->add_setting( 'renoval_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Renoval_slider__section_upgrade(
			$wp_customize,
			'renoval_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
				)
			)
		);
		
		
	//Slider Documentation Link
	class WP_slider_info_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>Setup Article :</h3>
			<p>Frontpage Section > slider Info Section <br><br> <a href="#" style="background-color:#fcb900; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Slider Doc Link // 
	$wp_customize->add_setting( 
		'slider_info_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_slider_info_Customize_Control($wp_customize,
	'slider_info_doc_link' , 
		array(
			'label'          => __( 'Slider Info Documentation Link', 'clever-fox' ),
			'section'        => 'slider_setting',
			'type'           => 'radio',
			'description'    => __( 'Slider Info Documentation Link', 'clever-fox' ), 
		) 
	) );
	
	// About Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_slider_info' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'renoval_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_slider_info', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'clever-fox' ),
			'section'     => 'slider_setting',
			'type'        => 'checkbox'
		) 
	);	
	
	/**
	 * Customizer Repeater for add Step
	 */
	
		$wp_customize->add_setting( 'slider_info_contents', 
			array(
			 'sanitize_callback' => 'renoval_repeater_sanitize',
			 'transport'         => $selective_refresh,
			 'priority' => 14,
			 'default' => renoval_get_slider_info_default()
			)
		);
		
		$wp_customize->add_control( 
			new Renoval_Repeater( $wp_customize, 
				'slider_info_contents', 
					array(
						'label'   => esc_html__('Slider Info','clever-fox'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Info', 'clever-fox' ),
						'item_name'                         => esc_html__( 'sliderinfo', 'clever-fox' ),
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_link_control' => true,
					) 
				) 
			);
	
	//Pro feature
		class Renoval_slider_info_section_upgrade extends WP_Customize_Control {
			public function render_content() { 
				$theme = wp_get_theme(); // gets the current theme	
				if ( 'Renoval' == $theme->name || 'Builderse' == $theme->name || 'Constra' == $theme->name){
			?>
				<a class="customizer_slider_info_upgrade_section up-to-pro" href="https://www.nayrathemes.com/renoval-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','clever-fox'); ?></a>
			<?php
			}}
		}
		
		$wp_customize->add_setting( 'renoval_slider_info_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 5,
		));
		$wp_customize->add_control(
			new Renoval_slider_info_section_upgrade(
			$wp_customize,
			'renoval_slider_info_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
				)
			)
		);
}

add_action( 'customize_register', 'renoval_slider_setting' );