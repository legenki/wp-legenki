<?php
/**
 *
 * Kirki general section
 *
 * @package Legenki
 * @subpackage legenki
 */
function legenki_kirki_section_general( $wp_customize ) {

	$wp_customize->add_section(
		'legenki_section_general_sticky_logo', array(
			'title'    => esc_html__( 'Sticky Logo', 'legenki' ),
			'panel'    => 'legenki_panel_general',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'legenki_section_general_speed_settings', array(
			'title'    => esc_html__( 'Speed Settings', 'legenki' ),
			'panel'    => 'legenki_panel_general',
			'priority' => 10,
		)
	);
}

add_action( 'customize_register', 'legenki_kirki_section_general' );
