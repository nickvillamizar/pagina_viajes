<?php

include 'conexion.php';/*hace un llamado a la conexion*/

if (!$conn) /*si la conexion a la base de datos no se realiza correctamente*/
{
    die("No hay conexion: ".mysqli_connect_error());/*mostrar mensaje de error*/
}
/*si la coneccion es correcta continuamos con el codigo*/
/*$_POST en PHP es una variable superglobal que se utiliza para recopilar datos de un formulario HTML y enviarlos a un script de PHP. Los datos recopilados son enviados al servidor mediante el metodoo POST.* */

$nombre = $_POST["nombre"]; /*captura los valores enviados desde formulario del campo nombre por medio de metodo POST*/
$celular = $_POST["celular"];/*captura los valores enviados por el formulario del campo celular por medio del metodo POST*/
$email = $_POST["correo"];/*captura los valores enviados por el formulario del campo email por medio del metodo POST*/
$pass = $_POST["contraseña"];/*captura los valores enviados por el formulario del campo contraseña por medio de metodo POST*/
$rpass = $_POST["repcontraseña"];

//Registrar
if(isset($_POST["registrar"]))//name del boton del formulario
{
    if($pass !=$rpass){/*si las variables pass y rpass son diferentes*/
        die('las contraseñas no coinciden, Verifique <br /> <a href="index.HTML">Volver</a>'); /*muestra este mensaje y redirecciona*/
    }


    $sqlgrabar = "INSERT INTO usuarios (nombre, celular, correo, contraseña) values('$nombre','$celular','$email','$pass')";/*la
    instruccion para insertar los datos se va a almacenar en la variable $sqlgrabar*/

        if(mysqli_query($conn,$sqlgrabar)) //si la conexion y la consulta se ejecuta correctamente

        {
            echo"<script> alert('Usuario registrado con exito: $nombre'); window.location='inicio.HTML' </script>";/* muestra mensaje que el usuario se registro con exito y redirecciona a la pagina inicio.HTML*/
        }

        else {
            echo"Error:".$sql."<br>";//muestra el texto del error
        }
}

?>