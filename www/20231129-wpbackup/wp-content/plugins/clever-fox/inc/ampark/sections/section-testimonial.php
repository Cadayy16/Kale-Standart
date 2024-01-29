<?php 
if ( ! function_exists( 'cleverfox_ampark_lite_testimonial' ) ) :
	function cleverfox_ampark_lite_testimonial() {
	$hs_testimonial				= get_theme_mod('hs_testimonial','1');		
	$testimonial_title			= get_theme_mod('testimonial_title','Technology from tomorrow');
	$testimonial_subtitle		= get_theme_mod('testimonial_subtitle','Outstanding <span class="av-heading animate-7"><span class="av-text-wrapper"><b class="is-show">Testimonial</b>                                   <b>Testimonial</b><b>Testimonial</b></span></span>');
	$testimonial_description	= get_theme_mod('testimonial_description','Lorem Ipsum is simply dummy of printing and typesetting and industry. Lorem Ipsum been.');
	$testimonials				= get_theme_mod('testimonials',avril_get_testimonial_default());
	if($hs_testimonial=='1'){
?>
<section id="testimonial-section" class="testimonial-section av-py-default">
	<div class="av-container">
		<div class="av-columns-area">
			<div class="av-column-12">
				<div class="heading-default wow fadeInUp">
					<?php if ( ! empty( $testimonial_title ) ) : ?>
						<span class='ttl'><?php echo wp_kses_post($testimonial_title); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $testimonial_subtitle ) ) : ?>		
						<h3><?php echo wp_kses_post($testimonial_subtitle); ?></h3>    
					<?php endif; ?>	
					<?php if ( ! empty( $testimonial_description ) ) : ?>		
						<p><?php echo wp_kses_post($testimonial_description); ?></p>    
					<?php endif; ?>	
				</div>
			</div>
		</div>
		<div class="testimonial-carousel owl-carousel owl-theme wow fadeInUp">
			<?php
				if ( ! empty( $testimonials ) ) {
				$testimonials = json_decode( $testimonials );
				foreach ( $testimonials as $test_item ) {
					$avril_test_title = ! empty( $test_item->title ) ? apply_filters( 'avril_translate_single_string', $test_item->title, 'Testimonial section' ) : '';
					$subtitle = ! empty( $test_item->subtitle ) ? apply_filters( 'avril_translate_single_string', $test_item->subtitle, 'Testimonial section' ) : '';
					$text = ! empty( $test_item->text ) ? apply_filters( 'avril_translate_single_string', $test_item->text, 'Testimonial section' ) : '';
					$image = ! empty( $test_item->image_url ) ? apply_filters( 'avril_translate_single_string', $test_item->image_url, 'Testimonial section' ) : '';
			?>
				<div class="testimonial-item">                    
					<div class="testimonial-content">
						<div class="testimonial-title">
							<?php if ( ! empty( $avril_test_title ) ) : ?>
								<h6 class="service-title"><?php echo esc_html( $avril_test_title ); ?></h6>
							<?php endif; ?>
							<?php if ( ! empty( $subtitle ) ) : ?>
								<p><?php echo esc_html( $subtitle ); ?></p>
							<?php endif; ?>
						</div>  
						<?php if ( ! empty( $text ) ) : ?>
							<blockquote><?php echo esc_html( $text ); ?></blockquote>
						<?php endif; ?>	
					</div>
					<div class="testimonial-icon">
						<div class="image-box">
							<?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" data-img-url="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
	</div>
</section>
<?php
}} endif; 
if ( function_exists( 'cleverfox_ampark_lite_testimonial' ) ) {
	$section_priority = apply_filters( 'avril_section_priority', 14, 'avril_lite_team' );
	add_action( 'avril_sections', 'cleverfox_ampark_lite_testimonial', absint( $section_priority ) );
}	