<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */ 

// Fields 
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	//include_once('add-ons/acf-repeater/repeater.php');
	//include_once('add-ons/acf-gallery/gallery.php');
	//include_once('add-ons/acf-flexible-content/flexible-content.php');
}

// Options Page 
//include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_layout-options',
		'title' => 'Layout Options',
		'fields' => array (
			array (
				'key' => 'field_51cba9af4ede8',
				'label' => 'Content Type',
				'name' => 'content_type',
				'type' => 'radio',
				'choices' => array (
					'text' => 'Text Page',
					'gallery' => 'Photo Gallery',
				),
				'default_value' => '',
				'layout' => 'vertical',
				'other_choice' => 0,
				'save_other_choice' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'section',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'revisions',
				5 => 'format',
				6 => 'categories',
				7 => 'tags',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => -1,
	));
	register_field_group(array (
		'id' => 'acf_admin',
		'title' => 'Admin',
		'fields' => array (
			array (
				'key' => 'field_51df432c42d39',
				'label' => 'Appearance',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51df433842d3a',
				'label' => 'Dashboard Menu Name',
				'name' => 'dashboard_menu_name',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51df44286561d',
				'label' => 'Blog Menu Name',
				'name' => 'blog_menu_singular',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51df435842d3c',
				'label' => 'Dashboard Header Name',
				'name' => 'dashboard_header_name',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51df436442d3d',
				'label' => 'Dashboard Background Logo',
				'name' => 'dashboard_background_logo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51df23c41e630',
				'label' => 'Login Page',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51df24ca498de',
				'label' => 'Logo',
				'name' => 'login_logo',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51df24e7498df',
				'label' => 'Background',
				'name' => 'background',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51df40f9147b8',
				'label' => 'Link Color',
				'name' => 'login_link',
				'type' => 'color_picker',
				'default_value' => '#21759b',
			),
			array (
				'key' => 'field_51df4afdad673',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51df4b0aad674',
				'label' => 'Add to site footer',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_51df4ec9c4352',
				'label' => 'IE6 Image Toolbar',
				'name' => 'ie6_image_toolbar',
				'type' => 'true_false',
				'message' => 'Kill the IE6 Image Toolbar that appears when users hover over images on your site.',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df4f484a48c',
				'label' => 'Google Chrome Frame',
				'name' => 'google_chrome_frame',
				'type' => 'true_false',
				'message' => 'Add Google Chrome Frame to site',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df4fa6bc31b',
				'label' => 'iThings Full Zoom Viewport',
				'name' => 'ithings_full_zoom_viewport',
				'type' => 'true_false',
				'message' => 'Set viewport width to 1024px',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df4ffb08f6c',
				'label' => 'IE CSS',
				'name' => 'ie_css',
				'type' => 'true_false',
				'message' => 'Add IE stylesheet (ie.css)',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df503008f6d',
				'label' => 'jQuery Plugins',
				'name' => 'jquery_plugins',
				'type' => 'true_false',
				'message' => 'Add plugins.js to footer',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df504e08f6e',
				'label' => 'jQuery Scripts',
				'name' => 'jquery_scripts',
				'type' => 'true_false',
				'message' => 'Add scripts.js to footer',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51df506fd06ee',
				'label' => 'Cache Buster',
				'name' => 'cache_buster',
				'type' => 'text',
				'instructions' => 'To increment the cache buster version number, type the number here:',
				'default_value' => 1,
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'administrator',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-admin-panel',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_appearance',
		'title' => 'Appearance',
		'fields' => array (
			array (
				'key' => 'field_51d4478f5d8af',
				'label' => 'General',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51d447a25d8b0',
				'label' => 'Logo Image',
				'name' => 'logo',
				'type' => 'image',
				'instructions' => 'Upload your logo below.',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d447d05d8b1',
				'label' => 'Website Background Options',
				'name' => 'website_background',
				'type' => 'checkbox',
				'instructions' => 'Please select the background preferences.',
				'choices' => array (
					'bg_image' => 'Custom Image',
					'bg_color' => 'Custom Color',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_51d448f502df8',
				'label' => 'Custom Background Image',
				'name' => 'custom_background_image',
				'type' => 'image',
				'instructions' => 'Please upload your custom background image.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d447d05d8b1',
							'operator' => '==',
							'value' => 'bg_image',
						),
					),
					'allorany' => 'all',
				),
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d4492b02df9',
				'label' => 'Custom Background Color',
				'name' => 'custom_background_color',
				'type' => 'color_picker',
				'instructions' => 'Please select your custom background color.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d447d05d8b1',
							'operator' => '==',
							'value' => 'bg_color',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '#ffffff',
			),
			array (
				'key' => 'field_51d4496e9b3fe',
				'label' => 'Header',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_51d44987489b2',
				'label' => 'Social Media Icons',
				'name' => 'social_media_header',
				'type' => 'checkbox',
				'instructions' => 'Select the social media icons you want to display in the website header.',
				'choices' => array (
					'facebook' => 'Facebook',
					'twitter' => 'Twitter',
					'google' => 'Google+',
					'linkedin' => 'LinkedIn',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-appearance',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_contact-information',
		'title' => 'Contact Information',
		'fields' => array (
			array (
				'key' => 'field_51d496292b5ce',
				'label' => 'Name',
				'name' => 'name',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d4998039cb9',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'email',
				'default_value' => '',
			),
			array (
				'key' => 'field_51d497022b5d0',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'number',
				'default_value' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_51d4970b2b5d1',
				'label' => 'Fax',
				'name' => 'fax',
				'type' => 'number',
				'default_value' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_51d496362b5cf',
				'label' => 'Address',
				'name' => 'address',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d4971a2b5d2',
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d497242b5d3',
				'label' => 'State',
				'name' => 'state',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d4972a2b5d4',
				'label' => 'Zip Code',
				'name' => 'zipcode',
				'type' => 'number',
				'default_value' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-contact-information',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_gallery',
		'title' => 'Gallery',
		'fields' => array (
			array (
				'key' => 'field_51d4c06bf745a',
				'label' => 'Gallery',
				'name' => 'gallery',
				'type' => 'gallery',
				'preview_size' => 'medium',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'section',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_general',
		'title' => 'General',
		'fields' => array (
			array (
				'key' => 'field_51d450dc29060',
				'label' => 'Site Title',
				'name' => 'site_title',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d450ff29061',
				'label' => 'Tagline',
				'name' => 'tagline',
				'type' => 'text',
				'instructions' => 'In a few words, explain what this site is about.',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51e07605d6067',
				'label' => 'Copyright Text',
				'name' => 'copyright_text',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-general',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_page-content',
		'title' => 'Page Content',
		'fields' => array (
			array (
				'key' => 'field_51d37e87730c7',
				'label' => 'More Information Section',
				'name' => 'more_info',
				'type' => 'checkbox',
				'instructions' => 'Add a "More Info" section to page. (Content area will appear below)',
				'choices' => array (
					'more_info' => 'Add "More Info"',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_51d1b713d8fdd',
				'label' => 'Content Layout',
				'name' => 'content_layout',
				'type' => 'radio',
				'instructions' => 'Please select your layout.',
				'choices' => array (
					'full' => 'Full Width',
					'2col' => 'Two Column',
				),
				'default_value' => '',
				'layout' => 'horizontal',
				'other_choice' => 0,
				'save_other_choice' => 0,
			),
			array (
				'key' => 'field_51ce05cde69d4',
				'label' => 'Full Width Layout',
				'name' => 'full_width',
				'type' => 'flexible_content',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d1b713d8fdd',
							'operator' => '==',
							'value' => 'full',
						),
					),
					'allorany' => 'all',
				),
				'layouts' => array (
					array (
						'label' => 'Title',
						'name' => 'Title',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51ce0871e69d6',
								'label' => 'Title',
								'name' => 'section_title',
								'type' => 'text',
								'column_width' => 20,
								'default_value' => '',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Paragraph',
						'name' => 'paragraph',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d1b0b353f77',
								'label' => 'Paragraph',
								'name' => 'paragraph',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
					array (
						'label' => 'Photo',
						'name' => 'photo',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d1b2dc3d6ad',
								'label' => 'Alignment',
								'name' => 'alignment',
								'type' => 'radio',
								'instructions' => 'Select the alignment for your photo.',
								'column_width' => '',
								'choices' => array (
									'left' => 'Left Aligned',
									'center' => 'Center Aligned',
									'right' => 'Right Aligned',
								),
								'default_value' => '',
								'layout' => 'horizontal',
								'other_choice' => 0,
								'save_other_choice' => 0,
							),
							array (
								'key' => 'field_51d1b20b7c2a3',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'full',
								'library' => 'all',
							),
							array (
								'key' => 'field_51d1b2337c2a4',
								'label' => 'Show Caption',
								'name' => 'show_caption',
								'type' => 'checkbox',
								'column_width' => '',
								'choices' => array (
									'show_caption' => 'Show Caption',
								),
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_51d1b298bd901',
								'label' => 'Caption',
								'name' => 'caption',
								'type' => 'text',
								'instructions' => 'Enter the caption text.',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
					),
				),
				'button_label' => 'Add Content',
			),
			array (
				'key' => 'field_51d1b51526898',
				'label' => 'Left Column Layout',
				'name' => 'two_column_layout_left',
				'type' => 'flexible_content',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d1b713d8fdd',
							'operator' => '==',
							'value' => '2col',
						),
					),
					'allorany' => 'all',
				),
				'layouts' => array (
					array (
						'label' => 'Title',
						'name' => 'title',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d1b54c26899',
								'label' => 'Title',
								'name' => 'section_title',
								'type' => 'text',
								'column_width' => 10,
								'default_value' => 'testit',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Paragraph',
						'name' => 'paragraph',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d1b59472d3b',
								'label' => 'Paragraph',
								'name' => 'paragraph',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
					array (
						'label' => 'Photo',
						'name' => 'photo',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d1b6a17c923',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'full',
								'library' => 'all',
							),
							array (
								'key' => 'field_51d1b6b37c924',
								'label' => 'Show Caption',
								'name' => 'show_caption',
								'type' => 'checkbox',
								'column_width' => '',
								'choices' => array (
									'show_caption' => 'Show Caption',
								),
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_51d1b6cf7c925',
								'label' => 'Caption',
								'name' => 'caption',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Form',
						'name' => 'form',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d488a8e14d0',
								'label' => 'Contact',
								'name' => 'contact',
								'type' => 'acf_cf7',
								'column_width' => '',
								'allow_null' => 0,
								'multiple' => 0,
								'disable' => array (
									0 => 0,
								),
							),
						),
					),
					array (
						'label' => 'Contact Information',
						'name' => 'contact_information',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4aaedbf3b2',
								'label' => 'Contact Information',
								'name' => 'contact_information',
								'type' => 'contact',
								'column_width' => '',
								'choices' => 'name : Name
	email : Email
	phone : Phone
	fax : Fax
	address : Address
	city : City
	state : State
	zipcode : Zip Code',
							),
						),
					),
				),
				'button_label' => 'Add Content',
			),
			array (
				'key' => 'field_51d4ab3809f4e',
				'label' => 'Right Column Layout',
				'name' => 'two_column_layout_right',
				'type' => 'flexible_content',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d1b713d8fdd',
							'operator' => '==',
							'value' => '2col',
						),
					),
					'allorany' => 'all',
				),
				'layouts' => array (
					array (
						'label' => 'Title',
						'name' => 'title',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4ab3809f4f',
								'label' => 'Title',
								'name' => 'section_title',
								'type' => 'text',
								'column_width' => 10,
								'default_value' => 'testit',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Paragraph',
						'name' => 'paragraph',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4ab3809f50',
								'label' => 'Paragraph',
								'name' => 'paragraph',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
					array (
						'label' => 'Photo',
						'name' => 'photo',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4ab3809f51',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'full',
								'library' => 'all',
							),
							array (
								'key' => 'field_51d4ab3809f52',
								'label' => 'Show Caption',
								'name' => 'show_caption',
								'type' => 'checkbox',
								'column_width' => '',
								'choices' => array (
									'show_caption' => 'Show Caption',
								),
								'default_value' => '',
								'layout' => 'horizontal',
							),
							array (
								'key' => 'field_51d4ab3809f53',
								'label' => 'Caption',
								'name' => 'caption',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'html',
							),
						),
					),
					array (
						'label' => 'Form',
						'name' => 'form',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4ab3809f54',
								'label' => 'Contact',
								'name' => 'contact',
								'type' => 'acf_cf7',
								'column_width' => '',
								'allow_null' => 0,
								'multiple' => 0,
								'disable' => array (
									0 => 0,
								),
							),
						),
					),
					array (
						'label' => 'Contact Information',
						'name' => 'contact_information',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_51d4ab3809f55',
								'label' => 'Contact Information',
								'name' => 'contact_information',
								'type' => 'contact',
								'column_width' => '',
								'choices' => 'name : Name
	email : Email
	phone : Phone
	fax : Fax
	address : Address
	city : City
	state : State
	zipcode : Zip Code',
							),
						),
					),
				),
				'button_label' => 'Add Content',
			),
			array (
				'key' => 'field_51d4611f0d243',
				'label' => 'More Info Page',
				'name' => 'more_info_content',
				'type' => 'wysiwyg',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_51d37e87730c7',
							'operator' => '==',
							'value' => 'more_info',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'section',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_social-media-account-setup',
		'title' => 'Social Media Account Setup',
		'fields' => array (
			array (
				'key' => 'field_51d46f9f8cad9',
				'label' => 'Facebook',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_51d444f928e57',
				'label' => 'Facebook URL',
				'name' => 'facebook_page',
				'type' => 'text',
				'instructions' => 'Please enter your Facebook URL.',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d471781d3af',
				'label' => 'Facebook Icon',
				'name' => 'fbicon',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d4731e13fa5',
				'label' => 'Display Options',
				'name' => 'fbdisplay',
				'type' => 'checkbox',
				'instructions' => 'Choose where to display the icon.',
				'choices' => array (
					'header' => 'Header',
					'footer' => 'Footer',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_51d4710304951',
				'label' => 'Twitter',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_51d4455328e58',
				'label' => 'Twitter Handle',
				'name' => 'twitter',
				'type' => 'text',
				'instructions' => 'Please enter your Twitter handle.',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d471cc1d3b0',
				'label' => 'Twitter Icon',
				'name' => 'twicon',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d4738e13fa6',
				'label' => 'Display Options',
				'name' => 'twdisplay',
				'type' => 'checkbox',
				'instructions' => 'Choose where to display the icon.',
				'choices' => array (
					'header' => 'Header',
					'footer' => 'Footer',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_51d4711104952',
				'label' => 'Google+',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_51d4457128e59',
				'label' => 'Google+ URL',
				'name' => 'google_plus',
				'type' => 'text',
				'instructions' => 'Please enter your Google+ URL',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d471f01d3b1',
				'label' => 'Google+ Icon',
				'name' => 'gpicon',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d473c80b80a',
				'label' => 'Display Options',
				'name' => 'gpdisplay',
				'type' => 'checkbox',
				'instructions' => 'Choose where to display the icon.',
				'choices' => array (
					'header' => 'Header',
					'footer' => 'Footer',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_51d4711804953',
				'label' => 'LinkedIn',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_51d4459528e5a',
				'label' => 'LinkedIn URL',
				'name' => 'linkedin',
				'type' => 'text',
				'instructions' => 'Please enter your LinkedIn URL.',
				'default_value' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_51d472041d3b2',
				'label' => 'LinkedIn Icon',
				'name' => 'liicon',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'uploadedTo',
			),
			array (
				'key' => 'field_51d473d70b80b',
				'label' => 'Display Options',
				'name' => 'lidisplay',
				'type' => 'checkbox',
				'instructions' => 'Choose where to display the icon.',
				'choices' => array (
					'header' => 'Header',
					'footer' => 'Footer',
				),
				'default_value' => '',
				'layout' => 'horizontal',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-social-media',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>