<?php

$font = "masaru";
$filepath = DIRNAME(__FILE__)."/../font/".$font.".zip";
if(file_exists($filepath) === true){
	header('Content-Disposition: attachment; filename="'.$font.'.zip"');
	header('Content-Type: application/octet-stream');
	header('Content-Length: '.filesize($filepath));
	readfile($filepath);
} else {
	echo "";
}
