<?php
/**
 * Legenki functions.
 *
 * @package legenki
 */

/**
 * Assign the legenki version to a var
 */
$legenki_theme   = wp_get_theme( 'legenki' );
$legenki_version = $legenki_theme['Version'];

/**
 * Global Paths
 */
define( 'LEGENKI_CORE', get_template_directory() . '/inc/core' );

/**
 * Enqueue scripts and styles.
 */
function legenki_scripts() {

	wp_enqueue_style( 'legenki-normalize', get_template_directory_uri() . '/assets/css/base/normalize.css' );
	wp_enqueue_style( 'legenki-style', get_stylesheet_uri() );

	$legenki_general_speed_minify_main_css = '';
	$legenki_general_speed_minify_main_css = legenki_get_option( 'legenki_general_speed_minify_main_css' );

	if ( 'yes' === $legenki_general_speed_minify_main_css ) {
		wp_enqueue_style( 'legenki-main-min', get_template_directory_uri() . '/assets/css/main/main.css' );
	} else {
		wp_enqueue_style( 'legenki-main', get_template_directory_uri() . '/assets/css/main/main.css' );
	}

	wp_enqueue_script( 'legenki-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20161208', true );

}
add_action( 'wp_enqueue_scripts', 'legenki_scripts' );

/**
 * Enqueue theme styles within Gutenberg.
 */
function legenki_gutenberg_styles() {
	wp_enqueue_style( 'legenki-gutenberg', get_template_directory_uri() . '/assets/css/editor/gutenberg.css' );
}
add_action( 'enqueue_block_editor_assets', 'legenki_gutenberg_styles' );

/**
 * TGM Plugin Activation.
 */
require_once LEGENKI_CORE . '/functions/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'legenki_register_required_plugins' );

/**
 * Recommended plugins
 *
 * @package legenki
 */
function legenki_register_required_plugins() {
	$plugins = array(
		array(
			'name'     => esc_html__( 'Display Posts Shortcode', 'legenki' ),
			'slug'     => 'display-posts-shortcode',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Elementor', 'legenki' ),
			'slug'     => 'elementor',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'Kirki', 'legenki' ),
			'slug'     => 'kirki',
			'required' => true,
		),
		array(
			'name'     => esc_html__( 'Widget CSS Classes', 'legenki' ),
			'slug'     => 'widget-css-classes',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'WooCommerce', 'legenki' ),
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => esc_html__( 'YITH WooCommerce Wishlist', 'legenki' ),
			'slug'     => 'yith-woocommerce-wishlist',
			'required' => false,
		),
	);

	/**
	 * Array of configuration settings.
	 */
	$config = array(
		'domain'       => 'legenki',
		'default_path' => '',
		'parent_slug'  => 'themes.php',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'legenki' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'legenki' ),
			// translators: Installing Plugin text.
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'legenki' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'legenki' ),
			// translators: This theme requires the following plugin text.
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'legenki' ),
			// translators: This theme recommends the following plugin text.
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'legenki' ),
			// translators: Sorry, but you do not have the correct permissions text.
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'legenki' ),
			// translators: The following required plugin is currently inactive text.
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'legenki' ),
			// translators: The following recommended plugin is currently inactive text.
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'legenki' ),
			// translators: Sorry, but you do not have the correct permissions to activate text.
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'legenki' ),
			// translators: The following plugin needs to be updated to its latest version text.
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'legenki' ),
			// translators: Sorry, but you do not have the correct permissions text.
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'legenki' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'legenki' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'legenki' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'legenki' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'legenki' ),
			// translators: All plugins installed and activated text.
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'legenki' ),
			'nag_type'                        => 'updated',
		),
	);
	tgmpa( $plugins, $config );
}

/**
 * Post demo import menu assign.
 */
function legenki_after_demo_import_setup() {

	// Menus to import and assign.
	$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
		)
	);

	// Set options for front page and blog page.
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	esc_html_e( 'Success! Legenki Demo Content Imported!', 'legenki' );
}

add_action( 'pt-ocdi/after_import', 'legenki_after_demo_import_setup' );

/**
 * Timeout call.
 */
function legenki_change_time_of_single_ajax_call() {
	return 10;
}
add_action( 'pt-ocdi/time_for_one_ajax_call', 'legenki_change_time_of_single_ajax_call' );

/**
 * Disable generation of smaller images during demo data import.
 */
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

/**
 * Remove plugin branding.
 */
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

// Include the alternative webfonts loading method.
$legenki_fonts_path = wp_normalize_path( get_template_directory() . '/inc/class-kirki-modules-webfonts-link.php' );
if ( file_exists( $legenki_fonts_path ) && ! class_exists( 'Kirki_Modules_Webfonts_Link' ) ) {
	include_once $legenki_fonts_path;
}
if ( ! function_exists( 'legenki_change_fonts_load_method' ) ) {
	/**
	 * Changes the font-loading method.
	 *
	 * @param string $method The font-loading method (async|link).
	 */
	function legenki_change_fonts_load_method( $method ) {
		$legenki_webfonts_load_method = '';
		$legenki_webfonts_load_method = legenki_get_option( 'legenki_webfonts_load_method' );

		if ( 'link' === $legenki_webfonts_load_method ) {
			return 'link';
		}
		return $method;
	}
}
add_filter( 'kirki_googlefonts_load_method', 'legenki_change_fonts_load_method' );

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add fonts to the customizer.
 */
function legenki_custom_fonts( $standard_fonts ) {

	$legenki_custom_fonts = array();

	$legenki_custom_fonts['Roboto'] = array(
		'label'    => 'Roboto',
		'variants' => array( 'regular', '300', '700' ),
		'stack'    => 'Roboto, sans-serif',
	);

	return array_merge_recursive( $legenki_custom_fonts, $standard_fonts );

}
add_filter( 'kirki/fonts/standard_fonts', 'legenki_custom_fonts', 20 );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$legenki_content_width = 1270;
}

$legenki = (object) array(
	'version' => $legenki_version,
	'main'    => require get_parent_theme_file_path( 'inc/class-legenki.php' ),
);

require get_parent_theme_file_path( 'inc/legenki-functions.php' );
require get_parent_theme_file_path( 'inc/legenki-template-hooks.php' );
require get_parent_theme_file_path( 'inc/legenki-template-functions.php' );
require get_parent_theme_file_path( 'inc/class-walker-nav-menu-edit-custom.php' );
if ( legenki_is_woocommerce_activated() ) {
	$legenki->woocommerce = require get_parent_theme_file_path( 'inc/woocommerce/class-legenki-woocommerce.php' );
	require get_parent_theme_file_path( 'inc/woocommerce/legenki-woocommerce-template-hooks.php' );
	require get_parent_theme_file_path( 'inc/woocommerce/legenki-woocommerce-template-functions.php' );
}

/**
 * Theme Help page.
 */
require get_parent_theme_file_path( 'inc/setup/help.php' );

/**
* Delete Rest API.
 */
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

/**
 * Remove Emoji.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );
function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove RSD and WLW Manifes Links.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/**
 * Remove RSS.
 */
function delRSS() {
    wp_die('<p>RSS feeds are not available!</p>');
}
add_action('do_feed',      'delRSS', 1);
add_action('do_feed_rdf',  'delRSS', 1);
add_action('do_feed_rss',  'delRSS', 1);
add_action('do_feed_rss2', 'delRSS', 1);
add_action('do_feed_atom', 'delRSS', 1);


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_postcode']);
    return $fields;
}