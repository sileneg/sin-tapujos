<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pregunta</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

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

<body>
    <h1>Agregar Nueva Pregunta</h1>
    <a href="index_profesor.php" class="btn">Volver a Página Profesor</a>
    <form action="php/agregar_pregunta.php" method="post" enctype="multipart/form-data">
        <label for="pregunta">Pregunta:</label>
        <textarea id="pregunta" name="pregunta" required></textarea>
        
        <label for="opcion1">Opción 1:</label>
        <input type="text" id="opcion1" name="opcion1" required>
        <span>A.</span>

        <label for="opcion2">Opción 2:</label>
        <input type="text" id="opcion2" name="opcion2" required>
        <span>B.</span>

        <label for="opcion3">Opción 3:</label>
        <input type="text" id="opcion3" name="opcion3" required>
        <span>C.</span>

        <label for="opcion4">Opción 4:</label>
        <input type="text" id="opcion4" name="opcion4" required>
        <span>D.</span>

        <label for="respuesta_correcta">Respuesta Correcta:</label>
        <select id="respuesta_correcta" name="respuesta_correcta" required>
            <option value="1">Opción 1 (A)</option>
            <option value="2">Opción 2 (B)</option>
            <option value="3">Opción 3 (C)</option>
            <option value="4">Opción 4 (D)</option>
        </select>

        <label for="imagen">Imagen (opcional):</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">

        <button type="submit">Agregar Pregunta</button>
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
</body>
</html>
