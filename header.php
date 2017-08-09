<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php bloginfo('name'); ?></title>

	<?php
		wp_head();
	?>
</head>

<body <?php echo body_class(); ?>>

	<div class="navbar-wrapper">
		<nav class="navbar navbar-toggleable-md navbar-light">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>

				<?php
					wp_nav_menu(array(
						'theme_location'		=> 'header-menu',
						'container'				=> 'div',
						'container_class'		=> 'collapse navbar-collapse',
						'container_id'			=> 'navbarNavDropdown',
						'menu_class'			=> 'navbar-nav',
						'fallback_cb'			=> '__return_false',
						'items_wrap'			=> '<ul id="%1$s" class="%2$s ml-auto">%3$s</ul>',
						'depth'					=> 2,
						'walker'				=> new bootstrap_4_walker_nav_menu(),
					));
				?>

				<!-- search form -->
				<form id="top-search-form" role="search" method="get" class="search-form form-inline my-2 my-lg-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" id="" class="search-field form-control mr-sm-2" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
				</form>

				<!-- search -->
				<button id="top-search-button" class="btn btn-outline-success my-2 my-sm-0"><span class="fa fa-search"></span></button>
				<!-- /search -->

			</div><!-- /.container -->
		</nav>
	</div><!-- /.navbar-wrapper -->