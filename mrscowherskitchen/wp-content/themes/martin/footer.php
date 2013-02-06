<?php
/**
 * @package WordPress
 * @subpackage Martin
 * @since Martin 1.0
 */
?>
	</div><!-- #contentblock -->


	<div id="footer" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>

		<div id="colophon">
			<?php printf( __( '%1$s by %2$s' ), 'Martin', '<a href="http://themestown.com">Themes Town</a>' ); ?> <span class="generator-link"><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'martin' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'martin' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'martin' ), 'WordPress' ); ?></a></span>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #container -->
</div><!-- #wrapper -->
</div><!-- #outerwrap -->

<?php wp_footer(); ?>
</body>
</html>