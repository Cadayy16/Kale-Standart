<?php function renoval_get_testimonial_default() {
	return apply_filters(
		'renoval_get_testimonial_default', json_encode(
				 array(
				array(
					'image_url'      => CLEVERFOX_PLUGIN_URL . 'inc/builderse/images/testimonial/testimonial-1.jpg',
					'title'          => esc_html__( 'Elexander', 'renoval' ),
					'subtitle'       => esc_html__( 'Engineer Manager', 'renoval' ),
					'subtitle2'      => esc_html__( 'Best Construction & Renovate Designer', 'renoval' ),
					'text'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available on its but majority have suffered Phasellus suscipit volutpat lorem id semper molestie egestas eros vehicula Lorem Ipsum available on its but majority have suffered.', 'renoval' ),
					'text2'	  		 =>  esc_html__( 'View Reviews', 'renoval' ),
					'id'             => 'customizer_repeater_testimonial_001',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/builderse/images/testimonial/testimonial-2.jpg',
					'title'          => esc_html__( 'James Juan', 'renoval' ),
					'subtitle'       => esc_html__( 'Construction Simulator', 'renoval' ),
					'subtitle2'      => esc_html__( 'Engineer Very Hard Work For Design', 'renoval' ),
					'text'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available on its but majority have suffered Phasellus suscipit volutpat lorem id semper molestie egestas eros vehicula Lorem Ipsum available on its but majority have suffered.', 'renoval' ),
					'text2'	  		 =>  esc_html__( 'View Reviews', 'renoval' ),
					'id'              => 'customizer_repeater_testimonial_002',
				),
				array(
					'image_url'       => CLEVERFOX_PLUGIN_URL . 'inc/builderse/images/testimonial/testimonial-3.jpg',
					'title'          => esc_html__( 'John Marsh', 'renoval' ),
					'subtitle'       => esc_html__( 'Engineer Manager', 'renoval' ),
					'subtitle2'      => esc_html__( 'Used Best Construction Mashinary', 'renoval' ),
					'text'           => esc_html__( 'There are many variations of passages of Lorem Ipsum available on its but majority have suffered Phasellus suscipit volutpat lorem id semper molestie egestas eros vehicula Lorem Ipsum available on its but majority have suffered.', 'renoval' ),
					'text2'	  		 =>  esc_html__( 'View Reviews', 'renoval' ),
					'id'              => 'customizer_repeater_testimonial_003',
				),
			)
		)
	);
}

?>