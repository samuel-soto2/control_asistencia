<?php
session_start();

// Verificar las credenciales de administrador (esto es solo un ejemplo, asegúrate de implementar una autenticación segura)
$usuario_correcto = "admin";
$contrasena_correcta = "contrasena123";

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
    // Credenciales correctas, iniciar sesión
    $_SESSION['admin'] = true;
    header("Location: panel_admin.php"); // Redirige al panel de administración
} else {
    // Credenciales incorrectas, muestra un mensaje de error
    header("Location: admin.php?error=1");
}
?>