<?php
/**
 * WooCommerce Template Functions.
 *
 * @package legenki
 */

/**
 * Product Archives
 */

/* -- Adds a body class to just the shop landing page. -- */

if ( class_exists( 'WooCommerce' ) ) {
	/**
	 * Shop body classes.
	 *
	 * @param string $classes The body class added.
	 */
	function legenki_shop_body_class( $classes ) {
		if ( is_shop() ) {
			$classes[] = 'legenki-shop-landing';
		}
		return $classes;
	}

	add_filter( 'body_class', 'legenki_shop_body_class' );
}

/* -- Open and close product loop wrapper. -- */

add_action( 'woocommerce_before_shop_loop', 'legenki_main_loop_open', 35 );
add_action( 'woocommerce_after_shop_loop', 'legenki_main_loop_close', 50 );

/**
 * Open loop.
 */
function legenki_main_loop_open() {
	echo '<div class="product-wrapper">';
}

/**
 * Close loop.
 */
function legenki_main_loop_close() {
	echo '</div>';
}


/**
 * Single Product Page.
*/
if ( class_exists( 'WooCommerce' ) ) {
	add_action( 'get_header', 'legenki_remove_product_sidebar' );

	/**
	 * Remove Sidebar.
	 */
	function legenki_remove_product_sidebar() {
		if ( is_product() ) {
			remove_action( 'legenki_sidebar', 'legenki_get_sidebar', 10 );
		}
		if ( is_cart() || is_checkout() || is_product() || is_shop() || is_account_page() ) {
			remove_action( 'legenki_page_sidebar', 'legenki_page_sidebar_display', 10 );
		}
	}
}

/* -- Add section wrapper. -- */

add_action( 'woocommerce_before_single_product_summary', 'legenki_product_content_wrapper_start', 5 );
add_action( 'woocommerce_single_product_summary', 'legenki_product_content_wrapper_end', 60 );

/**
 * Start section.
 */
function legenki_product_content_wrapper_start() {
	echo '<section class="product-details-wrapper">';
}

/**
 * End section.
 */
function legenki_product_content_wrapper_end() {
	echo '</section>';
}


/**
 * Display custom content below buy button.
 */
function legenki_product_custom_content() {
	if ( is_active_sidebar( 'single-product-field' ) ) :
		echo '<div class="product-widget widget-area">';
		dynamic_sidebar( 'single-product-field' );
		echo '</div>';
	endif;
}
add_action( 'woocommerce_single_product_summary', 'legenki_product_custom_content', 30 );


/* --  Related products section wrapper start -- */

add_action( 'woocommerce_after_single_product_summary', 'legenki_related_content_wrapper_start', 10 );
add_action( 'woocommerce_after_single_product_summary', 'legenki_related_content_wrapper_end', 60 );


/**
 * Start wrapper.
 */
function legenki_related_content_wrapper_start() {
	echo '<section class="related-wrapper">';
}

/**
 * End wrapper.
 */
function legenki_related_content_wrapper_end() {
	echo '</section>';
}


/* -- Reposition upsells -- */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 25 );


/**
 * Show cart widget on all pages.
 */
add_filter( 'woocommerce_widget_cart_is_hidden', 'legenki_always_show_cart', 40, 0 );


/**
 * Function to always show cart.
 */
function legenki_always_show_cart() {
	return false;
}


add_action( 'wp_head', 'legenki_added_to_cart_message' );
/**
 * Added to cart message.
 */
function legenki_added_to_cart_message() {
	?>
	<script type="text/javascript">
		var legenkiAddedToCart = '<?php printf( /* translators: Adds item to the cart */ esc_html__( '%s has been added to your cart.', 'legenki' ), '' ); ?>';
	</script>
	<?php
}


/**
 * Product Archives - Gallery image
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'legenki_gallery_image', 10 );

/**
 * Product Archives - Gallery image
 */
