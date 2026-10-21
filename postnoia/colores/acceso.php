<?php
    $_usuario='pepe';
    $_contra='abc';
    $_contra_hash=password_hash($_contra, PASSWORD_DEFAULT);
    $_errMsg=" ";    

    $user="root"
    $password=" ";
    $dbname="agenda";
    $host="localhost";

    

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