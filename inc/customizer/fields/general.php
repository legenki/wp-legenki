<?php
/**
 *
 * General theme options
 *
 * @package Legenki
 * @subpackage legenki
 */

// General fields.
$legenki_default_options = legenki_get_option_defaults();

// Header Logo Height.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'slider',
		'settings'    => 'legenki_logo_height',
		'label'       => esc_html__( 'Logo Height', 'legenki' ),
		'description' => esc_html__( 'Adjust the height of your logo in pixels. You can upload your logo image within the "Site Identity" panel.', 'legenki' ),
		'section'     => 'legenki_section_general_logo',
		'default'     => 38,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => '.site-header .custom-logo-link img',
				'property' => 'height',
				'units'    => 'px',
			),
		),
	)
);

// Mobile Header Height.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'        => 'slider',
		'settings'    => 'legenki_mobile_header_height',
		'label'       => esc_html__( 'Mobile Header Height', 'legenki' ),
		'description' => esc_html__( 'Adjust the height of your mobile header in pixels.', 'legenki' ),
		'section'     => 'legenki_section_general_mobile_header',
		'default'     => 70,
		'priority'    => 1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'     => '.site-header',
				'property'    => 'height',
				'units'       => 'px',
				'media_query' => '@media (max-width: 1024px)',
			),
		),
	)
);

// Minification Settings.
legenki_Kirki::add_field(
	'legenkir_config', array(
		'type'     => 'custom',
		'settings' => 'legenki_general_speed_heading_2',
		'section'  => 'legenki_section_general_speed_settings',
		'default'  => '<div class="kirki-separator" style="margin: 10px -12px; padding: 12px 12px; color: #444; text-transform: uppercase;
	letter-spacing: 1px; border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; background-color: #fff; cursor: default;">' . esc_html__( 'Minification Settings', 'legenki' ) . '</div>',
		'priority' => 10,
	)
);


// Main CSS Minified.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'select',
		'settings' => 'legenki_general_speed_minify_main_css',
		'label'    => esc_attr__( 'Minify Main CSS?', 'legenki' ),
		'section'  => 'legenki_section_general_speed_settings',
		'default'  => 'no',
		'choices'  => array(
			'yes' => esc_attr__( 'Yes', 'legenki' ),
			'no'  => esc_attr__( 'No', 'legenki' ),
		),
		'priority' => 10,
	)
);


// CSS Link Settings.
legenki_Kirki::add_field(
	'legenki_config', array(
		'type'     => 'select',
		'settings' => 'legenki_webfonts_load_method',
		'label'    => esc_attr__( 'CSS Linking Method', 'legenki' ),
		'section'  => 'legenki_section_general_speed_settings',
		'default'  => 'no',
		'choices'  => array(
			'link'  => esc_attr__( 'link', 'legenki' ),
			'async' => esc_attr__( 'async', 'legenki' ),
		),
		'priority' => 10,
	)
);
