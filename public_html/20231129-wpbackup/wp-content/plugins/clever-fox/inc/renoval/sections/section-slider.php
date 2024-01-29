 <!--===// Start: Slider
    =================================--> 
<?php  
	$slider 						= get_theme_mod('slider',renoval_get_slider_default());
	$slider_animation_speed			= get_theme_mod('slider_animation_speed','9000');
	$slider_autoplay				= get_theme_mod('slider_autoplay', 'true');
	$slider_loop					= get_theme_mod('slider_loop', 'true');
	$hs_slider						= get_theme_mod('hs_slider', '1');
	$settings=array('animationSpeed'=>$slider_animation_speed,'autoplay'=>$slider_autoplay,'slider_loop'=>$slider_loop);	
	
	wp_register_script('renoval-slider',get_template_directory_uri().'/assets/js/homepage/slider.js',array('jquery'));
	wp_localize_script('renoval-slider','slider_settings',$settings);
	wp_enqueue_script('renoval-slider',get_template_directory_uri().'/assets/js/homepage/slider.js',array('jquery')); 	
	if($hs_slider=='1'):
?>	
<!--===// Start: Slider
=====================-->
<section id="main-slider" class="main-slider-1 slider-style-2">
	<div class="row">
		<div class="col-md-12">
			<div class="home-slider owl-carousel">
				
				<?php
				if ( ! empty( $slider ) ) {
				$slider = json_decode( $slider );
				foreach ( $slider as $slide_item ) {
					$title = ! empty( $slide_item->title ) ? apply_filters( 'renoval_translate_single_string', $slide_item->title, 'slider section' ) : '';
					$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'renoval_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
					$subtitle2 = ! empty( $slide_item->subtitle2 ) ? apply_filters( 'renoval_translate_single_string', $slide_item->subtitle2, 'slider section' ) : '';
					$button = ! empty( $slide_item->text2) ? apply_filters( 'renoval_translate_single_string', $slide_item->text2,'slider section' ) : '';
					$link = ! empty( $slide_item->link ) ? apply_filters( 'renoval_translate_single_string', $slide_item->link, 'slider section' ) : '';
					$image = ! empty( $slide_item->image_url ) ? apply_filters( 'renoval_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
					
					$open_new_tab = ! empty( $slide_item->open_new_tab ) ? apply_filters( 'renoval_translate_single_string',$slide_item->open_new_tab, 'slider section' ) : 'yes';
					
				?>
				
				<div class="item <?php if(!empty($image2)): echo esc_attr__('side-image','clever-fox'); endif; ?>">
					<?php if ( ! empty( $image ) ) : ?>
					<img src="<?php echo esc_url($image); ?>" data-img-url="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__('Image','clever-fox'); ?>" data-animation-in="zoomInImage">
					<?php endif; ?>	
					<div class="cover">
						<div class="container">
							<div class="slider-content">
								<?php if ( ! empty( $title ) ) : ?>
									<h1>
										<?php echo esc_html($title); ?> 
										<span class="slider-title">
											<?php echo esc_html($subtitle); ?>
										</span> 
									</h1>
								<?php endif; ?>
								
								<?php if ( ! empty( $subtitle2 ) ) : ?>
									<h2>
										<span class="slider-sub-title"><?php echo esc_html($subtitle2); ?></span>
									</h2> 
								<?php endif; ?>
								
								<?php if ( ! empty( $button ) ) : ?>
									<a href="<?php echo esc_url( $link ); ?>" <?php if($open_new_tab== 'yes' || $open_new_tab== '1') { echo "target='_blank'"; } ?> class="main-button"> <span><?php echo esc_html( $button ); ?></span> <i class="fa fa-angle-double-right"></i> </a>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
				</div>  
				<?php } } ?>
			</div>
		</div>
	</div>
</section>
<!-- End: Slider
=======================-->
<?php endif;  ?>


<?php  
	$slider_info_contents	= get_theme_mod('slider_info_contents',renoval_get_slider_info_default());
	if ( ! empty( $slider_info_contents ) ) {
		$slider_info_contents = json_decode( $slider_info_contents );
		$hs_slider_info 			= get_theme_mod('hs_slider_info','1');
		if($hs_slider_info=='1'):
				
?>
		<!-- Start: info-section
		=======================-->
		<section id="info-section" class="info-section slider-1-info">
			<div class="container">
				<div class="info-item wow fadeInUp">
					<div class="row">
						<?php
							foreach ( $slider_info_contents as $slider_item ) {
								$icon = ! empty( $slider_item->icon_value) ? apply_filters( 'renoval_translate_single_string', $slider_item->icon_value,'slider info section' ) : '';
								$title = ! empty( $slider_item->title ) ? apply_filters( 'renoval_translate_single_string', $slider_item->title, 'slider info section' ) : '';
								$text = ! empty( $slider_item->text ) ? apply_filters( 'renoval_translate_single_string', $slider_item->text, 'slider info section' ) : '';
								$link = ! empty( $slider_item->link ) ? apply_filters( 'renoval_translate_single_string', $slider_item->link, 'slider info section' ) : '';
						?>
						<div class="col-lg-3 col-md-6">
							<div class="info-box info-effect" >
								<?php if ( ! empty( $icon ) ) { ?>
									<div class="info-icon">
										<a href="<?php echo esc_url($link); ?>">
											<i class="fa <?php echo esc_html( $icon ); ?>"></i>
										</a>
									</div>
								<?php } ?>
								
								<?php if ( ! empty( $title ) || ! empty( $text ) ) : ?>
									<div class="info-content">
										<?php if ( ! empty( $title ) ) : ?>
											<h5>
												<a href="<?php echo esc_url($link); ?>">
													<?php echo esc_html( $title ); ?>
												</a>
											</h5>
										<?php endif; ?>
										
										<?php if ( ! empty( $text ) ) : ?>
											<p>
												<?php echo esc_html( $text ); ?>
											</p>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>							
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
	</section>
		<!-- End: info-section
		=======================-->
	<?php endif; } ?>