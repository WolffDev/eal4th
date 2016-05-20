<?php
/**
 * Template Name: Forside
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'post', true); ?>

		<div class="top-image-wrap">
			<div class="top-image" style="background-image: url(<?php echo $image_url[0];?>);">
				<div class="top-inside-wrap hide-on-med-and-down">
					<div style="background-image: url(<?php echo get_template_directory_uri() . '/img/header-overlay.png';?>);height:550px;background-size:cover;">
					</div>
				</div>
			</div>
			<div class="phrase-wrap hide-on-med-and-down">
				<div class="phrase-container">
					<h1 class="top-phrase">Ét splitsekund er alt<br>du behøver</h1>
					<h2 class="sub-phrase">Direkte overførelse af kunstværker,<br>nemt, bekvæmt & hurtig</h2>
					<div class="btn-wrap">
						<div class="left"></div>
						<div class="right"></div>
						<a href="#">Se værkerne<span><i class="material-icons">arrow_forward</i></span></a>
					</div>
				</div>
			</div>
		</div>


		<main id="frontpage" class="frontpage-wrapper" role="main">

			<div class="steps-wrap hide-on-med-and-down">
				<div class="step">
					<img src="<?php echo get_template_directory_uri() . '/img/step1.jpg';?>" alt="step 1 in process">
					<h2>Find dit mortiv</h2>
					<p>Find det motiv du ønsker, de er alle af danske kunstnere som er i fuld gang med, at opbygge deres entré på det danske marked.</p>
				</div>
				<div class="step">
					<img src="<?php echo get_template_directory_uri() . '/img/step2.jpg';?>" alt="step 2 in process">
					<h2>Du modtager filen</h2>
					<p>Du modtager billedfilen ved betaling, som du har muligheden for at benøtte som du vil.<br>Til det produkt du ønsker.</p>
				</div>
				<div class="step">
					<img src="<?php echo get_template_directory_uri() . '/img/step3.jpg';?>" alt="step 3 in process">
					<h2>Du bestemmer</h2>
					<p>Dit billede kan bruges til mange forskellige ting - plakater, folie, krus mv.<br>Enten igennem vores samarbejdspartnerer eller selv.</p>
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

			<div class="short-desc">
				<h1>Digital kunst - klar til print</h1>
				<p>Artea har gjort noget revolutionerende, vi har gjort kunstværker digitale. Hvorfor gør vi det, og hvad kan du bruge det til?</p>
				<p>Vi mener kunst bør være tilgængeligt for alle, og bør kunne benyttes i den kreative sammenhæng man har lyst til, ved at digitalisere kunsten får du friheden til, at bruge den til lige præcis dit kreative projekt.</p>
				<p>En flot plakat, en folieklædt væg, en t-shirt eller noget helt andet.</p>
				<h2>Nu bestemmer du</h2>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
