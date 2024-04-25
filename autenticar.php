<?php
session_start();

// Datos de conexión a la base de datos
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'log';

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar las credenciales del formulario
$name_user = $_POST['name_user'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar las credenciales
$stmt = $conn->prepare("SELECT * FROM people WHERE name_user = ? AND contrasena = ?");
$stmt->bind_param("ss", $name_user, $contrasena);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Obtener el resultado de la consulta
    $fila = $resultado->fetch_assoc();
    // Verificar si la contraseña ingresada coincide con la almacenada (cifrada)
    if (password_verify($contrasena, $fila['contrasena'])) {
        // Autenticación exitosa
        $_SESSION['name_user'] = $name_user;
        header('Location: index.php');
        exit; // Terminar el script después de la redirección
    }
}

// Autenticación fallida
header('Location: index.php?error=true');
exit; // Terminar el script después de la redirección
?>
