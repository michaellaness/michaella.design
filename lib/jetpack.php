<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package gr_s
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function gr_s_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'gr_s_jetpack_setup' );



function photon( $src ) {
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) ) {
		$url = parse_url( $src );
		// it's relative, add the host
	  	if ( !isset($url['host']) ) {
	  		$hostname = $_SERVER['HTTP_HOST'];
	  		$url = 'http://'.$hostname.$src;
	  	} else {
			$url = $src;
		}
	  	return apply_filters( 'jetpack_photon_url', $url );
	}

	return $src;
}