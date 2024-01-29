<?php
	if ( ! function_exists( 'gradiant_header_contact' ) ) :
	function gradiant_header_contact() {
		$hdr_nav_contact_content = get_theme_mod( 'hdr_nav_contact_content','<p>Are you to grow up your business? <strong>Join our team</strong></p>');
		$hdr_nav_contact_content2 = get_theme_mod( 'hdr_nav_contact_content2','<div class="contact-icon"><i class="fa fa-wechat"></i></div><a href="#" class="contact-info"> <span class="title">Hotline Number</span><span class="text">0123-456-789</span></a>');
			if(!empty($hdr_nav_contact_content) || !empty($hdr_nav_contact_content2)):
		?>	
	<li class="widget-wrap">
		<div class="widget-wrp">
			<?php if(!empty($hdr_nav_contact_content)): ?>
				<aside class="widget widget-contact">
					<div class="textwidget ct-area1">
						<?php echo wp_kses_post($hdr_nav_contact_content); ?>
					</div>
				</aside>
			<?php endif;
			 if(!empty($hdr_nav_contact_content2)): ?>
				<aside class="widget widget-contact">
					<div class="contact-area ct-area2">
						<?php echo wp_kses_post($hdr_nav_contact_content2); ?>
					</div>
				</aside>
			<?php endif; ?>
		</div>
	</li>
	<?php endif;  
} endif;
add_action('gradiant_header_contact', 'gradiant_header_contact');
?>
