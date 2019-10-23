<?php
/**
 *
 * Layout theme options
 *
 * @package Legenki
 * @subpackage legenki
 */

// Layout fields.
$legenki_default_options = legenki_get_option_defaults();

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_layout_woocommerce_sidebar_heading_1',
		'section'  => 'legenki_layout_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'General', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);


// Display Breadcrumbs.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_display_breadcrumbs',
		'label'     => esc_html__( 'Display breadcrumbs', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_layout_woocommerce_sidebar_heading_2',
		'section'  => 'legenki_layout_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Shop', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);


// Display rating.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_woocommerce_display_rating',
		'label'     => esc_html__( 'Display rating', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

// Display WooCommerce categories.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_categories_display',
		'label'     => esc_html__( 'Display categories', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

// Flip image on hover.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_woocommerce_flip_image',
		'label'     => esc_html__( 'Flip image on hover', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_layout_woocommerce_sidebar_heading_3',
		'section'  => 'legenki_layout_section_woocommerce',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Single Product', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);


// Display sticky add to cart bar.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_sticky_cart_display',
		'label'     => esc_html__( 'Display sticky add to cart', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


// Display related.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_related_display',
		'label'     => esc_html__( 'Display related', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


// Display product meta data.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_meta_display',
		'label'     => esc_html__( 'Display product meta data', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);


// Display previous/next products.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_woocommerce_prev_next_display',
		'label'     => esc_html__( 'Display prev/next items', 'legenki' ),
		'section'   => 'legenki_layout_section_woocommerce',
		'default'   => '1',
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

// Display progress bar
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'toggle',
		'settings' => 'legenki_layout_progress_bar_display',
		'label'    => esc_attr__( 'Display progress bar', 'legenki' ),
		'section'  => 'legenki_layout_section_woocommerce',
		'default'  => 1,
		'priority' => 10,
	)
);


// WooCommerce Sidebar.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_layout_woocommerce_sidebar',
		'label'     => esc_html__( 'WooCommerce Sidebar', 'legenki' ),
		'section'   => 'legenki_layout_section_sidebars',
		'default'   => $legenki_default_options['legenki_layout_woocommerce_sidebar'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'left-woocommerce-sidebar'      => esc_html__( 'Left', 'legenki' ),
			'offscreen-woocommerce-sidebar' => esc_html__( 'Off Screen', 'legenki' ),
		),
	)
);



// Blog.
// Layout.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_layout_blog_heading_1',
		'section'  => 'legenki_layout_section_blog',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Archives', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_layout_blog',
		'label'     => esc_html__( 'Blog Layout', 'legenki' ),
		'section'   => 'legenki_layout_section_blog',
		'default'   => $legenki_default_options['legenki_layout_blog'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'flow'        => esc_html__( 'Flow', 'legenki' ),
			'grid grid-2' => esc_html__( 'Grid of Two', 'legenki' ),
			'grid grid-3' => esc_html__( 'Grid of Three', 'legenki' ),
			'grid mixed'  => esc_html__( 'Mixed Grid', 'legenki' ),
		),
	)
);

// Display blog categories.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_blog_categories_display',
		'label'     => esc_html__( 'Display blog categories', 'legenki' ),
		'section'   => 'legenki_layout_section_blog',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_layout_blog_heading_2',
		'section'  => 'legenki_layout_section_blog',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Single Post', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Single Post Layout.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_layout_singlepost',
		'label'     => esc_html__( 'Single Post Layout', 'legenki' ),
		'section'   => 'legenki_layout_section_blog',
		'default'   => $legenki_default_options['legenki_layout_singlepost'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'singlepost-layout-one' => esc_html__( 'Layout One', 'legenki' ),
			'singlepost-layout-two' => esc_html__( 'Layout Two', 'legenki' ),
		),
	)
);

// Display blog tags.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_blog_tags_display',
		'label'     => esc_html__( 'Display blog tags', 'legenki' ),
		'section'   => 'legenki_layout_section_blog',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

// Display blog socials.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_blog_socials_display',
		'label'     => esc_html__( 'Display blog social links', 'legenki' ),
		'section'   => 'legenki_layout_section_blog',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);



// Display blog summary.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'toggle',
		'settings'  => 'legenki_layout_blog_summary_display',
		'label'     => esc_html__( 'Display blog post summary', 'legenki' ),
		'section'   => 'legenki_layout_blog',
		'default'   => 1,
		'priority'  => 10,
		'transport' => 'refresh',
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_progress_heading_1',
		'section'  => 'legenki_layout_section_progress',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Step One', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Progress Bar Text - Title One.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_one_title',
		'label'     => esc_html__( 'Title', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_one_title'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

// Progress Bar Text - Description One.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_one_desc',
		'label'     => esc_html__( 'Description', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_one_desc'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_progress_heading_2',
		'section'  => 'legenki_layout_section_progress',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Step Two', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Progress Bar Text - Title Two.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_two_title',
		'label'     => esc_html__( 'Title', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_two_title'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

// Progress Bar Text - Description Two.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_two_desc',
		'label'     => esc_html__( 'Description', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_two_desc'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_progress_heading_3',
		'section'  => 'legenki_layout_section_progress',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Step Three', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);


// Progress Bar Text - Title Three.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_three_title',
		'label'     => esc_html__( 'Title', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_three_title'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

// Progress Bar Text - Description Three.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_progress_three_desc',
		'label'     => esc_html__( 'Description', 'legenki' ),
		'section'   => 'legenki_layout_section_progress',
		'default'   => $legenki_default_options['legenki_progress_three_desc'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);


// Footer fields.
// Display Below Content Area.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_below_content_display',
		'label'     => esc_html__( 'Show Below Content?', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_below_content_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'legenki' ),
			'hide' => esc_html__( 'Hide', 'legenki' ),
		),
	)
);

// Below Content Background Image.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'image',
		'settings'    => 'legenki_below_content_image',
		'label'       => esc_html__( 'Below Content Background Image', 'legenki' ),
		'description' => esc_html__( 'Suggested size: 1800px x 320px.', 'legenki' ),
		'section'     => 'legenki_layout_section_footer',
		'default'     => $legenki_default_options['legenki_below_content_image'],
		'priority'    => 10,
	)
);

// Below Content title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_below_content_title',
		'label'     => esc_html__( 'Below content title', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_below_content_title'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);

// Below Content text.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_below_content_text',
		'label'     => esc_html__( 'Below content text', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_below_content_text'],
		'priority'  => 10,
		'transport' => 'auto',
		'js_vars'   => array(
			array(
				'element'  => 'span',
				'function' => 'html',
			),
		),
	)
);


// Display Footer.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_footer_display',
		'label'     => esc_html__( 'Show Footer?', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_footer_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'legenki' ),
			'hide' => esc_html__( 'Hide', 'legenki' ),
		),
	)
);


// Display Copyright.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_copyright_display',
		'label'     => esc_html__( 'Show Copyright?', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_copyright_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'legenki' ),
			'hide' => esc_html__( 'Hide', 'legenki' ),
		),
	)
);

// Display Back to Top.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'select',
		'settings'  => 'legenki_backtotop_display',
		'label'     => esc_html__( 'Show Back to Top?', 'legenki' ),
		'section'   => 'legenki_layout_section_footer',
		'default'   => $legenki_default_options['legenki_backtotop_display'],
		'priority'  => 10,
		'transport' => 'refresh',
		'choices'   => array(
			'show' => esc_html__( 'Show', 'legenki' ),
			'hide' => esc_html__( 'Hide', 'legenki' ),
		),
	)
);
