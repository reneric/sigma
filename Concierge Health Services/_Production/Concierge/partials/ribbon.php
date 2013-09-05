<div class="ribbon clearfix row">
	<div class="inner">	
		<div class="span4 block health">
			<h1>My </br>Health Resume</h1>
		</div>
		<div class="span4 block news">
			<h2>News</h2>
			<div class="news-feed">
				<?php $args = array ( 'post_type' => "post", 'posts_per_page' => 2 );
				$loop = new WP_Query( $args );
				if ($loop ->have_posts() ):
				   	while ($loop ->have_posts() ) : $loop->the_post();?>
					    <article>
					<h4><?php the_title(); ?></h4>
					<div class="summary">
						<p><?php the_excerpt(); ?></p>
					</div>
				</article>
					<?php endwhile; ?>
				<?php endif; ?>
				

			</div>
		</div>
		<div class="span4 block diet">
			<h1>My </br>Dietitian</h1>
		</div>
	</div>
</div>