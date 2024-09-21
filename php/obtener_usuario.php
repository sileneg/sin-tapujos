<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo json_encode(['nombre' => $_SESSION['usuario']]);
} else {
    echo json_encode(['nombre' => null]);
}
?>
