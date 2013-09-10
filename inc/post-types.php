<?php 
add_action( 'init', 'facts' );
function facts() {
	 $labels = array(
    'name' => _x('Company Facts', 'post type general name'),
    'singular_name' => _x('Fact', 'post type singular name'),
    'add_new' => _x('Add New', 'Fact'),
    'add_new_item' => __('Add new fact'),
    'edit_item' => __('Edit fact'),
    'new_item' => __('New fact'),
    'view_item' => __('View fact'),
    'search_items' => __('Search facts'),
    'not_found' =>  __('No facts found'),
    'not_found_in_trash' => __('No facts found in Trash'),
    'parent_item_colon' => ''
  );

  $supports = array('title',  'custom-fields');

  register_post_type( 'facts',
    array(
      'labels' => $labels,
      'public' => true,
      'supports' => $supports,
      'hierarchical' => false
    )
  );
}
?>