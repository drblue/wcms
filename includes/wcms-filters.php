<?php

function wcms_custom_excerpt_length($length) {
	return 45;
}
add_filter('excerpt_length', 'wcms_custom_excerpt_length');

function wcms_excerpt_more($more) {
	return sprintf('<br /><a class="read-more btn btn-primary" href="%1$s">%2$s</a>',
		get_permalink(get_the_ID()),
		__('Read More', 'wcms')
	);
}
add_filter('excerpt_more', 'wcms_excerpt_more');

function wcms_body_classes($classes) {
	$id = get_queried_object_id();
	if (has_post_thumbnail($id)) {
		$classes[] = 'has-featured-image';
	} else {
		$classes[] = 'no-featured-image';
	}
	return $classes;
}
add_filter('body_class', 'wcms_body_classes');

function wcms_we_like_bad_words($bad_text) {
	$good_text = str_replace(array('Volkswagen', 'Volvo', 'Tesla'), '', $bad_text);

	return $good_text;
}
add_filter('the_content', 'wcms_we_like_bad_words');
