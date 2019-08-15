<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package legenki
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to legenki_page add_action
	 *
	 * @hooked legenki_page_header          - 10
	 * @hooked legenki_page_content         - 20
	 */
	do_action( 'legenki_page' );
	?>
</div><!-- #post-## -->
