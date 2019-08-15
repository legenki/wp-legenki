<?php
/**
 * Legenki template functions.
 *
 * @package legenki
 */

/**
 * Allow shortcodes within the menu.
 */
add_filter( 'wp_nav_menu', 'legenki_menu_enable_shortcode', 20, 2 );


/**
 * Returns a shortcode for the menu.
 *
 * @param array $menu the menu output.
 * @param int   $args menu args.
 */
function legenki_menu_enable_shortcode( $menu, $args ) {
	return do_shortcode( $menu );
}

/**
 * Primary Menu Custom Walker - add a wrapper div.
 */
class Legenki_Submenuwrap extends Walker_Nav_Menu {

	/**
	 * Start outer output
	 *
	 * @param array $output the menu output.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='sub-menu-wrapper'><div class='container'><ul class='sub-menu'>\n";
	}
	/**
	 * End outer output
	 *
	 * @param array $output the menu output.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div></div>\n";
	}
	/**
	 * Start output
	 *
	 * @param array $output the menu output.
	 * @param array $item the menu item.
	 * @param int   $depth the menu depth.
	 * @param int   $args menu args.
	 * @param int   $id the menu args.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );

		// Passed Classes.
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'legenki_nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// Build HTML.
		$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '" class="' . $class_names . '">';

		// If 'menu-item-product' exists in classes, don't add the HTML anchor tag.
		if ( in_array( 'menu-item-product', $classes ) ) {
			$item_output = apply_filters( 'legenki_nav_the_title', $item->title, $item->ID );
		} else {

			// Link attributes.
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

			$item_output = sprintf(
				'%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'legenki_the_title', $item->title, $item->ID ),
				$args->link_after,
				'<span class="sub">' . $item->markup . '</span>',
				$args->after
			);

		}

		// Build HTML.
		$output .= apply_filters( 'legenki_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}


/**
 * Adds a plus icon for the mobile menu.
 *
 * @param array $output the mobile menu output.
 * @param array $item the mobile menu item.
 * @param int   $depth the mobile menu depth.
 * @param int   $args the mobile menu args.
 * @since 1.0.0
 */
function legenki_mobile_menu_plus( $output, $item, $depth, $args ) {

	if ( 'primary' === $args->theme_location && $depth === 0 ) {
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$output .= '<span class="caret"></span>';
		}
	}
	return $output;
}

add_filter( 'legenki_walker_nav_menu_start_el', 'legenki_mobile_menu_plus', 10, 4 );


add_action( 'template_redirect', 'legenki_remove_title', 10 );
/**
 * Page template without title and breadcrumbs
 */
function legenki_remove_title() {
	if ( is_page_template( 'template-fullwidth-no-heading.php' ) ) {
		remove_action( 'legenki_content_top', 'woocommerce_breadcrumb', 10 );
	}
}

add_action( 'legenki_loop_post', 'legenki_loop_wrapper_start', 8 );
add_action( 'legenki_loop_post', 'legenki_loop_wrapper_end', 35 );

/**
 * Blog loop. Add wrapper class start.
 */
function legenki_loop_wrapper_start() {
	echo '<div class="blog-loop-content-wrapper">';
}


/**
 * Blog loop. Add wrapper class end.
 */
function legenki_loop_wrapper_end() {
	echo '</div>';
}


/**
 * Blog Archives - Display Categories.
 */
function legenki_blog_categories() {
	$legenki_layout_blog_categories_display = '';
	$legenki_layout_blog_categories_display = legenki_get_option( 'legenki_layout_blog_categories_display' );

	if ( true === $legenki_layout_blog_categories_display ) {
		echo '<div class="header-categories">';
		the_widget( 'WP_Widget_Categories', 'title= ' );
		echo '</div>';
	}
}

add_action( 'wp_enqueue_scripts', 'legenki_dequeue_dashicons' );
/**
 * Remove dashicons on frontend for unauthenticated users.
 */
function legenki_dequeue_dashicons() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}

/**
 * Add a responsive container to embeds.
 *
 * @param text $html adds a wrapping div around videos for a better responsive display.
 */
