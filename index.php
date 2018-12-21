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

	<div class="home animated slideInLeftClock delay-4s">
				<a class="home" href='index.php'><img src="assets/img/home.png"></a>
	</div>

	<div class="toggler animated slideInLeftClock delay-1s">
		<a class="menu-toggle"><img src="assets/img/menu.png"></a>
	</div>

	<div class="page-count animated slideInRightClock delay-2s">
		<span class="pager">1</span>/<span class="paged">1</span>
	</div>

	<div class="help animated fadeInRight delay-2s">
		<a class="help-toggle"><img src="assets/img/help.png"></a>
	</div>

	<div class="digital-clock animated slideInRightClock delay-3s"><span></span></div>

	<div class="menu-container">
		<a class="remote"><img src="assets/img/remote.png"></a>
		<aside class="menu">
		  <p class="menu-label">Slides</p>
		  <ul class="menu-list">
				<?php get_dirs(); ?>
		  </ul>
		</aside>
	</div>

	<div class="help-container">
		<div class="content has-text-white">
			<h3>Help</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
	</div>


	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/pagepiling.min.js"></script>
	<script src="assets/js/highlight.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>

</html>
