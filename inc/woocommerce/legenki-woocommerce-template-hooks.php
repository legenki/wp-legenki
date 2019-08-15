<?php
/**
 * Legenki WooCommerce hooks
 *
 * @package legenki
 */

/**
 * Header
 *
 * @see  legenki_product_search()
 * @see  legenki_header_cart()
 */
// add_action( 'legenki_header', 'legenki_product_search', 25 );
/**
 * WooCommerce Layout
 *
 * @see  legenki_before_content()
 * @see  legenki_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  legenki_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'legenki_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'legenki_after_content', 10 );
add_action( 'legenki_content_top', 'legenki_shop_messages', 15 );

/* -- Breadcrumbs Display -- */
$legenki_woocommerce_display_breadcrumbs = '';
$legenki_woocommerce_display_breadcrumbs = legenki_get_option( 'legenki_woocommerce_display_breadcrumbs' );
if ( true === $legenki_woocommerce_display_breadcrumbs ) {
	add_action( 'woocommerce_before_shop_loop', 'woocommerce_breadcrumb', 12 );
	add_action( 'woocommerce_before_single_product', 'woocommerce_breadcrumb', 10 );
}


/**
 * Product Archives
 */
add_action( 'woocommerce_before_shop_loop', 'legenki_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'legenki_sorting_wrapper_close', 31 );
add_action( 'woocommerce_before_shop_loop', 'legenki_product_columns_wrapper', 40 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_after_shop_loop', 'legenki_product_columns_wrapper_close', 40 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );


/**
 * Single Product Page
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/* -- Related Display -- */
$legenki_woocommerce_related_display = '';
$legenki_woocommerce_related_display = legenki_get_option( 'legenki_woocommerce_related_display' );

if ( true === $legenki_woocommerce_related_display ) {
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}

/* -- Meta Display -- */
$legenki_woocommerce_meta_display = '';
$legenki_woocommerce_meta_display = legenki_get_option( 'legenki_woocommerce_meta_display' );

if ( true === $legenki_woocommerce_meta_display ) {
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_meta', 15 );
}

/* -- Reorder Rating Position -- */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 2 );

$legenki_woocommerce_display_rating = '';
$legenki_woocommerce_display_rating = legenki_get_option( 'legenki_woocommerce_display_rating' );
if ( true === $legenki_woocommerce_display_rating ) {

	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 2 );
}

add_action( 'woocommerce_after_single_product', 'legenki_sticky_single_add_to_cart', 30 );

/* -- YITH Wishlist Display if plugin is active -- */
add_action( 'woocommerce_after_add_to_cart_button', 'legenki_display_single_product_wishlist', 5 );

/**
 * YITH Wishlist Display function on a single product page.
 */
function legenki_display_single_product_wishlist() {
	if ( class_exists( 'YITH_WCWL_Shortcode' ) ) {
		echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
	}
}


/**
 * Cart fragment
 *
 * @see legenki_cart_link_fragment()
 */
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'legenki_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'legenki_cart_link_fragment' );
}
