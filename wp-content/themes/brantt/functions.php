<?php
/**
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

// composer autoload.
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Requires all files recursively within given directory
 *
 * @param string $path path to directory which should be required recursively.
 */
function foundationpress_recursive_require_dir( $path ) {
	$dir      = new RecursiveDirectoryIterator( $path );
	$iterator = new RecursiveIteratorIterator( $dir );
	foreach ( $iterator as $file ) {
		$fname = $file->getFilename();
		if ( preg_match( '%\.php$%', $fname ) ) {
			require_once $file->getPathname();
		}
	}
}

foundationpress_recursive_require_dir( get_template_directory() . '/inc' );
foundationpress_recursive_require_dir( get_template_directory() . '/blocks' );

function enqueue_google_fonts_admin() {
    wp_enqueue_style( 'google-fonts-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', false );
    wp_enqueue_style( 'google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', false );
}
add_action( 'admin_enqueue_scripts', 'enqueue_google_fonts_admin' );
