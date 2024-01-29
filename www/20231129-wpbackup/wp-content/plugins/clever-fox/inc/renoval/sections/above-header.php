<?php
	if ( ! function_exists( 'renoval_above_header' ) ) :
	function renoval_above_header() {
		$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1'); 
			
			$hide_show_mbl_details 		= get_theme_mod( 'hide_show_mbl_details','1'); 
			$tlh_mobile_icon 			= get_theme_mod( 'tlh_mobile_icon','fa-phone');
			$tlh_mobile_number 			= get_theme_mod( 'tlh_mobile_number','+70 975 975 70'); 
			
			$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
			$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope'); 
			$tlh_email 					= get_theme_mod( 'tlh_email','email@company.com');
			
			$hide_show_office_timing_details= get_theme_mod( 'hide_show_office_timing_details','1');
			$tlh_office_timing_icon 	= get_theme_mod( 'tlh_office_timing_icon','fa-clock-o'); 
			$tlh_office_timing 			= get_theme_mod( 'tlh_office_timing','Mon to Fri 9.00 A.m to 6.00 P.m');
			
			if($hide_show_social_icon =='1' || $hide_show_office_timing_details =='1' || $hide_show_email_details =='1' || $hide_show_mbl_details =='1'):
		?>
			<div id="above-header" class="header-above-info">
				<div class="header-widget">
					<div class="container">
						<div class="row align-items-center">
							<?php if($hide_show_social_icon =='1'): ?>
								<div class="col-lg-4 col-md-4 col-sm-12">
									<div class="widget-right social-effect-2">
										<?php do_action('renoval_abv_hdr_social'); ?>
									</div>
								</div>
							<?php endif; ?>
							
							<?php if($hide_show_office_timing_details =='1' || $hide_show_email_details =='1' || $hide_show_mbl_details =='1'): ?>
								<div class="col-lg-8 col-md-8 col-sm-12">
									<div class="widget-left">
										<?php if($hide_show_mbl_details =='1' && !empty($tlh_mobile_number)): ?>
											<aside class="widget widget-contact">
												<div class="contact-area">
													<div class="contact-icon">
														<i class="fa <?php echo esc_attr($tlh_mobile_icon); ?>"></i>
													</div>
													<a href="tel:<?php echo esc_attr(str_replace(' ','',$tlh_mobile_number)); ?>" class="contact-info">
														<span class="title">
															<?php echo wp_kses_post($tlh_mobile_number); ?>
														</span>
													</a>
												</div>
											</aside>
										<?php endif; ?>
										
										<?php if($hide_show_email_details =='1' && !empty($tlh_email)): ?>
											<aside class="widget widget-contact">
												<div class="contact-area">
													<div class="contact-icon">
														<i class="fa <?php echo esc_attr($tlh_email_icon); ?>"></i>
													</div>
													<a href="mailto:<?php echo esc_attr($tlh_email); ?>" class="contact-info">
														<span class="title">
															<?php echo wp_kses_post($tlh_email); ?>
														</span>
													</a>
												</div>
											</aside>
										<?php endif; ?>
										
										<?php if($hide_show_office_timing_details =='1' && !empty($tlh_office_timing)): ?>
											<aside class="widget widget-contact">
												<div class="contact-area">
													<div class="above-right-content animate seven">
														<div class="contact-icon">
															<i class="fa <?php echo esc_attr($tlh_office_timing_icon); ?>"></i>
														</div>
														<p>
															<?php echo wp_kses_post($tlh_office_timing); ?>
														</p>
													</div>	
												</div>
											</aside>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; 
} endif;
add_action('renoval_above_header', 'renoval_above_header');
?>
