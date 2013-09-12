<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<!-- <a data-viewport="480×800" data-icon="mobile">Samsung Galaxy S</a> -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php 
wp_enqueue_script('modernizr'); 
wp_enqueue_script('jquery'); 
wp_enqueue_script( 'ui' );
wp_enqueue_script( 'plugins' );
wp_enqueue_script( 'main' );
//wp_enqueue_script( 'fastclick' );

?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
if (have_posts()) {
  while (have_posts()) {
    the_post();
    $pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
    $firstchild = $pagekids[0];
    wp_redirect(get_permalink($firstchild->ID));
  }
}; ?>
<div class="page-bg"><img width="100%" height="100%" src="<?php echo get_template_directory_uri(); ?>/compressed/bg.png" alt="IE"></div>
<div id="page-wrapper" class="page-wrapper">
	<div id="menu-bar">
		<a href="#" id="menu-toggle">Menu</a>
	</div>
	<div class="top-scroll-wrap">
		<div class="top-scroll clearfix">
			<?php if(!is_home()): ?>
			<header id="masthead" class="site-header clearfix" role="banner">
				<nav id="secondary" role="secondary">
					<ul>
						<li class="contact"><a href="#">Contact Us</a></li>
						<li class="login"><a href="#">Employee Login</a></li>
					</ul>
				</nav>
				<div class="page-header">
					<?php tagline(); ?>
				</div>
				<div class="subnav clearfix">
					<ul>
						<?php subnav(); ?>
					</ul>
				</div>
			</header><!-- #masthead -->
		<?php endif; ?>
			<div id="main" class="wrapper clearfix">
