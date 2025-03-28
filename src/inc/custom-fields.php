<?php
defined( 'ABSPATH' ) || exit;
add_action( 'add_meta_boxes_books', 'add_book_details_meta_box' );

function add_book_details_meta_box( $post ) {
	add_meta_box(
		'book_details',
		'Book Details',
		'book_details_callback',
		'books',
		'normal',
		'default'
	);
}

function book_details_callback( $post ) {
	$author = get_post_meta( $post->ID, 'author', true );
	?>
	<label for="author">Author:</label>
	<input type="text" id="author" name="author" value="<?php echo esc_attr( $author ); ?>" style="width: 100%;">
	<?php
}

add_action( 'save_post_books', 'save_book_details' );

function save_book_details( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['author'] ) ) {
		update_post_meta( $post_id, 'author', $_POST['author'] );
	}
}
?>
