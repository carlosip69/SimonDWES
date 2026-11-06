<?php
require_once 'seguridad.php';
comprobarRol(0);
include 'pintar-color.php';

if (isset($_SESSION['patron'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=bdsimon;charset=utf8mb4", "root", "");
    $stmt = $pdo->prepare("INSERT INTO jugadas (codigousu, acierto) VALUES (?, 1)");
    $stmt->execute([$_SESSION['usuario_id']]);

    $patronFinal = $_SESSION['patron'];
    unset($_SESSION['patron'], $_SESSION['circulos_negros'], $_SESSION['j']);
} else {
    header("Location: inicio.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acierto</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h3><?= $_SESSION['nombre'] ?> enhorabuena, has acertado</h3>

    <?php pintar_circulos($patronFinal); ?>

    <p>Se ha guardado en la base de datos (acierto = 1)</p>
    <a href="inicio.php"><button>Volver a jugar</button></a>
</body>
</html>