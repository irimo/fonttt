<?php
$path = "/home/moemoe/programs/maker/php/ImageConvert.class.php";
#echo  (file_exists($path)) ? "true" : "false";
require_once($path);
echo "<pre>";
//var_dump($_FILES["u3012"]);
//var_dump($_FILES);i

$obj = new ImageConvert("001");
$obj->setBMP($_FILES["u3012"]);
$obj->makeSVG("u3012");
