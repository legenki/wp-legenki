<?php
/**
 * The template part for displaying a portfolio item within a grid.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package legenki
 */

?>

<article data-aos="fade-in" id="post-<?php the_ID(); ?>">
	<a class="portfolio-item" href="<?php the_permalink(); ?>">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
		?>
		<span class="portfolio-title-wrap">
			<span class="portfolio-title"><?php the_title(); ?></span>
			<span class="portfolio-description"><?php echo get_the_excerpt(); ?></span>
		</span>
	</a>
</article><!-- #post-## -->
