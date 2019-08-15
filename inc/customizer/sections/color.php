<?php
/**
 *
 * Kirki color section
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_section_color( $wp_customize ) {

	// Colors.
	$wp_customize->add_section(
		'legenki_color_section_topbar', array(
			'title'    => esc_html__( 'Top Bar', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_header', array(
			'title'    => esc_html__( 'Header', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_below_header', array(
			'title'    => esc_html__( 'Below Header', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_navigation', array(
			'title'    => esc_html__( 'Navigation', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_general', array(
			'title'    => esc_html__( 'General', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_blog', array(
			'title'    => esc_html__( 'Blog', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_woocommerce', array(
			'title'    => esc_html__( 'WooCommerce', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_color_section_footer', array(
			'title'    => esc_html__( 'Footer', 'legenki' ),
			'panel'    => 'legenki_panel_colors',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'legenki_kirki_section_color' );
