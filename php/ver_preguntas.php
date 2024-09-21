<?php
require_once __DIR__ . '/../db/conexion.php';

$sql = "SELECT * FROM preguntas";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>";
        echo htmlspecialchars($row["pregunta"]) . "<br>";
        echo "<strong>A.</strong> " . htmlspecialchars($row["opcion1"]) . "<br>";
        echo "<strong>B.</strong> " . htmlspecialchars($row["opcion2"]) . "<br>";
        echo "<strong>C.</strong> " . htmlspecialchars($row["opcion3"]) . "<br>";
        echo "<strong>D.</strong> " . htmlspecialchars($row["opcion4"]) . "<br>";
        echo "</td>";
        echo "<td>" . htmlspecialchars($row["respuesta_correcta"]) . "</td>";
        
        // Mostrar la columna de imagen solo si hay una imagen disponible y no es la imagen por defecto
        if (!empty($row["imagen"]) && $row["imagen"] !== 'sin_imagen.jpg') {
            echo "<td><img src='../images/" . htmlspecialchars($row["imagen"]) . "' alt='Imagen' style='width:100px;height:auto;'></td>";
        } else {
            echo "<td></td>";
        }
        
        echo "<td><a href='editar_pregunta.html?id=" . htmlspecialchars($row["id"]) . "'>Editar</a> | <a href='#' onclick='confirmarEliminacion(" . htmlspecialchars($row["id"]) . ")'>Eliminar</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay preguntas.</td></tr>";
}

$conexion->close();
?>
