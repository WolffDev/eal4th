<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eal4th
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="footer-mobile-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo get_template_directory_uri() . '/img/logo-test.svg';?>" alt="header mobile logo">
				</a>
			</div>
			<p>
				Artea ApS<br>
				Kardemommegade 13 B<br>
				Transaktionsbyen 5100<br>
				<br>
				<a href="tel:+4530401020">+45 3040 1020</a><br>
				<a href="mailto:info@artea.dk?subject:Kontakt">info@artea.dk</a>

			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
