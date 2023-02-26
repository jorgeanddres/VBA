<?php
//Credenciales phpMyAdmin//
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "BDunad12";

// Creando la conexxion.//
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Validando la conexion//
if (!$conn) 
{
    die("Error De Conexion, Intente Nuevamente " . mysqli_connect_error());
}

// Codigo SQL crear una tabla.//
$sql = "CREATE TABLE tabla12 (
codigo INT(3) PRIMARY KEY,
nombre VARCHAR(15),
marca VARCHAR(10),
precio INT(7),
cantidad INT (3)
)";

if (mysqli_query($conn, $sql)) {
    echo "La tabla PRODUCTOS se creo exitosamente";
} else {
    echo "Se a Producido Un Error al Intentar crear la tabla12 PRODUCTOS " . mysqli_error($conn);
}

mysqli_close($conn);
?> 