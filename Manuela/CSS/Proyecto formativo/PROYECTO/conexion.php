<?php /*inicia el codigo de la pagina*/
    $dbhost ="localhost"; /*inicializa la variable con los datos del servidor*/
    $dbuser ="root";/*inicializa la variable con losdatos de usuario de la Base de Datos*/
    $dbpass ="";/*inicializa la variable que almacena los datos de la contraseña de la BD*/
    $dbname ="clientes";// nombre de la base de datos
    
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); // establece conexion con la base de datos

    if (!$conn) /*verifica si hubo algun error en la conexion y muestra un mensaje de error*/
    {
        echo"<script> alert('No hay conexion')</script>";/*muestra este mensaje por javascript*/
    }

?>