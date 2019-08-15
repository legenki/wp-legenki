<?php
/**
 *
 * Kirki menu section
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_section_mainmenu( $wp_customize ) {

	// Top Bar.
	$wp_customize->add_section(
		'legenki_header_section_top_bar', array(
			'title'    => esc_html__( 'Top Bar', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Site Logo.
	$wp_customize->add_section(
		'legenki_section_general_logo', array(
			'title'    => esc_html__( 'Site Logo', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Header Layout.
	$wp_customize->add_section(
		'legenki_header_section_layout', array(
			'title'    => esc_html__( 'Header', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Navigation Layout.
	$wp_customize->add_section(
		'legenki_navigation_section_layout', array(
			'title'    => esc_html__( 'Navigation Fonts', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Navigation Fonts.
	$wp_customize->add_section(
		'legenki_navigation_section_position', array(
			'title'    => esc_html__( 'Navigation Layout', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Site Tools.
	$wp_customize->add_section(
		'legenki_site_tools_section', array(
			'title'    => esc_html__( 'Site Tools', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Mobile Header.
	$wp_customize->add_section(
		'legenki_section_general_mobile_header', array(
			'title'    => esc_html__( 'Mobile Header', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);

	// Responsive Breakpoint.
	$wp_customize->add_section(
		'legenki_mainmenu_section_responsive_breakpoint', array(
			'title'    => esc_html__( 'Responsive Breakpoint', 'legenki' ),
			'panel'    => 'legenki_panel_mainmenu',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'legenki_kirki_section_mainmenu' );
