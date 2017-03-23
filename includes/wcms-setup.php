<?php

require_once("wp-bootstrap-navwalker.php");

function wcms_setup() {
	// Registrera vår huvudmeny
	register_nav_menu('header-menu', __('Header Menu', 'wcms'));
}
add_action('after_setup_theme', 'wcms_setup');

function wcms_sidebars() {
	// registrera blog sidebar
	register_sidebar(array(
		'name'			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'before_widget'	=> '<li class="widget">',
		'after_widget'	=> '</li>',
		'before_title'	=> '<h2>',
		'after_title'	=> '</h2>',
	));
}
add_action('widgets_init', 'wcms_sidebars');

function wcms_scripts_and_styles() {

	// Ladda in Bootstrap 4 styles
	wp_enqueue_style('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', array(), '4.0.0-alpha.6', 'all');

	// Ladda in våra egna styles
	wp_enqueue_style('wcms-site', get_template_directory_uri() . '/assets/css/site.css', array('bootstrap4'), '2017032301', 'all');

	// Ladda in jQuery (ta bort inbyggda versionen först)
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.slim.min.js', array(), '3.1.1', true);

	// Ladda in Tether
	wp_enqueue_script('tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', array('jquery'), '1.4.0', true);

	// Ladda in Bootstrap javascript
	wp_enqueue_script('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array('jquery', 'tether'), '4.0.0-alpha.6', true);
}
add_action('wp_enqueue_scripts', 'wcms_scripts_and_styles');
