<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de Agregar Profesor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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

        if (isset($_POST['nombre']) && isset($_POST['dni'])) {
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];

            $sql = "INSERT INTO asistencia (nombre, dni) VALUES ('$nombre', '$dni')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Profesor agregado con éxito.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al agregar al profesor: ' . $conn->error . '</div>';
            }
        }

        $conn->close();
        ?>

        <a href="agregar_profesor.php" class="btn btn-primary">Agregar más profesor</a>
        <a href="panel_admin.php" class="btn btn-secondary">Volver al panel de admin</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>