function legenki_embed_html( $html ) {
	return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'legenki_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'legenki_embed_html' ); // Jetpack.


/**
 * Excludes some classes from Jetpack's lazy load.
 *
 * @param strings $blacklisted_classes class names to exclude.
 */
function legenki_lazy_exclude( $blacklisted_classes ) {
	$blacklisted_classes = array(
		'skip-lazy',
		'wp-post-image',
		'post-image',
		'custom-logo',
	);
	return $blacklisted_classes;

}
add_filter( 'jetpack_lazy_images_blacklisted_classes', 'legenki_lazy_exclude' );


/**
 * Disable Jetpack's Related Posts on Products.
 *
 * @param boolean $options true or false.
 */
function legenki_exclude_jetpack_related_from_products( $options ) {
	if ( is_product() ) {
		$options['enabled'] = false;
	}

	return $options;
}

add_filter( 'jetpack_relatedposts_filter_options', 'legenki_exclude_jetpack_related_from_products' );


/**
 * Disable Jetpack's Related Posts on the Portfolio.
 *
 * @param boolean $options true or false.
 */
function legenki_exclude_jetpack_related_from_portfolio( $options ) {
	if ( is_singular( 'jetpack-portfolio' ) ) {
		$options['enabled'] = false;
	}
	return $options;
}
add_filter( 'jetpack_relatedposts_filter_options', 'legenki_exclude_jetpack_related_from_portfolio' );

/**
 * Adds a body class if the breadcrumbs have been disabled.
 *
 * @param string $classes body class to add.
 */
function legenki_breadcrumbs_body_class( $classes ) {

	$legenki_woocommerce_display_breadcrumbs = '';
	$legenki_woocommerce_display_breadcrumbs = legenki_get_option( 'legenki_woocommerce_display_breadcrumbs' );

	if ( 'disable' === $legenki_woocommerce_display_breadcrumbs ) {
		$classes[] = 'no-breadcrumbs';
	}
	return $classes;
}

add_filter( 'body_class', 'legenki_breadcrumbs_body_class' );


if ( ! function_exists( 'legenki_display_comments' ) ) {
	/**
	 * Legenki display comments.
	 *
	 * @since  1.0.0
	 */
	function legenki_display_comments() {
		if ( comments_open() || '0' !== get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'legenki_comment' ) ) {
	/**
	 * Legenki comments template.
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.0
	 */
	function legenki_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>		
			</div>
			<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'legenki' ); ?></em>
				<br />
			<?php endif; ?>	
		</div>
		<?php if ( 'div' !== $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-content">

		<?php endif; ?>
		<div class="comment_meta">
		<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'legenki' ), get_comment_author_link() ); ?>
		<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
				<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . '</time>'; ?>
		</a>
		</div>
		<div class="comment-text">

		<?php comment_text(); ?>
		</div>
		<div class="reply">
		<?php
		comment_reply_link(
			array_merge(
				$args, array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				)
			)
		);
		?>
		<?php edit_comment_link( __( 'Edit', 'legenki' ), '  ', '' ); ?>
		</div>
		</div>
		<?php if ( 'div' !== $args['style'] ) : ?>
		</div>
		<?php endif; ?>
		<?php
	}
}

/**
 * Display below content background image
 */
function legenki_below_content_image_banner() {

	global $post;

	$legenki_below_content_image = '';
	$legenki_below_content_image = legenki_get_option( 'legenki_below_content_image' );

	if ( $legenki_below_content_image ) {

		$legenki_below_content_image_css  = '';
		$legenki_below_content_image_css .= "
            .below-content {
                background-image: url( {$legenki_below_content_image} );
            }
    	";
		wp_add_inline_style( 'legenki-style', $legenki_below_content_image_css );
	}

}
add_action( 'wp_enqueue_scripts', 'legenki_below_content_image_banner' );


