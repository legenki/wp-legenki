<?php
/**
 * Getting started template
 *
 * @package Legenki
 * @subpackage legenki
 */

$customizer_url = admin_url() . 'customize.php';
?>

<div id="usefulplugins" class="ccfw-tab-pane">

	<div class="ccfw-tab-pane-center">

		<h1 class="ccfw-welcome-title"><?php esc_html_e( 'Useful Plugins', 'legenki' ); ?></h1>
		<h2><?php esc_html_e( 'Enhance your store with these useful plugins for Legenki. Just search the "Plugins" section of WordPress for the name, then install and activate. You will need to consult the individual plugin documentation of each for setup instructions.', 'legenki' ); ?></h2>
		<br/>
		<table class="useful-table">

			<tbody>
				<tr>
					<td class="image">
						<img width="100" alt="Autoptimize" src="<?php echo get_template_directory_uri() . '/inc/setup/images/autoptimize.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'Autoptimize', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'Optimizes your website, concatenating the CSS and JavaScript code, and compressing it.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/autoptimize/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="Contact Form 7" src="<?php echo get_template_directory_uri() . '/inc/setup/images/cf7.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'Contact Form 7', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'A lightweight form plugin which allows you to capture data easily.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="Jetpack" src="<?php echo get_template_directory_uri() . '/inc/setup/images/jetpack.svg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'Jetpack', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'The popular plugin from Automattic has some useful features worth enabling, including lazy load and an images CDN for quicker page loading times.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/jetpack/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="MailChimp for WordPress" src="<?php echo get_template_directory_uri() . '/inc/setup/images/mailchimp.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'MailChimp for WordPress', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'Allows visitors to subscribe to your newsletters easily. Requires a free MailChimp account.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/mailchimp-for-wp/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="WooCommerce Product Tabs" src="<?php echo get_template_directory_uri() . '/inc/setup/images/tabs.svg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'WooCommerce Product Tabs', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'Helps you add your own custom tabs to the product page in WooCommerce.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce-product-tabs/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="Variation Swatches for WooCommerce" src="<?php echo get_template_directory_uri() . '/inc/setup/images/swatches.png'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'Variation Swatches for WooCommerce', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'A much nicer way to display variations of variable products. This plugin will help you select a style for each attribute as a color, image or label.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/variation-swatches-for-woocommerce/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="YITH WooCommerce Ajax Product Filter" src="<?php echo get_template_directory_uri() . '/inc/setup/images/yithfilter.jpg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'YITH WooCommerce Ajax Product Filter', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'Choose among color, label, list, and dropdown and the filters will display those specific products immediately on the listings page.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/yith-woocommerce-ajax-navigation/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>
				<tr>
					<td class="image">
						<img width="100" alt="YITH WooCommerce Waiting List" src="<?php echo get_template_directory_uri() . '/inc/setup/images/yithwaiting.jpg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">
					</td>
					<td>
						<h3><?php esc_html_e( 'YITH WooCommerce Waiting List', 'legenki' ); ?></h3>
						<p><?php esc_html_e( 'Allow users to request an email notification when an out-of-stock product comes back into stock.', 'legenki' ); ?></p>
					</td>
					<td class="link">
						<a class="button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/plugins/yith-woocommerce-waiting-list/' ); ?>"><?php esc_html_e( 'More information', 'legenki' ); ?></a>
					</td>
				</tr>

				</tbody>

				</table>

	</div>

	<div class="ccfw-clear"></div>

</div>
