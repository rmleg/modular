<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package A Dance With Mobile First
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function a_dance_with_mobile_first_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'a_dance_with_mobile_first_jetpack_setup' );
