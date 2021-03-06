<?php
/*
Template Name: Fullwidth Template
*/

	get_header();

	if (have_posts()) {
		while (have_posts()) {
			the_post();

			get_template_part('content-templates/page', 'fullwidth');
		}
	} else {
		_e('Sorry, could not find that page for you *sad face*', 'wcms');
	}

	get_footer();
?>