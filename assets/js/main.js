// Main Legenki js.
;
( function( $ ) {
	'use strict';


	/**
	 * Parallax effect within a single portfolio page and a WooCommerce category.
	 */
	$( document ).ready( function() {

		if ( 1024 < $( window ).width() ) {

		$( window ).scroll( function() {
		var scrolled = $( window ).scrollTop();
		$( '.with-bg-image, .category-with-image' ).each( function() {
			var initY = $( this ).offset().top;
			var height = $( this ).height();

			// Check if the element is in the viewport.
			var visible = isInViewport( this );
			if ( visible ) {
			var diff = scrolled - initY;
			var ratio = Math.round( ( diff / height ) * 100 );
			$( this ).css( 'background-position', 'center ' + parseInt( ( ratio * 1.5 ), 10 ) + 'px' );
			}
		} );
		} );
	}

	} );

	// Build up the add to cart notification
	var legenkiProductAddedContent = '';

	$( 'body' ).on( 'click', '.ajax_add_to_cart', function() {

		if ( $( 'body' ).hasClass( 'woocommerce-wishlist' ) ) {
			var imageSrc = $( this ).parents( 'tr' ).find( 'img.attachment-shop_thumbnail' ).attr( 'src' );
			var productTitle = $( this ).parents( 'tr' ).find( '.product-name a' ).html();
		} else {
			var imageSrc = $( this ).parents( 'li' ).find( 'img.attachment-woocommerce_thumbnail' ).attr( 'src' );
			var productTitle = $( this ).parents( 'li' ).find( '.woocommerce-loop-product_title' ).html();

		}

		if ( 'undefined' !== typeof imageSrc && 'undefined' !== typeof productTitle ) {
			legenkiProductAddedContent = '<div class="legenki-addtocart-message visible"><div class="addedtocart_message_wrapper"><div class="product_image" style="background-image:url(' + imageSrc + ')"></div><div class="product_notification_text">' + productTitle + '' + legenkiAddedToCart + '</div></div></div>';
		} else {
			legenkiProductAddedContent = false;
		}
	} );

	// Displays a notification when an item is added to the cart.
	$( document ).on( 'added_to_cart', function() {
		if ( false !== legenkiProductAddedContent ) {
			$( '.site-content' ).append( legenkiProductAddedContent );
		}
	} );

	/**
	 * When element is within viewport.
	 * @param {string} node - if in viewport
	 * @returns {string} viewport
	 */
	function isInViewport( node ) {
		var rect = node.getBoundingClientRect();
		return (
		( 0 < rect.height || 0 < rect.width ) &&
		0 <= rect.bottom &&
		0 <= rect.right &&
		rect.top <= ( window.innerHeight || document.documentElement.clientHeight ) &&
		rect.left <= ( window.innerWidth || document.documentElement.clientWidth )
		);
	}

	/**
	 * YITH Wishlist.
	 * @param {string} name - the cookie name
	 * @returns {string} cookie
	 */
	function getCookie( name ) {
		var dc = document.cookie;
		var prefix = name + '=';
		var begin = dc.indexOf( '; ' + prefix );
		if ( -1 === begin ) {
			begin = dc.indexOf( prefix );
			if ( 0 !== begin ) {
			return null;
			}
		} else {
			begin += 2;
			var end = document.cookie.indexOf( ';', begin );
			if ( -1 === end ) {
			end = dc.length;
			}
		}

		return decodeURIComponent( decodeURIComponent( ( dc.substring( begin + prefix.length, end ) ) ) );
	}

	if ( $( '.wishlist-count' ).length ) {

		var wishlistCounter = 0;
		var wishlistCookie = getCookie( 'yith_wcwl_products' );

		if ( null !== wishlistCookie ) {
			var products = JSON.parse( wishlistCookie );
			wishlistCounter =  Object.keys( products ).length;
		} else 	{
			wishlistCounter = Number( $( '.wishlist-count' ).html() );
		}

		/**
		 * Increase count when added.
		 */
		$( 'body' ).on( 'added_to_wishlist', function() {
			wishlistCounter++;
			legenkiwishlistCount( wishlistCounter );
		} );

		/*
		**	Decrease count when removed.
		*/
		$( 'body' ).on( 'removed_from_wishlist', function() {
			wishlistCounter--;
			legenkiwishlistCount( wishlistCounter );
		} );

		/**
		 * Ajax count function.
		 * @param {number} count - the wishlist counter
		 */
		function legenkiwishlistCount( count ) {
			if ( Number.isInteger( count ) && 0 <= count ) {
				$( '.wishlist-count' ).html( count );
			}
		}

		legenkiwishlistCount( wishlistCounter );
	}

	// Toggle cart drawer.
	$( '.mobile-filter' ).on( 'touchstart click', function( e ) {
		e.stopPropagation();
		e.preventDefault();
		$( 'body' ).toggleClass( 'filter-open' );
	} );

	// Close the drawer when clicking/tapping outside it
	$( document ).on( 'touchstart click', function( e ) {
    var container = $( '.filter-open #secondary' );

    if ( ! container.is( e.target ) && 0 === container.has( e.target ).length ) {
        $( 'body' ).removeClass( 'filter-open' );
    }
	} );


	// Add a class if term description text or an image exists.
	if ( 0 < $( '.term-description' ).length ) {
		$( '.woocommerce-products-header' ).addClass( 'description-exists' );
	}

	if ( 0 < $( '.woocommerce-products-header .category-with-image' ).length ) {
		$( '.woocommerce-products-header' ).addClass( 'image-exists' );
	}

	// Overlay when a full width menu item is hovered over.
	$( document ).ready( function() {
		$( 'li.col-3, li.col-4, li.col-5' ).hover(
			function() {
				$( '.main-wrapper' ).toggleClass( 'overlay' );
			}
		);
	} );

	// Mobile menu toggle.
	$( document ).ready( function() {
		$( '.menu-toggle' ).on( 'click', function() {
			$( this ).toggleClass( 'active' );
			$( 'body' ).toggleClass( 'mobile-toggled' );

			//$( window ).scrollTop( 0 );
		return false;
		} );
	} );

	// Reveal/Hide Mobile sub menus.
	$( 'body .main-navigation ul.menu > li.menu-item-has-children > .caret' ).on( 'click', function( e ) {
		$( this ).closest( 'li' ).toggleClass( 'dropdown-open' );
		e.preventDefault();
	} );

	// Close the drawer when clicking outside it
	$( document ).on( 'touchstart click', function( e ) {
    var container = $( '.navigation-wrapper' );

    if ( ! container.is( e.target ) && 0 === container.has( e.target ).length ) {
        $( 'body' ).removeClass( 'mobile-toggled' );
    }
	} );

	// Close drawer - click the x icon
	$( '.close-drawer' ).on( 'click', function() {
		$( 'body' ).removeClass( 'drawer-open' );
	} );

	// Change color site header
	$(function () {
		$(document).scroll(function () {
			var $nav = $(".site-header");
			$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
		});
	});

	// Smooth scroll for sticky single product - only for variable and grouped items
	$( 'a.variable-grouped-sticky[href*="#"]' ).on( 'click', function( e ) {
		e.preventDefault();

		$( 'html, body' ).animate( {
			scrollTop: $( $( this ).attr( 'href' ) ).offset().top - 80}, 500, 'linear' );
	} );

}( jQuery ) );


