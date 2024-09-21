<?php
session_start();
require_once 'db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    
    $sql = "SELECT * FROM usuarios WHERE identificacion = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $identificacion);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result->num_rows > 0) {
        $_SESSION['reset_identificacion'] = $identificacion;
        header("Location: restablecer_contrasena.php");
        exit;
    } else {
        echo "<script>alert('Identificación no encontrada.'); window.history.back();</script>";
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .recovery-form {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            margin-top: 30px;
            margin-bottom: 20px;
            border: 2px #000;
        }

        .recuperarForm {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            border: 2px double #000;
        }

        .recuperarForm h1 {
            margin-bottom: 20px;
            font-family: "Edu AU VIC WA NT Hand", cursive;
            font-weight: bold;
            font-size: 36px;
            color: #333;
        }

        .recuperarForm label {
            display: block;
            font-family: cursive;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 18px;
            color: #555;
        }

        .recuperarForm input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-family: cursive;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .recuperarForm input:focus {
            border-color: #000;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .recuperarForm input::placeholder {
            color: #aaa;
            font-family: cursive;
            font-style: italic;
        }

        .recuperarForm button[type="submit"] {
            background-color: #f1889b;
            font-family: cursive;
            font-weight: bold;
            color: #000;
            padding: 10px 20px;
            border: 2px solid #000;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .recuperarForm button[type="submit"]:hover {
            background-color: #d16b85;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="ini">
            <div id="logo"><img src="images/logo.png" alt="Logo"></div>
            <h1 id="title"><span style="color:red">S</span><span style="color:orange">i</span><span style="color:yellow">n </span><span style="color:green">T</span><span style="color:blue">a</span><span style="color:indigo">p</span><span style="color:purple">u</span><span style="color:red">j</span><span style="color:yellow">o</span><span style="color:orange">s</span></h1>
        </nav>
        <nav class="nav">
            <ul>
                <li class="btnmenu"><a href="index.html">Inicio</a></li>                
            </ul>
        </nav>
    </header>
    
    <div class="recovery-form">
        <form class="recuperarForm" action="recuperar_contrasena.php" method="post">
            <h1>Recuperar Contraseña</h1>
            <label for="identificacion">Identificación:</label>
            <input type="text" name="identificacion" required placeholder="Digite su Identificación">
            <button type="submit">Recuperar</button>
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
