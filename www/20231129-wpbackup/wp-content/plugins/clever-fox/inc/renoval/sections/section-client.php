<?php  
	$client_subtitle		= get_theme_mod('client_subtitle','<h2>Outstanding</h2><div class="animation"><div class="first"><div>Sponsor</div></div></div>');
	$client_description		= get_theme_mod('client_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$client_contents		= get_theme_mod('client_contents',renoval_get_client_default());	
?>
	<!-- Start: Sponsor Section
	=======================-->
	<section id="sponsor-section" class="wow fadeInUp">
		<div class="container">
			<?php if(!empty($client_subtitle) || !empty($client_description)): ?>
				<div class="row">
					<div class="section-title text-center">
						
						<?php if(!empty($client_subtitle)): ?>
							<div>
								<?php echo wp_kses_post($client_subtitle); ?>
							</div>
						<?php endif; ?>
						
						<?php if(!empty($client_description)): ?>
							<p>
								<?php echo wp_kses_post($client_description); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<?php
				if ( ! empty( $client_contents ) ) {
				$client_contents = json_decode( $client_contents );
			?>
				<div class="row">
					<div class="spons">
						<div class="row">
						<?php
							foreach ( $client_contents as $client_item ) {
								$link = ! empty( $client_item->link ) ? apply_filters( 'renoval_translate_single_string', $client_item->link, 'Client section' ) : '';
								$image = ! empty( $client_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $client_item->image_url, 'Client section' ) : '';
								
							if(!empty($image) || !empty($link)):
						?>
						<div class="col-lg col-md-4 col-sm-6">
							<div class="sponsor-image">
								<a href="<?php echo esc_url($link); ?>">
									<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Clients Image','clever-fox'); ?>">
								</a>
								<?php  ?>
							</div>
						</div>	
						<?php 
							endif;
							} 
						?>	
					</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<!-- End: Sponsor Section
	=======================-->