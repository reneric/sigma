<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>
</div><!-- Main -->
<!--footer -->
<section class="footer-bar">
    <div class="stay"></div>
    <div class="social-footer"></div>
</section>
<footer>
	<!-- {%FOOTER_LINK} -->
	<div class="mainFooter">
		<div class="privHold">
		 	<pre class="textPrivacy"><?php if( get_field("copyright_text")) { esc_attr_e('©', 'codingHat'); ?> <?php _e(date('Y'));?> <?php get_field( 'copyright_text' ); ?>
				<?php } // end if ?>
		 	</pre>
		</div>
	</div>
</footer>
	<!--footer end-->
 <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
<?php wp_footer(); ?>
<?php ch_footer(); ?>
</body>
</html>