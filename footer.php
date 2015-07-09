<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package A Dance With Mobile First
 */
?>

<footer id="colophon-left" class="site-footer" role="contentinfo">
		<div class="site-info">&copy; <?php echo date('Y'); ?>
			<a href="<?php echo esc_url( __( 'http://rachelleggett.com/', 'a-dance-with-mobile-first' ) ); ?>"><?php printf( __( ' %s', 'a-dance-with-mobile-first' ), 'Rachel Leggett' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s built with %2$s.', 'a-dance-with-mobile-first' ), 'A Dance With Mobile First', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			<p id="top-link"><a href="#">Back to top &uarr;</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">&copy; <?php echo date('Y'); ?>
			<a href="<?php echo esc_url( __( 'http://rachelleggett.com/', 'a-dance-with-mobile-first' ) ); ?>"><?php printf( __( ' %s', 'a-dance-with-mobile-first' ), 'Rachel Leggett' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s built with %2$s.', 'a-dance-with-mobile-first' ), 'A Dance With Mobile First', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			<p id="top-link"><a href="#">Back to top &uarr;</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
