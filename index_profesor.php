<?php
session_start();
require_once __DIR__ . '../db/conexion.php';

$query_estudiantes = "SELECT DISTINCT identificacion, nombre, apellido FROM resultados";
$result_estudiantes = $conexion->query($query_estudiantes);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página del Profesor</title>
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
    
    <h1>Página Profesor</h1>
    <div class="crud-buttons">
        <a href="agregar_pregunta.php" class="btn">Agregar Pregunta</a>
        <a href="ver_preguntas.php" class="btn">Consultar Preguntas</a>

        <form action="informe_individual.php" method="get" style="display: inline-block;">
            <select name="identificacion" required>
                <option value="">Seleccionar Estudiante</option>
                <?php
                if ($result_estudiantes->num_rows > 0) {
                    while ($estudiante = $result_estudiantes->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($estudiante['identificacion']) . "'>" . htmlspecialchars($estudiante['nombre']) . " " . htmlspecialchars($estudiante['apellido']) . "</option>";
                    }
                }
                ?>
            </select>
            <button type="submit" class="btn">Ver Informe Individual</button>
            <a href="informe_general.php" class="btn">Ver Informe General</a> 
        </form>

    </div>

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
