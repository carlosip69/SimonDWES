<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

function comprobarRol($rolRequerido) {
    if ($_SESSION['rol'] !=$rolRequerido) {
        if ($_SESSION['rol'] == 1) {
            header('Location: admin.php');
        } else {
            header('Location: inicio.php');
        }
        exit();
    }
}