<?php
/**
 * Template Name: Team
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
				<?php get_template_part( 'content', 'team' ); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
		<div id="sidebar" class="numbers">
			<div class="meet">
				<h5>More about Daniel</h5>
				<span></span>
			</div>
			<span class="more"></span>
				<?php 
					if( get_field('team_member') ) : 
						while(has_sub_field('team_member') ) : 
							if(get_row_layout() == "member_info") :
								$bg = get_sub_field('background_photo');
								echo '<ul class="facts" rel="' . $bg . '">';
								if(get_sub_field('fun_facts')):
									while(has_sub_field('fun_facts') ) : 
										echo '<li>';
										echo '<h4>' . get_sub_field('title') . '</h4>';
										echo '<p>' . get_sub_field('description') . '</p>';
										echo '</li>';
									endwhile;
								endif;
								echo '</ul>';
							endif;
						endwhile;
					endif;
				?>
			</ul>
		</div>
	</div><!-- #primary -->

<?php get_footer(); ?>