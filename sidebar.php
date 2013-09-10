<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		
	<?php endif; ?>
	<div id="sidebar" class="clearfix">
		<?php 
			$posts = get_field('fact_tiles');
			if( $posts ): ?>
				<span class="numbers"></span>
				<ul class="bonus">		
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
					<?php 
						$text = "";
						$type = get_field('fact');
						if($type == 'text'):
							if(get_field('small_text')):
	$text .= '<bdi>'.get_field("small_text").'</bdi>';
	$text .= '<p class="double">'.get_field("large_text").'</p>';
							else:
	$text .= '<p>'.get_field("large_text").'</p>';
							endif;
				echo '<li>';
					echo '<span>'.$text.'</span>';
					echo '<h5>'.get_the_title().'</h5>';
				echo '</li>';
						else:
							$attachment_id = get_field("image");
							$size = "full";
							$image = wp_get_attachment_image_src( $attachment_id, $size);
							echo '<li>';
								echo '<span style="background-image:url('.$image[0].')"></span>';
								echo '<h5>'.get_the_title().'</h5>';
							echo '</li>';
						endif;
					 ?>
				<?php endforeach; ?>
				</ul>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif;
			 ?>
	</div>