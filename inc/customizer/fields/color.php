<?php
/**
 *
 * Color theme options
 *
 * @package Legenki
 * @subpackage legenki
 */

// Color fields.
$legenki_default_options = legenki_get_option_defaults();

// General colors.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'color',
		'settings'    => 'legenki_color_general_swatch',
		'label'       => esc_html__( 'Primary swatch color', 'legenki' ),
		'description' => esc_html__( 'Select the primary color of your brand.', 'legenki' ),
		'section'     => 'legenki_color_section_general',
		'default'     => $legenki_default_options['legenki_color_general_swatch'],
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '.header-categories ul li.current-cat > a, .header-categories ul li a:hover, .woocommerce-checkout .woocommerce-info a,
				article.post span.posted-on, .single-post aside.entry-meta a:hover, a.reset_variations, .woocommerce-table--order-details a,
				.site .legenki-sticky-add-to-cart__content-button a.button:hover, a.portfolio-item:hover:before,
				li.product .yith-wcwl-add-button a:hover:before, li.product .yith-wcwl-wishlistaddedbrowse a:before, 
				li.product .yith-wcwl-wishlistexistsbrowse a:before, article.post.sticky h2:before, body .entry-content blockquote:before',
				'property' => 'color',
			),
			array(
				'element'  => '.site .widget_price_filter .ui-slider .ui-slider-range,
				.entry-content blockquote:before, .mc4wp-form-fields input[type=submit],
				.entry-content h3.dot:before, .widget_calendar td#today:before, section.overlay-effect:before, .entry-footer ul li a:hover,
				.entry-content .zoom-caption figure figcaption:before, .page .entry-content ul.display-posts-listing .category-display a',
				'property' => 'background-color',
			),
			array(
				'element'  => '.product-widget ul li:before, .site .legenki-sticky-add-to-cart__content-button a.button:hover,
				.page-template-default #secondary.widget-area .widget .widget-title span.highlight, .product-widget .textwidget ul li:before,
				.single-post .entry-content ul:not(.wp-block-gallery):not(.products) li:before, .woocommerce-Tabs-panel ul li:before',
				'property' => 'border-color',
			),
			array(
				'element'  => 'body .edit-post-visual-editor.editor-styles-wrapper li:before',
				'property' => 'border-color',
				'context'  => array( 'editor' ),
			),
			array(
				'element'  => '.wp-block-quote:before, .wp-block-pullquote:before',
				'property' => 'color',
				'context'  => array( 'editor' ),
			),

		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.header-categories ul li.current-cat a, .header-categories ul li a:hover, .woocommerce-checkout .woocommerce-info a,
				article.post span.posted-on, .single-post aside.entry-meta a:hover, a.reset_variations, .woocommerce-table--order-details a,
				.site .legenki-sticky-add-to-cart__content-button a.button:hover, a.portfolio-item:hover:before,
				li.product .yith-wcwl-add-button a:hover:before, li.product .yith-wcwl-wishlistaddedbrowse a:before, 
				li.product .yith-wcwl-wishlistexistsbrowse a:before, article.post.sticky h2:before, body .entry-content blockquote:before',
				'property' => 'color',
			),
			array(
				'element'  => '.site .widget_price_filter .ui-slider .ui-slider-range,
				.entry-content blockquote:before, .mc4wp-form-fields input[type=submit],
				.entry-content h3.dot:before, .widget_calendar td#today:before, section.overlay-effect:before, .entry-footer ul li a:hover,
				.entry-content .zoom-caption figure figcaption:before, .page .entry-content ul.display-posts-listing .category-display a',
				'property' => 'background-color',
			),
			array(
				'element'  => '.product-widget ul li:before, .site .legenki-sticky-add-to-cart__content-button a.button:hover,
				.page-template-default #secondary.widget-area .widget .widget-title span.highlight, .product-widget .textwidget ul li:before,
				.single-post .entry-content ul:not(.wp-block-gallery):not(.products) li:before, .woocommerce-Tabs-panel ul li:before',
				'property' => 'border-color',
			),

		),
	)
);


