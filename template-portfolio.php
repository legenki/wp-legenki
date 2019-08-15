<?php
/**
 * The template for displaying your portfolio.
 *
 * Template Name: Portfolio Landing
 *
 * @package legenki
 */

get_header();

do_action( 'legenki_portfolio_start' );
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div class="portfolio">
			<?php
			if ( get_query_var( 'paged' ) ) :
				$paged = get_query_var( 'paged' );
				elseif ( get_query_var( 'page' ) ) :
					$paged = get_query_var( 'page' );
				else :
					$paged = -1;
				endif;

				$legenki_portfolio_args = array(
					'post_type' => 'jetpack-portfolio',
					'paged'     => $paged,
				);

				$legenki_portfolio_query = new WP_Query( $legenki_portfolio_args );

				if ( post_type_exists( 'jetpack-portfolio' ) && $legenki_portfolio_query->have_posts() ) :
					while ( $legenki_portfolio_query->have_posts() ) :
						$legenki_portfolio_query->the_post();

						get_template_part( 'content', 'portfolio' );

					endwhile;
					wp_reset_postdata();
				else :
					?>
					<p>You have no portfolio items.</p>
			<?php endif; ?>
		</div><!-- #portfolio -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
