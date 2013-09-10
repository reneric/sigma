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
		<?php if(get_field("content_title")): ?>
		<header class="entry-header">
			<h2 class="entry-title"><?php the_field("content_title"); ?></h2>
		</header>
		<?php endif; ?>
		<div class="page-content">
			<header class="content clearfix">
				<?php if(get_field("subtitle")): ?>
				<h3><?php the_field("subtitle"); ?></h3>
			<?php endif; ?>
				<?php
					if ( has_post_thumbnail() ) { 
						echo '<div class="featured-image">';	
						the_post_thumbnail('content-thumb');
						echo '</div>';
					}  
				?>

			</header>
			<ul class="team clearfix">
				
					<?php
					if( get_field('team_member') ) : 
						$i = 1;
   		 				while(has_sub_field('team_member') ) : 
        					if(get_row_layout() == "member_info") :
    					$attachment_id = get_sub_field('photo');
    					$size = "team-thumb";
    					$cover = wp_get_attachment_image_src( $attachment_id, $size );
    					$name = (get_sub_field('first')) ? get_sub_field("first") : ''; 
    					$bg = get_sub_field('background_photo');
            					if($i==1):
            						$class = "";
            					else:
            						$class = "";
            					endif;
            					?>
										<li data-name="<?php echo $name; ?>" class="clearfix <?php echo $class; ?>" rel="<?php echo $bg; ?>">
									<div class="photo" style="background-image:url(<?php echo $cover[0]; ?>);"></div>		
									<div class="name">
<?php
$title = (get_sub_field('member_title')) ? ', '.get_sub_field("member_title") : '';

?>
										<h4><?php the_sub_field("first"); ?> <?php the_sub_field("last"); ?><?php echo $title; ?></h4>
										<h5><?php the_sub_field('title'); ?></h5>
									</div>
								</li>
            		<?php	endif;
            			$i++;
            			endwhile;
            		endif;
            		?>
			</ul>
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
