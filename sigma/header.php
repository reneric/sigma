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
<meta name="viewport" content="width=1400px" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_enqueue_script('jquery'); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page-bg"></div>
<div class="page-wrapper">
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
					<h1><?php the_title(); ?></h1>
					<div class="tagline">
						<p><?php the_field("tagline"); ?></p>
					</div>
				</div>
				<div class="subnav clearfix">
					<ul>
						<?php subnav(); ?>
					</ul>
				</div>
			</header><!-- #masthead -->
		<?php endif; ?>
			<div id="main" class="wrapper">
