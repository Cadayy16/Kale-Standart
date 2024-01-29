<?php  
	$funfact_subtitle			= get_theme_mod('funfact_subtitle','<h2>Outstanding</h2><div class="animation"><div class="first"><div>Funfact</div></div></div>');	
	$funfact_description	= get_theme_mod('funfact_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.'); 
	$funfact_contents		= get_theme_mod('funfact_contents',renoval_get_funfact_default());
	$funfact_left_img		= get_theme_mod('funfact_left_img',esc_url(CLEVERFOX_PLUGIN_URL.'inc/constra/images/left-funfact.jpg'));  
	$funfact_bg_img			= get_theme_mod('funfact_bg_img',esc_url(CLEVERFOX_PLUGIN_URL.'inc/constra/images/funfact-bg.jpg')); 
?>	
	<!--=======================
		Start: Funfact Section
	=======================-->
	<section id="funfact-section" class="funfact-section home-funfact wow fadeInUp" <?php if(!empty($funfact_bg_img)){ ?> style="background-image:url(<?php echo esc_url($funfact_bg_img) ?>);" <?php } ?>>
		<div class="container">
			<?php if( !empty($funfact_subtitle) || !empty($funfact_description)): ?>
				<div class="section-title text-center">
					
					<?php if(!empty($funfact_subtitle)): ?>
						<div>
							<?php echo wp_kses_post($funfact_subtitle); ?>
						</div>
					<?php endif; ?>
					
					<?php if(!empty($funfact_description)): ?>
						<p>
							<span class="funfact-title">
								<?php echo wp_kses_post($funfact_description); ?>
							</span>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			
			<div class="row">
				<?php if(!empty($funfact_left_img)): ?>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="left-area-funfact">
							<div class="ring">
								<div class="left-image">
									<img class="rounded-circle" src="<?php echo esc_url($funfact_left_img); ?>" alt="<?php echo esc_attr__('Funfact Image','clever-fox'); ?>">
									<span class="funfact-effect-1"></span>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="row">
						<?php
							if ( ! empty( $funfact_contents ) ) {
							$funfact_contents = json_decode( $funfact_contents );
							foreach ( $funfact_contents as $funfact_item ) {
								$title = ! empty( $funfact_item->title ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->title, 'Funfact section' ) : '';
								$subtitle = ! empty( $funfact_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->subtitle, 'Funfact section' ) : '';
								$text = ! empty( $funfact_item->text ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->text, 'Funfact section' ) : '';
								$image = ! empty( $funfact_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->image_url, 'Funfact section' ) : '';
								$icon = ! empty( $funfact_item->icon_value ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->icon_value, 'Funfact section' ) : '';
								$choice = ! empty( $funfact_item->choice ) ? apply_filters( 'renoval_translate_single_string', $funfact_item->choice, 'Funfact section' ) : '';
						?>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="funfact-box spin thick">
									<div class="funfact-icon">
										<?php if($choice =='customizer_repeater_image'): ?>
											<img src="<?php echo esc_url($image); ?>" />
										<?php else: ?>
											<i class="fa <?php echo esc_attr($icon); ?>"></i>
										<?php endif; ?>
									</div>
									<div class="funfact-content">
										
										<?php if(!empty($text)): ?>
											<p>
												<?php echo esc_html($text); ?>
											</p>
										<?php endif; ?>
										
										<?php if(!empty($title)  || !empty($subtitle)): ?>
											<h1><span class="counter"><?php echo esc_html($title); ?></span> <?php echo esc_html($subtitle); ?></h1>
										<?php endif; ?>	
									</div>
									
									<div class="section-element-funfact">
										<img src="<?php echo CLEVERFOX_PLUGIN_URL.'inc/constra/images/section-bg.png'; ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>"> 
							</div>
									<span class="fun-over"></span>
								</div>
							</div>
						<?php } } ?>	
					</div>
				</div>	 	
			</div>
		</div>
	</section>
	<!-- End: Funfact Section
	=======================-->