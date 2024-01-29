<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_funfact' ) ) :
	function cleverfox_eduvert_lite_funfact() {
$funfact_hs			= get_theme_mod('funfact_hs','1'); 	
$funfact_title 		= get_theme_mod('funfact_title','Why Choose us');
$funfact_subttl 	= get_theme_mod('funfact_subttl','we bring new developing idea & design');
$funfact_description= get_theme_mod('funfact_description','There are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available are many variations of passages of Lorem Ipsum available There are many variations of passages of Lorem Ipsum available'); 
$funfact_btn_lbl	= get_theme_mod('funfact_btn_lbl','Choose Plan');
$funfact_btn_link	= get_theme_mod('funfact_btn_link','#'); 
$funfact_contents	= get_theme_mod('funfact_contents',eduvert_get_funfact_default()); 
if($funfact_hs=='1'):
?>
<section class="section-funfact ptb-80 home1-funfact" id="funfact-one" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/elements/Shape9.png);">
	<div class="nt-container">
		<div class="nt-columns-area">
			<div class="nt-column-7 nt-sm-column-6 mb-4 mb-nt-0">
				<?php if(!empty($funfact_title) || !empty($funfact_subttl) || !empty($funfact_description)): ?>
					<div class="section-title">
						<?php if(!empty($funfact_title)): ?>
							<h5><?php echo wp_kses_post($funfact_title); ?></h5>
						<?php endif; ?>
						
						<?php if(!empty($funfact_subttl)): ?>
							<h3><?php echo wp_kses_post($funfact_subttl); ?></h3>
						<?php endif; ?>	
						
						<?php if(!empty($funfact_description)): ?>
							<p><?php echo wp_kses_post($funfact_description); ?></p>
						<?php endif; ?>	
					</div>
				<?php endif; ?>
				
				<?php if(!empty($funfact_btn_lbl)): ?>
					<a href="<?php echo esc_url($funfact_btn_link); ?>" class="text-btn"><?php echo wp_kses_post($funfact_btn_lbl); ?></a>
				<?php endif; ?>
			</div>
			<div class="nt-column-5 nt-sm-column-6">
				<div class="nt-columns-area">
					<?php
						if ( ! empty( $funfact_contents ) ) {
						$funfact_contents = json_decode( $funfact_contents );
						foreach ( $funfact_contents as $funfact_item ) {
							$title = ! empty( $funfact_item->title ) ? apply_filters( 'eduvert_translate_single_string', $funfact_item->title, 'Funfact section' ) : '';
							$subtitle = ! empty( $funfact_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $funfact_item->subtitle, 'Funfact section' ) : '';
							$text = ! empty( $funfact_item->text ) ? apply_filters( 'eduvert_translate_single_string', $funfact_item->text, 'Funfact section' ) : '';
							$icon = ! empty( $funfact_item->icon_value ) ? apply_filters( 'eduvert_translate_single_string', $funfact_item->icon_value, 'Funfact section' ) : '';
					?>
						<div class="nt-column-6 nt-md-column-6">
							<div class="funfact-item">
								<div class="funfact-icon">
									<?php if(!empty($icon)): ?>
										<i class="fa <?php echo esc_attr($icon); ?>"></i>
									<?php endif;  ?>	
								</div>
								
								<?php if(!empty($title) || !empty($subtitle)): ?>
									<h1><span class="counter"><?php echo esc_html($title); ?></span><span><?php echo esc_html($subtitle); ?></span></h1>     <?php endif;  ?>	  

								<?php if(!empty($text)): ?>
									<p><?php echo esc_html($text); ?></p>
								<?php endif;  ?>		
							</div>
						</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	
endif;	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_funfact' ) ) {
$section_priority = apply_filters( 'eduvert_section_priority', 14, 'cleverfox_eduvert_lite_funfact' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_funfact', absint( $section_priority ) );
}