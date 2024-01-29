<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_slider' ) ) :
	function cleverfox_eduvert_lite_slider() {
	$slider 					= get_theme_mod('slider',eduvert_get_slider_default());
	$slider_bg_element_enable	= get_theme_mod('slider_bg_element_enable','1'); 	
?>	
<section id="slider-section" class="slider-wrapper slider-home">
	<?php if($slider_bg_element_enable=='1'): ?>
		<div class="bg-shape1"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-2.png" alt=""></div>
		<div class="bg-shape2"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-2.png" alt=""></div>
		<div class="bg-shape3"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape4"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape5"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape6"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape7"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape8"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape9"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
		<div class="bg-shape10"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector.png" alt=""></div>
		<div class="bg-shape11"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-6.png" alt=""></div>
		<div class="bg-shape12"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-3.png" alt=""></div>
		<div class="bg-shape13"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group.png" alt=""></div>
		<div class="bg-shape14"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-1.png" alt=""></div>
		<div class="bg-shape15"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Shape.png" alt=""></div>
		<div class="bg-shape16"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Group-5.png" alt=""></div>
		<div class="bg-shape17"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/element1/Vector-9.png" alt=""></div>
	<?php endif; ?>
	<div class="main-slider owl-carousel owl-theme">
		<?php
			if ( ! empty( $slider ) ) {
			$slider = json_decode( $slider );
			foreach ( $slider as $slide_item ) {
				$title = ! empty( $slide_item->title ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->title, 'slider section' ) : '';
				$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
				$subtitle2 = ! empty( $slide_item->subtitle2 ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->subtitle2, 'slider section' ) : '';
				$text = ! empty( $slide_item->text ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->text, 'slider section' ) : '';
				$button = ! empty( $slide_item->text2) ? apply_filters( 'eduvert_translate_single_string', $slide_item->text2,'slider section' ) : '';
				$link = ! empty( $slide_item->link ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->link, 'slider section' ) : '';
				$image = ! empty( $slide_item->image_url ) ? apply_filters( 'eduvert_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
		?>
			<div class="slider">
				<div class="nt-container"> 
					<div class="nt-columns-area"> 
						<div class="nt-column-6 nt-sm-column-6">                          
							<div class="theme-content  wow zoomIn">
								<?php if(!empty($title)): ?>
									<h3 data-animation="fadeInUp" data-delay="150ms"><?php echo esc_html($title); ?></h3>
								<?php endif; ?>
								<?php if(!empty($subtitle)  || !empty($subtitle2)): ?>
									<h1 data-animation="fadeInUp" data-delay="200ms"><?php echo esc_html($subtitle); ?> <span> <?php echo esc_html($subtitle2); ?></span></h1>
								<?php endif; ?>
								
								<?php if(!empty($text)): ?>
									<p data-animation="fadeInUp" data-delay="500ms"><?php echo esc_html($text); ?></p>
								<?php endif; ?>
								
								<?php if(!empty($button)): ?>
									<a data-animation="fadeInUp" data-delay="800ms" href=<?php echo esc_url($link); ?>
								 class="text-btn"><span><?php echo esc_html($button); ?></span></a>
								 <?php endif; ?>
							</div>
						</div>
						<div class="nt-column-6 nt-sm-column-6"> 
							<div class="side-img" data-delay="800ms">   
								<?php if(!empty($image)): ?>
									<img src="<?php echo esc_url($image); ?>" data-img-url="<?php echo esc_url($image); ?>" alt="">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
	</div>
</section>
<?php	
	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_slider' ) ) {
$section_priority = apply_filters( 'eduvert_section_priority', 11, 'cleverfox_eduvert_lite_slider' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_slider', absint( $section_priority ) );
}