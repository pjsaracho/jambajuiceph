<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php get_title(); ?></title>

	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body> 
	<nav class="navbar">
		<?php require_once('partials/nav.html'); ?>
	</nav>
	<div id="banner">
		<?php require_once('partials/banner.html'); ?>
	</div>
	<div id="wrapper" class="container">
		<div id="content_area">
			<?php display_content(); ?>
		</div>

		<div id="sidebar">
			<?php require_once('partials/sidebar.php'); ?>
		</div>
	</div>
	<footer>
		<?php require_once('partials/footer.html'); ?>
	</footer>
</body>
</html>