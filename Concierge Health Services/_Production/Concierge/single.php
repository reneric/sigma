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
							$thumb = get_the_post_thumbnail($page->ID, 'main-thumb');
						}else{
							$thumb = '<img src="'.get_stylesheet_directory_uri().'/img/placeholder-800x238.png"/>';
						}
						echo $thumb; 
						endwhile;
					?>
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