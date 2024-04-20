<?php
// No hay salida antes de este punto
ob_start(); // Iniciar el buffering de salida para manejar los encabezados correctamente


$ancho = 400;
$alto = 300;
$imagen = imagecreatetruecolor($ancho, $alto);

$fondo = imagecolorallocate($imagen, 255, 255, 255); // Blanco
$borde = imagecolorallocate($imagen, 0, 0, 0);       // Negro
$barra = imagecolorallocate($imagen, 70, 130, 180);  // Azul acero

imagefill($imagen, 0, 0, $fondo);

$valores = [45, 75, 120, 90];

$max_valor = max($valores);
$bar_ancho = ($ancho / (count($valores) + 1)) / 1.5;

for ($i = 0; $i < count($valores); $i++) {
    $x1 = ($bar_ancho + 10) * $i + 30;
    $y1 = $alto - ($alto - 20) * ($valores[$i] / $max_valor) - 10;
    $x2 = $x1 + $bar_ancho;
    $y2 = $alto - 10;
    imagefilledrectangle($imagen, $x1, $y1, $x2, $y2, $barra);
    imagerectangle($imagen, $x1, $y1, $x2, $y2, $borde);
}

header('Content-Type: image/png');
imagepng($imagen);
imagedestroy($imagen);
ob_end_flush(); // Enviar la imagen al navegador y cerrar el buffering
?>
