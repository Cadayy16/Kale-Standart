<?php  
if ( ! function_exists( 'cleverfox_eduvert_lite_course_cat' ) ) :
	function cleverfox_eduvert_lite_course_cat() {
$course_cat_hs				= get_theme_mod('course_cat_hs','1'); 		
$course_category_title 		= get_theme_mod('course_category_title','course categories');
$course_category_description= get_theme_mod('course_category_description','popular topics to learn'); 
$course_category			= get_theme_mod('course_category',eduvert_get_course_cat_default()); 
$course_category_column		= get_theme_mod('course_category_column','3');
$course_category_btn_lbl 	= get_theme_mod('course_category_btn_lbl','All Categories');
$course_category_btn_link 	= get_theme_mod('course_category_btn_link','#');
if($course_cat_hs=='1'):
?>
<section class="section-category wow fadeInUp ptb-80 home1-cat" id="category_one">
	<div class="nt-container">
		<?php if(!empty($course_category_title) || !empty($course_category_description)): ?>
			<div class="section-title">
				<?php if(!empty($course_category_title)): ?>
					<h5><?php echo wp_kses_post($course_category_title); ?></h5>
				<?php endif; ?>
				
				<?php if(!empty($course_category_description)): ?>
					<h3><?php echo wp_kses_post($course_category_description); ?></h3>
				<?php endif; ?>	
			</div>
		<?php endif; ?>
		<div class="nt-columns-area">
			<?php
				if ( ! empty( $course_category ) ) {
				$course_category = json_decode( $course_category );
				foreach ( $course_category as $cat_item ) {
					$title = ! empty( $cat_item->title ) ? apply_filters( 'eduvert_translate_single_string', $cat_item->title, 'Course Category section' ) : '';
					$subtitle = ! empty( $cat_item->subtitle ) ? apply_filters( 'eduvert_translate_single_string', $cat_item->subtitle, 'Course Category section' ) : '';
					$text = ! empty( $cat_item->text ) ? apply_filters( 'eduvert_translate_single_string', $cat_item->text, 'Course Category section' ) : '';
					$link = ! empty( $cat_item->link ) ? apply_filters( 'eduvert_translate_single_string', $cat_item->link, 'Course Category section' ) : '';
					$image = ! empty( $cat_item->image_url ) ? apply_filters( 'eduvert_translate_single_string', $cat_item->image_url, 'Course Category section' ) : '';
			?>
				<div class="nt-column-3 nt-sm-column-6">
					<div class="categorie-item">
						<div class="categorie-img">
							<img src="<?php echo esc_url($image); ?>" alt="">
						</div>
						<div class="categorie-content">
							<?php if(!empty($subtitle)): ?>
								<span><?php  echo esc_html($subtitle); ?></span>
							<?php endif; ?>	
							
							<?php if(!empty($title)): ?>
								<h2><a href="<?php echo esc_url($link); ?>"><?php  echo esc_html($title); ?></a></h2>
							<?php endif; ?>	
							
							<?php if(!empty($text)): ?>
								<p><?php  echo esc_html($text); ?></p>
							<?php endif; ?>	
						</div>
					</div>
				</div>
			<?php }} ?>
		</div>
		<?php if(!empty($course_category_btn_lbl)): ?>
			<div class="nt-columns-area">
				<div class="nt-column-12 nt-sm-column-12 text-center">
					<div class="categorie-btn">
						<a href="<?php echo esc_url($course_category_btn_link); ?>" class="text-btn"><?php echo wp_kses_post($course_category_btn_lbl); ?></a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php	
endif;	}
endif;
if ( function_exists( 'cleverfox_eduvert_lite_course_cat' ) ) {
$section_priority = apply_filters( 'eduvert_section_priority', 12, 'cleverfox_eduvert_lite_course_cat' );
add_action( 'eduvert_sections', 'cleverfox_eduvert_lite_course_cat', absint( $section_priority ) );
}