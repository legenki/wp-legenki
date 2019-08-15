<?php
/**
 *
 * Kirki layout section
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_section_layout( $wp_customize ) {

	$wp_customize->add_section(
		'legenki_layout_section_blog', array(
			'title'    => esc_html__( 'Blog', 'legenki' ),
			'panel'    => 'legenki_panel_layout',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_layout_section_woocommerce', array(
			'title'       => esc_html__( 'WooCommerce', 'legenki' ),
			'description' => esc_html__( 'Publish and refresh to see the changes.', 'legenki' ),
			'panel'       => 'legenki_panel_layout',
			'priority'    => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_layout_section_progress', array(
			'title'    => esc_html__( 'Progress Bar Text', 'legenki' ),
			'panel'    => 'legenki_panel_layout',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_layout_section_sidebars', array(
			'title'    => esc_html__( 'Sidebars', 'legenki' ),
			'panel'    => 'legenki_panel_layout',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_layout_section_footer', array(
			'title'    => esc_html__( 'Footer', 'legenki' ),
			'panel'    => 'legenki_panel_layout',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'legenki_kirki_section_layout' );
