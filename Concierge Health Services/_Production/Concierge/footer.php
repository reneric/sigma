<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="inner">
			

			<div class="site-info">
				<?php $menu = array(
					    'theme_location'  => '',
					    'menu'            => 'Main',
					    'container'       => 'div',
					    'container_class' => 'footer-menu',
					    'container_id'    => '',
					    'menu_class'      => 'nav',
					    'menu_id'         => '',
					    'echo'            => true,
					    'fallback_cb'     => 'wp_page_menu',
					    'before'          => '',
					    'after'           => '',
					    'link_before'     => '',
					    'link_after'      => '',
					    
					    'depth'           => 0,
					    'walker'          => ''
					);
					wp_nav_menu($menu); ?>
				<span class="plus"></span>
				<div class="copy">
					&copy; Concierge Health Services 2013
				</div>	
			</div><!-- .site-info -->
		</div><!-- inner -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>