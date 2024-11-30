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
│   ├── ImageConversor.php       # Clase principal para la conversión de imágenes a PDF
│   ├── index.php                # Script para manejo de la subida y conversión de imágenes
│   ├── example.php              # Ejemplo directo de uso
├── uploads/                     # Carpeta para subir imágenes y guardar PDFs
├── fpdf181/                     # Carpeta con la librería FPDF
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
