<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package legenki
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">

			<div class="error-404 not-found">

				<div class="page-content">

					<header class="page-header">
						<h1 class="entry-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'legenki' ); ?></h1>
					</header><!-- .page-header -->

					<p><?php esc_html_e( 'Try searching, or check out the popular items below.', 'legenki' ); ?></p>

					<?php

					if ( legenki_is_woocommerce_activated() ) {

						echo '<section aria-label="' . esc_html__( 'Popular Products', 'legenki' ) . '">';

							echo legenki_do_shortcode(
								'best_selling_products', array(
									'per_page' => 8,
									'columns'  => 4,
								)
							);

						echo '</section>';
					}
					?>

				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
