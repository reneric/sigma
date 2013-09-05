<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 
get_template_part("map");
?>
<div id="primary" class="content-area">
		<div id="content" class="site-content" role="content">
			<div class="content-block map">
				<div id="map-canvas"></div>
				<div class="addy clearfix">
					<div class="a-left clearfix">
						<ul>
							<li><?php the_field("laf_address","options"); ?></li>
							<li><?php the_field("laf_address2","options"); ?></li>
							<li><?php the_field("laf_address3","options"); ?></li>
						</ul>
					</div>
					<div class="a-right clearfix">
						<ul>
							<li><?php the_field("br_address","options"); ?></li>
							<li><?php the_field("br_address2","options"); ?></li>
							<li><?php the_field("br_address3","options"); ?></li>
						</ul>
					</div>
				</div>
			</div><!-- content-block -->
			<?php
				while ( have_posts() ) : the_post(); ?>
					
					<?php 
						while(has_sub_field("editor")): 
							if(get_row_layout() == "two_column"): 
				                    $title = get_sub_field('section_title');
				                    $p = get_sub_field('section_content');
				                    $content = '<div class="content-title"><h1>'.$title.'</h1></div>';
				                    $content .= '<div class="content-block"><div class="entry-content two_col">'.$p.'</div></div>';
				                    echo $content;
				            elseif(get_row_layout() == "single_column"): 
				                    $title = get_sub_field('section_title');
				                    $p = get_sub_field('section_content');
				                    $content = '<div class="content-title"><h1>'.$title.'</h1></div>';
				                    $content .= '<div class="content-block"><div class="entry-content one_col">'.$p.'</div></div>';
				                    echo $content;
				            endif;
		            	endwhile;
            	endwhile;
				get_template_part("partials/ribbon"); 
			?>
<?php get_footer(); ?>