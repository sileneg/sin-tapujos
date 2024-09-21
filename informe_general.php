<?php
session_start();
require_once __DIR__ . '../db/conexion.php';

$sql = "SELECT identificacion, nombre, apellido, fecha, 
               preguntas_respondidas, preguntas_correctas, 
               preguntas_respondidas - preguntas_correctas AS preguntas_incorrectas,
               (preguntas_correctas / preguntas_respondidas) * 100 AS porcentaje_aciertos, 
               tiempo_empleado,
               (SELECT COUNT(*) FROM resultados r WHERE r.identificacion = resultados.identificacion) as veces_realizadas
        FROM resultados
        ORDER BY identificacion, fecha DESC";

$result = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe General</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" >
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="header">
        <div class="ini">
            <div id="logo"><img src="images/logo.png" alt="Logo"></div>
            <h1 id="title"><span style="color:red">S</span><span style="color:orange">i</span><span style="color:yellow">n </span><span style="color:green">T</span><span style="color:blue">a</span><span style="color:indigo">p</span><span style="color:purple">u</span><span style="color:red">j</span><span style="color:yellow">o</span><span style="color:orange">s</span></h1>
            <div id="welcome">
                <span id="welcome-message">Bienvenido, Profesor <?php echo $_SESSION['user_name']; ?></span>
                <a href="php/logout.php" class="btn-logout logout-link">Cerrar Sesión</a>
            </div>
        </div>
        <nav class="nav">
            <ul>
                <li class="btnmenu"><a href="index.html">Inicio</a></li>                
            </ul>
        </nav>
    </header>   

    <h1>Informe General</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre Completo</th>
                    <th>Números de Intentos</th>
                    <th>Fecha</th>
                    <th>Preguntas Respondidas</th>
                    <th>Preguntas Correctas</th>
                    <th>Preguntas Incorrectas</th>
                    <th>Porcentaje Aciertos</th>
                    <th>Tiempo Empleado</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['identificacion']) . "</td>
                    <td>" . htmlspecialchars($row['nombre']) . " " . htmlspecialchars($row['apellido']) . "</td>
                    <td>" . $row['veces_realizadas'] . "</td> <!-- Muestra cuántas veces ha realizado la prueba -->
                    <td>" . htmlspecialchars($row['fecha']) . "</td>
                    <td>" . $row['preguntas_respondidas'] . "</td>
                    <td>" . $row['preguntas_correctas'] . "</td>
                    <td>" . $row['preguntas_incorrectas'] . "</td>
                    <td>" . round($row['porcentaje_aciertos'], 2) . "%</td>
                    <td>" . $row['tiempo_empleado'] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados.</p>";
    }

    $conexion->close();
    ?>
    <br>
    <a href="index_profesor.php" class="btn">Volver Página del Profesor</a>

    <footer id="foo">
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Teléfono</h4>
                <p>+57 321 497 99 15</p>
            </div>
            <div class="content-foo">
                <h4>Correo</h4>
                <p>@SinTapujos</p>
            </div>
            <div class="content-foo">
                <h4>Dirección</h4>
                <p>Cra. 7 # 5 - 22</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; SinTapujos. Todos los Derechos Reservados</h2>
    </footer>
</body>
</html>
