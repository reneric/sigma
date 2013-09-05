<?php
	
function subnav(){
	global $post;
		$page = ($post->post_parent ? $post->post_parent : $post->ID );
		wp_list_pages( array(
			    'title_li' => '',
			    'child_of' => $page,
			    'depth' => '1' )
			);
	
	
}
?>