if ( ! function_exists( 'legenki_below_content' ) ) {
	/**
	 * Display before footer region
	 */
	function legenki_below_content() {

			$legenki_below_content_display = '';
			$legenki_below_content_display = legenki_get_option( 'legenki_below_content_display' );

			$legenki_below_content_title = '';
			$legenki_below_content_title = legenki_get_option( 'legenki_below_content_title' );
			$legenki_below_content_text  = '';
			$legenki_below_content_text  = legenki_get_option( 'legenki_below_content_text' );

		?>
			<?php if ( 'show' === $legenki_below_content_display ) { ?>
				<?php if ( ! is_page() ) { ?>
					<div class="below-content" data-aos="fade-in">
						<div class="row">
							<div class="widget">
								<h2><?php echo legenki_safe_html( $legenki_below_content_title ); ?></h2>
								<p><?php echo legenki_safe_html( $legenki_below_content_text ); ?></p>
							</div>
						</div>
					</div>
					<?php
}
}
?>
	
			<?php
	}
}

if ( ! function_exists( 'legenki_below_header_widgets' ) ) {
	/**
	 * Display below header widgets
	 *
	 * @since  1.0.0
	 */
	function legenki_below_header_widgets() {
		if ( is_active_sidebar( 'below-header' ) ) {

			$legenki_below_header_display = '';
			$legenki_below_header_display = legenki_get_option( 'legenki_layout_below_header_display' );

			?>
			<?php
			if ( 'enable' === $legenki_below_header_display ) {
				if ( ! is_page_template( 'template-fullwidth-transparent.php' ) ) {

					?>
		<div class="header-widget-region">
			<div class="row widget-area">
					<?php dynamic_sidebar( 'below-header' ); ?>
			</div>
		</div>
					<?php
				}
			}
			?>
		
			<?php
		}
	}
}

if ( ! function_exists( 'legenki_footer_widgets' ) ) {
	/**
	 * Display footer widgets
	 *
	 * @since  1.0.0
	 */
	function legenki_footer_widgets() {
		if ( is_active_sidebar( 'footer' ) ) {

			$legenki_footer_display = '';
			$legenki_footer_display = legenki_get_option( 'legenki_footer_display' );

			?>
			<?php if ( 'show' === $legenki_footer_display ) { ?>
		<footer class="site-footer">
			<div class="row widget-area">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</footer>
		<?php } ?>	
			<?php
		}
	}
}

if ( ! function_exists( 'legenki_footer_copyright' ) ) {
	/**
	 * Display footer copyright
	 *
	 * @since  1.0.0
	 */
	function legenki_footer_copyright() {
		if ( is_active_sidebar( 'copyright' ) ) {

			$legenki_copyright_display = '';
			$legenki_copyright_display = legenki_get_option( 'legenki_copyright_display' );

			?>
			<?php if ( 'show' === $legenki_copyright_display ) { ?>
		<footer class="copyright">
			<div class="row widget-area">
				<?php dynamic_sidebar( 'copyright' ); ?>
			</div>
		</footer>
		<?php } ?>	
			<?php
		}
	}
}

if ( ! function_exists( 'legenki_footer_backtotop' ) ) {
	/**
	 * Display backtotop
	 *
	 * @since  1.0.0
	 */
	function legenki_footer_backtotop() {

			$legenki_backtotop_display = '';
			$legenki_backtotop_display = legenki_get_option( 'legenki_backtotop_display' );

		?>
			<?php if ( 'show' === $legenki_backtotop_display ) { ?>
				<a href="#0" class="cd-top js-cd-top cd-top--show cd-top--fade-out"><div class="chevron-icon"></div></a>
		<?php } ?>	
			<?php

	}
}

if ( ! function_exists( 'legenki_animate_library' ) ) {
	/**
	 * Load aos animate library
	 *
	 * @since  1.0.0
	 */
	function legenki_animate_library() {

		wp_enqueue_script( '', get_template_directory_uri() . '/assets/js/aos.js', array(), '20130115', true );
		?>
		<?php
	}
}

