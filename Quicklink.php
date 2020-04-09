<?php
/**
 * Hooks for Quicklink extension
 */
class Quicklink {

	public static function onBeforePageDisplay( OutputPage $out, Skin $skin ) {
		if ( !$skin->getUser()->isLoggedIn() ) {
			$out->addScript( "<script src=\"https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver\"></script>" );

			$out->addScript( "<script src=\"https://unpkg.com/quicklink@2.0.0-alpha/dist/quicklink.umd.js\"></script>" );
			
			$out->addScript(
"<script>
if ( navigator.connection && !/\slow-2g|2g|3g/.test( navigator.connection.effectiveType ) ) {
	window.addEventListener( 'load', () => {
		quicklink.listen( {
			el: document.querySelector( '#content' ),
			ignores: [ ( uri ) => uri.includes( '.php' ) ],
			throttle: 5,
		} );
	} );
}
</script>"
			);
		}
	}

}


