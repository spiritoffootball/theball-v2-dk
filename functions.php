<?php
/**
 * The Ball v2 Denmark Child Theme Functions
 *
 * Theme amendments and overrides.
 *
 * @package The_Ball_v2_Denmark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set our version here.
define( 'THE_BALL_V2_DK_VERSION', '1.0.1a' );

/**
 * Bootstraps theme object and returns instance.
 *
 * @since 1.0.0
 *
 * @return The_Ball_v2_Denmark_Theme $theme The theme instance.
 */
function the_ball_v2_dk_theme() {

	// Declare as static.
	static $theme;

	// Instantiate theme class if not yet instantiated.
	if ( ! isset( $theme ) ) {
		require get_stylesheet_directory() . '/includes/classes/class-theme.php';
		$theme = new The_Ball_v2_Denmark_Theme();
	}

	// --<
	return $theme;

}

// Bootstrap immediately.
the_ball_v2_dk_theme();

/**
 * Enqueue stylesheets.
 *
 * @since 1.0.0
 */
function the_ball_v2_dk_styles() {

	// Define version.
	$version = THE_BALL_V2_DK_VERSION;
	if ( defined( 'THE_BALL_V2_THEME_DEBUG' ) && true === THE_BALL_V2_THEME_DEBUG ) {
		$version .= '-' . time();
	}

	// Variables stylesheet.
	wp_enqueue_style(
		'the-ball-v2-dk-variables',
		get_stylesheet_directory_uri() . '/assets/css/variables.css',
		[ 'the-ball-v2-variables' ],
		$version,
		'all' // Media.
	);

	// Screen stylesheet.
	wp_enqueue_style(
		'the-ball-v2-dk-screen',
		get_stylesheet_directory_uri() . '/assets/css/screen.css',
		[ 'the-ball-v2-global' ],
		$version,
		'all' // Media.
	);

}

add_action( 'wp_enqueue_scripts', 'the_ball_v2_dk_styles', 60 );

/**
 * Filters the list of CSS class names for the current post.
 *
 * @since 1.0.0
 *
 * @param string[] $classes   An array of post class names.
 * @param string[] $css_class An array of additional class names added to the post.
 * @param int      $post_id   The post ID.
 * @return string[] $classes The modified array of post class names.
 */
function the_ball_v2_dk_post_class_fade_in( $classes, $css_class, $post_id ) {

	// Add "fade-in" class.
	$classes[] = 'fade-in';

	// --<
	return $classes;

}
