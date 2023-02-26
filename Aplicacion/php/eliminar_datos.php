<!DOCTYPE html>
<html lang="es">
<head>
  <title>Eliminar_Datos</title>
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

// Sentencia busqueda de datos
$sql = "SELECT * FROM tabla12 WHERE codigo=$codigo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    // Salida de datos de cada fila
    while($row = mysqli_fetch_assoc($result)) {

//Sentencia Eliminar

$sql2 = "DELETE FROM tabla12 WHERE codigo=$codigo";

if (mysqli_query($conn, $sql2)) {





?>

<!-- Ventana modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- encabezado -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso de eliminacion</h4>
          <button class="close" onclick="location.href='../eliminar.html'">&times;</button>
        </div>
        
        <!-- cuerpo -->
        <div class="modal-body">
          
 		<?php
        echo "Atencion, los datos fueron eliminados";
		?>


        </div>
        
        <!-- Pie -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../eliminar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php

} else {




?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Inconveniente de eliminacion de Datos</h4>
          <button class="close" onclick="location.href='../eliminar.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
           echo "No se pudo eliminar los datos: <br> " . mysqli_error($conn);
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../eliminar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php


}

//FIN ELIMINAR

        
//$myJSON = json_encode($row);

//echo $myJSON;

    }


} else {


?>

<!-- The Modal -->
  
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Proceso no finalizado</h4>
          <button class="close" onclick="location.href='../eliminar.html'">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
 		<?php
           echo "El producto no fue encontrado <br> ";
		?>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='../eliminar.html'">Cerrar</button>
        </div>
        
      </div>
    </div>



 <?php

}

mysqli_close($conn);
?> 