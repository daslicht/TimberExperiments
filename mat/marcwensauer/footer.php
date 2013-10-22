<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_sidebar( 'main' ); ?>

	<div class="site-info">
		<?php do_action( 'twentythirteen_credits' ); ?>
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentythirteen' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentythirteen' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentythirteen' ), 'WordPress' ); ?></a>
	</div>
</footer>


