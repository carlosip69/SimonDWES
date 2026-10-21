<?php
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['colorfondo'])){
        $color=$_POST['colorfondo'];
        setcookie('C_color', $color, [
        'expires' => $tiempoExpiracion,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => false, // Poner true en producción con HTTPS
        'httponly' => true, // Inaccesible desde JavaScript (Protección Anti-XSS)
        'samesite' => 'Lax' // Protección Anti-CSRF
        ]);
    }
    $color_form=isset($_COOKIE['colorfondo']) ? $_COOKIE['colorfondo'] : 'grey' ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?php echo $color_form?>">
    <form action="" method="post">
        <label for="colorfondo">Color aplicaccion</label>
      <input id=colorfondo name="colorfondo" type="text" value="<?php echo $color?>"/>
      <button  type="submit">Guardar cookki</button>
</body>
</html>