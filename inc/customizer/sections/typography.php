<?php
/**
 *
 * Kirki typography section
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_section_typography( $wp_customize ) {

	// Main Body.
	$wp_customize->add_section(
		'legenki_typography_section_mainbody', array(
			'title'    => esc_html__( 'Main Body', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Secondary.
	$wp_customize->add_section(
		'legenki_typography_section_secondary', array(
			'title'    => esc_html__( 'Secondary Font', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Paragraphs.
	$wp_customize->add_section(
		'legenki_typography_section_p', array(
			'title'    => esc_html__( 'Paragraphs', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Heading One.
	$wp_customize->add_section(
		'legenki_typography_section_headings_h1', array(
			'title'    => esc_html__( 'Heading One', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Two.
	$wp_customize->add_section(
		'legenki_typography_section_headings_h2', array(
			'title'    => esc_html__( 'Heading Two', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Three.
	$wp_customize->add_section(
		'legenki_typography_section_headings_h3', array(
			'title'    => esc_html__( 'Heading Three', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Four.
	$wp_customize->add_section(
		'legenki_typography_section_headings_h4', array(
			'title'    => esc_html__( 'Heading Four', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Heading Five.
	$wp_customize->add_section(
		'legenki_typography_section_headings_h5', array(
			'title'    => esc_html__( 'Heading Five', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Blockquote.
	$wp_customize->add_section(
		'legenki_typography_section_blockquote', array(
			'title'    => esc_html__( 'Blockquotes', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Widget Title.
	$wp_customize->add_section(
		'legenki_typography_section_headings_widget_title', array(
			'title'    => esc_html__( 'Widget Titles', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// Blog.
	$wp_customize->add_section(
		'legenki_typography_section_blog', array(
			'title'    => esc_html__( 'Blog', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

	// WooCommerce.
	$wp_customize->add_section(
		'legenki_typography_section_woocommerce', array(
			'title'    => esc_html__( 'WooCommerce', 'legenki' ),
			'panel'    => 'legenki_panel_typography',
			'priority' => 10,
		)
	);

}

add_action( 'customize_register', 'legenki_kirki_section_typography' );
