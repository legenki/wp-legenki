<?php
/**
 * The sidebar containing the main WooCommerce widget area.
 *
 * @package legenki
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$legenki_layout_woocommerce_sidebar = '';
$legenki_layout_woocommerce_sidebar = legenki_get_option( 'legenki_layout_woocommerce_sidebar' );
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
