<?php get_header(); the_post(); ?>

<div class="row">
	<div class="col-sm-6">
		<div class="content">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	</div>
	<div class="col-sm-6 share-your-quest">
		<h2>Share Your Quest</h2>
		<p>
			Finding the positive in life can really be hard sometimes. We all have our own Quest 4 Positivity.
		</p>
		<p>
			Share rules you have to get through your quest. Each one of us is different, but can learn from each other on our own quests.
		</p>
		<hr />
		<div id="schleep_well" style="display: none" class="text-center">
			<h4>You've Done Your Duty!</h4>
			<img src="<?php echo get_template_directory_uri(). '/schleep_well.jpg'; ?>" class="img-responsive" alt="Justin Scarred Quest For Positivity" />
		</div>
		<form class="form" id="share_quest_form">
			<div class="form-group">
				<label for="quest_text">What rule do you have for <strong>your</strong> Quest 4 Positivity?</label>
				<textarea required id="quest_text" class="form-control" name="quest_text" placeholder="Circumstances are out of your control, how you react is."></textarea>
			</div>
			<div class="form-group">
				<label for="quest_name">Your Name or Handle</label>
				<input required id="quest_name" placeholder="Name" name="quest_name" class="form-control" />
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-block" type="submit" value="Do Your Duty" />
			</div>
		</form>
	</div>
</div>

<div class="row content" style="margin-top: 40px;">
	<div class="col-sm-12">
		<h2>What Others Have Shared</h2>
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