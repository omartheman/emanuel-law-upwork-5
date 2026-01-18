<?php
/* banner-php */
/**
 * Monolit back compat functionality
 *
 * Prevents Monolit from running on WordPress versions prior to 5.0,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.0.
 *
 */

/**
 * Prevent switching to Monolit on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 *
 */
function monolit_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'monolit_upgrade_notice' );
}
add_action( 'after_switch_theme', 'monolit_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Monolit on WordPress versions prior to 5.0.
 *
 *
 *
 * @global string $wp_version WordPress version.
 */
function monolit_upgrade_notice() {
	$message = sprintf( esc_html__( 'Monolit requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'monolit' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.0.
 *
 *
 *
 * @global string $wp_version WordPress version.
 */
function monolit_customize() {
	wp_die( sprintf( esc_html__( 'Monolit requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'monolit' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'monolit_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.0.
 *
 *
 *
 * @global string $wp_version WordPress version.
 */
function monolit_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Monolit requires at least WordPress version 5.0. You are running version %s. Please upgrade and try again.', 'monolit' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'monolit_preview' );
