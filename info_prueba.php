<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Prueba</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" >
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<style>
        main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }
        .content {
            max-width: 600px;
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-family: 'Pacifico', cursive;
            color: #343a40;
        }
        p {
            margin: 1rem 0;
        }
        .btn {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>

    <header class="header">
        <div class="ini">
            <div id="logo"><img src="images/logo.png" alt=""></div>
                <h1 id="title"><span style="color:red">S</span><span style="color:orange">i</span><span style="color:yellow">n </span><span style="color:green">T</span><span style="color:blue">a</span><span style="color:indigo">p</span><span style="color:purple">u</span><span style="color:red">j</span><span style="color:yellow">o</span><span style="color:orange">s</span></h1>
                <div class="welcome" id="welcome">
                 <span id="welcome-message">Bienvenido, <?php session_start(); echo $_SESSION['user_name']; ?><span>
                    <a href="php/logout.php" class="btn-logout logout-link">Cerrar Sesión</a>
                </div>
        </div>

        <nav class="nav">
            <ul>
                <li class="btnmenu"><a href="index.html">Inicio</a></li>                
            </ul>
        </nav>
    </header>
    
    <main>
        <h1>Información de la Prueba</h1>
        <div class="content">
            <h2>Bienvenidos</h2>
            <p>Este cuestionario tipo pruebas saber 11, está destinado a los estudiantes para la preparación de dicha prueba. 
                Este test consta en responder preguntas de selección múltiple con única respuesta. 
                Tiene 50 preguntas, una vez las responda, debes darle enviar y verás los resultados de la pruba, las que aparecen en rojo quiere decir
                que es la respuesta incorrecta y las que aparece en verde la respuesta correcta; también aparecer la cantidad de respuestas acertadas, 
                el resultado total de la prueba con su respectivo porcentaja. ¡Muchos Éxitos!...</p>
            <button class="btn" onclick="location.href='php/presentar_prueba.php'">Ingresar a la Prueba</button>
        </div>
    </main>

    <footer>
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
