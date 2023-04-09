<?php

//include('../config.php'); $_SERVER['DOCUMENT_ROOT'] .'/osda_php/'.'Application/'.
ini_set("display_errors", 0);
$resourcesPath = $_SERVER['DOCUMENT_ROOT'] .'/OSDA/'.'/resources';	
session_start();

function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();
$_SESSION["captcha"] = $ranStr;


$height = 35; //CAPTCHA image height
$width = 150; //CAPTCHA image width
$font_size = 24; 

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 255, 255, 255);
$textcolor = imagecolorallocate($image_p, 34, 34, 34);
//header('Content-type: image/png');
imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, $resourcesPath.'/fonts/Jura.ttf', $ranStr);
//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
imagepng($image_p);

	
?>