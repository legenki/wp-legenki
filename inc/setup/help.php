<?php
/**
 * Theme onboarding and help.
 *
 * @package Legenki
 * @subpackage legenki
 */
class legenki_Help {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'legenki_help_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'legenki_help_activation_admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'legenki_help_assets' ) );

		add_action( 'legenki_help', array( $this, 'legenki_help_intro' ), 10 );
		add_action( 'legenki_help', array( $this, 'legenki_help_usefulplugins' ), 20 );
	}

	// End constructor.
	/**
	 * Redirect to Onboarding page upon theme switch/activation
	 */
	public function legenki_help_activation_admin_init() {
		global $pagenow;

		if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ) { // input var okay.
			add_action( 'admin_notices', array( $this, 'legenki_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @since 1.0.3
	 */
	public function legenki_welcome_admin_notice() {
		?>
		<div class="updated notice is-dismissible">
			<p><?php echo sprintf( esc_html__( 'Thanks for choosing Legenki! You can read hints and tips on how get the most out of your new theme in the %1$sHelp Centre%2$s.', 'legenki' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ccfw-help' ) ) . '">', '</a>' ); ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=ccfw-help' ) ); ?>" class="button" style="text-decoration: none;"><?php esc_html_e( 'Get started with Legenki', 'legenki' ); ?></a></p>
		</div>
		<?php
	}

	// Help assets.
	public function legenki_help_assets( $hook_suffix ) {
		global $legenki_version;

		if ( 'appearance_page_ccfw-help' === $hook_suffix ) {
			wp_enqueue_style( 'ccfw-help', get_template_directory_uri() . '/inc/setup/help.css', $legenki_version );
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'ccfw-help', get_template_directory_uri() . '/inc/setup/help.js', array( 'jquery' ), '1.0.0', true );
		}
	}

	// Quick Start menu.
	public function legenki_help_register_menu() {
		add_theme_page(
			__( 'legenki Help', 'legenki' ), __( 'Legenki Help', 'legenki' ), 'activate_plugins', 'ccfw-help', array( $this, 'legenki_help_screen' )
		);
	}

	/**
	 * The welcome screen
	 *
	 * @since 1.0.0
	 */
	public function legenki_help_screen() {
		?>
		<div class="ccfw-help container">

			<h1 class="ccfw-help-title"><?php esc_html_e( 'Legenki Help Centre', 'legenki' ); ?></h1>
			<h2 class="ccfw-help-desc"><?php esc_html_e( 'Everything you need to know to get the most out of Legenki.', 'legenki' ); ?></h2>
			<ul class="ccfw-nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#intro" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting Started', 'legenki' ); ?></a></li>
				<li role="presentation"><a href="#usefulplugins" aria-controls="usefulplugins" role="tab" data-toggle="tab"><?php esc_html_e( 'Useful Plugins', 'legenki' ); ?></a></li>
			</ul>

			<div class="ccfw-tab-content">
		<?php
		/**
		 *
		 * @hooked legenki_welcome_intro - 10
		 */
		do_action( 'legenki_help' );
		?>


			</div>
		</div>
		<?php
	}

	/**
	 * Help - plugin list.
	 */
	public function legenki_help_intro() {
		require_once get_template_directory() . '/inc/setup/sections/intro.php';
	}

	/**
	 * Help - plugin list.
	 */
	public function legenki_help_usefulplugins() {
		require_once get_template_directory() . '/inc/setup/sections/usefulplugins.php';
	}

}

$GLOBALS['legenki_help'] = new legenki_Help();
