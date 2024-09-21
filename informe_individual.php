<?php
session_start();
require_once __DIR__ . '../db/conexion.php';

if (!isset($_GET['identificacion'])) {
    die("Error: Identificación del estudiante no proporcionada.");
}

$identificacion = $_GET['identificacion']; 

$sql_count = "SELECT COUNT(*) as veces_realizadas FROM resultados WHERE identificacion = ?";
$stmt_count = $conexion->prepare($sql_count);
$stmt_count->bind_param("s", $identificacion);
$stmt_count->execute();
$result_count = $stmt_count->get_result();
$row_count = $result_count->fetch_assoc();
$veces_realizadas = $row_count['veces_realizadas'];

$sql = "SELECT * FROM resultados WHERE identificacion = ? ORDER BY fecha DESC";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $identificacion);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Individual</title>
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

    <h1>Informe Individual</h1>
    <p>Veces que ha realizado la prueba: <?php echo $veces_realizadas; ?></p> 

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Fecha</th>
                    <th>Preguntas Respondidas</th>
                    <th>Preguntas Correctas</th>
                    <th>Preguntas Incorrectas</th>
                    <th>Porcentaje Aciertos</th>
                    <th>Tiempo Empleado</th>
                </tr>";
        
        while ($row = $result->fetch_assoc()) {
            $preguntas_respondidas = $row['preguntas_respondidas'];
            $preguntas_correctas = $row['preguntas_correctas'];
            $preguntas_incorrectas = $preguntas_respondidas - $preguntas_correctas;
            $porcentaje_aciertos = ($preguntas_correctas / $preguntas_respondidas) * 100;
            $tiempo_empleado = $row['tiempo_empleado'];

            echo "<tr>
                    <td>" . htmlspecialchars($row['fecha']) . "</td>
                    <td>" . $preguntas_respondidas . "</td>
                    <td>" . $preguntas_correctas . "</td>
                    <td>" . $preguntas_incorrectas . "</td>
                    <td>" . round($porcentaje_aciertos, 2) . "%</td>
                    <td>" . $tiempo_empleado . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados para el usuario.</p>";
    }

    $stmt->close();
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
