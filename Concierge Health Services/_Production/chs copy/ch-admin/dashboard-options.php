<?php
/**
 *
 * theCodingHat Theme Options
 * 
 * File: dashboard-options.php
 * Description: Clean up and customize the dashboard
 * Author: Ren Simmons
 * Author URI: http://iCodeThings.com
 * Version: 1.0.1
 *
 *
 */
/*******************************
	Change "Dashboard" Menu Label (Laminar Admin Menu)
********************************/

if(function_exists("get_field")!=''){
function change_dashboard_menu_label() {
	global $menu;
	global $submenu;
	if(get_field('dashboard_menu_name', 'options')!=''):
	$menu[2][0] = get_field('dashboard_menu_name', 'options');
	endif;
	echo '';
};
add_action( 'admin_menu', 'change_dashboard_menu_label' );



/********************************
 * Dashboard Footer Links
 ********************************/
function modify_footer_admin () {
  echo '<div style="float:right;margin-top:1em;">Created by <a style="color:#a9c121;" target="_blank" href="http://dezinsinteractive.com">dezinsINTERACTIVE</a>.';
  echo ' Powered by <a style="color:#a9c121;" target="_blank" href="http://dezinsapps.com">dezinsAPPS</a>.</div>';
  echo '<a class="logofooter" style="background-image:url('.get_template_directory_uri().'/img/dez-logo.png);" target="_blank" href="http://dezinsinteractive.com"></a>';
  echo '<style>#wlcms-footer-container{display:none;}a.logofooter{background-repeat: no-repeat;background-size: 99px auto;display: block;float: left;height: 44px;margin: 0 0 0 2em;width: 100px;}p#footer-upgrade{display:none;}</style>';
}

add_filter('admin_footer_text', 'modify_footer_admin');
function hide_things(){
	//echo '<style>#customize-coxntrols{display:none;margin-left:0;}</style>';
}
//Dashboard Action Hooks
add_action( 'admin_init', 'hide_things');
add_action( 'admin_init', 'c3m_admin_style' );
add_action( 'admin_init', 'c3m_remove_dashboard_meta' );
add_action( 'admin_init', 'c3m_remove_post_meta' );
add_action( 'admin_menu', 'c3m_remove_admin_menus' );
add_action( 'admin_menu', 'c3m_remove_admin_submenus' );
add_filter( 'admin_user_info_links', 'c3m_user_greeting' );
add_action( 'admin_head', 'c3m_custom_logo' );
add_action( 'login_head', 'c3m_custom_login_css' );
add_action( 'login_head', 'c3m_custom_login_logo' );
add_filter( 'admin_footer_text', 'c3m_remove_footer_admin' );
add_action( 'init', 'c3m_change_post_object_label' );
add_action( 'admin_menu', 'c3m_change_post_menu_label' );
add_filter( 'admin_body_class', 'c3m_admin_body_class' );



/*******************************
	Get Post Meta (Hook)
********************************/
function my_meta($option = null){
	global $post;
	$content = get_post_meta($post->ID, $option, true);
	return $content;
}
function laminar_meta($option = null){
	global $post;
	$content = my_meta($option);
	echo $content;
}
	


/*******************************
	Post Thumbnails and Sizes
********************************/
function post_page_thumb($type = null){
global $post;
$output = '';
if(has_post_thumbnail()){
$image_id = get_post_thumbnail_id();  
$image_url = wp_get_attachment_image_src($image_id,$type.'-thumb');  
$image_url = $image_url[0]; 
$bg_size = "100%";
}else{
$image_url = get_bloginfo('template_url')."/images/".$type."-default.png";
$bg_size = "80%";
};
$output = '<div class="'.$type.'-image" style="background-image:url(\''.$image_url.'\');background-size:'.$bg_size.' auto;"></div>';
echo $output;
};




/*******************************
	Custom Thumbnail
		If no thumbnail, a default image will be displayed.
********************************/
function custom_thumbnail($thumb = ''){
	$output = get_custom_thumbnail($thumb);
	$output = apply_filters('custom_thumbnail', $output);
	echo $output;	
}

function get_custom_thumbnail($thumb = ''){
global $post;
if(has_post_thumbnail($post->ID)) { 
	$output = the_post_thumbnail($thumb);
}else{ 
	$temp = get_bloginfo('template_url');
	$output = '<img src="' . $temp . '/images/logo.png" >';
	
}
	return $output;
}



/*******************************
	Custom Excerpt for Custom Post Types with More-Link
			the_custom_excerpt($the_post_type, $limit, $more_text)
********************************/
function the_custom_excerpt($the_post_type = null, $limit = 55, $more_text = 'Continue Reading') {
	$content = get_the_custom_excerpt($the_post_type, $limit, $more_text);
	$content = apply_filters('the_custom_excerpt', $content);
	echo $content;
}
function get_the_custom_excerpt($the_post_type = null, $limit = 55, $more_text = 'Continue Reading') {
	global $post;
	$output = get_post_meta($post->ID, $the_post_type, true);
	if( $output != '' && $limit > 0 ) {
	$words = preg_split( '/([\s]+)/', $output, -1, PREG_SPLIT_DELIM_CAPTURE );
	$count_words = 0;
	$output = '';
			foreach( $words as $word ) {
			// is tag opened?
			if( 0 < preg_match( '/<[^>]*$/s', $word ) ) $enclosed_by_tag = true;
			elseif( 0 < preg_match( '/>[^<]*$/s', $word ) ) $enclosed_by_tag = false; 			// get entire word 			
			if('' != trim( $word ) && substr( $word, -1, 1 ) != '>' ) $count_words ++;
			$output .= $word;
			if( $count_words >= $limit ) break;
		}
	$content = $output . '... ';
	$content .= apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "\" class=\"more-link\">$more_text</a>", $more_text );
	if ( post_password_required($post) ) {
		$output = __('There is no excerpt because this is a protected post.', 'ASC' );
		return $output;
		}
	}
	return $content; 
}




