<?php
/*
 *
 * Funfact Default
 */
function renoval_get_funfact_default() {
	return apply_filters(
		'renoval_get_funfact_default', json_encode(
			array(
				array(
					'icon_value'    => 'fa-smile-o',	
					'title'         => esc_html__( '4590', 'clever-fox' ),
					'subtitle'      => esc_html__( '+', 'clever-fox' ),
					'text'          => esc_html__( 'Happy Clients', 'clever-fox' ),
					'id'            => 'customizer_repeater_funfact_003',
				),
				array(
					'icon_value'    => 'fa-globe',	
					'title'         => esc_html__( '7800', 'clever-fox' ),
					'subtitle'      => esc_html__( '+', 'clever-fox' ),
					'text'          => esc_html__( 'Awards Winner', 'clever-fox' ),
					'id'            => 'customizer_repeater_funfact_001',
				),
				array(
					'icon_value'    => 'fa-cogs',	
					'title'        	=> esc_html__( '2390', 'clever-fox' ),
					'subtitle'      => esc_html__( '+', 'clever-fox' ),
					'text'         	=> esc_html__( 'Active Projects', 'clever-fox' ),
					'id'            => 'customizer_repeater_funfact_002',				
				),
				array(
					'icon_value'    => 'fa-users',	
					'title'        	=> esc_html__( '4390', 'clever-fox' ),
					'subtitle'      => esc_html__( '+', 'clever-fox' ),
					'text'         	=> esc_html__( 'Eng. Members', 'clever-fox' ),
					'id'            => 'customizer_repeater_funfact_002',				
				),
				
			)
		)
	);
}
?>