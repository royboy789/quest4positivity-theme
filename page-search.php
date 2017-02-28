<?php get_header(); the_post(); ?>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2 content">
		<form class="form" method="GET" action="/">
			<input type="hidden" name="post_type" value="quest" />
			<div class="form-group">
				<label for="quest_name">Search For</label>
				<input required id="quest_name" placeholder="Search For..." name="s" class="form-control" />
			</div>
			<div class="form-group">
				<label for="quest_author">Author</label>
				<input id="quest_author" placeholder="Author Search" name="author" class="form-control" />
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-block" type="submit" value="Schearch Well" />
			</div>
		</form>
	</div>
</div>

<div class="row content" style="margin-top: 40px;">
	<div class="col-sm-12">
		<h2>All</h2>
		<?php
		$args = array( 'post_type' => 'quest', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
			?>
			<blockquote>
				<?php the_content(); ?>
				<em><?php the_title(); ?></em>
			</blockquote>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>