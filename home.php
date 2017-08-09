<?php
	get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">

			<div class="container">
				<div class="row">
					<?php
						if (have_posts()) {
							while (have_posts()) {
								the_post(); // <-- mkt viktig!! :) lol
								?>
									<article class="post col-md-4">
										<div class="post-thumbnail-wrapper">
											<?php the_post_thumbnail(null, 'post-thumbnail', array('class' => 'card-img-top')); ?>
										</div>
										<div class="card-block">
											<header>
												<h4 class="the-title card-title"><?php the_title(); ?></h4>
											</header>
											<main class="the-content card-text">
												<?php the_excerpt(); ?>
											</main>
										</div><!-- /.card-block -->
									</article>
								<?php
							}
						} else {
							// inget innehåll finns
							_e("Sorry, could not find any posts for you *much sorry*", "wcms");
						}
					?>
				</div><!-- /.row -->
			</div><!-- /.container -->

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