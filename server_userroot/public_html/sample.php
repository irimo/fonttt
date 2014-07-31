<?php

$file = $_GET["f"];
$font = DIRNAME(__FILE__)."/../maked_fonts/backup/{$_GET["f"]}";

$string = {"いろはにほへと　ちりぬるを",
"トンネルを抜けるとそこは雪国だった。",
"It's a greatful font! thank you for making."}

$w = 500;
$h = 350;
$image = imagecreatetruecolor($w, $h);
$work = imagecreatetruecolor(1,1);
$white = imagecolorallocate($work, 0xff, 0xff, 0xff);
$black = imagecolorallocate($work, 0, 0, 0);
imagefilledrectangle($image,0,0,$w,$h,$white);
foreach($string as $line){
  imagettftext($image,"10px", 0, 20,20, $black, $font, $line);
}
