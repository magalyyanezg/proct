<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();

// Verificar si el usuario está autenticado
if(isset($_SESSION['name_user'])) {
    // Mostrar la página de datos
    include 'datos.php';
} else {
    // Mostrar el formulario de login
    include 'login.php';
}

?>

</body>
</html>
