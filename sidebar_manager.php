<?php

if(function_exists("register_options_page")) {

  register_options_page('Sidebar Manager');

}

/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '5138cad8eb9c3',
		'title' => 'Options – Sidebar Manager',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50c24c33e84bd',
				'label' => 'Sidebars',
				'name' => 'sidebars',
				'type' => 'repeater',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => 
				array (
					'field_50c24c45e84be' => 
					array (
						'label' => 'Sidebar ID',
						'name' => 'sidebar_id',
						'type' => 'text',
						'instructions' => 'e.g. \'home\' or \'sidebar_1\' This is a single word used to identify the sidebar. All sidebar ids 1) must be unique and 2) contain only lowercase letters, numbers, or underscores ( no spaces ). Once you make it, never change it. Otherwise widgets assigned to the sidebars will disappear.',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
						'order_no' => 0,
						'key' => 'field_50c24c45e84be',
					),
					'field_50c24cb3e84bf' => 
					array (
						'label' => 'Sidebar Name',
						'name' => 'sidebar_name',
						'type' => 'text',
						'instructions' => 'e.g. \'Home Sidebar\'. Change this value as often as you like.',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
						'key' => 'field_50c24cb3e84bf',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			1 => 
			array (
				'key' => 'field_50c61f1fd7393',
				'label' => 'Sidebar Title Icons',
				'name' => 'sidebar_title_icons',
				'type' => 'repeater',
				'order_no' => 1,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => 
				array (
					'field_50c61f2ed7394' => 
					array (
						'label' => 'Icon Name',
						'name' => 'icon_name',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
						'key' => 'field_50c61f2ed7394',
					),
					'field_50c61f71d7395' => 
					array (
						'label' => 'Icon Path',
						'name' => 'icon_path',
						'type' => 'text',
						'instructions' => 'Use a relative path. All paths are prepended by the wordpress blog url',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
						'key' => 'field_50c61f71d7395',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-sidebar-manager',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5138cad900ab0',
		'title' => 'Select Sidebar',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50c2509324360',
				'label' => 'Sidebar',
				'name' => 'sidebar',
				'type' => 'acf_sidebar_select',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
			),
			1 => 
			array (
				'key' => 'field_50d28a2e4c542',
				'label' => 'Position',
				'name' => 'position',
				'type' => 'radio',
				'order_no' => 1,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'field_50d28a2e4c542',
							'operator' => '==',
							'value' => 'left',
						),
					),
					'allorany' => 'all',
				),
				'choices' => 
				array (
					'left' => 'Left',
					'right' => 'Right',
				),
				'default_value' => 'right',
				'layout' => 'horizontal',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}

// Load the custom sidebars

while( has_sub_field('sidebars', 'options')) {

  $id   = get_sub_field('sidebar_id') ;
  $name = get_sub_field('sidebar_name') ;

  register_sidebar( array(  
    'name' => $name,
    'id' => "custom-" . $id // prepend with namespace
    ) 
  );      

}
