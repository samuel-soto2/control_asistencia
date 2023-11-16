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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
                $search = $_POST['search'];
                $sql = "SELECT dni, nombre FROM asistencia WHERE dni LIKE '%$search%' OR nombre LIKE '%$search%' GROUP BY dni";
            } else {
                $sql = "SELECT dni, nombre FROM asistencia GROUP BY dni";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["dni"] . "</td>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo '<td><a href="eliminar_profesor.php?dni=' . $row["dni"] . '" class="btn btn-danger">Eliminar</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No se encontraron profesores que coincidan con la búsqueda.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="panel_admin.php">Volver al Panel de Administrador</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

