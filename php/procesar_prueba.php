<?php
session_start();

if (!isset($_SESSION['identificacion']) || !isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
    die("Error: Información del usuario no disponible. Por favor, inicia sesión nuevamente.");
}

require_once __DIR__ . '/../db/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respuestas = $_POST['respuesta'];
    $tiempo = $_POST['tiempo'];
    $fecha = $_POST['fecha']; 
    $resultado = 0;
    $total = count($respuestas);
    $puntos = 0;

    $identificacion = $_SESSION['identificacion'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];

    foreach ($respuestas as $id => $respuesta) {
        $sql = "SELECT respuesta_correcta FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($respuesta_correcta);
        $stmt->fetch();
        $stmt->close();

        $es_correcta = ($respuesta == $respuesta_correcta) ? 1 : 0;
        if ($es_correcta) {
            $resultado++;
            $puntos += 10; 
        }
    }

    $sql_insert = "INSERT INTO resultados (identificacion, nombre, apellido, preguntas_respondidas, preguntas_correctas, tiempo_empleado, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $conexion->prepare($sql_insert);
    $stmt_insert->bind_param("sssisss", $identificacion, $nombre, $apellido, $total, $resultado, $tiempo, $fecha);
    $stmt_insert->execute();
    $stmt_insert->close();

    $conexion->close();

    $respuestas_serializadas = urlencode(serialize($respuestas));
    header("Location:../php/resultado_prueba.php?resultado=$resultado&total=$total&respuestas=$respuestas_serializadas&puntos=$puntos&tiempo=$tiempo&fecha=$fecha");
    exit();
}
?>
