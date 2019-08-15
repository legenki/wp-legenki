<?php
/**
 *
 * Typography theme options
 *
 * @package Legenki
 * @subpackage legenki
 */

// Main body fields.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_mainbody_fontfamily',
		'label'    => esc_html__( 'Font settings', 'legenki' ),
		'section'  => 'legenki_typography_section_mainbody',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
		),
		'priority' => 10,
		'output'   => array(
			array(
				'element'  => 'body',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-button__link, figcaption, .wp-block-table, .wp-block-pullquote__citation',
				'property' => 'font-size',
				'context'  => array( 'editor' ),
			),
		),

	)
);

// Paragraph.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_p_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_p',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '17px',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#111',
			'text-transform' => 'none',
		),
		'priority' => 20,
		'output'   => array(
			array(
				'element'  => '.entry-content, .summary p',
				'property' => 'font-family',
			),
			array(
				'element'  => '.edit-post-visual-editor.editor-styles-wrapper p, .edit-post-visual-editor.editor-styles-wrapper li',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h1.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_h1_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_h1',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '52px',
			'line-height'    => '1.1',
			'letter-spacing' => '0px',
			'color'          => '#111',
			'text-transform' => 'none',
		),
		'priority' => 20,
		'output'   => array(
			array(
				'element'  => 'h1',
				'property' => 'font-family',
			),
			array(
				'element'  => '.editor-post-title__input',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// h2.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_h2_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_h2',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '26px',
			'line-height'    => '1.4',
			'letter-spacing' => '0px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 30,
		'output'   => array(
			array(
				'element'  => 'h2, span#reply-title, .site-main #jp-relatedposts h3.jp-relatedposts-headline',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h2',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);


// h3.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_h3_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_h3',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '22px',
			'line-height'    => '1.55',
			'letter-spacing' => '-0.3px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 40,
		'output'   => array(
			array(
				'element'  => 'h3',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h3',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);


// h4.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_h4_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_h4',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.6',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 50,
		'output'   => array(
			array(
				'element'  => 'h4',
				'property' => 'font-family',
			),
			array(
				'element'  => '.wp-block-heading h4',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);


// h5.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_h5_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_h5',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '18px',
			'line-height'    => '1.6',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => 'h5',
				'property' => 'font-family',
			),
		),
	)
);

// Blockquote.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_blockquote_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_blockquote',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '20px',
			'line-height'    => '1.6',
			'letter-spacing' => '-0.3px',
			'subsets'        => array( 'latin-ext' ),
			'color'          => '#222',
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.entry-content blockquote p',
				'property' => 'font-family',
			),
			array(
				'element'  => '.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote p, .edit-post-visual-editor.editor-styles-wrapper .wp-block-quote',
				'property' => 'font-family',
				'context'  => array( 'editor' ),
			),
		),
	)
);

// Widget Titles.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_widget_title_fontfamily',
		'label'    => esc_html__( 'Font Settings', 'legenki' ),
		'section'  => 'legenki_typography_section_headings_widget_title',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '20px',
			'line-height'    => '1.5',
			'letter-spacing' => '0px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.widget-title, footer.copyright p',
				'property' => 'font-family',
			),
		),
	)
);

// Archives Blog Post Title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_archives_blog_post_title',
		'label'    => esc_html__( 'Archives Blog Post Title', 'legenki' ),
		'section'  => 'legenki_typography_section_blog',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '22px',
			'line-height'    => '1.4',
			'letter-spacing' => '0px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => 'article.post h2, .search-results h2.entry-title',
				'property' => 'font-family',
			),
		),
	)
);


// Single Blog Post Title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_single_blog_post_title',
		'label'    => esc_html__( 'Single Blog Post Title', 'legenki' ),
		'section'  => 'legenki_typography_section_blog',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '42px',
			'line-height'    => '1.35',
			'letter-spacing' => '-0.3px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.single-post h1',
				'property' => 'font-family',
			),
		),
	)
);

// WooCommerce.
// Archives Category Description.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_woocommerce_archives_description',
		'label'    => esc_html__( 'Archives Category Description', 'legenki' ),
		'section'  => 'legenki_typography_section_woocommerce',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '20px',
			'letter-spacing' => '-0.2px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.term-description',
				'property' => 'font-family',
			),
		),
	)
);

// Archives Product Title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_woocommerce_listings_title',
		'label'    => esc_html__( 'Archives Product Title', 'legenki' ),
		'section'  => 'legenki_typography_section_woocommerce',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '500',
			'font-size'      => '16px',
			'letter-spacing' => '0px',
			'line-height'    => '22px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => '.content-area ul.products li.product .woocommerce-loop-product__title, .content-area ul.products li.product h2,
			ul.products li.product .woocommerce-loop-product__title, ul.products li.product h2',
				'property' => 'font-family',
			),
		),
	)
);


// Single Product Title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_woocommerce_single_title',
		'label'    => esc_html__( 'Single Product Title', 'legenki' ),
		'section'  => 'legenki_typography_section_woocommerce',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '700',
			'font-size'      => '46px',
			'letter-spacing' => '0px',
			'line-height'    => '50px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'none',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => 'body.single-product h1',
				'property' => 'font-family',
			),
		),
	)
);

// Primary Buttons.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_typography_woocommerce_primary_button',
		'label'    => esc_html__( 'Primary Buttons', 'legenki' ),
		'section'  => 'legenki_typography_section_woocommerce',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '500',
			'font-size'      => '16px',
			'letter-spacing' => '0.4px',
			'subsets'        => array( 'latin-ext' ),
			'text-transform' => 'uppercase',
		),
		'priority' => 70,
		'output'   => array(
			array(
				'element'  => 'body .woocommerce #respond input#submit.alt, 
			body .woocommerce a.button.alt, 
			body .woocommerce button.button.alt, 
			body .woocommerce input.button.alt,
			.product .cart .single_add_to_cart_button,
			.legenki-sticky-add-to-cart__content-button a.button,
			.legenki-mini-cart-wrap .widget_shopping_cart a.button.checkout,
			.woocommerce-mini-cart__buttons a,
			.cta-button',
				'property' => 'font-family',
			),
		),
	)
);
