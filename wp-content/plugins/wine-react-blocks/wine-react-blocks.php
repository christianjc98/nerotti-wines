<?php
/**
 * Plugin Name: Wine React Blocks
 * Plugin URI: https://example.com
 * Description: Custom Gutenberg blocks for wine website built with React
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wine-react-blocks
 * Domain Path: /languages
 *
 * @package Wine_React_Blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Wine Card Block
 */
function wine_react_blocks_register_wine_card() {
	register_block_type( __DIR__ . '/build/wine-card' );
}
add_action( 'init', 'wine_react_blocks_register_wine_card' );

/**
 * Register Experience Highlight Block
 */
function wine_react_blocks_register_experience_highlight() {
	register_block_type( __DIR__ . '/build/experience-highlight' );
}
add_action( 'init', 'wine_react_blocks_register_experience_highlight' );

/**
 * Register Contact CTA Block
 */
function wine_react_blocks_register_contact_cta() {
	register_block_type( __DIR__ . '/build/contact-cta' );
}
add_action( 'init', 'wine_react_blocks_register_contact_cta' );

/**
 * Register Wine Grid Block
 */
function wine_react_blocks_register_wine_grid() {
	register_block_type( __DIR__ . '/build/wine-grid' );
}
add_action( 'init', 'wine_react_blocks_register_wine_grid' );

/**
 * Register block category
 */
function wine_react_blocks_register_category( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'wine-blocks',
				'title' => __( 'Wine Blocks', 'wine-react-blocks' ),
				'icon'  => 'beer',
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'wine_react_blocks_register_category' );
