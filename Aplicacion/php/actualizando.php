<!DOCTYPE html>
<html lang="es">
<head>
  <title>Actualizando</title>
    <title>Actualizando</title>
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

$cod = $_POST['codigo'];
$nom = $_POST['nombre'];
$mar = $_POST['marca'];
$pre = $_POST['precio'];
$can = $_POST['cantidad'];


$sql = "UPDATE tabla12 SET nombre='$nom', marca='$mar', precio='$pre', cantidad='$can'  WHERE codigo='$cod'";

if (mysqli_query($conn, $sql)) {

?>
<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso exitoso</h4>
          <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        
        <!-- cuerpo -->
        <div class="modal-body">
          
 		<?php
        echo "El producto fue actualizado correctamente " . "<br>";
		?>


        </div>
        
        <!-- pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../actualizar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


} else {


?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Error en el proceso</h4>
          <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
        echo "El producto no fue actualizado " . "<br>". mysqli_error($conn);
		?>


        </div>
        
        <!-- pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../actualizar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php

}

mysqli_close($conn);
?> 