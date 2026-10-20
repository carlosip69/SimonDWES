<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simon</title>
    </head>
    <body style="background-color:<?php echo $_COOKIE['cokki_fondo'];?>">
        <h1>Jugamos al simon</h1>
        <?php include 'funcion-color.php';
        $_SESSION['patron'] = pintar_circulos($patron);
        ?>        
        <form action="formulario.php" method="post">
            <button type="submit" name="Volver">No me gusta el patron</button>
        </form>
        <form action="circulos-negros.php" method="post">
            <input type="hidden" name="ncolores" value="<?=  $_SESSION['ncolores'] ?>">
            <input type="hidden" name="ncirculos" value="<?=  $_SESSION['ncirculos'] ?>">
            <input type="hidden" name="patron" value="<?php echo $_SESSION['patron']; ?>">
            <button type="submit" name="negro">Empecemos</button>
        </form>
        <?php echo $_COOKIE['cokki_fondo'];?>
    </body>
</html>

