<?php
require_once("/home/moemoe/programs/maker/php/MakeFont.class.php");
$filename = (isset($_POST["filename"])) ? $_POST["filename"] : "test";

$fontname_e = (isset($_POST["fontname_e"])) ? $_POST["fontname_e"] : "test font";
$fontname_j = (isset($_POST["fontname_j"])) ? $_POST["fontname_j"] : "テスト　フ
ォント";
$authorname = (isset($_POST["authorname"])) ? $_POST["authorname"] : "UNKNOWN";

$filepath = MakeFont::make($filename, $fontname_e, $fontname_j, $authorname);

if(file_exists($filepath) === true){
	header('Content-Disposition: attachment; filename="'.$filename.'.ttf"');
	header('Content-Type: application/octet-stream');
	header('Content-Length: '.filesize($filepath));
	readfile($filepath);
    exec("cp {$filepath} /home/moemoe/maked_fonts/backup/");
    exec("rm -rf {$filepath}");
} else {
	echo "フォントの作成に失敗しました。";
}
