<?php
// Establecer el tipo de contenido
header('Content-Type: image/png');
header("Access-Control-Allow-Origin: https://goemms.com");

// Tamaño de la imagen
$img_w = 1080;
$img_h = 763;

// El texto a dibujar
$name = $_GET['fullname'];
$type = $_GET['type'];
$imgName =  'certificadoemms2023-' . $type . '.png';

if ($type === 'workshop') {
    $workshopType = $_GET['workshoptype'];
    $workshopMap = [
        'vanesa-jackson-5XYZ' => 'vanesa-jackson',
        'borja-castelar-3ABC' => 'borja-castelar',
        'ruben-gallardo-9JKL' => 'ruben-gallardo',
        'laura-figueroa-8PQR' => 'laura-figueroa',
        'canva-7DEF' => 'canva',
        'martin-garay-6MNO' => 'martin-garay',
        'juan-pablo-villani-2GHI' => 'juan-pablo-villani',
        'gladys-kali-10STU' => 'gladys-kali',
        'alejandro-parra-1WXY' => 'alejandro-parra',
        'alejandro-jose-4LMN' => 'alejandro-jose',
        'doppler-7UVW' => 'doppler',
        'seenka-8EFG' => 'seenka',
        'daniel-dron-3OPQ' => 'daniel-dron',
        'sabina-silva-6RST' => 'sabina-silva',
        'zeke-novarino-2ABC' => 'zeke-novarino',
        'fer-rubio-9XYZ' => 'fer-rubio',
        'meta-10JKL' => 'meta',
        'dinorank-5PQR' => 'dinorank',
    ];
    $imgName = 'certificadoemms2023-' . $workshopMap[$workshopType] . '.png';
}

// Crear la imagen
$im = imagecreatefrompng($imgName);


// Crear algunos colores
$txt_color = imagecolorclosest($im, 48, 33, 0);

// Fuentes
$ffontProximaItalic = './fonts/proxima-nova-italic.ttf';
$ffontGotham = './fonts/gothamroundedmedium.ttf';

// Centrar nombre
$bbox_name = imagettfbbox(44, 0, $ffontGotham, $name);
$bbox_name_x = $bbox_name[0] + (imagesx($im) / 2) - ($bbox_name[4] / 2);


// Añadir el titulo
imagettftext($im, 44, 0, $bbox_name_x, 600, $txt_color, $ffontGotham, $name);

// Usar imagepng() resultará en un texto más claro comparado con imagejpeg()
imagepng($im);

imagedestroy($im);