function legenki_gallery_image() {

	global $product;
	$attachment_ids = $product->get_gallery_image_ids();

	$legenki_layout_woocommerce_flip_image = '';
	$legenki_layout_woocommerce_flip_image = legenki_get_option( 'legenki_layout_woocommerce_flip_image' );

	if ( true === $legenki_layout_woocommerce_flip_image ) {
		if ( isset( $attachment_ids[0] ) ) {
			echo legenki_safe_html( wp_get_attachment_image( ( $attachment_ids[0] ), 'large', '', array( 'class' => 'gallery-image' ) ) );
		}
	}
	?>
			
	<?php
}


/**
 * Product Archives - Display Categories
 */
add_action( 'woocommerce_before_shop_loop', 'legenki_woo_categories', 5 );

/**
 * Display Categories at the top.
 */
function legenki_woo_categories() {
	$legenki_woocommerce_categories_display = '';
	$legenki_woocommerce_categories_display = legenki_get_option( 'legenki_woocommerce_categories_display' );

	if ( true === $legenki_woocommerce_categories_display ) {
		if ( class_exists( 'WooCommerce' ) ) {
			echo '<div class="header-categories">';
			the_widget( 'WC_Widget_Product_Categories' );
			echo '</div>';
		}
	}
}


/**
 * Product Archives - Mobile filters
 */
add_action( 'woocommerce_before_shop_loop', 'legenki_mobile_filters', 10 );

/**
 * Mobile filters.
 */
function legenki_mobile_filters() {

	if ( is_active_sidebar( 'sidebar-1' ) ) {
			echo '<a href="#" class="mobile-filter"><div class="navicon-filters"></div>';
		?>
			<?php esc_html_e( 'Show Filters', 'legenki' ); ?>
			<?php
			echo '</a>';
	}
	?>
	<?php
}


/**
 * Cart Page - Custom widget below the primary button.
 */

add_action( 'woocommerce_after_cart_totals', 'legenki_cart_custom_field', 15 );
/**
 * Custom markup around cart field.
 */
function legenki_cart_custom_field() {

	if ( is_active_sidebar( 'cart-field' ) ) :
		echo '<div class="cart-custom-field widget-area">';
		dynamic_sidebar( 'cart-field' );
		echo '</div>';
	endif;

}

/**
 * Single Product Page - Display 4 upsells.
 *
 * @param number $args The number of upsell products.
 */
function legenki_woocommerce_upsell_display_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;
	return $args;
}


/**
 * Single Product Page - Reorder sale message.
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 3 );

add_filter( 'legenki_product_thumbnail_columns', 'legenki_gallery_columns' );


/**
 * Single Product Page - Change Related Number to 4.
 */
add_filter( 'woocommerce_output_related_products_args', 'legenki_related_products', 99, 3 );

/**
 * Display 4 Related Products.
 *
 * @param number $args The number of related products.
 */
function legenki_related_products( $args ) {

	$args = array(
		'posts_per_page' => 4,
		'columns'        => 4,
		'orderby'        => 'DESC',
	);
	return $args;
}


/**
 * Display WooCommerce banner image.
 */
function legenki_woocommerce_add_category_image_open() {
	global $product;
	if ( is_product_category() ) {
		global $wp_query;
		$cat          = $wp_query->get_queried_object();
		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image        = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			echo '<div class="category-with-image" style="background-image:url(' . $image . ');"></div>';
		}
	}
}
add_action( 'woocommerce_archive_description', 'legenki_woocommerce_add_category_image_open', 5 );


/**
 * Checkout Page - Custom widget below the primary button.
 */
function legenki_checkout_custom_field() {
	if ( is_active_sidebar( 'checkout-field' ) ) :
		echo '<div class="cart-custom-field widget-area">';
		dynamic_sidebar( 'checkout-field' );
		echo '</div>';
	endif;
}
add_action( 'woocommerce_review_order_after_submit', 'legenki_checkout_custom_field', 15 );


/**
 * Cross Sells (Cart) Rearrange
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
add_filter( 'woocommerce_cross_sells_columns', 'legenki_cross_sells_columns' );


/**
 * Set Cross Sell columns.
 *
 * @param number $columns The number of columns.
 */
function legenki_cross_sells_columns( $columns ) {
	return 4;
}

