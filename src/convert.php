<?php

namespace src;

use Exception;

require_once __DIR__ . '/../vendor/autoload.php'; 
require './ImageConversor.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imageFile'])) {
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Crear el directorio si no existe
    }

    $imageFile = $_FILES['imageFile'];
    $fileName = basename($imageFile['name']);
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($imageFile['tmp_name'], $filePath)) {
        try {
            $ImgConversor = new ImageConversor();
            $pdfPath = $uploadDir . pathinfo($fileName, PATHINFO_FILENAME) . '.pdf';

            // Convertir la imagen a PDF
            $ImgConversor->advanceConvertImgToPdf($filePath, $pdfPath);

            // Mostrar enlace al usuario
            echo "<h1>Conversión completada</h1>";
            echo "<p>Descarga tu PDF aquí: <a href='uploads/" . basename($pdfPath) . "' download>Descargar PDF</a></p>";
        } catch (Exception $e) {
            echo "<h1>Error durante la conversión</h1>";
            echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } else {
        echo "<h1>Error al subir el archivo</h1>";
    }
}
