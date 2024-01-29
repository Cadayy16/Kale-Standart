<?php 
	$service_subtitle		= get_theme_mod('service_subtitle','<h2>Outstanding</h2><div class="animation"><div class="first"><div>Service</div></div></div>');
	$service_description	= get_theme_mod('service_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.'); 
	$service_contents		= get_theme_mod('service_contents',renoval_get_service_default());
	$service_hs				= get_theme_mod('service_hs','1');
	if($service_hs == '1'):
?>	
<!-- Start: Service Section
=======================-->
<section id="service-section" class="service-section service-home wow fadeInUp">
	<div class="container">
		<?php if(!empty($service_title)  || !empty($service_subtitle) || !empty($service_description)): ?>
			<div class="section-title text-center">
				
				<?php if(!empty($service_subtitle)): ?>
					<div>
						<?php echo wp_kses_post($service_subtitle); ?>
					</div>
				<?php endif; ?>
				
				<?php if(!empty($service_description)): ?>
					<p>
						<?php echo wp_kses_post($service_description); ?>
					</p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		
		<div class="row">
			<?php
				if ( ! empty( $service_contents ) ) {
				$service_contents = json_decode( $service_contents );
				foreach ( $service_contents as $service_item ) { 
					$image = ! empty( $service_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $service_item->image_url, 'Service section' ) : '';
					$renoval_service_icon = ! empty( $service_item->icon_value) ? apply_filters( 'renoval_translate_single_string', $service_item->icon_value,'Service section' ) : '';
					$renoval_service_title = ! empty( $service_item->title ) ? apply_filters( 'renoval_translate_single_string', $service_item->title, 'Service section' ) : '';
					$renoval_service_text = ! empty( $service_item->text ) ? apply_filters( 'renoval_translate_single_string', $service_item->text, 'Service section' ) : '';
					$renoval_service_button = ! empty( $service_item->text2) ? apply_filters( 'renoval_translate_single_string', $service_item->text2,'Service section' ) : '';
					$renoval_service_link = ! empty( $service_item->link ) ? apply_filters( 'renoval_translate_single_string', $service_item->link, 'Service section' ) : '';
					$choice = ! empty( $service_item->choice ) ? apply_filters( 'renoval_translate_single_string', $service_item->choice, 'Service section' ) : '';
			
			?>
			<div class="col-lg-3 col-md-6">
				<div class="service-box">
					<?php if($choice =='customizer_repeater_image'): ?>
						<div class="service-icon">
							<img src="<?php echo esc_url($image); ?>" />
						</div>
					<?php else: ?>
						<?php if ( ! empty( $renoval_service_icon ) ) { ?>
							<div class="service-icon">
								<i class="fa <?php echo esc_attr($renoval_service_icon); ?>"></i>
							</div>
						<?php } ?>
					<?php endif; ?>
					
					<div class="service-content">
						<?php if ( ! empty( $renoval_service_title ) ) : ?>
							<h4>
								<?php echo esc_html( $renoval_service_title ); ?>
							</h4>
						<?php endif; ?>
						
						<?php if ( ! empty( $renoval_service_text ) ) : ?>
							<p>
								<?php echo esc_html( $renoval_service_text ); ?>
							</p>
						<?php endif; ?>	
						
						<?php if ( ! empty( $renoval_service_button ) && ! empty( $renoval_service_link ) ) : ?>
							<a href="<?php echo esc_url( $renoval_service_link ); ?>" class="main-button">
								<span>
									<?php echo esc_html( $renoval_service_button ); ?>
								</span> 
								<i class="fa fa-angle-right"></i>
							</a>
						<?php endif; ?>	
					</div>
					<div class="section-element-service">
						<img src="<?php echo esc_url(plugin_dir_url( dirname(__FILE__) ) . 'images/section-bg.png'); ?>" alt="<?php echo esc_attr( $renoval_service_title ); ?>"> 
					</div>
				</div>
			</div>	
			<?php } }?>
		</div>
	</div>
</section>
<!-- End: Service Section
=======================-->
<?php endif; ?>