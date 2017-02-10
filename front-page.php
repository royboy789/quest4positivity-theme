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
		<form class="form">
			<div class="form-group">
				<label for="quest_text">What rule do you have for <strong>your</strong> Quest 4 Positivity?</label>
				<textarea id="quest_text" class="form-control" name="quest_text" placeholder="Circumstances are out of your control, how you react is."></textarea>
			</div>
			<div class="form-group">
				<input class="btn btn-primary btn-block" type="submit" value="Do Your Duty" />
			</div>
		</form>
	</div>
</div>

<?php get_footer(); ?>