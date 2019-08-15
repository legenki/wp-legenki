<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package legenki
 */

$legenki_layout_blog = '';
$legenki_layout_blog = legenki_get_option( 'legenki_layout_blog' );

if ( isset( $_GET['blog-layout'] ) ) {
	$legenki_layout_blog = $_GET['blog-layout'];
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main <?php echo legenki_safe_html( $legenki_layout_blog ); ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				if ( is_home() && get_option( 'page_for_posts' ) ) {
					$legenki_blog_page_title = get_option( 'page_for_posts' );
					echo '<h1 class="entry-title" data-aos="fade-down">' . get_page( $legenki_blog_page_title )->post_title . '</h1>';
				} else {
					?>
					<h1 class="entry-title" data-aos="fade-down"><?php echo esc_html__( 'Blog', 'legenki' ); ?></h1>
					<?php
				}
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
