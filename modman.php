<?php

error_reporting(E_ALL);

init();

function init(){
  $dir = getcwd();
  $folder = array("app","js","lib","media","skin");
  if(is_dir($dir)){
    $temp = scandir($dir);
    foreach ($temp as $key => $value)
      if(in_array($value, $folder))
        read($dir.'/'.$value);
  }
}

function read($item){
  $base = getcwd()."/";
  $exclude = array(".","..");
  if(is_dir($item)){
    $temp = scandir($item);
    foreach ($temp as $key => $value)
      if(!in_array($value,$exclude))
        read($item."/".$value);
  }
  if(except($item)){
    $path = str_replace($base,"",$item);
    echo $path."&nbsp;&nbsp;".$path."<br/>";
  }
}

function except($item){
  $except = array("enterprise");
  foreach ($except as $key => $value) {
    if(strpos($item,$value) > 0){
      return false;
    }
  }
  return true;
}
