<?php

require_once("wp-bootstrap-navwalker.php");

// Sätt alla inställningar som krävs för temat
function wcms_setup() {

	// Lägg till vilka storlekar bilderna i vårt tema behöver ha.
	add_image_size('page-featured-image', 2580, 450, array('center', 'center'));
	add_image_size('post-featured-image', 760, 9999, false);

	// Lägg till stöd för featured images och post thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(150, 150, false);

	// Registrera vår huvudmeny
	register_nav_menu('header-menu', __('Header Menu', 'wcms'));
}
add_action('after_setup_theme', 'wcms_setup');

// Registrera alla sidebars
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

// Ladda in styles och scripts
function wcms_scripts_and_styles() {

	// Ladda in Bootstrap 4 styles
	wp_enqueue_style('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', array(), '4.0.0-alpha.6', 'all');

	// Ladda in Font Awesome
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');

	// Ladda in våra egna styles
	wp_enqueue_style('wcms-site', get_template_directory_uri() . '/assets/css/site.css', array('bootstrap4'), '2017032301', 'all');

	// Ladda in jQuery (ta bort inbyggda versionen först)
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.1.1.slim.min.js', array(), '3.1.1', true);

	// Ladda in Tether
	wp_enqueue_script('tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', array('jquery'), '1.4.0', true);

	// Ladda in Bootstrap javascript
	wp_enqueue_script('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array('jquery', 'tether'), '4.0.0-alpha.6', true);

	wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'bootstrap4'), '2017033001', false);
}
add_action('wp_enqueue_scripts', 'wcms_scripts_and_styles');

// Ladda in språk
function wcms_load_theme_textdomain() {
	load_theme_textdomain('wcms', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'wcms_load_theme_textdomain' );
