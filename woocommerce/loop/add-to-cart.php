<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$product_type = $product->get_type();
$product_id = $product->get_id();

$class = "uk-button uk-button-text";
$attr = "";

if($product->is_type('simple')) $class = "uk-button uk-button-primary";
if($product->is_type('grouped')) $class = "uk-button uk-button-default";

$spinner = "<i class='uk-hidden' uk-spinner='ratio: 0.7'></i>";

if($product_type == 'simple') {
  $attr = "onclick='woo.addToCart({$product->get_id()})'";
}

if($product_type != 'simple') {
echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		"<a href='%s' data-quantity='%s' class='$class %s' %s $attr >$spinner<span>%s</span></a>",
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
	),
	$product,
	$args
);
}
?>

<?php if($product_type == 'simple') :?>
<div>
  <button type="button" class="add-to-cart-button uk-button uk-button-primary"
    data-product_id='<?= $product_id ?>'
    onclick="woo.addToCart(<?= $product_id ?>)"
  >
    <i class="uk-hidden" uk-spinner="ratio: 0.7"></i>
    <span> <?= $product->add_to_cart_text() ?></span>
  </button>
</div>
<?php endif;?>