<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		</div><!-- #main .wrapper -->

	</div><!-- top-scroll -->
	<span class="fade"></span>
</div><!-- top-scroll-wrap -->

<footer>
	<div class="inner">
		<div class="logo-holder"><a href="<?php bloginfo( 'home'); ?>" class="logo"></a></div>
		<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	<div class="footer-panel"></div>
</footer>
<?php wp_footer(); ?>

</div><!-- page-wrapper -->
<ul class="member-bgs">
<?php
	if( get_field('team_member') ) : 
				while(has_sub_field('team_member') ) : 
			if(get_row_layout() == "member_info") :
				$attachment_id = get_sub_field('background_photo');
				$size = "full";
				$cover = wp_get_attachment_image_src( $attachment_id, $size); ?>
				<li rel="<?php echo $attachment_id; ?>" style="background-image:url(<?php echo $cover[0]; ?>)"></li>
	<?php	endif;
		endwhile;
	endif;
?>
</ul>
<div id="slideout">
  <div id="slideout_inner">
  	<h1><span>Menu</span></h1>
   <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
  </div>
</div>

</body>
</html>