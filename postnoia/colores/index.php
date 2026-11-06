<?php
session_start();

$_errMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usua = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($usua) && !empty($password)) {
        try {
            $dsn = "mysql:host=localhost;dbname=bdsimon;charset=utf8mb4";
            $pdo = new PDO($dsn, "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?");
            $stmt->execute([$usua, $password]);
            $usuario = $stmt->fetch();

            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['Codigo'];
                $_SESSION['nombre']     = $usuario['Nombre'];
                $_SESSION['rol']        = $usuario['Rol'];

                if ($usuario['Rol'] == 1) {
                    header("Location: admin.php");
                } else {
                    header("Location: inicio.php");
                }
                exit();
            } else {
                $_errMsg = "Usuario y/o Contraseña incorrecta";
            }
        } catch (PDOException $e) {
            $_errMsg = "Error en la base de datos: " . $e->getMessage();
        }
    } else {
        $_errMsg = "Por favor, rellena todos los campos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Simon</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input id="usuario" name="usuario" type="text" required/><br><br>
        <label for="password">Contraseña:</label>
        <input id="password" name="password" type="password" required/><br><br>
        <button type="submit">Entrar</button>
    </form>
    <br>
    <form action="registro.php" method="GET">
        <button type="submit">Registrarse</button>
    </form>
    <br>
    <?php if ($_errMsg): ?>
        <p style="color: red;"><?= htmlspecialchars($_errMsg) ?></p>
    <?php endif; ?>
</body>
</html>