// General Links.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_color_general_links',
		'label'     => esc_html__( 'General links', 'legenki' ),
		'section'   => 'legenki_color_section_general',
		'default'   => $legenki_default_options['legenki_color_general_links'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.page .entry-content p a:not(.button):not(.cta-button), .page .entry-content h3 a, .page .entry-content p a, .entry-content p a:not(.button):not(.added_to_cart):not(.wp-block-button__link):not(.cta-button):not(.woocommerce-LoopProduct-link):not(.title), .comments-area .comment-text a, .woocommerce-MyAccount-content p a, .woocommerce-MyAccount-content a, .entry-content p.return-to-shop a, .product_meta a, .wc-gzd-additional-info a, .summary p a, #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a, .page .entry-content ul.display-posts-listing li a.title:hover, .center-caption figcaption strong, .center-caption figcaption span',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.page .entry-content p a:not(.button):not(.cta-button), .page .entry-content h3 a, .page .entry-content p a:not(.added_to_cart), .entry-content a:not(.button):not(.added_to_cart):not(.wp-block-button__link):not(.cta-button):not(.woocommerce-LoopProduct-link):not(.title), .comments-area .comment-text a, .woocommerce-MyAccount-content p a, .woocommerce-MyAccount-content a, .entry-content p.return-to-shop a, .product_meta a, .wc-gzd-additional-info a, .summary p a, #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a, .page .entry-content ul.display-posts-listing li a.title:hover, .center-caption figcaption strong, .center-caption figcaption span',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);


// General Links Hover.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_color_general_links_hover',
		'label'     => esc_html__( 'General links hover', 'legenki' ),
		'section'   => 'legenki_color_section_general',
		'default'   => $legenki_default_options['legenki_color_general_links_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.content-area .entry-content p a:hover, .page .entry-content h3 a:hover, .single-post .entry-content a:not(.button):not(.wp-block-button__link):hover, .comments-area .comment-text a:hover, .woocommerce-MyAccount-content p a:hover, .woocommerce-MyAccount-content a:hover, .entry-content p.return-to-shop a:hover, .summary p a:hover, #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.content-area .entry-content p a:hover, .page .entry-content h3 a:hover, .single-post .entry-content a:not(.button):not(.wp-block-button__link):hover, .comments-area .comment-text a:hover, .woocommerce-MyAccount-content p a:hover, .woocommerce-MyAccount-content a:hover, .entry-content p.return-to-shop a:hover, .summary p a:hover, #jp-relatedposts .jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Top Bar background.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_layout_top_bar_background',
		'label'     => esc_html__( 'Top bar background', 'legenki' ),
		'section'   => 'legenki_color_section_topbar',
		'default'   => $legenki_default_options['legenki_layout_top_bar_background'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.topbar-wrapper',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.topbar-wrapper',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Top Bar text color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_layout_top_bar_text',
		'label'     => esc_html__( 'Top Bar text color', 'legenki' ),
		'section'   => 'legenki_color_section_topbar',
		'default'   => $legenki_default_options['legenki_layout_top_bar_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.topbar-wrapper, .topbar-wrapper a, .topbar-wrapper .widget-area .textwidget a',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.topbar-wrapper, .topbar-wrapper a, .topbar-wrapper .widget-area .textwidget a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Top Bar hover color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_layout_top_bar_text_hover',
		'label'     => esc_html__( 'Top Bar hover color', 'legenki' ),
		'section'   => 'legenki_color_section_topbar',
		'default'   => $legenki_default_options['legenki_layout_top_bar_text_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.topbar-wrapper a:hover',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.topbar-wrapper a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Header Background Color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_header_bg_color',
		'label'     => esc_html__( 'Header background', 'legenki' ),
		'section'   => 'legenki_color_section_header',
		'default'   => $legenki_default_options['legenki_header_bg_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.site-header',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.site-header',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Demo site only.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_header_style',
		'label'     => esc_html__( 'Header Style', 'legenki' ),
		'default'   => $legenki_default_options['legenki_header_style'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'default' => esc_html__( 'Default', 'legenki' ),
			'green'   => esc_html__( 'Green', 'legenki' ),
			'blue'    => esc_html__( 'Blue', 'legenki' ),
		),
	)
);

// Main Navigation Links Color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_header_color',
		'label'     => esc_html__( 'Header color', 'legenki' ),
		'section'   => 'legenki_color_section_header',
		'default'   => $legenki_default_options['legenki_header_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.site-header ul.menu > li > a, .navigation-tools > ul > li > a, .navigation-tools button',
				'property' => 'color',
			),
			array(
				'element'  => '.menu-toggle .bar',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.site-header ul.menu > li > a, .navigation-tools > ul > li > a, .navigation-tools button',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.menu-toggle .bar',
				'property' => 'background-color',
			),
		),
	)
);


// Main Navigation Dropdown Links Hover.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_navigation_dropdown_hover',
		'label'     => esc_html__( 'Dropdown hover color', 'legenki' ),
		'section'   => 'legenki_color_section_header',
		'default'   => $legenki_default_options['legenki_navigation_dropdown_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.site-header ul.menu .sub-menu-wrapper ul ul > li > a:hover',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.site-header ul.menu .sub-menu-wrapper ul ul > li > a:hover',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Main Navigation Hover animated bar color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_navigation_dropdown_hover',
		'label'     => esc_html__( 'Navigation hover animated bar color', 'legenki' ),
		'section'   => 'legenki_color_section_header',
		'default'   => $legenki_default_options['legenki_navigation_animated_hover'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.navigation-wrapper ul.menu > li > a > span:before',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.navigation-wrapper ul.menu > li > a > span:before',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);


legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_color_woocommerce_heading_1',
		'section'  => 'legenki_color_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Primary Button', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// WooCommerce primary button text color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_woocommerce_button_text',
		'label'     => esc_html__( 'Primary button text color', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_woocommerce_button_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.cart .single_add_to_cart_button, .cart_totals table .shipping-calculator-form button, .wc-proceed-to-checkout .button, table.cart td.actions button, .woocommerce-checkout-review-order #place_order.button, form.woocommerce-form-login button, .woocommerce-account form button, .wc-proceed-to-checkout .button.checkout-button,
					.woocommerce .wishlist_table td.product-add-to-cart a.button.alt, .woocommerce-mini-cart__buttons a.checkout',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.cart .single_add_to_cart_button, .cart_totals table .shipping-calculator-form button, .wc-proceed-to-checkout .button, table.cart td.actions button, .woocommerce-checkout-review-order #place_order.button, form.woocommerce-form-login button, .woocommerce-account form button, .wc-proceed-to-checkout .button.checkout-button,
					.woocommerce .wishlist_table td.product-add-to-cart a.button.alt, .woocommerce-mini-cart__buttons a.checkout',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);


// WooCommerce primary button background color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_woocommerce_button_bg',
		'label'     => esc_html__( 'Primary button background', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_woocommerce_button_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.legenki-sticky-add-to-cart__content-button a.button, .cart .single_add_to_cart_button, .wc-proceed-to-checkout .button, table.cart td.actions button, .woocommerce-checkout-review-order #place_order.button, form.woocommerce-form-login button, .woocommerce-account form button, .woocommerce .wishlist_table td.product-add-to-cart a.button.alt,
				.woocommerce-mini-cart__buttons a.checkout',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.legenki-sticky-add-to-cart__content-button a.button, .cart .single_add_to_cart_button, .wc-proceed-to-checkout .button, table.cart td.actions button, .woocommerce-checkout-review-order #place_order.button, form.woocommerce-form-login button, .woocommerce-account form button, .woocommerce .wishlist_table td.product-add-to-cart a.button.alt,
				.woocommerce-mini-cart__buttons a.checkout',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);


// WooCommerce primary button background hover color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_woocommerce_button_hover_bg',
		'label'     => esc_html__( 'Primary button background hover', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_woocommerce_button_hover_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.cart .single_add_to_cart_button:hover, .cart_totals table .shipping-calculator-form button:hover, .wc-proceed-to-checkout .button:hover, table.cart td.actions button:hover, .woocommerce-checkout-review-order #place_order.button:hover, form.woocommerce-form-login button:hover, .woocommerce-account form button:hover, .woocommerce .wishlist_table td.product-add-to-cart a.button.alt:hover,
				.woocommerce-mini-cart__buttons a.checkout:hover',

				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.cart .single_add_to_cart_button:hover, .cart_totals table .shipping-calculator-form button:hover, .wc-proceed-to-checkout .button:hover, table.cart td.actions button:hover, .woocommerce-checkout-review-order #place_order.button:hover, form.woocommerce-form-login button:hover, .woocommerce-account form button:hover, .woocommerce .wishlist_table td.product-add-to-cart a.button.alt:hover,
				.woocommerce-mini-cart__buttons a.checkout:hover',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_color_woocommerce_heading_2',
		'section'  => 'legenki_color_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Sale Flash', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Sale flash background color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_sale_flash_bg',
		'label'     => esc_html__( 'Sale flash background', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_sale_flash_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'body .onsale, .product-label',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'body .onsale, .product-label',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Sale flash text color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_sale_flash_text',
		'label'     => esc_html__( 'Sale flash text color', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_sale_flash_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'body .onsale, .product-label',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'body .onsale, .product-label',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_color_woocommerce_heading_4',
		'section'  => 'legenki_color_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( ' Ratings', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Ratings color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_ratings_color',
		'label'     => esc_html__( 'Star ratings color', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_ratings_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.woocommerce .star-rating span:before, .entry-content .testimonial-entry-title:after',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.woocommerce .star-rating span:before, .entry-content .testimonial-entry-title:after',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_color_woocommerce_heading_5',
		'section'  => 'legenki_color_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( ' Product Archives', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Archive description text color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_archives_text_bg',
		'label'     => esc_html__( 'Archive title and description color', 'legenki' ),
		'section'   => 'legenki_color_section_woocommerce',
		'default'   => $legenki_default_options['legenki_archives_description_text'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => '.image-exists .term-description p, body:not(.legenki-shop-landing) .woocommerce-products-header.image-exists h1',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '.image-exists .term-description p, body:not(.legenki-shop-landing) .woocommerce-products-header.image-exists h1',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);


// Footer background color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_footer_bg',
		'label'     => esc_html__( 'Footer background', 'legenki' ),
		'section'   => 'legenki_color_section_footer',
		'default'   => $legenki_default_options['legenki_footer_bg'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer',
				'property' => 'background-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	)
);

// Footer heading color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_footer_heading_color',
		'label'     => esc_html__( 'Footer headings color', 'legenki' ),
		'section'   => 'legenki_color_section_footer',
		'default'   => $legenki_default_options['legenki_footer_heading_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer .widget .widget-title',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer .widget .widget-title',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);

// Footer text color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_footer_color',
		'label'     => esc_html__( 'Footer text color', 'legenki' ),
		'section'   => 'legenki_color_section_footer',
		'default'   => $legenki_default_options['legenki_footer_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);


// Footer links color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_footer_links_color',
		'label'     => esc_html__( 'Footer links', 'legenki' ),
		'section'   => 'legenki_color_section_footer',
		'default'   => $legenki_default_options['legenki_footer_links_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer a:not(.button), footer .widget-area .textwidget a',
				'property' => 'color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer a:not(.button), footer .widget-area .textwidget a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	)
);


// Footer links hover color.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'color',
		'settings'  => 'legenki_footer_links_hover_color',
		'label'     => esc_html__( 'Footer links hover', 'legenki' ),
		'section'   => 'legenki_color_section_footer',
		'default'   => $legenki_default_options['legenki_footer_links_hover_color'],
		'priority'  => 10,
		'output'    => array(
			array(
				'element'  => 'footer a:not(.button):hover, footer h3, footer .widget-area .textwidget a:hover, footer .widget-area .tagcloud a:hover',
				'property' => 'color',
			),
			array(
				'element'  => 'footer li a:after',
				'property' => 'border-color',
			),
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => 'footer a:not(.button):hover, footer h3, footer .widget-area .textwidget a:hover, footer .widget-area .tagcloud a:hover',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => 'footer li a:after',
				'property' => 'border-color',
			),
		),
	)
);