add_filter( 'woocommerce_cross_sells_total', 'legenki_cross_sells_number' );

/**
 * Set cross sell number.
 *
 * @param number $columns The number within the columns.
 */
function legenki_cross_sells_number( $columns ) {
	return 4;
}


/**
 * Single Product Tabs
 * Remove Description Title within content
 *
 * @since   1.0.0
 * @return  void
 */
add_filter( 'woocommerce_product_description_heading', 'legenki_remove_product_description_heading' );
/**
 * Remove description tab title.
 */
function legenki_remove_product_description_heading() {
	return '';
}

/**
 * After WooCommerce Shop Loop
 * Adds support for YITH Wishlist functionality
 *
 * @since   1.0.0
 * @return  void
 */
add_action( 'woocommerce_shop_loop_item_title', 'legenki_display_yith_wishlist_loop', 5 );

/**
 * YITH Wishlist within product loop.
 */
function legenki_display_yith_wishlist_loop() {
	if ( class_exists( 'YITH_WCWL_Shortcode' ) ) {
		echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
	}
}

if ( ! function_exists( 'legenki_before_content' ) ) {
	/**
	 * Before Content
	 * Wraps all WooCommerce content in wrappers which match the theme markup
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_before_content() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
		<?php
	}
}

if ( ! function_exists( 'legenki_after_content' ) ) {
	/**
	 * After Content
	 * Closes the wrapping divs
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_after_content() {
		?>
			<?php do_action( 'legenki_sidebar' ); ?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
	}
}


add_filter( 'get_product_search_form', 'legenki_product_search_form' );

/**
 * Custom Search Form
 *
 * @since  1.0.0
 */
function legenki_product_search_form( $legenki_search_form ) {

	$legenki_search_form = '<form role="search" method="get" class="woocommerce-product-search" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
		<div>
			<label class="screen-reader-text" for="s">' . __( 'Search for:', 'legenki' ) . '</label>
			<input type="search" value="' . get_search_query() . '" name="s" id="s" class="search-field" autocomplete="off" autocapitalize="off" spellcheck="false" />
			<button type="submit" value="' . esc_attr__( 'Search', 'legenki' ) . '">' . esc_attr__( 'Search', 'legenki' ) . '</button>
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';

	return $legenki_search_form;

}

if ( ! function_exists( 'legenki_product_search' ) ) {
	/**
	 * Display Product Search
	 *
	 * @since  1.0.0
	 * @uses  legenki_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	function legenki_product_search() {
		$legenki_search_display = '';
		$legenki_search_display = legenki_get_option( 'legenki_search_display' );

		$legenki_search_suggestions_display = '';
		$legenki_search_suggestions_display = legenki_get_option( 'legenki_search_suggestions_display' );

		if ( 'enable' === $legenki_search_display ) {

			$legenki_search_js  = '';
			$legenki_search_js .= "
			( function ( $ ) {
				'use strict';
		
		var mainContainer = document.querySelector( '#main' ),
		openCtrl = document.getElementById( 'btn-search' ),
		closeCtrl = document.getElementById( 'btn-search-close' ),
		searchContainer = document.querySelector( '.legenki-search' ),
		inputSearch = searchContainer.querySelector( '.legenki-search .search-field' );

		/**
		 * Initialize Events.
		 */
		function init() {
			initEvents();
		}

		/**
		 * Search controls.
		 */
		function initEvents() {
			openCtrl.addEventListener( 'click', openSearch );
			closeCtrl.addEventListener( 'click', closeSearch );
			document.addEventListener( 'keyup', function( ev ) {

				// escape key.
				if ( 27 === ev.keyCode ) {
					closeSearch();
				}
			} );
		}

		/**
		 * Open the search.
		 */
		function openSearch() {
			mainContainer.classList.add( 'main-wrap--move' );
			searchContainer.classList.add( 'search--open' );
			setTimeout( function() {
				inputSearch.focus();
			}, 600 );
		}

		/**
		 * Close the search.
		 */
		function closeSearch() {
			mainContainer.classList.remove( 'main-wrap--move' );
			searchContainer.classList.remove( 'search--open' );
			inputSearch.blur();
			inputSearch.value = '';
		}

		init();

			}( jQuery ) );
		";

			wp_add_inline_script( 'legenki-main', $legenki_search_js );
			?>

			<div class="legenki-search">
				<button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form"><span class="icon"></span></button>
				<div class="search__form">
					<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
					<span class="search__info"><?php esc_attr_e( 'Hit enter to search or ESC to close', 'legenki' ); ?></span>
				</div>

				<?php if ( 'enable' === $legenki_search_suggestions_display ) { ?>
				<div class="search__related">
					<div class="search__suggestion">
						<h3><?php esc_attr_e( 'Suggested Searches', 'legenki' ); ?></h3>
						<?php the_widget( 'WC_Widget_Product_Tag_Cloud', 'title=' ); ?>
					</div>			
				</div>
				<?php } ?>
			</div>	
				<?php
		}
	}
}

