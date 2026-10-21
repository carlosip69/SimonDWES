<?php
    //1azul(#0000FF), 2rojo (#ff0000), 3verde(#008000), 4amarillo(#FFDE21), 5naranja(#FFA800), 6rosa(#FFB5C0), 7morado(#9D00FF) y 8gris(#D3D3D3). 
    //FORMULARIO CON NIVEL DE DIFICULTAD: N DE CIRCULOS Y N DE COLORES.(4-8) Y DESPUES LOS BOTONES DE CADA COLOR.  
    session_start();

    $colores=array(
        'azul'=> '#0000FF',  
        'rojo'=> '#FF0000',  
        'verde'=> '#008000',  
        'amarillo'=> '#FFDE21',  
        'naranja'=> '#FFA800',  
        'rosa'=> '#FFB5C0',  
        'morado'=> '#9D00FF',  
        'gris'=> '#D3D3D3'  
    ); 


// Recoger los datos del formulario y metemos las variables de numeros de colores y circulos en el $_SESSION
    if (isset($_POST['ncolores']) && isset($_POST['ncirculos'])) {
    $_SESSION['ncolores'] = (int) $_POST['ncolores'];
    $_SESSION['ncirculos'] = (int) $_POST['ncirculos'];
    }

//Meto la key en un array y los colores en otro para los botones dentro del dolra session
    $_SESSION['nombreColores']=array_slice(array_keys($colores), 0, $_SESSION['ncolores']);
    $_SESSION['hexaColores']=array_slice(array_values($colores), 0, $_SESSION['ncolores']);

// Seleccionar los colores disponibles

    $colores_disponibles = array_slice($colores, 0, $_SESSION['ncolores']);

// Crear el patrón aleatorio
    $patron = array();

    for ($i = 0; $i < $_SESSION['ncirculos']; $i++) {
        $posicion = array_rand($colores_disponibles);
        $patron[] = $colores_disponibles[$posicion];
    }

// Función para pintar los círculos
    function pintar_circulos(array $colores_disponibles) {    
        echo "<table>";
        foreach ($colores_disponibles as $color) {
            echo "<tr>";
            echo "<svg width='60' height='45'>";
            echo "<circle stroke='black' stroke-width='2' cx='30' cy='22.5' r='22.5' fill='$color' />";
            echo "</svg>";
            echo "</tr>";
        }
        echo "</table>";
        return $colores_disponibles;
    }
?>