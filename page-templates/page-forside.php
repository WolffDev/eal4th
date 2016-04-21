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
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod pariatur perferendis aut commodi laborum fugit adipisci esse nisi, totam vel. Odit rerum libero minus, optio!</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint perspiciatis accusantium cumque consequatur nulla quaerat blanditiis eos tempore voluptas ea repudiandae eum fuga, ipsam aliquid quam soluta fugiat.</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi dolor quia atque, autem, minus adipisci facilis, corporis quod molestias rerum ipsam nihil possimus doloremque. Veniam, facilis, quas! Vel amet, necessitatibus.</div>
					</div>
					<div class="user-column">
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quos ratione id facere quod laudantium soluta quam deserunt eaque quia, vitae sapiente, voluptas nesciunt repudiandae.</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis natus veniam et magnam, facilis necessitatibus explicabo, libero minima exercitationem consectetur? Consectetur id aperiam soluta, hic quod aliquam ipsum?</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus aperiam voluptas quis voluptatum blanditiis explicabo commodi sapiente odit accusantium distinctio! Eos tenetur praesentium, itaque odit explicabo excepturi pariatur ipsum. In, omnis, tempore quod, illo ipsum voluptatem pariatur delectus hic, amet necessitatibus molestias!</div>
					</div>
				</div>
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
