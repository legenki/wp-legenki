<?php
/**
 *
 * Kirki options panels
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_panels( $wp_customize ) {

	$wp_customize->add_panel(
		'legenki_panel_general', array(
			'priority'    => 10,
			'title'       => esc_html__( 'General', 'legenki' ),
			'description' => esc_html__( 'Manage general theme settings', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_colors', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Colors', 'legenki' ),
			'description' => esc_html__( 'Manage theme colors', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_mainmenu', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Header and Navigation', 'legenki' ),
			'description' => esc_html__( 'Manage the header and navigation', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_heading', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Page Heading', 'legenki' ),
			'description' => esc_html__( 'Manage the page heading', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_typography', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Typography', 'legenki' ),
			'description' => esc_html__( 'Manage theme typography', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_layout', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Layout', 'legenki' ),
			'description' => esc_html__( 'Manage theme header, footer and more', 'legenki' ),
		)
	);
	$wp_customize->add_panel(
		'legenki_panel_blog', array(
			'priority'    => 10,
			'title'       => esc_html__( 'Blog', 'legenki' ),
			'description' => esc_html__( 'Manage blog settings', 'legenki' ),
		)
	);
}

add_action( 'customize_register', 'legenki_kirki_panels' );
