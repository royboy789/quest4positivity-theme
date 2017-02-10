<?php get_header(); the_post(); ?>

<div class="row">
	<div class="col-sm-12">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>