<?php
/**
 * Template Name: Forside
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'post', true); ?>

		<div class="top-image" style="background-image: url(<?php echo $image_url[0];?>);"></div>

		<main id="frontpage" class="frontpage-wrapper" role="main">

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
