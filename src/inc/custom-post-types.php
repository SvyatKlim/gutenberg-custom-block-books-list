<?php defined( 'ABSPATH' ) || exit;

add_action('init', function () {
	register_post_type('books',[
		'labels' => [
			'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
			'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
			'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
			'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
			'add_new'               => __( 'Add New', 'textdomain' ),
			'add_new_item'          => __( 'Add New Book', 'textdomain' ),
			'new_item'              => __( 'New Book', 'textdomain' ),
			'edit_item'             => __( 'Edit Book', 'textdomain' ),
			'view_item'             => __( 'View Book', 'textdomain' ),
			'all_items'             => __( 'All Books', 'textdomain' ),
			'search_items'          => __( 'Search Books', 'textdomain' ),
		],
		'public' => true,
		'show_in_rest' => true,
		'supports' => ['title','editor'],
		'menu_icon' => 'dashicons-book',
	]);

	register_post_meta('books', 'author',[
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'sanitize_callback' => 'sanitize_text_field',
	]);
})

?>
