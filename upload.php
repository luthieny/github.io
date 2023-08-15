<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar el tipo de archivo
    $allowedExtensions = array('txt', 'jpg', 'jpeg', 'png', 'pdf');
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Solo se permiten archivos de texto, imágenes y PDF.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Lo sentimos, su archivo no fue subido.";
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $targetFile)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["archivo"]["name"])) . " ha sido subido exitosamente.";
        } else {
            echo "Hubo un error al subir su archivo.";
        }
    }
}
?>
