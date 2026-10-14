<?php
    //1azul(#0000FF), 2rojo (#ff0000), 3verde(#008000), 4amarillo(#FFDE21), 5naranja(#FFA800), 6rosa(#FFB5C0), 7morado(#9D00FF) y 8gris(#D3D3D3). 
    //FORMULARIO CON NIVEL DE DIFICULTAD: N DE CIRCULOS Y N DE COLORES.(4-8) Y DESPUES LOS BOTONES DE CADA COLOR.  
    //
   
    $colores=array(
        'azul'=> '#0000FF',  
        'rojo'=> '#ff0000',  
        'verde'=> '#008000',  
        'amarillo'=> '#FFDE21',  
        'naranja'=> '#FFA800',  
        'rosa'=> '#FFB5C0',  
        'morado'=> '#9D00FF',  
        'gris'=> '#D3D3D3'  
    );   

// Recoger los datos del formulario  
    $ncolores = (int) $_POST['ncolores'];
    $ncirculos = (int) $_POST['ncirculos']; 
    
// Seleccionar los colores disponibles

    $colores_disponibles = array_slice($colores, 0, $ncolores);

// Crear el patrón aleatorio
    $patron = array();

    for ($i = 0; $i < $ncirculos; $i++) {
        $posicion = array_rand($colores_disponibles);
        $patron[] = $colores_disponibles[$posicion];
    }

// Función para pintar los círculos
    function pintar_circulos(array $colores) {    
        echo "<table>";
        foreach ($colores as $color) {
            echo "<tr>";
            echo "<svg width='60' height='45'>";
            echo "<circle cx='30' cy='22.5' r='22.5' fill='$color' />";
            echo "</svg>";
            echo "</tr>";
        }
        echo "</table>";
    }

    $patron_json = json_encode($patron);
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
        <?php pintar_circulos($patron); ?>        
        <form action="formulario.html" method="post">
            <button type="submit" name="Volver">No me gusta el patron</button>
        </form>
        <form action="circulos-negros.php" method="post">
            <input type="hidden" name="ncolores" value="<?= $ncolores ?>">
            <input type="hidden" name="ncirculos" value="<?= $ncirculos ?>">
            <input type="hidden" name="patron" value="<?php echo $patron_json; ?>">
            <button type="submit" name="negro">Empecemos</button>
        </form>
    </body>
</html>

