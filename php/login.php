<?php
session_start();
require_once '../db/conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['usuario']) && !empty($_POST['contrasena'])) {
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $result = $conexion->query($query);

        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($contrasena, $row['contraseña'])) {
                $_SESSION['user_name'] = $row['nombre'];
                $_SESSION['user_level'] = $row['user_level'];
                $_SESSION['identificacion'] = $row['identificacion'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];

                if ($row['user_level'] == 'profesor') {
                    header("Location: ../index_profesor.php");
                } else {
                    header("Location: ../educacion_sexual.php");
                }
                exit();
            } else {
                echo '<script>alert("Contraseña incorrecta."); window.history.back();</script>';
            }
        } else {
            echo '<script>alert("Usuario no encontrado."); window.history.back();</script>';
        }
    } else {
        echo '<script>alert("Por favor, complete todos los campos."); window.history.back();</script>';
    }
} else {
    header("Location: ../login.html");
    exit();
}

$conexion->close();
?>
