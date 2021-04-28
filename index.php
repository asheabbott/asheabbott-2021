<?php get_header();

while (have_posts()) {
	the_post(); ?>

	<header class="page-header">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</header>

	<section class="content">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</section>
<?php }

get_footer(); ?>