<?php
/**
 * Template used to display post content.
 *
 * @package legenki
 */

?>

<article data-aos="fade-in" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to legenki_loop_post action.
	 *
	 * @hooked legenki_post_header          - 10
	 * @hooked legenki_post_meta            - 20
	 * @hooked legenki_post_content         - 30
	 */
	do_action( 'legenki_loop_post' );
	?>

</article><!-- #post-## -->
