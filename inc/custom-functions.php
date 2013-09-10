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
function tagline($pageID){
	$post = get_post($pageID);
	$title = empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
	$tag = empty( $post->post_parent ) ? get_field( "tagline") : get_field( "tagline", $post->post_parent );
	$output = '<h1>'.$title.'</h1>';
	$output .= '<div class="tagline"><p>'.$tag.'</p></div>';
	echo $output;
}
?>