/*******************************
	Change Main Dashboard Title
********************************/
function change_dashboard_title(){ 
    global $current_screen;
    if( ($current_screen->id == 'dashboard' ) ) :
			$val = "<img style='height:auto;width:40px;opacity:.5;position:relative;top:-5px;float:left;padding:0 10px;'  src='" . get_field("logo", "options") . "'>".get_field("dashboard_header_name", "options")."";
				echo '<style type="text/css">.icon32{display:none;}#wpbody-content .wrap h2 { visibility: hidden; }</style>
						<script type="text/javascript">
								jQuery(document).ready(function($) {
										$("#wpbody-content .wrap h2:eq(0)").html("'.$val.'");
										$("#wpbody-content .wrap h2").css("visibility","visible");
								});
						</script>';
						
	endif;
};
add_action('admin_head', 'change_dashboard_title');

function custom_admin_logo() {
    echo '
        <style type="text/css">
          #wpwrap {background-position:center center;background-size:150px auto;background-repeat:no-repeat;background-image: url(' . get_field("dashboard_background_logo", "options") . ') !important;}
          #wp-admin-bar-wp-logo > .ab-item .ab-icon{background-position:0 0 !important;background-size:100% auto;background-image: url('.get_bloginfo('template_directory').'/ch-admin/img/barlogo.png) !important; }
        </style>
    ';
}
add_action('admin_head', 'custom_admin_logo');

/*******************************
	Change "Posts" Menu Label (codingHat Admin Menu)
********************************/
function change_post_menu_label() {
	global $menu;
	global $submenu;
	if (get_option('codingHat_posts_name')!='') : 
	$menu[5][0] = get_option('laminar_posts_name');
	$submenu['edit.php'][5][0] = '';
	$submenu['edit.php'][10][0] = 'Add ' . get_option('codingHat_posts_name');
	$submenu['edit.php'][16][0] = get_option('codingHat') . ' Tags';
	endif;
	echo '';
};
add_action( 'admin_menu', 'change_post_menu_label' );
/*******************************
	Change "Posts" Object Labels (Laminar Admin Menu)
********************************/
function change_post_object_label() {
	global $wp_post_types;
	if (get_option('codingHat_posts_name')!='') : 
	$labels = &$wp_post_types['post']->labels;
	$labels->name = get_option('codingHat_posts_name');
	$labels->singular_name = get_option('codingHat_posts_name');
	$labels->add_new = 'Add ' . get_option('codingHat_posts_name');
	$labels->add_new_item = 'Add ' . get_option('codingHat_posts_name');
	$labels->edit_item = 'Edit ' . get_option('codingHat_posts_name');
	$labels->new_item = get_option('codingHat_posts_name');
	$labels->view_item = 'View ' . get_option('codingHat_posts_name');
	$labels->search_items = 'Search ' . get_option('codingHat_posts_name');
	$labels->not_found = 'No ' . get_option('codingHat_posts_name') . ' found';
	$labels->not_found_in_trash = 'No ' . get_option('codingHat_posts_name') . ' found in Trash';
	endif;
}
add_action( 'init', 'change_post_object_label' );