if ( ! function_exists( 'legenki_upsell_display' ) ) {
	/**
	 * Upsells
	 * Replace the default upsell function with our own which displays the correct number product columns
	 *
	 * @since   1.0.0
	 * @return  void
	 * @uses    woocommerce_upsell_display()
	 */
	function legenki_upsell_display() {
		$columns = apply_filters( 'legenki_upsells_columns', 3 );
		woocommerce_upsell_display( -1, $columns );
	}
}

if ( ! function_exists( 'legenki_sorting_wrapper' ) ) {
	/**
	 * Sorting wrapper
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_sorting_wrapper() {
		echo '<div class="legenki-sorting">';
	}
}

if ( ! function_exists( 'legenki_sorting_wrapper_close' ) ) {
	/**
	 * Sorting wrapper close
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_sorting_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'legenki_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_product_columns_wrapper() {
		$columns = legenki_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}

if ( ! function_exists( 'legenki_loop_columns' ) ) {
	/**
	 * Default loop columns on product archives
	 *
	 * @return integer products per row
	 * @since  1.0.0
	 */
	function legenki_loop_columns() {
		$columns = 4;

		if ( function_exists( 'wc_get_default_products_per_row' ) ) {
			$columns = wc_get_default_products_per_row();
		}

		return apply_filters( 'legenki_loop_columns', $columns );
	}
}

