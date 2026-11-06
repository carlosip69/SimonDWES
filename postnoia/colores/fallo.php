 <?php
require_once 'seguridad.php';
comprobarRol(0);
include 'pintar-color.php';

if (isset($_SESSION['patron'])) {
    $pdo = new PDO("mysql:host=localhost;dbname=bdsimon;charset=utf8mb4", "root", "");
    $stmt = $pdo->prepare("INSERT INTO jugadas (codigousu, acierto) VALUES (?, 0)");
    $stmt->execute([$_SESSION['usuario_id']]);

    $patronCorrecto = $_SESSION['patron'];
    $jugadaElegida  = $_SESSION['circulos_negros'];
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
    <title>Fallo</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h3><?= $_SESSION['nombre'] ?>, has perdido</h3>

    <p>La combinacion era:</p>
    <?php pintar_circulos($patronCorrecto); ?>

    <p>Su combinacion:</p>
    <?php pintar_circulos($jugadaElegida); ?>

    <a href="inicio.php"><button>Volver a jugar</button></a>
</body>
</html>