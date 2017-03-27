<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
<header class="container-fluid logo">
	<a href="<?Php echo get_bloginfo( 'url' ); ?>">
		<img src="<?php echo get_template_directory_uri() . '/img/header_bg_new.png'; ?>" class="img-responsive" alt="Justin Scarred" />
	</a>
</header>
<nav class="header container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="http://www.justinscarred.com/shop">Hats & Shirts</a></li>
					<li><a href="http://www.justinscarred.com/pins">Pins</a></li>
					<li><a href="https://www.patreon.com/justinscarred">Patreon</a></li>
					<li><a href="https://www.facebook.com/groups/thesometimesmob">The Sometimes Mob</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
