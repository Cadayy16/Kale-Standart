<?php 
	if ( ! function_exists( 'renoval_above_footer' ) ) :
	function renoval_above_footer() {
		$footer_get_in_touch_title	= get_theme_mod('footer_get_in_touch_title', 'Get In Touch');
		$footer_get_in_touch_link	= get_theme_mod('footer_get_in_touch_link', '#');
		$footer_get_in_touch_icon	= get_theme_mod('footer_get_in_touch_icon', 'fa-commenting-o');
		$hs_above_footer			= get_theme_mod('hs_above_footer', '1');
		if ($hs_above_footer == '1') {
		?>
		<div class="abover-footer"> 
			 <?php if(!empty($footer_get_in_touch_icon)){ ?>
				<div class="above-footer-icon">
					<i class="fa <?php echo esc_attr($footer_get_in_touch_icon); ?>"></i> 
				</div> 
			<?php } ?>
				
			<?php if(!empty($footer_get_in_touch_title) || !empty($footer_get_in_touch_link)){ ?>
				<div class="above-footer-content">
					<h5>
						<a href="<?php echo esc_url($footer_get_in_touch_link); ?>">
							<?php echo esc_html($footer_get_in_touch_title); ?>
						</a>
					</h5> 
				</div> 
			<?php } ?>
		 </div>
		<?php } 
} endif;
add_action('renoval_above_footer', 'renoval_above_footer');
?>