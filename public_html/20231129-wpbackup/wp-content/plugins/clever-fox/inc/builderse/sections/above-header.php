<?php
	if ( ! function_exists( 'renoval_above_header' ) ) :
	function renoval_above_header() {
?>	
	<div id="above-header" class="header-above-info">
		<div class="header-widget">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-4 col-md-4 col-sm-12">
						<?php 
								$tlh_text_slider = get_theme_mod( 'tlh_text_slider','Welcome to Renoval Construction Company, Renoval Construction Company, Construction Company');
								
								$slider_text = explode(',', $tlh_text_slider);
								
								if(!empty($tlh_text_slider)){
							?>
								<div class="above-left-content animate seven">
									<aside class="widget widget-text">
										<div class="owl-carousel owl-theme mation-text">
											<?php foreach($slider_text as $slider){ ?>
												<div class="item">
														<p>
															<span>
																<?php echo esc_html($slider); ?>
															</span>
														</p>
												</div>
											<?php } ?>
										</div>
									</aside>
								</div>
							<?php } ?>
					</div>
					<?php 
						$hide_show_social_icon 		= get_theme_mod( 'hide_show_social_icon','1');
						$hide_show_office_timing_details= get_theme_mod( 'hide_show_office_timing_details','1');
						$tlh_office_timing 			= get_theme_mod( 'tlh_office_timing','Mon to Fri 9.00 A.m to 6.00 P.m');
						
						if($hide_show_office_timing_details =='1' && !empty($tlh_office_timing)):
					?>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<aside class="widget widget-contact">
								<div class="contact-area">
									<div class="above-right-content animate seven">
									<p>
										<span>
											<?php echo wp_kses_post($tlh_office_timing); ?>
										</span>
									</p>
									</div>	
								</div>
							</aside>
						</div>
					<?php endif; ?>
					
					<?php if($hide_show_social_icon =='1'){ ?>
						<div class="col-lg-4 col-md-4 col-sm-12">
							<?php do_action('renoval_abv_hdr_social'); ?>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php 
} endif;
add_action('renoval_above_header', 'renoval_above_header');