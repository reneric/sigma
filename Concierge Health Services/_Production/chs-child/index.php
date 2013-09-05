<?php
/**
 * Home
 *
 * Setup the header for our theme
 *
 * @package dezinsAPPS
 * @subpackage iCodeThings, for dezinsAPPS
 * @since iCodeThings, for dezinsAPPS 1.0
 */
get_header(); ?>
<div id="primary" class="content-area"> 
        <div id="content" class="site-content" role="content">

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

        <?php else : ?>

            <h2><?php _e('No posts.', 'codingHat' ); ?></h2>
            <p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'codingHat' ); ?></p>
            
        <?php endif; ?>
    </div>
    <!-- End Main Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>