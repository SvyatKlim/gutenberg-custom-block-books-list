/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';

import {useBlockProps} from '@wordpress/block-editor';
import {Button} from "@wordpress/components";

export default function Edit({attributes, setAttributes}) {
	const {books} = attributes;

	async function fetchBooks() {
		return await fetch(`/wp-json/custom-plugin/v1/books`)
			.then(res => res.json())
			.then(data => setAttributes({books: data}))
			.catch((err) => console.log(err));
	}

	console.log(books)
	return (
		<div {...useBlockProps()}>
			<h2>Books list</h2>
			<Button onClick={() => fetchBooks()}>
				Load books
			</Button>

			<ul>
				{books.map((book) => (
					<li key={book.id}><strong>{book.title}</strong> - {book.author} - {book.date}</li>
				))}
			</ul>
		</div>
	);
}
