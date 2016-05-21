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
	<style>
		.social-icons ul li a.facebook {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/facebook.png';?>);}
		.social-icons ul li a.facebook:hover {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/facebook-hover.png';?>);}

		.social-icons ul li a.instagram {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/instagram.png';?>);}
		.social-icons ul li a.instagram:hover {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/instagram-hover.png';?>);}

		.social-icons ul li a.youtube {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/youtube.png';?>);}
		.social-icons ul li a.youtube:hover {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/youtube-hover.png';?>);}

		.social-icons ul li a.pinterest {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/pinterest.png';?>);}
		.social-icons ul li a.pinterest:hover {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/pinterest-hover.png';?>);}

		.social-icons ul li a.googleplus {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/googleplus.png';?>);}
		.social-icons ul li a.googleplus:hover {background-image: url(<?php echo get_template_directory_uri() . '/img/social-icons/googleplus-hover.png';?>);}

	</style>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-wrap">
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
					info@artea.dk

				</p>
			</div><!-- .site-info -->
			<div class="site-info social-icons">
				<ul>
					<li><a href="https://www.facebook.com/arteawebshop" class="facebook"></a></li>
					<li><a href="https://www.instagram.com/artea_denmark/" class="instagram"></a></li>
					<li><a href="#" class="youtube"></a></li>
					<li><a href="#" class="googleplus"></a></li>
					<li><a href="https://dk.pinterest.com/arteadenmark/" class="pinterest"></a></li>
				</ul>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
