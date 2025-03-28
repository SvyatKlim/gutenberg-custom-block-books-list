/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';

import {RichText, useBlockProps} from '@wordpress/block-editor';
import {Button} from "@wordpress/components";

export default function Edit({attributes, setAttributes}) {
	const {books , heading} = attributes;

	async function fetchBooks() {
		return await fetch(`/wp-json/custom-plugin/v1/books`)
			.then(res => res.json())
			.then(data => setAttributes({books: data}))
			.catch((err) => console.log(err));
	}

	console.log(books)
	return (
		<div {...useBlockProps()}>
			<RichText
				tagName="h2"
				value={heading}
				onChange={(newHeading) => setAttributes({ heading: newHeading })}
				placeholder={__('Enter Heading...', 'custom-block-books-list')}
			/>
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