( function() {

// Back to top.
	var backTop = document.getElementsByClassName( 'js-cd-top' )[0],

		// browser window scroll (in pixels) after which the "back to top" link is shown
		offset = 300,

		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offsetOpacity = 1200,
		scrollDuration = 700,
		scrolling = false;
	if ( backTop ) {

		//update back to top visibility on scrolling
		window.addEventListener( 'scroll', function( event ) {
			if ( ! scrolling ) {
				scrolling = true;
				( ! window.requestAnimationFrame ) ? setTimeout( checkBackToTop, 250 ) : window.requestAnimationFrame( checkBackToTop );
			}
		} );

		//smooth scroll to top
		backTop.addEventListener( 'click', function( event ) {
			event.preventDefault();
			( ! window.requestAnimationFrame ) ? window.scrollTo( 0, 0 ) : scrollTop( scrollDuration );
		} );
	}

	// Back to top check.
	function checkBackToTop() {
		var windowTop = window.scrollY || document.documentElement.scrollTop;
		( windowTop > offset ) ? addClass( backTop, 'cd-top--show' ) : removeClass( backTop, 'cd-top--show', 'cd-top--fade-out' );
		( windowTop > offsetOpacity ) && addClass( backTop, 'cd-top--fade-out' );
		scrolling = false;
	}

	// Back to top duration.
	function scrollTop( duration ) {
		var start = window.scrollY || document.documentElement.scrollTop,
		currentTime = null;

		var animateScroll = function( timestamp ) {
			if ( ! currentTime ) {
				currentTime = timestamp;
			}
		var progress = timestamp - currentTime;
	        var val = Math.max( Math.easeInOutQuad( progress, start, -start, duration ), 0 );
	        window.scrollTo( 0, val );
	        if ( progress < duration ) {
	            window.requestAnimationFrame( animateScroll );
	       }
	   };

	    window.requestAnimationFrame( animateScroll );
	}

	Math.easeInOutQuad = function( t, b, c, d ) {
 		t /= d / 2;
		if ( 1 > t ) {
return c / 2 * t * t + b;
}
		t--;
		return -c / 2 * ( t * ( t - 2 ) - 1 ) + b;
	};

	//class manipulations - needed if classList is not supported
	function hasClass( el, className ) {
	  	if ( el.classList ) {
return el.classList.contains( className );
} else {
return !! el.className.match( new RegExp( '(\\s|^)' + className + '(\\s|$)' ) );
}
	}
	function addClass( el, className ) {
		var classList = className.split( ' ' );
	 	if ( el.classList ) {
el.classList.add( classList[0] );
} else if ( ! hasClass( el, classList[0] ) ) {
el.className += ' ' + classList[0];
}
	 	if ( 1 < classList.length ) {
addClass( el, classList.slice( 1 ).join( ' ' ) );
}
	}
	function removeClass( el, className ) {
		var classList = className.split( ' ' );
	  	if ( el.classList ) {
el.classList.remove( classList[0] );
} else if ( hasClass( el, classList[0] ) ) {
	  		var reg = new RegExp( '(\\s|^)' + classList[0] + '(\\s|$)' );
	  		el.className = el.className.replace( reg, ' ' );
	  	}
	  	if ( 1 < classList.length ) {
removeClass( el, classList.slice( 1 ).join( ' ' ) );
}
	}
} () );


