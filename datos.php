<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

$sql = "SELECT id, name_user, contrasena FROM people";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

if ($resultado->num_rows > 0) {
    echo '<div class="container">';
    echo '<h2>Bienvenido, ' . $_SESSION['name_user'] . '!</h2>';

    echo '<table border="4">';
    echo '<tr><th>ID</th><th>Nombre de Usuario</th><th>Contraseña</th></tr>';

    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila['id'] . '</td>';
        echo '<td>' . $fila['name_user'] . '</td>';
        echo '<td>' . $fila['contrasena'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '<p><a href="cerrar_sesion.php">Cerrar sesión</a></p>';
    echo '</div>';
    echo '<p><a href="login.php">Menú principal</a></p>';
    echo '</div>';
} else {
    echo '<p>No hay datos en la base de datos.</p>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
