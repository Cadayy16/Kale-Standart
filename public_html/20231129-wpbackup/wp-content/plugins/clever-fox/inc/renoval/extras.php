<?php
/**
 * Renoval Above Header Social
 */
if ( ! function_exists( 'renoval_abv_hdr_social' ) ) {
	function renoval_abv_hdr_social() {
		//above_header_first
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
		$social_icons 				= get_theme_mod( 'social_icons',renoval_get_social_icon_default());	
		
				 if($hide_show_social_icon == '1') { ?>
					<aside class="widget widget-social-widget">
						<ul>
							<?php
								$social_icons = json_decode($social_icons);
								if( $social_icons!='' )
								{
								foreach($social_icons as $social_item){	
								$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'renoval_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
								$social_link = ! empty( $social_item->link ) ? apply_filters( 'renoval_translate_single_string', $social_item->link, 'Header section' ) : '';
							?>
								<li><a href="<?php echo esc_url( $social_link ); ?>" class="social-icon"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
							<?php }} ?>
						</ul>
					</aside>
				<?php } 
	}
}
add_action( 'renoval_abv_hdr_social', 'renoval_abv_hdr_social' );


/**
 * Renoval Above Header Contact Info
 */
if ( ! function_exists( 'renoval_abv_hdr_contact_info' ) ) {
	function renoval_abv_hdr_contact_info() {
		
			$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
			$tlh_contct_icon 			= get_theme_mod( 'tlh_contct_icon','fa-support'); 	
			$tlh_contact_title 			= get_theme_mod( 'tlh_contact_title','Live Chat'); 
			$tlh_contact_link 			= get_theme_mod( 'tlh_contact_link'); 
				if($hide_show_cntct_details == '1') { ?>
					<aside class="widget widget-contact wgt-1">
						<div class="contact-area">
							<?php if(!empty($tlh_contct_icon)): ?>
								<div class="contact-icon">
								   <i class="fa <?php echo  esc_attr($tlh_contct_icon); ?>"></i>
								</div>
							<?php endif; ?>
							<a href="<?php echo esc_url($tlh_contact_link); ?>" class="contact-info">
								<span class="title"><?php echo esc_html($tlh_contact_title); ?></span>
							</a>
						</div>
					</aside>
				<?php }
				
					$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
					$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope'); 	
					$tlh_email_title 			= get_theme_mod( 'tlh_email_title','info@example.com'); 
					$tlh_email_link 			= get_theme_mod( 'tlh_email_link'); 
				?>	
				<?php if($hide_show_email_details == '1') { ?>
						 <aside class="widget widget-contact wgt-2">
							<div class="contact-area">
								<?php if(!empty($tlh_email_icon)): ?>
									<div class="contact-icon">
										<i class="fa <?php echo  esc_attr($tlh_email_icon); ?>"></i>
									</div>
								<?php endif; ?>	
								<a href="<?php echo esc_url($tlh_email_link); ?>" class="contact-info">
									<span class="title"><?php echo esc_html($tlh_email_title); ?></span>
								</a>
							</div>
						</aside>
					<?php } 
					
						$hide_show_mbl_details 	= get_theme_mod( 'hide_show_mbl_details','1'); 	
						$tlh_mobile_icon 		= get_theme_mod( 'tlh_mobile_icon','fa-whatsapp');
						$tlh_mobile_title 		= get_theme_mod( 'tlh_mobile_title','+01-9876543210'); 
						$tlh_mobile_link 		= get_theme_mod( 'tlh_mobile_link'); 
					?>
					<?php if($hide_show_mbl_details == '1') { ?>
						<aside class="widget widget-contact wgt-3">
							<div class="contact-area">
								<?php if(!empty($tlh_mobile_icon)): ?>
									<div class="contact-icon">
										<i class="fa <?php echo  esc_attr($tlh_mobile_icon); ?>"></i>
									</div>
								<?php endif; ?>	
								<a href="<?php echo esc_url($tlh_mobile_link); ?>" class="contact-info">
									<span class="title"><?php echo esc_html($tlh_mobile_title); ?></span>
								</a>
							</div>
						</aside>
					<?php } ?>		
			<?php
	}
}
add_action( 'renoval_abv_hdr_contact_info', 'renoval_abv_hdr_contact_info' );


