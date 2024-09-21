<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentar Prueba</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
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

    <h1>Presentar Prueba</h1>
    <div id="cronometro">Tiempo: 00:00</div>
    <form id="pruebaForm" action="procesar_prueba.php" method="post" onsubmit="return confirmarEnvio()">
        <input type="hidden" name="tiempo" id="tiempo">
        <input type="hidden" name="fecha" value="<?php echo date('Y-m-d'); ?>">
        <?php
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
                    echo "<label><input type='radio' name='respuesta[{$row['id']}]' value='$i' required> " . htmlspecialchars($opcion) . "</label><br>";
                }
                echo "</div>";
            }
        } else {
            echo "<p>No hay preguntas disponibles.</p>";
        }

        $conexion->close();
        ?>
        <button type="submit">Enviar Prueba</button>
    </form>

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

    <script>
        let segundos = 0;
        let minutos = 0;
        let intervalo;

        function iniciarCronometro() {
            intervalo = setInterval(() => {
                segundos++;
                if (segundos === 60) {
                    segundos = 0;
                    minutos++;
                }
                document.getElementById('cronometro').textContent = `Tiempo: ${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;
                document.getElementById('tiempo').value = `${minutos}:${segundos}`;
            }, 1000);
        }

        function confirmarEnvio() {
            clearInterval(intervalo);
            const form = document.getElementById('pruebaForm');
            const inputs = form.querySelectorAll('input[type="radio"]');
            let todasRespondidas = true;
            const preguntas = new Set();

            inputs.forEach(input => {
                if (!preguntas.has(input.name) && !form.querySelector(`input[name="${input.name}"]:checked`)) {
                    todasRespondidas = false;
                }
                preguntas.add(input.name);
            });

            if (!todasRespondidas) {
                alert("Hace falta alguna pregunta por responder. Por favor, verifica y completa todas las preguntas.");
                return false;
            }

            return confirm("¿Está seguro de enviar la prueba?");
        }

        window.onload = iniciarCronometro;
    </script>
</body>
</html>