if ( ! function_exists( 'legenki_top_bar' ) ) {
	/**
	 * Top bar
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_top_bar() {
		$legenki_layout_top_bar_display = '';
		$legenki_layout_top_bar_display = legenki_get_option( 'legenki_layout_top_bar_display' );
		?>

		<?php if ( 'enable' === $legenki_layout_top_bar_display ) { ?>
		<div class="top-bar widget-area">
			<div class="top-bar-left"><?php dynamic_sidebar( 'top-bar-left' ); ?></div>
			<div class="top-bar-center"><?php dynamic_sidebar( 'top-bar-center' ); ?></div>
			<div class="top-bar-right"><?php dynamic_sidebar( 'top-bar-right' ); ?></div>
		</div>
		<?php } ?>	
		<?php
	}
}

if ( ! function_exists( 'legenki_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_site_branding() {
		?>
		<div class="site-branding">
			<button class="menu-toggle" aria-label="Menu" aria-controls="site-navigation" aria-expanded="false">
				<span class="bar"></span><span class="bar"></span><span class="bar"></span>
			</button>
			<?php legenki_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'legenki_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 1.0.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function legenki_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_front_page() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' );
			$logo_id = $logo_id ? $logo_id : $logo['id'];
			$size    = site_logo()->theme_size();
			$html    = sprintf(
				'<a href="%1$s" class="site-logo-link" rel="home">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
					)
				)
			);

			$html = apply_filters( 'legenki_jetpack_the_site_logo', $html, $logo, $size );
		} else {
			$tag = is_front_page() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo legenki_safe_html( $html );
	}
}

if ( ! function_exists( 'legenki_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'legenki' ); ?>">
			<div class="primary-navigation">	
			<?php

			if ( has_nav_menu( 'primary' ) ) {
				?>
			<div class="menu-primary-menu-container">
				<?php
				wp_nav_menu(
					array(
						'container'      => '',
						'theme_location' => 'primary',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'walker'         => new Legenki_Submenuwrap(),
					)
				);
				?>
			</div>
				<?php
			} else {
				?>
							
			<div class="menu-primary-menu-container">
				<ul id="menu-primary-menu" class="menu">
				<?php
					wp_list_pages(
						array(
							'container'   => '',
							'title_li'    => '',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						)
					);
				?>
				</ul>
			</div>			
		<?php } ?>	

		</div>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'legenki_primary_navigation_widget' ) ) {
	/**
	 * Display Navigation widget on mobile only.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_primary_navigation_widget() {

		?>
			<div class="widget-area"><?php dynamic_sidebar( 'mobile-navigation' ); ?></div>
			<?php

	}
}

if ( ! function_exists( 'legenki_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_skip_links() {
		?>
		<a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e( 'Skip to navigation', 'legenki' ); ?></a>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e( 'Skip to content', 'legenki' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'legenki_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function legenki_page_header() {
		?>

		<?php if ( ! is_page_template( array( 'template-fullwidth-no-heading.php', 'template-fullwidth-transparent.php' ) ) ) { ?>

		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
				<?php } ?>
		<?php
	}
}

if ( ! function_exists( 'legenki_portfolio_header' ) ) {
	/**
	 * Display the portfolio header
	 *
	 * @since 1.0.0
	 */
	function legenki_portfolio_header() {
		global $post;
		?>
		<?php
		if ( has_post_thumbnail() ) {
			$legenki_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', true );
		}
		?>
		<header class="entry-header with-bg-image" style="background-image:url(<?php echo legenki_safe_html( $legenki_bg_image[0] ); ?>">
			<div class="portfolio-header-content">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
			<?php
			if ( has_excerpt( $post->ID ) ) {
				?>
				<span><?php echo get_the_excerpt(); ?></span>
				<?php
			}
			?>
			</div>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'legenki_prev_next' ) ) {
	/**
	 * Display the portfolio prev/next
	 *
	 * @since 1.0.0
	 */
	function legenki_prev_next() {
		?>
		<div class="legenki-portfolio-pagination">
			<div class="row">
			<?php
			$prev_post = get_previous_post();
			if ( $prev_post ) {
				$prev_title = strip_tags( str_replace( '"', '', $prev_post->post_title ) );
				echo legenki_safe_html( "\t" . '<a rel="prev" href="' . get_permalink( $prev_post->ID ) . '" class="prev">' . $prev_title . '</a>' . "\n" );
			}

			$next_post = get_next_post();
			if ( $next_post ) {
				$next_title = strip_tags( str_replace( '"', '', $next_post->post_title ) );
				echo legenki_safe_html( "\t" . '<a rel="next" href="' . get_permalink( $next_post->ID ) . '" class="next">' . $next_title . '</a>' . "\n" );
			}
			?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'legenki_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function legenki_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'legenki' ),
						'after'  => '</div>',
					)
				);
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'legenki_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function legenki_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1>', '</h1>' );
			legenki_author();
			legenki_posted_on();

		} else {
			if ( 'post' === get_post_type() ) {
				legenki_posted_on();
			}
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'legenki_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function legenki_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to legenki_post_content_before action.
		 *
		 * @hooked legenki_post_thumbnail - 10
		 */
		do_action( 'legenki_post_content_before' );

		if ( is_single() ) {
			the_content(
				sprintf(
					// translators: 'Continue reading' text to read the full article.
					__( 'Continue reading %s', 'legenki' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

		} else {
			the_excerpt();
		}

		do_action( 'legenki_post_content_after' );

		if ( is_single() ) {
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'legenki' ),
					'after'  => '</div>',
				)
			);
		}
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'legenki_post_footer' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function legenki_post_footer() {

		$legenki_layout_blog_tags_display    = '';
		$legenki_layout_blog_tags_display    = legenki_get_option( 'legenki_layout_blog_tags_display' );
		$legenki_layout_blog_socials_display = '';
		$legenki_layout_blog_socials_display = legenki_get_option( 'legenki_layout_blog_socials_display' );

		?>

		<div class="entry-footer">
			<?php if ( true === $legenki_layout_blog_tags_display ) { ?>
				<?php the_tags( '<div class="tags_wrap"><ul><li>', '</li><li>', '</li></ul></div>' ); ?>
			<?php } ?>
			<?php if ( true === $legenki_layout_blog_socials_display ) { ?>
			<div class="socials_share_wrap">
				<ul>
					<li class="share-link twitter"><a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&amp;text=<?php echo urlencode( get_the_title() ); ?>" target="_blank"><div class="twitter-icon"></div></a></li>
					<li class="share-link facebook"><a href="https://facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"><div class="facebook-icon"></div></a></li>
				</ul>
			</div>
			<?php } ?>	
		</div><!-- .entry-footer -->
		<?php
	}
}

