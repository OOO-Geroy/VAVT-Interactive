<?php
if (function_exists('acf_add_local_field')) :
	acf_add_local_field(array(
		'key' => 'field_5ef1efbf948b3',
		'label' => 'Map order',
		'name' => 'vavt_interactive_server_map_order',
		'type' => 'number',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'default_value' => 0,
		'min' => 0,
		'parent' => 'group_5c83071429237',
		'wrapper' => array('width' => '50')
	));

	acf_add_local_field(array(
		'key' => 'field_5ef1f150948b4',
		'label' => 'Map priority',
		'name' => 'vavt_interactive_server_map_priority',
		'type' => 'number',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'default_value' => 0,
		'min' => 0,
		'parent' => 'group_5c83071429237',
		'wrapper' => array('width' => '50')
	));

endif;
