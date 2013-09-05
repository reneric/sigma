<?php
/**
 * Template Name: Services
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
            
                

    $args = array(
        'post_type' => 'product'
     
    );
    $wp_query = new WP_Query($args);  ?>

        <?php do_action('woocommerce_archive_description'); ?>
		<?php 
			$published_posts = wp_count_posts('product')->publish;
			$column = $published_posts/2;
			
		?>
        <?php if (have_posts()) : ?>

            <?php
            // I don't want the sorting anymore
            //do_action('woocommerce_before_shop_loop');
            ?>
			<div class="content-title"><h1>Order Now</h1></div>
			<div class="content-block"><div class="entry-content products">
            <ul class = "products-list">
            	<div class="product-column left">
            	<?php $i = 1;
                	while (have_posts()) : the_post();

						woocommerce_get_template_part('content', 'chs'); 
					if($i == $column): 
						echo '</div><div class="product-column">';
            		endif;
					$i++; 
               endwhile; // end of the loop.   ?>
           		</div> <!-- product-column -->
            </ul>
			</div></div>
            <?php
            /*  woocommerce pagination  */
            do_action('woocommerce_after_shop_loop');
            ?>

        <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

            <?php woocommerce_get_template('loop/no-products-found.php'); ?>

        <?php endif; 
    

			 	get_template_part("partials/ribbon"); ?>
<?php get_footer(); ?>