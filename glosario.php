<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glosario de Términos</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" >
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        main {
            flex-grow: 1;
            padding: 2rem;
        }
        h1 {
            font-family: 'Pacifico', cursive;
            color: #343a40;
            text-align: center;
        }
        .glosario-term {
            margin-bottom: 1rem;
        }
        .glosario-term h3 {
            margin: 0;
            color: #007bff;
        }
        .glosario-term p {
            margin: 0;
        }
        .button {
            display: inline-block;
            width: 20%;;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            margin: 1rem auto;
            display: block;
        }
    </style>
</head>
<body>
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
        <h1>Glosario de Términos</h1>
        <div class="glosario-term">
            <h3>Salud Sexual</h3>
            <p>Prácticas y comportamientos que promueven la salud y el bienestar sexual, incluyendo la prevención de enfermedades de transmisión sexual y el uso adecuado de métodos anticonceptivos.</p>
        </div>
        <div class="glosario-term">
            <h3>Orientación Sexual</h3>
            <p>Patrones de atracción emocional, romántica y/o sexual hacia personas de un determinado género. Incluye heterosexualidad, homosexualidad, bisexualidad, pansexualidad, asexualidad, entre otros.</p>
        </div>
        <div class="glosario-term">
            <h3>Anticonceptivos Hormonales</h3>
            <p>Métodos que contienen hormonas sintéticas similares a las producidas naturalmente por el cuerpo, como píldoras, parches, inyecciones, implantes y anillos vaginales.</p>
        </div>
        <div class="glosario-term">
            <h3>Preservativo Masculino y Femenino</h3>
            <p>Dispositivos de barrera que evitan que el esperma entre en contacto con el óvulo, previniendo embarazos y protegiendo contra enfermedades de transmisión sexual (ETS).</p>
        </div>
        <div class="glosario-term">
            <h3>Dispositivo Intrauterino (DIU)</h3>
            <p>Pequeño dispositivo de plástico o metal que se coloca dentro del útero para prevenir el embarazo. Puede ser hormonal o de cobre.</p>
        </div>
        <div class="glosario-term">
            <h3>Anticoncepción de Emergencia</h3>
            <p>Método utilizado para prevenir el embarazo después de una relación sexual sin protección o cuando falla otro método anticonceptivo. Debe tomarse dentro de las 72 horas posteriores al acto sexual.</p>
        </div>
        <div class="glosario-term">
            <h3>Planificación Familiar Natural</h3>
            <p>Métodos basados en la observación y seguimiento del ciclo menstrual para determinar los días fértiles de la mujer, como el método del ritmo, la temperatura basal y la observación del moco cervical.</p>
        </div>
        <a href="educacion_sexual.php" class="button">Volver a Educación Sexual</a>
    </main>

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
