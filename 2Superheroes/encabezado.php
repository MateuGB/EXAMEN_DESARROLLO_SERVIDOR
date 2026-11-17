<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Superhéroes</h1>
    <nav> Usuario: <?= htmlspecialchars($_SESSION['usuario']) ?>
        <a href="logout.php">Cerrar sesión</a>
    </nav>