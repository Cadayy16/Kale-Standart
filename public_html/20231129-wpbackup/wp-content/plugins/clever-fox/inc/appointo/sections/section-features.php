<?php  
	$features_title 			= get_theme_mod('features_title','Why Choose <span class="primary-color">Appointo?</span>');
	$features_desc				= get_theme_mod('features_desc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'); 
	$features_contents			= get_theme_mod('features_contents',gradiant_get_features_default());
	$features_sec_column		= get_theme_mod('features_sec_column','6'); 
	$features_right_img			= get_theme_mod('features_right_img', plugin_dir_url( dirname(__FILE__) ) .'images/features.png'); 	
?>	
<section id="features-section" class="features-section bg-primary-light av-py-default features-home shapes-section">
	<div class="av-container">
		<div class="av-columns-area wow fadeInUp">
			<?php if(empty($features_right_img)): ?>
			<div class="av-column-12">
			<?php else: ?>
			<div class="av-column-7">
			<?php endif; ?>
				<?php if(!empty($features_title)  || !empty($features_desc)): ?>
					<div class="av-columns-area">
						<div class="av-column-12">
							<div class="heading-default text-left wow fadeInUp">
								<?php if(!empty($features_title)): ?>
									<h3><?php echo wp_kses_post($features_title); ?></h3>
									<span class="separator"><span><span></span></span></span>
								<?php endif; ?>
								<?php if(!empty($features_desc)): ?>
									<p><?php echo wp_kses_post($features_desc); ?></p>
								<?php endif; ?>	
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="av-columns-area features-contents">
					<span class="tilter d-none"></span>
					<?php
						if ( ! empty( $features_contents ) ) {
						$features_contents = json_decode( $features_contents );
						foreach ( $features_contents as $features_item ) {
							$title = ! empty( $features_item->title ) ? apply_filters( 'gradiant_translate_single_string', $features_item->title, 'Features section' ) : '';
							$text = ! empty( $features_item->text ) ? apply_filters( 'gradiant_translate_single_string', $features_item->text, 'Features section' ) : '';
							$link = ! empty( $features_item->link ) ? apply_filters( 'gradiant_translate_single_string', $features_item->link, 'Features section' ) : '';
							$image = ! empty( $features_item->image_url ) ? apply_filters( 'gradiant_translate_single_string', $features_item->image_url, 'Features section' ) : '';
							$icon = ! empty( $features_item->icon_value ) ? apply_filters( 'gradiant_translate_single_string', $features_item->icon_value, 'Features section' ) : '';
							$choice = ! empty( $features_item->choice ) ? apply_filters( 'gradiant_translate_single_string', $features_item->choice, 'Features section' ) : '';
					?>
						<div class="av-column-<?php echo esc_attr($features_sec_column); ?> av-sm-column-6 tilter">
							<div class="tilter__figure">
								<div class="features-item">
									<div class="features-inner tilter__caption">
										<?php if($choice =='customizer_repeater_image'): ?>
											<div class="features-icon">
												<img src="<?php echo esc_url($image); ?>" />
											</div>
										<?php else: ?>
											<div class="features-icon">
												<i class="fa <?php echo esc_attr($icon); ?>"></i>
											</div>
										<?php endif; ?>
										
										<?php if(!empty($title)  || !empty($text)): ?>
											<div class="features-content">
												<h6 class="features-title"><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h6>
												<p><?php echo esc_html($text); ?></p>
											</div>
										<?php endif; ?>
										
										
										<?php if($choice =='customizer_repeater_image'): ?>
											<div class="modern-icon"><img src="<?php echo esc_url($image); ?>" /></div>
										<?php else: ?>
											<div class="modern-icon"><i class="fa <?php echo esc_attr($icon); ?>"></i></div>
										<?php endif; ?>
										
									</div>
									<div class="tilter__deco--lines"></div>
								</div>
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
			<?php if(!empty($features_right_img)): ?>
				<div class="av-column-5 featuresbgwrapper">
					<div class="features-image-wrap">
						<div class="features-image">
							<img src="<?php echo esc_url($features_right_img); ?>">
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="shape5"><img src="<?php echo plugin_dir_url( dirname(__FILE__) ) .'images/clipArt/shape5.png';?>" alt="image"></div>
	<div class="shape6"><img src="<?php echo plugin_dir_url( dirname(__FILE__) ) .'images/clipArt/shape6.png';?>" alt="image"></div>
</section>