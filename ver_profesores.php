<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asistencia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Profesores - Control de Asistencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Control de Asistencia</a>
</nav>

<div class="container mt-4">
    <h2>Ver Profesores</h2>
    <form action="ver_profesores.php" method="post">
        <div class="form-group">
            <label for="search">Filtrar por DNI o Nombre:</label>
            <input type="text" class="form-control" name="search" id="search" placeholder="Ingrese DNI o Nombre">
            <button class="btn btn-primary mt-2" type="submit">Buscar</button>
        </div>
    </form>