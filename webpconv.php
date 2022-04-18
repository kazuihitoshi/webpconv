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
  }
  if ($img){
    imagewebp($img,$file.'.webp');
    imagedestroy($img);
  }
  return 0;
}