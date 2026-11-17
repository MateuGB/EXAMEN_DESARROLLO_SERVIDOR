<?php
session_start();

$error = "";

if (isset($_POST['login']) && isset($_POST['password'])) {
    $lineas = file('usuarios.txt');

    foreach ($lineas as $linea) {
        $partes = explode(":", trim($linea));

        if (count($partes) === 2 && $partes[0] === $_POST['login'] && $partes[1] === $_POST['password']) {
            $_SESSION['usuario'] = $partes[0];
            header("Location: index.php");
            exit;
        }
    }

    $error = "El usuario o la contraseña estan mal";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Superheroes</h1>

    <h2>Iniciar sesion</h2>

    <?php if ($error != ""){ ?>
        <p style="color: red"><?= $error ?></p>
    <?php } ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <p><label>Usuario: <input type="text" name="login" required></label></p>
        <p><label>Contraseña: <input type="password" name="password" required></label></p>
        <button type="submit">Entrar</button>
    </form>

    <?php include 'pie.php'; ?>
</body>
</html>