if ( ! function_exists( 'legenki_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	function legenki_product_columns_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'legenki_shop_messages' ) ) {
	/**
	 * Legenki shop messages
	 *
	 * @since   1.0.0
	 */
	function legenki_shop_messages() {
		if ( ! is_checkout() ) {
			echo wp_kses_post( legenki_do_shortcode( 'woocommerce_messages' ) );
		}
	}
}

if ( ! function_exists( 'legenki_woocommerce_pagination' ) ) {
	/**
	 * Legenki WooCommerce Pagination
	 *
	 * @since 1.0.0
	 */
	function legenki_woocommerce_pagination() {
		if ( woocommerce_products_will_display() ) {
			woocommerce_pagination();
		}
	}
}


add_action( 'woocommerce_before_shop_loop_item_title', 'legenki_template_shop_image_open', 5, 2 );
/**
 * Shop image wrapper open
 */
function legenki_template_shop_image_open() {
	echo '<div class="image-wrap">';
}

add_action( 'woocommerce_before_shop_loop_item_title', 'legenki_template_loop_product_link_open', 7, 2 );
/**
 * Shop image link open
 */
function legenki_template_loop_product_link_open() {
	echo legenki_safe_html( '<a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">' );
}

add_action( 'woocommerce_before_shop_loop_item_title', 'legenki_template_loop_product_link_close', 10, 2 );
/**
 * Shop image link close
 */
function legenki_template_loop_product_link_close() {
	echo '</a>';
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'legenki_product_title_link', 10 );

/**
 * Change shop loop product title
 */
function legenki_product_title_link() {
	echo legenki_safe_html( '<h2 class="woocommerce-loop-product_title"><a href="' . get_the_permalink() . '" title="' . the_title_attribute( array( 'echo' => false ) ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">' . get_the_title() . '</a></h2>' );
}


add_action( 'woocommerce_before_shop_loop_item_title', 'legenki_template_shop_image_close', 12, 2 );
/**
 * Shop image wrapper close
 */
function legenki_template_shop_image_close() {
	echo '</div>';
}


add_action( 'woocommerce_before_subcategory_title', 'legenki_template_subcategories_shop_image_open', 5, 2 );
/**
 * Sub categories: Shop image wrapper open
 */
function legenki_template_subcategories_shop_image_open() {
	echo '<div class="image-wrap">';
}

add_action( 'woocommerce_before_subcategory_title', 'legenki_template_subcategories_shop_image_close', 12, 2 );
/**
 * Sub categories: Shop image wrapper close
 */
function legenki_template_subcategories_shop_image_close() {
	echo '</div>';
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10, 2 );

/**
 * Change Reviews tab title.
 *
 * @param text $title Remove the brackets around the reviews title number.
 */
function legenki_woocommerce_reviews_tab_title( $title ) {
	$title = strtr(
		$title, array(
			'(' => '<span>',
			')' => '</span>',
		)
	);

	return $title;
}
add_filter( 'woocommerce_product_reviews_tab_title', 'legenki_woocommerce_reviews_tab_title' );

add_action( 'woocommerce_before_single_product', 'legenki_prev_next_product', 12 );

/**
 * Single Product Page - Previous/Next hover feature.
 */
function legenki_prev_next_product() {

		$legenki_woocommerce_prev_next_display = '';
		$legenki_woocommerce_prev_next_display = legenki_get_option( 'legenki_woocommerce_prev_next_display' );

		$next = get_next_post();
		$prev = get_previous_post();

		$next = ( ! empty( $next ) ) ? wc_get_product( $next->ID ) : false;
		$prev = ( ! empty( $prev ) ) ? wc_get_product( $prev->ID ) : false;

	?>
		<?php if ( true === $legenki_woocommerce_prev_next_display ) { ?>
			<div class="legenki-product-prevnext">

				<?php if ( ! empty( $prev ) ) : ?>				
					<a href="<?php echo esc_url( $prev->get_permalink() ); ?>"><div class="legenki-product-prev-icon"></div>
					<div class="tooltip">
						<?php echo legenki_safe_html( $prev->get_image() ); ?>
						<span class="title"><?php echo legenki_safe_html( $prev->get_title() ); ?></span>
						<span class="price"><?php echo legenki_safe_html( $prev->get_price_html() ); ?></span>
					</div>
					</a>		
				<?php endif ?>

				<?php if ( ! empty( $next ) ) : ?>

					<a href="<?php echo legenki_safe_html( $next->get_permalink() ); ?>"><div class="legenki-product-prevnext-icon"></div>
					<div class="tooltip">
						<?php echo legenki_safe_html( $next->get_image() ); ?>
						<span class="title"><?php echo legenki_safe_html( $next->get_title() ); ?></span>
						<span class="price"><?php echo legenki_safe_html( $next->get_price_html() ); ?></span>
					</div>
					</a>		
				<?php endif ?>

			</div>		
			<?php
}
}


/**
 * Remove "Category:" before blog categories for a cleaner look.
 *
 * @param text $title Cleans up category display.
 */
function legenki_prefix_category_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'legenki_prefix_category_title' );



/**
 * Add Progress Bar to the Cart and Checkout pages.
 */
add_action( 'woocommerce_before_cart', 'legenki_cart_progress' );
add_action( 'woocommerce_before_checkout_form', 'legenki_cart_progress', 5 );

if ( ! function_exists( 'legenki_cart_progress' ) ) {

	/**
	 * More product info
	 * Link to product
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function legenki_cart_progress() {

		$legenki_layout_progress_bar_display = '';
		$legenki_layout_progress_bar_display = legenki_get_option( 'legenki_layout_progress_bar_display' );

		$legenki_progress_one_title = '';
		$legenki_progress_one_title = legenki_get_option( 'legenki_progress_one_title' );
		$legenki_progress_one_desc  = '';
		$legenki_progress_one_desc  = legenki_get_option( 'legenki_progress_one_desc' );

		$legenki_progress_two_title = '';
		$legenki_progress_two_title = legenki_get_option( 'legenki_progress_two_title' );
		$legenki_progress_two_desc  = '';
		$legenki_progress_two_desc  = legenki_get_option( 'legenki_progress_two_desc' );

		$legenki_progress_three_title = '';
		$legenki_progress_three_title = legenki_get_option( 'legenki_progress_three_title' );
		$legenki_progress_three_desc  = '';
		$legenki_progress_three_desc  = legenki_get_option( 'legenki_progress_three_desc' );

		if ( true === $legenki_layout_progress_bar_display ) {
			?>

			<div class="checkout-wrap">
			<ul class="checkout-bar">
				<li class="first">
				<a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">
				<h4><?php echo legenki_safe_html( $legenki_progress_one_title ); ?></h4>
				<p><?php echo legenki_safe_html( $legenki_progress_one_desc ); ?></p>
				</a>
				</li>
				<li class="second">
				<a href="<?php echo get_permalink( wc_get_page_id( 'checkout' ) ); ?>">
				<h4><?php echo legenki_safe_html( $legenki_progress_two_title ); ?></h4>
				<p><?php echo legenki_safe_html( $legenki_progress_two_desc ); ?></p>
				</a>
				</li>
				<li class="third">
				<h4><?php echo legenki_safe_html( $legenki_progress_three_title ); ?></h4>
				<p><?php echo legenki_safe_html( $legenki_progress_three_desc ); ?></p>
				</li>
			</ul>
			</div>
			<?php

		}
		?>
		<?php

	}
}// End if().


if ( ! function_exists( 'legenki_sticky_single_add_to_cart' ) ) {
	/**
	 * Sticky Add to Cart
	 *
	 * @since 1.0.0
	 */
	function legenki_sticky_single_add_to_cart() {

		$legenki_woocommerce_sticky_cart_display = '';
		$legenki_woocommerce_sticky_cart_display = legenki_get_option( 'legenki_woocommerce_sticky_cart_display' );

		global $product;

		if ( true === $legenki_woocommerce_sticky_cart_display ) {
			?>
				<?php
					$legenki_sticky_addtocart_js  = '';
					$legenki_sticky_addtocart_js .= "
					( function ( $ ) {
						'use strict';
						 var initialTopOffset = $('.site-main').offset().top-150;
							$(window).scroll(function(event) {
							  var scroll = $(window).scrollTop();

							  if (scroll + initialTopOffset >= $('.site-main').offset().top && scroll + initialTopOffset <= $('.site-main').offset().top + $('.site-main').outerHeight()) {
							    $('body').addClass('sticky-visible'); 
							  } else {
							    $('body').removeClass('sticky-visible');
							  }
							});


						$(window).scroll(); 

					}( jQuery ) );
				";

					wp_add_inline_script( 'legenki-main', $legenki_sticky_addtocart_js );
				?>

				<?php if ( $product->is_in_stock() ) { ?>
				<section class="legenki-sticky-add-to-cart">
					<div class="col-full">
						<div class="legenki-sticky-add-to-cart__content">
							<?php echo wp_kses_post( woocommerce_get_product_thumbnail() ); ?>
							<div class="legenki-sticky-add-to-cart__content-product-info">
								<span class="legenki-sticky-add-to-cart__content-title"><?php the_title(); ?>
								</span>	
							</div>

							<div class="legenki-sticky-add-to-cart__content-button">
								<span class="legenki-sticky-add-to-cart__content-price"><?php echo legenki_safe_html( $product->get_price_html() ); ?></span>

							<?php if ( $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) { ?>
								<a href="#main" class="variable-grouped-sticky button">
									<?php echo esc_attr__( 'Select options', 'legenki' ); ?>
								</a>
							<?php } else { ?>										
								<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="button">							
									<?php echo esc_attr( $product->single_add_to_cart_text() ); ?>
								</a>

							<?php } ?>
							</div>
						</div>
					</div>
				</section>

					<?php
}
		}// End if().
		?>
		<?php
	}
}// End if().
