<?php
//Credenciales phpMyAdmin//
$servername = "localhost";
$username = "root";
$password = "12345678";

// Creando la conexxion.//
$conn = mysqli_connect($servername, $username, $password);

// Validando la conexion//
if (!$conn) 
{
    die("Error De Conexion, Intente Nuevamente " . mysqli_connect_error());
}

// Crear La Base Der Datos//
$sql = "CREATE DATABASE BDunad12";
if (mysqli_query($conn, $sql)) 
{
    echo "La Base De Datos Se Creo Exitosamente";
} else 

{
    echo "Se a Producido Un Error al Intentar Crear La Base De Datos " . mysqli_error($conn);
}

mysqli_close($conn);
?> 