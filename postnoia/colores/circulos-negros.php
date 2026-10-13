<?php
include 'pintar-circulos.php';
session_start();

$mis_colores = $_SESSION['ncolores'];
$mis_circulos = $_SESSION['ncirculos']; 

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

$colores_disponibles = array_slice($negro, 0, $ncolores);
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
         echo '</form>'; ?>


    </body>
</html>