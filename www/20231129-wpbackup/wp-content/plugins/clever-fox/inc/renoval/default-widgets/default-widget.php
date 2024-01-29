<?php
$activate = array(
        'renoval-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'renoval-footer-layout-first' => array(
			 'text-1',
        ),
		'renoval-footer-layout-second' => array(
			 'categories-1',
        ),
		'renoval-footer-layout-third' => array(
			 'search-1',
        ),
    );
    /* the default titles will appear */
   update_option('widget_text', array(  
		1 => array('title' => 'About Renoval',
        'text'=>'<div class="textwidget">
				<p>It is a long established fact that reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
			</div>'),		
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		 update_option('widget_categories', array(
			1 => array('title' => 'Categories'), 
			2 => array('title' => 'Categories')));

		update_option('widget_archives', array(
			1 => array('title' => 'Archives'), 
			2 => array('title' => 'Archives')));
			
		update_option('widget_search', array(
			1 => array('title' => 'Search'), 
			2 => array('title' => 'Search')));	
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('renoval_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
	set_theme_mod('nav_btn_lbl','Book Now');
	set_theme_mod('nav_btn_icon','fa-user');
	set_theme_mod('nav_btn_link','#');
?>