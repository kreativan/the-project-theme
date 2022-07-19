<?php

/**
 *  Custom Image Sizes
 *  
 */
add_image_size('logo', 180, 42, false);
add_image_size('hero', 1920, null, false);
add_image_size('container', 1200, null, false);
add_image_size('x640', 640, null, false);
add_image_size('x380', 380, null, false);
add_image_size('thumb', 100, 100, true);

add_image_size('movie_card', 270, 400, true);

// Sidebars - Widget Positions
function widget_positions() {

  register_sidebar([
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'before_widget' => '<div class="uk-panel uk-margin">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ]);

}
add_action('widgets_init', 'widget_positions');


//
//  Menus
//

register_nav_menus([
  'navbar' => 'Navbar Location',
  'mobile-menu' => 'Mobile Menu Location',
  "footer-menu" => "Footer Menu Location",
  "shop-menu" => "Shop Menu"
]);


// Navbar dropdown html/css update
class Walker_Navbar extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "<div class='uk-navbar-dropdown'>";
    $output .= "\n$indent<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";
  }
}

// Navbar dropdown html/css update
class Walker_MobileMenu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"uk-nav-sub\">\n";
  }
}


//
//  Shortcodes
//

function hello_shortcode() {
  return "Hello World";
}
add_shortcode('hello', 'hello_shortcode');

function katalog_feed($atts, $content = null, $tag = '') {
  ob_start();
  set_query_var("attributes", $atts);
  get_template_part('katalog/katalog-feed');
  return ob_get_clean();
}
add_shortcode('katalog', 'katalog_feed');


/* =========================================================== 
  WooCommerce
=========================================================== */


/**
 *  Pagination
 * 
 */
add_filter( 'woocommerce_pagination_args', 	'woo_pagination' );

function woo_pagination( $args ) {
	$args['prev_text'] = '<i class="uk-icon" uk-icon="arrow-left"></i>';
	$args['next_text'] = '<i class="uk-icon" uk-icon="arrow-right"></i>';
	return $args;
}


/**
 *  Loop: Title
 * 
 */
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'woo_shop_loop_item_title', 10, 1);

function woo_shop_loop_item_title() {
  echo "<h2 class='uk-h4 uk-margin-small'>".get_the_title()."</h2>";
}

/**
 * Loop: Sale flash
 * 
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_before_shop_loop_item_title', 'woo_loop_sales_flash', 10, 1);

function woo_loop_sales_flash() {
  global $post, $product;
  if($product->is_on_sale()) {
    $sale_text = esc_html__( 'Sale!', 'woocommerce' );
    echo "<span class='uk-label uk-label-danger uk-position-top-right uk-position-small uk-position-z-index'>$sale_text</span>";
  }
}

/**
 * Single Product: Sale flash
 * 
 */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
add_action('woocommerce_before_single_product_summary', 'woo_loop_sales_flash', 10, 1);

/**
 * Single Product: Summary
 * 
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
