<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package legenki
 */

?>

<div class="no-results not-found">
	<header class="page-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'legenki' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'legenki' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="no-results"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'legenki' ); ?></p>

		<?php else : ?>

			<p class="no-results"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'legenki' ); ?></p>

		<?php endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
