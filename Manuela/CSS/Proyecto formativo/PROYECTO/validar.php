<!--verifica que el usuario si este registrado, valida usuario y contraseña para poder continuar-->
<?php
    include 'conexion.php';//se conecta a la base de datos
    $user=$_POST["usuario"];//captura del nombre de usuario ingresado por parte del cliente
    $pass=$_POST["contraseña"];// captura de la contraseña ingresada por parte del cliente
    if(isset($_POST["verificar"]))//verificar si el boton esta presionado

    {
        $query= mysqli_query($conn,"SELECT*FROM usuarios where correo='".$user."'and contraseña='".$pass."'");
    // permite generar una consulta en la base de datos y almacenarla en una variable
        $nr=mysqli_num_rows($query); //cuenta el numero de registros,devuelve un entero uno o cero

        if($nr==1) //si el nr es igual a uno entonces existe un solo registro coincidente en la BD
        {
            echo "<script>alert('Bienvenido $user');window.location='inicio.HTML'</script>";//muestra un mensaje de bienvenido al usuario encontrado y redirecciones a la pagina inicio.html
        }
        else
        {
            echo"<script> alert ('usuario o contraseña incorrecta');window.location='index.HTML' </script>";//muestra un mensaje de usuario o contraseña incorrecta y redireccionaa la pagina index.html
        }
    }
?>