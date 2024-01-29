<?php
$activate = array(
        'eduvert-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'eduvert-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => '',
        'text'=>'
		<div class="widget-content">
                                <div class="logo">
                                    <a href=""><img src="'.CLEVERFOX_PLUGIN_URL.'inc/eduvert/images/logo.png"></a>
                                </div>
                                <p>There are many variations There are many variations of passages of Lorem Ipsum available.</p>
                            </div>
		'),        
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
	$MediaId = get_option('eduvert_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );
?>