/*******************************
	Page Name/slug (capitalized)
********************************/
function get_pagename() {
	global $post;
	global $pagename;
	return '<span style="text-transform:capitalize">'.$pagename.'</span>';	
}
function laminar_pagename(){
	global $post;
	global $pagename;
	$content = get_pagename();
	echo $content;
}
function get_slug() {
$post_data = get_post($post->ID, ARRAY_A);
$slug = $post_data['post_name'];
return $slug; 
}
function slug() {
$slug = get_slug();
echo $slug; 
}

/*******************************
	Used for conditional statement.
		if(is_post_type('type'))
********************************/
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}



/********************************
 * 	Remove AIM, Jabber and YIM from user profile page
 ********************************/
add_filter('user_contactmethods','hide_profile_fields',10,1);

function hide_profile_fields( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['jabber']);
unset($contactmethods['yim']);
return $contactmethods;
}



/********************************
 * 	Dashboard CSS
 ********************************/
function c3m_admin_style() {
wp_enqueue_style( 'c3m_admin_css', get_bloginfo( 'template_directory' ) . '/codingHat-admin/css/admin.css', false, '1.0', 'all');
}



/********************************
 * 	Removes Dashboard Widgets
 ********************************/
function c3m_remove_dashboard_meta() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_right_now', 'dashboard', 'side');
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}



/********************************
 * 	Remove Specific Meta Boxes
 ********************************/
function c3m_remove_post_meta() {
//  remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); 
//  remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); 
//  remove_meta_box( 'commentsdiv', 'page', 'normal' );
//  remove_meta_box( 'commentsdiv', 'post', 'normal' );  
//  remove_meta_box( 'authordiv', 'page', 'normal' );
//  remove_meta_box( 'authordiv', 'post', 'normal' ); 
//  remove_meta_box( 'trackbacksdiv', 'post', 'normal' );
//  remove_meta_box( 'trackbacksdiv', 'page', 'normal' );
//  remove_meta_box( 'postcustom', 'post', 'normal' );
//  remove_meta_box( 'postcustom', 'page', 'normal' );
//  remove_meta_box( 'slugdiv', 'post', 'normal' );
//  remove_meta_box( 'slugdiv', 'page', 'normal' );
  //remove_meta_box( 'excerptdiv', 'post', 'normal' );
//  remove_meta_box( 'page_choicediv', 'post', 'normal' );
//  remove_meta_box( 'page_choicediv', 'sponsor_ad', 'normal' );
}



/********************************
 * 	Remove Admin Menus
 ********************************/
function c3m_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'link-manager.php' );
    //remove_menu_page( 'edit.php?post_type=page' );
//  remove_menu_page( 'plugins.php' );
//  remove_menu_page( 'users.php' );
//  remove_menu_page( 'options-general.php' );
}



/********************************
 * 	Remove sub level admin menus
 ********************************/
function c3m_remove_admin_submenus() {
    //remove_submenu_page( 'themes.php', 'theme-editor.php' );
    //remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
//  remove_submenu_page( 'themes.php', 'nav-menus.php' );
//  remove_submenu_page( 'themes.php', 'widgets.php' );
//  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
//  remove_submenu_page( 'plugins.php', 'plugin-install.php' );
//  remove_submenu_page( 'users.php', 'users.php' );
//  remove_submenu_page( 'users.php', 'user-new.php' );
//  remove_submenu_page( 'options-general.php', 'options-writing.php' );
//  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
//  remove_submenu_page( 'options-general.php', 'options-reading.php' );
//  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
//  remove_submenu_page( 'options-general.php', 'options-media.php' );
//  remove_submenu_page( 'options-general.php', 'options-privacy.php' );
//  remove_submenu_page( 'options-general.php', 'options-permalinks.php' );
}



/********************************
 * 	This Adds an extra body class to a custom post type editor screen to target with css
 ********************************/
function c3m_admin_body_class( $classes ) {
    global $wpdb, $post;
    $post_type = get_post_type( $post->ID );
    if ( is_admin() && ( $post_type == 'sponsor_ad' ) ) {
        $classes .= 'post_type-' . $post_type;
    }
    return $classes;
}



/********************************
 * 	Replaces Howdy with Welcome pretty self explanitory
 ********************************/
