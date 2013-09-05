<?php
// Register Custom Post Type
function section() {
	$labels = array(
		'name'                => _x( 'Pages', 'Post Type General Name', 'dezinsAPPS' ),
		'singular_name'       => _x( 'Page', 'Post Type Singular Name', 'dezinsAPPS' ),
		'menu_name'           => __( 'Pages', 'dezinsAPPS' ),
		'parent_item_colon'   => __( 'Parent Page:', 'text_domain' ),
		'all_items'           => __( 'All Pages', 'dezinsAPPS' ),
		'view_item'           => __( 'View Page', 'dezinsAPPS' ),
		'add_new_item'        => __( 'Add New Page', 'dezinsAPPS' ),
		'add_new'             => __( 'New Page', 'dezinsAPPS' ),
		'edit_item'           => __( 'Edit Page', 'dezinsAPPS' ),
		'update_item'         => __( 'Update Page', 'dezinsAPPS' ),
		'search_items'        => __( 'Search Pages', 'dezinsAPPS' ),
		'not_found'           => __( 'No Pages found', 'dezinsAPPS' ),
		'not_found_in_trash'  => __( 'No Pages found in Trash', 'dezinsAPPS' ),
	);

	$args = array(
		'label'               => __( 'Pages', 'dezinsAPPS' ),
		'description'         => __( 'Pages', 'dezinsAPPS' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'comments', 'custom-fields'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '/wp-content/themes/dezinsAPPS/img/icons/rulerpencil.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'section', $args );
}

// Hook into the 'init' action
add_action( 'init', 'section', 3 );
?>