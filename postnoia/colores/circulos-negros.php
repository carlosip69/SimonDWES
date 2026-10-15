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

function pintarNegro($color){

}

$colores_disponiblesnegros = array_slice($negro, 0, $_SESSION['ncirculos']);

// $ultimoNumero=(count($colores_disponiblesnegros)-1);
// //pintar el primer valor que sea negro y crear la funcion para que se pinte ese circulo
// for($i=0;$colores_disponiblesnegros[$ultimoNumero]=='#000000';$i){
//     if($colores_disponiblesnegros[$i]!='#000000'){
//         $i++
//     }else{
        
//     }
// }
    
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
            <?php $j=0;
            while($colores_disponiblesnegros[$ultimoNumero]=='#000000'){            
                pintar_circulos($colores_disponiblesnegros);           
                for($i=0;$i<$_SESSION['ncolores'];$i++){
                echo '<button style="background-color: '
                . $_SESSION['hexaColores'][$i]
                . '; color: white;" id="'
                . $_SESSION['hexaColores'][$i]
                . '">'
                . $_SESSION['nombreColores'][$i]
                . '</button>';
                }
                switch ($variable) {
                    case 'value':
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
                $j++
            }
            $colores_disponiblesnegros[0]='#ff0000ff';
            pintar_circulos($colores_disponiblesnegros);?>
        </div>
        <form action="formulario.html" method="post">            
            <button type="submit" name="Volver">Atras</button>            
        </form>
    </body>
</html>