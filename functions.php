<?php
/**
 * eal4th functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eal4th
 */

if ( ! function_exists( 'eal4th_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eal4th_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eal4th, use a find and replace
	 * to change 'eal4th' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'eal4th', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Add theme support for woocommerce
	 */
	add_theme_support( 'woocommerce' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'eal4th' ),
		'mobile' => esc_html__( 'Mobil', 'eal4th' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// add_theme_support( 'html5', array(
	// 	'search-form',
	// 	'comment-form',
	// 	'comment-list',
	// 	'gallery',
	// 	'caption',
	// ) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	add_image_size( 'custom-size-front', 450, 350);

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'eal4th_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );
}
endif;
add_action( 'after_setup_theme', 'eal4th_setup' );

@ini_set( 'upload_max_size' , '20M' );
@ini_set( 'post_max_size', '20M' );
@ini_set( 'max_execution_time', '300' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eal4th_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eal4th_content_width', 640 );
}
add_action( 'after_setup_theme', 'eal4th_content_width', 0 );

/**********************************************
 ******* wooCommerce header cart ******
 *********************************************/

if ( ! function_exists( 'eal4th_primary_navigation' ) ) {
	function eal4th_primary_navigation() {
		?>
		<div class="hide-on-med-and-down">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="nav-wrapper">
					<div class="header-mobile-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo get_template_directory_uri() . '/img/logo-test.svg';?>" alt="header mobile logo">
						</a>
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'primary',
							'container_class'	=> 'primary-navigation',
							)
					);
					if ( is_cart() ) {
						$class = 'current-menu-item';
					} else {
						$class = '';
					}
				?>
				<ul class="site-header-cart menu">
					<li class="cart-short-list">
						<?php eal4th_cart_link(); ?>
						<ul class="cart-long-list">
							<li>
								<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
							</li>
						</ul>
					</li>
				</ul>

				</div>
			</nav><!-- #site-navigation -->
		</div>
		<?php
	}
}


if ( ! function_exists( 'eal4th_mobile_navigation' ) ) {
	function eal4th_mobile_navigation() {
		?>
		<div class="hide-on-large-only">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="nav-wrapper-mobile">
					<div class="header-mobile-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo get_template_directory_uri() . '/img/logo-test.svg';?>" alt="header mobile logo">
						</a>
					</div>
					<ul class="site-header-cart menu">
						<li class="cart-short-list">
							<?php eal4th_cart_link(); ?>
							<ul class="cart-long-list">
								<li>
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
								</li>
							</ul>
						</li>
					</ul>
					<a href="#" id="menu-icon" data-activates="slide-out" class="button-collapse"><img src="<?php echo get_template_directory_uri() . '/img/menu-logo.svg';?>" alt="header mobile logo"></a>
					<div id="slide-out" class="side-nav">
						<a href="#"><i class="material-icons mobile-close">close</i></a>
						<?php
						wp_nav_menu(
							array(
								'theme_location'	=> 'mobile',
								'container_class'	=> 'mobile-navigation',
								)
						);
						if ( is_cart() ) {
							$class = 'current-menu-item';
						} else {
							$class = '';
						}
						?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
		<?php
	}
}


if ( ! function_exists( 'eal4th_cart_link' ) ) {
	function eal4th_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'Vis din indkøbskurv', 'eal4th' ); ?>">

				<span class="count "><?php echo wp_kses_data( sprintf( _n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count(), 'eal4th' ), WC()->cart->get_cart_contents_count() ) );?><i class="material-icons cart-icon">shopping_cart</i></span>

			</a>
		<?php
	}
}

if ( ! function_exists( 'eal4th_cart_link_fragment' ) ) {
	function eal4th_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		eal4th_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/**********************************************
 ******* wooCommerce Exclude Product Kategory ******
 *********************************************/

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

function custom_pre_get_posts_query( $q ) {

	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;

	if ( ! is_admin() && is_shop() ) {

		$q->set( 'tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => array( 'abonnementer' ), // Don't display products in the knives category on the shop page
			'operator' => 'NOT IN'
		)));

	}

	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );

}

// set number of products shown on shop page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );
/**********************************************
 ******* wooCommerce add Abonnementer to shop page button ******
 *********************************************/

add_filter( 'woocommerce_after_shop_loop', 'add_abn_after_shop', 15 );
function add_abn_after_shop() {
	?>
	<div class="abn-products-wrap">
		<div class="header-wrap">
			<h1>Abonnementer</h1>
		</div>
		<div class="abn-products">

			<?php
					$args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'product_cat' => 'abonnementer', 'orderby' => 'desc' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>


						<div class="abn-product">

								<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">

										<?php woocommerce_show_product_sale_flash( $post, $product ); ?>

										<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>

										<h3><?php the_title(); ?></h3>
										<?php the_excerpt() ?>

								</a>

								<?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

						</div>

			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
		<div class="abn-more-link">
			<a href="/abonnementer">Læs mere om vores abonnements muligheder</a>
		</div>
</div><!--/.products-->

	<?php
}


