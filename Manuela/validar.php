<?php
session_start(); // Iniciar sesión PHP para manejar variables de sesión

include 'conexion.php'; // Asegúrate de que este archivo incluya la conexión correctamente

if (isset($_POST["verificar"])) {
    // Obtener los datos del formulario
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

    // Verificar que ambos campos no estén vacíos
    if (!empty($usuario) && !empty($contraseña)) {
        // Escapar caracteres especiales para evitar inyección SQL
        if (!isset($enlace)) {
            die("Error de conexión: La conexión a la base de datos no está disponible.");
        }
        $usuario = mysqli_real_escape_string($enlace, $usuario);
        $contraseña = mysqli_real_escape_string($enlace, $contraseña);

        // Consulta SQL para verificar las credenciales
        $query = "SELECT * FROM usuarito WHERE (nombre='$usuario' OR correo='$usuario') AND contraseña='$contraseña'";
        $result = mysqli_query($enlace, $query);

        if (!$result) {
            die("Error al ejecutar la consulta: " . mysqli_error($enlace));
        }

        $nr = mysqli_num_rows($result);

        if ($nr == 1) {
            // Obtener el nombre del usuario para mostrar en el mensaje de bienvenida
            $usuario_data = mysqli_fetch_assoc($result);
            $nombre = $usuario_data['nombre'];

            // Guardar el nombre del usuario en la sesión
            $_SESSION['nombre'] = $nombre;

            echo "<script>alert('Bienvenido $nombre'); window.location='inicio.html'</script>";
        } else {
            echo "<script>alert('Usuario o contraseña incorrecta. Haz click en Registrarse e intenta nuevamente.'); window.location='index.html'</script>";
        }

        // Liberar el resultado y cerrar la conexión
        mysqli_free_result($result);
        mysqli_close($enlace);
    } else {
        // Manejar caso cuando los campos están vacíos
        echo "<script>alert('Por favor ingresa un usuario o correo y contraseña válidos.'); window.location='index.html'</script>";
    }
} else {
    // Manejar el caso cuando no se envía el formulario correctamente
    echo "<script>alert('Acceso no autorizado.'); window.location='index.html'</script>";
}
?>

