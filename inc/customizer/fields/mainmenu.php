<?php
/**
 *
 * Main menu theme options
 *
 * @package Legenki
 * @subpackage legenki
 */

// Main Menu.
$legenki_default_options = legenki_get_option_defaults();

// Display top bar.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_layout_top_bar_display',
		'label'       => esc_html__( 'Display top bar?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the top bar', 'legenki' ),
		'section'     => 'legenki_header_section_top_bar',
		'default'     => $legenki_default_options['legenki_layout_top_bar_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Wishlist title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_site_tools_section_heading_1',
		'section'  => 'legenki_site_tools_section',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Wishlist', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Display wishlist.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_wishlist_display',
		'label'       => esc_html__( 'Display wishlist?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the wishlist icon. Needs the YITH Wishlist plugin active.', 'legenki' ),
		'section'     => 'legenki_site_tools_section',
		'default'     => $legenki_default_options['legenki_wishlist_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Account title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_site_tools_section_heading_2',
		'section'  => 'legenki_site_tools_section',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Account', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Display account.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_account_display',
		'label'       => esc_html__( 'Display account?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the account icon', 'legenki' ),
		'section'     => 'legenki_site_tools_section',
		'default'     => $legenki_default_options['legenki_account_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Account URL.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'              => 'text',
		'settings'          => 'legenki_account_url',
		'label'             => esc_attr__( 'Account URL', 'legenki' ),
		'description'       => esc_html__( 'Enter the full url to your account page', 'legenki' ),
		'section'           => 'legenki_site_tools_section',
		'default'           => $legenki_default_options['legenki_account_url'],
		'sanitize_callback' => 'esc_url_raw',
	)
);

// Cart title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_site_tools_section_heading_3',
		'section'  => 'legenki_site_tools_section',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Cart', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Display cart.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_cart_display',
		'label'       => esc_html__( 'Display cart?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the cart icon. WooCommerce needs to be active.', 'legenki' ),
		'section'     => 'legenki_site_tools_section',
		'default'     => $legenki_default_options['legenki_cart_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Mini cart text.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'      => 'text',
		'settings'  => 'legenki_mini_cart_text',
		'label'     => esc_html__( 'Mini cart text', 'legenki' ),
		'section'   => 'legenki_site_tools_section',
		'default'   => $legenki_default_options['legenki_mini_cart_text'],
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


// Search title.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_site_tools_section_heading_4',
		'section'  => 'legenki_site_tools_section',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Search', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);

// Display search.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_search_display',
		'label'       => esc_html__( 'Display search?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the search icon', 'legenki' ),
		'section'     => 'legenki_site_tools_section',
		'default'     => $legenki_default_options['legenki_search_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Display search suggestions.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_search_suggestions_display',
		'label'       => esc_html__( 'Display search suggestions?', 'legenki' ),
		'description' => esc_html__( 'Uses product tags', 'legenki' ),
		'section'     => 'legenki_site_tools_section',
		'default'     => $legenki_default_options['legenki_search_suggestions_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Header Height.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'slider',
		'settings'    => 'legenki_navigation_height',
		'label'       => esc_html__( 'Header Height', 'legenki' ),
		'description' => esc_html__( 'Adjust the header height (px)', 'legenki' ),
		'section'     => 'legenki_header_section_layout',
		'default'     => 70,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'     => '.site-header ul.menu > li > a',
				'property'    => 'line-height',
				'units'       => 'px',
				'media_query' => '@media (min-width: 1025px)',
			),
			array(
				'element'     => '.site-header .row',
				'property'    => 'height',
				'units'       => 'px',
				'media_query' => '@media (min-width: 1025px)',
			),
			array(
				'element'     => '.site-header ul.menu > li > .sub-menu-wrapper',
				'property'    => 'margin-top',
				'units'       => 'px',
				'media_query' => '@media (min-width: 1025px)',
			),
		),
	)
);

// Sticky Header.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_sticky_header',
		'label'       => esc_html__( 'Sticky Header', 'legenki' ),
		'description' => esc_html__( 'Stick the header on scroll', 'legenki' ),
		'section'     => 'legenki_header_section_layout',
		'default'     => $legenki_default_options['legenki_sticky_header'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Display below header area.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_layout_below_header_display',
		'label'       => esc_html__( 'Display below header area?', 'legenki' ),
		'description' => esc_html__( 'Enable or disable the below header area', 'legenki' ),
		'section'     => 'legenki_header_section_layout',
		'default'     => $legenki_default_options['legenki_layout_below_header_display'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'enable'  => esc_html__( 'Enable', 'legenki' ),
			'disable' => esc_html__( 'Disable', 'legenki' ),
		),
	)
);

// Navigation Position.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'select',
		'settings'    => 'legenki_navigation_position',
		'label'       => esc_html__( 'Navigation Position', 'legenki' ),
		'description' => esc_html__( 'Position your main menu', 'legenki' ),
		'section'     => 'legenki_navigation_section_position',
		'default'     => $legenki_default_options['legenki_navigation_position'],
		'priority'    => 10,
		'transport'   => 'refresh',
		'choices'     => array(
			'left-navigation'   => esc_html__( 'Left Align', 'legenki' ),
			'center-navigation' => esc_html__( 'Center Align', 'legenki' ),
			'center-logo'       => esc_html__( 'Left Align / Center Logo', 'legenki' ),
		),
	)
);


// Main Navigation Level 1 Menu Font.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_mainmenu_level1_fontfamily',
		'label'    => esc_html__( 'Level 1 Font settings', 'legenki' ),
		'section'  => 'legenki_navigation_section_layout',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '20px',
			'text-transform' => 'unset',
			'letter-spacing' => '0.4px',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => '.site-header ul.menu > li > a',
				'property' => 'font-family',
			),
		),
	)
);

// Main Navigation Level 2 Menu Font.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_mainmenu_level2_family',
		'label'    => esc_html__( 'Level 2 Font settings', 'legenki' ),
		'section'  => 'legenki_navigation_section_layout',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '500',
			'font-size'      => '15px',
			'text-transform' => 'none',
			'text-transform' => 'none',
			'letter-spacing' => '0px',
			'color'          => '#444',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => '.site-header ul.menu .sub-menu-wrapper ul > li > a, .site-header ul.menu .sub-menu-wrapper ul ul > li.heading > a',
				'property' => 'font-family',
			),
		),
	)
);

// Main Navigation Level 3 Menu Font.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'typography',
		'settings' => 'legenki_mainmenu_level3_family',
		'label'    => esc_html__( 'Level 3 Font settings', 'legenki' ),
		'section'  => 'legenki_navigation_section_layout',
		'default'  => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '14px',
			'text-transform' => 'none',
			'letter-spacing' => '0px',
			'color'          => '#444',
		),
		'priority' => 60,
		'output'   => array(
			array(
				'element'  => '.site-header ul.menu .sub-menu-wrapper ul ul > li > a',
				'property' => 'font-family',
			),
		),
	)
);
