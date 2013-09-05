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
    <section class="info">
        <div class="info-wrap clearfix">
            <div class="info-widget w-1">
                <h1>Award Winning Service</h1>
                <p>Here for all of your plumbing needs. Large or small.</p>
            </div>
            <div class="info-widget w-2">
                <h1>Award Winning Service</h1>
                <p>Here for all of your plumbing needs. Large or small.</p>
            </div>
            <div class="info-widget w-3">
                <h1>Award Winning Service</h1>
                <p>Here for all of your plumbing needs. Large or small.</p>
            </div>
        </div>
    </section>
    <!-- Main Content -->
    <div class="content" role="main">
        <h1>At <strong>Central Plumbing,</strong> we do it <span style="color:red;">right</span>.</h1>
        <div class="entities clearfix">
            <div class="col-left">
                <h1>Residential</h1>
                <div class="e-summary">
                    <p>Donec sit amet accumsan quam. Curabitur ultrices condimentum turpis, id sollicitudin magna malesuada in. Vivamus lacinia elementum leo, a lobortis enim luctus mattis. Nullam a dapibus magna! Vivamus sagittis nulla libero, id tempor est commodo at. </p>
                </div>
            </div>
            <div class="col-right">
                <h1>Commercial</h1>
                <div class="e-summary">
                    <p>Donec sit amet accumsan quam. Curabitur ultrices condimentum turpis, id sollicitudin magna malesuada in. Vivamus lacinia elementum leo, a lobortis enim luctus mattis. Nullam a dapibus magna! Vivamus sagittis nulla libero, id tempor est commodo at. </p>
                </div><!-- e-summary -->
            </div><!-- col-right -->
        </div><!-- entities -->
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