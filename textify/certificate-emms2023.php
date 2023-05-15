<?php
// Establecer el tipo de contenido
header('Content-Type: image/png');
header("Access-Control-Allow-Origin: https://goemms.com");

// Tamaño de la imagen
$img_w = 1080;
$img_h = 763;

// Crear la imagen
$im = imagecreatefrompng('certificadoemms2023.png');


// Crear algunos colores
$txt_color = imagecolorclosest($im, 48, 33, 0);

// El texto a dibujar
$name = $_GET['fullname'];

// Fuentes
$ffontProximaItalic = './fonts/proxima-nova-italic.ttf';
$ffontGotham = './fonts/gothamroundedmedium.ttf';

// Centrar nombre
$bbox_name = imagettfbbox(44,0,$ffontGotham,$name);
$bbox_name_x = $bbox_name[0] + (imagesx($im) / 2) - ($bbox_name[4] / 2);


// Añadir el titulo
imagettftext($im, 44, 0, $bbox_name_x, 600, $txt_color, $ffontGotham, $name);

// Usar imagepng() resultará en un texto más claro comparado con imagejpeg()
imagepng($im);

imagedestroy($im);
