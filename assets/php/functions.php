<?php

include 'parsedown.php';

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
    if ($_SERVER['QUERY_STRING'] != '') {
        $dir = 'content/'. $_SERVER['QUERY_STRING'] . '/';
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
        echo "<style>.content h1 {font-size:4em; }#pp-nav, .page-count {display:none;} .help {display:block;}</style><div class='section'><div class='container'><div class='columns is-vcentered is-centered'><div class='column is-6 move'><div class='content has-text-white has-text-centered'>";
        echo $Parsedown->text($content[0]);
        echo "</div></div></div></div></div>";
    }
}

function get_dirs()
{
    $dirs = glob('content/*', GLOB_ONLYDIR);
    natsort($dirs);
    $menu_id = 0;
    foreach ($dirs as $dir) {
        $d1 = explode('/', $dir);
        $d2 = strstr($d1[1], '-');
        $d3 = str_replace('-', ' ', $d2);
        $d4 = ltrim($d3);
        $d5 = ucfirst($d4);
        echo "<li><a id='menu-$menu_id' class='dirs' href='?$d1[1]'>$d5</a></li>";
        $menu_id++;
    }
}
