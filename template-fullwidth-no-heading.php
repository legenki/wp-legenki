<?php
/**
 * The template for displaying full width pages without a heading.
 *
 * Template Name: Full width (no heading)
 *
 * @package legenki
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'legenki_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to legenki_page_after action
				 *
				 * @hooked legenki_display_comments - 10
				 */
				do_action( 'legenki_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
