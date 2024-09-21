<?php
require_once '../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = $_POST['pregunta'];
    $opcion1 = $_POST['opcion1'];
    $opcion2 = $_POST['opcion2'];
    $opcion3 = $_POST['opcion3'];
    $opcion4 = $_POST['opcion4'];
    $respuesta_correcta = $_POST['respuesta_correcta'];
    $imagen = 'sin_imagen.jpg'; 

    if (empty($pregunta) || empty($opcion1) || empty($opcion2) || empty($opcion3) || empty($opcion4) || empty($respuesta_correcta)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    if (!empty($_FILES['imagen']['name'])) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);

        if($check !== false) {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $imagen = $target_file;
            } else {
                echo "Hubo un error subiendo la imagen.";
                exit;
            }
        } else {
            echo "El archivo no es una imagen.";
            exit;
        }
    }

    $sql = "INSERT INTO preguntas (pregunta, opcion1, opcion2, opcion3, opcion4, respuesta_correcta, imagen) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sssssis", $pregunta, $opcion1, $opcion2, $opcion3, $opcion4, $respuesta_correcta, $imagen);

        if ($stmt->execute()) {
            echo "Pregunta agregada exitosamente.";
            header("Location: ../agregar_pregunta.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conexion->error;
    }

    $conexion->close();
}
?>
