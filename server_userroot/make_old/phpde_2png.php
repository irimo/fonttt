<?php
require_once("imagecreatefrombmp.function.php");
class ImageConvert {
  var $dir;
  var $code;
  var $bmpDir;
  var $svgDir;
  function __construct($dir){ 
    $this->dir = $dir;
    $this->bmpDir = "/home/moemoe/maked_fonts/{$dir}/bmps/";
    $this->pgmDir = "/home/moemoe/maked_fonts/{$dir}/pgms/";
    $this->svgDir = "/home/moemoe/maked_fonts/{$dir}/svgs/";
  }
// no use
  public function setPNG($code,$fileobj){
    $this->code = $code;
    switch($fileobj["type"]){
      case "image/pjpeg":
      case "image/jpeg":
        $image = imagecreatefromjpeg($fileobj["tmp_name"]); 
        break;
      case "image/png":
      case "image/x-png":
        $image = imagecreatefrompng($fileobj["tmp_name"]); 
        break;
      case "image/gif":  
        $image = imagecreatefrompng($fileobj["tmp_name"]); 
        break;
      case "image/bmp":
echo "case start";
if(function_exists(imagecreatefrombmp))echo "aru"; else echo "nai";
        $image = imagecreatefrombmp($fileobj["tmp_name"]);
echo "function success";
        break;
      case "image/wbmp";
        $image = imagecreatefromwbmp($fileobj["tmp_name"]);
        break;
      default:
        return false;
    }
echo $this->bmpDir.$this->code.".png";
    imagepng($image, $this->bmpDir.$this->code.".png");
    return true;
  }

  public function makeSVG($code,$file_obj){i
    $imgname = $file_obj["file_name"];
    $cmd_pgm = "convert {$imgname} {$this->pgmDir}{$code}.pgm";
    $cmd_svg = "potrace -s -a 1 -k 0.9 {$this->pgmDir}{$this->code}.pgm -W10cm -H 10cm->{$this->svgDir}{$this->code}.svg";
    system($cmd_pgm);
    system($cmd_svg);
  }
}
