<?php
include 'pintar-circulos.php';

    $ncolores = (int) $_POST['ncolores'];
    $ncirculos = (int) $_POST['ncirculos']; 
    
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

$colores_disponiblesnegros = array_slice($negro, 0, $ncirculos);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Jugamos al simon</h1>
        <?php pintar_circulos($negro); 
         echo '<form action="formulario.html" method="post">'; 
         echo '<button type="submit" name="Volver">No me gusta el patron</button>';
         echo '</form>'; 
         echo $ncirculos?>


    </body>
</html>