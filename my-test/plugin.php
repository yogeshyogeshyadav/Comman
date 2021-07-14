<?php
/**
 * Plugin Name: My Test
 * Author: SLICEmyPAGE
 * Version: 1.0.0
 */
  
function smp_register_blocks() {

	// Check if Gutenberg is active.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Add block script.
	wp_register_script(
		'call-to-action',
		plugins_url( 'blocks/call-to-action.js', __FILE__ ),
		[ 'wp-blocks', 'wp-element', 'wp-editor' ],
		filemtime( plugin_dir_path( __FILE__ ) . 'blocks/call-to-action.js' )
	);

	// Add block style.
	wp_register_style(
		'call-to-action',
		plugins_url( 'blocks/call-to-action.css', __FILE__ ),
		[],
		filemtime( plugin_dir_path( __FILE__ ) . 'blocks/call-to-action.css' )
	);

	// Register block script and style.
	register_block_type( 'mcb/call-to-action', [
		'style' => 'call-to-action', // Loads both on editor and frontend.
		'editor_script' => 'call-to-action', // Loads only on editor.
	] );
}

add_action( 'init', 'smp_register_blocks' );