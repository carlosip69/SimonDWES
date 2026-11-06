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

require_once 'seguridad.php';
comprobarRol(1);

if (isset($_GET['salir'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$pdo = new PDO("mysql:host=localhost;dbname=bdsimon;charset=utf8mb4", "root", "");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_circulos = (int)$_POST['num_circulos'];
    $num_colores  = (int)$_POST['num_colores'];

    if ($num_circulos >= 4 && $num_circulos <= 8 && $num_colores >= 4 && $num_colores <= 8) {
        $stmt = $pdo->prepare("UPDATE configuracion SET num_circulos = ?, num_colores = ? WHERE id = 1");
        $stmt->execute([$num_circulos, $num_colores]);
    }
}

$config = $pdo->query("SELECT * FROM configuracion WHERE id = 1")->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simon</title>
  </head>

  <body>
    <h2>Panel de administrador</h2>
    <form action="" method="POST">
      <label for="ncolores">¿Número de colores?</label>
      <input id="ncolores" name="ncolores" type="number" min="4" max="8" value="4" required/>
      <br /><br />
      <label for="ncirculos">¿Número de círculos?</label>
      <input id="ncirculos" name="ncirculos" type="number" min="4" max="8" value="4" required/>
      <br /><br />
      <label for="cokki_fondo">Color de fondo</label>
      <input id=cokki_fondo name="cokki_fondo" type="text"/>      
      <br /><br />
      <button type="submit">Guardar configuracion</button>
    </form>
  </body>
</html>
