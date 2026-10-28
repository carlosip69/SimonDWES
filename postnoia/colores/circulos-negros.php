<?php
    include 'funcion-color.php';

    //Crea el array con tantos negros como circulos dijo el usuario
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

    // por si pulsa los botones despues de comprobar
        if (isset($colores[$_POST['color']]) && $j < $_SESSION['ncirculos']) {
            $_SESSION['circulos_negros'][$j] = $colores[$_POST['color']];
            $_SESSION['j']++;
        }        
    }
    
    //numero de aciertos
    //if()

    $colores_disponiblesnegros = $_SESSION['circulos_negros'];

    // 
    // session_start();

    // $_SESSION = [];

    // session_destroy();

    // // Volver al formulario inicial
    // header("Location: formulario.html");
    // exit;
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simon</title>
    </head>
    <body style="background-color:<?php echo $_COOKIE['cokki_fondo'];?>">        
        <h1>Jugamos al simon</h1>
        <?php
            pintar_circulos($colores_disponiblesnegros);
        ?>
        <div class="contenedor-botones">
            <?php if($_SESSION['j']<$_SESSION['ncirculos']) {                    
                for($i=0;$i<$_SESSION['ncolores'];$i++){
                echo '<form method="post">';
                echo '<button type="submit" name="color" value="'
                . $_SESSION['nombreColores'][$i]
                . '" style="background-color: '
                . $_SESSION['hexaColores'][$i]
                . '; color: white;">'
                . $_SESSION['nombreColores'][$i]
                . '</button>';                       
                }
                echo '</form>';                
                echo '<form action="formulario.php" method="post">';            
                    echo '<button type="submit" name="Volver">Atras</button>';            
                echo '</form>'; 
            }else if($colores_disponiblesnegros==$_SESSION['patron']){
                echo'<h2>¡¡Has Ganado!!</h2>';
                $_SESSION['circulos_negros']=$negro;
                $_SESSION['j'] = 0;
                session_destroy();
                echo '<form action="formulario.php" method="post">';            
                    echo '<button type="submit" name="Volver">Jugar de nuevo</button>';            
                echo '</form>';
            }else{
                echo'<h2>¡¡Has Perdido!! La combinacion era:</h2>';
                pintar_circulos($_SESSION['patron']);
                $_SESSION['circulos_negros']=$negro;
                $_SESSION['j'] = 0;
                session_destroy();
                echo '<form action="formulario.php" method="post">';            
                    echo '<button type="submit" name="Volver">Jugar de nuevo</button>';            
                echo '</form>';

            }                
            ?>
            <p>Progreso: <?php echo $_SESSION['j']; ?> de <?php echo $_SESSION['ncirculos']; ?> circulos completados </p>
        </div>        
    </body>
</html>

