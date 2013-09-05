<?php

$ie6 = get_field("ie6_image_toolbar", "options");
$chrome = get_field("google_chrome_frame", "options");
$ithings = get_field("ithings_full_zoom_viewport", "options");
$ie = get_field("ie_css", "options");
$plugins = get_field("jquery_plugins", "options");
$scripts = get_field("jquery_scripts", "options");
$cache = get_field("cache_buster", "options");
if ( ! function_exists( 'ch_footer' ) ) :
	function ch_footer(){
		if(get_field("jquery_plugins", "options")):
			echo "<script type='text/javascript' src='".get_template_directory_uri()."/js/plugins.js?ver=".get_field("cache_buster", "options")."'></script>";
		endif;
		if(get_field("jquery_scripts", "options")):
			echo "<script type='text/javascript' src='".get_template_directory_uri()."/js/scripts.js?ver=".get_field("cache_buster", "options")."'></script>";
		endif;
	}
endif;
if ( ! function_exists( 'ch_cache' ) ) :
	function ch_cache(){
		echo '?ver='.get_field("cache_buster", "options");
	}
endif;
if ( ! function_exists( 'ie_killer' ) ) :
	function ie_killer(){
		if(get_field("ie6_image_toolbar", "options")):
			echo '<meta http-equiv="imagetoolbar" content="false" />';
		endif;
	}
endif;
if ( ! function_exists( 'chrome_frame' ) ) :
	function chrome_frame(){
		if(get_field("google_chrome_frame", "options")):
			echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
		endif;
	}
endif;
if ( ! function_exists( 'viewport' ) ) :
	function viewport(){
		if(get_field("ithings_full_zoom_viewport", "options")):
			echo '<meta name="viewport" content="width=1024px;" />';
		else :
			echo '<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />';
		endif;
	}
endif;
if ( ! function_exists( 'ie' ) ) :
	function ie(){
		if(get_field("ie_css", "options")):
			echo '<!--[if IE ]><link rel="stylesheet" href="'.get_template_directory_uri().'/css/ie.css'.get_field("cache_buster", "options").'" /><![endif]-->';
		endif;
	}
endif;
if ( ! function_exists( 'ch_header' ) ) :
	function ch_header(){
		ie_killer();
		chrome_frame();
		viewport();
		ie();
	}
endif;






















?>