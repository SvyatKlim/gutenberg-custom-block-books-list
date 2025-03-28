<?php
$heading = isset($attributes['heading']) ? $attributes['heading'] : 'Some title';

?>
<div>
	<div class="wp-block-custom-block-books-list">
		<h2 class=""><?php echo $heading ?></h2>
		<button class="wp-block-custom-block-books-list__btn js-fetch-btn">
			Load books
		</button>

		<ul class="wp-block-custom-block-books-list__items js-books-list">
		</ul>
	</div>
</div>
