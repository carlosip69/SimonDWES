<?php
session_start();

$_errMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usua = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($usua) && !empty($password)) {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=bdsimon;charset=utf8mb4", "root", "");
            $stmt = $pdo->prepare("SELECT Codigo FROM usuarios WHERE Nombre = ?");
            $stmt->execute([$usua]);

            if ($stmt->fetch()) {
                $_errMsg = "El usuario ya existe.";
            } else {
                $stmtInsert = $pdo->prepare("INSERT INTO usuarios (Nombre, Clave, Rol) VALUES (?, ?, 0)");
                $stmtInsert->execute([$usua, $password]);

                $_SESSION['usuario_id'] = $pdo->lastInsertId();
                $_SESSION['nombre']     = $usua;
                $_SESSION['rol']        = 0;

                header("Location: inicio.php");
                exit();
            }
        } catch (PDOException $e) {
            $_errMsg = "Error de conexión";
        }
    } else {
        $_errMsg = "Rellena todos los campos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h1>Registrase en el simon</h1>
    <form action="registro.php" method="POST">
        Usauario: <input name="usuario" type="text" required><br><br>
        Contraseña: <input name="password" type="password" required><br><br>
        <button type="submit">Registrarse</button>
    </form>
    <br>
    <a href="index.php">Volver</a>
    <p><?= $_errMsg ?></p>
</body>
</html>