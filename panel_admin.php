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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Administrador - Control de Asistencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- admin.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Control de Asistencia</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="agregar_profesor.php">Agregar Profesor</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="ver_profesores.php">Ver Profesor</a>
        </li>
    </ul>
</nav>

<!-- ... (código anterior) ... -->

<div class="container mt-4">
    <h2>Panel del Administrador</h2>
    <div class="form-group">
        <label for="search">Buscar por DNI o Usuario:</label>
        <input type="text" class="form-control" id="search" placeholder="Ingrese DNI o Usuario">
        <button class="btn btn-primary mt-2" onclick="searchTable()">Buscar</button>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["dni"] . "</td>";
                    echo "<td>" . $row["entrada"] . "</td>";
                    echo "<td>" . $row["salida"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron registros de asistencia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="admin.php">Cerrar Sesión</a>
</div>

<script>
function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementsByTagName("table")[0];
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
</script>

<!-- ... (código posterior) ... -->


<!-- ... (código posterior) ... -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
