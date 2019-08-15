<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package legenki
 */

$legenki_layout_blog = '';
$legenki_layout_blog = legenki_get_option( 'legenki_layout_blog' );

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo legenki_safe_html( $legenki_layout_blog ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="entry-title" data-aos="fade-down">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php legenki_blog_categories(); ?>

			<div class="blog-post-wrapper">

			<?php
			get_template_part( 'loop' );

			else :

				get_template_part( 'content', 'none' );

				endif;
			?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
