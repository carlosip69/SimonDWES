<?php 
   echo'<h2>¡¡Has Ganado!!</h2>';
                $_SESSION['circulos_negros']=$negro;
                $_SESSION['j'] = 0;
                session_destroy();
                echo '<form action="formulario.php" method="post">';            
                    echo '<button type="submit" name="Volver">Jugar de nuevo</button>';            
                echo '</form>'; 
?>