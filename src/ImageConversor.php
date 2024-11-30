<?php

namespace src;

require_once __DIR__ . '/../vendor/autoload.php';
require './fpdf181/fpdf.php';

use Exception;
use FPDF\FPDF;

class ImageConversor
{

    private $fpdf;

    public function __construct() {
        $this->fpdf = new FPDF();
    }

    public function convertImgToPdf($imgRoute){

        if (!file_exists($imgRoute)) {
            throw new Exception("El archivo de imagen no existe: $imgRoute");
        }

        list($ancho,$alto) = getimagesize($imgRoute);
        $ancho_mm = $ancho * 0.264583;
        $alto_mm = $alto * 0.264583;

        $this->fpdf->AddPage('P',[$ancho_mm,$alto_mm]);
        $this->fpdf->Image($imgRoute, 0, 0, $ancho_mm, $alto_mm);

        $this->fpdf->Output('image.pdf', 'F');
        sleep(1);
        $this->fpdf = new FPDF();
    }

    public function advanceConvertImgToPdf($imgPath,$outPath) {
        
        if (!file_exists($imgPath)) {
            throw new Exception("El archivo de imagen no existe: $imgPath");
        }

        list($ancho,$alto) = getimagesize($imgPath);
        // Convertir dimensiones a milímetros (1 píxel ≈ 0.264583 mm)
        $ancho_mm = $ancho * 0.264583;
        $alto_mm = $alto * 0.264583;

        // Determinar la orientación: 'P' (vertical) o 'L' (horizontal)
        $orientacion = $ancho_mm > $alto_mm ? 'L' : 'P';

        // Crear una nueva página con la orientación y tamaño adecuados
        $this->fpdf->AddPage($orientacion, [$ancho_mm, $alto_mm]);

        // Agregar la imagen al PDF
        $this->fpdf->Image($imgPath, 0, 0, $ancho_mm, $alto_mm);

        // Generar y guardar el PDF en la ruta especificada
        $this->fpdf->Output($outPath, 'F');

        // Reiniciar la instancia de FPDF para posibles reutilizaciones
        sleep(1); // Pausa para asegurar la creación del archivo
        $this->fpdf = new FPDF();
    }
}
