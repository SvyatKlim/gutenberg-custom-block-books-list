<?php
defined( 'ABSPATH' ) || exit;

add_action(
	'init',
	function () {
		register_post_type(
			'books',
			array(
				'labels' => array(
					'name'                  => _x( 'Books', 'Post type general name', 'custom-block-books-list' ),
					'singular_name'         => _x( 'Book', 'Post type singular name', 'custom-block-books-list' ),
					'menu_name'             => _x( 'Books', 'Admin Menu text', 'custom-block-books-list' ),
					'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'custom-block-books-list' ),
					'add_new'               => __( 'Add New', 'custom-block-books-list' ),
					'add_new_item'          => __( 'Add New Book', 'custom-block-books-list' ),
					'new_item'              => __( 'New Book', 'custom-block-books-list' ),
					'edit_item'             => __( 'Edit Book', 'custom-block-books-list' ),
					'view_item'             => __( 'View Book', 'custom-block-books-list' ),
					'all_items'             => __( 'All Books', 'custom-block-books-list' ),
					'search_items'          => __( 'Search Books', 'custom-block-books-list' ),
				),
				'public'         => true,
				'show_in_rest'   => true,
				'supports'       => array( 'title' ),
				'menu_icon'      => 'dashicons-book',
			)
		);
	}
);
?>
