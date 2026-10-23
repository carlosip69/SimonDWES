<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrase</title>
</head>
<body>
    <h1>Registrase</h1>
    <form action="acceso.php" method="POST">
      <label for="usuario">Usuario</label>
      <input id="usuario" name="usuario" type="text" required/>
      <br /><br />
      <label for="password">Contraseña</label>
      <input id="password" name="password" type="password" required/>      
      <br /><br />
      <button type="submit">Registrase</button>
    </form>
</body>
</html>