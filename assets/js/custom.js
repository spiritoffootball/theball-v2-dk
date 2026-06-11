/**
 * Custom functionality required for the The Ball v2 Denmark design.
 *
 * @since 1.0.0
 *
 * @package The_Ball_v2_Denmark
 */

/**
 * Define what happens when the page is ready.
 *
 * @since 1.0.0
 */
jQuery(document).ready( function($) {

	const obs = new IntersectionObserver(
		(entries) => {
			entries.forEach( e => {
				if ( e.isIntersecting ) e.target.classList.add( 'visible' );
			});
		},
		{
			threshold: 0.1
		}
	);

	document.querySelectorAll( '.fade-in' ).forEach(
		(el, i) => {
			el.style.transitionDelay = (i % 4) * 0.1 + 's';
			obs.observe( el );
		}
	);

});
