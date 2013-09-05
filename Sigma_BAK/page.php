<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content clearfix">
		<div id="content" role="content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	<div id="sidebar" class="numbers">
		<span class="numbers"></span>
		<ul class="bonus">
			<li>
				<span></span>
			</li>
			<li>
				<span></span>
			</li>
			<li>
				<span></span>
			</li>
			<li>
				<span></span>
			</li>
		</ul>
	</div>

	</div><!-- #primary -->

<?php get_footer(); ?>