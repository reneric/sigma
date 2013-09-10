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
if (have_posts()) {
	while (have_posts()) {
		the_post();
		$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
		if ($pagekids) {
			$firstchild = $pagekids[0];
			wp_redirect(get_permalink($firstchild->ID));
		}else{
get_header(); 



?>
	<div id="primary" class="site-content">
		<div id="content" role="content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	<?php get_sidebar(); ?>

	</div><!-- #primary -->
<?php 
		}
	}
}

get_footer(); ?>