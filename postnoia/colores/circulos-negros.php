<?php
include 'funcion-color.php';

$negro = array_fill(0, $_SESSION['ncirculos'], '#000000');

// Guardar los círculos en la sesión la primera vez
if (!isset($_SESSION['circulos_negros'])) {
    $_SESSION['circulos_negros'] = $negro;
    $_SESSION['j'] = 0;
}

// Si se pulsa un botón
if (isset($_POST['color'])) {
    $colores = array(
        'azul' => '#0000FF',
        'rojo' => '#FF0000',
        'verde' => '#008000',
        'amarillo' => '#FFDE21',
        'naranja' => '#FFA800',
        'rosa' => '#FFB5C0',
        'morado' => '#9D00FF',
        'gris' => '#D3D3D3'
    );


//vamos actualizando la j
$j = $_SESSION['j'];


if (isset($colores[$_POST['color']]) && $j < $_SESSION['ncirculos']) {
        $_SESSION['circulos_negros'][$j] = $colores[$_POST['color']];
        $_SESSION['j']++;
    }
}

$colores_disponiblesnegros = $_SESSION['circulos_negros'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simon</title>
    </head>
    <body>        
        <h1>Jugamos al simon</h1>
        <?php
            pintar_circulos($colores_disponiblesnegros);
        ?>
        <div class="contenedor-botones">
            <?php                      
                for($i=0;$i<$_SESSION['ncolores'];$i++){
                echo '<form method="post">';
                echo '<button type="submit" name="color" value="'
                . htmlspecialchars($_SESSION['nombreColores'][$i])
                . '" style="background-color: '
                . htmlspecialchars($_SESSION['hexaColores'][$i])
                . '; color: white;">'
                . htmlspecialchars($_SESSION['nombreColores'][$i])
                . '</button>';
                echo '</form>';
                }                
            ?>
        </div>
        <div>
            <form action="formulario.html" method="post">            
                <button type="submit" name="Volver">Atras</button>            
            </form>
        </div>
    </body>
</html>