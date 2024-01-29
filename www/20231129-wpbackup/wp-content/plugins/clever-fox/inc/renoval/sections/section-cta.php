<?php 
	$cta_hs 			= get_theme_mod('cta_hs','1');
	$cta_call_icon 		= get_theme_mod('cta_call_icon','fa-user');
	$cta_call_title		= get_theme_mod('cta_call_title','Contact Us'); 
	$cta_call_text		= get_theme_mod('cta_call_text','+70 975 975 70');
	$cta_right_icon		= get_theme_mod('cta_right_icon','fa-phone'); 
	$cta_title			= get_theme_mod('cta_title','Do You Want to Renovate Your Home & Office?');
	$cta_description	= get_theme_mod('cta_description','Protecting Your Home From Damaging Leaks, Contact us.');
	$cta_btn_icon		= get_theme_mod('cta_btn_icon','fa-arrow-right');
	$cta_btn_link		= get_theme_mod('cta_btn_link');
	$cta_effect_enable	= get_theme_mod('cta_effect_enable','1');
	$cta_bg_setting		= get_theme_mod('cta_bg_setting',esc_url(plugin_dir_url( dirname(__FILE__) ) .'/images/cta/cta-bg.jpg')); 
	$cta_bg_position	= get_theme_mod('cta_bg_position','fixed');
	$cta_logo_image		= get_theme_mod('cta_logo_image', esc_url(plugin_dir_url( dirname(__FILE__) ) .'images/cta/cta-logo.png'));	
	if($cta_hs== '1'):
?>
	<!-- =======================
	Start: CTA Section
	=======================-->
	<section id="cta-section" class="cta-section wow fadeInUp" <?php if(!empty($cta_bg_setting)){ ?> style="background-image:url('<?php echo esc_url($cta_bg_setting); ?>');background-attachment:<?php echo esc_attr($cta_bg_position); ?>" <?php } ?>>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8 col-md-6">
					<div class="cta-item">
						<?php if(!empty($cta_logo_image)){ ?>
							<div class="cta-image">
								<img src="<?php echo esc_url($cta_logo_image); ?>" alt="<?php echo esc_attr__('Logo Image','clever-fox'); ?>">
							</div>
						<?php } ?>
						
						<?php if(!empty($cta_title) || !empty($cta_description)): ?>
							<div class="cta-content">
								<?php if(!empty($cta_title)): ?>
									<h5>
										<?php echo wp_kses_post($cta_title); ?>
									</h5>
								<?php endif; ?>
								
								<?php if(!empty($cta_description)): ?>
									<p>
										<?php echo wp_kses_post($cta_description); ?>
									</p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="cta-button">
						<?php if(!empty($cta_call_text) || !empty($cta_right_icon)): ?>
							<a href="tel:" class="button-with-border"><i class="fa <?php echo esc_attr($cta_right_icon); ?>"></i> <?php echo wp_kses_post($cta_call_text); ?> </a>
						<?php endif; ?>
						
						<?php if(!empty($cta_call_title) || !empty($cta_btn_link)): ?>
							<a href="<?php echo esc_url($cta_btn_link); ?>" class="main-button">
								<span>
									<?php echo esc_html($cta_call_title); ?>
								</span> 
							</a> 
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End: CTA Section
	=======================-->
	<?php endif; ?>