<?php 
    echo'<h2>¡¡Has Perdido!! La combinacion era:</h2>';
                pintar_circulos($_SESSION['patron']);
                $_SESSION['circulos_negros']=$negro;
                $_SESSION['j'] = 0;
                session_destroy();
                echo '<form action="formulario.php" method="post">';            
                    echo '<button type="submit" name="Volver">Jugar de nuevo</button>';            
                echo '</form>';
?>