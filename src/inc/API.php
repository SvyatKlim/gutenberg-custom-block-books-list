<?php

namespace BooksAPI;

defined('ABSPATH') || exit;

class API
{
	public function __construct()
	{
		add_action('rest_api_init',[$this,'register_routes']);
	}

	public function register_routes()
	{
		register_rest_route('custom-plugin/v1', '/books', array(
			'methods' => 'GET',
			'callback' => [$this, 'get_books'],
			'permission_callback' => '__return_true'
		));
	}

	public function get_books(\WP_REST_Request $request)
	{
		$post = get_posts([
			'post_type' => 'books',
			'posts_per_page' => 5,
			'orderby' => 'date',
			'order' => 'DESC',
		]);

		$books = array_map(function ($post) {
			return [
				'id' => $post->ID,
				'title' => $post->post_title,
				'author' => $post->post_author,
				'date' => $post->post_date,
			];
		}, $post);

		return $books;
	}


}

