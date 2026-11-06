<?php
require_once 'seguridad.php';
comprobarRol(0);

if (isset($_GET['salir'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$pdo = new PDO("mysql:host=localhost;dbname=bdsimon;charset=utf8mb4", "root", "");
$config = $pdo->query("SELECT * FROM configuracion WHERE id = 1")->fetch(PDO::FETCH_ASSOC);

$_SESSION['ncirculos'] = $config['num_circulos'];
$_SESSION['ncolores']  = $config['num_colores'];

include 'pintar-color.php';

unset($_SESSION['circulos_negros']);
unset($_SESSION['j']);
$_SESSION['patron'] = $patron;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIMÓN</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h3>Hola <?= $_SESSION['nombre'] ?>, memoriza la combinación</h3>

    <?php pintar_circulos($_SESSION['patron']); ?>

    <form action="jugar.php" method="GET">
        <button type="submit">Empezar</button>
    </form>
    <br>
    <a href="inicio.php?salir=1">Cerrar sesión</a>
</body>
</html>
