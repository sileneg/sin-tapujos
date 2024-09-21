<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Preguntas</title>
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
                <span id="welcome-message">Bienvenido, Profesor <?php session_start(); echo $_SESSION['user_name']; ?></span>
                <a href="php/logout.php" class="btn-logout logout-link">Cerrar Sesión</a>
            </div>
        </div>
        <nav class="nav">
            <ul>
                <li class="btnmenu"><a href="index.html">Inicio</a></li>                
            </ul>
        </nav>
    </header>
    
    <h1>Lista de Preguntas</h1>
    <a href="index_profesor.php" class="btn">Volver a Página Profesor</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pregunta y Opciones</th>
                <th>Respuesta Correcta</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'php/ver_preguntas.php'; ?>
        </tbody>
    </table>

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
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const mensaje = urlParams.get('mensaje');
            if (mensaje) {
                alert(mensaje);
            }
        });

        function confirmarEliminacion(id) {
            const confirmacion = confirm("¿Está seguro que desea eliminar esta pregunta?");
            if (confirmacion) {
                window.location.href = 'php/eliminar_pregunta.php?id=' + id;
            }
        }
    </script>
</body>
</html>
