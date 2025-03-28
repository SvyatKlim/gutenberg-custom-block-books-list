<?php
/**
 * Plugin Name:       Gutenberg Custom Blocks
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       custom-block-books-list
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

require_once plugin_dir_path(__FILE__) . '/src/inc/API.php';
require_once plugin_dir_path(__FILE__) . '/src/inc/custom-post-types.php';
require_once plugin_dir_path(__FILE__) . '/src/inc/custom-fields.php';

add_action('plugins_loaded', function () {
	new BooksAPI\API();
});


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
add_action('init', function () {
	register_block_type(__DIR__ . "/build/blocks/gutenberg-custom-blocks");
});

register_activation_hook(__FILE__, function () {
	if (!get_option('my_books_installed')) {
		$books = [
			['title' => 'Book One', 'author' => 'Author A', 'date' => '2025-01-01'],
			['title' => 'Book Two', 'author' => 'Author B', 'date' => '2025-01-01'],
			['title' => 'Book Three', 'author' => 'Author C', 'date' => '2025-01-01'],
		];

		foreach ($books as $book) {
			$post_id = wp_insert_post([
				'post_type' => 'books',
				'post_title' => $book['title'],
				'post_status' => 'publish',
				'post_date' => $book['date'],
			]);

			if ($post_id && !is_wp_error($post_id)) {
				update_post_meta($post_id, 'author', $book['author']);
			}
		}

		update_option('my_books_installed', true);
	}
});

