<?php
	if ( ! function_exists( 'renoval_above_header' ) ) :
	function renoval_above_header() {
?>	
	<div id="above-header" class="header-above-info">
				<div class="header-widget">
					<div class="container">
						<div class="row">
							<?php 							
								$hide_show_cntct_details 	= get_theme_mod( 'hide_show_cntct_details','1'); 
								$tlh_contct_icon 			= get_theme_mod( 'tlh_contct_icon','fa-location-arrow');
								$tlh_contact_address 		= get_theme_mod( 'tlh_contact_address','50 Wallstreet,USA'); 
								
								$hide_show_email_details 	= get_theme_mod( 'hide_show_email_details','1');
								$tlh_email_icon 			= get_theme_mod( 'tlh_email_icon','fa-envelope'); 
								$tlh_email 					= get_theme_mod( 'tlh_email','email@company.com');
								
								if($hide_show_email_details =='1' || $hide_show_cntct_details =='1'):
							?>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="widget-left">
										<div class="middle-header-widget">
											<?php if($hide_show_cntct_details =='1' && !empty($tlh_contact_address)): ?>
												<aside class="widget widget-contact">
													<div class="contact-area">
														<div class="contact-icon">
															<a href="#"> <i class="fa <?php echo esc_attr($tlh_contct_icon); ?>"></i></a>
														</div>
														<div class="contact-info">
															<a href="#">
																<p>
																	<span class="left-widget-border">
																		<?php echo wp_kses_post($tlh_contact_address); ?>
																	</span>
																</p>
															</a>
														</div>
													</div>
												</aside>
											<?php endif; ?>	
											
											<?php if($hide_show_email_details =='1' && !empty($tlh_email)): ?>
												<aside class="widget widget-contact">
													<div class="contact-area">
														<div class="contact-icon">
															<a href="#"><i class="fa <?php echo esc_attr($tlh_email_icon); ?>"></i></a>
														</div>
														<a href="mailto:<?php echo esc_attr($tlh_email); ?>" class="contact-info">
															<p>
																<?php echo wp_kses_post($tlh_email); ?>
															</p>
														</a>
													</div>
												</aside>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						
							<?php 
								$top_menu_link_contents		= get_theme_mod('top_menu_link_contents',renoval_get_top_menu_link_default());
									if ( ! empty( $top_menu_link_contents ) ) {
									$top_menu_link_contents = json_decode( $top_menu_link_contents );
							?>
								<div class="col-lg-6 col-md-6 col-sm-12">
									<div class="widget-right">
										<aside id="monster-widget-placeholder-6" class="widget widget_pages">
											<ul>
												<?php 
													foreach ( $top_menu_link_contents as $top_menu_item ) { 
														$title = ! empty( $top_menu_item->title ) ? apply_filters( 'renoval_translate_single_string', $top_menu_item->title, 'Top Link section' ) : '';
														$link = ! empty( $top_menu_item->link ) ? apply_filters( 'renoval_translate_single_string', $top_menu_item->link, 'Top Link section' ) : '';
														
														if ( ! empty( $title ) ) :
												?>
													<li class="page_item page-item-174">
														<a href="<?php echo esc_url( $link ); ?>">
															<?php echo esc_html( $title ); ?>
														</a>
													</li>
												<?php endif; }  ?>
											</ul>
										</aside>
									</div>
								</div>
							<?php } ?>							
						</div>
					</div>
				</div>
			</div>
	<?php 
} endif;
add_action('renoval_above_header', 'renoval_above_header');