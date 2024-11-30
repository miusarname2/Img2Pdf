<?php

namespace src;

require_once __DIR__ . '/../vendor/autoload.php';
require './ImageConversor.php';

$fileImageRoute = 'imagen.jpg';
$ImgConversor = new ImageConversor();
$ImgConversor->convertImgToPdf($fileImageRoute);
