<?php
	get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">

			<h1><?php echo __("Category:", "wcms"); ?> <?php single_cat_title(); ?></h1>

			<p><?php echo __("Showing posts from the category", "wcms"); ?> <?php single_cat_title(); ?></p>

			<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post(); // <-- mkt viktig!! :) lol
						?>
							<article class="post">
								<header>
									<h2 class="the-title"><?php the_title(); ?></h2>
								</header>
								<main class="the-content">
									<?php the_excerpt(); ?>
								</main>
							</article>
						<?php
					}
				} else {
					// inget innehåll finns
					_e("Sorry, could not find any posts in that category *much sorry*", "wcms");
				}
			?>

		</div><!-- /.col-md-9 -->
		<div class="col-md-3">
			<?php
				get_sidebar();
			?>
		</div><!-- /.col-md-3 -->
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
	get_footer();
?>