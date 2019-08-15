<?php
/**
 * Legenki Class
 *
 * @author   Legenki
 * @since    1.0.0
 * @package  legenki
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Legenki' ) ) :

	/**
	 * The main legenki class
	 */
	class Legenki {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'child_scripts' ), 30 ); // After WooCommerce.
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args', array( $this, 'page_menu_args' ) );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			load_theme_textdomain( 'legenki', trailingslashit( WP_LANG_DIR ) . 'themes/' );
			load_theme_textdomain( 'legenki', get_stylesheet_directory() . '/languages' );
			load_theme_textdomain( 'legenki', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo
			 */
			add_theme_support(
				'custom-logo', apply_filters(
					'legenki_custom_logo_args', array(
						'height'      => 110,
						'width'       => 470,
						'flex-height' => true,
						'flex-width'  => true,
					)
				)
			);

			// This theme uses wp_nav_menu() in two locations.
			register_nav_menus(
				apply_filters(
					'legenki_register_nav_menus', array(
						'primary' => __( 'Primary Menu', 'legenki' ),
					)
				)
			);

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5', apply_filters(
					'legenki_html5_args', array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'widgets',
					)
				)
			);

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support(
				'site-logo', apply_filters(
					'legenki_site_logo_args', array(
						'size' => 'full',
					)
				)
			);

			// Declare WooCommerce support.
			add_theme_support(
				'woocommerce', apply_filters(
					'legenki_woocommerce_args', array(
						'product_grid' => array(
							'default_columns' => 5,
							'default_rows'    => 4,
							'min_columns'     => 1,
							'max_columns'     => 6,
							'min_rows'        => 1,
						),
					)
				)
			);

			add_filter(
				'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
					return array(
						'width'  => 150,
						'height' => 150,
						'crop'   => 0,
					);
				}
			);

			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
			// Declare support for title theme feature.
			add_theme_support( 'title-tag' );

			// Declare support for selective refreshing of widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Declare Gutenberg wide images support.
			add_theme_support( 'align-wide' );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'        => __( 'WooCommerce Sidebar', 'legenki' ),
				'id'          => 'sidebar-1',
				'description' => 'The WooCommerce archives sidebar.',
			);

			$sidebar_args['sidebar-pages'] = array(
				'name'        => __( 'Sidebar Pages', 'legenki' ),
				'id'          => 'sidebar-pages',
				'description' => __( 'The pages sidebar.', 'legenki' ),
			);

			$sidebar_args['top-bar-left'] = array(
				'name'          => __( 'Top Bar Left', 'legenki' ),
				'id'            => 'top-bar-left',
				'description'   => __( 'A widget added to this region will appear at the very top of the site to the left.', 'legenki' ),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['top-bar-center'] = array(
				'name'          => __( 'Top Bar Center', 'legenki' ),
				'id'            => 'top-bar-center',
				'description'   => __( 'A widget added to this region will appear at the very top of the site to the center.', 'legenki' ),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['top-bar-right'] = array(
				'name'          => __( 'Top Bar Right', 'legenki' ),
				'id'            => 'top-bar-right',
				'description'   => __( 'A widget added to this region will appear at the very top of the site to the right.', 'legenki' ),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['below-header'] = array(
				'name'          => __( 'Below Header', 'legenki' ),
				'id'            => 'below-header',
				'description'   => __( 'Widgets added to this region will appear below the header and above the main content.', 'legenki' ),
				'before_widget' => '<div class="widget %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['mobile-navigation'] = array(
				'name'          => __( 'Mobile Navigation', 'legenki' ),
				'id'            => 'mobile-navigation',
				'description'   => __( 'A widget added to this will appear on mobile only when the menu is activated', 'legenki' ),
				'before_widget' => '<div class="mobile-navigation widget %2$s">',
				'after_widget'  => '</div>',
			);

			$sidebar_args['single-product-field'] = array(
				'name'        => __( 'Single Product Custom Area', 'legenki' ),
				'id'          => 'single-product-field',
				'description' => __( 'A widget added to this region will appear below the "Add to cart" button on a product page.', 'legenki' ),
			);

			$sidebar_args['cart-field'] = array(
				'name'        => __( 'Cart Custom Area', 'legenki' ),
				'id'          => 'cart-field',
				'description' => __( 'A widget added to this region will appear below the "Proceed to checkout" button on the Cart page.', 'legenki' ),
			);

			$sidebar_args['checkout-field'] = array(
				'name'        => __( 'Checkout Custom Area', 'legenki' ),
				'id'          => 'checkout-field',
				'description' => __( 'A widget added to this region will appear below the "Place order" button on the Checkout page.', 'legenki' ),
			);

			$sidebar_args['footer'] = array(
				'name'        => __( 'Footer', 'legenki' ),
				'id'          => 'footer',
				'description' => __( 'A widget added to this region will appear within the footer area.', 'legenki' ),
			);

			$sidebar_args['copyright'] = array(
				'name'        => __( 'Copyright', 'legenki' ),
				'id'          => 'copyright',
				'description' => __( 'A widget added to this region will appear within the copyright area.', 'legenki' ),
			);

			$sidebar_args = apply_filters( 'legenki_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title"><span class="highlight">',
					'after_title'   => '</span></span>',
				);

				$filter_hook = sprintf( 'legenki_%s_widget_tags', $sidebar );
				$widget_tags = apply_filters( $filter_hook, $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $legenki_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'legenki-style', get_template_directory_uri() . '/style.css', '', $legenki_version );
			wp_enqueue_style( 'legenki-responsive', get_template_directory_uri() . '/assets/css/base/responsive.css', '', $legenki_version );
            wp_enqueue_style( 'legenki-icons', get_template_directory_uri() . '/assets/css/base/icons.css', '', $legenki_version );

			/**
			 * Scripts
			 */
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'legenki-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20130115', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.0.0
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				$child_theme = wp_get_theme( get_stylesheet() );
				wp_enqueue_style( 'legenki-child-style', get_stylesheet_uri(), array(), $child_theme->get( 'Version' ) );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;
			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {

			$legenki_layout_woocommerce_sidebar = '';
			$legenki_layout_woocommerce_sidebar = legenki_get_option( 'legenki_layout_woocommerce_sidebar' );

			if ( isset( $_GET['sidebar-layout'] ) ) {
				$legenki_layout_woocommerce_sidebar = $_GET['sidebar-layout'];
			}

			$legenki_layout_singlepost = '';
			$legenki_layout_singlepost = legenki_get_option( 'legenki_layout_singlepost' );

			$legenki_header_style = '';
			$legenki_header_style = legenki_get_option( 'legenki_header_style' );

			if ( isset( $_GET['header-color'] ) ) {
				$legenki_header_style = $_GET['header-color'];
			}

			$legenki_navigation_position = '';
			$legenki_navigation_position = legenki_get_option( 'legenki_navigation_position' );

			if ( isset( $_GET['navigation-layout'] ) ) {
				$legenki_navigation_position = $_GET['navigation-layout'];
			}

			$legenki_sticky_header = '';
			$legenki_sticky_header = legenki_get_option( 'legenki_sticky_header' );

			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// If the pages sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-pages' ) ) {
				$classes[] = 'legenki-full-width-content';
			}

			// If the shop sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'legenki-full-width-shop';
			}

			// Add a class if offscreen filters are selected.
			if ( 'offscreen-woocommerce-sidebar' === $legenki_layout_woocommerce_sidebar ) {
				$classes[] = 'offscreen-woocommerce-sidebar';
			}

			// Add a class if the center navigation is selected.
			if ( 'center-navigation' === $legenki_navigation_position ) {
				$classes[] = 'center-navigation';
			}

			// Add a class if the blog layout 2 is selected.
			if ( 'singlepost-layout-two' === $legenki_layout_singlepost ) {
				$classes[] = 'singlepost-layout-two';
			}

			// Add a class if the center logo is selected.
			if ( 'center-logo' === $legenki_navigation_position ) {
				$classes[] = 'center-logo';
			}

			// Add a class if the sticky header is selected.
			if ( 'enable' === $legenki_sticky_header ) {
				$classes[] = 'sticky-header';
			}

			// Add a class if the header style is selected.
			if ( 'dark' === $legenki_header_style ) {
				$classes[] = 'dark-header';
			}
			if ( 'green' === $legenki_header_style ) {
				$classes[] = 'green-header';
			}
			if ( 'blue' === $legenki_header_style ) {
				$classes[] = 'blue-header';
			}
			if ( 'orange' === $legenki_header_style ) {
				$classes[] = 'orange-header';
			}

			return $classes;
		}

		/**
		 * Custom navigation markup template hooked into 'navigation_markup_template' filter hook.
		 */
		public function navigation_markup_template() {
			$template  = '<nav id="post-navigation" class="navigation %1$s" aria-label="' . esc_html__( 'Post Navigation', 'legenki' ) . '">';
			$template .= '<span class="screen-reader-text">%2$s</span>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'legenki_navigation_markup_template', $template );
		}

	}
endif;

return new Legenki();
