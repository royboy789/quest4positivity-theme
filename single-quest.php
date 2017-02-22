<?php get_header();  ?>
<?Php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h1>A Quest for Positivity Mantra</h1>
		<blockquote>
			<?php the_content(); ?>
			<em><?php the_title(); ?></em>
			<br />
			<div class="addthis_toolbox" addthis:url="<?php echo get_bloginfo('url'); ?>" addthis:title="<?php echo get_the_content() . ' #Q4P'; ?>">
				<a class="addthis_button_facebook"></a>
				<a class="addthis_button_twitter"></a>
			</div>
		</blockquote>
		<h2>More Quest For Positivity</h2>
		<?php
		$args = array( 'post_type' => 'quest', 'posts_per_page' => -1, 'post__not_in' => array( get_the_ID() ) );
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
			?>
			<blockquote>
				<?php the_content(); ?>
				<em><?php the_title(); ?></em>
				<br />
				<div class="addthis_toolbox" addthis:url="<?php echo get_bloginfo('url'); ?>" addthis:title="<?php echo get_the_content() . ' #Q4P'; ?>">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_twitter"></a>
				</div>

			</blockquote>
		<?php endwhile; endif; wp_reset_query(); ?>
	</div>
</div>
<?php endwhile; else: echo '<p>nothing found</p>'; endif; ?>
<?php get_footer(); ?>