<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package legenki
 */

?><!doctype html>
<html <?php language_attributes(); ?> class="js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed main-wrap site">
	<div class="canvas-overlay"></div><!--/canvas -->

	<?php
	do_action( 'legenki_before_site' );
	do_action( 'legenki_before_header' );
	?>

	<div class="row topbar-wrapper">
		<?php
		do_action( 'legenki_topbar' );
		?>
	</div>

	<header id="masthead">
		<div id="header" class="site-header">
			<div class="row">
				<div class="main-header">

					<?php
					/**
					 * Functions hooked into legenki_header action
					 *
					 * @hooked legenki_site_branding                      - 20
					 */
					do_action( 'legenki_header' );
					?>

				</div>
				<div class="navigation-wrapper">

					<?php
					/**
					 * Functions hooked into legenki_navigation action
					 *
					 * @hooked legenki_primary_navigation_wrapper         - 42
					 * @hooked legenki_primary_navigation                 - 50
					 * @hooked legenki_header_cart                        - 60
					 * @hooked legenki_primary_navigation_wrapper_close   - 68
					 */
					do_action( 'legenki_navigation' );
					?>

				</div>
				<div class="navigation-tools">
					<ul>
					<?php
					/**
					 * Functions hooked into legenki_tools action
					 *
					 * @hooked legenki_tools_wishlist_item                - 10
					 * @hooked legenki_tools_account_item                 - 20
					 * @hooked legenki_tools_cart_item                    - 30
					 * @hooked legenki_tools_search_item                  - 40
					 */
					do_action( 'legenki_tools' );
					?>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to legenki_before_content
	 */
	do_action( 'legenki_before_content' );
	?>

	<div class="main-wrapper">
	<div id="content" class="site-content" tabindex="-1">
		<div class="legenki-archive">
		<div class="archive-header">
			<div class="row">
				<?php
				/**
				 * Functions hooked in to legenki_content_top
				 *
				 * @hooked woocommerce_breadcrumb - 10
				 */
				do_action( 'legenki_content_top' );
				?>
			</div>
		</div>
		<div class="row">
