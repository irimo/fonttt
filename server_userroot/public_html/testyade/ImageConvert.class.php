<?php
class ImageConvert {
  var $dir;
  var $bmpDir;
  var $bmpPath;
  var $processDir;
  function __construct($dir){ 
    $this->dir = $dir;
    $this->bmpDir = "/home/moemoe/maked_fonts/{$dir}/bmps/";
    $this->processDir = "/home/moemoe/maked_fonts/{$dir}/processimgs/";
  }
  public function setBMP($file_obj){
    if(file_exists($file_obj["tmp_name"])){
      $this->bmpPath = $this->bmpDir.$file_obj["name"];
      $cmd = "cp {$file_obj["tmp_name"]} {$this->bmpPath}";
      exec($cmd);
      return true;
    } else {
      return false;
    }
  }
  

  public function makeSVG($code){
    $cmd_pgm = "/usr/local/bin/convert {$this->bmpPath} {$this->processDir}{$code}.pgm";
    $cmd_svg = " /usr/local/bin/potrace -s -a 1 -k 0.9 {$this->processDir}{$code}.pgm -W10cm -H 10cm";
    exec($cmd_pgm);
    exec($cmd_svg);
  }
}
