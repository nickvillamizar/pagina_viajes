<?php
include 'conexion.php';

if ($conn) {
    echo "Conexión exitosa a la base de datos 'agencia'.";
} else {
    echo "Error al conectar a la base de datos: " . mysqli_connect_error();
}
?>

