<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'assets/php/Parsedown.php';

$Parsedown = new Parsedown();

function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

function read_file($md_file)
{
    $myfile = fopen($md_file, 'r') or die('Unable to open file!');
    $texts = fread($myfile, filesize($md_file));
    $halves = explode('HALFWAY-POINT', $texts);
    fclose($myfile);
    return $halves;
}

function all($Parsedown)
{
    if (isset($_REQUEST['p'])) {
        $dir = 'content/'. $_REQUEST['p'] . '/';
        $files = glob($dir . '*.md', GLOB_BRACE);
        $c = 0;
				natsort($files);
        foreach ($files as $file) {
            $c++;
            $col = 'section' . $c;
            $content = read_file($file, $Parsedown);
            echo "<div class='section' id='$col'><div class='container'><div class='columns is-vcentered is-centered'>";
            foreach ($content as $half) {
                echo "<div class='column is-6 move'><div class='content has-text-white has-text-left'>";
                echo $Parsedown->text($half);
                echo "</div></div>";
            }
            echo "</div></div></div>";
        }
    } else {
        $content = read_file('content/index.md', $Parsedown);
        echo "<style>#pp-nav, .page-count {display:none;}</style><div class='section'><div class='container'><div class='columns is-vcentered is-centered'><div class='content'><h1 class='is-size-1'>TUTOR PILES</h1></div></div></div></div>";
    }
}

function get_dirs()
{
    $dirs = glob('content/*', GLOB_ONLYDIR);
		natsort($dirs);
		foreach ($dirs as $dir) {
        $d1 = explode('/', $dir);
        $d2 = strstr($d1[1], '-');
        $d3 = str_replace('-', ' ', $d2);
        $d4 = ltrim($d3);
        $d5 = ucfirst($d4);
        echo "<li><a href='?p=$d1[1]'>$d5</a></li>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Tutor Piles</title>
	<meta name="author" content="impshum">
	<meta name="description" content="Piles">
	<link rel="stylesheet" href="assets/css/bulma.min.css">
	<link rel="stylesheet" href="assets/css/pagepiling.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/ani.css">
	<link rel="stylesheet" href="assets/css/atom-one-dark.min.css">
</head>

<body>

	<div id="pagepiling">
		<?php all($Parsedown); ?>
	</div>

	<div class="page-count animated fadeInLeft delay-2s"><span class="pager">1</span>/<span class="paged">1</span></div>
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
