<?php
require_once 'seguridad.php';
comprobarRol(0);

$colores = [
    'azul' => '#0000FF', 'rojo' => '#FF0000', 'verde' => '#008000', 'amarillo' => '#FFDE21',
    'naranja' => '#FFA800', 'rosa' => '#FFB5C0', 'morado' => '#9D00FF', 'gris' => '#D3D3D3'
];

if (!isset($_SESSION['circulos_negros'])) {
    $_SESSION['circulos_negros'] = array_fill(0, $_SESSION['ncirculos'], '#000000');
    $_SESSION['j'] = 0;
}

if (isset($_POST['color'])) {
    $j = $_SESSION['j'];
    if (isset($colores[$_POST['color']]) && $j < $_SESSION['ncirculos']) {
        $_SESSION['circulos_negros'][$j] = $colores[$_POST['color']];
        $_SESSION['j']++;
    }
}

if ($_SESSION['j'] >= $_SESSION['ncirculos']) {
    if ($_SESSION['circulos_negros'] === $_SESSION['patron']) {
        header("Location: acierto.php");
    } else {
        header("Location: fallo.php");
    }
    exit();
}

include 'pintar-color.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SIMÓN</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h3><?= $_SESSION['nombre'] ?> pulsa los botones en el orden correspondiente</h3>

    <?php pintar_circulos($_SESSION['circulos_negros']); ?>

    <form method="POST" action="jugar.php">
        <?php for($i = 0; $i < $_SESSION['ncolores']; $i++): ?>
            <button type="submit" name="color" value="<?= $_SESSION['nombreColores'][$i] ?>">
                <?= strtoupper($_SESSION['nombreColores'][$i]) ?>
            </button>
        <?php endfor; ?>
    </form>
    
    <p>Progreso: <?= $_SESSION['j'] ?> de <?= $_SESSION['ncirculos'] ?> círculos completados</p>
</body>
</html>

