<footer class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 copyright">
				&copy; <?php echo date('Y'); ?>
				<em>site built by sometimes mobster &amp; <a href="https://roysivan.com" target="_blank">Web Developer, Roy</a></em>
			</div>
			<div class="col-sm-4">
				<div class="social-links">
					<a href="https://www.facebook.com/justinscarred/">
						<i class="fa fa-facebook-square"></i>
					</a>
					<a href="https://www.youtube.com/user/justinscarred">
						<i class="fa fa-youtube-square"></i>
					</a>
					<a href="https://twitter.com/JustinSCARRED">
						<i class="fa fa-twitter-square"></i>
					</a>
					<a href="https://www.instagram.com/livefastdiepoor/?hl=en">
						<i class="fa fa-instagram"></i>
					</a>
				</div>
			</div>
			<nav class="col-sm-5 text-right">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '' ) ); ?>
			</nav>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>