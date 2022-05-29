#!/usr/local/bin/php
<?php
if ($argc == 1 ) {
  echo "Usage:".$argv[0]." [jpg or png filename]...\n";
  return(0);
}
foreach ( $argv as $key => $arg ){
  if ($key == 0)continue; 
  webpconvert($arg);
}
function webpconvert($file){
  $webp = $file.'.webp';
  if (!file_exists($file))return (false);
  if (file_exists($webp))return (true);
  $ext = mb_strtolower(pathinfo($file)['extension']);
  $img = null;
  switch ($ext)
  {
  case 'png':
    $img = imagecreatefrompng($file);
    break; 
  case 'jpeg':
  case 'jpg':
    $img = imagecreatefromjpeg($file);
    break; 
  case 'gif':
    $img = imagecreatefromgif($file);
    break; 
  }
  if (!imageistruecolor($img)){
     if( !imagepalettetotruecolor($img) ){
         return false;
     }
  }
  if ($img){
    imagewebp($img,$file.'.webp');
    imagedestroy($img);
  }
  return true;
}
