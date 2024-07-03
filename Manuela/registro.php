<!DOCTYPE html>
<html lang="es-CO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-registro.css">
    <title>Registro</title>
</head>
<body>
    <form action="registro.php" method="POST">
        <div class="container"> <!-- Container principal -->
            <div class="cajaimagen"> <!-- Contenedor de imagen -->
                <h1> Bienvenidos</h1>
                <!-- Aquí va la imagen si es necesario -->
            </div>
            <div class="areasesion"> <!-- Área de registro -->
                <div class="iniciosesion">
                    <h1>Registro</h1>
                    <div class="entradatxtusuario"> <!-- Entradas de datos -->
                        <label>Nombre</label>
                        <input type="text" name="nombre" required placeholder="usuario">
                    </div>
                    <div class="entradatxtusuario">
                        <label>Celular</label>
                        <input type="text" name="celular" required placeholder="celular">
                    </div>
                    <div class="entradatxtusuario">
                        <label>Correo</label>
                        <input type="email" name="correo" required placeholder="correo">
                    </div>
                    <div class="entradatxtusuario">
                        <label>Contraseña</label>
                        <input type="password" name="contraseña" required placeholder="contraseña">
                    </div>
                    <div class="entradatxtusuario">
                        <label>Repetir Contraseña</label>
                        <input type="password" name="repcontraseña" required placeholder="repetir contraseña">
                    </div>
                    <input type="submit" class="boton" value="REGISTRAR" name="registrar">
                    <input type="reset" class="boton" value="RESTABLECER">
                    <h4><a href="index.html">Ya tengo cuenta</a></h4>
                </div>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST["registrar"])) {
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        // Aquí deberías usar mysqli en lugar de mysql, ya que mysql está obsoleto
        $enlace = mysqli_connect("localhost:4000", "root", "", "agencia");
        
        if (!$enlace) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $insertarDatos = "INSERT INTO usuarito (nombre, celular, correo, contraseña) VALUES ('$nombre', '$celular', '$correo', '$contraseña')";
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        if ($ejecutarInsertar) {
            echo "<script>alert('Usuario registrado con éxito: $nombre'); window.location='inicio.html'</script>";
        } else {
            echo "Error al registrar usuario: " . mysqli_error($enlace);
        }

        mysqli_close($enlace);
    }
    ?>
</body>
</html>
