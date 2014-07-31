<?php
require_once("/home/moemoe/programs/maker/php/ImageConvert.class.php");


$filename = (isset($_POST["filename"])) ? $_POST["filename"] : "test";
$fontname_e = (isset($_POST["fontname_e"])) ? $_POST["fontname_e"] : "test font";
$fontname_j = (isset($_POST["fontname_j"])) ? $_POST["fontname_j"] : "テスト　フォント";
$authorname = (isset($_POST["authorname"])) ? $_POST["authorname"] : "UNKNOWN";
$tmp_dir = "001";

$obj = new ImageConvert("001");

#foreach($_FILES as $key -> $value){
for($i=0x21; $i<=0x7e;$i++){
  $obj->setBMP($_FILES["u0041"]);
  $obj->makeSVG("u".sprintf("%04x",$i));
}


$cmd = "fontforge /home/moemoe/programs/maker/python/fontmaker.pe \"{$filename}\" \"{$fontname_e}\" \"{$fontname_j}\" \"{$authorname}\" \"{$tmp_dir}\"";
#echo $cmd;
system($cmd);


$filepath = "/home/moemoe/maked_fonts/".$tmp_dir."/".$filename.".ttf";
// echo $filepath;
if(file_exists($filepath) === true){
	header('Content-Disposition: attachment; filename="'.$filename.'.ttf"');
	header('Content-Type: application/octet-stream');
	header('Content-Length: '.filesize($filepath));
	readfile($filepath);
} else {
	echo "";
}
