## Image to PDF Conversion Repository Documentation

### **Overview**
This repository provides a solution to convert images in JPG or PNG format into PDF documents using the FPDF library. It includes a core class for image conversion and practical usage examples.

---

### **Requirements**
- PHP 7.4 or higher.
- [FPDF library](http://www.fpdf.org/).
- Composer-generated autoload library.

---

### **Project Structure**
```
/
├── src/
│   ├── fpdf181/                 # FPDF library folder
│   ├── uploads/                 # Folder for uploading images and saving PDFs
│   ├── ImageConversor.php       # Core class for converting images to PDF
│   ├── index.php                # Script for handling image upload and conversion
│   ├── example.php              # Direct usage example
├── composer.json                # Composer dependency configuration
└── README.md                    # Project documentation
```

---

### **Classes and Functionality**

#### **1. `ImageConversor` Class**
Location: `src/ImageConversor.php`

This class is responsible for converting images to PDF documents using FPDF.

##### **Attributes**
- `private $fpdf`: Instance of the `FPDF` class.

##### **Methods**
1. **`__construct()`**  
   Constructor that initializes the `FPDF` instance.

2. **`convertImgToPdf($imgRoute)`**  
   Converts an image to a PDF document with dimensions proportional to the image size in millimetres.  
   **Parameters:**  
   - `string $imgRoute`: Path to the image file.

   **Exceptions:**  
   - Throws an exception if the image does not exist.

3. **`advanceConvertImgToPdf($imgPath, $outPath)`**  
   An advanced conversion method that adjusts the PDF orientation (portrait or landscape) based on the image dimensions.  
   **Parameters:**  
   - `string $imgPath`: Path to the input image.
   - `string $outPath`: Path to save the output PDF.

   **Exceptions:**  
   - Throws an exception if the image does not exist.

---

#### **2. Image Upload and Conversion Script**
Location: `src/index.php`

This script handles the image upload from an HTML form and converts it to PDF.

##### **Workflow**
1. Verifies if the request method is POST and if the image file is available.
2. Creates an upload directory if it does not exist.
3. Moves the uploaded image to the directory.
4. Converts the image to PDF using `advanceConvertImgToPdf`.
5. Generates a download link for the converted PDF.

##### **HTML Form Snippet**
```html
<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="imageFile">Upload Image:</label>
    <input type="file" name="imageFile" id="imageFile" accept="image/png, image/jpeg">
    <button type="submit">Convert to PDF</button>
</form>
```

---

#### **3. Direct Usage Example**
Location: `src/example.php`

A basic script that directly converts an image at the specified path to a PDF file.

##### **Workflow**
1. Defines the path of the image.
2. Creates an instance of `ImageConversor`.
3. Converts the image using `convertImgToPdf`.

---

### **Usage Instructions**

#### **1. Installation**
1. Clone the repository:
   ```bash
   git clone https://github.com/miusarname2/Img2Pdf
   ```
2. Install dependencies:
   ```bash
   composer install
   ```

#### **2. Image Conversion**
##### **Upload and Conversion via Web Interface**
1. Start a PHP server:
   ```bash
   php -S localhost:8000 -t src/
   ```
2. Visit `http://localhost:8000/index.html` and upload an image.

---

### **Common Errors**
1. **"The image file does not exist"**  
   Ensure that the file path is correct and the file is available.

2. **"Error uploading the file"**  
   Make sure the `uploads/` folder has write permissions.

---

### **License**
This project is distributed under the MIT License. You are free to use, modify, and distribute it.

## Documentación del Repositorio de Conversión de Imágenes a PDF

### **Descripción General**
Este repositorio contiene una solución para convertir imágenes en formato JPG o PNG a documentos PDF utilizando la librería FPDF. Se incluye una clase principal para la conversión de imágenes y ejemplos de uso práctico.

---

### **Requisitos**
- PHP 5.6 o superior.
- Librería [FPDF](http://www.fpdf.org/).

---

### **Estructura del Proyecto**
```
/
├── src/
│   ├── fpdf181/                 # Carpeta con la librería FPDF
│   ├── uploads/                 # Carpeta para subir imágenes y guardar PDFs
│   ├── ImageConversor.php       # Clase principal para la conversión de imágenes a PDF
│   ├── index.php                # Script para manejo de la subida y conversión de imágenes
│   ├── example.php              # Ejemplo directo de uso
├── composer.json                # Configuración de dependencias de Composer
└── README.md                    # Documentación del proyecto
```

---

### **Clases y Funcionalidades**

#### **1. Clase `ImageConversor`**
Ubicación: `src/ImageConversor.php`

Esta clase se encarga de convertir imágenes a documentos PDF utilizando FPDF.

##### **Atributos**
- `private $fpdf`: Instancia de la clase `FPDF`.

##### **Métodos**
1. **`__construct()`**  
   Constructor que inicializa la instancia de `FPDF`.

2. **`convertImgToPdf($imgRoute)`**  
   Convierte una imagen a un documento PDF con dimensiones equivalentes a las de la imagen en milímetros.  
   **Parámetros:**  
   - `string $imgRoute`: Ruta al archivo de imagen.

   **Excepciones:**  
   - Lanza una excepción si la imagen no existe.

3. **`advanceConvertImgToPdf($imgPath, $outPath)`**  
   Conversión avanzada que ajusta la orientación del PDF (vertical u horizontal) según las dimensiones de la imagen.  
   **Parámetros:**  
   - `string $imgPath`: Ruta de la imagen de entrada.
   - `string $outPath`: Ruta de salida para guardar el PDF.

   **Excepciones:**  
   - Lanza una excepción si la imagen no existe.

---

#### **2. Script de Subida y Conversión**
Ubicación: `src/index.php`

Este script gestiona la carga de imágenes desde un formulario HTML y su conversión a PDF.

##### **Flujo de Trabajo**
1. Verifica si el método de solicitud es POST y si el archivo de imagen está disponible.
2. Crea un directorio de subida si no existe.
3. Mueve la imagen subida al directorio.
4. Convierte la imagen a PDF utilizando `advanceConvertImgToPdf`.
5. Genera un enlace de descarga para el PDF convertido.

##### **Fragmento de Formulario HTML**
```html
<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="imageFile">Subir imagen:</label>
    <input type="file" name="imageFile" id="imageFile" accept="image/png, image/jpeg">
    <button type="submit">Convertir a PDF</button>
</form>
```

---

#### **3. Ejemplo de Uso Directo**
Ubicación: `src/example.php`

Un script básico que convierte directamente una imagen en la ruta especificada a un archivo PDF.

##### **Flujo de Trabajo**
1. Define la ruta de la imagen.
2. Crea una instancia de `ImageConversor`.
3. Convierte la imagen con `convertImgToPdf`.

---

### **Instrucciones de Uso**

#### **1. Instalación**
1. Clona el repositorio:
   ```bash
   git clone https://github.com/miusarname2/Img2Pdf
   ```
2. Instala las dependencias:
   ```bash
   composer install
   ```

#### **2. Conversión de Imágenes**
##### **Subida y Conversión con Interfaz Web**
1. Inicia un servidor PHP:
   ```bash
   php -S localhost:8000 -t src/
   ```
2. Accede a `http://localhost:8000/index.html` y sube una imagen.
1. Modifica `example.php` para especificar la ruta de la imagen.
2. Ejecuta el script:
   ```bash
   php src/example.php
   ```

---

### **Errores Comunes**
1. **"El archivo de imagen no existe"**  
   Verifica que la ruta del archivo sea correcta y que el archivo esté disponible.

2. **"Error al subir el archivo"**  
   Asegúrate de que la carpeta `uploads/` tiene permisos de escritura.

---

### **Licencia**
Este proyecto se distribuye bajo la Licencia MIT. Puedes usarlo, modificarlo y distribuirlo libremente.