/**********************************************
 ******* wooCommerce Checkout ******
 *********************************************/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

function wc_remove_related_products( $args ) {
	return array();
}
add_filter( 'woocommerce_related_products_args','wc_remove_related_products', 10 );


/**********************************************
 ******* wooCommerce Shop Page ******
 *********************************************/
remove_action("woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30);


/**********************************************
 ******* wooCommerce Single Product ******
 *********************************************/
remove_action( "woocommerce_before_single_product_summary", "woocommerce_show_product_sale_flash", 10 );
remove_action("woocommerce_single_product_summary", "woocommerce_template_single_title", 5 );
remove_action("woocommerce_single_product_summary", "woocommerce_template_single_meta", 40 );
add_filter( "woocommerce_before_single_product", "woocommerce_template_single_title", 5 );



function woocommerce_template_product_description() {
   wc_get_template( 'single-product/tabs/description.php' );
 }
add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 5 );

function woocommerce_template_product_information() {
   wc_get_template( 'single-product/tabs/additional-information.php' );
 }
add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_product_information', 5 );

function wc_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


add_action('woocommerce_single_product_summary', 'hooks_open_div', 9);
function hooks_open_div() {
    echo '<div class="single-price">Pris:';
}
add_action('woocommerce_single_product_summary', 'hooks_close_div', 11);
function hooks_close_div() {
    echo '</div>';
}


/**
* WooCommerce: show all product attributes listed below each item on Cart page
*/
function isa_woo_cart_attributes($cart_item, $cart_item_key){

    $item_data = $cart_item_key['data'];
    $attributes = $item_data->get_attributes();


    if ( ! $attributes ) {
        return $cart_item;
    }

    $out = $cart_item . '<br />';

    foreach ( $attributes as $attribute ) {

        if ( $attribute['is_taxonomy'] ) {

        // skip variations
            if ( $attribute['is_variation'] ) {
                continue;
            }

            // backwards compatibility for attributes which are registered as taxonomies

            $product_id = $item_data->id;
            $terms = wp_get_post_terms( $product_id, $attribute['name'], 'all' );

            // get the taxonomy
            $tax = $terms[0]->taxonomy;

            // get the tax object
            $tax_object = get_taxonomy($tax);

            // get tax label
            if ( isset ($tax_object->labels->name) ) {
                $tax_label = $tax_object->labels->name;
            } elseif ( isset( $tax_object->label ) ) {
                $tax_label = $tax_object->label;
            }

            foreach ( $terms as $term ) {
                //$out .= $tax_label . ': ';
                $out .= '<div class="product-attri">' . $term->name . '</div>';
            }

        } else {

            // not a taxonomy

            //$out .= $attribute['name'] . ': ';
            $out .= $attribute['value'] . '<br />';
        }
    }
    echo $out;
}

add_filter( 'woocommerce_cart_item_price', 'isa_woo_cart_attributes', 10, 20 );



add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
	$fields['account']['account_password']['placeholder'] = '';
	$fields['billing']['billing_address_1']['placeholder'] = '';
	$fields['billing']['billing_postcode']['label'] = 'Postnummer';
	unset($fields['order']['order_comments']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_country']);
	return $fields;
}












/* Currency */
add_filter('woocommerce_currency_symbol', 'add_custom_danish_currency_symbol', 10, 2);
function add_custom_danish_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'DKK': $currency_symbol = 'kr.'; break;
     }
     return $currency_symbol;
}

// if ( ! function_exists( 'eal4th_header_cart' ) ) {
// 	function eal4th_header_cart() {
//
//
// 	}
// }

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'eal4th_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'eal4th_cart_link_fragment' );
}

add_action( 'eal4th_header', 'eal4th_primary_navigation',		10 );
add_action( 'eal4th_mobile', 'eal4th_mobile_navigation',		10 );
// add_action( 'eal4th_header', 'eal4th_header_cart', 		50 );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function eal4th_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'eal4th' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'eal4th' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'eal4th_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eal4th_scripts() {
	// wp_enqueue_style( 'eal4th-materialize-style' , get_template_directory_uri() . '/sass/materialize.css' );
	wp_enqueue_style('woocommerce_css', plugins_url() .'/woocommerce/assets/css/woocommerce.css');
	wp_enqueue_style( 'eal4th-style', get_stylesheet_uri() );


	// wp_enqueue_script( 'eal4th-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'eal4th-script', get_template_directory_uri() . '/js/script.js', array(), '20151215', true );

	wp_enqueue_script( 'matrialize-script', get_template_directory_uri() . '/js/materialize.min.js', array(), '20151215', true );

	wp_enqueue_script( 'eal4th-matrialize-init', get_template_directory_uri() . '/js/materialize-init.js', array(), '20151215', true );

	wp_enqueue_script( 'googleAnalytics', get_template_directory_uri() . '/js/googleAnalytics.js', array(), '20151215', true );

	// wp_enqueue_script( 'eal4th-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'eal4th_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';
