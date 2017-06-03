<?php get_header(); the_post(); ?>

<div class="quest-bg"></div>
<div class="container-fluid share-quest-container">
	<div class="container">
		<div class="row share-quest">
			<div class="col-sm-6 content">
				<h2>Quest For Positivity Wins!</h2>
				<div class="all-quests-wrapper">
					<?php
					$args = array( 'post_type' => 'wins', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
						?>
						<article>
							<blockquote>
								<?php the_content(); ?>
								<?Php
									if( $quest_author = get_post_meta( $post->ID, 'quest_author', true ) ) {
										echo '<em>- ' . $quest_author . '</em>';
									}
								?>
							</blockquote>
							<em><?php the_title(); ?></em>
							<div>
								<a title="like this" class="thumbs-up" data-id="<?php echo get_the_ID(); ?>" href="#">
									<i class="glyphicon glyphicon-thumbs-up"></i>
									<?php if ( $likes = get_post_meta( $post->ID, 'likes', true ) ) : echo '<span class="count">' . $likes . '</span> people like this'; endif; ?>
								</a>
							</div>
							<div class="addthis_toolbox" addthis:url="<?php echo get_bloginfo('url'); ?>" addthis:title="<?php echo get_the_content() . ' #Q4P'; ?>">
								<a class="addthis_button_facebook"></a>
								<a class="addthis_button_twitter"></a>
								<a title="report this" class="red report" data-id="<?php echo get_the_ID(); ?>" href="#">
									<i class="glyphicon glyphicon-flag"></i>
								</a>
							</div>
						</article>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>
			</div>
			<div class="col-sm-6 content">
				<h2>Share Your Win</h2>
				<p>
					The quest can be hard, it can be tough. Sometimes you get a small win, sometimes you get a big win. Every win matters, every win helps and should motivate you to push harder
				</p>
				<p>
					Share your win below!
				</p>
				<hr />
				<div id="schleep_well" style="display: none" class="text-center">
					<h4>You've Done Your Duty!</h4>
					<img src="<?php echo get_template_directory_uri(). '/schleep_well.jpg'; ?>" class="img-responsive" alt="Justin Scarred Quest For Positivity" />
				</div>
				<form class="form" id="share_quest_win_form">
					<div class="form-group">
						<label for="quest_text">What rule do you have for <strong>your</strong> Quest 4 Positivity?</label>
						<textarea required id="quest_text" class="form-control" name="quest_text" placeholder="You can’t control your circumstances, but you *can* control how you react to them"></textarea>
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
	</div>
</div>

<?php get_footer(); ?>