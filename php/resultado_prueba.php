<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Prueba</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <style>
        .correcta {
            color: green;
            font-weight: bold;
        }
        .incorrecta {
            color: red;
            font-weight: bold;
        }
    </style>
    <header class="header">
        <div class="ini">
            <div id="logo"><img src="../images/logo.png" alt=""></div>
                <h1 id="title"><span style="color:red">S</span><span style="color:orange">i</span><span style="color:yellow">n </span><span style="color:green">T</span><span style="color:blue">a</span><span style="color:indigo">p</span><span style="color:purple">u</span><span style="color:red">j</span><span style="color:yellow">o</span><span style="color:orange">s</span></h1>
                <div class="welcome" id="welcome">
                 <span id="welcome-message">Bienvenido, <?php session_start(); echo $_SESSION['user_name']; ?><span>
                    <a href="../php/logout.php" class="btn-logout logout-link">Cerrar Sesión</a>
                </div>
        </div>

        <nav class="nav">
            <ul>
                <li class="btnmenu"><a href="../index.html">Inicio</a></li>                
            </ul>
        </nav>
    </header>   

    <h1>Resultado de la Prueba</h1>
    <?php
    if (isset($_GET['resultado']) && isset($_GET['total']) && isset($_GET['respuestas']) && isset($_GET['puntos']) && isset($_GET['tiempo']) && isset($_GET['fecha'])) {
        $resultado = $_GET['resultado'];
        $total = $_GET['total'];
        $respuestas = unserialize(urldecode($_GET['respuestas']));
        $puntos = $_GET['puntos'];
        $tiempo = $_GET['tiempo'];
        $fecha = $_GET['fecha'];
        
        $porcentaje = ($resultado / $total) * 100;

        echo "<p>Has acertado $resultado de $total preguntas.</p>";
        echo "<p>Tu puntaje total es $puntos puntos.</p>";
        echo "<p>Porcentaje de preguntas acertadas: " . round($porcentaje, 2) . "%</p>";
        echo "<p>Fecha de la prueba: $fecha</p>";
        echo "<p>Tiempo total empleado: $tiempo minutos.</p>";

        require_once __DIR__ . '/../db/conexion.php';

        $sql = "SELECT * FROM preguntas";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='pregunta'>";
                echo "<p>" . htmlspecialchars($row["pregunta"]) . "</p>";
                if (!empty($row["imagen"]) && $row["imagen"] !== 'sin_imagen.jpg') {
                    echo "<img src='../images/" . htmlspecialchars($row["imagen"]) . "' alt='Imagen' style='width:100px;height:auto;'><br>";
                }
                for ($i = 1; $i <= 4; $i++) {
                    $opcion = $row["opcion$i"];
                    $class = "";
                    if ($row['respuesta_correcta'] == $i) {
                        $class = "correcta";
                    } elseif (isset($respuestas[$row['id']]) && $respuestas[$row['id']] == $i) {
                        $class = "incorrecta";
                    }
                    echo "<p class='$class'>" . htmlspecialchars($opcion) . "</p>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>No hay preguntas disponibles.</p>";
        }

        $conexion->close();
    } else {
        echo "<p>Faltan datos para mostrar el resultado.</p>";
    }
    ?>
    <br>
    <a href="../php/presentar_prueba.php" class="btn">Volver a la prueba</a>

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
