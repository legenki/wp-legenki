<?php
/**
 *
 * Kirki defaults
 *
 * @package Legenki
 * @subpackage legenki
 */

if ( ! function_exists( 'legenki_get_option_defaults' ) ) {

	/**
	 *
	 * Sensible defaults ftw.
	 */
	function legenki_get_option_defaults() {
		$defaults = array(

			// Top Bar.
			'legenki_layout_top_bar_display'          => 'enable',
			'legenki_layout_top_bar_background'       => '#f6f6f6',
			'legenki_layout_top_bar_text'             => '#666',
			'legenki_layout_top_bar_text_hover'       => '#000',

			// Header.
			'legenki_header_style'                    => 'default',
			'legenki_header_bg_color'                 => '#fff',
			'legenki_header_color'                    => '#111',
			'legenki_navigation_animated_hover'       => '#2255FF',

			// Below Header.
			'legenki_layout_below_header_display'     => 'enable',
			'legenki_below_header_bg'                 => '#2255FF',
			'legenki_below_header_text_color'         => '#fff',

			// Sticky Header.
			'legenki_sticky_header'                   => 'enable',

			// Navigation.
			'legenki_navigation_position'             => 'center-navigation',

			// Site Tools.
			'legenki_account_display'                 => 'enable',
			'legenki_account_url'                     => '#',
			'legenki_search_display'                  => 'enable',
			'legenki_search_suggestions_display'      => 'enable',
			'legenki_wishlist_display'                => 'enable',
			'legenki_cart_display'                    => 'enable',
			'legenki_mini_cart_text'                  => 'Get free shipping and free returns',

			// Blog.
			'legenki_layout_blog'                     => 'grid mixed',
			'legenki_layout_blog_categories_display'  => true,
			'legenki_layout_blog_summary_display'     => true,
			'legenki_layout_singlepost'               => 'singlepost-layout-two',
			'legenki_layout_blog_tags_display'        => true,
			'legenki_layout_blog_socials_display'     => true,

			// Sidebars.
			'legenki_layout_woocommerce_sidebar'      => 'offscreen-woocommerce-sidebar',

			// WooCommerce.
			'legenki_woocommerce_related_display'     => true,
			'legenki_woocommerce_categories_display'  => true,
			'legenki_layout_woocommerce_flip_image'   => true,
			'legenki_woocommerce_meta_display'        => true,
			'legenki_woocommerce_display_breadcrumbs' => true,
			'legenki_woocommerce_display_rating'      => true,
			'legenki_woocommerce_prev_next_display'   => true,
			'legenki_woocommerce_sticky_cart_display' => true,
			'legenki_layout_progress_bar_display'     => true,

			'legenki_progress_one_title'              => 'Shopping Cart',
			'legenki_progress_one_desc'               => 'View your items',

			'legenki_progress_two_title'              => 'Shipping and Checkout',
			'legenki_progress_two_desc'               => 'Enter your details',

			'legenki_progress_three_title'            => 'Confirmation',
			'legenki_progress_three_desc'             => 'Review your completed order',

			// Colors.
			'legenki_color_general_swatch'            => '#2255FF',

			'legenki_color_general_links'             => '#2255FF',
			'legenki_color_general_links_hover'       => '#111',

			'legenki_navigation_dropdown_hover'       => '#2255FF',

			'legenki_ratings_color'                   => '#ee9e13',

			'legenki_woocommerce_button_text'         => '#fff',

			'legenki_woocommerce_button_bg'           => '#2255FF',
			'legenki_woocommerce_button_hover_bg'     => '#1992da',

			'legenki_sale_flash_bg'                   => '#3bb54a',
			'legenki_sale_flash_text'                 => '#fff',

			'legenki_archives_description_text'       => '#fff',

			'legenki_blog_image_effect'               => '#eee',

			// Footer.
			'legenki_below_content_display'           => 'show',
			'legenki_below_content_image'             => '',
			'legenki_below_content_title'             => 'Free Shipping. Free Returns.',
			'legenki_below_content_text'              => 'Less stress, more sweat.',
			'legenki_footer_display'                  => 'show',
			'legenki_copyright_display'               => 'show',
			'legenki_backtotop_display'               => 'show',

			'legenki_footer_bg'                       => '#FFF',
			'legenki_footer_heading_color'            => '#111',
			'legenki_footer_color'                    => '#222',
			'legenki_footer_links_color'              => '#2255FF',
			'legenki_footer_links_hover_color'        => '#111',

			// Speed Settings.
			'legenki_general_speed_minify_main_css'   => 'no',
			'legenki_webfonts_load_method'            => 'link',
		);

		return apply_filters( 'legenki_get_option_defaults', $defaults );
	}
}// End if().
