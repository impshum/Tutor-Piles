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
    $dir = 'content/';
    $files = glob($dir . '*.md', GLOB_BRACE);
    $c = 0;

    foreach ($files as $file) {
				$c++;
        $col = 'section' . $c;
        $content = read_file($file, $Parsedown);

        echo "
				<div class='section' id='$col'>
					<div class='container'>
					  <div class='columns is-vcentered is-mobile is-centered'>
						";
        foreach ($content as $half) {
            echo "
						    <div class='column is-6 move'>
						      <div class='content has-text-white has-text-left'>";
          echo $Parsedown->text($half);
          echo "</div></div>";
        }
        echo "
					  </div>
					</div>
				</div>
				";
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
	<!--link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/monokai-sublime.min.css"-->
</head>

<body>

	<div id="pagepiling">
		<?php all($Parsedown) ?>
	</div>

	<div class="page-count animated fadeInLeft delay-4s"><span>1</span>/5</div>

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/pagepiling.min.js"></script>
	<script src="assets/js/highlight.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>

</html>