function c3m_user_greeting( $greet_msg ) {
    $greet_msg = str_replace( 'Howdy,','Welcome', $greet_msg);
    return $greet_msg;
}



/********************************
 * 	Admin Header Logo  this replaces the WordPress logo with your own
 ********************************/
function c3m_custom_logo() {
   echo '
      <style type="text/css">
         #header-logos { background-image: url('.get_template_directory_uri().'/img/DDG-Logo.png) !important; width:98px; }
      </style>  
   ';
}



/********************************
 * 	Admin Footer Logo Same as above but for the footer
 ********************************/
function c3m_remove_footer_admin() {
    echo '<div id="wlcms-footer-container">';
    echo '<a target="_blank" href="http://c3mdigital.com"><img style="width:80px;" src="'.get_bloginfo('template_directory').'/images/developer-logo.png" id="wlcms-footer-logo"></a>';
    echo '</div><p id="safari-fix"';
}



/********************************
 * 	Login Screen CSS Custon css to replace the WP logo on the login screen
 ********************************/
function c3m_custom_login_css() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/ch-admin/css/login.css" />'; 
}



/********************************
 * 	Login Screen Logo this incjects your logo css into the login css page
 ********************************/
function c3m_custom_login_logo() {
    echo '<style type="text/css">
    .login h1 a { background-image:url('.get_field("login_logo", "option").') !important; margin-bottom: 20px; height:143px;background-size:100% auto; }
    .login #nav a, .login #backtoblog a {color:'.get_field("login_link", "option").' !important;}
    </style>
    <script type="text/javascript">
        function loginalt() {
            var changeLink = document.getElementById(\'login\').innerHTML;
            changeLink = changeLink.replace("http://wordpress.org/", "' . site_url() . '");
            changeLink = changeLink.replace("Powered by WordPress", "' . get_bloginfo('name') . '");            
            document.getElementById(\'login\').innerHTML = changeLink;
        }
        window.onload=loginalt;
    </script>
    ';
}



/********************************
 * 	This changes the name of Posts to something different
 ********************************/
function c3m_change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = get_field("blog_menu_singular","options");
    //$menu[10][0] = 'Files';
    $submenu['edit.php'][5][0] = get_field("blog_menu_singular","options") .' Posts';
    $submenu['edit.php'][10][0] = 'Add '.get_field("blog_menu_singular","options") .' Post';
    //$submenu['edit.php'][15][0] = 'Status';
    echo '';
}



/********************************
 * 	Changes the label for the posts we changed above
 ********************************/
function c3m_change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = get_field("blog_menu_singular","options");
    $labels->singular_name = 'Add New '.get_field("blog_menu_singular","options").' Post';
    $labels->add_new = 'Add '.get_field("blog_menu_singular","options").' Posts';
    $labels->add_new_item = 'Add '.get_field("blog_menu_singular","options").' post';
    $labels->edit_item = 'Edit '.get_field("blog_menu_singular","options").' Post';
    $labels->new_item = ''.get_field("blog_menu_singular","options").' Post';
    $labels->view_item = 'View '.get_field("blog_menu_singular","options").' Post';
    $labels->search_items = 'Search '.get_field("blog_menu_singular","options").' Posts';
    $labels->not_found = 'No '.get_field("blog_menu_singular","options").' Posts Found';
    $labels->not_found_in_trash = 'No '.get_field("blog_menu_singular","options").' Posts Found in Trash';
}



/********************************
 * 	Post Edit Columns Customizes the post edit columns by adding the featured image as a thumbnail and shows the excerpt 
 ********************************/

add_filter( 'manage_edit-post_columns', 'add_new_post_columns');
add_filter( 'manage_edit-post_columns', 'unset_the_defaults');
add_action( 'manage_posts_custom_column', 'testimonial_custom_column', 10, 2);
add_action( 'manage_posts_custom_column', 'testimonial_source_column', 10, 2);
/********************************
 * 	Reset Default Columns
 ********************************/
function unset_the_defaults($defaults) {
    unset($defaults['author']);
   //unset($defaults['title']);
    return $defaults;

}
/********************************
 * 	Add New Column
 ********************************/
function add_new_post_columns($dfaults) {
    $dfaults['page_choice'] = 'Displayed On';
    $dfaults['article_source'] = 'Source';
    $dfaults['post_box_excerpt'] = 'Post Excerpt';
    $dfaults['post_box_image'] = 'Post Image';
    return $dfaults;
}
/********************************
 * 	Custom Testimonial Column
 ********************************/
