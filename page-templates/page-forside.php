<?php
/**
 * Template Name: Forside
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="top-image" style="background-image: url(<?php echo get_template_directory_uri() . '/img/top-image.jpeg';?>)">
		</div>
		<main id="frontpage" class="frontpage-wrapper" role="main">

			<div class="abn-ref-link">
				<div class="text-vh-align">
					<a href="#">
						<p>
							Se abonnementsløsninger
						</p>
					</a>
				</div>
			</div>

			<div class="user-select">
				<div class="text-vh-align">
					<p>
						Følgerne har valgt
					</p>
				</div>
				<div class="user-select-wrapper">
					<div class="user-column">
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="user-column">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<?php

				?>
			</div>

			<div class="quote-users">
				<div class="text-vh-align">
					<p>
						Brugerne siger
					</p>
				</div>
				<div class="user-quote">
					<blockquote>Artea lyser mit hjem op.
						<footer>- Lotte Heise, Dansk TV idiot</footer>
					</blockquote>
					<blockquote>Vi lever af børnearbejde.
						<footer>- David Wolff, Medejer Artea A/S</footer>
					</blockquote>
				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
