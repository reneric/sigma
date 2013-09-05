<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css">
</head>
<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header clearfix" role="banner">
			<div class="header-inner">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				</a>
				<div class="info-block">
					<div class="info-top clearfix">
						<ul class="clearfix social">
							<li><a class="sm-icon gp" href="#"></a></li>
							<li><a class="sm-icon tw" href="#"></a></li>
							<li><a class="sm-icon fb" href="#"></a></li>
							<li><a class="sm-icon cart" href="#"></a></li>
						</ul>
					</div>
					<div class="search-forms">
						<?php echo get_search_form(); ?>
					</div>
				</div>
			</div><!-- header-inner -->
			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php $menu = array(
					    'theme_location'  => '',
					    'menu'            => 'Main',
					    'container'       => 'div',
					    'container_class' => 'nav-menu',
					    'container_id'    => '',
					    'menu_class'      => 'nav',
					    'menu_id'         => '',
					    'echo'            => true,
					    'fallback_cb'     => 'wp_page_menu',
					    'before'          => '',
					    'after'           => '',
					    'link_before'     => '',
					    'link_after'      => '',
					    
					    'depth'           => 0,
					    'walker'          => ''
					);
					wp_nav_menu($menu); ?>
					
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">
