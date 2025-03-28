<?php

namespace BooksAPI;

defined('ABSPATH') || exit;

class API {

	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function register_routes() {
		register_rest_route(
			'custom-plugin/v1',
			'/books',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this, 'get_books' ),
				'permission_callback' => '__return_true',
			)
		);
	}

	public function get_books( \WP_REST_Request $request ) {
		$posts = get_posts(
			array(
				'post_type'      => 'books',
				'posts_per_page' => 5,
				'orderby'        => 'date',
				'order'          => 'DESC',
			)
		);

		$books = array_map(
			function ( $post ) {
				$author = get_post_meta( $post->ID, 'author', true );

				return array(
					'id'     => $post->ID,
					'title'  => $post->post_title,
					'author' => $author ? $author : 'Unknown Author',
					'date'   => $post->post_date,
				);
			},
			$posts
		);

		return $books;
	}
}

