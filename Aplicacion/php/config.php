<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "BDunad12";


// Creando conexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Validadndo conexion
if (!$conn) {
    die("Fallo en la conexion, verifique... " . mysqli_connect_error());
}
