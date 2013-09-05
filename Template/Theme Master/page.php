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
    <!-- Main Content -->
    <div class="content" role="main">
        <h1>&quot;If we don't <strong>have</strong> it, you don't <span style="color:red;">need</span> it!&quot;</h1>
        
        <div class="home-services clearfix">
            <ul>
                <li>
                    <a href="#"><span class="drain"></span><h3>Drain &amp; Sewer</h3>
                        <p>Etiam fermentum dapibus leo, sed tempus nibh rutrum eget. Nulla sodales mi turpis, eget iaculis magna .</p>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="plumb"></span><h3>Plumbing Repairs</h3>
                        <p>Etiam fermentum dapibus leo, sed tempus nibh rutrum eget. Nulla sodales mi turpis, eget iaculis magna dignissim id. Nunc ac.</p>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="video"></span><h3>Video Inspection</h3>
                        <p>Etiam fermentum dapibus leo, sed tempus nibh rutrum eget. Nulla sodales mi turpis, eget iaculis magna .</p>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="remodel"></span><h3>Remodeling</h3>
                        <p>Etiam fermentum dapibus leo, sed tempus nibh rutrum eget. Nulla sodales mi turpis, eget iaculis magna dignissim id. Nunc ac blandit purus? </p>
                    </a>
                </li>
                <li>
                    <a href="#"><span class="hydro"></span><h3>Hydro-blasting</h3>
                        <p>Etiam fermentum dapibus leo, sed tempus nibh rutrum eget. Nulla sodales mi turpis, eget iaculis magna dignissim idefesm.</p>
                    </a>
                </li>
            </ul>
        </div><!-- home-services -->
            </div>
    <!-- End Main Content -->
        <div class="connect clearfix">
            <div class="left-connect c-col"></div>
            <div class="right-connect c-col"></div>
        </div><!-- connect  -->
    </div><!-- content -->

        <?php if ( ! have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
            <?php endwhile; ?>

        <?php //else : ?>

            <h2><?php _e('No posts.', 'codingHat' ); ?></h2>
            <p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'codingHat' ); ?></p>
            
        <?php endif; ?>

<?php// get_sidebar(); ?>
<?php get_footer(); ?>