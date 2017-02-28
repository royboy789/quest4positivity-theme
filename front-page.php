<?php get_header(); the_post(); ?>

<div class="quest-bg"></div>
<div class="container-fluid share-quest-container">
	<div class="container">
		<div class="row share-quest">
			<div class="col-sm-6 content">
				<h2>What Others Have Shared</h2>
				<?php
				$args = array( 'post_type' => 'quest', 'posts_per_page' => -1 );
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
			<div class="col-sm-6 content">
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
						<label for="quest_author">Author of Quote</label>
						<input required id="quest_author" placeholder="Justin Scarred" name="quest_author" class="form-control" />
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

<div class="container-fluid about-q4p-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 content">
				<h2>The Origins of Quest for Positivity</h2>
				<p>
					I know the origin of the quest from Justin Scarred videos on <a href="https://www.youtube.com/user/justinscarred" target="_blank">Youtube</a>. <br/>
					I have upped my quest since watching Justin! Here is the first video I saw with it, and its a good origin point.
				</p>
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5N8rb_ktZhQ?feature=oembed"></iframe>
				</div>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>