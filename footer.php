<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gr_s
 */
?>

	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'gr_s' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'gr_s' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'gr_s' ), 'gr_s', '<a href="http://codemotel.com/" rel="designer">Code Motel</a>' ); ?>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
