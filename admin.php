<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administración - Control de Asistencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Para ocupar toda la altura visible del viewport */
            text-align: center; /* Para centrar el texto */
            font-size: 80px; /* Tamaño de la fuente */
        }

        .container {
            width: 400px; /* Ancho del contenedor */
        }

        h2 {
            font-size: 40px; /* Tamaño de la fuente para el título */
            margin-bottom: 40px; /* Espacio inferior */
        }

        .form-control {
            font-size: 20px; /* Tamaño de la fuente para los inputs */
            margin-bottom: 50px; /* Espacio inferior */
        }

        .btn {
            font-size: 50px; /* Tamaño de la fuente para el botón */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Control de Asistencia</a>
</nav>

<div class="container mt-4">
    <h2>Iniciar Sesión como Administrador</h2>
    <form action="procesar_login_admin.php" method="POST">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


<style>
        /* Estilos adicionales, si los necesitas */
        body {
            background-image: url('https://media.sketchfab.com/models/d1af919881384e1fbdf7c333bed9e1d5/thumbnails/4e8af26c89d04523bd47982852c7922a/64a77f9dbcb84fe5bcf336d8367f340b.jpeg');
    /* Ajustar el tamaño y la posición de la imagen */
    background-size: 90%; /* Reducir al 50% del tamaño original */
    background-position: center; /* Para centrar la imagen */
    /* Otros estilos para el cuerpo */
    /* ... */
        }
    </style>