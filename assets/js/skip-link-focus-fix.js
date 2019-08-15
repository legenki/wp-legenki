/** @format */
( function() {
	var isWebkit = -1 < navigator.userAgent.toLowerCase().indexOf( 'webkit' ),
		isOpera = -1 < navigator.userAgent.toLowerCase().indexOf( 'opera' ),
		isIE = -1 < navigator.userAgent.toLowerCase().indexOf( 'msie' );

	if ( ( isWebkit || isOpera || isIE ) && document.getElementById && window.addEventListener ) {
		window.addEventListener(
			'hashchange',
			function() {
				var element = document.getElementById( location.hash.substring( 1 ) );

				if ( element ) {
					if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
						element.tabIndex = -1;
					}

					element.focus();
				}
			},
			false
		);
	}
} () );
