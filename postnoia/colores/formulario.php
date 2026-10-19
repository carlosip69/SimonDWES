<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simon</title>
  </head>

  <body>
    <h1>Bienvenido al Simon</h1>
    <form action="pintar-circulos.php" method="post">
      <label for="ncolores">¿Número de colores?</label>
      <input
        id="ncolores"
        name="ncolores"
        type="number"
        min="4"
        max="8"
        value="4"
        required
      />
      <br /><br />

      <label for="ncirculos">¿Número de círculos?</label>
      <input
        id="ncirculos"
        name="ncirculos"
        type="number"
        min="4"
        max="8"
        value="4"
        required
      />
      <br /><br />

      <button type="submit">Vamos a jugar</button>
    </form>
  </body>
</html>