if ( ! function_exists( 'legenki_portfolio_single_content' ) ) {
	/**
	 * Display the portfolio single content
	 *
	 * @since 1.0.0
	 */
	function legenki_portfolio_single_content() {
		?>
		<div class="portfolio-single-wrapper">
			<div class="entry-content">
			<?php

			/**
			 * Functions hooked in to legenki_post_content_before action.
			 *
			 * @hooked legenki_post_thumbnail - 10
			 */
			do_action( 'legenki_post_content_before' );

			if ( is_single() ) {
				the_content();

			} else {
				the_excerpt();
			}
			?>
			</div><!-- .entry-content -->
		</div>
		<?php
	}
}

if ( ! function_exists( 'legenki_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function legenki_post_meta() {
		?>
		<aside class="entry-meta">
			<?php
			if ( 'post' === get_post_type() ) :
				?>
			<div class="vcard author">			
				<?php
					echo '<div class="avatar">';
					echo get_avatar( get_the_author_meta( 'ID' ), 256 );
					echo '</div>';
					echo '<div class="author-details">';
					echo sprintf(
						'<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author()
					);
					echo wp_kses_post( get_the_author_meta( 'description' ) );
					echo '</div>';
				?>
			</div>

			<div class="post-meta">
				<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'legenki' ) );

				if ( $categories_list ) :
					?>
				<div class="cat-links">
						<?php
						echo '<div class="label">' . esc_attr( __( 'Posted in:', 'legenki' ) ) . '</div>';
						echo wp_kses_post( $categories_list );
						?>
				</div>
				<?php endif; // End if categories. ?>

				<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'legenki' ) );

				if ( $tags_list ) :
					?>
				<div class="tags-links">
						<?php
						echo '<div class="label">' . esc_attr( __( 'Tagged:', 'legenki' ) ) . '</div>';
						echo wp_kses_post( $tags_list );
						?>
				</div>
				<?php endif; // End if $tags_list. ?>

			</div>

			<?php endif; // End if 'post' == get_post_type(). ?>

		</aside>
		<?php
	}
}