/*
 *
 * Social Icon
 */
function renoval_get_social_icon_default() {
	return apply_filters(
		'renoval_get_social_icon_default', json_encode(
				 array(
				array(
					'icon_value'	  =>  esc_html__( 'fa-facebook', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_001',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-google-plus', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_002',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-twitter', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_003',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-linkedin', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_004',
				),
				array(
					'icon_value'	  =>  esc_html__( 'fa-behance', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_header_social_005',
				)
			)
		)
	);
}

/*
 *
 * Footer Above Default
 */
 function renoval_get_footer_above_default() {
	return apply_filters(
		'renoval_get_footer_above_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-clock-o',
					'title'           => esc_html__( 'Mon-Fri 9am-6pm', 'clever-fox' ),
					'text'            => esc_html__( 'Mon-Sat: 8am-5pm', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_001',
					
				),
				array(
					'icon_value'       => 'fa-envelope-o',
					'title'           => esc_html__( 'Support Mail', 'clever-fox' ),
					'text'            => esc_html__( 'info@example.com', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_002',
				
				),
				array(
					'icon_value'       => 'fa-map-marker',
					'title'           => esc_html__( '380 St Klida Road', 'clever-fox' ),
					'text'            => esc_html__( 'Melbourne, Australia', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_footer_above_003',
			
				),
			)
		)
	);
}



/*
 *
 * Slider Default
 */
 function renoval_get_slider_default() {
	return apply_filters(
		'renoval_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       	=> CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/slider/slider-1.jpg',
					'title'           	=> esc_html__( 'Can Go Extra To Build The', 'clever-fox' ),
					'subtitle'         	=> esc_html__( 'Best', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'We Never Want Fear', 'clever-fox' ),
					'text2'	  			=>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	 			=>  esc_html__( '#', 'clever-fox' ),
					'id'             	=> 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       	=> CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/slider/slider-2.jpg',
					'title'           	=> esc_html__( 'Can Go Extra To Build The', 'clever-fox' ),
					'subtitle'         	=> esc_html__( 'Best', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'We Never Want Fear', 'clever-fox' ),
					'text2'	 	 		=>  esc_html__( 'Get Started', 'clever-fox' ),
					'link'	  			=>  esc_html__( '#', 'clever-fox' ),
					'id'              	=> 'customizer_repeater_slider_002',
				),
			)
		)
	);
}

/*
 *
 * Slider Info Default
 */
 function renoval_get_slider_info_default() {
	return apply_filters(
		'renoval_get_slider_info_default', json_encode(
			array(
				array(
					'title'          => esc_html__( 'Consulting', 'clever-fox' ),
					'text'           => esc_html__( 'using Lorem ipsum', 'clever-fox' ),
					'icon_value'     => 'fa-comments',
					'link'      	 => '#',
					'id'             => 'customizer_repeater_slider_info_001',
				),
				array(
					'title'          => esc_html__( 'Architecture', 'clever-fox' ),
					'text'           => esc_html__( 'using Lorem ipsum', 'clever-fox' ),
					'icon_value'     => 'fa-clone',
					'link'       	 => '#',
					'id'             => 'customizer_repeater_slider_info_002',				
				),
				array(
					'title'          => esc_html__( 'Urban Design', 'clever-fox' ),
					'text'           => esc_html__( 'using Lorem ipsum', 'clever-fox' ),
					'icon_value'     => 'fa-instagram',
					'link'           => '#',
					'id'             => 'customizer_repeater_slider_info_003',
				),
				array(
					'title'          => esc_html__( 'Flat Share', 'clever-fox' ),
					'text'           => esc_html__( 'using Lorem ipsum', 'clever-fox' ),
					'icon_value'     => 'fa-user',
					'link'       	 => '#',
					'id'             => 'customizer_repeater_slider_info_004',
				),
			)
		)
	);
}


