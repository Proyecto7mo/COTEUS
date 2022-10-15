<?php

header("content-type: image/png");

$image = imagecreate(90, 60);
$color_fondo = imagecolorallocate($image, 59, 66, 255);
$color_texto = imagecolorallocate($image, 255, 255, 255);

function generate_chars($chars, $length){
  $captcha = null;
  for($i = 0; $i < $length; $i++){
    $rand = rand(0, count($chars) - 1);
    $captcha .= $chars[$rand];
  }

  return $captcha;
}

$captcha = generate_chars(array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h'), 4);
setcookie('captcha', sha1($captcha), time()+60*3);

imagettftext($image, 22, 15, 16, 47, $color_texto, "C:/Windows/Fonts/arial.ttf", $captcha);
imagepng($image);

