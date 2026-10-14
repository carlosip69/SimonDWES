<?php
include 'funcion-color.php';

$negro=array(
     '#000000',
     '#000000',
     '#000000',
     '#000000',
     '#000000',
     '#000000',
     '#000000',
     '#000000'
);

$colores_disponiblesnegros = array_slice($negro, 0, $_SESSION['ncirculos']);
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
        <div class="contenedor-botones">
            <?php pintar_circulos($colores_disponiblesnegros);
            for($i=0;$i<$_SESSION['ncolores'];$i++){
           echo '<button style="background-color: '
            . $_SESSION['hexaColores'][$i]
            . '; color: white;">'.$_SESSION['nombreColores'][$i].'</button>';
            }?>
        </div>
        <form action="formulario.html" method="post">            
            <button type="submit" name="Volver">Atras</button>
            <?php echo var_dump($_SESSION['patron']); ?>
        </form>
    </body>
</html>