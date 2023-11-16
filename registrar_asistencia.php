<?php
// Establecer la zona horaria en Lima, Perú
date_default_timezone_set('America/Lima');

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

$mensaje = ""; // Inicializa la variable de mensaje

if (isset($_POST['entrada']) || isset($_POST['salida'])) {
    $dni = $_POST['dni'];
    $hora = date("Y-m-d H:i:s"); // Obtiene la hora actual en la zona horaria de Lima

    // Verifica si el DNI existe en la base de datos y obtén el nombre
    $checkDNI = "SELECT dni, nombre FROM asistencia WHERE dni = '$dni'";
    $result = $conn->query($checkDNI);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];

        // El DNI existe en la base de datos, procede con el registro
        if (isset($_POST['entrada'])) {
            // Verifica si ya se registró una entrada para ese DNI en los últimos 10 minutos
            $intervalo = date("Y-m-d H:i:s", strtotime("-10 minutes"));
            $checkEntrada = "SELECT * FROM asistencia WHERE dni = '$dni' AND entrada >= '$intervalo'";
            $resultEntrada = $conn->query($checkEntrada);

            if ($resultEntrada->num_rows > 0) {
                $mensaje = '<div class="alert alert-warning" role="alert">Ya se registró una entrada para este DNI en los últimos 10 minutos .</div>';
            } else {
                $sql = "INSERT INTO asistencia (dni, nombre, entrada) VALUES ('$dni', '$nombre', '$hora')";
            }
        } else {
            // Verifica si ya se registró una salida para ese DNI en los últimos 10 minutos
            $intervalo = date("Y-m-d H:i:s", strtotime("-10 minutes"));
            $checkSalida = "SELECT * FROM asistencia WHERE dni = '$dni' AND salida >= '$intervalo'";
            $resultSalida = $conn->query($checkSalida);

            if ($resultSalida->num_rows > 0) {
                $mensaje = '<div class="alert alert-warning" role="alert">Primero debes de registar la hora de entrada para ese DNI o registró una entrada para este DNI en los últimos 10 minutos .</div>';
            } else {
                $sql = "UPDATE asistencia SET salida = '$hora' WHERE dni = '$dni' AND salida IS NULL";
            }
        }

        if (empty($mensaje)) {
            if ($conn->query($sql) === TRUE) {
                $mensaje = '<div class="alert alert-success" role="alert">Registro de asistencia exitoso.</div>';
            } else {
                $mensaje = '<div class="alert alert-danger" role="alert">Error al registrar la asistencia: ' . $conn->error . '</div>';
            }
        }
    } else {
        $mensaje = '<div class="alert alert-danger" role="alert">El DNI proporcionado no existe.</div>';
    }
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Asistencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
</nav>

<div class="container mt-4">
    <h2>Registro de Asistencia</h2>

    <?php echo $mensaje; ?> <!-- Muestra el mensaje de éxito o error -->

    <a class="btn btn-primary mt-2" href="index.php">Volver a la página de inicio</a>
    
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
