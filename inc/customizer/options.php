<?php
/**
 *
 * Some wrappers for theme mods/options and their defaults
 *
 * @package Legenki
 * @subpackage legenki
 */

// Set sensible defaults.
require_once get_template_directory() . '/inc/customizer/defaults.php';

if ( ! function_exists( 'legenki_get_option' ) ) {
	/**
	 * Main function used to call them options
	 *
	 * @param int $key The theme option argument.
	 */
	function legenki_get_option( $key ) {
		$legenki_options = legenki_get_options();
		$legenki_option  = get_theme_mod( $key, $legenki_options[ $key ] );
		return $legenki_option;
	}
}

if ( ! function_exists( 'legenki_get_options' ) ) {

	/**
	 * Get theme option defaults
	 */
	function legenki_get_options() {
		return wp_parse_args(
			get_theme_mods(), legenki_get_option_defaults()
		);
	}
}
