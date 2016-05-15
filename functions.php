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
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function eal4th_primary_navigation() {
		?>
		<div class="hide-on-med-and-down">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="nav-wrapper">
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

/**********************************************
 ******* wooCommerce Single Product ******
 *********************************************/
remove_action( "woocommerce_before_single_product_summary", "woocommerce_show_product_sale_flash", 10 );
remove_action("woocommerce_single_product_summary", "woocommerce_template_single_title", 5 );
remove_action("woocommerce_single_product_summary", "woocommerce_template_single_meta", 40 );
add_filter( "woocommerce_before_single_product_summary", "woocommerce_template_single_title", 5 );

function woocommerce_template_product_description() {
   wc_get_template( 'single-product/tabs/description.php' );
 }
add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_product_description', 35 );

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





if ( ! function_exists( 'eal4th_mobile_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
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
				<span class="amount hide-on-med-and-down"><i class="material-icons">shopping_cart</i><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>  <span class="count hide-on-med-and-down"> <?php echo wp_kses_data( sprintf( _n( '%d stk', '%d stk\'s', WC()->cart->get_cart_contents_count(), 'eal4th' ), WC()->cart->get_cart_contents_count() ) );?></span>
				<span class="count hide-on-large-only"><?php echo wp_kses_data( sprintf( _n( '(%d)', '(%d)', WC()->cart->get_cart_contents_count(), 'eal4th' ), WC()->cart->get_cart_contents_count() ) );?><i class="material-icons cart-icon">shopping_cart</i></span>

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

add_action( 'eal4th_header', 'eal4th_primary_navigation',		50 );
add_action( 'eal4th_mobile', 'eal4th_mobile_navigation',		50 );
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
