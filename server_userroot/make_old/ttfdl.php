<?php

$tmp_dir = "001";
$font = "hoge";
$filepath = DIRNAME(__FILE__)."/../maked_fonts/".$tmp_dir."/".$tmp_dir.".ttf";
if(file_exists($filepath) === true){
	header('Content-Disposition: attachment; filename="'.$font.'.ttf"');
	header('Content-Type: application/octet-stream');
	header('Content-Length: '.filesize($filepath));
	readfile($filepath);
} else {
	echo "";
}
