<?php
while (have_posts()) : the_post(); 
$cover = get_field('cover_photo');
$post_object = get_field('gallery');
if( $post_object ): 
	$post = $post_object;
	setup_postdata( $post ); 
 
	?>
    <a class="galPic" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"
    	<img src="<?php echo $cover; ?>" alt="<?php the_title(); ?>">
    	<h3><?php the_title(); ?> </h3>
    	
    </a>
    <?php wp_reset_postdata(); ?>
	<?php endif; ?>
<?php endwhile; ?>