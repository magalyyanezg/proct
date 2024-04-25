<div class="container">
    <h2>Login</h2>
    <?php
    if(isset($_GET['error']) && $_GET['error'] == true) {
        echo '<p style="color: red;">Credenciales incorrectas. Inténtalo de nuevo.</p>';
    }
    ?>
    <form action="autenticar.php" method="post">
        <label for="name_user">Usuario:</label>
        <input type="text" id="usuario" name="name_user" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>

        <button type="submit">Iniciar sesión</button>
    </form>
</div>
