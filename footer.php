<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package legenki
 */

?>
</div>
	</div>	
	</div><!-- #content -->


	<?php do_action( 'legenki_before_footer' ); ?>

			<?php
			/**
			 * Functions hooked in to legenki_footer action
			 */
			do_action( 'legenki_footer' );
			?>

	<?php do_action( 'legenki_after_footer' ); ?>

</div>
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
