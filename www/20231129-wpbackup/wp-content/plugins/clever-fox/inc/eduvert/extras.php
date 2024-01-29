<?php
/**
 * Eduvert Above Header Social
 */
if ( ! function_exists( 'eduvert_abv_hdr_social' ) ) {
	function eduvert_abv_hdr_social() {
		//above_header_first
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
		$social_icons 				= get_theme_mod( 'social_icons',eduvert_get_social_icon_default());	
		
				 if($hide_show_social_icon == '1') { ?>
					<li>
						<div class="widget-left text-nt-left text-center">
							<aside class="widget widget-social-widget">
								<ul>
									<?php
										$social_icons = json_decode($social_icons);
										if( $social_icons!='' )
										{
										foreach($social_icons as $social_item){	
										$social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'eduvert_translate_single_string', $social_item->icon_value, 'Header section' ) : '';	
										$social_link = ! empty( $social_item->link ) ? apply_filters( 'eduvert_translate_single_string', $social_item->link, 'Header section' ) : '';
									?>
										<li><a class="<?php echo esc_attr(substr(str_replace("-","",$social_icon),2)); ?>" href="<?php echo esc_url( $social_link ); ?>"><i class="fa <?php echo esc_attr( $social_icon ); ?>"></i></a></li>
									<?php }} ?>
								</ul>
							</aside>
						</div>
					</li>
				<?php } 
	}
}
add_action( 'eduvert_abv_hdr_social', 'eduvert_abv_hdr_social' );

/*
 *
 * Social Icon
 */
function eduvert_get_social_icon_default() {
	return apply_filters(
		'eduvert_get_social_icon_default', json_encode(
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
				)
			)
		)
	);
}


/*
 *
 * Slider Default
 */
 function eduvert_get_slider_default() {
	return apply_filters(
		'eduvert_get_slider_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/slider/slide1.png',
					'title'           => esc_html__( 'The Leader In Online Learning', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Build in increadible learning', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Experience', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore Course', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_slider_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/slider/slide2.png',
					'title'           => esc_html__( 'The Leader In Online Learning', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Build in increadible learning', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Experience', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore Course', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_slider_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/slider/slide3.png',
					'title'           => esc_html__( 'The Leader In Online Learning', 'clever-fox' ),
					'subtitle'         => esc_html__( 'Build in increadible learning', 'clever-fox' ),
					'subtitle2'         => esc_html__( 'Experience', 'clever-fox' ),
					'text'            => esc_html__( 'There are many variations of passages of Lorem Ipsum available but the majority have suffered injected humour dummy now.', 'clever-fox' ),
					'text2'	  =>  esc_html__( 'Explore Course', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_slider_003',
				),
			)
		)
	);
}


/*
 *
 * Course Category Default
 */
 function eduvert_get_course_cat_default() {
	return apply_filters(
		'eduvert_get_course_cat_default', json_encode(
				 array(
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/categorie/Image.png',
					'title'           => esc_html__( 'All Courses', 'clever-fox' ),
					'subtitle'         => esc_html__( '14 course', 'clever-fox' ),
					'text'         => esc_html__( 'There are many variations of passages of Lorem Ipsum available', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_course_cat_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/categorie/Image-1.png',
					'title'           => esc_html__( 'Business Course', 'clever-fox' ),
					'subtitle'         => esc_html__( '4 course', 'clever-fox' ),
					'text'         => esc_html__( 'There are many variations of passages of Lorem Ipsum available', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_course_cat_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/categorie/Image-2.png',
					'title'           => esc_html__( 'Graphics Design', 'clever-fox' ),
					'subtitle'         => esc_html__( '7 course', 'clever-fox' ),
					'text'         => esc_html__( 'There are many variations of passages of Lorem Ipsum available', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_course_cat_003',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL .'inc/eduvert/images/categorie/Image-3.png',
					'title'           => esc_html__( 'Web Developer', 'clever-fox' ),
					'subtitle'         => esc_html__( '6 course', 'clever-fox' ),
					'text'         => esc_html__( 'There are many variations of passages of Lorem Ipsum available', 'clever-fox' ),
					'link'	  =>  esc_html__( '#', 'clever-fox' ),
					'id'              => 'customizer_repeater_course_cat_004',
				)
			)
		)
	);
}


/*
 *
 * Funfact Default
 */
 function eduvert_get_funfact_default() {
	return apply_filters(
		'eduvert_get_funfact_default', json_encode(
				 array(
				array(
					'icon_value'       => 'fa-user',
					'title'           => esc_html__( '786', 'clever-fox' ),
					'subtitle'           => esc_html__( 'K', 'clever-fox' ),
					'text'            => esc_html__( 'Happy Students', 'clever-fox' ),
					'id'              => 'customizer_repeater_funfact_001'					
				),
				array(
					'icon_value'       => 'fa-calendar-plus-o',
					'title'           => esc_html__( '25', 'clever-fox' ),
					'subtitle'           => esc_html__( '+', 'clever-fox' ),
					'text'            => esc_html__( 'Our Experience', 'clever-fox' ),
					'id'              => 'customizer_repeater_funfact_002'
				),
				array(
					'icon_value'       => 'fa-trophy',
					'title'           => esc_html__( '456', 'clever-fox' ),
					'subtitle'           => esc_html__( '+', 'clever-fox' ),
					'text'            => esc_html__( 'Award Earned', 'clever-fox' ),
					'id'              => 'customizer_repeater_funfact_003'
				),
				array(
					'icon_value'       => 'fa-star',
					'title'           => esc_html__( '4.5', 'clever-fox' ),
					'subtitle'           => esc_html__( 'K', 'clever-fox' ),
					'text'            => esc_html__( 'Student Review', 'clever-fox' ),
					'id'              => 'customizer_repeater_funfact_004'
				),
			)
		)
	);
}


