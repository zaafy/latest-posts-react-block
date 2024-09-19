<?php
/**
 * Plugin Name:       Brantt Latest Posts
 * Description:       A block to show 4 latest posts.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            Zaafy
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       brantt-latest-posts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function create_block_brantt_latest_posts_block_init() {
	register_block_type( __DIR__ . '/build' );
}

add_action( 'init', 'create_block_brantt_latest_posts_block_init' );
