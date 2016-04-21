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
						<?php
				        $args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'product_cat' => 'user-votes', 'orderby' => 'asc' );
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
								<div>
                  <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

                    <!-- <?php woocommerce_show_product_sale_flash( $post, $product ); ?> -->

                    <?php echo get_the_post_thumbnail($loop->post->ID, 'custom-size'); ?>

                    <h3 class="hide"><?php the_title(); ?></h3>

                  	<span class="hide price"><?php echo $product->get_price_html(); ?></span>

                  </a>

                  <!-- <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?> -->
								</div>

				    <?php endwhile; ?>
				    <?php wp_reset_query(); ?>
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