/*
 *
 * Service Default
 */
function renoval_get_service_default() {
	return apply_filters(
		'renoval_get_service_default', json_encode(
			array(
				array(
					'icon_value'   => 'fa-university',	
					'title'        => esc_html__( 'Apartment Design', 'clever-fox' ),
					'text'         => esc_html__( 'We will work with you small large changes so you house your dreams', 'clever-fox' ),
					'text2'        => esc_html__( 'Learn More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_001',
				),
				array(
					'icon_value'   => 'fa-signal',	
					'title'        => esc_html__( 'Repair Welding', 'clever-fox' ),
					'text'         => esc_html__( 'We will work with you small large changes so you house your dreams', 'clever-fox' ),
					'text2'        => esc_html__( 'Learn More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_002',
				),
				array(
					'icon_value'   => 'fa-tv',	
					'title'        => esc_html__( 'Expert Mechanical', 'clever-fox' ),
					'text'         => esc_html__( 'We will work with you small large changes so you house your dreams', 'clever-fox' ),
					'text2'        => esc_html__( 'Learn More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_003',
				),
				array(
					'icon_value'   => 'fa-adjust',	
					'title'        => esc_html__( 'Rooms & Halls', 'clever-fox' ),
					'text'         => esc_html__( 'We will work with you small large changes so you house your dreams', 'clever-fox' ),
					'text2'        => esc_html__( 'Learn More', 'clever-fox' ),
					'link'         => '#',
					'id'           => 'customizer_repeater_service_004',
				),
			)
		)
	);
}

/*
 *
 * Icon Menu Default
 */
 function renoval_get_icon_menu_default() {
	return apply_filters(
		'gradiant_get_icon_menu_default', json_encode(
				 array(
				array(
					'title'           => esc_html__( 'Commercial', 'clever-fox' ),
					'icon_value'       => 'fa-building',
					'id'              => 'customizer_repeater_hdr_icon_menu_001',
				),
				array(
					'title'           => esc_html__( 'Residential', 'clever-fox' ),
					'icon_value'       => 'fa-home',
					'id'              => 'customizer_repeater_hdr_icon_menu_002',				
				)
			)
		)
	);
}



/*
 *
 * Client Default
 */
function renoval_get_client_default() {
	return apply_filters(
		'renoval_get_client_default', json_encode(
			array(
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-1.png',
					'title'         => esc_html__( 'Creative', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Business', 'clever-fox' ),
					'link'       	=> '#',
					'id'            => 'customizer_repeater_client_001',
				),
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-2.png',
					'title'         => esc_html__( 'Creative', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Logo', 'clever-fox' ),
					'link'          => '#',
					'id'            => 'customizer_repeater_client_002',				
				),
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-3.png',
					'title'         => esc_html__( 'Website', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Hosting', 'clever-fox' ),
					'link'          => '#',
					'id'            => 'customizer_repeater_client_003',
				),
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-4.png',
					'title'         => esc_html__( 'Digital', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Marketing', 'clever-fox' ),
					'link'       	=> '#',
					'id'            => 'customizer_repeater_client_004',
				),
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-5.png',
					'title'         => esc_html__( 'Business', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Group', 'clever-fox' ),
					'link'       	=> '#',
					'id'            => 'customizer_repeater_client_005',
				),
				array(
					'image_url'     => CLEVERFOX_PLUGIN_URL . 'inc/renoval/images/sponsor/sponsor-1.png',
					'title'         => esc_html__( 'Creative', 'clever-fox' ),
					'subtitle'      => esc_html__( 'Business', 'clever-fox' ),
					'link'       	=> '#',
					'id'            => 'customizer_repeater_client_006',
				),
			)
		)
	);
}