if ( ! function_exists( 'legenki_author' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function legenki_author() {
		?>
		<span class="author-meta">
			<?php
			if ( 'post' === get_post_type() ) :
				?>
			<span class="vcard author">			
				<?php
					echo get_avatar( get_the_author_meta( 'ID' ), 64 );
					echo sprintf(
						'<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author()
					);
				?>
			</span>

			<?php endif; // End if 'post' == get_post_type(). ?>

		</span>
		<?php
	}
}

if ( ! function_exists( 'legenki_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function legenki_paging_nav() {
		global $wp_query;

		$args = array(
			'type'      => 'list',
			'next_text' => _x( 'Next', 'Next post', 'legenki' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'legenki' ),
		);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'legenki_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function legenki_post_nav() {
		$args = array(
			'next_text' => '%title',
			'prev_text' => '%title',
		);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'legenki_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function legenki_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			// translators: post date.
			_x( '%s', 'post date', 'legenki' ),
			'' . $time_string . ''
		);

		$legenki_category = get_the_category();
		if ( $legenki_category ) {
			$legenki_category_display = '<a href="' . get_category_link( $legenki_category[0]->term_id ) . '" class="legenki-primary-category">' .
			$legenki_category[0]->name . '</a> ';
		}

		echo wp_kses(
			apply_filters( 'legenki_single_post_posted_on_html', '<span class="posted-on">' . $legenki_category_display . $posted_on . '</span>', $posted_on ), array(
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}

if ( ! function_exists( 'legenki_get_sidebar' ) ) {
	/**
	 * Display legenki sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function legenki_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'legenki_page_sidebar_display' ) ) {
	/**
	 * Display legenki page sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function legenki_page_sidebar_display() {

		echo '<div id="secondary" class="widget-area" role="complementary">';
		dynamic_sidebar( 'sidebar-pages' );
		echo '</div>';
	}
}


if ( ! function_exists( 'legenki_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail with a link.
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function legenki_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			echo '<div class="image-wrapper"><div class="image-bg"></div><a class="post-thumbnail" href="' . esc_url( get_permalink() ) . '">';
			the_post_thumbnail( $size );
			echo '</a></div>';
		}
	}
}

if ( ! function_exists( 'legenki_post_thumbnail_no_link' ) ) {
	/**
	 * Display post thumbnail.
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function legenki_post_thumbnail_no_link( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			echo '<div class="image-wrapper">';
			the_post_thumbnail( $size );
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'legenki_primary_navigation_wrapper' ) ) {
	/**
	 * The primary navigation wrapper
	 */
	function legenki_primary_navigation_wrapper() {

		if ( has_nav_menu( 'primary' ) ) {
			echo '<div class="legenki-primary-navigation">';
		} else {
			echo '<div class="legenki-primary-navigation simple-menu">';
		}
	}
}

if ( ! function_exists( 'legenki_primary_navigation_wrapper_close' ) ) {
	/**
	 * The primary navigation wrapper close
	 */
	function legenki_primary_navigation_wrapper_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'legenki_tools_account_item' ) ) {
	/**
	 * Account menu item.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_tools_account_item() {
		$legenki_account_display = '';
		$legenki_account_display = legenki_get_option( 'legenki_account_display' );
		$legenki_account_url     = '';
		$legenki_account_url     = legenki_get_option( 'legenki_account_url' );
		?>

		<?php if ( 'enable' === $legenki_account_display ) { ?>
		<li><a href="<?php echo legenki_safe_html( $legenki_account_url ); ?>"><div class="icon-user"></div></a></li>
		<?php } ?>	
		<?php
	}
}

if ( ! function_exists( 'legenki_tools_wishlist_item' ) ) {
	/**
	 * Wishlist menu item.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_tools_wishlist_item() {
		global $yith_wcwl;

		$legenki_wishlist_display = '';
		$legenki_wishlist_display = legenki_get_option( 'legenki_wishlist_display' );
		?>

		<?php if ( class_exists( 'YITH_WCWL' ) ) : ?>
			<?php if ( 'enable' === $legenki_wishlist_display ) { ?>
		<li><a href="<?php echo esc_url( $yith_wcwl->get_wishlist_url() ); ?>"><div class="icon-heart"></div><span class="value wishlist-count"><?php echo yith_wcwl_count_products(); ?></span></a></li>
		<?php } ?>
		<?php endif; ?>	
		<?php
	}
}

if ( ! function_exists( 'legenki_tools_cart_item' ) ) {
	/**
	 * Cart menu item.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_tools_cart_item() {
		$legenki_cart_display = '';
		$legenki_cart_display = legenki_get_option( 'legenki_cart_display' );

		$legenki_mini_cart_text = '';
		$legenki_mini_cart_text = legenki_get_option( 'legenki_mini_cart_text' );
		?>

		<?php
		if ( 'enable' === $legenki_cart_display ) {
			if ( class_exists( 'WooCommerce' ) ) {
				?>
			<li class="cart-item">
				<?php legenki_cart_link(); ?>
				
				<div class="legenki-mini-cart">
					<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					<div class="mini-cart"><?php echo legenki_safe_html( $legenki_mini_cart_text ); ?></div>
				</div>
			</li>
				<?php
			}
		}
		?>
		<?php
	}
}

if ( ! function_exists( 'legenki_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function legenki_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		?>
		
		<?php
		legenki_cart_link();
		$fragments['.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'legenki_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function legenki_cart_link() {
		?>

		<a class="cart-contents" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">
            <div class="icon-shopping-cart"></div>
		<span class="value cart-count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'legenki' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
		</a>
	
		<?php
	}
}


if ( ! function_exists( 'legenki_tools_search_item' ) ) {
	/**
	 * Search menu item.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function legenki_tools_search_item() {
		$legenki_search_display = '';
		$legenki_search_display = legenki_get_option( 'legenki_search_display' );
		?>

		<?php if ( 'enable' === $legenki_search_display ) { ?>
		<li><button id="btn-search" class="btn btn--search"><span class="icon-search"></span></button></li>
		<?php } ?>	
		<?php
	}
}

if ( ! function_exists( 'legenki_add_custom_menu_field' ) ) {
	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0
	 * @param int $menu_item item instance.
	 */
	function legenki_add_custom_menu_field( $menu_item ) {

		$menu_item->markup = get_post_meta( $menu_item->ID, '_menu_item_markup', true );
		return $menu_item;

	}
}

// add custom menu fields to menu.
add_filter( 'wp_setup_nav_menu_item', 'legenki_add_custom_menu_field' );

if ( ! function_exists( 'legenki_update_custom_menu_field' ) ) {
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0
	 * @param int $menu_id the menu id.
	 * @param int $menu_item_db_id the menu item in the db.
	 * @param int $args object args.
	 */
	function legenki_update_custom_menu_field( $menu_id, $menu_item_db_id, $args ) {

		// Check if element is properly sent.
		if ( is_array( $_REQUEST['menu-item-markup'] ) ) {
			$markup_value = $_REQUEST['menu-item-markup'][ $menu_item_db_id ];
			update_post_meta( $menu_item_db_id, '_menu_item_markup', $markup_value );
		}

	}
}

// save menu custom fields.
add_action( 'wp_update_nav_menu_item', 'legenki_update_custom_menu_field', 10, 3 );

/**
 * Define new Walker edit
 *
 * @access      public
 * @since       1.0
 * @param int $walker the walker.
 * @param int $menu_id the menu id.
 */
function legenki_custom_edit_walker( $walker, $menu_id ) {

	return 'Walker_Nav_Menu_Edit_Custom';

}

// edit menu walker.
add_filter( 'wp_edit_nav_menu_walker', 'legenki_custom_edit_walker', 10, 2 );
