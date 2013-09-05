<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="content">
			<div class="content-block">
				<div id="page-intro">
					<?php while ( have_posts() ) : the_post(); 
						if ( has_post_thumbnail() ) {
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
						echo '<img src="'.$thumb.'" alt="'.get_the_title().'">';
						endwhile; ?>
				</div>
				<div class="row areas clearfix">
					<div class="span4 area">
						<div class="featured-image">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/featured1.png" alt="">
						</div>
						<h1 class="label">INDIVIDUALS</h1>
						<div class="entry-summary">
							<p>Proactive people who are well-informed about their health tend to make better decisions for themselves. Concierge offers a simple, direct way to manage your health and wellness. You order the lab work and we come to you — quickly, safely, and confidentially.
	</p>
						</div>
					</div>
					<div class="span4 area">
						<div class="featured-image">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/featured2.png" alt="">
						</div>
						<h1 class="label">GROUP WELLNESS</h1>
						<div class="entry-summary">
							<p>As an employer, showing your staff you care about them can go a long way. That’s why Concierge offers wellness screenings, baseline testing, and other services for businesses. It’s like an added employee benefit that will make your team feel valued.</p>
						</div>
					</div>
					<div class="span4 area">
						<div class="featured-image">
							<img src="<?php echo get_stylesheet_directory_uri();?>/img/featured3.png" alt="">
						</div>
						<h1 class="label">HEALTHCARE PROVIDERS</h1>
						<div class="entry-summary">
							<p>Some doctors and case managers are used to waiting days for lab work to be processed, but you don’t have to be one of them.</p>
							<p>Concierge offers speedy testing, turnaround, and delivery for you and your patients. It’s like having your own team of certified medical professionals at your beaconed call.</p>
						</div><!-- entry-summary -->
					</div><!-- area -->
				</div><!-- row -->
			</div><!-- content-block -->
			<?php get_template_part("partials/ribbon"); ?>
<?php get_footer(); ?>