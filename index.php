<?php get_header();  ?>
<?Php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<div class="row">
	<div class="col-sm-12">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; else: echo '<p>nothing found</p>'; endif; ?>
<?php get_footer(); ?>