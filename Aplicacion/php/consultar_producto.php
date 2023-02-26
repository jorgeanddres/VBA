<!DOCTYPE html>
<html lang="es">
<head>
  <title>Consultar</title>
    <title>Consultar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>

 <?php

require('config.php');

$codigo = $_POST['codigo'];


$sql = "SELECT * FROM tabla12 WHERE codigo=$codigo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
{
    // Salida de datos de cada fila
    while($row = mysqli_fetch_assoc($result)) {

?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Informacion De La Consulta</h4>
          <button class="close" onclick="location.href='../consultar.html'">&times;</button>
        </div>
        
        <!-- cuerpo -->
        <div class="modal-body">
          
 		<?php
        echo "codigo: " . $row["codigo"]
        . "<br> nombre: " . $row["nombre"]
        . "<br> marca: " . $row["marca"]
        . "<br> precio: ". $row["precio"]
        . "<br> cantidad: ". $row["cantidad"]
        . "". "<br>";
		?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../consultar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


        
//$myJSON = json_encode($row);

//echo $myJSON;

    }


} else {



?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- cabeza -->
        <div class="modal-header">
          <h4 class="modal-title">Ocurrio un error</h4>
          <button class="close" onclick="location.href='../consultar.html'">&times;</button>
        </div>
        
        <!-- cuerpo -->
        <div class="modal-body">
          
 		<?php
        echo "No se encuentra el producto " . "<br>";
		?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../consultar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


}

mysqli_close($conn);
?> 