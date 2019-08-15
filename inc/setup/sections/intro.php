<?php
/**
 * Getting started template
 *
 * @package Legenki
 * @subpackage legenki
 */

$customizer_url = admin_url() . 'customize.php';
?>

<div id="intro" class="ccfw-tab-pane active">

	<div class="primary-left">

	<div class="ccfw-tab-pane-center">

		<h1 class="ccfw-welcome-title"><?php esc_html_e( 'Welcome to Legenki', 'legenki' ); ?></h1>

		<h2>We built Legenki using best practices. We wanted a theme that was fast &mdash; really fast. We did a lot of research on eCommerce best practices and incorporated some advanced functionality not seen in any other theme with the primary goal of <strong>better conversions</strong>.</h2>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Legenki Theme Documentation', 'legenki' ); ?></h2>
		<p><?php esc_html_e( 'We provide lots of theme documentation articles including a detailed installation and setup guide on our website.', 'legenki' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'https://legenki.com' ); ?>" class="button button-primary"><?php esc_html_e( 'View Theme Documentation', 'legenki' ); ?></a></p>

		<hr />

		<h2 class="larger"><?php esc_html_e( 'Theme Options', 'legenki' ); ?></h2>
		<p><?php esc_html_e( 'The theme customizer enables you to modify many elements of the theme directly without any coding skills. This includes options such as uploading your logo, changing the primary color, and much more.', 'legenki' ); ?></p>
		<ul>
		<li><?php esc_html_e( 'To access the Customizer, go to', 'legenki' ); ?> <strong><?php esc_html_e( 'Appearance → Customize', 'legenki' ); ?></strong> <?php esc_html_e( 'in the WordPress admin menu.', 'legenki' ); ?></li>
		<li><?php esc_html_e( 'When you are finished making changes, click', 'legenki' ); ?> <strong><?php esc_html_e( 'Save & Publish', 'legenki' ); ?></strong> <?php esc_html_e( 'to save the settings. Check out your site to confirm your changes.', 'legenki' ); ?></li>
		</ul>

		<p><a target="_blank" href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Launch the Customizer', 'legenki' ); ?></a></p>

	</div>

	</div><!--/primary-left -->

	<div class="primary-right">

	<div class="theme-club-intro">
	<img src="<?php echo get_template_directory_uri() . '/inc/setup/images/screenshot.png'; ?>" alt="Legenki Screenshot" />
		<div class="theme-club-copy">
			<h2><?php esc_html_e( 'Legenki WooCommerce Theme', 'legenki' ); ?></h2>
			<p><?php esc_html_e( 'More information about Legenki including FAQs, guides and tutorials on optimizing your WooCommerce store.', 'legenki' ); ?></p>

		<a target="_blank" class="button-primary" href="<?php echo esc_url( 'https://legenki.com/' ); ?>"><?php esc_html_e( 'Legenki Information', 'legenki' ); ?></a>
		</div>
	</div>

	</div><!--/primary-right -->

	<div class="ccfw-clear"></div>

</div>
