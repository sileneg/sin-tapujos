<?php
require_once __DIR__ . '/../db/conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM preguntas WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(['error' => 'No se encontró la pregunta.']);
}

$stmt->close();
$conexion->close();
?>
