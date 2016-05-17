<?php
/**
 * Template Name: Forside
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'post', true); ?>

		<div class="top-image" style="background-image: url(<?php echo $image_url[0];?>);">
			<div class="top-inside-wrap hide-on-med-and-down">
				<h1 class="top-phrase">Ét splitsekund er alt<br>du behøver</h1>
				<h2 class="sup-phrase">Direkte overførelse af kunstværker,<br>nemt, bekvæmt & hurtig</h2>
				<a href="#"class="special-button">Se værkerne</a>
			</div>
		</div>

		<main id="frontpage" class="frontpage-wrapper" role="main">

			<div class="steps-wrap hide-on-med-and-down">
				<div class="step">
					<img src="http://lorempixel.com/180/180/nature/1" alt=""></img>
					<h2>Find dit mortiv</h2>
					<p>Find det motiv du ønsker, de er alle af danske kunstnere som er i fuld gang med, at opbygge deres entré på det danske marked.</p>
				</div>
				<div class="step">
					<img src="http://lorempixel.com/180/180/nature/2" alt=""></img>
					<h2>Du modtager filen</h2>
					<p>Du modtager billedfilen ved betaling, som du har muligheden for at benøtte som du vil.<br>Til det produkt du ønsker.</p>
				</div>
				<div class="step">
					<img src="http://lorempixel.com/180/180/nature/3" alt=""></img>
					<h2>Du bestemmer</h2>
					<p>Dit billede kan bruges til mange forskellige ting - plakater, folie, krus mv.<br>Enten igennem vores samarbejdspartnerer eller selv.</p>
				</div>
			</div>

			<div class="abn-ref-link">
				<a href="#">
					<div class="text-vh-align">
						<p>Se abonnementsløsninger</p>
					</div>
				</a>
			</div>

			<div class="user-select">
				<div class="text-vh-align">
					<p>
						Følgerne har valgt
					</p>
				</div>
				<div class="user-select-wrapper">
					<div class="user-column">
						<?php
				        $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => 'user-votes', 'orderby' => 'asc' );
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
								<div>
                  <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                    <?php // woocommerce_show_product_sale_flash( $post, $product ); ?>

                    <?php echo get_the_post_thumbnail($loop->post->ID, 'custom-size-front'); ?>

                    <!-- <h3 class="hide"><?php the_title(); ?></h3>

                  	<span class="hide price"><?php // echo $product->get_price_html(); ?></span> -->

                  </a>

                  <?php // woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
								</div>

				    <?php endwhile; ?>
				    <?php wp_reset_query(); ?>
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
