<?php
session_start();
include '../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405); 
    echo "<script>alert('Método no permitido'); window.history.back();</script>";
    exit;
}

$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$confirmar_contraseña = $_POST['confirmar_contraseña'];
$tipo_usuario = $_POST['tipo_usuario'];

$mensaje = '';
$hay_errores = false;

if (!is_numeric($identificacion)) {
    $mensaje = 'La identificación debe ser un número.';
    $hay_errores = true;
}

if (!$hay_errores) {
    $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 's', $usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row['total'] > 0) {
        $mensaje = 'El nombre de usuario ya está en uso.';
        $hay_errores = true;
    }
}

if (!$hay_errores) {
    $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE email = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row['total'] > 0) {
        $mensaje = 'El correo electrónico ya está en uso.';
        $hay_errores = true;
    }
}

if (!$hay_errores) {
    if ($contraseña !== $confirmar_contraseña) {
        $mensaje = 'Las contraseñas no coinciden.';
        $hay_errores = true;
    } elseif (strlen($contraseña) < 8 || strlen($contraseña) > 12) {
        $mensaje = 'La contraseña debe tener entre 8 y 12 caracteres.';
        $hay_errores = true;
    } elseif (!preg_match('/[A-Za-z]/', $contraseña) || !preg_match('/[0-9]/', $contraseña)) {
        $mensaje = 'La contraseña debe contener letras y números.';
        $hay_errores = true;
    }
}

if (!$hay_errores && $tipo_usuario === 'profesor') {
    $sql = "SELECT COUNT(*) AS total_profesores FROM usuarios WHERE user_level = 1";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        $mensaje = "Error en la consulta: " . mysqli_error($conexion);
        $hay_errores = true;
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['total_profesores'] > 0) {
            $mensaje = 'Ya existe un profesor registrado. Solo se permite un profesor.';
            $hay_errores = true;
        }
    }
}

if (!$hay_errores) {
    $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE identificacion = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $identificacion);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row['total'] > 0) {
        $mensaje = 'La identificación ya está en uso.';
        $hay_errores = true;
    }
}

if (!$hay_errores) {
    $contraseña_hash = password_hash($contraseña, PASSWORD_BCRYPT);
    $nivel_usuario = ($tipo_usuario === 'profesor') ? 1 : 2;
    
    $sql = "INSERT INTO usuarios (identificacion, nombre, apellido, email, usuario, contraseña, user_level) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'isssssi', $identificacion, $nombre, $apellido, $email, $usuario, $contraseña_hash, $nivel_usuario);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['user_name'] = $nombre;
        $_SESSION['user_level'] = $nivel_usuario;
        $mensaje = 'Registro exitoso.';
        
        if ($tipo_usuario === 'profesor') {
            echo '<script>alert("' . $mensaje . '"); window.location.href = "../index_profesor.php";</script>';
        } else {
            echo '<script>alert("' . $mensaje . '"); window.location.href = "../educacion_sexual.php";</script>';
        }
        exit;
    } else {
        $mensaje = 'Error al registrar el usuario. Por favor, intente de nuevo.';
    }
}

if ($mensaje) {
    echo '<script>alert("' . $mensaje . '"); window.history.back();</script>';
}
?>
