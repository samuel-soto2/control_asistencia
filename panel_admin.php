<?php
// Inicia la sesión para verificar si el administrador está autenticado
session_start();

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    // Si el administrador no está autenticado, redirige a la página de inicio de sesión de administrador
    header("Location: admin.php");
    exit();
}

// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu servidor de base de datos tiene una ubicación diferente
$username = "root"; // Nombre de usuario de la base de datos (por defecto, en XAMPP es "root")
$password = ""; // Contraseña de la base de datos (deja en blanco si no tienes una configurada)
$dbname = "asistencia"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener todos los registros de asistencia
$sql = "SELECT * FROM asistencia";
$result = $conn->query($sql);
?>
