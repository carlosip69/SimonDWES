<?php
    $_usuario='pepe';
    $_contra='abc';
    $_contra_hash=password_hash($_contra, PASSWORD_DEFAULT);
    $_errMsg=" ";    

    // Parámetros de conexión a base de datos
    $user="root";
    $password="";
    $dbname="agenda";
    $host="localhost";

    // 1. Cadena de conexión (DSN) e instanciación directa de PDO
    $dsn = "mysql:host=localhost;dbname=agenda;charset=utf8mb4";
    $pdo = new PDO($dsn, "root", "");

    // Preparar la consulta con marcador nominal :notaMin
    $sql = "SELECT Codigo, Nombre, Clave, Rol FROM usuarios";
    $stmt = $pdo->prepare($sql);

    // 2. Ejecutar pasando los valores en un array asociativo
     $stmt->execute();

    // 3. Recorrido y visualización de resultados en pantalla
    echo "<table border='1'>";
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {        
        echo "<tr>";
        echo "<td>" . $fila['Codigo'] . "</td>" . "<td>" . $fila['Nombre'] . "</td>" . "<td>" . $fila['Clave'] . "</td>";  
        echo "</tr>";     
    }
    echo "</table>";

    //insertamos datos

    // 1. Sentencia con marcadores nominales
    $sql = "INSERT INTO usuarios (nombre, email, nota) VALUES (:nom, :mail, :nota)";
    $stmt = $pdo->prepare($sql);
    // 2. Ejecución pasando el mapa de valores
    $stmt->execute([
    ':nom' => $nombreNuevo,
    ':mail' => $emailNuevo,
    ':nota' => $notaNueva
    ]);
    // 3. Obtener el ID generado por el AUTO_INCREMENT
    $idGenerado = $pdo->lastInsertId();
    echo "Alumno insertado con éxito con el ID asignado: " . $idGenerado;


    // 4. Cierre explícito de cursor y conexión
    $stmt = null;
    $pdo = null;
    

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $usua=$_POST['usuario'];
        $password=$_POST['password'];

        if($_usuario===$usua && password_verify($password, $_contra_hash)){
            header("Location: ./formulario.php");
            die;
        }else{            
            $_errMsg="Usuario y/o Contraseña incorrecta";   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
</head>
<body>
    <h1>Registrese</h1>
    <form action="" method="POST">
      <label for="usuario">Usuario</label>
      <input id="usuario" name="usuario" type="text" required/>
      <br /><br />
      <label for="password">Contraseña</label>
      <input id="password" name="password" type="password" required/>      
      <br /><br />
      <button type="submit">Entrar</button>
      <br /><br />
      <?php echo $_errMsg ?>
      
</body>
</html>