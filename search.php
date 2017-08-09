<?php
	get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Very Google Search</h1>

			<hr />

			<h2>Search For Moar</h2>
			<?php get_search_form(); ?>

			<hr />

			<h2>Search Results</h2>
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
					_e("Sorry, could not find anything matching your search query *very sad*", "wcms");
				}
			?>

		</div><!-- /.col-md-12 -->
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
	get_footer();
?>