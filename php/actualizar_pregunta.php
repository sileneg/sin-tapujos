<?php
require_once __DIR__ . '/../db/conexion.php';

$id = $_POST['id'];
$pregunta = $_POST['pregunta'];
$opcion1 = $_POST['opcion1'];
$opcion2 = $_POST['opcion2'];
$opcion3 = $_POST['opcion3'];
$opcion4 = $_POST['opcion4'];
$respuesta_correcta = $_POST['respuesta_correcta'];
$imagen = $_FILES['imagen']['name'];

if ($imagen) {
    $target_dir = "../images/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

    $sql = "UPDATE preguntas SET pregunta=?, opcion1=?, opcion2=?, opcion3=?, opcion4=?, respuesta_correcta=?, imagen=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssi", $pregunta, $opcion1, $opcion2, $opcion3, $opcion4, $respuesta_correcta, $imagen, $id);
} else {
    $sql = "UPDATE preguntas SET pregunta=?, opcion1=?, opcion2=?, opcion3=?, opcion4=?, respuesta_correcta=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssssssi", $pregunta, $opcion1, $opcion2, $opcion3, $opcion4, $respuesta_correcta, $id);
}

if ($stmt->execute()) {
    echo "<script>alert('Pregunta actualizada exitosamente'); window.location.href = '../ver_preguntas.php';</script>";
} else {
    echo "<script>alert('Error al actualizar la pregunta'); window.location.href = '../ver_preguntas.php';</script>";
}

$conexion->close();
?>