var $j = jQuery.noConflict();

$j( window ).on( 'load', function() {
	'use strict';

// Woo quantity buttons
	legenkiWooQuantityButtons();
} );

$j( document ).ajaxComplete( function() {
	'use strict';

// Woo quantity buttons
	legenkiWooQuantityButtons();
} );

/**
	 * WooCommerce quantity buttons
	 * @param {number} $quantitySelector Quantity.
	 */
function legenkiWooQuantityButtons( $quantitySelector ) {

	var $quantityBoxes;

	if ( ! $quantitySelector ) {
		$quantitySelector = '.qty';
	}

	$quantityBoxes = $j( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).find( $quantitySelector );

	if ( $quantityBoxes && 'date' !== $quantityBoxes.prop( 'type' ) && 'hidden' !== $quantityBoxes.prop( 'type' ) ) {

		// Add plus and minus icons
		$quantityBoxes.parent().addClass( 'buttons_added' );
        $quantityBoxes.after( '<div class="quantity-nav"><a href="javascript:void(0)" class="quantity-button quantity-up plus">&nbsp;</a><a href="javascript:void(0)" class="quantity-button quantity-down minus">&nbsp;</a></div>' );

		// Target quantity inputs on product pages
		$j( 'input' + $quantitySelector + ':not(.product-quantity input' + $quantitySelector + ')' ).each( function() {
				var $min = parseFloat( $j( this ).attr( 'min' ) );

				if ( $min && 0 < $min && parseFloat( $j( this ).val() ) < $min ) {
					$j( this ).val( $min );
				}
		} );

		$j( '.plus, .minus' ).unbind( 'click' );

		$j( '.plus, .minus' ).on( 'click', function() {

				// Get values
				var $quantityBox     = $j( this ).closest( '.quantity' ).find( $quantitySelector ),
					$currentQuantity = parseFloat( $quantityBox.val() ),
					$maxQuantity     = parseFloat( $quantityBox.attr( 'max' ) ),
					$minQuantity     = parseFloat( $quantityBox.attr( 'min' ) ),
					$step            = $quantityBox.attr( 'step' );

				// Fallback default values
				if ( ! $currentQuantity || '' === $currentQuantity  || 'NaN' === $currentQuantity ) {
					$currentQuantity = 0;
				}
				if ( '' === $maxQuantity || 'NaN' === $maxQuantity ) {
					$maxQuantity = '';
				}

				if ( '' === $minQuantity || 'NaN' === $minQuantity ) {
					$minQuantity = 0;
				}
				if ( 'any' === $step || '' === $step  || undefined === $step || 'NaN' === parseFloat( $step )  ) {
					$step = 1;
				}

				// Change the value
				if ( $j( this ).is( '.plus' ) ) {

					if ( $maxQuantity && ( $maxQuantity === $currentQuantity || $currentQuantity > $maxQuantity ) ) {
						$quantityBox.val( $maxQuantity );
					} else {
						$quantityBox.val( $currentQuantity + parseFloat( $step ) );
					}

				} else {

					if ( $minQuantity && ( $minQuantity === $currentQuantity || $currentQuantity < $minQuantity ) ) {
						$quantityBox.val( $minQuantity );
					} else if ( 0 < $currentQuantity ) {
						$quantityBox.val( $currentQuantity - parseFloat( $step ) );
					}

				}

				// Trigger change event
				$quantityBox.trigger( 'change' );
			}
		);
	}
}
