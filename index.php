<?php include "assets/php/functions.php"; ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Tutor Piles</title>
	<meta name="author" content="impshum">
	<meta name="description" content="Slideshow software for programming tutors">
	<link rel="stylesheet" href="assets/css/bulma.min.css">
	<link rel="stylesheet" href="assets/css/pagepiling.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/ani.css">
	<link rel="stylesheet" href="assets/css/atom-one-dark.min.css">
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>

	<div id="pagepiling">
		<?php all($Parsedown); ?>
	</div>

	<div class="page-count animated fadeInLeft delay-2s">
		<span class="pager">1</span>/<span class="paged">1</span>
	</div>

	<div class="menu-trigger">
		<a class="home" href='index'><img src="assets/img/home.png"></a>
		<aside class="menu">
		  <p class="menu-label">Slides</p>
		  <ul class="menu-list">
				<?php get_dirs(); ?>
		  </ul>
		</aside>
	</div>

	<div class="digital-clock animated fadeInRight delay-2s">00:00:00</div>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/pagepiling.min.js"></script>
	<script src="assets/js/highlight.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>

</html>
