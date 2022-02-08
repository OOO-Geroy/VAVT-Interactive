<?php 
if( function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'VAVT interactive data control',
		'menu_title'	=> 'VAVT interactive',
		'menu_slug' 	=> 'vavt-ineractive',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	  $vpn_owners = acf_add_options_sub_page(array(
            'page_title'  => __('VPN Owners data'),
            'menu_title'  => __('VPN Owners'),
            'menu_slug'   => 'vavt-vpn-owners',
            'parent_slug' => $parent['menu_slug'],
            'post_id' => 'vavt-vpn-owners'
        ));

	  $server_map = acf_add_options_sub_page(array(
            'page_title'  => __('Server map data'),
            'menu_title'  => __('Server map'),
            'parent_slug' => $parent['menu_slug'],
        ));
}