function testimonial_custom_column($column_name, $post_id){
    $taxonomy = $column_name;
    $post_type = get_post_type($post_id);
    $terms = get_the_terms($post_id, $taxonomy);

    if (!empty($terms) ) {
        foreach ( $terms as $term )
            $post_terms[] ="<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " .esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
            echo join('', $post_terms );
    }
    else echo '<i>No Display Page Set. </i>';
}
/********************************
 * 	Testimonial Column Source
 ********************************/
function testimonial_source_column($column_name, $post_id) {
    global $post; global $prefix;
    if ($column_name == 'article_source') {
        echo get_post_meta($post_id, $prefix.'article-source', TRUE);
    }
    elseif ($column_name == 'post_box_image') {
       if ( get_post_meta($post_id, $prefix.'post_box_image', TRUE) ) { 
        echo '<img src="' .get_post_meta($post_id, $prefix.'post_box_image', TRUE). '" style="max-width:40%; max-height:40%;" />'; 
        }
        else echo 'No Post Box Image Set';
    }
    elseif ($column_name == 'post_box_excerpt') echo substr($post->post_excerpt, 0, 150) . '...';

    }


/*******************************
	Show social media icons and their URL's
********************************/
function get_social_media_header (){
	$fb = get_field('facebook_page', 'options'); 
	$tw = get_field('twitter', 'options');
	$gp = get_field('google_plus', 'options');
	$li = get_field('linkedin', 'options');
	$content = '<div class="linksHolder">';
    $content .= '<ul>';
    if(get_field("fbdisplay", "options")):
		if( in_array( 'header', get_field("fbdisplay", "options"))):
			$content .= '<li><a target="_blank" href="'.$fb.'"><img src="'.get_field("fbicon", "options").'" alt=""></a></li>';
		endif;
	endif;
	if(get_field("twdisplay", "options")):
		if( in_array( 'header', get_field("twdisplay", "options"))):
			$content .= '<li><a target="_blank" href="'.$tw.'"><img src="'.get_field("twicon", "options").'" alt=""></a></li>';
		endif;
	endif;
	if(get_field("gpdisplay", "options")):
		if( in_array( 'header', get_field("gpdisplay", "options"))):
			$content .= '<li><a target="_blank" href="'.$gp.'"><img src="'.get_field("gpicon", "options").'" alt=""></a></li>';
		endif;
	endif;
	if(get_field("lidisplay", "options")):
		if( in_array( 'header', get_field("lidisplay", "options"))):
			$content .= '<li><a target="_blank" href="'.$li.'"><img src="'.get_field("liicon", "options").'" alt=""></a></li>';
		endif;  
	endif;       
    $content .= '</ul>';
    $content .= '</div>';
    return $content;
}
function social_media_header(){
	$show = get_social_media_header();
	echo $show;
}

function my_acf_load_fields( $field )
{
	// reset choices
	$field['choices'] = array();
 
	// get the textarea value from options page
	$choices = get_field('name', 'option');
 	$choices .= get_field('email', 'option');
	// explode the value so that each line is a new array piece
	$choices = explode("\n", $choices);
 
	// loop through array and add to field 'choices'
	if( is_array($choices) )
	{
		foreach( $choices as $choice )
		{
			$field['choices'][ $choice ] = $choice;
		}
	}
 
    // Important: return the field
    return $field;
}
 
// v4.0.0 and above
add_filter('acf/load_field/name=Contact', 'my_acf_load_fields');



/*******************************
	Removes Personal Options section
	from users' profiles.
********************************/
function remove_opt_start($adddiv) {
$gettitle = array('#<h3>Personal Options</h3>#');
$adddiv = preg_replace($gettitle, '<div class="hidden">', $adddiv,1);
return $adddiv;
}
function start_remove_opt_start() { ob_start("remove_opt_start"); }
function end_remove_opt_start() { ob_end_flush(); }
function remove_opt_end($addend) {
$getname = array('#<h3>Name</h3>#');
$addend = preg_replace($getname, '</div><h3>Name</h3>',$addend,1);
return $addend;
}
function start_remove_opt_end() { ob_start("remove_opt_end"); }
function end_remove_opt_end() { ob_end_flush(); }
add_action('admin_head','start_remove_opt_start');
add_action('admin_head','start_remove_opt_end');
add_action('admin_footer','end_remove_opt_start');
add_action('admin_footer','end_remove_opt_end');
}



