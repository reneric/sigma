<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><?php the_field("content_title"); ?></h2>
		</header>

		<div class="entry-content">
			<header class="content clearfix">
				<h3><?php the_field("subtitle"); ?></h3>
				<?php
					if ( has_post_thumbnail() ) { 
						echo '<div class="featured-image">';	
						the_post_thumbnail('content-thumb');
						echo '</div>';
					}  
				?>
			</header>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
