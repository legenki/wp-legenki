<?php
/**
 * Template used to display post content on single pages.
 *
 * @package legenki
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'legenki_single_portfolio' );
	?>

</div><!-- #post-## -->
