<?php
/**
 * Header
 *
 * Setup the header for our theme
 *
 * @package The Coding Hat Child
 * @subpackage dezinsAPPS
 * @since The Coding Hat, powered by dezinsAPPS 1.0
 */
?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Set the viewport width to device width for mobile -->
<title><?php echo bloginfo('blogname'); ?></title>
<?php ch_header(); ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css" />
</head>
<body <?php body_class(); ?>>
   <header>
   	   <?php social_media_header(); ?>
        <nav id="main-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'left', 'container' => '', 'fallback_cb' => 'codingHat_page_menu', 'walker' => new foundation_navigation() ) ); ?>
        </nav>
    </header>
	<div id="main"> 	