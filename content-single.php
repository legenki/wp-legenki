<?php
/**
 * Template used to display post content on single pages.
 *
 * @package legenki
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'legenki_single_post_top' );

	/**
	 * Functions hooked into legenki_single_post add_action
	 *
	 * @hooked legenki_post_header          - 10
	 * @hooked legenki_post_meta            - 20
	 * @hooked legenki_post_content         - 30
	 */
	do_action( 'legenki_single_post' );

	/**
	 * Functions hooked in to legenki_single_post_bottom action
	 *
	 * @hooked legenki_post_nav         - 10
	 * @hooked legenki_display_comments - 20
	 */
	do_action( 'legenki_single_post_bottom' );
	?>

</div><!-- #post-## -->
