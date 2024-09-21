<?php
require_once __DIR__ . '/../db/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM preguntas WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $mensaje = "Pregunta eliminada exitosamente";
} else {
    $mensaje = "Error al eliminar la pregunta: " . $stmt->error;
}

$stmt->close();
$conexion->close();

header("Location: ../ver_preguntas.php?mensaje=" . urlencode($mensaje));
exit();
?>
