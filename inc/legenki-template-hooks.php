<?php
/**
 * Legenki hooks
 *
 * @package legenki
 */

/**
 * General
 *
 * @see  legenki_get_sidebar()
 */
add_action( 'legenki_sidebar', 'legenki_get_sidebar', 10 );

/**
 * Topbar
 *
 * @see  legenki_skip_links()
 * @see  legenki_top_bar()
 */
add_action( 'legenki_topbar', 'legenki_skip_links', 0 );
add_action( 'legenki_topbar', 'legenki_top_bar', 10 );

/**
 * Header
 *
 * @see  legenki_skip_links()
 * @see  legenki_site_branding()
 * @see  legenki_primary_navigation()
 */
add_action( 'legenki_header', 'legenki_site_branding', 20 );
add_action( 'legenki_before_content', 'legenki_below_header_widgets', 30 );

/**
 * Navigation
 *
 * @see  legenki_primary_navigation_wrapper()
 * @see  legenki_primary_navigation()
 * @see  legenki_primary_navigation_wrapper_close()
 */
add_action( 'legenki_navigation', 'legenki_primary_navigation_wrapper', 42 );
add_action( 'legenki_navigation', 'legenki_primary_navigation', 50 );
add_action( 'legenki_navigation', 'legenki_primary_navigation_widget', 60 ); /* Appears on Mobile. */
add_action( 'legenki_navigation', 'legenki_primary_navigation_wrapper_close', 68 );

/**
 * Navigation Tools
 *
 * @see  legenki_tools_wishlist_item()
 * @see  legenki_tools_account_item()
 * @see  legenki_tools_cart_item()
 * @see  legenki_tools_search_item()
 */
add_action( 'legenki_tools', 'legenki_tools_wishlist_item', 10 );
add_action( 'legenki_tools', 'legenki_tools_account_item', 20 );
add_action( 'legenki_tools', 'legenki_tools_cart_item', 30 );
add_action( 'legenki_tools', 'legenki_tools_search_item', 40 );

/**
 * Footer
 *
 * @see  legenki_footer_widgets()
 * @see  legenki_footer_copyright()
 */
add_action( 'legenki_before_footer', 'legenki_below_content', 10 );
add_action( 'legenki_footer', 'legenki_footer_widgets', 20 );
add_action( 'legenki_footer', 'legenki_footer_copyright', 30 );
add_action( 'legenki_footer', 'legenki_footer_backtotop', 40 );

if ( legenki_is_woocommerce_activated() ) {
	add_action( 'legenki_footer', 'legenki_product_search', 35 );
}

add_action( 'legenki_after_footer', 'legenki_animate_library', 10 );

/**
 * Posts
 *
 * @see  legenki_post_header()
 * @see  legenki_post_meta()
 * @see  legenki_post_content()
 * @see  legenki_paging_nav()
 * @see  legenki_single_post_header()
 * @see  legenki_post_nav()
 * @see  legenki_display_comments()
 */
add_action( 'legenki_loop_post', 'legenki_post_thumbnail', 5 );
add_action( 'legenki_loop_post', 'legenki_post_header', 10 );
remove_action( 'legenki_loop_post', 'legenki_post_content', 30 );

$legenki_layout_blog_summary_display = '';
$legenki_layout_blog_summary_display = legenki_get_option( 'legenki_layout_blog_summary_display' );

if ( true === $legenki_layout_blog_summary_display ) {
	add_action( 'legenki_loop_post', 'legenki_post_content', 30 );
}

add_action( 'legenki_loop_after', 'legenki_paging_nav', 10 );
add_action( 'legenki_single_post', 'legenki_post_header', 5 );
add_action( 'legenki_single_post', 'legenki_post_thumbnail_no_link', 20 );
add_action( 'legenki_single_post', 'legenki_post_meta', 20 );
add_action( 'legenki_single_post', 'legenki_post_content', 30 );
add_action( 'legenki_single_post', 'legenki_post_footer', 40 );
add_action( 'legenki_single_post_bottom', 'legenki_display_comments', 20 );

/**
 * Portfolio
 *
 * @see  legenki_portfolio_header()
 * @see  legenki_portfolio_single_content()
 * @see  legenki_prev_next()
 */
add_action( 'legenki_portfolio_start', 'legenki_page_header', 15 );
add_action( 'legenki_single_portfolio', 'legenki_portfolio_header', 5 );
add_action( 'legenki_single_portfolio', 'legenki_portfolio_single_content', 30 );
add_action( 'legenki_single_portfolio', 'legenki_prev_next', 40 );

/**
 * Pages
 *
 * @see  legenki_page_header()
 * @see  legenki_page_content()
 * @see  legenki_display_comments()
 */
if ( legenki_is_woocommerce_activated() ) {
	add_action( 'legenki_page_breadcrumbs', 'woocommerce_breadcrumb', 8 );
}

add_action( 'legenki_page', 'legenki_page_header', 15 );
add_action( 'legenki_page', 'legenki_page_content', 20 );
add_action( 'legenki_page_after', 'legenki_display_comments', 10 );
add_action( 'legenki_homepage', 'legenki_page_content', 20 );

/**
 * Sidebar
 */
add_action( 'legenki_page_sidebar', 'legenki_page_sidebar_display', 10 );
