<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://th.bing.com/th/id/R.9410aeb94b89a3d2642c3397aee02704?rik=11nccvc0wQFIFA&pid=ImgRaw&r=0" type="image/png">
    <title>Control de Asistencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Control de Asistencia</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2>Registro de Asistencia</h2>
    <form action="registrar_asistencia.php" method="POST">
        <div class="form-group">
            <label for="dni">DNI del Profesor:</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>
        <button type="submit" class="btn btn-primary" name="entrada">Registrar Entrada</button>
        <button type="submit" class="btn btn-danger" name="salida">Registrar Salida</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>