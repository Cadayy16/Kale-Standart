<?php 
	$testimonial_subttl		= get_theme_mod('testimonial_subttl','<h2>Outstanding</h2><div class="animation"><div class="first"><div>Testimonial</div></div></div>');
	$testimonial_desc		= get_theme_mod('testimonial_desc','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');  
	$testimonial_contents	= get_theme_mod('testimonial_contents',renoval_get_testimonial_default()); 
	$hs_testimonial 		= get_theme_mod('hs_testimonial','1');
	if($hs_testimonial=='1'):
?>	

	<!-- Start: Testimonial Section
	=======================-->
	<section id="testimonial-section" class="home-testimonial testimonial-section wow fadeInUp">
		<div class="bg-elements-none">
			<div class="elemt-tb1"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/measure.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
			<div class="elemt-tb2"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/axe.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
			<div class="elemt-tb3"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/crane.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
			<div class="elemt-tb4"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/hammer.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
			<div class="elemt-tb5"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/drill.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
			<div class="elemt-tb6"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/element/bulldozer.png'); ?>" alt="<?php echo esc_attr__('Image','renoval'); ?>"></div>
		</div>
		
		<div class="container">
			<?php if( !empty($testimonial_subttl) || !empty($testimonial_desc)): ?>
				<div class="row">
					<div class="section-title text-center">
						
						<?php if(!empty($testimonial_subttl)): ?>
							<div>
								<?php echo wp_kses_post($testimonial_subttl); ?>
							</div>
						<?php endif; ?>
						
						<?php if(!empty($testimonial_desc)): ?>
							<p>
								<?php echo wp_kses_post($testimonial_desc); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php 
				if ( ! empty( $testimonial_contents ) ) { 
				$testimonial_contents = json_decode( $testimonial_contents );
			?>
				<div class="testimonial-item">
					<div class="owl-thumbs" data-slider-id="2">
						<?php							
							foreach ( $testimonial_contents as $testimonial_item ) {
								$title = ! empty( $testimonial_item->title ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->title, 'Testimonial section' ) : '';
								$subtitle = ! empty( $testimonial_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->subtitle, 'Testimonial section' ) : '';
								$image = ! empty( $testimonial_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->image_url, 'Testimonial section' ) : '';
						?>
							<div class="owl-thumb-item">
								<div class="testimonial-box">
									<?php if(!empty($image)): ?>
										<div class="testimonial-image">
											<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Testimonial Image','renoval'); ?>">
										</div>
									<?php endif; ?>										
									
									<?php if(!empty($title) || !empty($subtitle)): ?>
										<div class="testimonial-content">
											<h4>
												<?php echo esc_html($title); ?>
											</h4>
											<p>
												<?php echo esc_html($subtitle); ?>
											</p>
										</div>
									<?php endif; ?>	
								</div>
							</div>
						<?php } ?>
					</div>						
					<div class="testimonial-carousel owl-carousel wow fadeInUp" data-slider-id="2"> 
						<?php							
							foreach ( $testimonial_contents as $testimonial_item ) {
								$subtitle2 = ! empty( $testimonial_item->subtitle2 ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->subtitle2, 'Testimonial section' ) : '';
								$text = ! empty( $testimonial_item->text ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->text, 'Testimonial section' ) : '';
								$text2 = ! empty( $testimonial_item->text2 ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->text2, 'Testimonial section' ) : '';
								$button = ! empty( $testimonial_item->text2) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->text2,'service section' ) : '';
								$link = ! empty( $testimonial_item->link ) ? apply_filters( 'renoval_translate_single_string', $testimonial_item->link, 'service section' ) : '';
						?>
							<div class="testimonial-content">
								<?php if(!empty($subtitle2)): ?>
									<h3>
										<?php echo esc_html($subtitle2); ?>
									</h3>
								<?php endif; ?>
								
								<?php if(!empty($text)): ?>
									<p>
										<i class="fa fa-quote-left" aria-hidden="true"></i><?php echo esc_html($text); ?></p>
								<?php endif; ?>
								
								<?php if ( ! empty( $button ) && ! empty( $link ) ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" class="main-button">
										<span>
											<?php echo esc_html( $button ); ?>
										</span> 
										<i
										class="fa fa-angle-double-right"></i>
									</a>
								<?php endif; ?>	
							</div>
						<?php } ?>
					</div>		
				</div>
			<?php } ?>
		</div>
	</section>
	<!-- End: Testimonial Section
		=======================-->
<?php endif; ?>