<?php
/**
 * The template for displaying a single portfolio post.
 *
 * @package legenki
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			/**
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', 'single-portfolio' );

		endwhile;

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
