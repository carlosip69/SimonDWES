<?php
    // Creación de una cookie segura en PHP 7.3+ / PHP 8+
  $nombreCookie = 'cokki_circulos';
  $valorCookie = 7;
  $tiempoExpiracion = time() + (86400 * 30); // 30 días de duración

    setcookie($nombreCookie, $valorCookie, [
      'expires' => $tiempoExpiracion,
      'path' => '/',
      'domain' => 'localhost',
      'secure' => false, // Poner true en producción con HTTPS
      'httponly' => true, // Inaccesible desde JavaScript (Protección Anti-XSS)
      'samesite' => 'Lax' // Protección Anti-CSRF
    ]);

   

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simon</title>
  </head>

  <body>
    <h1>Bienvenido al Simon</h1>
    <form action="pintar-circulos.php" method="POST">
      <label for="ncolores">¿Número de colores?</label>
      <input id="ncolores" name="ncolores" type="number" min="4" max="8" value="4" required/>
      <br /><br />

      <label for="ncirculos">¿Número de círculos?</label>
      <input id="ncirculos" name="ncirculos" type="number" min="4" max="8" value="<?php echo $_COOKIE['cokki_circulos'];?>" required/>
      <br /><br />

      <label for="cokki_fondo">Color de fondo</label>
      <input id=cokki_fondo name="cokki_fondo" type="text"/>
      
      <br /><br />
      <button type="submit">Vamos a jugar</button>
    </form>
  </body>
</html>
